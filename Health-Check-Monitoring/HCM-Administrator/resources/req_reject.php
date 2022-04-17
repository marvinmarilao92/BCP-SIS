<?php 
include_once('../security/session.php');


if($_SERVER["REQUEST_METHOD"] == "GET"){

$id = $_GET['req_id'];
$table_name = $_GET['tablename'];
date_default_timezone_set("asia/manila");
$date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));
$fstatus = "Rejected";

  function Query_update($table_name, $conn, $fstatus, $date, $id){
    $query = "UPDATE ".$table_name." SET `status` = '$fstatus', `assess_date` = '$date' WHERE id ='$id'";
    return mysqli_query($conn, $query);
  }
    $query_run = Query_update($table_name, $conn, $fstatus, $date, $id);
    
    if(!$query_run){
      $msg = "Error";
      $icon = "error";
      functionSwal($msg, $icon);     
    }else{
      $msg = "Rejected";
      $icon = "success";
      functionSwal($msg, $icon);     
    }
  
}
exit();
?>
