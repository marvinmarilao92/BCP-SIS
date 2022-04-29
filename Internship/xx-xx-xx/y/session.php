<?php
  
  session_start();
  if($_SESSION['logged'] != true){
    header("location: ../192.168.254.254/..");
    exit();
  }
?>