<?php require_once "../security/newsource.php";
require_once "../timezone.php";
$Qid = $_GET['qrID'];
$sql = $db->query('SELECT * FROM hcms_profile WHERE cont_id =?', $Qid)->fetchAll();
if (isset($sql['cont_id'])) {
  echo '<div class= "alert alert-success" role= "alert" >Success</div>';
} else {
  echo '<div class= "alert alert-danger" role= "alert" >Not Aquired</div>';
}