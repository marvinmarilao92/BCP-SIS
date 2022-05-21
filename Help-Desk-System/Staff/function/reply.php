
<?php
 //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require '../vendor/autoload.php';

    //set the correct timezone
    date_default_timezone_set('Asia/Manila');
		$date = date("Y-m-d H:i:s",strtotime("+0 HOURS"));

    $success=false;
    $error=false;


    //include the new connection
    include "../include/new_db.php";
    include '../include/conn.php';
    include '../session.php';

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


//Reply Send Method
    if(isset($_POST['submit'])){

        date_default_timezone_set("asia/manila");
        $date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
        $message=$_POST['message'];
        $message=encryptthis($message, $key);



        //
        include "../session.php";
        $fname=$verified_session_role; 
        if (!empty($_SERVER["HTTP_CLIENT_IP"])){
          $ip = $_SERVER["HTTP_CLIENT_IP"];
        }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
          $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }else{
          $ip = $_SERVER["REMOTE_ADDR"];
          $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
           $remarks="replied to a ticket";  
           //save to the audit trail table
           mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,ip,affected,host,date) VALUES('$verified_session_username','$remarks','$fname','$ip','$message','$host','$date')")or die(mysqli_error($link));
        
           $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
           VALUES ('$d_actor3', '0' ,'$doc_title','0','Reply to a user','Ticket reply','$d_off1','Active','$date')") or die(mysqli_error($conn));

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
            //$mail->addAddress($_POST['email'] , 'Student');     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'HelpDesksupport';
            $mail->Body    = $_POST['message'];
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            //echo "Success!";
        }else{
            $error="Can not send reply";
        }
      }
        
    }