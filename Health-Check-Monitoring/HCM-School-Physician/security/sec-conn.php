<?php  

$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "sis_db";

$conn2 = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn2) {
	echo "Connection Failed!";
	exit();
}