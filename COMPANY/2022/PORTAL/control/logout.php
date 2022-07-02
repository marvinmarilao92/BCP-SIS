<?php

session_start();
require '../constant/connection.php';
$id = $_SESSION['id'];
$fname = $_SESSION['fname'];
$num = $_SESSION['id_number'];
$_SESSION['logged'] = false;
$remarks = "account has been logged out";
mysqli_query($link, "INSERT INTO internship_audit_trail(user,action,role,id) VALUES('$fnamee','$remarks','$role','$num')") or die(mysqli_error($link));
header("location: company-login.sis-bcp.com");
die();
session_unset();
session_destroy();
	

?>