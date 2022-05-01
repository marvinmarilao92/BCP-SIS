<?php
include('session.php');

// Check existence of id parameter before processing further
if(isset($_GET["req_id"]) && !empty(trim($_GET["req_id"]) && $_GET["id"]) && !empty(trim($_GET["id"])) && !empty(trim($_GET["dept_id"]))){
    $teacher_id = trim($_GET["id"]);
    $dept_id = trim($_GET["dept_id"]);
    $req_name = trim($_GET["req_name"]);
    $dept_name = 'Registrar Coordinator';
    // Prepare a select statement
    $sql = "SELECT * FROM clearance_teacher_status WHERE clearance_requirement_id = ? and teacher_id = ? and clearance_department_id = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "isi", $param_req_id, $param_teacher_id, $param_dept_id);
        

        // Set parameters
        $param_dept_id = $dept_id;
        $param_req_id = trim($_GET["req_id"]);
        $param_teacher_id = $teacher_id;
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $clearance_requirement_id = $row["clearance_requirement_id"]; 
                $teacher_id = $row["teacher_id"];  
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
} else {
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include ('core/css-links.php');//css connection?>
<body>

<?php include ('core/header.php');//Design for  Header?>
  <?php $page = 'TCS' ; $col = 'clr'; include ('core/side-nav.php');//Design for sidebar?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?php echo trim($_GET["req_name"]); ?>'s Info</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="teacher-clearance-status.php">Clearance Status of teachers</a></li>
          <li class="breadcrumb-item"><a href="teacher-clearance-view?id=<?php echo trim($_GET["id"]); ?>&name=<?php echo trim($_GET["name"]); ?>">Clearance Status of <?php $str= trim($_GET["name"]);
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
              <div class="row g-3">

                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" value="<?php echo $dept_name; ?>" placeholder="Your Name"disabled>
                    <label for="floatingName">Department's Name</label>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" value="<?php echo $req_name; ?>" placeholder="Your Name"disabled>
                    <label for="floatingName">Requirement's Name</label>
                  </div>
                </div>      

                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" value="<?php echo $status; ?>" placeholder="Your Name"disabled>
                    <label for="floatingName">Status</label>
                  </div>
                </div>
                <?php 
                if($date!=""){
                  echo'
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" value="'.$date.'" placeholder="Your Name"disabled>
                      <label for="floatingName">Date Completed</label>
                    </div>
                  </div>
                  ';

                }     
                if($remarks!=""){
                  echo'
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" value="'.$remarks.'" placeholder="Your Name"disabled>
                      <label for="floatingName">Remarks</label>
                    </div>
                  </div>
                  ';

                }              
                ?>
                <div class="modal-footer">
                    <a href="teacher-clearance-view?id=<?php echo trim($_GET["id"]); ?>&name=<?php echo trim($_GET["name"]); ?>"><button type="button" class="btn btn-primary">Back</button></a>
                </div>
              </div><!-- End General Form Elements -->
            </div>
          </div><!-- End Default Card -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>

</body>

</html>