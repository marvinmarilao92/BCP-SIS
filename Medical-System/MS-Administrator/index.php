<?php
include_once('security/newsource.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>MS | Dashboard</title>

<head>
  <?php include('includes/head_ext.php'); ?>
</head>

<body>
  <?php $page = "Dashboard" ?>
  <?php include('includes/header.php'); ?>
  <?php include('includes/sidebar.php'); ?>

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
                      $dept = "Health Check Monitoring";
                      $stats = "Active";
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

                      $dept = "Health Check Monitoring";
                      $query = "SELECT * FROM `user_information` WHERE user_information.department = '{$dept}'";
                      $query_run = mysqli_query($conn, $query);

                      $total = mysqli_num_rows($query_run);

                      echo "<h6>$total</h6>";
                      ?>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Bar CHart</h5>

                  <!-- Bar Chart -->
                  <canvas id="barChart" style="max-height: 400px;"></canvas>
                  <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#barChart'), {
                      type: 'bar',
                      data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                        datasets: [{
                          label: 'Bar Chart',
                          data: [65, 59, 80, 81, 56, 55, 40],
                          backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                          ],
                          borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                          ],
                          borderWidth: 1
                        }]
                      },
                      options: {
                        scales: {
                          y: {
                            beginAtZero: true
                          }
                        }
                      }
                    });
                  });
                  </script>
                  <!-- End Bar CHart -->

                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Bubble Chart</h5>

                  <!-- Bubble Chart -->
                  <canvas id="bubbleChart" style="max-height: 400px;"></canvas>
                  <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#bubbleChart'), {
                      type: 'bubble',
                      data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                        datasets: [{
                            label: 'Dataset 1',
                            data: [{
                                x: 20,
                                y: 30,
                                r: 15
                              },
                              {
                                x: 40,
                                y: 10,
                                r: 10
                              },
                              {
                                x: 15,
                                y: 37,
                                r: 12
                              },
                              {
                                x: 32,
                                y: 42,
                                r: 33
                              }
                            ],
                            borderColor: 'rgb(255, 99, 132)',
                            backgroundColor: 'rgba(255, 99, 132, 0.5)'
                          },
                          {
                            label: 'Dataset 2',
                            data: [{
                                x: 40,
                                y: 25,
                                r: 22
                              },
                              {
                                x: 24,
                                y: 47,
                                r: 11
                              },
                              {
                                x: 65,
                                y: 11,
                                r: 14
                              },
                              {
                                x: 11,
                                y: 55,
                                r: 8
                              }
                            ],
                            borderColor: 'rgb(75, 192, 192)',
                            backgroundColor: 'rgba(75, 192, 192, 0.5)'
                          }
                        ]
                      },
                      options: {
                        responsive: true,
                        plugins: {
                          legend: {
                            position: 'top',
                          },
                          title: {
                            display: true,
                            text: 'Chart.js Bubble Chart'
                          }
                        }
                      }
                    });
                  });
                  </script>
                  <!-- End Bubble Chart -->

                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Line Chart</h5>

                  <!-- Line Chart -->
                  <div id="lineChart"></div>

                  <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#lineChart"), {
                      series: [{
                        name: "Tickets Submitted",
                        data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
                      }],
                      chart: {
                        height: 350,
                        type: 'line',
                        zoom: {
                          enabled: false
                        }
                      },
                      dataLabels: {
                        enabled: false
                      },
                      stroke: {
                        curve: 'straight'
                      },
                      grid: {
                        row: {
                          colors: ['#f3f3f3',
                            'transparent'
                          ], // takes an array which will be repeated on columns
                          opacity: 0.5
                        },
                      },
                      xaxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                      }
                    }).render();
                  });
                  </script>
                  <!-- End Line Chart -->

                </div>
              </div>
            </div>
          </div><!-- End Left side columns -->

        </div>

    </section>

  </main><!-- End #main -->


  <?php include('includes/footer.php'); ?>
</body>

</html>