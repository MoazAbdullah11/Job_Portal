<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <!-- Plugin css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css')}}">
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />

    <style>
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 30px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .form-heading {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
            color: #333;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 5px;
            color: #444;
        }

        .form-control {
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }

            .form-heading {
                font-size: 1.6rem;
            }

            label {
                width: 100% !important;
            }
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.header')

        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif

                <div class="form-container">
                    <h1 class="form-heading">Add Product</h1>

                    <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="form-label">Product Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Write a Title" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Product Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Write a Description" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Product Price</label>
                            <input type="number" name="price" class="form-control" placeholder="Write a Price" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Discount Price</label>
                            <input type="number" name="dis_price" class="form-control" placeholder="Write a Discount Price" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Product Quantity</label>
                            <input type="number" min="0" name="quantity" class="form-control" placeholder="Write a Quantity" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Product Category</label>
                            <select name="catagory" class="form-control" required>
                                <option value="" selected disabled>Add a Category</option>
                                @foreach ($catagory as $cat)
                                    <option value="{{ $cat->catagory_name }}">{{ $cat->catagory_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Product Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Add Product" class="btn btn-primary">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('assets/vendors/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{asset('assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.cookie.js')}}"></script>
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/misc.js')}}"></script>
    <script src="{{asset('assets/js/settings.js')}}"></script>
    <script src="{{asset('assets/js/todolist.js')}}"></script>
    <script src="{{asset('assets/js/proBanner.js')}}"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
</body>

</html>
