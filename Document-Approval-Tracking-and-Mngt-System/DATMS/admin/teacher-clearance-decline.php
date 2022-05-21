<?php
include('session.php');
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    //Load Composer's autoloader
    require 'vendor/autoload.php';
if(isset($_POST["req_id"]) && !empty($_POST["req_id"]) && isset($_POST["remarks"]) && !empty($_POST["remarks"])){

    if(trim($_POST["loc"]) == "Database"){
      // Prepare an insert statement
        $sql = "UPDATE clearance_teacher_status SET status=?, remarks=? WHERE clearance_requirement_id=? and teacher_id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssis", $param_status, $param_remarks, $param_req_id, $param_id);

            // Set parameters
            $param_status = "Declined";
            $param_remarks = trim($_POST["remarks"]);
            $param_req_id = trim($_POST["req_id"]);
            $param_id = trim($_POST["id"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                //Create user account
                      $sql = "INSERT INTO clearance_audit_trail (user_id, action, date, department) VALUES (?, ?, ?, ?)";

                      if($stmt1 = mysqli_prepare($link, $sql)){
                        // Bind variables to the prepared statement as parameters
                        $action = "Declined Clearance Requirement: '" . trim($_POST["req_name"]) . "' of Teacher ID: '" . trim($_POST["id"]) . "'";
                        $date = date('Y-m-d H:i:s');
                        mysqli_stmt_bind_param($stmt1, "ssss", $verified_session_username, $action, $date, $verified_session_role);

                        // Attempt to execute the prepared statement
                        if(mysqli_stmt_execute($stmt1)){

                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                      }
                $sql = "SELECT * FROM teacher_information where id_number = '$param_id'";
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
                            $mail->setFrom('clearance@bcp-sis.ga', $verified_session_role);
                            $mail->addAddress($temp_email);//Add a recipient
                            $mail->AddReplyTo('clearance@bcp-sis.ga', "No Reply"); // indicates ReplyTo headers
                          
                            $body = 
                            "<div class='card'>          
                              <div class='card-body'>
                                <h5 class='card-title'></h5>
                                <p class='card-text'>This is direct message from ".$verified_session_role."                      
                                <br><br>
                                ".$verified_session_role." would like to inform you Mr/Ms. ".$row['firstname']." ".$row['lastname']." that,<br>
                                Clearance Requirement: '".trim($_POST["req_name"])."' has been declined with remark: '".$param_remarks."'.<br>
                                Please comply to your decline clearance for you to avoid having trouble enrolling for the next semester.<br>
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
                            $mail->Subject = 'Clearance Requirement Declined';
                            $mail->Body    = $body;
                            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                            
                            
                            if($mail->send()){
                            }else{
                              echo "Oops! Something went wrong. Please try again later.";
                            }
                            }
                        }
                    }

                    // Notification
                    $notif = "Clearance Requirement: \'" . trim($_POST["req_name"]) . "\' has been declined with remark: \'" . $param_remarks . "\'";
                    $date = date('Y-m-d H:i:s');
                    $link->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date,affected) VALUES ('', '0', '$param_id', '0', 'Clearance Declined', '$notif', 'Registrar Coordinator', 'Active', '$date', '123')") or die(mysqli_error($link)); 
                
                // Records created successfully. Redirect to landing page
                header("location: teacher-clearance-view?id=".trim($_POST["id"])."&name=".trim($_POST["name"])."");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }else{
        // Prepare an insert statement
        $sql = "INSERT INTO clearance_teacher_status (clearance_requirement_id, location, teacher_id, status, clearance_department_id, remarks) VALUES (?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "isssis", $param_req_id, $param_location, $param_id, $param_status, $param_dept_id, $param_remarks);

            // Set parameters
            $param_req_id = trim($_POST["req_id"]);
            $param_location = "Office";
            $param_id = trim($_POST["id"]);
            $param_status = "Declined";
            $param_dept_id = trim($_POST["dept_id"]);
            $param_remarks = trim($_POST["remarks"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                //Create user account
                      $sql = "INSERT INTO clearance_audit_trail (user_id, action, date, department) VALUES (?, ?, ?, ?)";

                      if($stmt1 = mysqli_prepare($link, $sql)){
                        // Bind variables to the prepared statement as parameters
                        $action = "Declined Clearance Requirement: '" . trim($_POST["req_name"]) . "' of Teacher ID: '" . trim($_POST["id"]) . "'";
                        $date = date('Y-m-d H:i:s');
                        mysqli_stmt_bind_param($stmt1, "ssss", $verified_session_username, $action, $date, $verified_session_role);

                        // Attempt to execute the prepared statement
                        if(mysqli_stmt_execute($stmt1)){

                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                      }
                $sql = "SELECT * FROM teacher_information where id_number = '$param_id'";
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
                            $mail->setFrom('clearance@bcp-sis.ga', $verified_session_role);
                            $mail->addAddress($temp_email);//Add a recipient
                            $mail->AddReplyTo('clearance@bcp-sis.ga', "No Reply"); // indicates ReplyTo headers
                          
                            $body = 
                            "<div class='card'>          
                              <div class='card-body'>
                                <h5 class='card-title'></h5>
                                <p class='card-text'>This is direct message from ".$verified_session_role."                      
                                <br><br>
                                ".$verified_session_role." would like to inform you Mr/Ms. ".$row['firstname']." ".$row['lastname']." that,<br>
                                Clearance Requirement: '".trim($_POST["req_name"])."' has been declined with remark: '".$param_remarks."'.<br>
                                Please comply to your decline clearance for you to avoid having trouble enrolling for the next semester.<br>
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
                            $mail->Subject = 'Clearance Requirement Declined';
                            $mail->Body    = $body;
                            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                            
                            
                            if($mail->send()){
                            }else{
                              echo "Oops! Something went wrong. Please try again later.";
                            }
                            }
                        }
                    }

                    // Notification
                    $notif = "Clearance Requirement: \'" . trim($_POST["req_name"]) . "\' has been declined with remark: \'" . $param_remarks . "\'";
                    $date = date('Y-m-d H:i:s');
                    $link->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date,affected) VALUES ('', '0', '$param_id', '0', 'Clearance Declined', '$notif', 'Registrar Coordinator', 'Active', '$date', '123')") or die(mysqli_error($link)); 
                
                // Records created successfully. Redirect to landing page
                header("location: teacher-clearance-view?id=".trim($_POST["id"])."&name=".trim($_POST["name"])."");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }

        // Close statement
        mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of name parameter
    if(empty(trim($_GET["name"]))){
        // URL doesn't contain name parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Clearance Decline</title>

<?php include ('core/css-links.php');//css connection?>
<style>
        .wrapper{
            width: 600px;
            height: 550px;
            margin: 0 auto;
        }
        
</style>
<body>

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'TCS' ; $col = 'clr'; include ('core/side-nav.php');//Design for sidebar?>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Decline Clearance for <?php echo trim($_GET["req_name"]); ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="teacher-clearance-status.php">Clearance Status of teachers</a></li>
          <li class="breadcrumb-item"><a href="teacher-clearance-view?id=<?php echo trim($_GET["id"]); ?>&name=<?php echo trim($_GET["name"]); ?>">Clearance Status of <?php $str= trim($_GET["name"]);
      echo $str; ?></a></li>
          <li class="breadcrumb-item">Decline Clearance for <?php echo trim($_GET["req_name"]); ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="wrapper" style="margin-top: 200px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Are you sure you want to decline clearance for <?php echo trim($_GET["req_name"]); ?>?</h5>
                                <input type="hidden" name="req_id" value="<?php echo trim($_GET["req_id"]); ?>"/>
                                <input type="hidden" name="req_name" value="<?php echo trim($_GET["req_name"]); ?>"/>
                                <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                                <input type="hidden" name="name" value="<?php echo trim($_GET["name"]); ?>"/>
                                <input type="hidden" name="dept_id" value="<?php echo trim($_GET["dept_id"]); ?>"/>
                                <input type="hidden" name="loc" value="<?php echo trim($_GET["loc"]); ?>"/>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                        <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Requirement Name" required autofocus>
                                        <label for="floatingName">Remarks</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="Yes" class="btn btn-danger">
                                        <a href="teacher-clearance-view?id=<?php echo trim($_GET["id"]); ?>&name=<?php echo trim($_GET["name"]); ?>" class="btn btn-secondary">No</a>
                                    </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>



  </main><!-- End #main -->

 <!-- ======= Footer ======= -->
 <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>
  
</body>

</html>