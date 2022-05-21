<?php
session_start();


  if($_SESSION['logged'] != true)
  {
      header("location: ../DEPARTMENT-ADMIN-PANEL/login.php?");
      die();
  }
  else
  {
      
      $id =  $_SESSION['num'];
      $role = $_SESSION['role']; 
      $dp = $_SESSION['dp'];
      $em = $_SESSION['email'];
      $fname = $_SESSION['fname'];
      $lname= $_SESSION['lname']; 
      
  }

?>