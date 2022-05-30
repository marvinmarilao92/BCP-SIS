<?php
session_start();


  if(isset($_SESSION['logged']) && $_SESSION['logged'] == true)
  {

      $user_online = true;
      $id =    $_SESSION['id'];
      $fname = $_SESSION['fname'];
      $num =   $_SESSION['num'];
      $role =  $_SESSION['role'];
      $lname = $_SESSION['lname'];
      $mname = $_SESSION['mname'];
      $email = $_SESSION['email'];
      $pno =   $_SESSION['contact'];
      $addr =  $_SESSION['address'];
      $level = $_SESSION['level'];
      $sec =   $_SESSION['section'];
      $yl =    $_SESSION['yl'];
    
  }
  else
  {   
      $user_online = false;
      header("location: ../x/..");
      die();
      

  }

?>