<?php
  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["changingIcon"]))
  {

    include 'timezone.php';
    require_once 'Config.php';
    $timeOut = $db->query('UPDATE gac_logsdata SET updated=? WHERE ID=?', $time, $_GET["changingIcon"]);
    if ($timeOut->affectedRows() == 1)
    {
        echo '<i class="bi bi-check2-circle animate__animated animate__fadeInUp" style="color: green;"></i>';
    }
  }
 ?>
