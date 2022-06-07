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
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Total <span>| Used Medicines</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri ri-capsule-fill"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $query = "SELECT SUM(quantity) FROM `hcms_checkup` ";
                      $query_run = mysqli_query($conn, $query);
                      $row = mysqli_fetch_array($query_run);

                      echo "<h6>$row[0]</h6>";
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-3 col-md-3">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Total <span>| Quantity of Approved Medicines</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri ri-capsule-fill"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $query = "SELECT SUM(quantity) as `sum` FROM `hcms_items_transac` WHERE `status` = 'Accepted'";
                      $query_run = mysqli_query($conn, $query);
                      $row = mysqli_fetch_array($query_run);
                      if ($row['sum'] != 0) {
                        echo "<h6>$row[0]</h6>";
                      } else {
                        echo "<h6>0</h6>";
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Total <span>| Disposed Medicines</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri ri-capsule-fill"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $query2 = "SELECT SUM(quantity) as `sum` FROM `hcms_items_transac` WHERE `status` = 'Disposed'";
                      $query_run2 = mysqli_query($conn, $query2);
                      $row2 = mysqli_fetch_array($query_run2);
                      if ($row2['sum'] != 0) {
                        echo "<h6>$row2[0]</h6>";
                      } else {
                        echo "<h6>0</h6>";
                      }

                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-3 col-md-3">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Total <span>| Quantity of Rejected Medicines</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri ri-capsule-fill"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $query2 = "SELECT SUM(quantity) as `sum` FROM `hcms_items_transac` WHERE `status` = 'Rejected'";
                      $query_run2 = mysqli_query($conn, $query2);
                      $row = mysqli_fetch_array($query_run2);
                      if ($row['sum'] != 0) {
                        echo "<h6>$row[0]</h6>";
                      } else {
                        echo "<h6>0</h6>";
                      }
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
                  <canvas id="pieChart" style="max-height: 400px;"></canvas>
                  <script>
                  const fetchData = async () => {
                    const res = await axios('test-config.php');
                    const data = res.data;
                    return data;
                  }

                  document.addEventListener("DOMContentLoaded", () => {
                    const data = fetchData();
                    const res = data.then((item) => {
                      let label = [];
                      let available = [];

                      item.forEach((i) => {
                        label.push(i.gen_name);
                        available.push(i.available);
                      })

                      new Chart(document.querySelector('#pieChart'), {
                        type: 'pie',
                        data: {
                          labels: label,
                          datasets: [{
                            label: 'My First Dataset',
                            data: available,
                            backgroundColor: [
                              'rgb(255, 99, 123)',
                              'rgb(54, 162, 78)',
                              'rgb(255, 205, 86)',
                              'rgb(100, 69, 132)',
                              'rgb(200, 162, 56)',
                              'rgb(250, 76, 86)'
                            ],
                            hoverOffset: 4
                          }]
                        }
                      });
                    });
                  })
                  </script>


                  <!-- End Pie CHart -->

                </div>
              </div>
            </div><!-- End Revenue Card -->
            <div class="col-lg-7">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Daily Total Incoming Medicine Quantity</h5>

                  <!-- Bar Chart -->
                  <canvas id="lineChart" style="max-height: 400px;"></canvas>

                  <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    const data = fetchData();
                    const res = data.then((item) => {
                      console.log(item);
                      let quantity = [];
                      let timestamp = [];
                      let arrayItems = [];
                      item.forEach((i, index) => {
                        quantity.push(+i.available);
                        timestamp.push(i.created_at);
                        // console.log(timestamp);
                        let items = {};
                        items.x = i.created_at;
                        items.y = +i.available;
                        arrayItems.push(items);
                      })

                      console.log(arrayItems);
                      const data = {
                        datasets: [{
                          label: 'Daily Total Incoming Medicine',
                          data: arrayItems,
                          borderColor: 'rgb(75, 192, 192)',
                          tension: 0.1
                        }]
                      }

                      const config = {
                        type: 'line',
                        data,
                        options: {
                          scales: {
                            x: [{
                              type: 'time',
                              time: {
                                unit: 'day'
                              },
                            }],
                            y: [{
                              beginAtZero: true
                            }]
                          }
                        }
                      }

                      new Chart(
                        document.querySelector('#lineChart'),
                        config
                      )
                    });
                  })
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