<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{asset('home/images/favicon.png') }}" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('home/css/responsive.css') }}" rel="stylesheet" />



    <style type="text/css">
        .center {
            margin: auto;
            width: 90%;
            max-width: 1200px;
            padding: 20px;
            text-align: center;
            overflow-x: auto;
            /* Add horizontal scroll for smaller screens */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
            /* Prevent the table from shrinking too much */
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        .th_deg {
            background-color: skyblue;
            font-size: 18px;
            font-weight: bold;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        @media screen and (max-width: 768px) {
            .th_deg {
                font-size: 16px;
            }

            table,
            th,
            td {
                font-size: 14px;
            }

            .center {
                padding: 10px;
            }
        }

        @media screen and (max-width: 480px) {
            .th_deg {
                font-size: 14px;
            }

            table,
            th,
            td {
                font-size: 12px;
            }

            .btn {
                padding: 5px 10px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->


    <div class="center">
        <table>
            <tr>
                <th class="th_deg">Product Title</th>
                <th class="th_deg">Quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Payment Status</th>
                <th class="th_deg">Delivery Status</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Cancel Order</th>
            </tr>

            @foreach ($order as $order)
                <tr>
                    <td>{{ $order->product_title }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->payment_status }}</td>
                    <td>{{ $order->delivery_status }}</td>
                    <td><img height="100" width="100" src="product/{{ $order->image }}"></td>
                    <td>
                        @if ($order->delivery_status == 'processing')
                            <a onclick="return confirm('Are You Sure to cancel the Order')" class="btn btn-danger"
                                href="{{ url('cancel_order', $order->id) }}">Cancel Order</a>
                        @else
                            <p style="color: blue;">Canceled Done.</p>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>










    {{-- @include('home.footer') --}}
    <!-- footer end -->
    {{-- <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div> --}}
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
