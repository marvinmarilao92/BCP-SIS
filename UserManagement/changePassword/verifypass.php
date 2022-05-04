<?php session_start();
  if ($_GET["check"] == "kim"){
    echo '<span style="color:green;"><i class="bi bi-check-circle"></i> Password is valid<span/>'; $_SESSION["oldpass"] = true;
    $_SESSION["oldP"] = $_GET["check"] ;
  } else { echo '<span style="color:red;"><i class="bi bi-exclamation-circle"> </i> Invalid current password<span/>'; $_SESSION["oldpass"] = false;}
 ?>
