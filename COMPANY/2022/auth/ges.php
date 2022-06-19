<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../vendor/autoload.php';


if(isset($_POST['submit']) && isset($_FILES['uploaded_file'])){

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
			 		
			  	//FILES
			 	$name = $conn->real_escape_string($_FILES['uploaded_file']['name']);
		        $mime = $conn->real_escape_string($_FILES['uploaded_file']['type']);
		        $data = $conn->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
		        $size = intval($_FILES['uploaded_file']['size']);




				 $autogen_reg = 'COM120'.get_rand_numbers(4).'';
				
				 $status = 'Pending';
				 date_default_timezone_set("asia/manila");
				 $date = date('d-m-Y h:i A ');
				 $i_no = '10'.get_rand_numbers(3).'';
				
				 
				$cname =       	validate($_POST['cname']);
				$rname =       	validate($_POST['rname']);	
				
				$caddress =       	validate($_POST['caddress']);
				
				$cemail = validate($_POST['cemail']);

				$password_1 =  	validate($_POST['password']);
				$password_2 = 	validate($_POST['re_pass']); 
				$password = PASSWORD_HASH($password_1, PASSWORD_DEFAULT);
				
				

				

				$fname =       	validate($_POST['fname']);
				$mname =       	validate($_POST['midname']);	
				$lname =       	validate($_POST['lname']);
				
				$paddress =       	validate($_POST['presentadd']);
				$contact =       	validate($_POST['contact']);	
				$email =       	validate($_POST['r_email']);
				$gender =       	validate($_POST['gender']);
				$position =			validate($_POST['position']);

				$role = 'coordinator';
				if ($password_1 != $password_2)
				{
					header("Location: ../index.php?error=Password did not match, Please try again");
      				die();
				}
				else
				{

				$sql = "INSERT INTO ims_company_regis(id,c_name,repre_name,c_address,c_email,username,password,c_status)
									   			values('$i_no','$cname','$rname','$caddress','$cemail','$autogen_reg','$password','$status')";

				$sql2 = "INSERT INTO ims_department_information (id,id_number,firstname,middlename,lastname,address,contact,email,gender,position,role)values('$i_no','$autogen_reg','$fname','$mname','$lname','$paddress','$contact','$email','$gender','$position','$role')";
				
				
		        
	
         $run = mysqli_query($conn,$sql) or die(mysqli_error());

				$run2 = mysqli_query($conn,$sql2) or die(mysqli_error());
				if($run && $run2)
				{	
					 
							mysqli_query($conn,	"INSERT INTO `ims_files` (`uid`,`name`, `mime`, `size`, `data`, `created`)
		            VALUES ('{$i_no}','{$name}', '{$mime}', '{$size}', '{$data}', NOW())") or die(mysqli_error($conn));

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
                      $mail->setFrom('internship_system@bcp-sis.ga', 'Internship Technical Support');
                      $mail->addAddress($email);//Add a recipient
                      $mail->AddReplyTo('internship_system@bcp-sis.ga', "No Reply"); // indicates ReplyTo headers
                    
                    $body = 
                      "<div class='card'>          
                        <div class='card-body'>
                          <h5 class='card-title'></h5>
                          
                          <br>Hi ".$rname."<br><br>
                          

                          		Account Details <br>

                          		Auto-gen Username : " .$autogen_reg. "<br>
                          						 Password : " .$password_1. " <br>		
                          						 	 Status : " .$status. "<br><br>





                          
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
                      $subject = 'Account Successfully Created';
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