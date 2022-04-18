<?php
include('includes/session.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $sql1 = "SELECT * FROM clearance_teacher_appointment where teacher_id = '$verified_session_username' and department_id = '". trim($_POST["id"]) ."' LIMIT 1";
  if($result1 = mysqli_query($link, $sql1)){
    if(mysqli_num_rows($result1) > 0){
      while($row1 = mysqli_fetch_array($result1)){

        $sql = "DELETE FROM clearance_teacher_appointment WHERE teacher_id = ? and department_id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "si", $verified_session_username, trim($_POST["id"]));

          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){

            $sql2 = "INSERT INTO clearance_teacher_appointment (teacher_id, department_id, appointment_date, department, appointment_id) VALUES (?, ?, ?, ?, ?)";
            if($stmt2 = mysqli_prepare($link, $sql2)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt2, "sisss", $param_teacher_id, $param_department_id, $param_appointment_date, $param_department, $param_appointment_id);

                // Set parameters
                $param_teacher_id = $verified_session_username;
                $param_department_id = trim($_POST["id"]);
                $param_appointment_date = trim($_POST["date"]);
                $param_department = trim($_POST["name"]);
                $param_appointment_id = str_replace('.','',uniqid('',true));

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt2)){
                    // Records created successfully. Redirect to landing page
                    header("location: clearance-appointments.php");
                    exit();
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }
        }
      }
    }else{
      $sql2 = "INSERT INTO clearance_teacher_appointment (teacher_id, department_id, appointment_date, department, appointment_id) VALUES (?, ?, ?, ?, ?)";
            if($stmt2 = mysqli_prepare($link, $sql2)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt2, "sisss", $param_teacher_id, $param_department_id, $param_appointment_date, $param_department, $param_appointment_id);

                // Set parameters
                $param_teacher_id = $verified_session_username;
                $param_department_id = trim($_POST["id"]);
                $param_appointment_date = trim($_POST["date"]);
                $param_department = trim($_POST["name"]);
                $param_appointment_id = str_replace('.','',uniqid('',true));

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt2)){
                    // Records created successfully. Redirect to landing page
                    header("location: clearance-appointments.php");
                    exit();
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
    }
  }
}
$uniqid = str_replace('.','',uniqid('',true));
?>
<!DOCTYPE html>
<html lang="en">

<?php
include ("includes/head.php");
?>
<style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
</style>

<body>

<?php
include ("includes/nav.php");
$page = 'clr' ; $col = 'Clearance'; include ("includes/sidebar.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Confirm Appointment</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="clearance-status.php">Clearance Status</a></li>
          <li class="breadcrumb-item"><a href="clearance-status-read.php?id=<?php echo trim($_GET["id"]); ?>&name=<?php echo trim($_GET["name"]) ?>">Clearance Status for <?php $strr= trim($_GET["name"]);
      echo $strr; ?></a></li>
          <li class="breadcrumb-item"><a href="clearance-get-appointment.php?id=<?php echo trim($_GET["id"]); ?>&name=<?php echo trim($_GET["name"]) ?>">Request an Appointment</a></li>
          <li class="breadcrumb-item">Confirm Appointment</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-success">
                            <input type="hidden" name="date" value="<?php echo trim($_GET["date"]); ?>"/>
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <input type="hidden" name="name" value="<?php echo trim($_GET["name"]); ?>"/>
                            <p>Confirm Appointment for <?php echo trim($_GET["name"]); ?> on <?php echo trim($_GET["date"]); ?>?</p>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-success">
                                <a href="clearance-get-appointment.php?id=<?php echo trim($_GET["id"]); ?>&name=<?php echo trim($_GET["name"]) ?>" class="btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>

  </main><!-- End #main -->

<?php
include ("includes/footer.php");
?>

</body>

</html>