<!DOCTYPE html>
<html>

<head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="">

    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ ssset('home/css/bootstrap.css') }}" />

    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />

    <style type="text/css">
        .center {
            margin: auto;
            width: 90%;
            max-width: 1000px;
            text-align: center;
            padding: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th,
        td {
            border: 1px solid grey;
            padding: 10px;
            text-align: center;
            font-size: 16px;
        }

        .th_deg {
            font-size: 20px;
            background: skyblue;
        }

        .img_deg {
            height: 100px;
            width: 100px;
            object-fit: cover;
        }

        .total_deg {
            font-size: 20px;
            padding: 20px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            tr {
                margin-bottom: 15px;
                border-bottom: 2px solid #ccc;
            }

            th {
                background: #f0f0f0;
                font-size: 18px;
            }

            td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                width: 45%;
                padding-left: 15px;
                font-weight: bold;
                text-align: left;
            }

            .img_deg {
                height: 80px;
                width: 80px;
            }

            .total_deg {
                font-size: 18px;
            }
        }
    </style>


</head>

<body>

    @include('sweetalert::alert')

    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- slider section -->
        {{-- </div> --}}


        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="center">

            <table>

                <tr>
                    <th class="th_deg">Product title</th>
                    <th class="th_deg">product quantity</th>
                    <th class="th_deg">price</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Action</th>


                </tr>

                <?php $totalprice = 0; ?>

                @foreach ($cart as $cart)
                    <tr>
                        <td data-label="Product title">{{ $cart->product_title }}</td>
                        <td data-label="Product quantity">{{ $cart->quantity }}</td>
                        <td data-label="Price">${{ $cart->price }}</td>
                        <td data-label="Image"><img class="img_deg" src="/product/{{ $cart->image }}"></td>
                        <td data-label="Action">
                            <a class="btn btn-danger" onclick="confirmation(event)"
                                href="{{ url('/remove_cart', $cart->id) }}">Remove Product</a>
                        </td>
                    </tr>
                @endforeach



            </table>

            <div>
                <h1 class="total_deg">Total Price : ${{ $totalprice }}</h1>
            </div>


            <div>

                <h1 style="font-size: 25px; padding-bottom: 15px;">Proceed to Order</h1>

                <a href="{{ url('cash_order') }}" class="btn btn-danger">Cash On Delivery</a>
                <a href="{{ url('stripe', $totalprice) }}" class="btn btn-danger">Pay Using Card</a>






            </div>

        </div>



        <!-- footer start -->
        @include('home.footer')
        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>














        <script>
            function confirmation(ev) {
                ev.preventDefault();
                var urlToRedirect = ev.currentTarget.getAttribute('href');
                console.log(urlToRedirect);
                swal({
                        title: "Are you sure to cancel this product",
                        text: "You will not be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willCancel) => {
                        if (willCancel) {



                            window.location.href = urlToRedirect;

                        }



                    });


            }
        </script>





        <!-- jQery -->
        <script src="home/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="home/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="home/js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="home/js/custom.js"></script>
</body>

</html>
