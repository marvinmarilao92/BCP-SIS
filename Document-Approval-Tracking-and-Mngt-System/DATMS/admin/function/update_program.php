<?php

require_once("../include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');

    if(isset($_POST['progid'])&&isset($_POST['progcode'])&&isset($_POST['progname'])){
        // Object Connection
             date_default_timezone_set("asia/manila");
             $date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
             $id = mysqli_real_escape_string($conn,$_POST['progid']);
             $prog_code = mysqli_real_escape_string($conn,$_POST['progcode']);
             $prog_name = mysqli_real_escape_string($conn,$_POST['progname']);   
             
        $q_checkcode = $conn->query("SELECT * FROM `datms_program` WHERE `p_code` = '$prog_code'") or die(mysqli_error($conn));
            $v_checkcode = $q_checkcode->num_rows;
            if($v_checkcode == 1){
                echo ('failed');
            }else {
                $conn->query("UPDATE datms_program SET p_code='$prog_code', p_name='$prog_name', date='$date' WHERE id='$id'") or die(mysqli_error($conn));
                echo ('success');
            }
        }
?>
