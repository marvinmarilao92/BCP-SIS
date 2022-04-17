<?php

require_once("../include/conn.php");

$db = mysqli_select_db($conn, 'sis_db');

if(isset($_POST['progid'])&& isset($_POST['progcode']))
{
  date_default_timezone_set("asia/manila");
  $date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));
    $id = $_POST['progid'];
    $code = $_POST['progcode'];

    $query = "DELETE FROM datms_program WHERE id='$id'";
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
          $remarks="Program has been delete";  
          //save to the audit trail table
          mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$code','$ip','$host','$date')")or die(mysqli_error($link));

          //save doctype to the database
          echo  "ProgramDeleted";
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
