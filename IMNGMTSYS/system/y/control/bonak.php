<?php
$servername= "localhost:3307";
$db_user= "root";
$db_pass = "";
$db_name = "sis_db";

$link = mysqli_connect($servername, $db_user, $db_pass, $db_name);


 if($link === false){
    die("ERROR: Could not connect. ".mysqli_connect_error());
 } 
 
?>