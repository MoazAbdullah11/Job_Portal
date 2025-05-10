<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Corona Admin</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">

    <!-- Layout CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

    <!-- Custom Style -->
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }

        .h2_font {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .form-wrapper {
            background: #1e1e1e;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }

        .form-control {
            background-color: #2c2c2c;
            border: none;
            color: #fff;
        }

        .form-control::placeholder {
            color: #bbb;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        table.table {
            background-color: #000;
            color: #fff;
        }

        .table th,
        .table td {
            vertical-align: middle;
            border-color: #444;
            color: #fff;
        }

        .table th {
            background-color: #222;
        }

        .table tbody tr:hover {
            background-color: #333;
        }

        .alert {
            font-weight: bold;
        }

        @media (max-width: 576px) {
            .h2_font {
                font-size: 1.8rem;
            }

            .form-wrapper {
                padding: 20px;
            }

            .table th,
            .table td {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.header')

        <div class="container mt-5 pt=4">
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ session()->get('message') }}
                </div>
            @endif

            <!-- Category Form -->
            <div class="row justify-content-center mb-5 mt-5">
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="form-wrapper text-center">
                        <h2 class="h2_font">Add Category</h2>
                        <form action="{{ url('/add_catagory') }}" method="POST">
                            @csrf
                            <input class="form-control mb-3" type="text" name="catagory"
                                   placeholder="Write category name" required>
                            <input type="submit" class="btn btn-primary w-100" name="submit" value="Add Category">
                        </form>
                    </div>
                </div>
            </div>

            <!-- Category Table -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="table-responsive">
                        <table class="table table-bordered text-white">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $cat)
                                    <tr>
                                        <td>{{ $cat->catagory_name }}</td>
                                        <td>
                                            <a onclick="return confirm('Are You Sure To Delete This')"
                                               class="btn btn-danger btn-sm"
                                               href="{{ url('delete_catagory', $cat->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Plugins -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.cookie.js') }}"></script>

    <!-- Custom Scripts -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <script src="{{ asset('assets/js/proBanner.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>

</html>
