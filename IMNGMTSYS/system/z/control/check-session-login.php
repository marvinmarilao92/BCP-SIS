<?php
session_start();


  if(isset($_SESSION['logged']) && $_SESSION['logged'] == true)
  {

      $user_online = true;    
      $id =    $_SESSION['id'];
      $ad_fname = $_SESSION['ad_fname'];
      $num =   $_SESSION['num'];
      $ad_rolee =  $_SESSION['ad_role'];
      $lnamee = $_SESSION['ad_lname'];
      $mnamee = $_SESSION['ad_mname'];
      $dp = $_SESSION['dp'];
      $url = $_SESSION['URL'];
      
  }else
  {
      
      $user_online = false;
      header("location: ../z/..");
      die();
  }
  

?>