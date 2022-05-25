<?php
require_once "ajax/timezone.php";
require_once "../security/newsource.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

  $id = $_POST['id'];

  if (isset($_FILES['file1']['name'])) {

    $file1 = rand(10000, 100000) . '-' . $_FILES["file1"]["name"];
    $targetDir = '../../assets/recommendation/' . $file1;
    $fileType = pathinfo($file1, PATHINFO_EXTENSION);
    $fileTmp = $_FILES['file1']['tmp_name'];
    $allowTypes = array('pdf, docx');
  }
  if (isset($_FILES['file2']['name'])) {

    $file2 = rand(10000, 100000) . '-' . $_FILES["file2"]["name"];
    $targetDir2 = '../../assets/result/' . $file2;
    $fileType = pathinfo($file2, PATHINFO_EXTENSION);
    $fileTmp2 = $_FILES['file2']['tmp_name'];
    $allowTypes2 = array('pdf');
  }

  move_uploaded_file($fileTmp, $targetDir);
  move_uploaded_file($fileTmp2, $targetDir2);
  $udpate = $db->query('UPDATE ms_labtest SET `file_name`=? WHERE id=' . $id . '', $file1);
  $udpate2 = $db->query('UPDATE ms_labtest SET `file_name2`=? WHERE id=' . $id . '', $file2);
  if ($udpate->affectedRows() & $udpate2->affectedRows()) {
    $_SESSION['alert'] = "You have inserted a Recommendation & Medical Result";
  } else if ($udpate->affectedRows()) {
    $_SESSION['alert'] = "You have inserted a Recommendation ";
  } else if ($udpate2->affectedRows()) {
    $_SESSION['alert'] = "You have inserted a Medical Result ";
  } else {
    $_SESSION['alert2'] = "Error ! not Inserted";
  }

  header("Location: " . $_SERVER["HTTPS_REFERER"]);
}