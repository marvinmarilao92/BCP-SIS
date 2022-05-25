<?php 
require_once "../security/newsource.php";
$tablename = $_GET['table'];
$delete = $db->query('delete from '.$tablename.' where id= ?', $_GET['id']);
header("location:". $_SERVER['HTTPS_REFERER']);
?>

