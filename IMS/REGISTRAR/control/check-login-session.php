<?php
session_start();
if($_SESSION['logged'] != true ){
    header("location: ../REGISTRAR/login.php?");
    die();
  }
  else{
    $full = $_SESSION['full'];
    $role = $_SESSION['role']; 
    $dp = $_SESSION['dp'];
    
  }
?>