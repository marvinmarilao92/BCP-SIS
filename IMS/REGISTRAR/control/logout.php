<?php 
session_start();

session_unset();
session_destroy();

header("location: ../../REGISTRAR/login.php?");
die();
?>