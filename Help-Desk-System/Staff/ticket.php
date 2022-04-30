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
$recodes=$db->conn->query("SELECT * FROM hdms_tickets WHERE ticket_department = '' ORDER BY 'date' ");
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
                <div class="card-body" >
                    <h3>Help desk Support team</h3>
            
                </div>
            </div>
            
  
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row" >
                        <div class="col-12 col-md-4">
                            <div class="card bg-primary" style = "top: 22px">
                                <div class="card-body text-white">
                                    <h3>New Tickets</h3>
                                    <h2><?php echo $new_count;?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div data-bs-toggle="modal" data-bs-target="#ExtralargeModal"class="card bg-warning" style = "top: 22px" >
                                <div class="card-body text-white">
                                    <h3>Pending Tickets</h3>
                                    <h2><?php echo $reply_count;?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card bg-success" style = "top: 22px">
                                <div class="card-body text-white">
                                    <h3>Done</h3>
                                    <h2><?php echo $closed_count;?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                        <td>'.decryptthis($v['email'],$key).'</td>
                                        <td>'.decryptthis($v['subject'],$key).'</td>
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
                                       <a class="btn btn-outline-primary forward" title="Forward"> <i class="ri-send-plane-fill"></i></a>
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
                    
                            <input type="" class="form-control" id="id" readonly>
                            
                                            
                            <div class="col-md-12">
                            <select class="form-select select receiver" id="receiver" name="receiver" onChange="fetchOffice(this.value);">
                                <option value="" selected="selected" disabled="disabled">Select Receiver</option>
                                    <?php
                                    require_once("include/conn.php");
                                    $query="SELECT * FROM user_information WHERE  (department = 'Help Desk System') AND `id_number` NOT IN ('$verified_session_username') AND role NOT LIKE '%staff%' AND role NOT LIKE '%Help Desk Administrator%' ORDER BY firstname DESC ";
                                    $result=mysqli_query($conn,$query);
                                    while($rs=mysqli_fetch_array($result)){
                                        $dtid =$rs['id'];    
                                        $dtno =$rs['id_number'];                                  
                                        $dtFName = $rs['firstname'];    
                                        $dtLName = $rs['lastname'];    
                                    
                                        echo '<option value = "' . $dtno . '">' . $rs["firstname"] . " " . $rs["lastname"] ." (".$rs["role"].")".'</option>';
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
<!-- End Send Docs Modal-->






<!-- ======= Footer ======= -->
<?php include ('core/footer.php');//css connection?>
<?php include ('modal.php');//css connection?>

<!-- End Footer -->


<!-- Vendor JS Files/ Template main js file -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files/ Template main js file -->
 <!-- Vendor JS Files/ Template main js file -->
 <?php include ('core/js.php');//css connection?> 
</body>
<script type="text/javascript">
    
    // Submit Program modal calling
    $('#receivedTable').on('click', '.forward',function () {

        $('#SendModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        console.log(data);        
        $('#id').val(data[0]);       
        // document.getElementById("prog_nameE").placeholder = data[2]; 
    });
    // Submit Edit Program modal calling

     // Edit Program function
     $('#send').click(function(d){ 
        d.preventDefault();
        if($('#id').val()!="" && $('#receiver').val()!=""){
        $.post("function/send_ticket.php", {
            ticketid:$('#id').val(),
            ticketact:$('#receiver').val(),        
            },function(data){
            if (data.trim() == "failed"){
            Swal.fire("Program Code is currently in use","","error");//response message
            // Empty test field
            $('#id').val("")
            }else if(data.trim() == "success"){
            $('#SendModal').modal('hide');
                //success message
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1100,
                timerProsressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                
                }
                })
                Toast.fire({
                icon: 'success',
                title:'Program successfully edited'
                }).then(function(){
                document.location.reload(true)//refresh pages
                });
                $('#id').val("")
                $('#receiver').val("")
            }else{
                Swal.fire(data);
            }
        })
        }else{
        Swal.fire("You must fill out every field","","warning");
        }
    })
    // End Edit Program function

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
</html>