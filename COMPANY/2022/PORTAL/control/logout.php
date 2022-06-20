<?php

session_start();
require '../constant/connection.php';
$id = $_SESSION['id'];
                                                $fname = $_SESSION['fname'];
                                                $num = $_SESSION['id_number'];
$_SESSION['logged'] = false;
$remarks = "account has been logged out";
	$_SESSION['role'] = $row['role'];
	$role = 'Company Coordinator';                                                 mysqli_query($link, "INSERT INTO internship_audit_trail(user,action,role,id,account_no) VALUES('$fname','$remarks','$role','$id','$num')") or die(mysqli_error($link));

                                                header("location: ../../index.php");
session_unset();
session_destroy();


?>