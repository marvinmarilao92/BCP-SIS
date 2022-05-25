<?php 

include('../security/newsource.php');



  $id = $_GET['open_id'];
  $status = "Open";
  $sql = "UPDATE clinic_program 
          SET `status` = '{$status}'
          WHERE prog_id = '{$id}'";

  $sql_run = mysqli_query($conn, $sql);

  if($sql_run){
    $msg = "Program is now Open";
    $icon = "success";
    functionSwal($msg, $icon);
  }

?>