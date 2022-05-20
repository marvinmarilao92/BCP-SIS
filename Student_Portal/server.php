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
include "includes/new_db.php";




ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 

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

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email=$_POST['email'];
    $email=encryptthis($email, $key);
    $subject=$_POST['subject'];
    $subject=encryptthis($subject, $key);
    $message=$_POST['message'];
    $message=encryptthis($message, $key);
  

    $unid=random_bytes(10);
    $unid=bin2hex($unid);

    $db=new DB();
        include "includes/session.php";
        	//create audit trail record
    $fname= $_SESSION['session_department'] = "Student";
    if (!empty($_SERVER["HTTP_CLIENT_IP"])){
      $ip = $_SERVER["HTTP_CLIENT_IP"];
    }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
      $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }else{
      $ip = $_SERVER["REMOTE_ADDR"];
      $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
       $remarks="submitted a ticket";  
       //save to the audit trail table
       mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,ip,affected,host) VALUES('$verified_session_username','$remarks','$fname','$ip','$subject','$host')")or die(mysqli_error($link));

    $sql="INSERT INTO hdms_tickets (ticket_id,status,email,subject,message) 
    VALUES ('$unid','0','$email','$subject','$message')" or die("<script>alert('Error');</script>");
    
    $inset=$db->conn->query($sql);
   if($inset){
        $success='Your ticket has been created. copy this ticket id and save it. '.$unid;
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
        $mail->addAddress($_POST['email'], 'Student');     //Add a recipient
       
       $body = 
       '  <div class="card">
    
       <div class="card-body">
         <h5 class="card-title">######Please dont share your ticket ID######</h5>
         <p class="card-text">Dear Student your ticket has been sent to our help desk support team and we will back to you shortly<br>
         for inquiries and question just submit another ticket to our help desk system or just send us an email @helpdesksupport@bcp-sis.ga
         <br>Thank you! Stay safe.</p>
       </div>
     </div>
       
       <h3>Ticket ID: '.$unid.'</h3>
       
       <div class="alert alert-light bg-light border-0 alert-dismissible fade show" role="alert">
       © Copyright Bestlink College of the Philippines. All Rights Reserved.
     </div>
       
       
       ';
        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'You Submitted a ticket';
        $mail->Body    = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        $mail->send();
          echo "Dear Student your tickets has been sent to our help desk support team and we will back to you shortly. and here is your ticket id $unid please keep your ticket id";
        }
        //error message 
     else {
       $error = "Ticket did not send!";
    } 
    echo '<script>showAlert();window.setTimeout(function () {HideAlert();},3000);</script>';  echo "<meta http-equiv='refresh' content='0;url=view_ticket.php'>";

    }		
							
    
   
}

