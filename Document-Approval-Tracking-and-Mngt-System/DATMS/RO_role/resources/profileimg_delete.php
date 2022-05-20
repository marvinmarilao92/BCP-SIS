<?php
include('../session.php');
include_once('../include/conn.php');

    $query = "UPDATE user_information SET user_img = 0 WHERE `id_number` = '$verified_session_username'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run){

      if (!empty($_SERVER["HTTP_CLIENT_IP"])){
  
        $ip = $_SERVER["HTTP_CLIENT_IP"];
  
      }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
  
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
  
      }else{
        date_default_timezone_set("asia/manila");
        $audit_date = date("Y-m-d H:i:s",strtotime("+0 HOURS"));
        $fname= $verified_session_role;
        date_default_timezone_set("asia/manila");
        $audit_date = date("Y-m-d H:i:s",strtotime("+0 HOURS"));
        $ip = $_SERVER["REMOTE_ADDR"];
        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $remarks= "User Profile has been Deleted";  
        //save to the audit trail table
          
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

     }

 ?>



 