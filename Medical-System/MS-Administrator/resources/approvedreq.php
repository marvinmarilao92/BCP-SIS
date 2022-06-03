<?php require_once "../security/newsource.php";

$updateid = $_GET['id'];

$sql = "UPDATE `ms_labtest` SET `status`='Approved' WHERE id = $updateid";

$query = mysqli_query($conn, $sql);
if ($sql) {
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}