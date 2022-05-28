<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Admin | Activity</title>
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
<?php $page = 'AC'; $col = 'reports';include ('core/sidebar.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Reports</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
         
          <li class="breadcrumb-item">Reports</li>
        
        </ol>
      </nav>
    </div><!-- End Page Title -->

<section class="section">
                        <div class="row">        
                          <div class="col-lg-12">
                            <div class="card">
                              <div class="col-lg-12">
                                <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                                    <h4>Your daily activity</h4>
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
                                   
                                        $sql = "SELECT * FROM audit_trail where account_no = '".$verified_session_username."' ORDER BY id DESC LIMIT 10";
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
                                

                              </div>
                            </div>

                          </div>
                        </div>
                        
                      </section>
                  <!-- End Table with stripped rows -->
                  <section class="section">
                        <div class="row">        
                          <div class="col-lg-12">
                            <div class="card">
                              <div class="col-lg-12">
                                <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                                
                                </div>
                               
                              </div>
                              
                                <!-- Recent Activity -->
                         
                                    <div class="card-body">
                                      <h5 class="card-title">Activity</span></h5>

                                      <div class="activity">

                                        <?php 
                                    
                                   
                                        $sql = "SELECT * FROM audit_logs where account_no = '".$verified_session_username."' ORDER BY id DESC LIMIT 10";
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
                                                 <b>Activity:&nbsp;</b><?php echo $row['action']; ?><br><b>Time:</b>&nbsp;<?php echo $row['login_time']; ?><br><b>Your host:</b>&nbsp;<?php echo $row['host']; ?>
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
  </main><!-- End #main -->

 
<!-- ======= Footer ======= -->
<?php include ('core/footer.php');//css connection?>
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files/ Template main js file -->
<?php include ('core/js.php');//css connection?>

</body>

</html>