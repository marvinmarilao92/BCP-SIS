<?php

require_once("../include/conn.php");
require_once("../session.php");
$db = mysqli_select_db($conn, 'sis_db');

    if(isset($_POST['dtid'])){
        // Object Connection
             date_default_timezone_set("asia/manila");
             $date = date("Y-m-d H:i:s",strtotime("+0 HOURS"));
             $id = mysqli_real_escape_string($conn,$_POST['dtid']);  
             
        $q_checkcode = $conn->query("SELECT * FROM `datms_studreq` WHERE `id_number` = '$id'") or die(mysqli_error($conn));
            $v_checkcode = $q_checkcode->num_rows;
            
            if($v_checkcode == 0){
                echo ('failed');
            }else {
                $conn->query("UPDATE datms_studreq SET `status`='Received and Verified By: $verified_session_firstname $verified_session_lastname',`date` = '$date' WHERE `id_number`='$id'") or die(mysqli_error($conn));
                echo ('success');
            }
        }
?>
