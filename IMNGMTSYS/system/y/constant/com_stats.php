<?php 

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;


	require '../function/vendor/autoload.php';
	include_once '../control/check-session-login.php';


	if(isset($_POST['companyedit']))

	{


			$idS = $_POST['com_id'];
			$statuss = $_POST['cstatus'];	
	        $num = $_POST['companyid'];
	        $fname = $_POST['rname'];
	        $reason = $_POST['reason'];
	        date_default_timezone_set("asia/manila");
			$date = date('d-m-Y h:i A ');
			$query = "UPDATE ims_company_regis
					  SET c_status='$statuss',  reason = '$reason' , u_date = '$date'
					  WHERE username ='$num'";
			$run = mysqli_query($link,$query);
			if($run)
			{
				//
				
				$fname=$fnamee.' '.$lnamee;
				$ip = $_SERVER["REMOTE_ADDR"];
	      		$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	      		$role = $rolee;
				  $remarks = $reason;	
	       mysqli_query($link, "INSERT INTO internship_audit_trail(user,action,role,id,account_no,ip,host) VALUES('$fname','$remarks','$rolee	','$getID','$verified_session_username','$ip','$host')") or die(mysqli_error($link));


	       			$success='Your ticket has been created. Make sure to check your email inbox for ticket ID';
                      $mail = new PHPMailer;
                      $mail->isSMTP();
                      $mail->SMTPDebug = 0;                                       //Send using SMTP
                      $mail->Host       = 'smtp.hostinger.com';                   //Set the SMTP server to send through
                      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                      $mail->Username   = 'internship_system@bcp-sis.ga';           //SMTP username
                      $mail->Password   = '#Internship01!';                         //SMTP password
                      $mail->SMTPSecure = 'TLS';                                  //Enable implicit TLS encryption
                      $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
              
                      //Recipients
                      $mail->setFrom('internship_system@bcp-sis.ga', 'Internship Technical Support');
                      $mail->addAddress($verified_session_email);//Add a recipient
                      $mail->AddReplyTo('internship_system@bcp-sis.ga', "No Reply"); // indicates ReplyTo headers
                    
                    $body = 
                      "<div class='card'>          
                        <div class='card-body'>
                          <h5 class='card-title'></h5>
                          
                          <br>Hi ".$fname."<br>
                          <br>
                          <p>
                         	   After we've checked , Our Technical Support Team decided to change your status account to ACTIVE and Please Keep the latest Details and Congrats you are now part of our project to login your account
                         	   			proceed to this Link <a href='http://company-login.sis-bcp.com'>company-login.sis-bcp.com</a> 
                          </p>

                          		Account Details <br>

                          				Auto-gen Username : " .$num. "<br>
                       
                          						 Reason : " .$reason. " <br>			
                          						 	Status : " .$statuss. "<br>
                          						 	Date Changed : " .$date. "<br><br>





                          
                          This email is sent from an account we use for sending messages only. So if<br>
                          you want to contact us, don't reply to this email-we won't get your<br>
                          response. Instead, Go to Registrar office to comply.<br>
                          <br>Thank you! Stay safe.</p>
                        </div>
                      </div>
                      
                      <div class='alert alert-light bg-light border-0 alert-dismissible fade show' role='alert'>
                        © Copyright Bestlink College of the Philippines. All Rights Reserved.
                      </div>             
                    ";
                      $subject = 'Account Status are now Changed';
                      //Content
                      $mail->isHTML(true); //Set email format to HTML
                      $mail->Subject = $subject;
                      $mail->Body    = $body;
                      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                      
                     if($mail->send()){
                        header("Location: ../registered-accounts.php?");
                      }else{
                        echo ('failed');
                      }
					


			}else{

		}
	}



	


?>



