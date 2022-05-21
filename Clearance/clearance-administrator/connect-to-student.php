<?php
include('includes/session.php');

if(isset($_POST["name"]) && !empty($_POST["name"])){


    // Prepare an insert statement
        $sql = "INSERT INTO clearance_department_students (department_name) VALUES (?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_name);

            // Set parameters
            $param_name = trim($_POST["name"]);;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                //Create user account
                $sql = "INSERT INTO clearance_audit_trail (user_id, action, date, department) VALUES (?, ?, ?, ?)";

                if($stmt1 = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                $action = "Added " . trim($_POST["name"]) . " to students clearance";
                $date = date('Y-m-d H:i:s');
                mysqli_stmt_bind_param($stmt1, "ssss", $verified_session_username, $action, $date, $verified_session_role);

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt1)){

                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
                }
                // Records created successfully. Redirect to landing page
                header("location: clearance-departments.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
    <h1>Connect to Students</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="clearance-departments.php">Clearance Departments</a></li>
        <li class="breadcrumb-item">Connect to Students</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Connect <?php echo trim($_GET["name"]); ?> to Student</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-success">
                            <input type="hidden" name="name" value="<?php echo trim($_GET["name"]); ?>"/>
                            <p>Are you sure you want to connect <?php echo trim($_GET["name"]); ?>?</p>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-success">
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