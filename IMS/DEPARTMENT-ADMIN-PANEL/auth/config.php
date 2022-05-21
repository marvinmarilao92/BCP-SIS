<?php

$servername= "localhost";
$db_user= "u692894633_sis_db";
$db_pass = "l95o@WMN6~a";
$db_name = "u692894633_sis_db";

$conn = mysqli_connect($servername, $db_user, $db_pass, $db_name);


 if($conn === false){
    die("ERROR: Could not connect. ".mysqli_connect_error());
 } 
 
?>