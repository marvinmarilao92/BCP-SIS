<?php require_once "timezone.php";
require_once "Config.php";

$editID = $_GET['editID'];
$urin = $_GET['urin'];
$cbc = $_GET['cbc'];
$c_xray = $_GET['c_xray'];

$udpate2 = $db->query('UPDATE ms_labtest SET urin=?, cbc=?, c_xray=? WHERE id=' . $editID . '', $urin, $cbc, $c_xray);
if ($udpate2->affectedRows()) {
  $_SESSION['alertEdit'] = "Data Changed!";
} else {
  $_SESSION['alertEdit2'] = "Error ! not Changed";
}

header("Location: " . $_SERVER["HTTP_REFERER"]);