<?php
include('includes/session.php');

if(isset($_POST["req_id"]) && !empty($_POST["req_id"])){

    if(trim($_POST["loc"]) == "Database" && isset($_POST["status"]) && trim($_POST["status"]) == "Under Review"){
      // Prepare an insert statement
        $sql = "UPDATE clearance_student_status SET status=?, date=? WHERE clearance_requirement_id=? and student_id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssii", $param_status, $param_date, $param_req_id, $param_id);

            // Set parameters
            $param_status = "Completed";
            $param_date = date('Y-m-d H:i:s');
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
    }else if(trim($_POST["loc"]) == "Database" && isset($_POST["status"]) && trim($_POST["status"]) == "Declined"){
      // Prepare an statement
        $req_id = trim($_POST["req_id"]);
        $student_id = trim($_POST["id"]);
        $sql1 = "SELECT * FROM clearance_student_status where clearance_requirement_id = '$req_id' and student_id = '$student_id' LIMIT 1";
        if($result1 = mysqli_query($link, $sql1)){
            if(mysqli_num_rows($result1) > 0){
            while($row1 = mysqli_fetch_array($result1)){
                $path = '../../Student/uploads/' . $row1['file_link'];
                if(unlink($path)){
                $sql = "UPDATE clearance_student_status SET status=?, location=?, date=?, file_link=null, remarks=null WHERE clearance_requirement_id=? and student_id=?";

                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "sssii", $param_status, $param_location, $param_date, $param_req_id, $param_id);

                    // Set parameters
                    $param_status = "Completed";
                    $param_location = "Office";
                    $param_date = date('Y-m-d H:i:s');
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
                }
                }
            }
        }
    }else if(trim($_POST["loc"]) == "Office" && isset($_POST["status"]) && trim($_POST["status"]) == "Declined"){
      // Prepare an insert statement
        $sql = "UPDATE clearance_student_status SET status=?, date=?, remarks=? WHERE clearance_requirement_id=? and student_id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssii", $param_status, $param_date, $param_remarks, $param_req_id, $param_id);

            // Set parameters
            $param_status = "Completed";
            $param_remarks = "";
            $param_date = date('Y-m-d H:i:s');
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
        $sql = "INSERT INTO clearance_student_status (clearance_requirement_id, location, student_id, status, clearance_department_id, date) VALUES (?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "isisis", $param_req_id, $param_location, $param_id, $param_status, $param_dept_id, $param_date);

            // Set parameters
            $param_req_id = trim($_POST["req_id"]);
            $param_location = "Office";
            $param_id = trim($_POST["id"]);
            $param_status = "Completed";
            $param_dept_id = trim($_POST["dept_id"]);
            $param_date = date('Y-m-d H:i:s');

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
        <h1>Confirm Clearance for <?php echo trim($_GET["req_name"]); ?></h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="student-clearance-status.php">Clearance Status of Students</a></li>
            <li class="breadcrumb-item"><a href="student-clearance-view.php?id=<?php echo trim($_GET["id"]); ?>&name=<?php echo trim($_GET["name"]); ?>">Clearance Status of <?php $str= trim($_GET["name"]);
        echo $str; ?></a></li>
            <li class="breadcrumb-item">Confirm Clearance for <?php echo trim($_GET["req_name"]); ?></li>
        </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-success">
                            <input type="hidden" name="req_id" value="<?php echo trim($_GET["req_id"]); ?>"/>
                            <input type="hidden" name="req_name" value="<?php echo trim($_GET["req_name"]); ?>"/>
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <input type="hidden" name="name" value="<?php echo trim($_GET["name"]); ?>"/>
                            <input type="hidden" name="dept_id" value="<?php echo trim($_GET["dept_id"]); ?>"/>
                            <input type="hidden" name="loc" value="<?php echo trim($_GET["loc"]); ?>"/>
                            <input type="hidden" name="status" value="<?php echo trim($_GET["status"]); ?>"/>
                            <p>Are you sure you want to confirm clearance for <?php echo trim($_GET["req_name"]); ?>?</p>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-success">
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