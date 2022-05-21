<?php require_once "../security/newsource.php";
require_once "../timezone.php";

$id_number = $_POST['id_number'];
$fullname = $_POST['fullname'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$course = $_POST['course'];
$y_lvl = $_POST['year_level'];
$section = $_POST['section'];
$temp = $_POST['temperature'];
$new_time = date("Y-m-d", strtotime($time));
$insert = $db->query('INSERT INTO hcms_ctracing (id_number, fullname, contact, `address`, course, y_lvl, section, temp, created_at)  
VALUES (?, ?, ?, ?,  ?, ?, ?, ?,  ?)', $id_number, $fullname, $contact, $address, $course, $y_lvl, $section, $temp, $new_time);

// echo $insert->affectedRows();

// if ($insert->affectedRows()== 1)
// {
      
// }