<?php
include('includes/session.php');

// Define variables and initialize with empty values
$department = "";
$clearance_name = "";
$clearance_type = "";
$status = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $department = $verified_session_role;
  $clearance_name = mysqli_real_escape_string($link,trim($_POST["clearance_name"]));
  $clearance_type = mysqli_real_escape_string($link,trim($_POST["clearance_type"]));
  $status = "Active";

  // Prepare an insert statement
    $sql = "INSERT INTO clearance_requirements_students (department, clearance_name, clearance_type, status) VALUES (?, ?, ?, ?)";

    if($stmt = mysqli_prepare($link, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssss", $department, $clearance_name, $clearance_type, $status);

      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
        //Create user account
        $sql = "INSERT INTO clearance_audit_trail (user_id, action, date, department) VALUES (?, ?, ?, ?)";

        if($stmt1 = mysqli_prepare($link, $sql)){
          // Bind variables to the prepared statement as parameters
          $action = "Add new clearance requirement named: '" . $clearance_name . "'";
          $date = date('Y-m-d H:i:s');
          mysqli_stmt_bind_param($stmt1, "ssss", $verified_session_username, $action, $date, $department);

          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt1)){
              // Records created successfully. Redirect to landing page
              header("location: student-clearance-requirements.php");
              exit();
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
      <h1>Add New Requirement</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="student-clearance-requirements.php">Clearance Requirements for Students</a></li>
          <li class="breadcrumb-item">Add New Requirement</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">New Requirement's Form</h5>

        <!-- No Labels Form -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3">
          <div class="col-md-6">
            <input type="text" name="clearance_name" class="form-control" Required placeholder="Requirement Name">
          </div>
          <div class="col-md-6">
            <select id="inputState" name="clearance_type" class="form-select" Required>
              <option value="" selected="selected" disabled="disabled">Select Requirement Type</option>
              <option value="File Submission Hard Copy (Original Copy must be submitted)">File Submission Hard Copy (Original Copy must be submitted)</option>
              <option value="File Submission Soft Copy (Can be submitted online) or Hard Copy (Optional to submit the original copy)">File Submission Soft Copy (Can be submitted online) or Hard Copy (Optional to submit the original copy)</option>
              <option value="Account Balance (Pending Payment)">Account Balance (Pending Payment) </option>
              <option value="Clearance Record (Pending Record)">Clearance Record (Pending Record)</option>
            </select>
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
        </form><!-- End No Labels Form -->

  </main><!-- End #main -->

<?php
include ("includes/footer.php");
?>

</body>

</html>