<?php require_once "../security/newsource.php";
require_once "../timezone.php";

$id_number = $_POST['fullname'];
$fullname = $_POST['role'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$course = $_POST['course'];
$y_lvl = $_POST['year_level'];
$section = $_POST['section'];
$temp = $_POST['temperature'];

$insert = $db->query('INSERT INTO hcms_ctracing (id_number, fullname, contact, `address`, course, y_lvl, section, temp, created_at)  
VALUES (?, ?, ?, ?,  ?, ?, ?, ?,  ?)', $id_number, $fullname, $contact, $address, $course, $y_lvl, $section, $temp, $time);

// echo $insert->affectedRows();

// if ($insert->affectedRows()== 1)
// {
      
// }