<?php
include('session.php');

// Define variables and initialize with empty values
$department = "";
$clearance_name = "";
$clearance_type = "";
$status = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $department = "Registrar Coordinator";
  $clearance_name = mysqli_real_escape_string($link,trim($_POST["clearance_name"]));
  $clearance_type = mysqli_real_escape_string($link,trim($_POST["clearance_type"]));
  $status = "Active";

  // Prepare an insert statement
    $sql = "INSERT INTO clearance_requirements_teachers (department, clearance_name, clearance_type, status) VALUES (?, ?, ?, ?)";

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
              header("location: teacher-clearance-requirements.php");
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

<title>DATMS | Add Requirements</title>
<?php include ('core/css-links.php');//css connection?>

<body>

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'TCR' ; $col = 'clr'; include ('core/side-nav.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Requirement</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="teacher-clearance-requirements.php">Clearance Requirements for teachers</a></li>
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
            <div class="form-floating">
              <input type="text" class="form-control" id="clearance_name" name="clearance_name" placeholder="Requirement Name" autofocus required>
              <label for="floatingName">Requirement Name</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <select class="form-select" name="clearance_type" id="clearance_type" aria-label="State" Required>
                <option value="" selected="selected" disabled="disabled">Select Requirement Type</option>
                <option value="File Submission Hard Copy (Original Copy must be submitted)">File Submission Hard Copy (Original Copy must be submitted)</option>
                <option value="File Submission Soft Copy (Can be submitted online) or Hard Copy (Optional to submit the original copy)">File Submission Soft Copy (Can be submitted online) or Hard Copy (Optional to submit the original copy)</option>
                <option value="Account Balance (Pending Payment)">Account Balance (Pending Payment) </option>
                <option value="Clearance Record (Pending Record)">Clearance Record (Pending Record)</option>
              </select>
              <label for="floatingSelect">DocType</label>
            </div>

          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a type="button" href="teacher-clearance-requirements.php" class="btn btn-secondary">Cancel</a>
          </div>
        </form><!-- End No Labels Form -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>

</body>

</html>