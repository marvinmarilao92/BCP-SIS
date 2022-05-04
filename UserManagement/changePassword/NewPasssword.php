<?php $upper_lower = $number = $specialchar = $passLen = false; session_start();
if ($_GET["npas"] != "InstanTly!021"){
$_SESSION["conpass"] = false;
if(preg_match('/[A-Z]/', $_GET["npas"]) && preg_match('/[a-z]/', $_GET["npas"])) { $upper_lower = true; }
if(preg_match('/[0-9]/', $_GET["npas"]) ) { $number = true; }
if(preg_match('/[!\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_GET["npas"])) { $specialchar = true; }
if(strlen($_GET["npas"]) >= 8) { $passLen = true; }




if ($upper_lower == true)
  echo '<small  class="form-text text-muted" > <span style="color:green"> <i class="bi bi-check-circle"></i> Lowercase & Uppercase</span></small><br>';
else
  echo '<small  class="form-text text-muted" > <span style="color:red"> <i class="bi bi-exclamation-circle"></i> Lowercase & Uppercase</span></small><br>';
if ($number == true)
  echo '<small  class="form-text text-muted" > <span style="color:green"> <i class="bi bi-check-circle"></i> Number (0-9)</span></small><br>';
else
  echo '<small  class="form-text text-muted" > <span style="color:red"> <i class="bi bi-exclamation-circle"></i> Number (0-9)</span></small><br>';
if ($specialchar == true)
  echo '<small  class="form-text text-muted" > <span style="color:green"> <i class="bi bi-check-circle"></i> Special Character (!@#$%^&*)</span></small><br>';
else
  echo '<small  class="form-text text-muted" > <span style="color:red"> <i class="bi bi-exclamation-circle"></i> Special Character (!@#$%^&*)</span></small><br>';
if ($passLen == true)
  echo '<small  class="form-text text-muted" > <span style="color:green"> <i class="bi bi-check-circle"></i> Atleast 8 Character</span></small>';
else
  echo '<small  class="form-text text-muted" > <span style="color:red"> <i class="bi bi-exclamation-circle"></i> Atleast 8 Character</span></small>';}
else {echo '<small  class="form-text text-muted" > <span style="color:red"> <i class="bi bi-exclamation-circle"></i> You cant use old password here!</span></small><br>'; $_SESSION["newpass"] = false; $_SESSION["Confirmed"] = false; }


if ($upper_lower == true && $number == true &&
$specialchar == true && $passLen == true)
{ $_SESSION["Confirmed"] = $_GET["npas"]; $_SESSION["newpass"] = true; }
else $_SESSION["newpass"] = false;



 ?>
<!--
 <small  class="form-text text-muted" > <span style="color:green"> <i class="bi bi-exclamation-circle"></i> Lowercase & Uppercase</span></small><br>
 <small  class="form-text text-muted" > <span style="color:green"> <i class="bi bi-exclamation-circle"></i> Number (0-9)</span></small><br>
 <small  class="form-text text-muted" > <span style="color:green"> <i class="bi bi-exclamation-circle"></i> Special Character (!@#$%^&*)</span></small><br>
 <small  class="form-text text-muted" > <span style="color:green"> <i class="bi bi-exclamation-circle"></i> Atleast 8 Character</span></small> -->
