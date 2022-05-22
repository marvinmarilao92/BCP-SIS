<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Accounting Logs</title>
<head>
<?php include ('core/css-links.php');//css connection?>
</head>

<body>
<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'D'; $col = 'list';include ('core/sidebar.php');//Design for sidebar?>

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
?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Accounting Logs</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item">Audit Trail</li>
    
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">

          <!-- Report Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="myTabjustified" role="tablist" style="margin-top: 10px;">
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100 active" id=" incoming-tab" data-bs-toggle="tab" data-bs-target="#IncomingDocs" type="button" role="tab" aria-controls="incoming" aria-selected="true">User Logs</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="received-tab" data-bs-toggle="tab" data-bs-target="#ReceivedDocs" type="button" role="tab" aria-controls="profile" aria-selected="false">Activity Logs</button>
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
                                <h4>Accounting Logs</h4>
                            </div>
                          </div>
                          <div class="card-body" >           
                            <!-- Table for Role records -->
                            <table class="table table-hover datatable" >
                              <thead>
                                <tr>
                                  <th scope="col">Username</th>
                                  <th scope="col">Full Name</th>  
                                  <th scope="col">Action</th>    
                                  <th scope="col">IP Address</th> 
                                  <th scope="col">Host</th>   
                                  <th scope="col">Date</th>        
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                  require_once("include/conn.php");
                                  $fname=$verified_session_role;
                                  $query="SELECT * FROM audit_logs WHERE `action_name` = 'hdms Accounting' ORDER BY login_time DESC ";
                                  $result=mysqli_query($conn,$query);
                                  while($rs=mysqli_fetch_array($result)){
                                    $id = $rs['account_no']; 
                                    $host = $rs['host']; 
                                    $action = $rs['action'];                        
                                    $ip =$rs['ip'];                                         
                                    $date =$rs['login_time'];
                                                               

                                    $sql1 = "SELECT *, LEFT(middlename,1) as MI FROM user_information WHERE `id_number` = '$id'";
                                        if($result1 = mysqli_query($link, $sql1)){
                                          if(mysqli_num_rows($result1) > 0){
                                            while($row1 = mysqli_fetch_array($result1)){
                                              $fname = $row1['firstname'];      
                                              $lname =$row1['lastname']; 
                                              $mname = $row1['MI']; 
                                            }
                                            // Free result set
                                            mysqli_free_result($result1);
                                          }
                                        }
                                ?>
                                <tr>                     
                                  <td data-label="Username:"><?php echo $id; ?></td>
                                  <td data-label="Full Name:"><?php echo $fname.' '.$mname.' '.$lname; ?></td>
                                  <td data-label="Dept:"><?php echo $action; ?></td>
                                  <td data-label="Status:"><?php echo $ip; ?></td>
                                  <td data-label="Date:"><?php echo $host?></td> 
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
                                <h4>Activity logs</h4>
                            </div>
                          </div>
                          <div class="card-body" >           
                            <!-- Table for Role records -->
                            <table class="table table-hover datatable" >
                              <thead>
                                <tr>
                                  <th scope="col">Username</th>
                                  <th scope="col">Full Name</th>  
                                  <th scope="col">Action</th>    
                                  <th scope="col">Message</th> 
                                  <th scope="col">IP Address</th> 
                                  <th scope="col">Host</th>   
                                  <th scope="col">Date</th>  
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                    require_once("include/conn.php");
                                    $fname=$verified_session_role; 
                                    $query="SELECT * FROM audit_trail WHERE `actor` = 'hdms Accounting' ORDER BY date DESC ";
                                    $result=mysqli_query($conn,$query);
                                    while($rs=mysqli_fetch_array($result)){
                                      $id = $rs['account_no']; 
                                      $host = $rs['host']; 
                                      $action = $rs['action'];                        
                                      $affected = decryptthis($rs['affected'], $key); 
                                      $ip =$rs['ip'];                                         
                                      $date =$rs['date'];
                                                                

                                      $sql1 = "SELECT *, LEFT(middlename,1) as MI FROM user_information WHERE `id_number` = '$id'";
                                          if($result1 = mysqli_query($link, $sql1)){
                                            if(mysqli_num_rows($result1) > 0){
                                              while($row1 = mysqli_fetch_array($result1)){
                                                $fname = $row1['firstname'];      
                                                $lname =$row1['lastname']; 
                                                $mname = $row1['MI']; 
                                              }
                                              // Free result set
                                              mysqli_free_result($result1);
                                            }
                                          }
                                  ?>
                                  <tr>                     
                                    <td data-label="Username:"><?php echo $id; ?></td>
                                    <td data-label="Full Name:"><?php echo $fname.' '.$mname.' '.$lname; ?></td>
                                    <td data-label="Dept:"><?php echo $action; ?></td>
                                    <td data-label="Dept:"><?php echo $affected; ?></td>
                                    <td data-label="Status:"><?php echo $ip; ?></td>
                                    <td data-label="Date:"><?php echo $host?></td> 
                                    <td data-label="Date:"><?php echo $date?></td>                                         
                                  </tr>

                                  <?php } ?>
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