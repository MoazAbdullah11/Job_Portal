<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Corona Admin</title>

  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/jvectormap/jquery-jvectormap.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/owl-carousel-2/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />

  <style>
    body {
      color: #333;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f9f9f9;
    }

    .title_deg {
      text-align: center;
      font-size: 2rem;
      font-weight: bold;
      padding-bottom: 30px;
      color: #0d6efd;
    }

    .table_deg {
      width: 100%;
      max-width: 100%;
      margin: auto;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      overflow-x: auto;
    }

    .table_deg th,
    .table_deg td {
      padding: 12px;
      text-align: center;
      border: 1px solid #dee2e6;
      font-size: 0.95rem;
      color: #212529;
    }

    .th_deg {
      background-color: #007bff;
      color: white;
    }

    .image_size {
      width: 100px;
      height: auto;
      border-radius: 8px;
    }

    form input[type="text"] {
      padding: 8px;
      border: 1px solid #ced4da;
      border-radius: 4px;
      margin-right: 10px;
      width: 200px;
    }

    form input[type="submit"] {
      padding: 8px 16px;
    }

    .search-container {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 30px;
      padding-right: 5%;
      flex-wrap: wrap;
    }

    .btn {
      white-space: nowrap;
    }

    @media screen and (max-width: 991px) {
      .search-container {
        justify-content: center;
        padding-right: 0;
      }

      .table_deg th,
      .table_deg td {
        padding: 8px;
        font-size: 0.85rem;
      }

      .image_size {
        width: 80px;
      }
    }

    @media screen and (max-width: 576px) {
      .table_deg {
        display: block;
        overflow-x: auto;
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

        <h1 class="title_deg">All Orders</h1>

        <div class="search-container">
          <form action="{{ url('search') }}" method="get">
            <input type="text" name="search" placeholder="Search For Something" style="color: black;">
            <input type="submit" value="Search" class="btn btn-outline-primary">
          </form>
        </div>

        <div class="table-responsive">
          <table class="table_deg">
            <tr class="th_deg">
              <th>Name</th>
              <th>Email</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Product Title</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Payment Status</th>
              <th>Delivery Status</th>
              <th>Image</th>
              <th>Delivered</th>
              <th>Print PDF</th>
              <th>Send Email</th>
            </tr>

            @forelse ($order as $order)
              <tr>
                <td>{{ $order->name }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->product_title }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->payment_status }}</td>
                <td>{{ $order->delivery_status }}</td>
                <td>
                  <img class="image_size" src="/product/{{ $order->image }}">
                </td>
                <td>
                  @if ($order->delivery_status == 'processing')
                    <a href="{{ url('delivered', $order->id) }}" onclick="return confirm('Are you sure this product is delivered?')" class="btn btn-primary">Delivered</a>
                  @else
                    <p style="color: green;">Delivered</p>
                  @endif
                </td>
                <td><a href="{{ url('print_pdf', $order->id) }}" class="btn btn-secondary">Print PDF</a></td>
                <td><a href="{{ url('/send_email', $order->id) }}" class="btn btn-info">Email</a></td>
              </tr>
            @empty
              <tr>
                <td colspan="13">No data Found</td>
              </tr>
            @endforelse
          </table>
        </div>

      </div>
    </div>
  </div>

  <!-- Plugins and scripts -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/vendors/chart.js/chart.umd.js"></script>
  <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.cookie.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <script src="assets/js/proBanner.js"></script>
  <script src="assets/js/dashboard.js"></script>
</body>

</html>
