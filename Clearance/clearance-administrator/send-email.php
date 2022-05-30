$sql = "SELECT * FROM student_information";
              if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    $temp_email = $row['email'];
                    // $success='Your ticket has been created. Make sure to check your email inbox for ticket ID';
                      $mail = new PHPMailer;
                      $mail->isSMTP();
                      $mail->SMTPDebug = 0;                                       //Send using SMTP
                      $mail->Host       = 'smtp.hostinger.com';                   //Set the SMTP server to send through
                      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                      $mail->Username   = 'clearance@bcp-sis.ga';           //SMTP username
                      $mail->Password   = 'Vwdrkkp2c25rkk!';                         //SMTP password
                      $mail->SMTPSecure = 'TLS';                                  //Enable implicit TLS encryption
                      $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
              
                      //Recipients
                      $mail->setFrom('clearance@bcp-sis.ga', 'Clearance Admin');
                      $mail->addAddress($temp_email);//Add a recipient
                      $mail->AddReplyTo('clearance@bcp-sis.ga', "No Reply"); // indicates ReplyTo headers
                    
                    $body = 
                      "<div class='card'>          
                        <div class='card-body'>
                          <h5 class='card-title'></h5>
                          <p class='card-text'>This is direct message from Clearance Admin Department                      
                          <br><br>
                          Clearance Administrator would like to inform you Mr/Ms. ".$row['firstname']." ".$row['lastname']."<br>
                          clearance completion for ".$semester." of school year ".$school_year.",<br>
                          has now started.<br>
                          You can now see your clearance status, to check if there was an incomplete or decline clearance<br> 
                          for you to avoid having trouble enrolling for the next semester<br>
                          You can access our website by clicking this link <a href='https://sis-bcp.com' target='_blank' rel='noopener noreferrer'>https://sis-bcp.com</a>
                          <br><br>
                          Thank you! and welcome to Bestlink College of the Philippines.</p>
                        </div>
                      </div>
                      
                      <div class='alert alert-light bg-light border-0 alert-dismissible fade show' role='alert'>
                        © Copyright Bestlink College of the Philippines. All Rights Reserved.
                      </div>             
                    ";
                      
                      //Content
                      $mail->isHTML(true); //Set email format to HTML
                      $mail->Subject = 'Clearance Completion Started';
                      $mail->Body    = $body;
                      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                      
                      
                      if($mail->send()){
                      }else{
                        echo "Oops! Something went wrong. Please try again later.";
                      }
                  }
                }




          $sql = "INSERT INTO clearance_audit_trail (user_id, action, date, department) VALUES (?, ?, ?, ?)";
          if($stmt1 = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            $action = "Started Semestral Clearance for '" . $semester . " SY: " . $school_year . "'";
            $date = date('Y-m-d H:i:s');
            mysqli_stmt_bind_param($stmt1, "ssss", $verified_session_username, $action, $date, $verified_session_role);
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt1)){
            } else{
              echo "Oops! Something went wrong. Please try again later.";
            }
          }
            // Records updated successfully. Redirect to landing page
            header("location: semestral-clearance.php");
            exit();
          }