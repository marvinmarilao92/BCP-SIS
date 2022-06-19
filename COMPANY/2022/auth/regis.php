<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../function/vendor/autoload.php';
if(isset($_POST['submit'])){

	register_as_company();

}else{

}
function register_as_company()
		{
			try
			{
				function validate($data){
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
			 	}

				 require 'config.php';	
			  	 require 'uniq.php';
				 $autogen_reg = 'COM120'.get_rand_numbers(4).'';
				 $role = 'coordinator';
				 $status = 'Pending';
				 $dater = date('d-m-Y h:i A ');
				 $i_no = '10'.get_rand_numbers(3).'';
				
				 
				$cname =       	validate($_POST['cname']);
				$rname =       	validate($_POST['rname']);	
				$repname =       	validate($_POST['rname']);
				$caddress =       	validate($_POST['caddress']);
				$pno =       	validate($_POST['pno']);
				$cemail = validate($_POST['cemail']);
				$password_1 =  	validate($_POST['password']);
				$password_2 = 	validate($_POST['re_pass']); 
				$password = PASSWORD_HASH($password_1, PASSWORD_DEFAULT);
				if ($password_1 != $password_2)
				{
					header("Location: ../index.php?error=Password did not match, Please try again");
      				die();
				}
				else
				{
				$sql = "INSERT INTO ims_company_regis(id,c_name,repre_name,c_address,phone,c_email,username,password,c_status,datee)
									   			values('$i_no','$cname','$rname','$caddress','$pno','$cemail','$autogen_reg','$password','$status','$dater')";
				
				$sql1 = "INSERT INTO ims_department_information(id,role)values('$i_no','$role')";

                $run = mysqli_query($conn,$sql) or die(mysqli_error());
                $ru2 = mysqli_query($conn,$sql1) or die(mysqli_error());
					
				
				if($run && $ru2)
				{
					
					// $success='Your ticket has been created. Make sure to check your email inbox for ticket ID';
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
                      $mail->setFrom('internship_system', 'Internship Technical Support');
                      $mail->addAddress($cemail);//Add a recipient
                      $mail->AddReplyTo('internship_system@bcp-sis.ga', "No Reply"); // indicates ReplyTo headers
                    
                    $body = 
                      "<div class='card'>          
                        <div class='card-body'>
                          <h5 class='card-title'></h5>
                          <p class='card-text'>This is direct message from Registrar Department<br>
                          <br>Dear".$repname."<br><br>
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
					/*echo '<br>';
					echo '<h1>Account Details </h1>';
					echo '<br>';
					echo "Please copy ur autogen Username ! ";
					echo '<br>';
					echo "Hello ur auto generated username : ".$autogen_reg;
					echo '<br>';
					echo "Account Created : ".$date;
					echo '<br>';
					echo '<br>';
					echo '<a href = "../">back to Register </a>';
					echo '</table>';
					
					die();*/
				}
				else{
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				}
			}
			catch(PDOException $e)
		    {
				
		    }

		}

?>