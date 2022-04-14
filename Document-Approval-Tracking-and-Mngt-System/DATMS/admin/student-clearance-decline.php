<?php
include('session.php');

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

                // header("location: student-clearance-view.php?id=".trim($_POST["id"])."&name=".trim($_POST["name"])."");
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
<?php $page = 'SCS' ; $col = 'clr'; include ('core/side-nav.php');//Design for sidebar?>


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
                                        <a href="student-clearance-view.php?id=<?php echo trim($_GET["id"]); ?>&name=<?php echo trim($_GET["name"]); ?>" class="btn btn-secondary">No</a>
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