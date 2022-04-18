<?php 
include_once('../includes/source.php');


if($_SERVER["REQUEST_METHOD"] == "GET"){

$id = $_GET['req_id'];
$table_name = $_GET['tablename'];
date_default_timezone_set("asia/manila");
$date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));
$fstatus = "Rejected";

    $query_run = updateStatus($table_name, $conn, $fstatus, $date, $id);
    
    if ($query_run){
      $fname= $verified_session_role; 
      $msg = "Profile Updated";
      $icon = "success";
      functionSwal($msg, $icon);
      if (!empty($_SERVER["HTTP_CLIENT_IP"])){
  
        $ip = $_SERVER["HTTP_CLIENT_IP"];
  
      }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
  
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
  
      }else{
        date_default_timezone_set("asia/manila");
        $audit_date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));
        $ip = $_SERVER["REMOTE_ADDR"];
        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $remarks= "Reject Medical Records";  
        //save to the audit trail table
          mysqli_query($conn,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$office','$ip','$host','$date')")or die(mysqli_error($conn));  
          $_SESSION['alert'] = "Successfully Updated";
          header("location:". $_SERVER['HTTP_REFERER']);
          
          $sql_run = auditQuery($conn, $verified_session_username, $remarks , $fname, $office , $ip , $host , $audit_date);
          if($sql_run){
          $_SESSION['alert'] = "Successfully Uploaded";
          // swal
          $msg = "Record Added";
          $icon = "success";
          functionSwal($msg, $icon);
          header("location:". $SERVER['HTTP_REFERER']);
          exit();
          }
        }
  
    }else{
      $msg = "Error";
      $icon = "error";
      functionSwal($msg, $icon);
      }
  
}
exit();
?>
