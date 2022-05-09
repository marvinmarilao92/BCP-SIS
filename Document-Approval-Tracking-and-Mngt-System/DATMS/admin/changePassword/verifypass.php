<?php session_start();
  if ($_GET["check"] == $_SESSION['session_pass']){
    echo '<span style="color:green;"><i class="bi bi-check-circle"></i> Current Password Confirmed<span/>'; $_SESSION["oldpass"] = true;
    $_SESSION["oldP"] = $_GET["check"] ;
  } else { echo '<span style="color:red;"><i class="bi bi-exclamation-circle"> </i> Invalid current password<span/>'; $_SESSION["oldpass"] = false;}
 ?>
