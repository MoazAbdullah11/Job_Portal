<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Corona Admin</title>

  <!-- Plugin Styles -->
  <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />

  <!-- Custom Styling -->
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f4f6f9;
    }

    .div_center {
      text-align: center;
      padding: 30px 15px;
    }

    .font_size {
      font-size: 2.2rem;
      font-weight: 600;
      color: #333;
      margin-bottom: 20px;
    }

    .table-container {
      max-width: 98%;
      margin: 0 auto;
      overflow-x: auto;
      background: white;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      padding: 15px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      min-width: 900px;
    }

    th {
      background-color: #4e73df;
      color: white;
      padding: 14px 10px;
      font-weight: 600;
      text-align: center;
    }

    td {
      padding: 12px 10px;
      color: #555;
      text-align: center;
      vertical-align: middle;
      border-bottom: 1px solid #eee;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    .img_size {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    .btn {
      padding: 6px 14px;
      font-size: 14px;
      border-radius: 5px;
    }

    .btn-danger {
      background-color: #e74c3c;
      border: none;
    }

    .btn-success {
      background-color: #1abc9c;
      border: none;
    }

    .alert {
      max-width: 95%;
      margin: 20px auto;
    }

    @media (max-width: 768px) {
      .font_size {
        font-size: 1.5rem;
      }

      th, td {
        font-size: 13px;
        padding: 8px;
      }

      .img_size {
        width: 60px;
        height: 60px;
      }
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- Notification Banner -->
    

    <!-- Sidebar and Header -->
    @include('admin.sidebar')
    @include('admin.header')

    <!-- Main Content -->
    <div class="main-panel">
      <div class="content-wrapper">

        @if (session()->has('message'))
          <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session()->get('message') }}
          </div>
        @endif

        <div class="div_center">
          <h1 class="font_size">All Products</h1>

          <div class="table-container">
            <table>
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Quantity</th>
                  <th>Category</th>
                  <th>Image</th>
                  <th>Delete</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($product as $product)
                <tr>
                  <td>{{ $product->title }}</td>
                  <td>{{ $product->description }}</td>
                  <td>${{ $product->price }}</td>
                  <td>${{ $product->discount_price }}</td>
                  <td>{{ $product->quantity }}</td>
                  <td>{{ $product->catagory }}</td>
                  <td><img class="img_size" src="/product/{{ $product->image }}" alt="Product Image"></td>
                  <td>
                    <a onclick="return confirm('Are you sure to delete this product?')" class="btn btn-danger" href="{{ url('delete_product', $product->id) }}">Delete</a>
                  </td>
                  <td>
                    <a class="btn btn-success" href="{{ url('update_product', $product->id) }}">Edit</a>
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

  <!-- Scripts -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/dashboard.js"></script>
</body>
</html>
