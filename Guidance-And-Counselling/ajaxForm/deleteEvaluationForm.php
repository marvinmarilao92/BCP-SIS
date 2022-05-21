<?php
  require_once 'Config.php';
  $Evaluation = $db->query('SELECT survey_key FROM gac_teachereval WHERE ID=?',$_GET["deleteForm"])->fetchArray();
  $delete = $db->query('delete from gac_teachereval where survey_key=?', $Evaluation["survey_key"]);

 ?>
