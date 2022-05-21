<?php 
session_start();

session_unset();
session_destroy();

header("location: ../../CASHIER/login.php?");
die();
?>