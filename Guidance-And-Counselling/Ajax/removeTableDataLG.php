<?php
  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["deleteRow"]))
  {
    $_SESSION["removeRow"] = "animate__animated animate__pulse";
    require_once 'Config.php';
    $deleteROW = $db->query('delete from gac_logsdata where ID=?',$_GET["deleteRow"]);
    if ( $deleteROW->affectedRows() == 1)
    {

    }
  }
 ?>
