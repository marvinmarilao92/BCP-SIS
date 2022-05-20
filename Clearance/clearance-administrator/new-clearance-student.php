<?php
include('includes/session.php');
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    //Load Composer's autoloader
    require 'vendor/autoload.php';
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $semester = trim($_POST["semester"]);
  $school_year = trim($_POST["school_year"]);
  // Set the new timezone
  date_default_timezone_set('Asia/Manila');
  $date_started = date('Y-m-d H:i:s');

  // Prepare an insert statement
        $sql = "INSERT INTO clearance_student_semester (name, school_year, date_started) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_semester, $param_school_year, $date_started);

            // Set parameters
            $param_semester = $semester;
            $param_school_year = $school_year;
            $param_date_started = $date_started;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

              $sql = "SELECT * FROM clearance_student_semester ORDER BY id DESC LIMIT 1";
              if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    $id = $row['id'];
                  }
                }
              }else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
              

              $sql = "UPDATE clearance_student_semester_current SET semester_id=? WHERE id=?";
              
              if($stmt = mysqli_prepare($link, $sql)){
                  // Bind variables to the prepared statement as parameters
                  mysqli_stmt_bind_param($stmt, "ii", $param_semester_id, $param_id);
                  
                  // Set parameters
                  $param_semester_id = $id;
                  $param_id = 0;
                  
                  // Attempt to execute the prepared statement
                  if(mysqli_stmt_execute($stmt)){
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
                        // Records updated successfully. Redirect to landing page
                        header("location: student-clearance.php");
                        exit();
                      }
                  } else{
                      echo "Oops! Something went wrong. Please try again later.";
                  }
              }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
include ("includes/head.php");
?>

<body>

<?php
include ("includes/nav.php");
include ("includes/sidebar.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Start New Clearance for Students</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="student-clearance.php">Students Clearance Status</a></li>
          <li class="breadcrumb-item">Start New Clearance for Students</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Start New Clearance</h5>

              <!-- General Form Elements -->
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="alert alert-primary alert-dismissible fade show" role="alert">  
                  <h4 class="alert-heading">An Email Notification will be send to all of students informing that the new clearance has started.</h4>
                  <p>
                  Once you started a new semestral clearance, the previous record of clearance will be saved to database.
                  </p>
                  <hr>
                  <p class="mb-0">© Copyright Bestlink College of the Philippines. All Rights Reserved.</p>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="row mb-3">
                  <div class="col-6">
                      <label for="inputNumber" class="col-sm col-form-label">Semester</label>
                      <div class="col">
                        <select class="form-select" aria-label="Default select example" name="semester" class="form-select" Required>
                          <option value="" selected="selected" disabled="disabled">Select Semester</option>
                          <option value="1st Semester">1st Semester</option>
                          <option value="2nd Semester">2nd Semester</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-6">
                      <label for="inputNumber" class="col-sm col-form-label">School Year</label>
                      <div class="col">
                        <select class="form-select" aria-label="Default select example" name="school_year" class="form-select" Required>
                          <option value="" selected="selected" disabled="disabled">Select School Year</option>
                          <option value="2019-2020">2019-2020</option>
                          <option value="2020-2021">2020-2021</option>
                          <option value="2021-2022">2021-2022</option>
                          <option value="2022-2023">2022-2023</option>
                          <option value="2023-2024">2023-2024</option>
                          <option value="2024-2025">2024-2025</option>
                        </select>
                      </div>
                  </div>
                </div>
                <div class="float-end mb-3">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    <a href="student-clearance.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
                </div>
              </form><!-- End General Form Elements -->

            </div>
          </div>
        </div>
    </section>
    

  </main><!-- End #main -->

<?php
include ("includes/footer.php");
?>

</body>

</html>