<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icons.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />



    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .text_color {
            color: black;
            padding-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding px-3 d-flex align-items-center justify-content-between">
                    <div class="ps-lg-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates,
                                and more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/corona-admin-template/" target="_blank"
                                class="btn me-2 buy-now-btn border-0">Buy Now</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/corona-admin-template/"><i
                                class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        {{-- @include('admin.body') --}}

        <div class="main-panel">
            <div class="content-wrapper">


                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif


                <div class="div_center">

                    <h1 class="font_size">Add Product</h1>





                    <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="div_design">

                            <label>Product Title :</label>
                            <input class="text_color" type="text" name="title" placeholder="Write a Title"
                                required="">
                        </div>

                        <div class="div_design">

                            <label>Product Description :</label>
                            <input class="text_color" type="text" name="description"
                                placeholder="Write a Description" required="">
                        </div>

                        <div class="div_design">

                            <label>Product Price :</label>
                            <input class="text_color" type="number" name="price" placeholder="Write a Price"
                                required="">
                        </div>

                        <div class="div_design">

                            <label>Discount Price :</label>
                            <input class="text_color" type="number" name="dis_price"
                                placeholder="Write a Discount is applied" required="">
                        </div>

                        <div class="div_design">

                            <label>Product Quantity :</label>
                            <input class="text_color" type="number" min="0" name="quantity"
                                placeholder="Write a Quantity" required="">
                        </div>

                        <div class="div_design">

                            <label>Product Catagory :</label>
                            <select class="text_color" name="catagory" required="">
                                <option class="text_color" value="" selected="">Add a Catagory</option>

                                @foreach ($catagory as $catagory)
                                    <option class="text_color" value="{{ $catagory->catagory_name }}"></option>
                                @endforeach
                            </select>
                            {{-- <input class="text_color" type="text" name="title" placeholder="Write a Title"> --}}
                        </div>

                        <div class="div_design">

                            <label>Product Image Here :</label>
                            <input type="file" name="image" placeholder="Add Image" required="">
                        </div>


                        <div class="div_design">


                            <input type="submit" value="Add Product" class="btn btn-primary">
                        </div>

                    </form>



                </div>





            </div>
        </div>











        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="assets/vendors/chart.js/chart.umd.js"></script>
        <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
        <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="assets/js/off-canvas.js"></script>
        <script src="assets/js/misc.js"></script>
        <script src="assets/js/settings.js"></script>
        <script src="assets/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="assets/js/proBanner.js"></script>
        <script src="assets/js/dashboard.js"></script>
        <!-- End custom js for this page -->
</body>

</html>
