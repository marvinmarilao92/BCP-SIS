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
                        <table class="table table-hover datatable" id="DocTypeTable">
                        <thead>
                        <tr>
                                
                                <th>Std.#</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th scope="col" WIDTH="20%">Message</th>
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
                                       <a class="btn btn-outline-primary editbtn" title="update status"> <i class="bi bi-three-dots"></i></a>
                                      
                                       </a>
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
 <!-- Edit DocType Modal -->
<div class="modal fade" id="EditModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">UPDATE</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <div class="card" style="margin: 10px;">
                            <div class="card-body">
                              <h2 class="card-title">Status Update</h2>
                                <!-- Fill out Form -->
                                <div class="row g-3" >
                                  <input type="" class="form-control" id="id" style="display: none;" readonly>
                                
                                  <div class="col-12">                                
                                    <div class="form-floating">
                                      <select class="form-select" name="status" id="status" aria-label="State" required>
                                        <option value="" selected disabled>Update Status</option>
                                        <option value="0" <?php echo $v['status'] == 0 ? 'selected' : ''; ?>>New</option>
                                        <option value="1" <?php echo $v['status']  == 1 ? 'selected' : ''; ?>>Pending/Processing</option>
                                        <option value="2" <?php echo $v['status']  == 2 ? 'selected' : ''; ?>>Solved</option>                               
                                      </select>
                                      <label for="floatingSelect">Status</label>
                                    </div>                                   
                                  </div>   
                            </div>
                          </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button class="btn btn-primary" name="save" id="edit" >Update Status</button>
                            </div>
                        <!-- End Form -->
                    </div>
                </div>
        </div>
      <!-- End Edit DocType Modal-->


 



<!-- ======= Footer ======= -->
<?php include ('core/footer.php');//css connection?>

<!-- End Footer -->


<!-- Vendor JS Files/ Template main js file -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files/ Template main js file -->
 <!-- Vendor JS Files/ Template main js file -->
 <?php include ('core/js.php');//css connection?> 
</body>
<script>
  // Edit modal calling
  $('#DocTypeTable').on('click','.editbtn', function () {

$('#EditModal').modal('show');

$tr = $(this).closest('tr');

var data = $tr.children("td").map(function () {
    return $(this).text();
}).get();

console.log(data);        
    $('#id').val(data[0]);
    $('#status').val(data[0]);
   
    // document.getElementById("dt_accE").placeholder = data[3];  
});
// End of edit modal calling 

// Edit function
$('#edit').click(function(d){ 
d.preventDefault();
  if($('#id').val()!=""&& $('#status').val()!=""){
    $.post("function/update_ticket.php", {
      id:$('#id').val(),
      status:$('#status').val(),
  
      },function(data){
        if (data.trim() == "failed"){
        $('#EditModal').modal('hide');
        Swal.fire("Status Title is currently in use","","error");//response message
        // Empty test field
        $('#status').val("")
        
      }else if(data.trim() == "success"){
        $('#EditModal').modal('hide');
              //success message                                    
                  const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 1500,
                  timerProsressBar: true,
                  didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)                  
                  }
                  })
                Toast.fire({
                icon: 'success',
                title:'Status updated Successfully'
                }).then(function(){
                  document.location.reload(true)//refresh pages
                }); 
                $('#status').val("")
             
        }else{
          Swal.fire(data);
      }
    })
  }else{
    Swal.fire("You must fill out every field","","warning");
  }
})
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
</html>