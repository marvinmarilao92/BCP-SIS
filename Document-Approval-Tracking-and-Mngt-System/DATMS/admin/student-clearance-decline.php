<?php
include('includes/session.php');

if(isset($_POST["req_id"]) && !empty($_POST["req_id"]) && isset($_POST["remarks"]) && !empty($_POST["remarks"])){

    if(trim($_POST["loc"]) == "Database"){
      // Prepare an insert statement
        $sql = "UPDATE clearance_student_status SET status=?, remarks=? WHERE clearance_requirement_id=? and student_id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssii", $param_status, $param_remarks, $param_req_id, $param_id);

            // Set parameters
            $param_status = "Declined";
            $param_remarks = trim($_POST["remarks"]);
            $param_req_id = trim($_POST["req_id"]);
            $param_id = trim($_POST["id"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: student-clearance-view.php?id=".trim($_POST["id"])."&name=".trim($_POST["name"])."");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }else{
        // Prepare an insert statement
        $sql = "INSERT INTO clearance_student_status (clearance_requirement_id, location, student_id, status, clearance_department_id, remarks) VALUES (?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "isisis", $param_req_id, $param_location, $param_id, $param_status, $param_dept_id, $param_remarks);

            // Set parameters
            $param_req_id = trim($_POST["req_id"]);
            $param_location = "Office";
            $param_id = trim($_POST["id"]);
            $param_status = "Declined";
            $param_dept_id = trim($_POST["dept_id"]);
            $param_remarks = trim($_POST["remarks"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: student-clearance-view.php?id=".trim($_POST["id"])."&name=".trim($_POST["name"])."");
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
include ("includes/sidebar.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Decline Clearance for <?php echo trim($_GET["req_name"]); ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="student-clearance-status.php">Clearance Status of Students</a></li>
          <li class="breadcrumb-item"><a href="student-clearance-view.php?id=<?php echo trim($_GET["id"]); ?>&name=<?php echo trim($_GET["name"]); ?>">Clearance Status of <?php $str= trim($_GET["name"]);
      echo $str; ?></a></li>
          <li class="breadcrumb-item">Decline Clearance for <?php echo trim($_GET["req_name"]); ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <div class="row mb-3">
                              <label for="inputText" class="col-sm-2 col-form-label">Remarks</label>
                              <div class="col-sm-10">
                                <input type="text" name="remarks" class="form-control" required>
                              </div>
                            </div>
                            <input type="hidden" name="req_id" value="<?php echo trim($_GET["req_id"]); ?>"/>
                            <input type="hidden" name="req_name" value="<?php echo trim($_GET["req_name"]); ?>"/>
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <input type="hidden" name="name" value="<?php echo trim($_GET["name"]); ?>"/>
                            <input type="hidden" name="dept_id" value="<?php echo trim($_GET["dept_id"]); ?>"/>
                            <input type="hidden" name="loc" value="<?php echo trim($_GET["loc"]); ?>"/>
                            <p>Are you sure you want to decline clearance for <?php echo trim($_GET["req_name"]); ?>?</p>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="student-clearance-view.php?id=<?php echo trim($_GET["id"]); ?>&name=<?php echo trim($_GET["name"]); ?>" class="btn btn-secondary">No</a>
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