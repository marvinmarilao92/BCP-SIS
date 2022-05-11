<?php session_start();

if (isset($_SESSION["closed_Field"]) && $_SESSION["closed_Field"] == true)
{
  echo '<input type="password" disabled value=""  class="form-control" id="currentPassword">';
}
else {
  echo '<input name="password" value="'.$_SESSION["oldP"].'" type="password" oninput="verifyOldPassword(this.value,';
   echo "'messCurrentPassword', 'cp', 'disabled'";
 echo');" class="form-control" id="currentPassword">';
}


?>
