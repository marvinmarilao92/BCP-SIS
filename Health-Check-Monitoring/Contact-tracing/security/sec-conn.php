<?php  

$sname = "localhost";
$uname = "u692894633_sis_db";
$password = "l95o@WMN6~a";
$db_name = "u692894633_sis_db";

$conn2 = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn2) {
	echo "Connection Failed!";
	exit();
}