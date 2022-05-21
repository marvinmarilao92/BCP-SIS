<?php

//Reply Send Method
    if(isset($_POST['submit'])){

        date_default_timezone_set("asia/manila");
        $date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
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
           $remarks="replied to a ticket";  
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
            $mail->addAddress($_POST['email'] , 'Student');     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Help Desk support';
            $mail->Body    = $_POST['message'];
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            //echo "Success!";
        }else{
            $error="Can not send reply";
        }
      }
        
    }