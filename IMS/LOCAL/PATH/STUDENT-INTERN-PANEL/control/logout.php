<?php 
session_start();

session_unset();
session_destroy();

header("location: ../../STUDENT-INTERN-PANEL/login.php?");
die();
?>