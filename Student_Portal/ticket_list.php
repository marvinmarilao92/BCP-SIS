<?php
include('includes/session.php');
?>
   <!DOCTYPE html>
   <html lang="en">
   <title>Ticket</title>
   <head>
   <?php include ('includes/head.php');//css connection?>
   </head>

   <body>
   <?php include ('includes/nav.php');//Design for  Header?>
   <?php $page = 'inbox';include ('includes/sidebar.php');//Design for sidebar?>
<body>
  
 


<?php 
    $success=false;
    $error=false;
    if(!isset($_GET['id'])){
        header('Location: ticketss');
    }
 
//include the new connection
include "includes/new_db.php";


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

    $db=new DB();
    $ticket='';
    $this_ticket_query=$db->conn->query("SELECT * FROM hdms_tickets WHERE id=".$_GET['id']);
    if($this_ticket_query->num_rows > 0){
        while ($row = $this_ticket_query->fetch_assoc()) {
            $ticket=$row;
        }
    }else{
        header('Location: ./');
    }
    $ticket_id=$ticket['id'];
    $reps=[];
    if($ticket != ''){
        $replies=$db->conn->query("SELECT * FROM hdms_ticket_reply WHERE ticket_id =$ticket_id");
        if($replies->num_rows > 0){
            while ($row = $replies->fetch_assoc()) {
                $reps[]=$row;
            }
        }
    }
    //Reply Send Method
    if(isset($_POST['submit'])){
        
        date_default_timezone_set("asia/manila");
        $date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
        $message=$_POST['message'];
        $message=encryptthis($message, $key);
        
      	//create audit trail record
     
       
          $fname= $_SESSION['session_department'] = "Student";
          if (!empty($_SERVER["HTTPS_CLIENT_IP"])){
            $ip = $_SERVER["HTTPS_CLIENT_IP"];
          }elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])){
            $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
          }else{
            $ip = $_SERVER["REMOTE_ADDR"];
            $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
             $remarks="reply to a ticket";  
             //save to the audit trail table
             mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,ip,affected,host,date) VALUES('$verified_session_username','$remarks','$fname','$ip','$message','$host','$date')")or die(mysqli_error($link));

        if($db->conn->query("INSERT INTO hdms_ticket_reply (ticket_id,send_by,message) VALUES('$ticket_id','0','$message')")){
            $success="Reply has been sent";
           
        }else{
            $error="Can not send reply";
        }
    }
}
?>
<body>
    
  <main id="main" class="main">

  <div class="col-lg-12">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-outline card-success">
				<div class="card-header">
        <?php 
                        if(isset($error) && $error != false){
                            echo '<div class="alert alert-danger">'.$error.'</div>';
                        }
                    ?>
                        <?php 
                        if(isset($success) && $success != false){
                            echo '<div class="alert alert-success">'.$success.'</div>';
                        }
                    ?>
					<h3 class="card-title" id="DocTypeTable">Ticket</h3>
				</div>
				<div class="card-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6">
              <label for="" class="control-label border-bottom border-primary">Ticket ID</label>
								<p class="ml-2 d-list"><b><?php echo $ticket['ticket_id'] ?></b></p>
                <label for="" class="control-label border-bottom border-primary">Student Number</label>
								<p class="ml-2 d-list"><b><?php echo $ticket['student_number'] ?></b></p>
                <label for="" class="control-label border-bottom border-primary">Student</label>
                <p class="ml-2 d-list"><b><?php echo $ticket['firstname'].'&nbsp;'.$ticket['lastname']?></b></p>
                <label for="" class="control-label border-bottom border-primary">Course</label>
								<p class="ml-2 d-list"><b><?php echo $ticket['course'] ?></b></p>
							
								
               
							</div>
							<div class="col-md-6">
                            <label for="" class="control-label border-bottom border-primary">Department</label>
								<p class="ml-2 d-list"><b><?php echo $ticket['ticket_department']?></b></p>
                                <label for="" class="control-label border-bottom border-primary">Email</label>
								<p class="ml-2 d-list"><b><?php echo decryptthis($ticket['email'], $key) ?></b></p>
								<label for="" class="control-label border-bottom border-primary">Subject</label>
								<p class="ml-2 d-list"><b><?php echo $ticket['category'] ?></b></p>
            
                                <label for="" class="control-label border-bottom border-primary">Status</label>
                                <p class="ml-2 d-list">
                                <td data-title = "Status ">
                                <?php if($ticket['status'] == 0): ?>
                                <span class="badge bg-primary">New</span>
                                <?php elseif($ticket['status'] == 1): ?>
                                <span class="badge bg-warning text-dark">Pending/processing</span>
                                <?php elseif($ticket['status'] == 2): ?>
                                <span class="badge bg-success">Done</span>
                                <?php else: ?>
                                <span class="badge badge-secondary">Closed</span>
                                <?php endif; ?>
                                </td>      
								</p>
					
						</div>
						<hr class="border-primary">
						<div>
						<b>Message:</b>&nbsp;<?php echo decryptthis($ticket['message'], $key) ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	

                    <div class="reply-area">
                        <ul>
                            <?php if(count($reps) > 0) { ?>
                                <?php foreach ($reps as $k => $v) {
                                    if($v['send_by'] == 0){
                                        ?>
                                         <li class="reply-user">
                                            <div class="card bg-gray text-dark">
                                                <div class="card-body">
                                                    <p><?php echo decryptthis($v['message'], $key); ?></p>
                                                    <div class="text-right">
                                                        <span><?php echo $v['date'];?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                    }else{
                                        ?>

                                            <div class="card bg-gray text-dark">
                                                <div class="card-body">
                                                    <p><?php echo decryptthis($v['message'], $key); ?></p>
                                                    <div class="text-right">
                                                        <small>Send by <?php echo $ticket['ticket_department'] ?> at <?php echo $v['date'];?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                }
                            ?>
                            
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="send-area">
                        <form method="POST">
                            <div class="form-group">
                                <textarea name="message" class="form-control" placeholder="Reply" id="message" cols="30" rows="4"></textarea>
                            </div>
                            <div class="form-group text-right">
                                <input type="hidden" name="submit" value="send">
                                <button class="btn btn-success" type="submit">Send</button>
                                <a href="pages-faq.php?id=<?php echo $_SESSION["login_key"];?> " class="btn btn-secondary ml-2">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                            </main>

                              <!-- Delete DocType Modal -->
      <div class="modal fade" id="DeleteModal" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">DELETE DOCTYPE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                        <div class="card" style="margin: 10px;">
                          <div class="card-body">                
                            <br>
                            <input type="hidden"  name="delete_id" id="delete_id" readonly>
                            <center>
                              <h5>Are you sure you want to delete these DocType?</h5>
                              <h5 class="text-danger">This action cannot be undone.</h5>   
                            </center>                
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary" name="deletedata" id="dtdel" >Delete DocType</button>
                        </div>
                      <!-- End Form -->
                  </div>
              </div>
        </div>

 <!-- ======= Footer ======= -->

   <?php include 'includes/footer.php'?>

   <script>
if(window.history.replaceState) {
  window.history.replaceState(null,null,window.location.href)
}
 </script>

    </body>
</html>