<?php

require_once("../include/conn.php");

$db = mysqli_select_db($conn, 'sis_db');

if(isset($_POST['offid']))
{
    $id = $_POST['offid'];

    $query = "DELETE FROM datms_office WHERE off_id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
      //create audit trail record
        //add session conncetion
        include('../session.php');
        $fname=$verified_session_department; 
        if (!empty($_SERVER["HTTP_CLIENT_IP"])){
          $ip = $_SERVER["HTTP_CLIENT_IP"];
        }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
          $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }else{
          $ip = $_SERVER["REMOTE_ADDR"];
          $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
          $remarks="Department has been delete";  
          //save to the audit trail table
          mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$Office_title','$ip','$host','$date')")or die(mysqli_error($link));

          //save doctype to the database
          echo  "DepartmentDeleted";
        }
      //end of audit trail

    }
    else
    {
        echo  "NoData";
    }
}else{
    echo  "action fail";
}

?>
