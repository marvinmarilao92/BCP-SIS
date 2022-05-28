<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Cashier | FAQS Reports</title>
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
      <h1>Ticket Reports</h1>
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
                  <button class="nav-link w-100 active" id=" incoming-tab" data-bs-toggle="tab" data-bs-target="#IncomingDocs" type="button" role="tab" aria-controls="incoming" aria-selected="true">FAQs Reports</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="received-tab" data-bs-toggle="tab" data-bs-target="#ReceivedDocs" type="button" role="tab" aria-controls="profile" aria-selected="false">Activity</button>
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
                                    <h4>FAQs reports</h4>

                                </div>
                               
                              </div>
                              <div class="card-body" >           
                                <!-- Table for Office records -->
                                <table class="table table-hover datatable" >
                                  <thead>
                                    <tr>
                                   
                                      <th scope="col">Quesiton</th>
                                      
                                      <th scope="col" >Answer/Instruction</th>
                              
                                      <!-- <th scope="col">Filesize</th>    -->
                                     
                                      <th scope="col">Date&Time</th>     
                                      <!-- <th scope="col">Downloads</th>    -->
                                      <!-- <th scope="col">Action</th>           -->
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      require_once("include/conn.php");
                                      $query="SELECT * FROM hd_department WHERE shortDesc = 'Cashier' ORDER BY date DESC ";
                                      $result=mysqli_query($conn,$query);
                                      while($rs=mysqli_fetch_array($result)){
                                        $id =$rs['id']; 
                          
                                        $title = $rs['title'];
                                        $longDesc = $rs['longDesc'];
                                        
                                        $date = $rs['date'];                   
                                    ?>
                                    <tr>
                                      <td style="display:none"><?php echo $id?></td>
                                      <td data-label="Quesiton:"><?php echo $title; ?></td>
                                      <td data-label="Answer/Instruction:"><?php echo $longDesc;?></td>
                                  
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
                                    <h4>You have done a great job today!!</h4>
                                </div>
                               
                              </div>
                              
                                <!-- Recent Activity -->
                         
                                    <div class="card-body">
                                      <h5 class="card-title">Activity</span></h5>

                                      <div class="activity">

                                        <?php 
                                      //THE KEY FOR ENCRYPTION AND DECRYPTION
                                    $key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';


                                    //ENCRYPT FUNCTION
                                    function encryptthis($data, $key) {
                                    $encryption_key = base64_decode($key);
                                    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
                                    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
                                    return base64_encode($encrypted . '::' . $iv);
                                    }


                                    //DECRYPT FUNCTION
                                    function decryptthis($data, $key) {
                                    $encryption_key = base64_decode($key);
                                    list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
                                    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
                                    }
                                   
                                        $sql = "SELECT * FROM audit_trail where actor = 'hdms Cashier' ORDER BY id DESC LIMIT 10";
                                          if($result = mysqli_query($link, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                              while($row = mysqli_fetch_array($result)){
                                                $current_date = strtotime(date('Y-m-d H:i:s'));
                                                $action_date = strtotime($row['date']);
                                                $seconds = $current_date - $action_date;
                                                if($seconds < 60){
                                                  $count = round($seconds, 0);
                                                  $time = $count." secs";
                                                }else if($seconds < 3600){
                                                  $count = round($seconds/60, 0);
                                                  $time = $count." mins";
                                                }else if($seconds < 86400){
                                                  $count = round($seconds/3600, 0);
                                                  $time = $count." hours";
                                                }else if($seconds < 604800){
                                                  $count = round($seconds/86400, 0);
                                                  $time = $count." days";
                                                }
                                                ?>
                                                <div class="activity-item d-flex">
                                                  <div class="activite-label"><?php echo $time; ?></div>&nbsp;&nbsp;
                                                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>&nbsp;&nbsp;
                                                  <div class="activity-content">
                                                    <?php echo $row['action']; ?><?php echo decryptthis($row['affected'], $key); ?>
                                                  </div>
                                                </div><!-- End activity item-->
                                                <?php
                                              }
                                            } else{
                                                ?>
                                                <div class="activity-item d-flex">
                                                  <div class="activity-content">
                                                    No Recent Activity
                                                  </div>
                                                </div><!-- End activity item-->
                                                <?php
                                            }
                                          } else{
                                              echo "Oops! Something went wrong. Please try again later.";
                                          }
                                        ?>


                                    
                                        </div>
                           
                                    </div><!-- End Recent Activity -->
                                     <!-- Recent Activity -->
                         
                                     <div class="card-body">
                                      <h5 class="card-title">Login Activity</span></h5>

                                      <div class="activity">

                                        <?php 
                                    
                                   
                                        $sql = "SELECT * FROM audit_logs where action_name = 'hdms Cashier' ORDER BY id DESC LIMIT 5";
                                          if($result = mysqli_query($link, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                              while($row = mysqli_fetch_array($result)){
                                                $current_date = strtotime(date('Y-m-d H:i:s'));
                                                $action_date = strtotime($row['login_time']);
                                                $seconds = $current_date - $action_date;
                                                if($seconds < 60){
                                                  $count = round($seconds, 0);
                                                  $time = $count." secs";
                                                }else if($seconds < 3600){
                                                  $count = round($seconds/60, 0);
                                                  $time = $count." mins";
                                                }else if($seconds < 86400){
                                                  $count = round($seconds/3600, 0);
                                                  $time = $count." hours";
                                                }else if($seconds < 604800){
                                                  $count = round($seconds/86400, 0);
                                                  $time = $count." days";
                                                }
                                                ?>
                                                <div class="activity-item d-flex">
                                                  <div class="activite-label"><?php echo $time; ?></div>&nbsp;&nbsp;
                                                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>&nbsp;&nbsp;
                                                  <div class="activity-content">
                                                 <b>Activity:&nbsp;</b><?php echo $row['action']; ?><br><b>Time:</b>&nbsp;<?php echo $row['login_time']; ?><br><b>host:</b>&nbsp;<?php echo $row['host']; ?>
                                                  </div>
                                                </div><!-- End activity item-->
                                                <?php
                                              }
                                            } else{
                                                ?>
                                                <div class="activity-item d-flex">
                                                  <div class="activity-content">
                                                    No Recent Activity
                                                  </div>
                                                </div><!-- End activity item-->
                                                <?php
                                            }
                                          } else{
                                              echo "Oops! Something went wrong. Please try again later.";
                                          }
                                        ?>


                                    
                                        </div>
                           
                                    </div><!-- End Recent Activity -->
                                

                              </div>
                            </div>

                          </div>
                        </div>
                        
                      </section>
                  <!-- End Table with stripped rows -->
                  
                </div>
               

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

</body>

</html>