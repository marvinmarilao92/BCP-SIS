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

    if(isset($_POST['accNumber'])&&isset($_POST['emailSubject'])&&isset($_POST['emailMessage'])){
        $account_no = mysqli_real_escape_string($conn,$_POST['accNumber']);
        $subject = mysqli_real_escape_string($conn,$_POST['emailSubject']);
        $message = mysqli_real_escape_string($conn,$_POST['emailMessage']);
        //for encription
        // $email=encryptthis($email, $key);       
        // $subject=encryptthis($subject, $key);
        // $message=encryptthis($message, $key);
        $query  = "SELECT *,LEFT(middlename,1) as MI FROM student_information WHERE id_number = '".$account_no."'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
            //array data
              $idnum = $row["id_number"];
              $fname = $row["firstname"];
              $lname = $row["lastname"];
              $mname = $row["MI"];
              $course = $row["course"];
              $email = $row["email"];
              $gen = $row["gender"];
              $CS = $row["civil_status"];
              $AS = $row["account_status"];     

              if($gen =='Male' && $CS =='Single' || $CS =='Divorced'){
                $gentitle = "Mr.";
              }else if($gen =='Female' && $CS =='Single' || $CS =='Divorced'){
                $gentitle = "Ms.";
              }else if($gen =='Male' && $CS =='Married' || $CS =='Widowed '){
                $gentitle = "Mr.";
              }else if($gen =='Female' && $CS =='Single' || $CS =='Divorced'){
                $gentitle = "Mrs.";
              }
              
            //email sending  
              $unid=random_bytes(10);
              $unid=bin2hex($unid);
        
              $db=new DB();

              if (!empty($_SERVER["HTTP_CLIENT_IP"])){
                $ip = $_SERVER["HTTP_CLIENT_IP"];
              }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
                $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
              }else{
                $ip = $_SERVER["REMOTE_ADDR"];
                $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                $remarks="Send Direct Email for $account_no";  
                //save to the audit trail table

                mysqli_query($conn,"INSERT INTO audit_trail(account_no,action,actor,ip,affected,host,date) VALUES('$verified_session_username','$remarks','$fname','$ip','$subject','$host','$date')")or die(mysqli_error($conn));

                $sql="INSERT INTO datms_emails (acc_id,email,subject,message,status) 
               VALUES ('$account_no','$email','$subject','$message','Sent')" or die("<script>alert('Error');</script>");
                
                $inset=$db->conn->query($sql);
                if($inset){
                      // $success='Your ticket has been created. Make sure to check your email inbox for ticket ID';
                      $mail = new PHPMailer;
                      $mail->isSMTP();
                      $mail->SMTPDebug = 0;                                       //Send using SMTP
                      $mail->Host       = 'smtp.hostinger.com';                   //Set the SMTP server to send through
                      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                      $mail->Username   = 'registrar_datms@bcp-sis.ga';           //SMTP username
                      $mail->Password   = '#Registrar01!';                         //SMTP password
                      $mail->SMTPSecure = 'TLS';                                  //Enable implicit TLS encryption
                      $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
              
                      //Recipients
                      $mail->setFrom('registrar_datms@bcp-sis.ga', 'Registrar Department Support');
                      $mail->addAddress($email);//Add a recipient
                      $mail->AddReplyTo('registrar_datms@bcp-sis.ga', "No Reply"); // indicates ReplyTo headers
                    
                    $body = 
                      "<div class='card'>          
                        <div class='card-body'>
                          <h5 class='card-title'></h5>
                          <p class='card-text'>This is direct message from Registrar Department<br>
                          <br>Dear ".$gentitle." ".$lname." <br>".$message."<br><br>
                          This email is sent from an account we use for sending messages only. So if<br>
                          you want to contact us, don't reply to this email-we won't get your response.<br>
                          Instead, Go to Registrar office to comply.<br>
                          <br>Thank you! Stay safe.</p>
                        </div>
                      </div>
                      
                      <div class='alert alert-light bg-light border-0 alert-dismissible fade show' role='alert'>
                        © Copyright Bestlink College of the Philippines. All Rights Reserved.
                      </div>             
                    ";
                      
                      //Content
                      $mail->isHTML(true); //Set email format to HTML
                      $mail->Subject = $subject;
                      $mail->Body    = $body;
                      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                      
                      
                      if($mail->send()){
                        echo ('success');
                      }else{
                        echo ('failed');
                      }
                        //echo "Dear Student your tickets has been sent to our help desk support team and we will back to you shortly. and here is your ticket id $unid please keep your ticket id";
                }
                else {
                  echo ('failed');
                  // $error = "Ticket did not send!";
                }
              }		
            //end of email sending       
          }
        }else{
          $query  = "SELECT *,LEFT(middlename,1) as MI FROM teacher_information WHERE `account_status` NOT IN ('Inactive') AND id_number = '".$account_no."'";
          $result = mysqli_query($conn, $query);
          if(mysqli_num_rows($result) > 0)
          {
            while($row = mysqli_fetch_array($result))
            {
              //array data
                $idnum = $row["id_number"];
                $fname = $row["firstname"];
                $lname = $row["lastname"];
                $mname = $row["MI"];
                $course = $row["course"];
                $email = $row["email"];
                $gen = $row["gender"];
                $CS = $row["civil_status"];
                $AS = $row["account_status"];     

                if($gen =='Male' && $CS =='Single' || $CS =='Divorced'){
                  $gentitle = "Mr.";
                }else if($gen =='Female' && $CS =='Single' || $CS =='Divorced'){
                  $gentitle = "Ms.";
                }else if($gen =='Male' && $CS =='Married' || $CS =='Widowed '){
                  $gentitle = "Mr.";
                }else if($gen =='Female' && $CS =='Single' || $CS =='Divorced'){
                  $gentitle = "Mrs.";
                }
                
              //email sending  
                $unid=random_bytes(10);
                $unid=bin2hex($unid);
          
                $db=new DB();

                if (!empty($_SERVER["HTTP_CLIENT_IP"])){
                  $ip = $_SERVER["HTTP_CLIENT_IP"];
                }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
                  $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                }else{
                  $ip = $_SERVER["REMOTE_ADDR"];
                  $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                  $remarks="Send Direct Email for $account_no";  
                  //save to the audit trail table

                  mysqli_query($conn,"INSERT INTO audit_trail(account_no,action,actor,ip,affected,host,date) VALUES('$verified_session_username','$remarks','$fname','$ip','$subject','$host','$date')")or die(mysqli_error($conn));

                  $sql="INSERT INTO datms_emails (ticket_id,status,email,subject,message) 
                  VALUES ('$account_no','$email','$subject','$message','Sent')" or die("<script>alert('Error');</script>");
                  
                  $inset=$db->conn->query($sql);
                  if($inset){
                        // $success='Your ticket has been created. Make sure to check your email inbox for ticket ID';
                        $mail = new PHPMailer;
                        $mail->isSMTP();
                        $mail->SMTPDebug = 0;                                       //Send using SMTP
                        $mail->Host       = 'smtp.hostinger.com';                   //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'registrar_datms@bcp-sis.ga';           //SMTP username
                        $mail->Password   = '#Registrar01!';                         //SMTP password
                        $mail->SMTPSecure = 'TLS';                                  //Enable implicit TLS encryption
                        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                        //Recipients
                        $mail->setFrom('registrar_datms@bcp-sis.ga', 'Registrar Department Support');
                        $mail->addAddress($email);//Add a recipient
                        $mail->AddReplyTo('registrar_datms@bcp-sis.ga', "No Reply"); // indicates ReplyTo headers
                      
                      $body = 
                        "<div class='card'>          
                          <div class='card-body'>
                            <h5 class='card-title'></h5>
                            <p class='card-text'>This is direct message from Registrar Department<br>
                            <br>Dear ".$gentitle." ".$lname." <br>".$message."<br><br>
                            This email is sent from an account we use for sending messages only. So if<br>
                            you want to contact us, don't reply to this email-we won't get your response.<br>
                            Instead, Go to Registrar office to comply.<br>
                            <br>Thank you! Stay safe.</p>
                          </div>
                        </div>
                        
                        <div class='alert alert-light bg-light border-0 alert-dismissible fade show' role='alert'>
                          © Copyright Bestlink College of the Philippines. All Rights Reserved.
                        </div>             
                      ";
                        
                        //Content
                        $mail->isHTML(true); //Set email format to HTML
                        $mail->Subject = $subject;
                        $mail->Body    = $body;
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                        
                        
                        if($mail->send()){
                          echo ('success');
                        }else{
                          echo ('failed');
                        }
                          //echo "Dear Student your tickets has been sent to our help desk support team and we will back to you shortly. and here is your ticket id $unid please keep your ticket id";
                  }
                  else {
                    echo ('failed');
                    // $error = "Ticket did not send!";
                  }
                }		
              //end of email sending       
            }
          }else{
            $query  = "SELECT *,LEFT(middlename,1) as MI FROM teacher_information WHERE `account_status` NOT IN ('Inactive') AND id_number = '".$account_no."'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) > 0)
            {
              while($row = mysqli_fetch_array($result))
              {
                //array data
                  $idnum = $row["id_number"];
                  $fname = $row["firstname"];
                  $lname = $row["lastname"];
                  $mname = $row["MI"];
                  // $course = $row["course"];
                  $email = $row["email"];
                  $gen = $row["gender"];
                  $CS = $row["civil_status"];
                  $AS = $row["account_status"];     
  
                  if($gen =='Male' && $CS =='Single' || $CS =='Divorced'){
                    $gentitle = "Mr.";
                  }else if($gen =='Female' && $CS =='Single' || $CS =='Divorced'){
                    $gentitle = "Ms.";
                  }else if($gen =='Male' && $CS =='Married' || $CS =='Widowed '){
                    $gentitle = "Mr.";
                  }else if($gen =='Female' && $CS =='Single' || $CS =='Divorced'){
                    $gentitle = "Mrs.";
                  }
                  
                //email sending  
                  $unid=random_bytes(10);
                  $unid=bin2hex($unid);
            
                  $db=new DB();
  
                  if (!empty($_SERVER["HTTP_CLIENT_IP"])){
                    $ip = $_SERVER["HTTP_CLIENT_IP"];
                  }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
                    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                  }else{
                    $ip = $_SERVER["REMOTE_ADDR"];
                    $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                    $remarks="Send Direct Email for $account_no";  
                    //save to the audit trail table
  
                    mysqli_query($conn,"INSERT INTO audit_trail(account_no,action,actor,ip,affected,host,date) VALUES('$verified_session_username','$remarks','$fname','$ip','$subject','$host','$date')")or die(mysqli_error($conn));
  
                    $sql="INSERT INTO datms_emails (acc_id,email,subject,message,status) 
                    VALUES ('$account_no','$email','$subject','$message','Sent')" or die("<script>alert('Error');</script>");
                    
                    $inset=$db->conn->query($sql);
                    if($inset){
                          // $success='Your ticket has been created. Make sure to check your email inbox for ticket ID';
                          $mail = new PHPMailer;
                          $mail->isSMTP();
                          $mail->SMTPDebug = 0;                                       //Send using SMTP
                          $mail->Host       = 'smtp.hostinger.com';                   //Set the SMTP server to send through
                          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                          $mail->Username   = 'registrar_datms@bcp-sis.ga';           //SMTP username
                          $mail->Password   = '#Registrar01!';                         //SMTP password
                          $mail->SMTPSecure = 'TLS';                                  //Enable implicit TLS encryption
                          $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                  
                          //Recipients
                          $mail->setFrom('registrar_datms@bcp-sis.ga', 'Registrar Department Support');
                          $mail->addAddress($email);//Add a recipient
                          $mail->AddReplyTo('registrar_datms@bcp-sis.ga', "No Reply"); // indicates ReplyTo headers
                        
                        $body = 
                          "<div class='card'>          
                            <div class='card-body'>
                              <h5 class='card-title'></h5>
                              <p class='card-text'>This is direct message from Registrar Department<br>
                              <br>Dear ".$gentitle." ".$lname." <br>".$message."<br><br>
                              This email is sent from an account we use for sending messages only. So if<br>
                              you want to contact us, don't reply to this email-we won't get your response.<br>
                              Instead, Go to Registrar office to comply.<br>
                              <br>Thank you! Stay safe.</p>
                            </div>
                          </div>
                          
                          <div class='alert alert-light bg-light border-0 alert-dismissible fade show' role='alert'>
                            © Copyright Bestlink College of the Philippines. All Rights Reserved.
                          </div>             
                        ";
                          
                          //Content
                          $mail->isHTML(true); //Set email format to HTML
                          $mail->Subject = $subject;
                          $mail->Body    = $body;
                          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                          
                          
                          if($mail->send()){
                            echo ('success');
                          }else{
                            echo ('failed');
                          }
                            //echo "Dear Student your tickets has been sent to our help desk support team and we will back to you shortly. and here is your ticket id $unid please keep your ticket id";
                    }
                    else {
                      echo ('failed');
                      // $error = "Ticket did not send!";
                    }
                  }		
                //end of email sending       
              }
            }else{
              echo ('failed');
            }   
          }   
        }   
      
    }

  ?>