<?php session_start();
  if (isset($_SESSION["Confirmed"])  && $_GET["comPass"] == $_SESSION["Confirmed"] && $_GET["comPass"] != ''){ $_SESSION["conpass"] = true;
    echo '<small  class="form-text text-muted" > <span style="color:green"> <i class="bi bi-check-circle"></i> New passsword matched</span></small>'; $_SESSION["USER_NEW_PASSOWORD"] = $_SESSION["Confirmed"];
  }else{
    echo '<small  class="form-text text-muted" > <span style="color:red"> <i class="bi bi-exclamation-circle"></i> New password and confirm password "doesnt match" Or "dont match".</span></small>';
    $_SESSION["conpass"] = false;
  }

 ?>
