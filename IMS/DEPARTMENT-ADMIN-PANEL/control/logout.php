<?php 
session_start();

session_unset();
session_destroy();

header("location: ../../DEPARTMENT-ADMIN-PANEL/login.php?");
die();
?>