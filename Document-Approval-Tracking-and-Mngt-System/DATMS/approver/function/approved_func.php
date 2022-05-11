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
    $db = mysqli_select_db($conn, 'sis_db');

    if(isset($_POST['docs_id'])&&isset($_POST['docs_code'])&&isset($_POST['docs_act2']) && isset($_POST['docs_off2'])){
        // Object Connection
             date_default_timezone_set("asia/manila");
             $date = date("Y-m-d H:i:s",strtotime("+0 HOURS"));
             $id = mysqli_real_escape_string($conn,$_POST['docs_id']);
             $doc_code = mysqli_real_escape_string($conn,$_POST['docs_code']);
             $d_act2 = mysqli_real_escape_string($conn,$_POST['docs_act2']);
             $d_off2 = mysqli_real_escape_string($conn,$_POST['docs_off2']);
             $d_remarks = mysqli_real_escape_string($conn,$_POST['docs_remarks']);
             
            $q_checkcode = $conn->query("SELECT * FROM `datms_documents` WHERE `doc_code` = '$doc_code'") or die(mysqli_error($conn));
            $v_checkcode = $q_checkcode->num_rows;
            $fetch = mysqli_fetch_array($q_checkcode);
            $account_no=$fetch["doc_title"];
            if($v_checkcode < 1){
                echo ('Val30');
            }else{
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

                        $conn->query("UPDATE datms_documents SET doc_status = 'Approved', doc_actor2 ='$d_act2', doc_off2='$d_off2', doc_date2 ='$date' , doc_remarks ='$d_remarks' WHERE doc_id='$id'") or die(mysqli_error($conn));
                        // record for tracking
                        $sql1 = "SELECT * FROM `datms_documents` WHERE `doc_code` = '$doc_code'";
                        if($result1 = mysqli_query($conn, $sql1)){
                            if(mysqli_num_rows($result1) > 0){
                            while ($row1 = mysqli_fetch_array($result1)) {
                                $doc_title =  mysqli_real_escape_string($conn,$row1["doc_title"]);
                                $filename =  mysqli_real_escape_string($conn,$row1["doc_name"]);
                                $size =  mysqli_real_escape_string($conn,$row1["doc_size"]);
                                $doc_type =  mysqli_real_escape_string($conn,$row1["doc_type"]);
                                $doc_desc =  mysqli_real_escape_string($conn,$row1["doc_desc"]);
        
                                $d_act1 =  mysqli_real_escape_string($conn,$row1["doc_actor1"]);
                                $d_off1 =  mysqli_real_escape_string($conn,$row1["doc_off1"]);
                                $d_date1 =  mysqli_real_escape_string($conn,$row1["doc_date1"]);
        
                                $tracker =  mysqli_real_escape_string($conn,$row1["doc_actor3"]);
        
                                //create audit trail record
                                    //add session connceti 
                                    $fname=$verified_session_role; 
                                    if (!empty($_SERVER["HTTPS_CLIENT_IP"])){
                                        $ip = $_SERVER["HTTPS_CLIENT_IP"];
                                    }elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])){
                                        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                                    }else{
                                        $ip = $_SERVER["REMOTE_ADDR"];
                                        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                                        $remarks="Document has been approved";  
                                        //save to the audit trail table
                                        mysqli_query($conn,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$doc_code','$ip','$host','$date')")or die(mysqli_error($conn));
                                        // query
                                        $conn->query("INSERT INTO datms_tracking (doc_code, doc_title, doc_name, doc_size, doc_type, doc_status, doc_desc, doc_actor1, doc_off1, doc_date1,doc_actor2,doc_off2, doc_date2,doc_remarks)
                                        VALUES ('$doc_code', '$doc_title' ,'$filename','$size','$doc_type','Approved','$doc_desc','$d_act2','$d_off2','$date','$d_act1','$d_off1','$d_date1','Document is Approved by')") or die(mysqli_error($conn));

                                        $update_notif = $conn->query("UPDATE datms_notification SET act1 = '', act2 = '', date = '$date' WHERE affected = '".$doc_code."'") or die(mysqli_error($conn));
                                        if($update_notif){
                                        $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date, affected)
                                        VALUES ('$d_act1', '0' ,'','0','Received Document','You successfully received the document','$d_off2','Active','$date','$doc_code')") or die(mysqli_error($conn));
                                            $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                                            VALUES ('$tracker', '0' ,'','0','Approved Document','Your document has been approved','$d_off2','Active','$date')") or die(mysqli_error($conn));
                                            // Self notifier
                                            $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                                            VALUES ('$verified_session_firstname $verified_session_lastname', '0' ,'','0','Approved Document','You approved $doc_type of $doc_title','$d_off2','Active','$date')") or die(mysqli_error($conn));
            
                                            //notif of students              
                                            $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                                            VALUES ('', '0' ,'$doc_title','0','Approved Document','Your $doc_type is approved by $d_act2','$d_off2','Active','$date')") or die(mysqli_error($conn));   
                                        }  
          
        
                                       
                                        $message = "Your $doc_type is Approved by $verified_session_firstname $verified_session_lastname from Registrar Department Present your self to the registrar bring your bestlink school id and screenshot of your request barcode to claim your template Registrar is open from Monday to Friday Excluding non-working holidays From 8am to 5pm.";

                                        //email sending 
                                            $sql="INSERT INTO datms_emails (acc_id,email,subject,message,status) 
                                            VALUES ('$account_no','$email','Document Approved','$message','Sent')" or die("<script>alert('Error');</script>");
                                            
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
                                                    <br>Dear ".$gentitle." ".$lname."<br><br>
													Your ".$doc_type." is Approved by ".$verified_session_firstname." ".$verified_session_lastname." from <br>
													Registrar Department Present your self to the registrar bring bestlink school id and <br>
													screenshot of your request barcode to claim your template.<br>
													<br> Remarks: ".$d_remarks.".<br><br>
													Registrar is open from Monday to Friday Excluding non-working holidays 
													From 8am to 5pm.
													<br><br>
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
                                                $mail->Subject = 'Document Approved';
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
                                        //end of email sending
                                    }
                                //end of audit trail
                                }
                            }
                        }
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
                            }else if($gender =='Female' && $civil_status =='Married' || $civil_status =='Widowed'){
                                $gentitle = "Mrs.";
                            }
                            
                            //email sending  
                            $unid=random_bytes(10);
                            $unid=bin2hex($unid);
                        
                            $db=new DB();
    
                            $conn->query("UPDATE datms_documents SET doc_status = 'Approved', doc_actor2 ='$d_act2', doc_off2='$d_off2', doc_date2 ='$date' , doc_remarks ='$d_remarks' WHERE doc_id='$id'") or die(mysqli_error($conn));
                            // record for tracking
                            $sql1 = "SELECT * FROM `datms_documents` WHERE `doc_code` = '$doc_code'";
                            if($result1 = mysqli_query($conn, $sql1)){
                                if(mysqli_num_rows($result1) > 0){
                                while ($row1 = mysqli_fetch_array($result1)) {
                                    $doc_title =  mysqli_real_escape_string($conn,$row1["doc_title"]);
                                    $filename =  mysqli_real_escape_string($conn,$row1["doc_name"]);
                                    $size =  mysqli_real_escape_string($conn,$row1["doc_size"]);
                                    $doc_type =  mysqli_real_escape_string($conn,$row1["doc_type"]);
                                    $doc_desc =  mysqli_real_escape_string($conn,$row1["doc_desc"]);
            
                                    $d_act1 =  mysqli_real_escape_string($conn,$row1["doc_actor1"]);
                                    $d_off1 =  mysqli_real_escape_string($conn,$row1["doc_off1"]);
                                    $d_date1 =  mysqli_real_escape_string($conn,$row1["doc_date1"]);
            
                                    $tracker =  mysqli_real_escape_string($conn,$row1["doc_actor3"]);
            
                                    //create audit trail record
                                        //add session conncetio 
                                        $fname=$verified_session_role; 
                                        if (!empty($_SERVER["HTTPS_CLIENT_IP"])){
                                            $ip = $_SERVER["HTTPS_CLIENT_IP"];
                                        }elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])){
                                            $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                                        }else{
                                            $ip = $_SERVER["REMOTE_ADDR"];
                                            $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                                            $remarks="Document has been approved";  
                                            //save to the audit trail table
                                            mysqli_query($conn,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$doc_code','$ip','$host','$date')")or die(mysqli_error($conn));
                                            // query
                                            $conn->query("INSERT INTO datms_tracking (doc_code, doc_title, doc_name, doc_size, doc_type, doc_status, doc_desc, doc_actor1, doc_off1, doc_date1,doc_actor2,doc_off2, doc_date2,doc_remarks)
                                            VALUES ('$doc_code', '$doc_title' ,'$filename','$size','$doc_type','Approved','$doc_desc','$d_act2','$d_off2','$date','$d_act1','$d_off1','$d_date1','Document is Approved by')") or die(mysqli_error($conn));
            
                                           $update_notif = $conn->query("UPDATE datms_notification SET act1 = '', act2 = '', date = '$date' WHERE affected = '".$doc_code."'") or die(mysqli_error($conn));
                                            if($update_notif){
                                            $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date, affected)
                                            VALUES ('$d_act1', '0' ,'','0','Received Document','You successfully received the document','$d_off2','Active','$date','$doc_code')") or die(mysqli_error($conn));
                                                $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                                                VALUES ('$tracker', '0' ,'','0','Approved Document','Your document has been approved','$d_off2','Active','$date')") or die(mysqli_error($conn));
                                                // Self notifier
                                                $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                                                VALUES ('$verified_session_firstname $verified_session_lastname', '0' ,'','0','Approved Document','You approved $doc_type of $doc_title','$d_off2','Active','$date')") or die(mysqli_error($conn));
                
                                                //notif of students              
                                                $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                                                VALUES ('', '0' ,'$doc_title','0','Approved Document','Your $doc_type is approved by $d_act2','$d_off2','Active','$date')") or die(mysqli_error($conn));   
                                            }  
            
                                            $message = "Your $doc_type is Approved by $verified_session_firstname $verified_session_lastname from Registrar Department Present your self to the registrar bring your bestlink school id and screenshot of your request barcode to claim your template Registrar is open from Monday to Friday Excluding non-working holidays From 8am to 5pm.";
    
                                            //email sending 
                                                $sql="INSERT INTO datms_emails (acc_id,email,subject,message,status) 
                                                VALUES ('$account_no','$email','Document Approved','$message','Sent')" or die("<script>alert('Error');</script>");
                                                
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
                                                        <br>Dear ".$gentitle." ".$lname."<br><br>
                                                        Your ".$doc_type." is Approved by ".$verified_session_firstname." ".$verified_session_lastname." from <br>
                                                        Registrar Department Present your self to the registrar bring bestlink school id and <br>
                                                        screenshot of your request barcode to claim your template.<br>
                                                        <br> Remarks: ".$d_remarks.".<br><br>
                                                        Registrar is open from Monday to Friday Excluding non-working holidays 
                                                        From 8am to 5pm.
                                                        <br><br>
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
                                                    $mail->Subject = 'Document Approved';
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
                                            //end of email sending
                                        }
                                    //end of audit trail
                                    }
                                }
                            }
                        }            
                    }else{
                        $query  = "SELECT *,LEFT(middlename,1) as MI FROM user_information WHERE `account_status` NOT IN ('Deactivated') AND id_number = '".$account_no."'";
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
        
                                $conn->query("UPDATE datms_documents SET doc_status = 'Approved', doc_actor2 ='$d_act2', doc_off2='$d_off2', doc_date2 ='$date' , doc_remarks ='$d_remarks' WHERE doc_id='$id'") or die(mysqli_error($conn));
                                // record for tracking
                                $sql1 = "SELECT * FROM `datms_documents` WHERE `doc_code` = '$doc_code'";
                                if($result1 = mysqli_query($conn, $sql1)){
                                    if(mysqli_num_rows($result1) > 0){
                                    while ($row1 = mysqli_fetch_array($result1)) {
                                        $doc_title =  mysqli_real_escape_string($conn,$row1["doc_title"]);
                                        $filename =  mysqli_real_escape_string($conn,$row1["doc_name"]);
                                        $size =  mysqli_real_escape_string($conn,$row1["doc_size"]);
                                        $doc_type =  mysqli_real_escape_string($conn,$row1["doc_type"]);
                                        $doc_desc =  mysqli_real_escape_string($conn,$row1["doc_desc"]);
                
                                        $d_act1 =  mysqli_real_escape_string($conn,$row1["doc_actor1"]);
                                        $d_off1 =  mysqli_real_escape_string($conn,$row1["doc_off1"]);
                                        $d_date1 =  mysqli_real_escape_string($conn,$row1["doc_date1"]);
                
                                        $tracker =  mysqli_real_escape_string($conn,$row1["doc_actor3"]);
                
                                        //create audit trail record
                                            //add session conncetion 
                                            $fname=$verified_session_role; 
                                            if (!empty($_SERVER["HTTPS_CLIENT_IP"])){
                                                $ip = $_SERVER["HTTPS_CLIENT_IP"];
                                            }elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])){
                                                $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                                            }else{
                                                $ip = $_SERVER["REMOTE_ADDR"];
                                                $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                                                $remarks="Document has been approved";  
                                                //save to the audit trail table
                                                mysqli_query($conn,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$doc_code','$ip','$host','$date')")or die(mysqli_error($conn));
                                                // query
                                                $conn->query("INSERT INTO datms_tracking (doc_code, doc_title, doc_name, doc_size, doc_type, doc_status, doc_desc, doc_actor1, doc_off1, doc_date1,doc_actor2,doc_off2, doc_date2,doc_remarks)
                                                VALUES ('$doc_code', '$doc_title' ,'$filename','$size','$doc_type','Approved','$doc_desc','$d_act2','$d_off2','$date','$d_act1','$d_off1','$d_date1','Document is Approved by')") or die(mysqli_error($conn));
                
                                                 $update_notif = $conn->query("UPDATE datms_notification SET act1 = '', act2 = '', date = '$date' WHERE affected = '".$doc_code."'") or die(mysqli_error($conn));
                                                if($update_notif){
                                                $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date, affected)
                                                VALUES ('$d_act1', '0' ,'','0','Received Document','You successfully received the document','$d_off2','Active','$date','$doc_code')") or die(mysqli_error($conn));
                                                    $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                                                    VALUES ('$tracker', '0' ,'','0','Approved Document','Your document has been approved','$d_off2','Active','$date')") or die(mysqli_error($conn));
                                                    // Self notifier
                                                    $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                                                    VALUES ('$verified_session_firstname $verified_session_lastname', '0' ,'','0','Approved Document','You approved $doc_type of $doc_title','$d_off2','Active','$date')") or die(mysqli_error($conn));
                    
                                                    //notif of students              
                                                    $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                                                    VALUES ('', '0' ,'$doc_title','0','Approved Document','Your $doc_type is approved by $d_act2','$d_off2','Active','$date')") or die(mysqli_error($conn));   
                                                }  
                                                $message = "Your $doc_type is Approved by $verified_session_firstname $verified_session_lastname from Registrar Department Present your self to the registrar bring your bestlink school id and screenshot of your request barcode to claim your template Registrar is open from Monday to Friday Excluding non-working holidays From 8am to 5pm.";
        
                                                //email sending 
                                                    $sql="INSERT INTO datms_emails (acc_id,email,subject,message,status) 
                                                    VALUES ('$account_no','$email','Document Approved','$message','Sent')" or die("<script>alert('Error');</script>");
                                                    
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
                                                            <br>Dear ".$gentitle." ".$lname."
                                                            <br><br>
                                                            Your ".$doc_type." is Approved by ".$verified_session_firstname." ".$verified_session_lastname." from <br>
                                                            Registrar Department Present your self to the registrar bring bestlink school id and <br>
                                                            screenshot of your request barcode to claim your template.<br>
                                                            <br> Remarks: ".$d_remarks.".
                                                            <br><br>
                                                            Registrar is open from Monday to Friday Excluding non-working holidays 
                                                            From 8am to 5pm.
                                                            <br><br>
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
                                                        $mail->Subject = 'Document Approved';
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
                                                //end of email sending
                                            }
                                        //end of audit trail
                                        }
                                    }
                                }
                            }            
                        }else{
                            echo ('Val69');
                        }
                    }
                }
            }
        }else{
            echo ('Val69');
        }
?>
