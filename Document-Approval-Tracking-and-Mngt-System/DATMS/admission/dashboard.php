<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>ADMINSSION | Dashboard</title>
<head>
<?php include ('core/css-links.php');//css connection?>
</head>

<body>
<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'dashboard';include ('core/side-nav.php');//Design for sidebar?>

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
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Reports</h6>
                    </li>

                    <li><a class="dropdown-item" href="create_office.php">Show</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Online Application <span>| Students</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-house-door"></i>
                    </div>
                    <div class="ps-3">
                      <?php 
                        require_once("include/conn.php");
                        $query="SELECT *,LEFT(middlename,1) FROM student_application WHERE `account_status` NOT IN ('Enrolled') ORDER BY stud_date DESC ";
                        $result=mysqli_query($conn,$query);
                        if($result){
                          echo "<h6>". mysqli_num_rows($result)."</h6>";
                        }
                      ?> 
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Number of Unoffically Enrolled</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- User Accounts Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Officially Enrolled <span>| Students</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <?php 
                        require_once("include/conn.php");
                        $query="SELECT *,LEFT(middlename,1) FROM student_information WHERE account_status = 'Official' ORDER BY stud_date DESC ";
                        $result=mysqli_query($conn,$query);
                        if($result){
                          echo "<h6>". mysqli_num_rows($result)."</h6>";
                        }
                      ?> 
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Number of Enrolled</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End User Accounts Card -->

            <!-- Faculty account -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                    <h6>Reports</h6>
                    </li>
                    <li><a class="dropdown-item" href="create_doctype.php">Show</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Deactivated <span>| Account</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal"></i>
                    </div>
                    <div class="ps-3">
                    <?php 
                        require_once("include/conn.php");
                        $query="SELECT *,LEFT(middlename,1) FROM student_information WHERE account_status = 'Deactivated' ORDER BY stud_date DESC ";
                        $result=mysqli_query($conn,$query);
                        if($result){
                          echo "<h6>". mysqli_num_rows($result)."</h6>";
                        }
                      ?> 
                      <span class="text-danger small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Number of Department</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Tables</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Show</a></li>
                  </ul>
                </div>
                <!-- Bar Chart -->
                <div class="card-body">
                  <h5 class="card-title">Student Enrolled <span>| Per Department</span></h5>
                <canvas id="barChart" style="max-height: 400px;"></canvas>
                 <?php
                       require_once("include/conn.php");

                             $sql ="SELECT *,count(course) as count FROM student_information group by course;";
                             $result = mysqli_query($conn,$sql);
                             $chart_data="";
                             while ($row = mysqli_fetch_array($result)) { 
                     
                                $name[]  = $row['course']  ;
                                $counts[] = $row['count'];
                            }
                     
                    ?>
                </div>
              <!-- End Bar CHart -->
              </div>
            </div><!-- End Reports -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Website Traffic -->
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Student Enrolled <span>| Graph</span></h5>
              <canvas id="accountChart" style="height: 400px; margin-bottom: 30px;" class="echart"></canvas>
                  <?php
                       require_once("include/conn.php");
                             $sql1 ="SELECT *,count(account_status) as count FROM student_information group by account_status;";
                             $result1 = mysqli_query($conn,$sql1);
                             $chart_data="";
                             while ($row1 = mysqli_fetch_array($result1)) { 
                     
                                $name1[]  = $row1['account_status']  ;
                                $counts1[] = $row1['count'];
                            }
                            $sql11 ="SELECT account_status FROM student_information";
                            $result11 = mysqli_query($conn,$sql11);
                            $total1 = mysqli_num_rows($result11);
                            $overall1[] = $total1;
                    ?>
            </div>
          </div><!-- End Website Traffic -->
        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center" style="background-color: rgb(13, 110, 253);"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>
<!-- Charts -->
<script>
     // BAR
    var ctx = document.getElementById("barChart").getContext('2d');
        var myTrackedChart = new Chart(ctx, {
          type: 'bar',
        data: {
                labels:<?php echo json_encode($name); ?>,
                datasets: [{
                    label: 'Documents Count',
                    backgroundColor: [
                        'rgb(13, 110, 253)',
                        'rgb(220, 53, 69)',
                        'rgb(4, 165, 66)',
                        'rgb(255, 193, 7)',
                        'rgb(108, 117, 125)',
                        'rgb(104, 174, 236)',
                        'rgb(255, 145, 26)'
                        
                      ],
                      borderColor: [
                        'rgb(255, 255, 255)'
                      ],
                      hoverOffset: 10,
                      borderWidth: 4,
                    data:<?php echo json_encode($counts); ?>,
                }]
            },
          options: {
              legend: {
                display: false
              },
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]

            }
          }
        });


    //pie
    var data = [{
          data: <?php echo json_encode($counts1); ?>,
          backgroundColor: [
            'rgb(13, 110, 253)',
            'rgb(220, 53, 69)',
            'rgb(4, 165, 66)',
            'rgb(255, 193, 7)',
            'rgb(108, 117, 125)',
            'rgb(104, 174, 236)',
            'rgb(255, 145, 26)'
            
          ],
          borderColor: [
            'rgb(255, 255, 255)'
          ],
          hoverOffset: 15,
          borderWidth: 4,
        }];

        var options = {
          tooltips: {
            enabled: true
          },
          plugins: {
            datalabels: {
              formatter: (value, ctx) => {
                const datapoints = ctx.chart.data.datasets[0].data
                const total = datapoints.reduce((total, datapoint) => total + datapoint, 0)
                const percentage = value / <?php echo json_encode($overall1);?> * 100
                return percentage.toFixed(2) + "%";
              },
              color: 'rgb(255, 255, 255)',
              font: {
                size: 15,
                weight: '700'
              },
              
              
            }
          }
        };

        var ctx = document.getElementById("accountChart").getContext('2d');
        var myDoughChart = new Chart(ctx, {
          type: 'pie',
          data: {
          labels: <?php echo json_encode($name1); ?>,
            datasets: data
          },
          options: options,
          plugins: [ChartDataLabels],
        }); 
  </script>
</body>

</html>