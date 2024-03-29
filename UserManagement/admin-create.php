<?php

     //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    //set the correct timezone
    date_default_timezone_set('Asia/Manila');
		$date = date("Y-m-d H:i:s",strtotime("+0 HOURS"));

    $success=false;
    $error=false;


    //include the new connection
    include 'includes/new_db.php';
    include 'includes/conn.php';
    include 'session.php';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once "includes/update_key.php";
    // Define variables and initialize with empty values
    $employee_id = "";
    $first_name = "";
    $last_name = "";
    $middle_name = "";
    $address = "";
    $email = "";
    $contact = "";
    $office = "";
    $department = "";
    $role = "";
    $about = "";

    // $key = $_SESSION["login_key"];
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
     
      $current_year = date("y");
      // $employee_id = mysqli_real_escape_string($link,trim($_POST["employee_id"]));
      //agun implementation for student number
      $sqll = "SELECT id FROM user_information ORDER BY id DESC Limit 1";
      if($resultt = mysqli_query($link, $sqll)){
        if(mysqli_num_rows($resultt) == 0){
          $employee_id = "" . $current_year . "000001";
        }
        else if(mysqli_num_rows($resultt) > 0){
          while($roww = mysqli_fetch_array($resultt)){
            if($roww['id'] < 9){
              $new_id = $roww['id'] + 1;
              $employee_id = "" . $current_year . "00000" . $new_id;
            }
            else if ($roww['id'] == 9){
              $employee_id = "" . $current_year . "000010";
            }
            else if ($roww['id'] < 99){
              $new_id = $roww['id'] + 1;
              $employee_id = "" . $current_year . "0000" . $new_id;
            }
            else if ($roww['id'] == 99){
              $employee_id = "" . $current_year . "000100";
            }
            else if ($roww['id'] < 999){
              $new_id = $roww['id'] + 1;
              $employee_id = "" . $current_year . "000" . $new_id;
            }
            else if ($roww['id'] == 999){
              $employee_id = "" . $current_year . "001000";
            }
            else if ($roww['id'] < 9999){
              $new_id = $roww['id'] + 1;
              $employee_id = "" . $current_year . "00" . $new_id;
            }
            else if ($roww['id'] == 9999){
              $employee_id = "" . $current_year . "010000";
            }
            else if ($roww['id'] < 99999){
              $new_id = $roww['id'] + 1;
              $employee_id = "" . $current_year . "0" . $new_id;
            }
            else if ($roww['id'] == 99999){
              $employee_id = "" . $current_year . "100000";
            }
            else if ($roww['id'] < 999999){
              $new_id = $roww['id'] + 1;
              $employee_id = "" . $current_year . "" . $new_id;
            }
          }
        }
      }
      $userid ="U".$employee_id;
      $first_name = mysqli_real_escape_string($link,trim($_POST["first_name"]));
      $last_name = mysqli_real_escape_string($link,trim($_POST["last_name"]));
      $middle_name = mysqli_real_escape_string($link,trim($_POST["middle_name"]));
      $address = mysqli_real_escape_string($link,trim($_POST["address"]));
      $email = mysqli_real_escape_string($link,trim($_POST["email"]));
      $contact = mysqli_real_escape_string($link,trim($_POST["contact"]));
      $office = mysqli_real_escape_string($link,trim($_POST["office"]));
      $role = mysqli_real_escape_string($link,trim($_POST["role"]));
      $about = mysqli_real_escape_string($link,trim($_POST["about"]));
      $account_status = "Active";
      $password = password_hash("@ChangeMe01".substr($last_name,0,2)."!", PASSWORD_BCRYPT, array('cost' => 12));  //PASSWORD_ARGON2I//PASSWORD_ARGON2ID
      //Get department name
      $department = mysqli_real_escape_string($link,trim($_POST["department"]));
      // Attempt select query execution
      $sql3 = "SELECT department FROM department where id = " . mysqli_real_escape_string($link,trim($_POST["department"])) . " ";
      if($result3 = mysqli_query($link, $sql3)){
        if(mysqli_num_rows($result3) > 0){
          while($row3 = mysqli_fetch_array($result3)){
            $department1 = mysqli_real_escape_string($link,trim($row3["department"]));
          }
          // Free result set
          mysqli_free_result($result3);
        }
      }

      //Check if the user number is not existing in the database
      $sql1 = "SELECT id FROM user_information WHERE id_number = '$userid'";
      $result = mysqli_query($link,$sql1);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      
      //Check if the user number is not existing in the database
      $sql2 = "SELECT id FROM users WHERE id_number = '$userid'";
      $result2 = mysqli_query($link,$sql2);
      $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
      $count2 = mysqli_num_rows($result2);
      
      // If the user number is not existing in the database, count must be 0
      if($count == 0 && $count2 == 0) {
        // Prepare an insert statement
        $sql = "INSERT INTO user_information (id_number, firstname, lastname, middlename, email, contact, address, office, department, role, account_status, about) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "sssssissssss", $userid, $first_name, $last_name, $middle_name, $email, $contact, $address, $office, $department1, $role, $account_status, $about);

          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
            //Create user account
            $sql = "INSERT INTO users (id_number, password, login_key) VALUES (?, ?, ?)";

            if($stmt1 = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt1, "sss", $userid, $password, $getQP);

              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt1)){
                  // Records created successfully. Redirect to landing page
                   //email sending                     
                    $db=new DB();
                    $message = "You have successfully Created an account in Bestlink College of the Philipines all the neccessary information to access your account is listed down below. Username:$userid Default Password:@ChangeMe01".substr($last_name,0,2)."! we highly suggest to change your default password as soon as you received this message.";
                   
                     $sql="INSERT INTO datms_emails (acc_id,email,subject,message,status) 
                     VALUES ('$userid','$email','Created Sucessfully','$message','Sent')" or die("<script>alert('Error');</script>");
                     
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
                               <p class='card-text'>This is direct message from System Admin Department                      
                               <br><br>
                               You account is successfully registerd in Bestlink College of the Philipines all the neccessary <br>
                               information to access your account is listed down below.<br>
                               Account Status:".$account_status."<br>
                               Username: ".$userid."<br> 
                               Default Password: @ChangeMe01".substr($last_name,0,2)."!<br><br>
                               if your Account status is Deactivated you must sumbit first all the necessary <br>
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
                           $mail->Subject = 'Account Created Sucessfully';
                           $mail->Body    = $body;
                           $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                           
                           
                           if($mail->send()){
                            header("location: index?id='.$key.'");
                            exit();
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
        mysqli_close($link);

      }else {
        $employee_id_err = "Employee ID is already existing";
      }
    }
?>
<!DOCTYPE html>
<html lang="en">

<?php include ("includes/head.php");?>

<body>

<?php
include ("includes/nav.php");
include ("includes/sidebar.php");
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add New Employee</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?id=<?php echo $_SESSION["login_key"];?>">Home</a></li>
        <li class="breadcrumb-item"><a href="index?id=<?php echo $_SESSION["login_key"];?>">Employees</a></li>
        <li class="breadcrumb-item">Add New Employee</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Employee Registration Form</h5>

      <!-- No Labels Form -->
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3">
        <!-- <div class="col-md-2">
            <div class="form-floating">
              <input type="text" class="form-control <?php echo (!empty($employee_id_err)) ? 'is-invalid' : ''; ?>" name="employee_id" id="employee_id" placeholder="employee id" onkeypress="return isNumberKey(event)"  required>
              <label for="floatingName">Employee Number</label>
            </div>
          </div>      -->
          <div class="col-md-5">
            <div class="form-floating">
              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" style="text-transform:capitalize;" onkeypress="return isTextKey(event)" required>
              <label for="floatingName">First Name</label>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-floating">
              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" style="text-transform:capitalize;" onkeypress="return isTextKey(event)" required>
              <label for="floatingName">Last Name</label>
            </div>
          </div>   
          <div class="col-md-2">
            <div class="form-floating">
              <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Initial (Optional)" onkeypress="return isTextKey(event)" >
              <label for="floatingName">Middle Initial (Optional)</label>
            </div>
          </div>  
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" name="address" id="address" placeholder="address" style="text-transform:capitalize;" required>
              <label for="floatingName">Address</label>
            </div>
          </div>  
          <div class="col-md-3">
            <div class="form-floating">
              <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
              <label for="floatingName">Email</label>
            </div>
          </div>  
          <div class="col-md-3">
            <div class="form-floating">
              <input type="text" class="form-control" name="contact" id="contact" placeholder="contact" onkeypress="return isNumberKey(event)" maxlength="11" minlength="11" required>
              <label for="floatingName">Contact</label>
            </div>
          </div>  

          <div class="col-md-4">
            <div class="form-floating mb-3">
              <select id="department" name="department" class="form-select" onChange="fetchRole(this.value);">
                <option value="" selected="selected" disabled="disabled">Select Subsystem</option>
                <?php
                  // Include config file
                  require_once "config.php";
                  // Attempt select query execution
                  $sql2 = "SELECT * FROM department ORDER BY department";
                  if($result2 = mysqli_query($link, $sql2)){
                    if(mysqli_num_rows($result2) > 0){
                      while($row2 = mysqli_fetch_array($result2)){
                        echo '<option value = "' . $row2["id"] . '">' . $row2["department"] . '</option>';
                      }
                      // Free result set
                      mysqli_free_result($result2);
                    }
                  }
                ?>
              </select>
              <label for="floatingSelect">Subsystem</label>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-floating mb-3">
              <select id="role" name="role" class="form-select" Required>
                <option value="" selected="selected" disabled="disabled">Select Role</option>
              </select>
              <label for="floatingSelect">System Role</label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-floating mb-3">
              <select id="office" name="office" class="form-select" Required>
                <option value="" selected="selected" disabled="disabled">Select Department</option>
                <?php
                  require_once("includes/conn.php");
                  $query="SELECT * FROM datms_dept ORDER BY off_date DESC ";
                  $result=mysqli_query($conn,$query);
                  while($rs=mysqli_fetch_array($result)){
                  $offid =$rs['off_id'];                                    
                  $offName = $rs['off_name'];       
                  ?>
                <option><?php echo $offName;?></option>
                <?php }?>
              </select>
              <label for="floatingSelect">Department</label>
            </div>
          </div>
          <div class="col-12">
            <div class="form-floating">
              <textarea class="form-control" placeholder="Address" id="about" name="about" style="height: 100px;"></textarea>
              <label for="floatingTextarea">About yourself</label>
            </div>
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
      </form><!-- End No Labels Form -->
    </div>
  </div>

</main><!-- End #main -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<?php
include ("includes/footer.php");
?>
<script type="text/javascript">
// input numbers only
  function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
  }
// input text only
function isTextKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return true;
    return false;
  }

  function fetchRole(id){
    $('#role').html('');
    $.ajax({
      type:'post',
      url:'ajaxdata.php',
      data : 'department_id='+id,
      success: function(data){
        $('#role').html(data);
      }
    })
  }
</script>
</body>

</html>