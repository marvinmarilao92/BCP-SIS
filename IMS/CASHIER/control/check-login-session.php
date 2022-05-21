<?php
session_start();


  if($_SESSION['logged'] != true)
  {
      header("location: ../CASHIER/login.php?");
      die();
  }
  else
  {
      
      $full = $_SESSION['full'];
      $role = $_SESSION['role']; 
      $dp = $_SESSION['dp'];
      $em = $_SESSION['email'];
      $fname = $_SESSION['fname'];
      $lname= $_SESSION['lnamee']; 
      
  }

?>