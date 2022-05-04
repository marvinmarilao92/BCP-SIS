<?php 
include('../security/newsource.php');

if($_SERVER['REQUEST_METHOD'] == "POST") {


$progName = mysqli_real_escape_string($conn, $_POST['program_name']);
$descr = mysqli_real_escape_string($conn, $_POST['descr']);
$startDate =  mysqli_real_escape_string($conn, $_POST['startDate']);
$authorized =  mysqli_real_escape_string($conn, $_POST['authorized']);

date_default_timezone_set('Asia/Manila');
$newStart = date("F j, Y", strtotime($startDate));
$status = "Open";

    $sql = "INSERT INTO clinic_program (`program`, `descr`, `date_start`, `authority`, `status`) 
            VALUES ('$progName', '$descr', '$newStart', '$authorized', '$status' )";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run){
      $msg = "Program has been Added";
      $icon = "success";
      functionSwal($msg, $icon);
    } else {
      $msg = "Program Already Announced";
      $icon = "error";
      functionSwal($msg, $icon);
    }

}
?>