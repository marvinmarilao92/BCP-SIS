<?php

require_once("include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');

    if(isset($_POST['dtid'])&&isset($_POST['dtcode'])&&isset($_POST['dtname'])&&isset($_POST['dtdesc'])){
        // Object Connection
             date_default_timezone_set("asia/manila");
             $date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));
             $id = mysqli_real_escape_string($conn,$_POST['dtid']);
             $dt_code = mysqli_real_escape_string($conn,$_POST['dtcode']);
             $dt_name = mysqli_real_escape_string($conn,$_POST['dtname']);
             $dt_desc = mysqli_real_escape_string($conn,$_POST['dtdesc']);
             
        $q_checkcode = $conn->query("SELECT * FROM `datms_doctype` WHERE `dt_name` = '$dt_name'") or die(mysqli_error($conn));
            $v_checkcode = $q_checkcode->num_rows;
            if($v_checkcode == 1){
                echo ('failed');
            }else {
                $conn->query("UPDATE datms_doctype SET dt_code='$dt_code', dt_name='$dt_name', dt_desc='$dt_desc', dt_date='$date' WHERE dt_id='$id'") or die(mysqli_error($conn));
                echo ('success');
            }
        }
?>
