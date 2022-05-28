<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>View Ticket</title>
<head>
<?php include ('core/css-links.php');//css connection?>
</head>



<body>
<?php $page = 'tic';include ('core/sidebar.php');//Design for sidebar?>
  
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
  
<div class="d-flex align-items-center justify-content-between">
  <a href="#" class="logo d-flex align-items-center">
    <img src="../images/help.png" alt="">
    <span class="d-none d-lg-block">Help Desk</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->
<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">
   
    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
       
        <span class="badge bg-primary badge-number"></span>
      </a><!-- End Notification Icon -->

      <!--ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">
          You have 4 new notifications
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
          <span class="status actiuve"></span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-exclamation-circle text-warning"></i>
          <div>
            <h4>Lorem Ipsum</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>30 min. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-x-circle text-danger"></i>
          <div>
            <h4>Atque rerum nesciunt</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>1 hr. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-check-circle text-success"></i>
          <div>
            <h4>Sit rerum fuga</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>2 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-info-circle text-primary"></i>
          <div>
            <h4>Dicta reprehenderit</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>4 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>
        <li class="dropdown-footer">
          <a href="#">Show all notifications</a>
        </li>

      </!--ul><End Notification Dropdown Items -->

    </li><!-- End Notification Nav -->

    <!--li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-chat-left-text"></i>
        <span class="badge bg-success badge-number">3</span>
      </a><-- End Messages Icon --

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
        <li class="dropdown-header">
          You have 3 new messages
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="../assets/img/messages-1.jpg" alt="" class="rounded-circle">
            <div>
              <h4>Maria Hudson</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>4 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="../assets/img/messages-2.jpg" alt="" class="rounded-circle">
            <div>
              <h4>Anna Nelson</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>6 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="../assets/img/messages-3.jpg" alt="" class="rounded-circle">
            <div>
              <h4>David Muldon</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>8 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="dropdown-footer">
          <a href="#">Show all messages</a>
        </li>

      </ul><-- End Messages Dropdown Items -->

    </li><!-- End Messages Nav -->

    <li class="nav-item dropdown pe-3">
   
      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="../assets/img/BCPLogo.png" alt="Profile" class="rounded-circle">
        <!-- class="rounded-circle" -->
        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $verified_session_firstname . " " . $verified_session_lastname ?></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><?php echo $verified_session_firstname . " " . $verified_session_lastname ?></h6>
          <span><?php echo $verified_session_role?></span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="user-profile.php?id=<?php echo $_SESSION["login_key"];?>"class="<?php if($page=='PRO'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
            <i class="bi bi-question-circle"></i>
            <span>Need Help?</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <!-- Adding return nav item for super admin -->
          <?php 
            $output = '';
            $key = $_SESSION["login_key"];
            if(isset($verified_session_department) && ($verified_session_username)){
              switch($verified_session_role){
                case "SuperAdmin":
                    //statement
                    $output .= '
                    <li>
                      <a class="dropdown-item d-flex align-items-center" href="../../../super_admin/index.php?id='.$key.'">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                      </a>
                    </li>    
                  ';
                break;  

                default:
                //statement
                  $output .= '
                    <li>
                      <a class="dropdown-item d-flex align-items-center" href="function/logout.php">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                      </a>
                    </li>    
                  ';
              }
              echo $output;
          }else{
              // header("location:index.php");
          }
          ?>

        

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->



 
<?php 



//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//set the correct timezone
date_default_timezone_set('Asia/Manila');


    $success=false;
    $error=false;
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



    if(!isset($_GET['id'])){
        header('Location: ticketss');
    }
   
    $db=new DB();
    $ticket='';
    $this_ticket_query=$db->conn->query("SELECT * FROM hdms_tickets WHERE id=".$_GET['id']);
    if($this_ticket_query->num_rows > 0){
        while ($row = $this_ticket_query->fetch_assoc()) {
            $ticket=$row;
        }
    }else{
        header('Location: ticketss');
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
       
        $email = $_POST['email'];
        $email=encryptthis($email, $key);
        $message=$_POST['message'];
        $message=encryptthis($message, $key);
        
        
        $fname=$verified_session_role; 
        if (!empty($_SERVER["HTTPS_CLIENT_IP"])){
          $ip = $_SERVER["HTTPS_CLIENT_IP"];
        }elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])){
          $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
        }else{
          $ip = $_SERVER["REMOTE_ADDR"];
          $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
           $remarks="replied to a ticket to(Student)";  
           //save to the audit trail table
           mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,ip,affected,host,date) VALUES('$verified_session_username','$remarks','$fname','$ip','$message','$host','$date')")or die(mysqli_error($link));
        
         
           //$link->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
           //VALUES ('$verified_session_username', '0' ,'$verified_session_role','0','replied to ticket','Reply from help desk','$verified_session_role','Active','$date')") or die(mysqli_error($conn));


if($db->conn->query("INSERT INTO hdms_ticket_reply (ticket_id,email,send_by,message) VALUES('$ticket_id','$email','$verified_session_role','$message')")){
          
            $success="Reply has been sent";
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;                                           //Send using SMTP
            $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'helpdesksupport@bcp-sis.ga';                     //SMTP username
            $mail->Password   = '#ChangeMe01!';                               //SMTP password
            $mail->SMTPSecure = 'TLS';                                  //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
            //Recipients
            $mail->setFrom('helpdesksupport@bcp-sis.ga', 'Help Desk Support');
            $mail->addAddress($_POST['email'] , 'Student');     //Add a recipient
        
            $body = 
            '  <div class="card">
         
            <div class="card-body">
            <h3 class="card-title">######Reply from helpdesk support bcp######</h3>
            <p class="card-text">Thank you for waiting for our response!<br><br><b>FROM:&nbsp;'.$verified_session_role.'</b><br><br><b>'.nl2br($_POST['message']).'</b><br><br><br><br>
            
            Dont Reply to this email just login into the system and make a reply from there<br><br><br>
  
            for another inquiries and question just submit another ticket to our help desk system or just send us an email @helpdesksupport@bcp-sis.ga
            <br>Thank you! Stay safe.</p>
          </div>
        </div>
          
          
          <div class="alert alert-light bg-light border-0 alert-dismissible fade show" role="alert">
          <h3>© Copyright Bestlink College of the Philippines. All Rights Reserved.</h3>
        </div>
            
            ';

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Reply from Help Desk Support';
            $mail->Body  = $body;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            //echo "Success!";
        }else{
            $error="Can not send reply";
        }
      }
        
    }
?>
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
                                    
                                    <li class="reply-me">
                                      
                                            <div class="card">
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
                                <input type="hidden" name="submit" value="send"><br>
                               
                                <input type="hidden"name = "email" value = <?php echo ''.decryptthis($ticket['email'], $key).'';?> style="display:none">
                                <textarea name="message" class="form-control" id="message" placeholder="Type your reply" cols="70" rows="4" required></textarea><br>
                                <button class="btn btn-success" type="submit">Send</button>
                                <a href="ticket.php?id=<?php echo $_SESSION["login_key"];?> " class="btn btn-secondary ml-2" >Back</a>
                               
                            </div>
                        </form>
                        
                    </div>
                </div>
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
</main>


 



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
 
if(window.history.replaceState) {
  window.history.replaceState(null,null,window.location.href)
}
</script>
</html>