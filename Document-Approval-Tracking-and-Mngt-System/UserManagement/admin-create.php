<?php
include('session.php');


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

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  $employee_id = mysqli_real_escape_string($link,trim($_POST["employee_id"]));
  $first_name = mysqli_real_escape_string($link,trim($_POST["first_name"]));
  $last_name = mysqli_real_escape_string($link,trim($_POST["last_name"]));
  $middle_name = mysqli_real_escape_string($link,trim($_POST["middle_name"]));
  $address = mysqli_real_escape_string($link,trim($_POST["address"]));
  $email = mysqli_real_escape_string($link,trim($_POST["email"]));
  $contact = mysqli_real_escape_string($link,trim($_POST["contact"]));
  $office = mysqli_real_escape_string($link,trim($_POST["office"]));
  $role = mysqli_real_escape_string($link,trim($_POST["role"]));
  $account_status = "Active";
  $password = "#ChangeMe01!";
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
  $sql1 = "SELECT id FROM user_information WHERE id_number = '$employee_id'";
  $result = mysqli_query($link,$sql1);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $count = mysqli_num_rows($result);
  
  //Check if the user number is not existing in the database
  $sql2 = "SELECT id FROM users WHERE id_number = '$employee_id'";
  $result2 = mysqli_query($link,$sql2);
  $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
  $count2 = mysqli_num_rows($result2);
  
  // If the user number is not existing in the database, count must be 0
  if($count == 0 && $count2 == 0) {
    // Prepare an insert statement
    $sql = "INSERT INTO user_information (id_number, firstname, lastname, middlename, email, contact, address, office, department, role, account_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if($stmt = mysqli_prepare($link, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "issssisssss", $employee_id, $first_name, $last_name, $middle_name, $email, $contact, $address, $office, $department1, $role, $account_status);

      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
        //Create user account
        $sql = "INSERT INTO users (id_number, password) VALUES (?, ?)";

        if($stmt1 = mysqli_prepare($link, $sql)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt1, "ss", $employee_id, $password);

          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt1)){
              // Records created successfully. Redirect to landing page
              header("location: admin.php");
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
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="admin.php">Employees</a></li>
        <li class="breadcrumb-item">Add New Employee</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Employee Registration Form</h5>

      <!-- No Labels Form -->
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3">
        <div class="col-md-2">
          <input type="number" name="employee_id" class="form-control <?php echo (!empty($employee_id_err)) ? 'is-invalid' : ''; ?>" Required placeholder="Employee ID">
          <span class="invalid-feedback"><?php echo $employee_id_err;?></span>
        </div>
        <div class="col-md-4">
          <input type="text" name="first_name" class="form-control" Required placeholder="First Name">
        </div>
        <div class="col-md-4">
          <input type="text" name="last_name" class="form-control" Required placeholder="Last Name">
        </div>
        <div class="col-md-2">
          <input type="text" name="middle_name" class="form-control" placeholder="Middle Initial (Optional)">
        </div>
        <div class="col-md-6">
          <input type="text" name="address" class="form-control" Required placeholder="Complete Address">
        </div>
        <div class="col-md-3">
          <input type="email" name="email" class="form-control" Required placeholder="Email">
        </div>
        <div class="col-md-3">
          <input type="number" name="contact" class="form-control" Required placeholder="Contact Number">
        </div>
        <div class="col-md-4">
          <select id="department" name="department" class="form-select" Required onChange="fetchRole(this.value);">
            <option value="" selected="selected" disabled="disabled">Select Department</option>
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
        </div>
        <div class="col-md-4">
          <select id="role" name="role" class="form-select" Required>
            <option value="" selected="selected" disabled="disabled">Select Role</option>
          </select>
        </div>
        <div class="col-md-4">
        <select id="office" name="office" class="form-select" Required>
            <?php
              require_once("includes/conn.php");
              $query="SELECT * FROM datms_office ORDER BY off_date DESC ";
              $result=mysqli_query($conn,$query);
              while($rs=mysqli_fetch_array($result)){
              $offid =$rs['off_id'];                                    
              $offName = $rs['off_name'];       
              ?>
             <option><?php echo $offName;?></option>
            <?php }?>
         </select>
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