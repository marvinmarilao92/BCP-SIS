<?php
require_once "ajax/timezone.php";
require_once "../security/newsource.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit2'])) {

  $id = $_POST['id'];

  if (isset($_FILES['file1']['name'])) {

    $file1 = rand(10000, 100000) . '-' . $_FILES["file1"]["name"];
    $targetDir = '../../assets/medhis/' . $file1;
    $fileType = pathinfo($file1, PATHINFO_EXTENSION);
    $fileTmp = $_FILES['file1']['tmp_name'];
    $allowTypes = array('pdf, docx');


    move_uploaded_file($fileTmp, $targetDir);


    $insert = $db->query('INSERT INTO ms_medhis (id_number, `file_name`, `create_at`)  VALUES (?, ?, ?)', $id, $file1, $time);

    if ($insert->affectedRows()) {
      $_SESSION['alert'] = "You have inserted a Medical History Letter";
    }

    header("Location: " . $_SERVER["HTTP_REFERER"]);
  }
}