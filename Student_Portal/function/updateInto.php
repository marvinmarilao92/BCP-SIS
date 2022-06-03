<?php require_once "../includes/config.php";

$updateid = $_GET['id'];

$sql = "UPDATE `ms_labtest` SET `status`='Pending' WHERE id = $updateid";
$query = mysqli_query($link, $sql);
if ($sql) {
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}