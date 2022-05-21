<?php 
session_start();

session_unset();
session_destroy();

header("location: ../../DEPARTMENT-COORDINATOR-PANEL/login.php?");
die();
?>