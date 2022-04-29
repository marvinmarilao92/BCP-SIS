<?php
  include 'include/config.php';
  session_start();
  if(!$_SESSION['ims_uid']){
    header("location: 192.168.254.254/..");
    die();
  }
?>