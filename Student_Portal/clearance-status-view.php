<?php
include('includes/session.php');
// Check existence of id parameter before processing further
if(isset($_GET["req_id"]) && !empty(trim($_GET["req_id"]) && $_GET["id"]) && !empty(trim($_GET["id"]))){
    $student_id = $verified_session_username;
    $req_name = trim($_GET["req_name"]);
    $dept_name = trim($_GET["name"]);
    // Prepare a select statement
    $sql = "SELECT * FROM clearance_student_status WHERE clearance_requirement_id = ? and student_id = ? and clearance_department_id = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "iii", $param_req_id, $param_student_id, $param_id);
        

        // Set parameters
        $param_id = trim($_GET["id"]);
        $param_req_id = trim($_GET["req_id"]);
        $param_student_id = $student_id;
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $clearance_requirement_id = $row["clearance_requirement_id"]; 
                $student_id = $row["student_id"];  
                $clearance_department_id = $row["clearance_department_id"]; 
                $location = $row["location"]; 
                $status = $row["status"]; 
                $date = $row["date"]; 
                $remarks = $row["remarks"]; 
            } else{
                $location = ""; 
                $status = "Pending"; 
                $date = ""; 
                $remarks = ""; 
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
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
include ("includes/sidebar.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?php echo trim($_GET["req_name"]); ?>'s Info</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="clearance-status.php">Clearance Status</a></li>
          <li class="breadcrumb-item"><a href="clearance-status-read.php?id=<?php echo trim($_GET["id"]); ?>&name=<?php echo trim($_GET["name"]); ?>">Clearance Status of <?php $str= trim($_GET["name"]);
      echo $str; ?></a></li>
          <li class="breadcrumb-item"><?php echo trim($_GET["req_name"]); ?>'s Info</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

        <!-- Default Card -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">View Record</h5>
              <!-- General Form Elements -->
              <form>
                <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Department's Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $dept_name; ?>" disabled>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Requirement's Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $req_name; ?>" disabled>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $status; ?>" disabled>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Date Completed</label>
                  <div class="col-sm-10">
                    <input type="datetime" class="form-control" value="<?php echo $date; ?>" disabled>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Remarks</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $remarks; ?>" disabled>
                  </div>
                </div>
                <div class="float-end mb-3">
                    <a href="clearance-status-read.php?id=<?php echo trim($_GET["id"]); ?>&name=<?php echo trim($_GET["name"]); ?>"><button type="button" class="btn btn-primary">Back</button></a>
                </div>
              </form><!-- End General Form Elements -->
            </div>
          </div><!-- End Default Card -->

  </main><!-- End #main -->

<?php
include ("includes/footer.php");
?>

</body>

</html>