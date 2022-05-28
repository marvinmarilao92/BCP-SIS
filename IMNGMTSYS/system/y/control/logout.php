<?php
session_start();
require '../../dbCon/config.php';
require '../control/check-session-login.php';
$remarks = "account has been logged out";
mysqli_query($conn, "INSERT INTO internship_audit_trail(user,action,role,id) VALUES('$fnamee','$remarks','$rolee','$num')") or die(mysqli_error($conn));
header("location: ../../../system/");
die();
session_unset();
session_destroy();
?>