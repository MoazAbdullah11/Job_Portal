<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Catagory;

use App\Models\Product;

use App\Models\Order;

use PDF;

use Notification;

use App\Notifications\SendEmailNotification;


class AdminController extends Controller
{
    public function view_catagory()
    {
        // if(Auth::id())
        if(Auth::id() && (Auth::User()->usertype == 1)) 
        {
            $data=catagory::all();


            return view('admin.catagory', compact('data'));


        }

        else
        {
            return redirect('login');
        }
      
    }






    public function delete_catagory($id)
    {

        // if(Auth::id())
        if(Auth::id() && (Auth::User()->usertype == 1)) 
        {
            $data=catagory::find($id);
        $data->delete();


        return redirect()->back()->with('message','Catagory Deleted Seccessfully');


        }

        else
        {
            return redirect('login');
        }
       
    }









    public function add_catagory(Request $request)
    {

        // if(Auth::id())
        if(Auth::id() && (Auth::User()->usertype ==1)) 
        {
            $data=new catagory;
            $data->catagory_name=$request->catagory;
    
            $data->save();
    
    
            return redirect()->back()->with('message','Catagory added Successfully');


        }

        else
        {
            return redirect('login');
        }
        
    }











    public function view_product()
    {

        if(Auth::id() && (Auth::User()->usertype ==1)) 
        {
            $catagory=catagory::all();
            return view('admin.product', compact('catagory'));


        }

        else
        {
            return redirect('login');
        }
       
    }











    public function add_product(Request $request)
    {

        // if(Auth::id())
        if(Auth::id() && (Auth::User()->usertype ==1)) 
        {
            $product=new product;
            $product->title=$request->title;
    
            $product->description=$request->description;
    
            $product->price=$request->price;
    
            $product->quantity=$request->quantity;
    
            $product->discount_price=$request->dis_price;
    
            $product->catagory=$request->catagory;
    
            $image=$request->image;
    
            $imagename=time().'.'.$image->getClientOriginalExtension();
    
            $request->image->move('product',$imagename);
    
            $product->image=$imagename;        
    
            $product->save();
    
    
            return redirect()->back()->with('message','Product added Successfully');

        }

        else
        {
            return redirect('login');
        }
        
    }













    public function show_product()
    {
        if(Auth::id() && (Auth::User()->usertype == 1)) 
        {
            $product=product::all();
        return view('admin.show_product',compact('product'));


        }

        else
        {
            return redirect('login');
        }

       
    }















public function delete_product($id)
{

    // if(Auth::id())
    if(Auth::id() && (Auth::User()->usertype==1)) 
        {
            $product = Product::find($id);
    $product->delete();
    return redirect()->back()->with('message', 'Product Deleted Successfully');


        }

        else
        {
            return redirect('login');
        }

    
}



















public function update_product($id)
{
    if(Auth::id() && (Auth::User()->usertype == 1)) 
        {
            $product = Product::find($id);
            $catagory = Catagory::all();
            return view('admin.update_product', compact('product', 'catagory'));


        }

        else
        {
            return redirect('login');
        }

    
}














public function update_product_confirm(Request $request, $id)
{
    if(Auth::id()&&(Auth::User()->usertype == 1)) 
        {

            $product = Product::find($id);

    $product->title = $request->title;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->discount_price = $request->dis_price;
    $product->quantity = $request->quantity;
    $product->catagory = $request->catagory;

    if ($request->image) {
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $image->move('product', $imagename);
        $product->image = $imagename;
    }

    $product->save();
    return redirect()->back()->with('message', 'Product Updated Successfully');
           


        }

        else
        {
            return redirect('login');
        }
    
}











public function order()
{
    if(Auth::id() && (Auth::User()->usertype == 1)) 
        {
            $order=order::all();
    
            return view('admin.order',compact('order'));


        }

        else
        {
            return redirect('login');
        }

  
}










public function delivered($id)
{
    if(Auth::id() && (Auth::User()->usertype == 1)) 
        {
            $order=order::find($id);

    $order->delivery_status="delivered";

    $order->payment_status="Paid";
    
    $order->save();
    
    return redirect()->back(); 


        }

        else
        {
            return redirect('login');
        }

}














public function print_pdf($id)
{
    $order=order::find($id);
    
    $pdf=PDF::loadview('admin.pdf',compact('order'));
    
    return $pdf->download('order_details.pdf'); 


}












public function send_email($id)
{
    if(Auth::id() && (Auth::User()->usertype == 1)) 
        {
            $order=order::find($id);
    
    return view('admin.email_info',compact('order'));


        }

        else
        {
            return redirect('login');
        }

    $order=order::find($id);
    
    return view('admin.email_info',compact('order'));

}



















public function send_user_email(Request $request,$id)
{
    if(Auth::id() && (Auth::User()->usertype == 1)) 
        {
            $order=order::find($id);

    $details= [
        'greeting'=>$request->greeting,

        'firstline'=>$request->firstline,

        'body'=>$request->body,

        'button'=>$request->button,

        'url'=>$request->url,

        'lastline'=>$request->lastline,

    ];

    Notification::send($order,new SendEmailNotification($details));
    

    return redirect()->back();


        }

        else
        {
            return redirect('login');
        }

}











public function searchdata(Request $request)
{
    if(Auth::id() && (Auth::User()->usertype == 1)) 
        {
            $searchText=$request->search;
            // $searchText=$id->search;

    $order=order::where('name','LIKE',"%$searchText%")->orwhere('phone','LIKE',"%$searchText%")->orwhere('product_title','LIKE',"%$searchText%")->get();
    
    return view('admin.order',compact('order'));


        }

        else
        {
            return redirect('login');
        }

    

}












    
}
