<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Ticket List</title>
<head>
<?php include ('core/css-links.php');//css connection?>
</head>

<body>
<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'tic';include ('core/sidebar.php');//Design for sidebar?>





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
$recodes=$db->conn->query("SELECT * FROM hdms_tickets ORDER BY date DESC");
if($recodes->num_rows >0){
    while ($row = $recodes->fetch_assoc()) {
        $latest[]=$row;
    }
}

?>
 <main id="main" class="main">
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-12" >
            <div class="card mb-3">
                <div class="card-header" >
                    <h3>Help desk Support team</h3>
            
                </div>
            </div>
            
  
            <div class="alert alert-info alert-dismissible fade show" role="alert">
      <h4 class="alert-heading">Reminder!</h4>
      <p>
      &nbsp&nbsp Please read this acceptable user User Policy carefully before using the Help Desk Management System operated by the Institution.
Services provided by us may be/or used for lawful purposes. You agree to comply with all applicable laws, rules and regulations in connection with your use of the services. Any material or conduct that in our judgement violates this policy in any manner may result in suspension or termination of the services or removal of user's account with or without notice.
      </p>
      <hr>
      <p class="mb-0">© Copyright Bestlink College of the Philippines. All Rights Reserved.</p>
     
    </div>
           
            <div class="card">
                <div class="card-header">
                    Latest Tickets
                       
</div>
                <div class="card-body">
                    <?php if(count($latest) > 0){?>
                        <table class="table table-hover datatable" id="receivedTable">
                        <thead>
                        <tr>
                                
                               
                                <th>Email</th>
                                <th>Subject</th>
                                <th scope="col" WIDTH="20%">Message</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($latest as $k => $v) {
                                    echo '
                                    <tr>
                                       
                                        <td style="display:none;">'.$v['id'].'</td>
                                     
                                        <td>'.decryptthis($v['email'],$key).'</td>
                                        <td>'.$v['category'].'</td>
                                        <td>'.decryptthis($v['message'],$key).'</td> ';?>
                                         <td data-title = "Department ">
                                        <?php if($v['ticket_department'] == "hdms Accounting"): ?>
                                          <span class="badge bg-primary">Accounting</span>
                                        <?php elseif($v['ticket_department'] == "hdms Registrar"): ?>
                                          <span class="badge bg-warning text-dark">Registrar</span>
                                          <?php elseif($v['ticket_department'] == "hdms Admission"): ?>
                                          <span class="badge bg-secondary">Admission</span>
                                          <?php elseif($v['ticket_department'] == "hdms Cashier"): ?>
                                          <span class="badge bg-info">Cashier</span>
                                        <?php elseif($v['ticket_department'] == "Staff"): ?>
                                          <span class="badge bg-success">Staff</span>
                                        <?php else: ?>
                                          <span class="badge badge-secondary">Closed</span>
                                        <?php endif; ?>
                                      </td>

                                          <td data-title = "Status ">
                                          <?php if($v['status'] == 0): ?>
                                            <span class="badge bg-primary">New/processing</span>
                                          <?php elseif($v['status'] == 1): ?>
                                            <span class="badge bg-warning text-dark">Pending</span>
                                          <?php elseif($v['status'] == 2): ?>
                                            <span class="badge bg-success">Done</span>
                                          <?php else: ?>
                                            <span class="badge badge-secondary">Closed</span>
                                          <?php endif; ?>
                                         </td>


                                      <?php   
                                      echo ' 
                                        <td>'.$v['date'].'</td>
                                        <td><a class="btn btn-outline-info " href="view_ticket.php?id='.$v['id'].'" title="View"><i class="bi bi-eye-fill"></i></a>   
                                     
                                       <a onclick="deleteRow('.$v["id"].')" class="btn btn-outline-danger" title="Delete"><i class="bi bi-trash"></i></a></td>
                                        
                                    </tr>
                                    ';
                                }
                                ?>
                            </tbody>
                    </table>
                    <?php }else{
                        echo '<div class="alert alert-info">No any new tickets</div>';
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>

                  </section>
              <!-- End Table with stripped rows -->
</main>
  <!-- Send Docs Modal -->
  <div div class="modal fade" id="SendModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ticket forward</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="card" style="margin: 10px;">
                <div class="card-body">
                    <h2 class="card-title">Forward this ticket?<h5 id="doc_fileN1" style="text-align: end; color:black;"></h5></h2>
                    
                    <!-- Fill out Form -->
                    <div class="row g-3" style="margin-top: 10px;">
                    
                            <input type="hidden" style="display:none;" class="form-control" id="id" readonly>
                            <input type="hidden" style="display:none;" class="form-control" id="student_num"readonly>
                          
                            
                                            
                            <div class="col-md-12">
                            <select class="form-select select receiver" id="receiver" name="receiver" onChange="fetchOffice(this.value);" required>
                                <option value="" selected="selected" disabled="disabled">Select Receiver</option>
                                    <?php
                                    require_once("include/conn.php");
                                    $query="SELECT * FROM department";
                                    $result=mysqli_query($conn,$query);
                                    while($rs=mysqli_fetch_array($result)){
                                        $dtid =$rs['id'];    
    
                                        $dtLName = $rs['department'];    
                                    
                                        echo '<option value = "' . $dtid . '">' . $rs["department"] .'</option>';
                                    
                                       
                                    }
                                    
                                    

                                ?>
                            </select>
                            </div>
                            <!--div class="col-md-12">
                            <select class="form-select" id="send_off2" name="send_off2" >
                                <option selected="selected" disabled="disabled">Select Office</option>
                            </select>
                            </div-->
                            <!-- <div class="col-12">
                                <textarea class="form-control" style="height: 80px" placeholder="message" name="docremarks" id="docremarks" id="docdesc" required></textarea>
                            </div>  -->
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-success" name="send" id="send" >forward</button>
                </div>
            <!-- End Form -->
        </div>
    </div>
</div>
<!-- End Send ticket Modal-->


<!-- ======= Footer ======= -->
<?php include ('core/footer.php');//connection?>

<?php include ('done_modal.php');//connection
include ('function/pending_modal.php');//connection

?>
<!-- End Footer -->


<!-- Vendor JS Files/ Template main js file -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 <!-- Vendor JS Files/ Template main js file -->
 <?php include ('core/js.php');//css connection?> 
 <script>

function deleteRow(id) {
            if (confirm('Are you sure you want to delete this?')) {
                $.ajax({
                    url: 'function/delete_ticket.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        key: 'deleteRow',
                        id: id
                    },  success:function(response) {
                        $("#faqs_"+id).parent().remove();
                        alert(response);
                    }
                });
            }
        }
if(window.history.replaceState) {
  window.history.replaceState(null,null,window.location.href)
}


 </script>
</body>

</html>