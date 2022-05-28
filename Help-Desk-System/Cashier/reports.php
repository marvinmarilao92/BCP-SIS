<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Cashier | Ticket Reports</title>
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






<?php


include "new_db.php";

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





ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




$new_status=0;
$waiting_reply_status=1;
$closed_status=2;

$new_count=0;
$reply_count=1;
$closed_count=2;

$db=new DB();

$new_tickets_query="SELECT COUNT(*) AS new_tickets FROM hdms_tickets WHERE status=$new_status";
$ntr=$db->conn->query($new_tickets_query); 
if($ntr->num_rows > 0){
    while ($row = $ntr->fetch_assoc()) {
        $new_count=$row['new_tickets'];
    }
}

$reply_tickets_query="SELECT COUNT(*) AS new_tickets FROM hdms_tickets WHERE status=$waiting_reply_status";
$rtc=$db->conn->query($reply_tickets_query);
if($rtc->num_rows > 0){
    while ($row = $rtc->fetch_assoc()) {
        $reply_count=$row['new_tickets'];
    }
}

$closed_tickets_query="SELECT COUNT(*) AS new_tickets FROM hdms_tickets WHERE status=$closed_status ";
$ctr=$db->conn->query($closed_tickets_query);
if($ctr->num_rows > 0){
    while ($row = $ctr->fetch_assoc()) {
        $closed_count=$row['new_tickets'];
    }
}
$latest=[];
$recodes=$db->conn->query("SELECT * FROM hdms_tickets WHERE ticket_department = 'hdms Cashier' ORDER BY date DESC");
if($recodes->num_rows >0){
    while ($row = $recodes->fetch_assoc()) {
        $latest[]=$row;
    }
}

?>



<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'TR'; $col = 'reports';include ('core/sidebar.php');//Design for sidebar?>

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
                  <button class="nav-link w-100 active" id=" incoming-tab" data-bs-toggle="tab" data-bs-target="#IncomingDocs" type="button" role="tab" aria-controls="incoming" aria-selected="true">New Tickets</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="received-tab" data-bs-toggle="tab" data-bs-target="#ReceivedDocs" type="button" role="tab" aria-controls="profile" aria-selected="false">Pending</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="approved-tab" data-bs-toggle="tab" data-bs-target="#ApprovedDocs" type="button" role="tab" aria-controls="approved" aria-selected="false">Solved</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="approved-tab" data-bs-toggle="tab" data-bs-target="#Total" type="button" role="tab" aria-controls="approved" aria-selected="false">Total tickets</button>
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
                                    <h4>Your department Ticket</h4>

                                </div>
                               
                              </div>
                              <div class="card-body" >           
                                <!-- Table for Office records -->
                                <table class="table table-hover datatable" >
                                  <thead>
                                    <tr>
                                   
                                      <th scope="col">Student No.</th>
                                      <th scope="col" >Fullname</th>
                                      <th scope="col" >Subject</th>
                                      <th scope="col">Course</th>
                                     
                                      <th scope="col" >Status</th>
                                      <!-- <th scope="col">Filesize</th>    -->
                                     
                                      <th scope="col">Date&Time</th>     
                                      <!-- <th scope="col">Downloads</th>    -->
                                      <!-- <th scope="col">Action</th>           -->
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      require_once("include/conn.php");
                                      $query="SELECT * FROM hdms_tickets WHERE status=$new_status AND ticket_department = 'hdms Cashier' ORDER BY date DESC ";
                                      $result=mysqli_query($conn,$query);
                                      while($rs=mysqli_fetch_array($result)){
                                        $id =$rs['id']; 
                                        $student_number = $rs['student_number']; 
                                        $firstname = $rs['firstname']; 
                                        $lastname = $rs['lastname'];
                                        $category = $rs['category'];
                                        $status = $rs['status'];
                                        $course = $rs['course']; 
                                        $date = $rs['date'];                   
                                    ?>
                                    <tr>
                                      <td style="display:none"><?php echo $id?></td>
                                      <td data-label="ticket ID:"><?php echo $student_number; ?></td>
                                      <td data-label="Fullname:"><?php echo $firstname.' '.$lastname; ?></td>
                                      <td data-label="Subject:"><?php echo  $category; ?></td>
                                      <td data-label="Course:"><?php echo $course?></td> 
                                      <td data-title = "Status ">
                                          <?php if($rs['status'] == 0): ?>
                                            <span class="badge bg-primary">New</span>
                                          <?php elseif($rs['status'] == 1): ?>
                                            <span class="badge bg-warning text-dark">Pending/processing</span>
                                          <?php elseif($rs['status'] == 2): ?>
                                            <span class="badge bg-success">Done</span>
                                          <?php else: ?>
                                            <span class="badge badge-secondary">Closed</span>
                                          <?php endif; ?>
                                         </td>

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
                                    <h4>Pending/Proccessing ticket</h4>
                                </div>
                               
                              </div>
                              <div class="card-body" >           
                                <!-- Table for Office records -->
                                <table class="table table-hover datatable" >
                                  <thead>
                                    <tr>
                                    <th scope="col">Student No.</th>
                                      <th scope="col" >Fullname</th>
                                      <th scope="col" >Subject</th>
                                      <th scope="col">Course</th>  
                                      <th scope="col" >Status</th>
                                      <!-- <th scope="col">Filesize</th>    -->
                                     
                                      <th scope="col">Date&Time</th>     
                                      <!-- <th scope="col">Downloads</th>    -->
                                      <!-- <th scope="col">Action</th>           -->
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                      require_once("include/conn.php");
                                      $query="SELECT * FROM hdms_tickets WHERE status=1 AND ticket_department = 'hdms Cashier' ORDER BY 'date' DESC";
                                      $result=mysqli_query($conn,$query);
                                      while($rs=mysqli_fetch_array($result)){
                                        $id =$rs['id']; 
                                        $student_number = $rs['student_number']; 
                                        $firstname = $rs['firstname']; 
                                        $lastname = $rs['lastname']; 
                                        $category = $rs['category'];
                                        $status = $rs['status'];
                                        $course = $rs['course']; 
                                        $date = $rs['date'];                     
                                    ?>
                                    <tr>
                                    <td style="display:none"><?php echo $id?></td>
                                      <td data-label="ticket ID:"><?php echo $student_number; ?></td>
                                      <td data-label="Fullname:"><?php echo $firstname.' '.$lastname; ?></td>
                                      <td data-label="Subject:"><?php echo  $category; ?></td>
                                      <td data-label="Course:"><?php echo $course?></td> 
                                      <td data-title = "Status ">
                                          <?php if($rs['status'] == 0): ?>
                                            <span class="badge bg-primary">New</span>
                                          <?php elseif($rs['status'] == 1): ?>
                                            <span class="badge bg-warning text-dark">Pending/processing</span>
                                          <?php elseif($rs['status'] == 2): ?>
                                            <span class="badge bg-success">Resolved</span>
                                          <?php else: ?>
                                            <span class="badge badge-secondary">Closed</span>
                                          <?php endif; ?>
                                         </td>
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
                <div class="tab-pane fade" id="ApprovedDocs" role="tabpanel" aria-labelledby="approved-tab">
                  <!-- ApprovedDocs Docs -->
                    <!-- IncomingDocs Docs -->
                  <section class="section">
                        <div class="row">        
                          <div class="col-lg-12">
                            <div class="card">
                              <div class="col-lg-12">
                                <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                                    <h4>Resolved Ticket</h4>
                                </div>
                               
                              </div>
                              <div class="card-body" >           
                                <!-- Table for Office records -->
                                <table class="table table-hover datatable" >
                                  <thead>
                                    <tr>
                                    <th scope="col">Student No.</th>
                                      <th scope="col" >Fullname</th>
                                      <th scope="col" >Subject</th>
                                      <th scope="col">Course</th>  
                                      <th scope="col" >Status</th>
                                      <!-- <th scope="col">Filesize</th>    -->
                                     
                                      <th scope="col">Date&Time</th>     
                                      <!-- <th scope="col">Downloads</th>    -->
                                      <!-- <th scope="col">Action</th>           -->    
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      require_once("include/conn.php");
                                      $query="SELECT * FROM hdms_tickets WHERE status=2 AND ticket_department = 'hdms Cashier' ORDER BY date DESC ";
                                      $result=mysqli_query($conn,$query);
                                      while($rs=mysqli_fetch_array($result)){
                                        $id =$rs['id']; 
                                        $student_number = $rs['student_number']; 
                                        $firstname = $rs['firstname']; 
                                        $lastname = $rs['lastname']; 
                                        $category = $rs['category'];
                                        $status = $rs['status'];
                                        
                                        $course = $rs['course']; 
                                        $date = $rs['date'];                   
                                    ?>
                                    <tr>
                                    <td style="display:none"><?php echo $id?></td>
                                      <td data-label="ticket ID:"><?php echo $student_number; ?></td>
                                      <td data-label="Fullname:"><?php echo $firstname.' '.$lastname; ?></td>
                                      <td data-label="Subject:"><?php echo  $category; ?></td>
                                      <td data-label="Course:"><?php echo $course?></td> 
                                      <td data-title = "Status ">
                                          <?php if($rs['status'] == 0): ?>
                                            <span class="badge bg-primary">New</span>
                                          <?php elseif($rs['status'] == 1): ?>
                                            <span class="badge bg-warning text-dark">Pending/processing</span>
                                          <?php elseif($rs['status'] == 2): ?>
                                            <span class="badge bg-success">Done</span>
                                          <?php else: ?>
                                            <span class="badge badge-secondary">Closed</span>
                                          <?php endif; ?>
                                         </td>
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
                <div class="tab-pane fade" id="Total" role="tabpanel" aria-labelledby="approved-tab">
                  <!-- ApprovedDocs Docs -->
                    <!-- IncomingDocs Docs -->
                  <section class="section">
                        <div class="row">        
                          <div class="col-lg-12">
                            <div class="card">
                              <div class="col-lg-12">
                                <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                                    <h4>Total Ticket</h4>
                                </div>
                               
                              </div>
                              <div class="card-body" >           
                                <!-- Table for Office records -->
                                <table class="table table-hover datatable" >
                                  <thead>
                                    <tr>
                                    <th scope="col">Student No.</th>
                                      <th scope="col" >Fullname</th>
                                      <th scope="col">Subject</th>  
                                      <th scope="col">Course</th>  
                                      <th scope="col">Status</th>  
                                      
                                      <!-- <th scope="col">Filesize</th>    -->
                                     
                                      <th scope="col">Date&Time</th>     
                                      <!-- <th scope="col">Downloads</th>    -->
                                      <!-- <th scope="col">Action</th>           --> 
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      require_once("include/conn.php");
                                      $query="SELECT * FROM hdms_tickets WHERE ticket_department = 'hdms Cashier' ORDER BY date DESC ";
                                      $result=mysqli_query($conn,$query);
                                      while($rs=mysqli_fetch_array($result)){
                                        $id =$rs['id']; 
                                        $student_number = $rs['student_number']; 
                                        $firstname = $rs['firstname']; 
                                        $lastname = $rs['lastname']; 
                                        $category = $rs['category'];
                                        $course = $rs['course'];
                                        $status = $rs['status'];
                                        $date = $rs['date'];                   
                                    ?>
                                    <tr>
                                    <td style="display:none"><?php echo $id?></td>
                                      <td data-label="ticket ID:"><?php echo $student_number; ?></td>
                                      <td data-label="Fullname:"><?php echo $firstname.' '.$lastname; ?></td>
                                      <td data-label="Subject:"><?php echo $category?></td> 
                                      <td data-label="Course:"><?php echo $course?></td> 
                                      <td data-title = "Status ">
                                          <?php if($rs['status'] == 0): ?>
                                            <span class="badge bg-primary">New</span>
                                          <?php elseif($rs['status'] == 1): ?>
                                            <span class="badge bg-warning text-dark">Pending/processing</span>
                                          <?php elseif($rs['status'] == 2): ?>
                                            <span class="badge bg-success">Done</span>
                                          <?php else: ?>
                                            <span class="badge badge-secondary">Closed</span>
                                          <?php endif; ?>
                                         </td>
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