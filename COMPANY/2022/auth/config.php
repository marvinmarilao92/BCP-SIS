<?php

$servername= "localhost:3307";
$db_user= "root";
$db_pass = "";
$db_name = "sis_db";

$conn = mysqli_connect($servername, $db_user, $db_pass, $db_name);
$conn2 = mysqli_connect($servername, $db_user, $db_pass, $db_name);

 if($conn === false){
    die("ERROR: Could not connect. ".mysqli_connect_error());
 } 
 
 if($conn2 === false){
    die("ERROR: Could not connect. ".mysqli_connect_error());
 } 
?>