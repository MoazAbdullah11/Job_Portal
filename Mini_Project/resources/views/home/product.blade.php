
<style>


body {
    overflow-x: hidden;
}

</style>
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>



            <div class="container mb-4">
                <form action="{{ url('search_product') }}" method="GET" class="row justify-content-center">
                    @csrf
                    <div class="col-12 col-md-8 col-lg-6 mb-2">
                        <input type="text" name="search" class="form-control" placeholder="Search for Something">
                    </div>
                    <div class="col-12 col-md-4 col-lg-2">
                        <input type="submit" class="btn btn-primary w-100" value="Search">
                    </div>
                </form>
            </div>
            
        </div>




        {{-- @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
        @endif --}}




        <div class="row">


            @foreach ($product as $products)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ url('product_details', $products->id) }}" class="option1">
                                    Product Details
                                </a>

                                <form action="{{ url('add_cart', $products->id) }}" method="POST">

                                    @csrf

                                    <div class="row">

                                        <div class="col-md-4">

                                            <input type="number" name="quantity" value="1" min="1"
                                                style="width: 100px; ">

                                        </div>

                                        <div class="col-md-4">


                                            <input type="submit" value="Add to Cart">

                                        </div>



                                       



                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="img-box">
                            <img src="product/{{ $products->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{ $products->title }}
                            </h5>

                            @if ($products->discount_price != null)
                                <h6 style="color: red;">
                                    Discount price
                                    <br>
                                    ${{ $products->discount_price }}
                                </h6>


                                <h6 style="text-decoration: line-through; color:blue;">
                                    Price
                                    <br>
                                    ${{ $products->price }}
                                </h6>
                            @else
                                <h6>
                                    Price
                                    <br>
                                    ${{ $products->price }}
                                </h6>
                            @endif





                        </div>
                    </div>
                </div>
            @endforeach

            <span style="padding-top: 20px;"></span>

            {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}

            {{-- {!! $product->appends(Request::all())->links() !!} --}}

        </div>



        
        {{-- <div class="btn-box">
            <a href="">
                View All products
            </a>
        </div> --}}
    </div>
</section>
