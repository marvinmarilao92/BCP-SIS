<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Dashboard</title>

  <head>
  <?php include ('core/css-links.php');//css connection?>
  <?php  include "core/key_checker.php"; ?>
  </head>

  <body>
    <div id="loader" class="center"></div>
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

              <!-- Document Count Card -->
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
                    <h5 class="card-title">Department <span>| Count</span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-building"></i>
                      </div>
                      <div class="ps-3">
                        <?php 
                          require_once("include/conn.php");
                          $query="SELECT * FROM datms_dept";
                          $result=mysqli_query($conn,$query);
                          if($result){
                            echo "<h6>". mysqli_num_rows($result)."</h6>";
                          }
                        ?> 
                        <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Number of Department</span>

                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- End Document Count Card -->

              <!-- User Accounts Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">

                  <div class="card-body">
                    <h5 class="card-title">Users <span>| Accounts</span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <?php 
                          require_once("include/conn.php");
                          $query="SELECT * FROM user_information WHERE `department` = 'DATMS'";
                          $result=mysqli_query($conn,$query);
                          if($result){
                            echo "<h6>". mysqli_num_rows($result)."</h6>";
                          }
                        ?> 
                        <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Number of Accounts</span>

                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- End User Accounts Card -->

              <!-- Types of Documents account -->
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
                    <h5 class="card-title">Types of Documents</h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-journal"></i>
                      </div>
                      <div class="ps-3">
                      <?php 
                          require_once("include/conn.php");
                          $query="SELECT * FROM datms_doctype";
                          $result=mysqli_query($conn,$query);
                          if($result){
                            echo "<h6>". mysqli_num_rows($result)."</h6>";
                          }
                        ?> 
                        <span class="text-danger small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Number of DocType</span>

                      </div>
                    </div>

                  </div>
                </div>

              </div>
              <!-- End Types of Documents Card -->

              <!-- Document Tracked Chart -->
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
                    <h5 class="card-title">Document Tracked <span>| Per Department</span></h5>
                  <canvas id="TrackedbarChart" style="max-height: 400px;"></canvas>
                  <?php
                    require_once("include/conn.php");
                      $sql ="SELECT *,count(doc_off3) as count3 FROM datms_documents group by doc_off3;";
                      $result = mysqli_query($conn,$sql);
                      $chart_data="";
                      while ($row = mysqli_fetch_array($result)) { 
              
                          $name[]  = $row['doc_off3']  ;
                          $counts[] = $row['count3'];
                      }                    
                    ?>              
                  </div>                
                </div>
              </div>
              <!-- End Document Tracked Chart -->

              <!-- Student Enrolled per year -->
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
                    <h5 class="card-title">Students Enrolled<span> | Per Year</span></h5>
                  <canvas id="StudlineChart" style="max-height: 400px;"></canvas>
                  <?php
                    require_once("include/conn.php");
                      $sql3="SELECT *, YEAR(`stud_date`) AS Stud_Year, count('Stud_Year') as countyear FROM student_information group by Stud_Year";
                      //  $sql ="SELECT *,count(doc_off3) as count FROM datms_documents group by doc_off3;";
                      $result3 = mysqli_query($conn,$sql3);
                      $chart_data="";
                      while ($row3 = mysqli_fetch_array($result3)) { 
                          $name3[]  = $row3['Stud_Year']  ;
                          $counts3[] = $row3['countyear'];
                      }                    
                  ?>            
                  </div>
                <!-- End Bar CHart -->
                </div>
              </div>
              <!-- End Student Enrolled per year -->

            </div>
          </div>
          <!-- End Left side columns -->

          <!-- Right side columns -->
          <div class="col-lg-4">

            <!-- User Accounts per role -->
            <div class="card">
              <div class="card-body pb-0">
                <h5 class="card-title">User Accounts <span>| Per Role</span></h5>

                <canvas id="accountChart" style="height: 400px; margin-bottom: 30px;" class="echart"></canvas>
                    <?php
                      require_once("include/conn.php");
                        $sql1 ="SELECT *,count(office) as count1 FROM user_information WHERE department='DATMS' group by office;";
                        $result1 = mysqli_query($conn,$sql1);                    
                        $chart_data="";
                        while ($row1 = mysqli_fetch_array($result1)) { 
                
                            $name1[]  = $row1['office']  ;
                            $counts1[] = $row1['count1'];
                        }
                        $sql11 ="SELECT office FROM user_information WHERE department='DATMS' ";
                        $result11 = mysqli_query($conn,$sql11);
                        $total1 = mysqli_num_rows($result11);
                        $overall1[] = $total1;
                      ?>
              </div>
            </div>
            <!-- End User Accounts per role -->

            <!-- Student Count per program -->
            <div class="card">
              <div class="card-body pb-0">
                <h5 class="card-title">Student Count <span>| Per Program</span></h5>
                <canvas id="studChart" style="height: 400px; margin-bottom: 30px;" class="echart"></canvas>
                    <?php
                      require_once("include/conn.php");
                        $sql2 ="SELECT course,count(course) as count2 FROM student_information group by course;";
                        $result2 = mysqli_query($conn,$sql2);
                        $chart_data="";
                        while ($row2 = mysqli_fetch_array($result2)) { 
                
                            $name2[]  = $row2['course'];
                            $counts2[] = $row2['count2'];
                        }
                        $sql22 ="SELECT course FROM student_information";
                        $result22 = mysqli_query($conn,$sql22);
                        $total2 = mysqli_num_rows($result22);
                        $overall2[] = $total2;
                      ?>
              </div>
            </div>
            <!-- End Student Count per program -->

          </div>
          <!-- End Right side columns -->

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
      // Prevent you from turning back or using back button
      (function (global) {

        if(typeof (global) === "undefined") {
            throw new Error("window is undefined");
        }

        var _hash = "!";
        var noBackPlease = function () {
            global.location.href += "#";

            // Making sure we have the fruit available for juice (^__^)
            global.setTimeout(function () {
                global.location.href += "!";
            }, 50);
        };

        global.onhashchange = function () {
            if (global.location.hash !== _hash) {
                global.location.hash = _hash;
            }
        };

        global.onload = function () {
            noBackPlease();

            // Disables backspace on page except on input fields and textarea..
            document.body.onkeydown = function (e) {
                var elm = e.target.nodeName.toLowerCase();
                if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                    e.preventDefault();
                }
                // Stopping the event bubbling up the DOM tree...
                e.stopPropagation();
            };
        }
      })(window);
      document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.querySelector(
                  "body").style.visibility = "hidden";
                document.querySelector(
                  "#loader").style.visibility = "visible";
            } else {
                document.querySelector(
                  "#loader").style.display = "none";
                document.querySelector(
                  "body").style.visibility = "visible";
            }
        };
        // BAR
        var ctx = document.getElementById("TrackedbarChart").getContext('2d');
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

        // Line
        var ctx = document.getElementById("StudlineChart").getContext('2d');
        var myStudChart = new Chart(ctx, {
          type: 'line',
        data: {
                labels:<?php echo json_encode($name3); ?>,
                datasets: [{
                    label: 'Number of Students ',
                            fill: false,
                            borderColor: 'rgb(13, 110, 253)',
                            // tension: 0.1,
                            borderWidth: 2,
                            hoverOffset: 5,
                            data:<?php echo json_encode($counts3); ?>,
                }]
            },
          options: {
            responsive: true,
                interaction: {
                intersect: false,
                axis: 'x'
              },
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
                    size: 13,
                    weight: '500'
                  },
                  
                  
                }
              }
            };

            var ctx = document.getElementById("accountChart").getContext('2d');
            var myDoughChart = new Chart(ctx, {
              type: 'doughnut',
              data: {
              labels: <?php echo json_encode($name1); ?>,
                datasets: data
              },
              options: options,
              plugins: [ChartDataLabels],
            }); 


        //stud radio
        var data = [{
              data: <?php echo json_encode($counts2); ?>,
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
                    const percentage = value / <?php echo json_encode($overall2);?> * 100
                    return percentage.toFixed(2) + "%";
                  },
                  color: 'rgb(255, 255, 255)',
                  font: {
                    size: 13,
                    weight: '500'
                  }
                }
              }
            };

            var ctx = document.getElementById("studChart").getContext('2d');
            var myAreaChart = new Chart(ctx, {
              type: 'pie',
              data: {
              labels: <?php echo json_encode($name2); ?>,
                datasets: data
              },
              
              options: options,
              plugins: [ChartDataLabels],
            });


    </script>
    <!-- End of Charts -->
  </body>

</html>