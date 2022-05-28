<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Staff | Category Reports</title>
<head>
<?php include ('core/css-links.php');//css connection?>

 <style>
      /*responsive*/
      @media(max-width: 500px){
        .table thead{
          display: none;
        }

        .table, .table tbody, .table tr, .table td{
          display: block;
          width: 100%;
        }
        .table tr{
          background: #ffffff;
          box-shadow: 0 8px 8px -4px lightblue;
          border-radius: 5%;
          margin-bottom:13px;
          margin-top: 13px;
        }
        .table td{
          /* max-width: 20px; */
          padding-left: 50%;
          text-align: right;
          position: relative;
        }
        .table td::before{      
          margin-top: 10px;      
          content: attr(data-label);
          position: absolute;
          left:0;
          width: 50%;
          padding-left:15px;
          font-size:15px;
          font-weight: bold;
          text-align: left;
        }
      }
    </style>
  </head>
</head>
<body>



<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'FR'; $col = 'reports';include ('core/sidebar.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Category Reports</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
         
          <li class="breadcrumb-item">Reports</li>
        
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: left; padding: 10px">
                </div>                   
              <!-- Report Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="myTabjustified" role="tablist" style="margin-top: 10px;">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id=" incoming-tab" data-bs-toggle="tab" data-bs-target="#IncomingDocs" type="button" role="tab" aria-controls="incoming" aria-selected="true">Category Records</button>
                </li>
               
            
              </ul>
              <div class="tab-content pt-2" id="myTabjustifiedContent">
                <div class="tab-pane fade show active" id="IncomingDocs" role="tabpanel" aria-labelledby=" incoming-tab">

                  <!-- IncomingDocs Docs -->
                  <section class="section">
                        <div class="row">        
                          <div class="col-lg-12">
                            <div class="card">
                              <div class="col-lg-12">
                                <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                                    <h4>Horray!! you did a great job today</h4>

                                </div>
                               
                              </div>
                              <div class="card-body" >           
                                <!-- Table for Office records -->
                                <table class="table table-hover datatable" >
                                  <thead>
                                    <tr>
                                   
                                      <th scope="col">Question</th>
                                      <th scope="col" >Answer/Instruction</th>
                                     
                                      <th scope="col">Date&Time</th>     
                                      <!-- <th scope="col">Downloads</th>    -->
                                      <!-- <th scope="col">Action</th>           -->
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      require_once("include/conn.php");
                                      $query="SELECT * FROM hdms_category ORDER BY date DESC";
                                      $result=mysqli_query($conn,$query);
                                      while($rs=mysqli_fetch_array($result)){
                                        $id =$rs['id']; 
                                        $category = $rs['category']; 
                                       
                                        $description = $rs['description'];  
                                        $date = $rs['date'];                   
                                    ?>
                                    <tr>
                                      <td style="display:none"><?php echo $id?></td>
                                      <td data-label="Question:"><?php echo $category; ?></td>
                                     
                                      <td data-label="Answer/Instruction:"><?php echo $description?></td> 
                                      <td data-label="Date:"><?php echo $date?></td>                                        
                                    </tr>

                                    <?php 
                                    } ?>
                                    
                                  </tbody>
                                </table>
                                <!-- End of Table -->

                              </div>
                            </div>

                          </div>
                        </div>
                        
                      </section>
                  <!-- End Table with stripped rows -->

                </div>
                <div class="tab-pane fade" id="ReceivedDocs" role="tabpanel" aria-labelledby="received-tab">
                  <!-- ReceivedDocs Docs -->
                  <!-- IncomingDocs Docs -->
                  <section class="section">
                        <div class="row">        
                          <div class="col-lg-12">
                            <div class="card">
                              <div class="col-lg-12">
                                <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                                    <h4>Record of your Information</h4>
                                </div>
                               
                              </div>
                              <div class="card-body" >           
                                <!-- Table for Office records -->
                                <div class="col-12">
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
                            </div>

                          </div>
                        </div>
                        
                      </section>
                  <!-- End Table with stripped rows -->
                </div>
               

                </div>
                
                </div>
                    
              </div><!-- End Default Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

 
  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>
  
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