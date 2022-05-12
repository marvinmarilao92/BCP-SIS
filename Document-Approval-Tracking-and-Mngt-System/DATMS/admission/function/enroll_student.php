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

    // Define variables and initialize with empty values
    $status = "Enrolled";
    // agon date
    $current_year = date("y");
    // Processing form data when form is submitted
    if(isset($_POST['Tfname'])&&isset($_POST['Tlname'])&&(isset($_POST['Tmname'])||!isset($_POST['Tmname']))){
      
      //agun implementation for student number
      $sqll = "SELECT id FROM student_information ORDER BY id DESC Limit 1";
      if($resultt = mysqli_query($link, $sqll)){
        if(mysqli_num_rows($resultt) == 0){
          $student_number = "" . $current_year . "010001";
        }
        else if(mysqli_num_rows($resultt) > 0){
          while($roww = mysqli_fetch_array($resultt)){
            if($roww['id'] < 9){
              $new_id = $roww['id'] + 1;
              $student_number = "" . $current_year . "01000" . $new_id;
            }
            else if ($roww['id'] == 9){
              $student_number = "" . $current_year . "010010";
            }
            else if ($roww['id'] < 99){
              $new_id = $roww['id'] + 1;
              $student_number = "" . $current_year . "0100" . $new_id;
            }
            else if ($roww['id'] == 99){
              $student_number = "" . $current_year . "010100";
            }
            else if ($roww['id'] < 999){
              $new_id = $roww['id'] + 1;
              $student_number = "" . $current_year . "010" . $new_id;
            }
            else if ($roww['id'] == 999){
              $student_number = "" . $current_year . "011000";
            }
            else if ($roww['id'] < 9999){
              $new_id = $roww['id'] + 1;
              $student_number = "" . $current_year . "01" . $new_id;
            }
            else if ($roww['id'] == 9999){
              $student_number = "" . $current_year . "010000";
            }
            else if ($roww['id'] < 99999){
              $new_id = $roww['id'] + 1;
              $student_number = "" . $current_year . "0" . $new_id;
            }
            else if ($roww['id'] == 99999){
              $student_number = "" . $current_year . "100000";
            }
            else if ($roww['id'] < 999999){
              $new_id = $roww['id'] + 1;
              $student_number = "" . $current_year . "" . $new_id;
            }
          }
        }
      }
      $code = mysqli_real_escape_string($link,trim($_POST["Tcode"]));
      $first_name = mysqli_real_escape_string($link,trim($_POST["Tfname"]));
      $last_name = mysqli_real_escape_string($link,trim($_POST["Tlname"]));
      $middle_name = mysqli_real_escape_string($link,trim($_POST["Tmname"]));
      $course = mysqli_real_escape_string($link,trim($_POST["Tcourse"]));
      $year_level = mysqli_real_escape_string($link,trim($_POST["Tyl"]));
      $section = mysqli_real_escape_string($link,trim($_POST["Tsec"]));
      $school_year = mysqli_real_escape_string($link,trim($_POST["Tsy"]));
      $address = mysqli_real_escape_string($link,trim($_POST["Taddress"]));
      $email = mysqli_real_escape_string($link,trim($_POST["Temail"]));
      $contact = mysqli_real_escape_string($link,trim($_POST["Tcontact"]));
      $gender = mysqli_real_escape_string($link,trim($_POST["Tgen"]));
      $birthday = date('Y-m-d', strtotime(mysqli_real_escape_string($link,trim($_POST["Tbday"]))));
      $nationality = mysqli_real_escape_string($link,trim($_POST["Tnation"]));
      $religion = mysqli_real_escape_string($link,trim($_POST["Treligion"]));
      $civil_status = mysqli_real_escape_string($link,trim($_POST["Tcs"]));
      $account_status = mysqli_real_escape_string($link,trim($_POST["Tstat"]));
      $password = password_hash("@ChangeMe01".substr($last_name,0,2)."!", PASSWORD_BCRYPT, array('cost' => 12));  //PASSWORD_ARGON2I//PASSWORD_ARGON2ID
      
      //Check if the student number is not existing in the database
      $sql1 = "SELECT id FROM student_information WHERE id_number = '$student_number'";
      $result = mysqli_query($link,$sql1);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      
      //Check if the student number is not existing in the database
      $sql2 = "SELECT id FROM users WHERE id_number = '$student_number'";
      $result2 = mysqli_query($link,$sql2);
      $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
      $count2 = mysqli_num_rows($result2);
      
      // If the student number is not existing in the database, count must be 0
      if($count == 0 && $count2 == 0) {
        // Prepare an insert statement
        $sql = "INSERT INTO student_information (id_number, firstname, lastname, middlename, email, contact, address, course, year_level, section, school_year, gender, birthday, nationality, religion, civil_status, account_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "sssssssssssssssss", $student_number, $first_name, $last_name, $middle_name, $email, $contact, $address, $course, $year_level, $section, $school_year, $gender, $birthday, $nationality, $religion, $civil_status, $account_status);

          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
            //Create user account
            require_once "../core/update_key.php";
            $sql = "INSERT INTO users (id_number, password, login_key) VALUES (?, ?, ?)";

            if($stmt1 = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt1, "sss", $student_number, $password, $getQP);

              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt1)){
                  // Records created successfully. Redirect to landing page
             
                  $query = "UPDATE student_application SET account_status='$status' WHERE id_number='$code'";
                  if($query_run = mysqli_query($link, $query)){
                    // unset($_SESSION['status']);
                    $_SESSION['studnum'] = $student_number;
                    // echo ('success');
                    $query = "UPDATE datms_studreq SET id_number='$student_number' WHERE id_number='$code'";
                    if($query_run = mysqli_query($link, $query)){
                      // unset($_SESSION['status']);
                      $_SESSION['studnum'] = $student_number;
                      
                      if($gender =='Male' && $civil_status =='Single' || $civil_status =='Divorced'){
                        $gentitle = "Mr.";
                      }else if($gender =='Female' && $civil_status =='Single' || $civil_status =='Divorced'){
                        $gentitle = "Ms.";
                      }else if($gender =='Male' && $civil_status =='Married' || $civil_status =='Widowed '){
                        $gentitle = "Mr.";
                      }else if($gender =='Female' && $civil_status =='Married' || $civil_status =='Widowed'){
                        $gentitle = "Mrs.";
                      }
                        //email sending 
                          $db=new DB();
                          $message = "You have successfully enrolled in Bestlink College of the Philipines all the neccessary information to access your account is listed down below. Username:$student_number Default Password:@ChangeMe01".substr($last_name,0,2)."! we highly suggest to change your default password as soon as you received this message.";
                          
                            $sql="INSERT INTO datms_emails (acc_id,email,subject,message,status) 
                            VALUES ('$student_number','$email','Enrolled Sucessfully','$message','Sent')" or die("<script>alert('Error');</script>");
                            
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
                                      <br>Hello ".$gentitle." ".$last_name."
                                      <br><br>
                                      You have successfully enrolled in Bestlink College of the Philipines all the neccessary <br>
                                      information to access your account is listed down below.<br>
                                      Enrollment Status:".$account_status."<br>
                                      Username: ".$student_number."<br> 
                                      Default Password: @ChangeMe01".substr($last_name,0,2)."!<br><br>
                                      if your enrollment status is Temporarily Enrolled you must sumbit first all the necessary <br>
                                      requiremets in order to access your account.<br> 
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
                                  $mail->Subject = 'Enrolled Sucessfully';
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
                    }else{
                      echo ('failed');
                    }
                  }else{
                    echo ('failed');
                  }
                  

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
        mysqli_close($link);

      }else {
        echo ('failed');
      }
    }

?>