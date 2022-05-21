<?php

  session_start();

  require_once 'Config.php';
  require_once 'timezone.php';


  unset($_SESSION["timeDate"]);
  unset($_SESSION["time"][0]);
  unset($_SESSION["time"][1]);
  unset($_SESSION["time"][2]);
  unset($_SESSION["time"][3]);

  $_SESSION["dtimeAppointment"] = $_GET["time"];
  $_SESSION["timeDate"] = $_GET["time"];
  $_SESSION["appointmentBTN"][1] = false;

  $validateDtime = $db->query("SELECT * FROM counselrequest WHERE	 Schedule LIKE '".$_GET["time"]."%'" );
  if ($validateDtime->numRows() <= 4 && $validateDtime->numRows() != 0)
  { $test = $validateDtime->numRows();

    require_once 'Config.php';
    $getTime = $db->query("SELECT * FROM counselrequest WHERE	 Schedule LIKE '".$_GET["time"]."%'" )->fetchAll();
    foreach ($getTime as $time)
    {
      $date  = explode(" ",$time["Schedule"]);

      if ($date[1] == "8:30")  {$_SESSION["time"][0] = $date[1];}
      if ($date[1] == "10:30") {$_SESSION["time"][1] = $date[1];}
      if ($date[1] == "1:30")  {$_SESSION["time"][2] = $date[1];}
      if ($date[1] == "3:30")  {$_SESSION["time"][3] = $date[1];}


    }
      $_SESSION["appointmentBTN"][0] = true;
      if ($test != 4)
      echo '<small class="form-text text-muted"><i class="bi bi-exclamation-octagon" style="color: green;"> This date is available!</i></small>';
      else {
        echo '<small class="form-text text-muted"><i class="bi bi-exclamation-octagon" style="color: red;"> This date ';echo "isn't"; echo' available! Please select other date.</i></small>';}
  }
  else
  {
    unset($_SESSION["time"][0]);
    unset($_SESSION["time"][1]);
    unset($_SESSION["time"][2]);
    unset($_SESSION["time"][3]);
    $_SESSION["appointmentBTN"][0] = true;
  echo '<small class="form-text text-muted"><i class="bi bi-exclamation-octagon" style="color: green;"> This date is available!</i></small>';

  }

  // $lockedTime = $db->query("SELECT * FROM counselrequest WHERE	 Schedule LIKE '".$_GET["time"]."%'" );
  // if ($lockedTime->numRows() >= 4)
  // {
  //   unset($_SESSION["time"][0]);
  //   unset($_SESSION["time"][1]);
  //   unset($_SESSION["time"][2]);
  //   unset($_SESSION["time"][3]);
  //   $_SESSION["appointmentBTN"][0] = false;
  //
  //   echo '<small class="form-text text-muted"><i class="bi bi-exclamation-octagon" style="color: red;"> This date ';echo "isn't"; echo' available! Please select other date.</i></small>';
  // }
 ?>
