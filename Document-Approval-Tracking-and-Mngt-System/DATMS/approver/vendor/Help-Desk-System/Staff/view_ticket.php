<?php

include "session.php";

?>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ticket</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/BCPlogo.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <Link href ="../assets/css/styles.css" rel = "stylesheet">
  <?php $page = 'tic';include ('core/sidebar.php');//Design for sidebar?>


<body>
  
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
  
<div class="d-flex align-items-center justify-content-between">
  <a href="index.php" class="logo d-flex align-items-center">
    <img src="../assets/img/DATMS_logo.png" alt="">
    <span class="d-none d-lg-block">Help Desk</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->
<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">
   
    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
        <span class="badge bg-primary badge-number"></span>
      </a><!-- End Notification Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
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

      </ul><!-- End Notification Dropdown Items -->

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
        <img src="../assets/img/BCPlogo.png" alt="Profile" class="rounded-circle">
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
<?php?>
<aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">
                 <!-- Adding return nav item for super admin -->
        <?php 
          $output = '';
          if(isset($verified_session_department) && ($verified_session_username)){
            switch($verified_session_role){
              case "SuperAdmin":
                //statement
                $output .= '
                <li class="nav-item" >
                  <a href="../../../super_admin/index.php" style="color: rgb(83, 107, 148);font-weight: 600; ">
                    <i class="bi bi-arrow-return-left"></i>
                    <span>Return to SuperUser</span>
                  </a>
                </li><!-- End Return Nav -->    
                ';

                break;  
            }
            echo $output;
        }else{

        }
        ?>

                <li class="nav-item">
                    <a href="index.php?id=<?php echo $_SESSION["login_key"];?>"class="<?php if($page=='PRO'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                        <i class="bi bi-grid"></i>
                        <span >Dashboard</span>
                    </a>
                </li><!-- End Dashboard Nav -->

               
                <li class="nav-item">
                    <a href="ticket.php?id=<?php echo $_SESSION["login_key"];?>"class="<?php if($page=='tic'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                        <i class="bi bi-grid"></i>
                        <span >Ticket</span>
                    </a>
                </li><!-- End Dashboard Nav -->


                <li class="nav-item">
                        <a href="user_policy.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='UP'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                        <i class="bi bi-shield-check"></i>
                            <span>User Policy &nbsp;</span>
                        </a>
                        </li><!-- Policy Nav -->
                    

                        <li class="nav-item">
                            <a href="#?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='manage'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                            <i class="bi bi-flag"></i>
                                <span>Report &nbsp;</span>
                                
                            </a>
                          </li><!-- All faqs analytics Nav -->


                <li class="nav-heading">Other</li>

                <li class="nav-item">
                    <a href="user-profile.php?id=<?php echo $_SESSION["login_key"];?>"class="<?php if($page=='profile'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                </li><!-- End Profile Page Nav -->

                <li class="nav-item">
                    <a href="contact.php?id=<?php echo $_SESSION["login_key"];?>"class="<?php if($page=='cont'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                        <i class="bi bi-envelope"></i>
                        <span>Contact</span>
                    </a>
                </li><!-- End Contact Page Nav -->


              
            </ul>

        </aside><!-- End Sidebar-->



 
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
       
        $message=$_POST['message'];
        $message=encryptthis($message, $key);
        
        $fname=$verified_session_role; 
        if (!empty($_SERVER["HTTP_CLIENT_IP"])){
          $ip = $_SERVER["HTTP_CLIENT_IP"];
        }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
          $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }else{
          $ip = $_SERVER["REMOTE_ADDR"];
          $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
           $remarks="reply to a ticket";  
           //save to the audit trail table
           mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,ip,affected,host,date) VALUES('$verified_session_username','$remarks','$fname','$ip','$message','$host','$date')")or die(mysqli_error($link));
        
        if($db->conn->query("INSERT INTO hdms_ticket_reply (ticket_id,send_by,message) VALUES('$ticket_id','1','$message')")){
            $success="Reply has been sent";
            $db->conn->query("UPDATE hdms_tickets  SET status=2 WHERE id=$ticket_id");
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
            $mail->setFrom('helpdesksupport@bcp-sis.ga', 'Ticket Reply');
            //$mail->addAddress($_POST['email'], 'Student');     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'HelpDesksupport';
            $mail->Body    = $_POST['message'];
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send($_POST['email'], 'Student');
            //echo "Success!";
        }else{
            $error="Can not send reply";
        }
      }
        
    }
?>
<main id="main" class="main">
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">

          <!-- Report Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="myTabjustified" role="tablist" style="margin-top: 10px;">
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100 active" id=" incoming-tab" data-bs-toggle="tab" data-bs-target="#IncomingDocs" type="button" role="tab" aria-controls="incoming" aria-selected="true">Ticket</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="received-tab" data-bs-toggle="tab" data-bs-target="#ReceivedDocs" type="button" role="tab" aria-controls="profile" aria-selected="false">Information</button>
            </li>
          </ul>
          <div class="tab-content pt-2" id="myTabjustifiedContent">
            <div class="tab-pane fade show active" id="IncomingDocs" role="tabpanel" aria-labelledby=" incoming-tab">

              <!-- tickets -->
              <section class="section">
                    <div class="row">        
                      <div class="col-lg-12">
                        <div class="card">
                          <div class="col-lg-12">
                            <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                              
                            </div>
                          </div>
                          <div class="card mb-3">
                <div class="card-header">
                    Ticket ID : <?php  echo $ticket['ticket_id'] ;?>
                    
                </div>
                <div class="card-body">
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
                     <table class="table">
                        <?php echo '
                      
                        <tr>
                            <th>Email :&nbsp;&nbsp;'.decryptthis($ticket['email'], $key).'</th>
                           
                        </tr>
                        <tr>
                            <th>Subject :&nbsp;&nbsp;'.decryptthis($ticket['subject'], $key).'</th>
                           
                        </tr>
                        <tr>
                            <th>Department :&nbsp;&nbsp;'.decryptthis($ticket['ticket_department'], $key).'</th>
                           
                        </tr>
                          <th>Message :&nbsp'.decryptthis($ticket['message'], $key).'</th>';?>
                       
                    </table>
                   
                    <div class="reply-area">
                        <ul>
                            <?php if(count($reps) > 0) { ?>
                                <?php foreach ($reps as $k => $v) {
                                    if($v['send_by'] == 0){
                                        ?>
                                        <li class="reply-user"><span class="badge bg-info text-dark"><i class="bi bi-person-circle"></i>Student</span>
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
                                    
                                    <li class="reply-me"><span class="badge bg-warning text-dark"> <i class="bi bi-people-fill"></i>Support</span>
                                            <div class="card bg-gray text-dark">
                                                <div class="card-body">
                                                    <p><?php echo decryptthis($v['message'], $key); ?></p>
                                                    <div class="text-right">
                                                        <small>Send by help desk support team at <?php echo $v['date'];?></small>
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
                                <a href="ticket.php?id=<?php echo $_SESSION["login_key"];?> " class="btn btn-secondary ml-2">Back</a>
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
              <section class="section faq">
      <div class="row">
        <div class="col-lg-6">

          <div class="card basic">
            <div class="card-body">
              <h5 class="card-title">Basic Questions</h5>

              <div>
                <h6>Where i can get my diploma?</h6>
                <p>You can get that in the registrar office in bestlink.</p>
              </div>

              <div class="pt-2">
                <h6>What to do if i can't access my lms?</h6>
                <p>You can contact your adviser for that matter student.</p>
              </div>

              <div class="pt-2">
                <h6>What is the use of this system?</h6>
                <p>The purpose of this system is to help the student with their question and inquiries in school.</p>
              </div>

            </div>
          </div>
           <div class="card basic">
            <div class="card-body">
              <h5 class="card-title">Basic Trouble shooting</h5>

              <div>
                <h6>How to reset password?</h6>
                <p>Try the forgot password and it will send you a new password to your email.</p>
              </div>

              <div class="pt-2">
                <h6>How can i access other module?</h6>
                <p>You can access that by clicking the module tabs in the nav bar.</p>
              </div>

              <div class="pt-2">
                <h6>How can i edit my info in my profile?</h6>
                <p>In the nav bar you can see your profile info and click the profile.</p>
              </div>

            </div>
          </div>

          <!-- F.A.Q Group 1 -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Cashier Info</h5>

              <div class="accordion accordion-flush" id="faq-group-1">

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-1" type="button" data-bs-toggle="collapse">
                      Graduation fee
                    </button>
                  </h2>
                  <div id="faqsOne-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      All graduating students are required to pay for graduation fee. it is a one-time, non-transferable fee that is added to the students account when he/she intends to participate in the commencement ceremony. the stuents diploma, TOR, Certificate of graduation an other pertent documents shall not be released to graduates with outstanding balances. 
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-2" type="button" data-bs-toggle="collapse">
                      School Event 
                    </button>
                  </h2>
                  <div id="faqsOne-2" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      Since the students are free from tuition, all approved school activities that need funding. they should pay directly to the cashier required fees.  
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-3" type="button" data-bs-toggle="collapse">
                      Assesment fees
                    </button>
                  </h2>
                  <div id="faqsOne-3" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      Students who will undergo National competency Examination under TESDA program shall pay an assessment and review fee directly to the cashier.<br>
                      Official reciept(O.R) must be secured and presented to the assessment office for the assessment form. Candidates shall bring the following requirements.<br>
                      - 3pcs. Passport-size picture with white background<br>
                      - Long brown enveloped    
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-4" type="button" data-bs-toggle="collapse">
                     Retured checks
                    </button>
                  </h2>
                  <div id="faqsOne-4" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      For clearing purposes, check payments should be made at least a week before the examination<br><br>
                      check payment by students with a record of bouncing/dishonored checks will no longer be accepted.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-5" type="button" data-bs-toggle="collapse">
                      Personal Check of sponsor 
                    </button>
                  </h2>
                  <div id="faqsOne-5" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      The school will not accept the personal check sponsor in behalf of their student beneficiary.
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div><!-- End F.A.Q Group 1 -->

        </div>

        <div class="col-lg-6">

          <!-- F.A.Q Group 2 -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admission Info</h5>

              <div class="accordion accordion-flush" id="faq-group-2">

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-1" type="button" data-bs-toggle="collapse">
                      General Admission Policy?
                    </button>
                  </h2>
                  <div id="faqsTwo-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                      Student shall be admitted to the institution upon proof of presentation of the appropriate and valid credential to the admission committee subject to the rules prescribe therein. the documents required are the following:<br>
                      1. Original High school report card(Form 138)<br>
                      2. Certificate of good moral Character<br>
                      3. NSO/PSA Aunthenticated birth certificate<br>
                      4. Dully Filled up Admission application
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-2" type="button" data-bs-toggle="collapse">
                     Enrollment
                    </button>
                  </h2>
                  <div id="faqsTwo-2" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                     Upon presentation of the original and photo copies of documents enumerated in the general admission. the coordinator shall assess the authenticity of the papers submitted. A brief interview will be conducted and additional papers if any shall be required from the students. 
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-3" type="button" data-bs-toggle="collapse">
                     Failure in 3 units of an academic load of 21 units during a semester<br><br>
                     18 units
                    </button>
                  </h2>
                  <div id="faqsTwo-3" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                      Repeat subject failed without a reduction of load
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-4" type="button" data-bs-toggle="collapse">
                      Back subject
                    </button>
                  </h2>
                  <div id="faqsTwo-4" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                      Back subject are those where students either dropped or failed in a particular semester that caused the student of unit enrolling the prescribe units for the present semester.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-5" type="button" data-bs-toggle="collapse">
                     Transferees
                    </button>
                  </h2>
                  <div id="faqsTwo-5" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                      Student coming from another school intending to transfer in this institution are likewise required to undergo the procedures indicated and shall submit the pertinent papers for entry.<br><br>
                      1. Honorable dismissal<br> 
                      2. Certificate of grades signed be the registrar office(TOR)<br>
                      3. Evaluation of the subject from BCP registrar office<br>
                      4. NSO/PSA Certificate photocopy; bring the original for authentication<br>
                      5. Certificate of good moral character<br>
                      6. Barangay clearance<br>
                      7. Medical certificate from clinic affliated by BCP clinic<br>
                      8. Copy of description of the subject/course taken from previous school   
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div><!-- End F.A.Q Group 2 -->

          <!-- F.A.Q Group 3 -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Registrar Info</h5>

              <div class="accordion accordion-flush" id="faq-group-3">

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-1" type="button" data-bs-toggle="collapse">
                     Practicum/OJT course
                    </button>
                  </h2>
                  <div id="faqsThree-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                      The ojt practicum of the Four-year courses is the inclusive of the maximum thirty (30) units.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-2" type="button" data-bs-toggle="collapse">
                      Grading system
                    </button>
                  </h2>
                  <div id="faqsThree-2" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                      In accordance with the college thrust of achieving academic excellence, the school adopts a grading system that is highly objective nad reflective student's scholastic performance. 
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-3" type="button" data-bs-toggle="collapse">
                      Correction and changing of personal data
                    </button>
                  </h2>
                  <div id="faqsThree-3" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                      Corrections/changes of the personal data of the students may be made upon the presentation of the documents to the office of the registrar for validity. 
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-4" type="button" data-bs-toggle="collapse">
                     Adding/changing subject and schedule
                    </button>
                  </h2>
                  <div id="faqsThree-4" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                      the school allows student to drop, add, and change subjects for valid reasons and within the prescribe period of one week with regular classes.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-5" type="button" data-bs-toggle="collapse">
                      Crediting, Equivalence and substitute subjects
                    </button>
                  </h2>
                  <div id="faqsThree-5" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                      Graduating students with valid reason find difficulty to finish their program requirements due to related curriculum changes.
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div><!-- End F.A.Q Group 3 -->

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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->
  <script>
if(window.history.replaceState) {
  window.history.replaceState(null,null,window.location.href)
}




 </script>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  
  </body>
</html>