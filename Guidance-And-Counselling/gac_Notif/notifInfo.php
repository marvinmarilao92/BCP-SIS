<?php session_start();

  require_once '../Config.php';
  require_once 'timezone.php';
  $currentNotif = $db->query('SELECT * FROM gac_datarequest WHERE ID=?', $_GET["current"])->fetchArray();

  $_SESSION["Student_Course"] = $currentNotif["Student_Course"];
  $_SESSION["Student_School_year"] = $currentNotif["Student_School_year"];
  $_SESSION["Student_Year_Level"] = $currentNotif["Student_Year_Level"];
  $_SESSION["current_Request"] =  $_GET["current"];


  $date_a = new DateTime($currentNotif["created_at"]);
  $date_b = new DateTime($time);
  $interval = date_diff($date_a,$date_b);



  echo '
  <div class="card">
  <div class="card-body">
    <div id="errorMessage"></div>
    <h5 class="card-title ">Guidance and Counselor</h5>
    <h6 class="card-subtitle mb-2 text-muted">Requesting student information</h6>

    <p class="card-text">Couse: <b>'.$_SESSION["Student_Course"].'</b></p>
    <p class="card-text">Shool Year: <b>'.  $_SESSION["Student_School_year"].'</b></p>
    <p>Year Level: <b>'.$currentNotif["Student_Year_Level"].'</b></p>';
    if ($currentNotif["Request_Remarks"] != null) echo '  <p class="card-text">Remarks: '.$currentNotif["Request_Remarks"].'</p>'; else echo '<p class="card-text">Remarks:  - </p>';
echo'     <p class="card-text">'.$interval->format('%h:%i:%s').' Ago</p>


    <a href="#!" class="card-link " onclick="closeCurrent();">Close</a>

    <span id="close" style="margin-left: 15px;">
        <a href="#!" class="card-link" onclick="declinedRequest('; echo "'errorMessage', 'close', 'notifTable'"; echo');">Decline Request</a>
        <a href="#!" class="card-link" onclick="ApproveRequest(';  echo "'errorMessage', 'close', 'notifTable'"; echo');">Approve Request</a>
    </span>
  </div>
</div>';





 ?>
