<?php session_start();
if (isset($_SESSION["conpass"]) && isset($_SESSION["newpass"]) &&  $_SESSION["conpass"] == true && $_SESSION["newpass"] == true &&
isset( $_SESSION["oldpass"]) &&  $_SESSION["oldpass"] == true)
{
  echo '<button type="submit"  class="btn btn-primary">Change Password</button>';
}
else {
  echo '<button type="submit" disabled class="btn btn-primary">Change Password</button>';
}
 ?>
