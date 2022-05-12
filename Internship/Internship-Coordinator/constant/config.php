<?php

$sname= "localhost:3307";
$uname= "root";
$password = "";
$db_name = "sis_db";

$conn = mysqli_connect($sname, $uname, $password, $db_name);


 if($conn === false){
    die("ERROR: Could not connect. ".mysqli_connect_error());
 } 
?>