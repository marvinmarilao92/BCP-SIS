<?php session_start();
if (isset($_SESSION["conpass"]) && isset($_SESSION["newpass"]) &&  $_SESSION["conpass"] == true && $_SESSION["newpass"] == true &&
isset( $_SESSION["oldpass"]) &&  $_SESSION["oldpass"] == true)
{
  echo '<a  href="#"  id="submitNewPassword" onclick="submitNewPass(';  echo "'testing'"; echo');"
  class="btn btn-primary">Change Password</a>';
}
else {
  echo '<a  href="#"  class="btn btn-primary disabled">Change Password</a';
}
 ?>
