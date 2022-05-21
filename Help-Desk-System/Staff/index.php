<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Help Desk | Dashboard</title>
<head>
<?php include ('core/css-links.php');//css connection?>
</head>


<body>
<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'PRO';include ('core/sidebar.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

          

            <!-- User Accounts Card -->
            <div class="col-xxl-6">
            <div data-bs-toggle="modal" data-bs-target="#largeModal" class="card info-card sales-card">

                <div class="card-body">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="ticket.php?id=<?php echo $_SESSION["login_key"];?>">Show</a></li>
                  </ul>
                </div>
                  <h5 class="card-title">Total <span>| Ticket</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-card-checklist"></i>
                    </div>
                    <div class="ps-3">
                    <?php 
                     
                      require_once("include/conn.php");
                     
                      $query="SELECT * FROM hdms_tickets";
                      $result=mysqli_query($conn,$query);
                      if($result){
                        echo" <h6>".mysqli_num_rows($result)."</h6>";
                        }
                  ?> 
    
               
                       
                      

                     
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Tickets</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End User Accounts Card -->

            <div class="col-xxl-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="task.php?id=<?php echo $_SESSION["login_key"];?>">Show</a></li>
                  </ul>
                </div>
                  <h5 class="card-title">Category <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-card-checklist"></i>
                    </div>
                    <div class="ps-3">
                    <?php 
                  require_once("include/conn.php");
                 
                  $query="SELECT * FROM hdms_category";
                  $result=mysqli_query($conn,$query);
                  if($result){
                    echo" <h6>".mysqli_num_rows($result)."</h6>";
                    }
              ?> 

                     
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Category</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End User Accounts Card -->

           
            

          <!-- Reports -->
  <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="ticket.php?id=<?php echo $_SESSION["login_key"];?>">Show</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Ticket <span> | Reports</span></h5>

                  <!-- Bar Chart -->
                  <div id="piechart" style="width: 900px; height: 500px;"></div>  
                 <?php
                 include "include/conn.php";
                  $query = "SELECT category, count(*) as number FROM hdms_tickets GROUP BY category";  
 $result = mysqli_query($conn, $query);  
 ?> 
              
              <!-- End Bar CHart -->

                </div>

              </div>
            </div><!-- End Reports -->

            
          



          </div>
        </div><!-- End Left side columns -->

         <!-- Right side columns -->
         <div class="col-lg-4">

<!-- Website Traffic -->
<div class="card">      

<div class="card-body">
  <h5 class="card-title">Recent <span>| Activity</span></h5>

  <div class="activity">

    <div class="activity-item d-flex">
      <div class="activite-label">32 min</div>
      <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
      <div class="activity-content">
        Recent activity must be put here <a href="#" class="fw-bold text-dark">(Highlight of the Recent activity)</a>
      </div>
    </div><!-- End activity item-->

    <div class="activity-item d-flex">
      <div class="activite-label">56 min</div>
      <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
      <div class="activity-content">
        Recent activity must be put here <a href="#" class="fw-bold text-dark">(Highlight of the Recent activity)</a>
      </div>
    </div><!-- End activity item-->

    <div class="activity-item d-flex">
      <div class="activite-label">2 hrs</div>
      <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
      <div class="activity-content">
        Recent activity must be put here <a href="#" class="fw-bold text-dark">(Highlight of the Recent activity)</a>
      </div>
    </div><!-- End activity item-->

    <div class="activity-item d-flex">
      <div class="activite-label">1 day</div>
      <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
      <div class="activity-content">
        Recent activity must be put here <a href="#" class="fw-bold text-dark">(Highlight of the Recent activity)</a>
      </div>
    </div><!-- End activity item-->

    <div class="activity-item d-flex">
      <div class="activite-label">2 days</div>
      <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
      <div class="activity-content">
        Recent activity must be put here <a href="#" class="fw-bold text-dark">(Highlight of the Recent activity)</a>
      </div>
    </div><!-- End activity item-->

    <div class="activity-item d-flex">
      <div class="activite-label">4 weeks</div>
      <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
      <div class="activity-content">
        Recent activity must be put here <a href="#" class="fw-bold text-dark">(Highlight of the Recent activity)</a>
      </div>
    </div><!-- End activity item-->

  </div>

</div>
</div><!-- End Recent Activity -->
</div><!-- End Right side columns -->


      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//footer?>

  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


 <!-- Vendor JS Files/ Template main js file -->
 <?php include ('core/js.php');//css connection?> 
   <script>
               var ctx = document.getElementById("barChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
     data: {
        labels:<?php echo json_encode($name); ?>,
            datasets: [{
                 label: 'F.A.Q.S',
                  backgroundColor: [
                          'rgb(255, 99, 132, 0.2)',
                          'rgb(255, 159, 64, 0.2)',
                          'rgb(255, 205, 86, 0.2)',
                          'rgb(75, 192, 192, 0.2)',
                          'rgb(54, 162, 235, 0.2)',
                          'rgb(153, 102, 255, 0.2)',
                          'rgb(201, 203, 207, 0.2)'
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
                        borderWidth: 1,
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

     var ctx = document.getElementById("barChart1").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
     data: {
        labels:<?php echo json_encode($name1); ?>,
            datasets: [{
                 label: 'F.A.Q.S',
                  backgroundColor: [
                          'rgb(255, 99, 132, 0.2)',
                          'rgb(255, 159, 64, 0.2)',
                          'rgb(255, 205, 86, 0.2)',
                          'rgb(75, 192, 192, 0.2)',
                          'rgb(54, 162, 235, 0.2)',
                          'rgb(153, 102, 255, 0.2)',
                          'rgb(201, 203, 207, 0.2)'
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
                        borderWidth: 1,
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
     var ctxP = document.getElementById("accountChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'doughnut',      
      data: {
        labels:<?php echo json_encode($name2); ?>,
            datasets: [{
                 label: 'Pie Chart',
                  backgroundColor: [
                          'rgba(255, 99, 132, 0.5)',
                          'rgba(255, 159, 64, 0.5)',
                          'rgba(255, 205, 86, 0.5)',
                          'rgba(75, 192, 192, 0.5)',
                          'rgba(54, 162, 235, 0.5)',
                          'rgba(153, 102, 255, 0.5)',
                          'rgba(201, 203, 207, 0.5)'
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
                        
                        borderWidth: 1,
                data:<?php echo json_encode($counts1); ?>,
            }]
      },
      options: {
        responsive: true,
        legend: false
      }, 
      labelLine: {
        show: false
      },
      
    });

              </script>
              
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['category', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["category"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of every category',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script> 



  

    </body>
</html>