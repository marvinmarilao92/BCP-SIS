<?php
session_start();


  if(isset($_SESSION['logged']) && $_SESSION['logged'] == true)
  {

      $user_online = true;    
      $id =    $_SESSION['id'];
      $num =   $_SESSION['id_number'];
      $fnamee = $_SESSION['fname'];
      
      $rolee =  $_SESSION['role2'];
      $lnamee = $_SESSION['lname'];
      $mnamee = $_SESSION['mname'];
      $emaill = $_SESSION['email'];
      $contact =   $_SESSION['contact'];
      $gender =  $_SESSION['gender'];
      $d_acrony = $_SESSION['d_acronyy'];

      $dept_name = $_SESSION['dept_name'];
      $co_avatar = $_SESSION['co_avatar'];
      $address = $_SESSION['address'];
      $civil_status = $_SESSION['civil_status'];
      $dob = $_SESSION['dob'];
      $nationality= $_SESSION['nationality'];
      $religion = $_SESSION['religion'];

      $url = $_SESSION['URL'];

      
      
  }else
  {
      
      $user_online = false;
      header("location: ../y/..");
      die();
  }
  

?>