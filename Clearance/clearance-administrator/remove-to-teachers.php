<?php
include('includes/session.php');
if(isset($_POST["name"]) && !empty($_POST["name"])){


    // Prepare an insert statement
        $sql = "DELETE FROM clearance_department_teachers WHERE department_name = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_name);

            // Set parameters
            $param_name = trim($_POST["name"]);;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
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
    <h1>Remove to Teachers</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="clearance-departments.php">Clearance Departments</a></li>
        <li class="breadcrumb-item">Remove to Teachers</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Remove <?php echo trim($_GET["name"]); ?> to Teachers</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="name" value="<?php echo trim($_GET["name"]); ?>"/>
                            <p>Are you sure you want to Remove <?php echo trim($_GET["name"]); ?>?</p>
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