<?php
  require_once '../../Config.php';
  $deleteDTMSREQ = $db->query('delete from gac_datarequest where ID=?',   $_GET["rmvID"]);
 ?>
