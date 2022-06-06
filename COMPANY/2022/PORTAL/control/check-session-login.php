<?php
session_start();


  if(isset($_SESSION['logged']) && $_SESSION['logged'] == true)
  {

      $user_online = true;    
      $id =    $_SESSION['id'];
      $num =   $_SESSION['id_number'];
      $fnamee = $_SESSION['fname'];
      
      $role =  $_SESSION['role'];
      $lnamee = $_SESSION['lname'];
      $mnamee = $_SESSION['mname'];
      
      $co_avatar = $_SESSION['co_avatar'];
      
      $url = $_SESSION['URL'];

      
      
  }else
  {
      
      $user_online = false;
      header("location: ../y/..");
      die();
  }
  

?>