<?php
session_start();
// Check existence of id parameter before processing further
if(isset($_GET["role"]) && !empty(trim($_GET["role"]))){
    $role = trim($_GET["role"]);
    $_SESSION['session_temp_role'] = $role;
    header("location: index.php");
    exit();
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>