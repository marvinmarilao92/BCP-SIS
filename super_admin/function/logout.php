<?php
  session_start();
  
  if(session_destroy()) {
      header("Location: ../../SIS_LandingPage/index.php");
  }
?>
