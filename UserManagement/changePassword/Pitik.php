<?php session_start();
  if ($_GET["Pitik"] == $_SESSION["Confirmed"]){ $_SESSION["conpass"] = true;
    echo '<small  class="form-text text-muted" > <span style="color:green"> <i class="bi bi-check-circle"></i> New passsword matched</span></small>';
  }else{
    echo '<small  class="form-text text-muted" > <span style="color:red"> <i class="bi bi-exclamation-circle"></i> New password not match!</span></small>';
    $_SESSION["conpass"] = false;
  }
 ?>
