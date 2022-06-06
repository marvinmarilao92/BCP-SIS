<?php
include_once 'security/newsource.php';
?>
<!DOCTYPE html>
<html lang="en">
<title>HCM | Dashboard</title>

<head>
  <?php include 'includes/head_ext.php'; ?>
</head>

<body>
  <?php $page = 'Dashboard'; ?>
  <?php include 'includes/header.php'; ?>
  <?php include 'includes/sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Total <span>| Active now</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $dept = 'Health Check Monitoring';
                      $stats = 'Active';
                      $query = "SELECT * FROM `user_information` WHERE user_information.department = '{$dept}' AND account_status = '{$stats}'";
                      $query_run = mysqli_query($conn, $query);
                      $total = mysqli_num_rows($query_run);

                      echo "<h6>$total</h6>";
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Total <span>| Employee</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <?php

                      $dept = 'Health Check Monitoring';
                      $query = "SELECT * FROM `user_information` WHERE user_information.department = '{$dept}'";
                      $query_run = mysqli_query($conn, $query);

                      $total = mysqli_num_rows($query_run);

                      echo "<h6>$total</h6>";
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-lg-5">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Current Medicine Stock</h5>

                  <!-- Pie Chart -->
                  <div id="brand-name"></div>
                  <div id="quantity"></div>

                  <canvas id="pieChart" style="max-height: 400px;"></canvas>
                  <script>
                  const brandName = document.querySelector('#brand-name');
                  const itemQuantity = document.querySelector('#quantity');

                  const fetchData = async () => {
                    const res = await axios('test-config.php');
                    const data = res.data;

                    const name = document.createElement('h4');
                    const count = document.createElement('h4');
                    // const quantity = document.createElement('h4');

                    console.log(data);
                    data.forEach((item) => {
                      name.innerText = item.brand_name;
                      brandName.append(name);

                      count.innerText = item.quantity;
                      itemQuantity.append(count);

                      // console.log(item.full_name);

                    })

                  }

                  fetchData();

                  const label = ['Paracetamol', 'Bioflu', 'BSCRIM', 'BSCRIM', 'CASE', 'TEST 1'];
                  const quantity = [300, 50, 100, 69, 420];

                  document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#pieChart'), {
                      type: 'pie',
                      data: {
                        labels: label,
                        datasets: [{
                          label: 'My First Dataset',
                          data: quantity,
                          backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)'
                          ],
                          hoverOffset: 4
                        }]
                      }
                    });
                  });
                  </script>


                  <!-- End Pie CHart -->

                </div>
              </div>
            </div><!-- End Revenue Card -->
            <div class="col-lg-7">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Bar Chart</h5>

                  <!-- Bar Chart -->
                  <div id="barChart" style="min-height: 400px;" class="echart"></div>

                  <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    echarts.init(document.querySelector("#barChart")).setOption({
                      xAxis: {
                        type: 'category',
                        data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                      },
                      yAxis: {
                        type: 'value'
                      },
                      series: [{
                        data: [120, 200, 150, 80, 70, 110, 130],
                        type: 'bar'
                      }]
                    });
                  });
                  </script>
                  <!-- End Bar Chart -->

                </div>
              </div>
            </div>
          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->


  <?php include 'includes/footer.php'; ?>
</body>

</html>