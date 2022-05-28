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

<!-- status tickets -->
<div class="card">
              <div class="card-body pb-0">
                <!-- <h5 class="card-title">Status <span>| Ticket<br><br><b>0 = New&nbsp;&nbsp;&nbsp;1 = Pending&nbsp;&nbsp;&nbsp;2 = Done</b>
              </span></h5> -->
                <canvas id="status" style="height: 400px; margin-bottom: 30px;" class="echart"></canvas>
                    <?php
                      require_once("include/conn.php");
                        $sql2 ="SELECT status,count(status) as count2 FROM hdms_tickets group by status;";
                        $result2 = mysqli_query($conn,$sql2);
                        $chart_data="";
                        while ($row2 = mysqli_fetch_array($result2)) { 
                
                          $nameid  = $row2['status'];
                          if($nameid==0){
                            $name2[]='New';
                          }else if($nameid==1){
                            $name2[]='Pending';
                          }else if($nameid==2){
                            $name2[]='Done';
                          }
                          $counts2[] = $row2['count2'];
                        }
                        $sql22 ="SELECT status FROM hdms_tickets";
                        $result22 = mysqli_query($conn,$sql22);
                        $total2 = mysqli_num_rows($result22);
                        $overall2[] = $total2;
                      ?>
              </div>
            </div>


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
     var data = [{
              data: <?php echo json_encode($counts2); ?>,
              backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
                
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

            var ctx = document.getElementById("status").getContext('2d');
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