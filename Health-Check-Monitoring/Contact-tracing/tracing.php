<?php

require_once "security/newsource.php";
require_once "timezone.php";

$newTime = date("Y-m-d", strtotime($time));
// QRCODE
if (isset($_POST['text']) && ($_POST['text']) != "") {
  $text = $_POST['text'];
  $temperature = $_POST['temp'];

  if ($temperature >= 36.1 && $temperature !== 37.2) {
    $status = "Normal";
  } else {
    $status = "Not Normal";
  }

  $insert = $db->query('INSERT INTO hcms_ctracing (qrcode, temperature, `status`, created_at)  VALUES (?, ?, ?, ?)', $text, $temperature, $status, $newTime);
  if ($insert->affectedRows() == 1) {
    echo "Successfully inserted";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    $_SESSION['alert'] = "Data inserted Successfully";
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    $_SESSION['alerterror'] = "error";
  }
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

// Student and Teachers
if (isset($_POST['submit']) && isset($_POST['idnum']) && isset($_POST['idnum']) != "" && isset($_POST['temp']) != "") {
  $idnum = $_POST['idnum'];
  $temperature = $_POST['temp'];

  if ($temperature >= 36 && $temperature <= 37.4) {
    $status = "Normal";
  } else if ($temperature >= 37.5 || $temperature <= 36.9) {
    $status = "Not Normal";
  }

  $insert2 = $db->query('INSERT INTO hcms_ctracing (qrcode, temperature, `status`, created_at)  VALUES (?, ?, ?, ?)', $idnum, $temperature, $status, $newTime);
  if ($insert2->affectedRows() == 1) {
    echo "Successfully inserted";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    $_SESSION['alert'] = "Data inserted Successfully";
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    $_SESSION['alerterror'] = "error";
  }
}


// visitors
if (isset($_POST['submit']) && isset($_POST['name'])) {

  if ($_POST['contact'] != "" && $_POST['address'] != "" && $_POST['temp'] != "") {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $temp = $_POST['temp'];

    $insert3 = $db->query('INSERT INTO hcms_ctracingv (`name`, contact, `address`, email, temp, created_at)  VALUES (?, ?, ?, ?, ?, ?)', $name, $contact, $address, $email, $temp, $newTime);
    if ($insert3->affectedRows() == 1) {
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      $_SESSION['alert'] = "Data inserted Successfully";
    } else {

      header('Location: ' . $_SERVER['HTTP_REFERER']);
      $_SESSION['alerterror'] = "error";
    }
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    $_SESSION['alerterror'] = "Please insert all credentials";
  }
}
$conn->close();