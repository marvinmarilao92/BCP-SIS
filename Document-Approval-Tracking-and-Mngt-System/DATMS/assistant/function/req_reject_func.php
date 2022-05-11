<?php

 	require_once("../include/conn.php");
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
	include '../session.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

   if(isset($_POST['remarks'])&&isset($_POST['req_code'])&&isset($_POST['docu'])&&isset($_POST['studid'])&&isset($_POST['req_act'])){
    // Object Connection
		$message = '';
		 date_default_timezone_set("asia/manila");
		 $date = date("Y-m-d H:i:s",strtotime("+0 HOURS"));
		//  $Dt_code = mysqli_real_escape_string($conn,$_POST['dtcode']);
		$R_remarks = mysqli_real_escape_string($conn,$_POST['remarks']);
		$R_code = mysqli_real_escape_string($conn,$_POST['req_code']);
		$R_docu = mysqli_real_escape_string($conn,$_POST['docu']);
		$R_studid = mysqli_real_escape_string($conn,$_POST['studid']);
		$R_actor = mysqli_real_escape_string($conn,$_POST['req_act']);

		$query  = "SELECT *,LEFT(middlename,1) as MI FROM student_information WHERE id_number = '".$R_studid."'";
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
              }else if($gender =='Female' && $civil_status =='Married' || $civil_status =='Widowed'){
                $gentitle = "Mrs.";
              }
              
            //email sending  
              $unid=random_bytes(10);
              $unid=bin2hex($unid);
        
              $db=new DB();

							$message = "Your $R_docu Template is Rejected by $verified_session_firstname $verified_session_lastname from Registrar Department you  equest has been decline for multiple reason you have to request for another one. Go to your student portal click request document button and create another request
							";
								$sql="INSERT INTO datms_emails(acc_id,email,subject,message,status) 
								VALUES ('$R_studid','$email','Reject Template Request','$message','Sent')" or die("<script>alert('Error');</script>");
                
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
													Your ".$R_docu." Template is Rejected by ".$verified_session_firstname." ".$verified_session_lastname." from <br>
													Registrar Department you request has been decline for <br>
													multiple reason you have to request for another one.<br>
													<br>
													Go to your student portal click request document button and create another request
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
                      $mail->Subject = "Reject Template Request";
                      $mail->Body    = $body;
                      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                      
                      if($mail->send()){
												$q_checkcode = $conn->query("SELECT * FROM `datms_tempreq` WHERE `req_code` = '$R_code'") or die(mysqli_error($conn));
												$v_checkcode = $q_checkcode->num_rows;
												if($v_checkcode != 1){
													echo ('failed');
												}else {
												//create audit trail record
													$fname=$verified_session_role; 
													if (!empty($_SERVER["HTTP_CLIENT_IP"])){
														$ip = $_SERVER["HTTP_CLIENT_IP"];
													}elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
														$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
													}else{
														$ip = $_SERVER["REMOTE_ADDR"];
														$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
														$remarks="Request for $R_docu has been rejected";  
														//save to the audit trail table
														mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$R_studid','$ip','$host','$date')")or die(mysqli_error($link));

														//save doctype to the database
														$conn->query("UPDATE datms_tempreq SET status='Rejected', remarks='$R_remarks', actor='$R_actor', date='$date' WHERE req_code='$R_code'") or die(mysqli_error($conn));
										
														

                             $update_notif = $conn->query("UPDATE datms_notification SET act1 = '', act2 = '', date = '$date' WHERE affected = '".$R_code."'") or die(mysqli_error($conn));
                              if($update_notif){
                                $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date, affected)
                                VALUES ('$verified_session_firstname $verified_session_lastname', '0' ,'','0','Request Rejected','You rejected request for $R_docu','$verified_session_office','Active','$date','$R_code')") or die(mysqli_error($conn));
                        
                                //notif of students              
                                $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date, affected)
                                VALUES ('', '0' ,'$R_studid','0','Request Rejected','Your $R_docu is Rejected by $verified_session_firstname $verified_session_lastname','$verified_session_office','Active','$date','$R_code')") or die(mysqli_error($conn));                  
    
                                echo ('success');
                              }else{
                                echo ('failed');
                              }
													}
												//end of audit trail
												}
                        //echo "Dear Student your tickets has been sent to our help desk support team and we will back to you shortly. and here is your ticket id $unid please keep your ticket id";
                } else {
                  echo ('failed');
                  // $error = "Ticket did not send!";
                }
              }else{
								echo ('failed1');
							}
            //end of email sending       
          }
        }else{
					echo ('failed2');
				}

	}
 ?>


