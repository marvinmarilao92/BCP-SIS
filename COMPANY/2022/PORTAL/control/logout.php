<?php
session_start();
$_SESSION['logged'] = false;
require '../constant/connection.php';
require '../control/check-session-login.php';
$remarks = "account has been logged out";
mysqli_query($link, "INSERT INTO internship_audit_trail(user,action,role,id) VALUES('$fnamee','$remarks','$role','$num')") or die(mysqli_error($link));
header("location: ../../index.php");
die();
session_unset();
session_destroy();
?>