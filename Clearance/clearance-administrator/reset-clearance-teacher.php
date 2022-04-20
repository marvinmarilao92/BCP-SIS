<?php
include('includes/session.php');
if(isset($_POST["reset"]) && !empty($_POST["reset"])){

  $sql = "SELECT * FROM clearance_requirements_teachers";
  if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        if($row['clearance_type'] != "File Submission Hard Copy (Original Copy must be submitted)" && $row['clearance_type'] != "File Submission Soft Copy (Can be submitted online) or Hard Copy (Optional to submit the original copy)"){
          $temp_id = $row['id'];
          // Prepare an insert statement
              $sql = "DELETE FROM clearance_teacher_status WHERE clearance_requirement_id = ?";

              if($stmt = mysqli_prepare($link, $sql)){
                  // Bind variables to the prepared statement as parameters
                  mysqli_stmt_bind_param($stmt, "i", $param_id);

                  // Set parameters
                  $param_id = $temp_id;

                  // Attempt to execute the prepared statement
                  if(mysqli_stmt_execute($stmt)){
                      
                  } else{
                      echo "Oops! Something went wrong. Please try again later.";
                  }
              }

              
              }
      }
      // Records created successfully. Redirect to landing page
                      header("location: teacher-clearance-status.php");
                      exit();
    }
  } else{
      echo "Oops! Something went wrong. Please try again later.";
  }
    
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
      <h1>Reset Clearance of teachers</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Reset Clearance of teachers</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Reset Clearance of teachers</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="reset" value="reset"/>
                            <p>Are you sure you want to Reset Clearance of teachers?</p>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="clearance-departments.php" class="btn btn-secondary">No</a>
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