<?php
session_start();
// Check existence of id parameter before processing further
if(isset($_GET["role"]) && !empty(trim($_GET["role"]))){
    include('includes/session.php');
    $role = trim($_GET["role"]);
    $_SESSION['session_temp_role'] = $role;
    //Audit Trail
    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    } else {
        $ip = $_SERVER["REMOTE_ADDR"];
    }
        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $action = "Logged In as ".$role."";
        date_default_timezone_set("asia/manila");
        $date = date("Y-m-d H:i:s", strtotime("+0 HOURS"));
        mysqli_query($link, "INSERT INTO audit_trail(account_no,action,actor,ip,host,date) VALUES('$verified_session_username','$action','$role','$ip','$host','$date')") or die(mysqli_error($link));
    header("location: index.php");
    exit();
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>