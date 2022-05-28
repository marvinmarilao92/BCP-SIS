<?php

require_once "security/newsource.php";
require_once "timezone.php";

if (isset($_POST['text']) && ($_POST['text']) != "") {
  $text = $_POST['text'];
  $insert = $db->query('INSERT INTO hcms_ctracing (qrcode, created_at)  VALUES (?, ?)', $text, $time);
  if ($insert->affectedRows() == 1) {
    echo "Successfully inserted";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    $_SESSION['alert'] = "1 data inserted";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    $_SESSION['alerterror'] = "error";
  }
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['submit']) && isset($_POST['idnum']) && isset($_POST['idnum']) != "") {
  $idnum = $_POST['idnum'];
  $insert2 = $db->query('INSERT INTO hcms_ctracing (qrcode, created_at)  VALUES (?, ?)', $idnum, $time);
  if ($insert2->affectedRows() == 1) {
    echo "Successfully inserteddsadasd";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    $_SESSION['alert'] = "1 data inserted";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    $_SESSION['alerterror'] = "error";
  }
}
$conn->close();