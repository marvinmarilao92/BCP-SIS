<?php

require_once("../include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');

    if(isset($_POST['offid'])&&isset($_POST['offcode'])&&isset($_POST['offname'])&&isset($_POST['offloc'])){
        // Object Connection
             date_default_timezone_set("asia/manila");
             $date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
             $id = mysqli_real_escape_string($conn,$_POST['offid']);
             $Off_code = mysqli_real_escape_string($conn,$_POST['offcode']);
             $Off_name = mysqli_real_escape_string($conn,$_POST['offname']);
             $Off_loc = mysqli_real_escape_string($conn,$_POST['offloc']);
             
        $q_checkcode = $conn->query("SELECT * FROM `datms_dept` WHERE `off_name` = '$Off_name'") or die(mysqli_error($conn));
            $v_checkcode = $q_checkcode->num_rows;
            if($v_checkcode == 1){
                echo ('failed');
            }else {
                $conn->query("UPDATE datms_dept SET off_code='$Off_code', off_name='$Off_name', off_location='$Off_loc', off_date='$date' WHERE off_id='$id'") or die(mysqli_error($conn));
                echo ('success');
            }
        }
?>
