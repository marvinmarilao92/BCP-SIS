<?php 

include('../security/newsource.php');


  $id = $_POST['close_id'];
  $status = "Closed";
  $sql = "UPDATE clinic_program 
          SET `status` = '{$status}'
          WHERE prog_id = '{$id}'";

  $sql_run = mysqli_query($conn, $sql);

  if($sql_run){
    $msg = "Program is now Closed";
    $icon = "success";
    functionSwal($msg, $icon);
  }

?>