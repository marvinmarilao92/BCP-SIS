<?php
session_start();
$_SESSION['session_username'] = false;
session_unset();
session_destroy();
require '../../dbCon/config.php';
require '../control/check-session-login.php';
$remarks = "account has been logged out";
mysqli_query($conn, "INSERT INTO internship_audit_trail(user,action,role,id) VALUES('$ad_fname','$remarks','$ad_rolee','$num')") or die(mysqli_error($conn));
header("location:../../../../");
?>