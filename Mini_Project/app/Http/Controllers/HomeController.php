<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;

use App\Models\Comment;

use App\Models\Reply;


use Session;

use Stripe;




class HomeController extends Controller
{

    public function index()
    {
        $product=Product::paginate(10);

        $comment=comment::orderby('id','desc')->get();

        $reply=reply::all();

        return view('home.userpage',compact('product','comment','reply'));
    }


    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if($usertype=='1'){

            $total_product=product::all()->count();

            $total_order=product::all()->count();

            $total_user=product::all()->count();

            $order=order::all();

            $total_revenue=0;

            foreach($order as $order)
            {
                $total_revenue =$total_revenue + $order->price;


            }
            
            // $total_revenue=product::all()->count();

            $total_delivery =order::where('delivery_status','=','delivered')->get()->count();

            $total_processing =order::where('delivery_status','=','processing')->get()->count();


            return view('admin.home', compact('total_product','total_order','total_user','total_revenue','total_delivery','total_processing'));

        }

        else
        {
            $product=Product::paginate(10);

            $comment=comment::orderby('id','desc')->get();

            $reply=reply::all();

            return view('home.userpage',compact('product','comment','reply'));
        }
    }



    public function product_details($id)
    {
        $product=product::find($id);

        return view('home.product_details',compact('product'));
    }


    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user=Auth::user();

            $userid=$user->id;

            // dd($user);

            $product=product::find($id);

            $product_exist_id=cart::where('Product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();

            if($product_exist_id)
            {

                $cart=cart::find($product_exist_id)->first();

                $quantity=$cart->quantity;

                $cart->quantity=$quantity + $request->quantity;

                if($product->dicsoint_price != null)
                {
    
                    $cart->price=$product->discount_price * $cart->quantity;
                }
    
                else{

                    $cart->price=$product->price * $cart->quantity;
                }

                $cart->save();

                Alert::success('Product added Successfully!','We Added Your Product in Cart');

                return redirect()->back();





            }

            else{
                $cart=new cart;

                $cart->name=$user->name;
    
                $cart->email=$user->email;
    
                $cart->phone=$user->phone;
    
                $cart->address=$user->address;
    
                $cart->user_id=$user->id;
    
                $cart->product_title=$product->title;
    
                if($product->dicsoint_price != null)
                {
    
                    $cart->price=$product->discount_price * $request->quantity ;
                }
    
                else{
                    $cart->price=$product->price * $request->quantity;
                }
    
    
                $cart->image=$product->image;
    
                $cart->Product_id=$product->id;
    
                $cart->quantity=$request->quantity;
    
    
                $cart->save();
    
                return redirect()->back()->with('message','Product added Successfully! ');

            }

            // dd($product);

           


        }
        else
        {
            return redirect('login');
        }

    }




    public function show_cart()
    {

        if(Auth::id()){

            $id=Auth::user()->id;
    
            $cart=cart::where('user_id','=',$id)->get();
            
    
            return view('home.show_cart',compact('cart'));
        }

        else{
            return redirect('login');
        }
    }



    public function remove_cart($id)
    {
        $cart=cart::find($id);

        $cart->delete();

        return redirect()->back();


    }





    public function cash_order()
    {
        $user=Auth::user();

        $userid=$user->id;

        // dd($userid);

        $data=cart::where('user_id', '=', $userid)->get();

        // dd($data);
        
        foreach($data as $data)
        {

            $order=new order;

            $order->name=$data->name;

            $order->email = $data->email;

            $order->phone = $data->phone;

            $order->address = $data->address;

            $order->user_id = $data->user_id;




            $order->product_title = $data->product_title;

            $order->price = $data->price;

            $order->quantity = $data->quantity;

            $order->image = $data->image;

            $order->product_id= $data->Product_id;

            $order->payment_status = 'cash on delivery';

            $order->delivery_status = 'processing';

            $order->save();

            $cart_id=$data->id;

            $cart=cart::find($cart_id);

            $cart->delete();


        }

        return redirect()->back()->with('message','we Received Your Order. We will Connect you soon...  ');


    }




    public function stripe($totalprice)
    {

        return view('home.stripe',compact('totalprice'));


    }






    public function stripePost(Request $request, $totalprice)

    {

        // dd($totalprice);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => $totalprice * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment from itsolutionstuff.com." 

        ]);



        $user=Auth::user();

        $userid=$user->id;

        // dd($userid);

        $data=cart::where('user_id', '=', $userid)->get();

        // dd($data);
        
        foreach($data as $data)
        {

            $order=new order;

            $order->name=$data->name;

            $order->email = $data->email;

            $order->phone = $data->phone;

            $order->address = $data->address;

            $order->user_id = $data->user_id;




            $order->product_title = $data->product_title;

            $order->price = $data->price;

            $order->quantity = $data->quantity;

            $order->image = $data->image;

            $order->product_id= $data->Product_id;

            $order->payment_status = 'Paid';

            $order->delivery_status = 'processing';

            $order->save();

            $cart_id=$data->id;

            $cart=cart::find($cart_id);

            $cart->delete();


        }

      

        Session::flash('success', 'Payment successful!');


        return back();

    }





    public function show_order()
    {

        if(Auth::id())
        {
            $user=Auth::user();

            $userid=$user->id;

            $order=order::where('user_id','=',$userid)->get();

            return view('home.order',compact('order'));
        }

        else{
            return redirect('login');
        }
        

    }




    public function cancel_order($id)
    {
        $order=order::find($id);

        $order->delivery_status='Order Canceled';

        $order->save();

        return redirect()->back();
        
        
    }


    public function add_comment(Request $request)
    {
        if(Auth::id()){
            $comment=new comment;

            $comment->name=Auth::user()->name;

            $comment->name_id=Auth::user()->id;

            $comment->comment = $request->comment;

            $comment->save();

            return redirect()->back();

        }

        else{
            return redirect('login');
        }
       
        
        
    }




    public function add_reply(Request $request)
    {
        if(Auth::id()){

            $reply=new reply;

            $reply->name=Auth::user()->name;

            $reply->user_id=Auth::user()->id;

            $reply->comment_id=$request->commentId;

            $reply->reply=$request->reply;

            $reply->save();

            return redirect()->back();
            

        }

        else{
            return redirect('login');
        }
       
        
        
    }




    public function product_search(Request $request)
{
    $comment = comment::orderBy('id', 'desc')->get();
    $reply = reply::all();

    $search_text = $request->search;

    $product = product::where('title', 'LIKE', "%$search_text%")
                ->orWhere('catagory', 'LIKE', "%$search_text%")
                ->paginate(10);

    return view('home.userpage', compact('product', 'comment', 'reply'));
}







public function product()
    {
        $product=Product::paginate(10);

        $comment=comment::orderby('id','desc')->get();

        $reply=reply::all();

        return view('home.all_product',compact('product','comment','reply'));
        

    }


    public function search_product(Request $request)
{
    $comment = comment::orderBy('id', 'desc')->get();
    $reply = reply::all();

    $search_text = $request->search;

    $product = product::where('title', 'LIKE', "%$search_text%")
                ->orWhere('catagory', 'LIKE', "%$search_text%")
                ->paginate(10);

    return view('home.all_product', compact('product', 'comment', 'reply'));
}









}
