<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Ticket</title>
<head>
<?php include ('core/css-links.php');//css connection?>

</head>

<body>
<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'ticket';include ('core/sidebar.php');//Design for sidebar?>





  <?php


//include the new connection
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
$reply_count=0;
$closed_count=0;

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

$closed_tickets_query="SELECT COUNT(*) AS new_tickets FROM hdms_tickets WHERE status=$closed_status";
$ctr=$db->conn->query($closed_tickets_query);
if($ctr->num_rows > 0){
    while ($row = $ctr->fetch_assoc()) {
        $closed_count=$row['new_tickets'];
    }
}
$latest=[];
$recodes=$db->conn->query("SELECT * FROM hdms_tickets WHERE ticket_department = '$verified_session_role' ORDER BY 'date'");
if($recodes->num_rows >0){
    while ($row = $recodes->fetch_assoc()) {
        $latest[]=$row;
    }
}

?>
 <main id="main" class="main">
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-12">
           
           
            <div class="alert alert-info alert-dismissible fade show" role="alert">
      <h4 class="alert-heading">Help Desk Support Team</h4>
      <p>
       This ticket are forwarded by the staff you can directly reply to students and interact without sending back to staff 
      </p>
      <hr>
      <p class="mb-0"></p>
     
    </div>
            <div class="card">
                <div class="card-header">
                   This ticket are forwarded by the staff
                </div>
                <div class="card-body">
                    <?php if(count($latest) > 0){?>
                        <table class="table table-hover datatable">
                        <thead>
                        <tr>
                                
                                <th>Std.#</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
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
                                        <td>'.$v['student_number'].'</td>
                                        <td>'.decryptthis($v['email'],$key).'</td>
                                        <td>'.$v['category'].'</td>
                                        <td>'.decryptthis($v['message'],$key).'</td> ';?>


                                          <td data-title = "Status ">
                                          <?php if($v['status'] == 0): ?>
                                            <span class="badge bg-primary">New</span>
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
</main>

<!-- ======= Footer ======= -->
<?php include ('core/footer.php');//css connection?>
<!-- End Footer -->

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
</script>

</body>
</html>