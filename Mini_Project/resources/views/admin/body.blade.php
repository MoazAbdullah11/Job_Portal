<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css" rel="stylesheet">

  <style>
    html, body {
      height: 100%;
      background-color: #0e0e0e; /* Dark background */
      color: white;
      margin: 0;
    }

    .main-panel {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .content-wrapper {
      flex: 1;
      padding: 2rem;
    }

    .card {
      background-color: #1e1e2f;
      border-bottom: 3px solid #00c292; /* Green bottom border */
      color: white;
    }

    .card-body h3,
    .card-body h6 {
      color: white;
    }

    footer {
      text-align: center;
      padding: 1rem;
      background-color: #0b0b0b;
      color: gray;
    }
  </style>
</head>
<body>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <!-- Card 1 -->
        <div class="col-xl-3 col-sm-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <h3 class="mb-0">{{$total_product}}</h3>
                </div>
                <div class="col-3 text-end">
                  <span class="mdi mdi-arrow-top-right text-success"></span>
                </div>
              </div>
              <h6>Total Products</h6>
            </div>
          </div>
        </div>

        <!-- Repeat this block for each card -->
        <!-- Card 2: Orders -->
        <div class="col-xl-3 col-sm-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <h3 class="mb-0">{{$total_order}}</h3>
                </div>
                <div class="col-3 text-end">
                  <span class="mdi mdi-arrow-top-right text-success"></span>
                </div>
              </div>
              <h6>Total Orders</h6>
            </div>
          </div>
        </div>

        <!-- Card 3: Customers -->
        <div class="col-xl-3 col-sm-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <h3 class="mb-0">{{$total_user}}</h3>
                </div>
                <div class="col-3 text-end">
                  <span class="mdi mdi-arrow-top-right text-success"></span>
                </div>
              </div>
              <h6>Total Customer</h6>
            </div>
          </div>
        </div>

        <!-- Card 4: Revenue (Red border) -->
        <div class="col-xl-3 col-sm-6 mb-4">
          <div class="card" style="border-bottom: 3px solid #e74c3c;">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <h3 class="mb-0">${{$total_revenue}}</h3>
                </div>
                <div class="col-3 text-end">
                  <span class="mdi mdi-arrow-bottom-left text-danger"></span>
                </div>
              </div>
              <h6>Total Revenue</h6>
            </div>
          </div>
        </div>

        <!-- Card 5: Delivered -->
        <div class="col-xl-3 col-sm-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <h3 class="mb-0">{{$total_delivery}}</h3>
                </div>
                <div class="col-3 text-end">
                  <span class="mdi mdi-arrow-top-right text-success"></span>
                </div>
              </div>
              <h6>Order Delivered</h6>
            </div>
          </div>
        </div>

        <!-- Card 6: Processing -->
        <div class="col-xl-3 col-sm-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <h3 class="mb-0">{{$total_processing}}</h3>
                </div>
                <div class="col-3 text-end">
                  <span class="mdi mdi-arrow-top-right text-success"></span>
                </div>
              </div>
              <h6>Order Processing</h6>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer>
      © 2025 MyCompany. All rights reserved. | <a href="#" class="text-decoration-none text-secondary">Privacy Policy</a> | <a href="#" class="text-decoration-none text-secondary">Terms of Service</a>
    </footer>
  </div>
</body>
</html>
