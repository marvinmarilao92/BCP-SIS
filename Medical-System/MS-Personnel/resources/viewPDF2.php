<?php

require_once '../security/newsource.php';
// fetch file to download from database
$filename = "SELECT * FROM ms_labtest WHERE id = {$_GET['id']}";
$query_run = mysqli_query($conn, $filename);
$query_file = mysqli_fetch_assoc($query_run);
if (isset($query_file['file_name2'])) {
  $file = $query_file['file_name2'];
  $filepath = '../../assets/result/' . $file;
} else {
  echo "norecords";
}
if (file_exists($filepath)) {
  header('Content-Type: application/pdf');
  readfile('../../assets/result/' . $file);
  exit;
} else {
  echo 'nofile';
}