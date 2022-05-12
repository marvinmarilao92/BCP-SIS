<?php
  require_once("../includes/conn.php");
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
  // Processing form data when form is submitted
  if(isset($_POST['Tfname'])&&isset($_POST['Tlname'])&&(isset($_POST['Tmname'])||!isset($_POST['Tmname']))&&isset($_POST['Tcourse'])&&isset($_POST['Taddress'])&&isset($_POST['Temail'])&&isset($_POST['Tcontact'])&&isset($_POST['Tgen'])&&isset($_POST['Tbday'])&&isset($_POST['Tnation'])&&isset($_POST['Treligion'])&&isset($_POST['Tstat'])){
      
      // $id_number = mysqli_real_escape_string($conn,trim($_POST["id_number"]));\
      $current_year = date("y");
      //agun implementation for student number
      $sqll = "SELECT id FROM teacher_information ORDER BY id DESC Limit 1";
      if($resultt = mysqli_query($conn, $sqll)){
        if(mysqli_num_rows($resultt) == 0){
          $id_number = "" . $current_year . "000001";
        }
        else if(mysqli_num_rows($resultt) > 0){
          while($roww = mysqli_fetch_array($resultt)){
            if($roww['id'] < 9){
              $new_id = $roww['id'] + 1;
              $id_number = "" . $current_year . "00000" . $new_id;
            }
            else if ($roww['id'] == 9){
              $id_number = "" . $current_year . "000010";
            }
            else if ($roww['id'] < 99){
              $new_id = $roww['id'] + 1;
              $id_number = "" . $current_year . "0000" . $new_id;
            }
            else if ($roww['id'] == 99){
              $id_number = "" . $current_year . "000100";
            }
            else if ($roww['id'] < 999){
              $new_id = $roww['id'] + 1;
              $id_number = "" . $current_year . "000" . $new_id;
            }
            else if ($roww['id'] == 999){
              $id_number = "" . $current_year . "001000";
            }
            else if ($roww['id'] < 9999){
              $new_id = $roww['id'] + 1;
              $id_number = "" . $current_year . "00" . $new_id;
            }
            else if ($roww['id'] == 9999){
              $id_number = "" . $current_year . "010000";
            }
            else if ($roww['id'] < 99999){
              $new_id = $roww['id'] + 1;
              $id_number = "" . $current_year . "0" . $new_id;
            }
            else if ($roww['id'] == 99999){
              $id_number = "" . $current_year . "100000";
            }
            else if ($roww['id'] < 999999){
              $new_id = $roww['id'] + 1;
              $id_number = "" . $current_year . "" . $new_id;
            }
          }
        }
      }
    $userid ="T".$id_number;
    $first_name = mysqli_real_escape_string($conn,trim($_POST["Tfname"]));
    $last_name = mysqli_real_escape_string($conn,trim($_POST["Tlname"]));
    $middle_name = mysqli_real_escape_string($conn,trim($_POST["Tmname"]));
    $course = mysqli_real_escape_string($conn,trim($_POST["Tcourse"]));
    $address = mysqli_real_escape_string($conn,trim($_POST["Taddress"]));
    $email = mysqli_real_escape_string($conn,trim($_POST["Temail"]));
    $contact = mysqli_real_escape_string($conn,trim($_POST["Tcontact"]));
    $gender = mysqli_real_escape_string($conn,trim($_POST["Tgen"]));
    $birthday = date('Y-m-d', strtotime(mysqli_real_escape_string($conn,trim($_POST["Tbday"]))));
    $nationality = mysqli_real_escape_string($conn,trim($_POST["Tnation"]));
    $religion = mysqli_real_escape_string($conn,trim($_POST["Treligion"]));
    $civil_status = mysqli_real_escape_string($conn,trim($_POST["Tstat"]));
    $account_status = "Active";
    $password = password_hash("@ChangeMe01".substr($last_name,0,2)."!", PASSWORD_BCRYPT, array('cost' => 12));  //PASSWORD_ARGON2I//PASSWORD_ARGON2ID
    //Check if the id number is not existing in the database
    $sql1 = "SELECT id FROM teacher_information WHERE id_number = '$userid'";
    $result = mysqli_query($conn,$sql1);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    
    //Check if the id number is not existing in the database
    // $sql2 = "SELECT id FROM users WHERE id_number = '$userid'";
    // $result2 = mysqli_query($conn,$sql2);
    // $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
    // $count2 = mysqli_num_rows($result2);
    
    // If the id number is not existing in the database, count must be 0
    if($count == 0) {
      // Prepare an insert statement
      $sql = "INSERT INTO teacher_information (id_number, firstname, lastname, middlename, email, contact, address, course, gender, birthday, nationality, religion, civil_status, account_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

      if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssssssssssss", $userid, $first_name, $last_name, $middle_name, $email, $contact, $address, $course, $gender, $birthday, $nationality, $religion, $civil_status, $account_status);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
          //Create user account
          $sql = "INSERT INTO users (id_number, password, login_key) VALUES (?, ?, ?)";

          if($stmt1 = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            require_once "../includes/update_key.php";
            mysqli_stmt_bind_param($stmt1, "sss", $userid, $password, $getQP);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt1)){
                // Records created successfully. Redirect to landing page
                 //email sending 
                 if($gender =='Male' && $civil_status =='Single' || $civil_status =='Divorced'){
                  $gentitle = "Mr.";
                }else if($gender =='Female' && $civil_status =='Single' || $civil_status =='Divorced'){
                  $gentitle = "Ms.";
                }else if($gender =='Male' && $civil_status =='Married' || $civil_status =='Widowed '){
                  $gentitle = "Mr.";
                }else if($gender =='Female' && $civil_status =='Married' || $civil_status =='Widowed'){
                  $gentitle = "Mrs.";
                }
                $db=new DB();
                $message = "You have successfully Created an account in Bestlink College of the Philipines all the neccessary information to access your account is listed down below. Username:$id_number Default Password:@ChangeMe01".substr($last_name,0,2)."! we highly suggest to change your default password as soon as you received this message.";
               
                 $sql="INSERT INTO datms_emails (acc_id,email,subject,message,status) 
                 VALUES ('$id_number','$email','Created Sucessfully','$message','Sent')" or die("<script>alert('Error');</script>");
                 
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
                       $mail->setFrom('registrar_datms@bcp-sis.ga', 'System Admin Support');
                       $mail->addAddress($email);//Add a recipient
                       $mail->AddReplyTo('registrar_datms@bcp-sis.ga', "No Reply"); // indicates ReplyTo headers
                     
                     $body = 
                       "<div class='card'>          
                         <div class='card-body'>
                           <h5 class='card-title'></h5>
                           <p class='card-text'>This is direct message from System Admin Department<br>
                           <br>Hello ".$gentitle." ".$last_name."
                           <br><br>
                           You account is successfully registerd in Bestlink College of the Philipines all the neccessary <br>
                           information to access your account is listed down below.<br>
                           Account Status:".$account_status."<br>
                           Username: ".$id_number."<br> 
                           Default Password: @ChangeMe01".substr($last_name,0,2)."!<br><br>
                           if your Account status is Deactivated you must sumbit first all the necessary <br>
                           requiremts in order to access your account.<br> 
                           if you can already access your account we highly suggest to change your default password as soon as you<br>
                           received this message.
                           <br><br>
                           This email is sent from an account we use for sending messages only. So if<br>
                           you want to contact us, don't reply to this email-we won't get your response.<br>
                           Instead, Go to Registrar office to inquire.<br>
                           <br>Thank you! and welcome to Bestlink College of the Philippines.</p>
                         </div>
                       </div>
                       
                       <div class='alert alert-light bg-light border-0 alert-dismissible fade show' role='alert'>
                         © Copyright Bestlink College of the Philippines. All Rights Reserved.
                       </div>             
                     ";
                       
                       //Content
                       $mail->isHTML(true); //Set email format to HTML
                       $mail->Subject = 'Account Created Sucessfully';
                       $mail->Body    = $body;
                       $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                       
                       
                       if($mail->send()){
                        echo ('success');
                       }else{
                         echo "Oops! Something went wrong. Please try again later.";
                       }
                         //echo "Dear Student your tickets has been sent to our help desk support team and we will back to you shortly. and here is your ticket id $unid please keep your ticket id";
                 }
                 else {
                   echo "Oops! Something went wrong. Please try again later.";
                   // $error = "Ticket did not send!";
                 }
             //end of email sending
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
          }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
      }

      // Close statement
      mysqli_stmt_close($stmt);

      // Close connection
      mysqli_close($conn);

    }else {
      echo ('failed');
    }
  }
?>