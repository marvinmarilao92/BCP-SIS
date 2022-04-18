<?php

require_once("../include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');

    if(isset($_POST['dtid'])){
        // Object Connection
             date_default_timezone_set("asia/manila");
             $date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
             $id = mysqli_real_escape_string($conn,$_POST['dtid']);  
             
        $q_checkcode = $conn->query("SELECT * FROM `datms_studreq` WHERE `id_number` = '$id'") or die(mysqli_error($conn));
            $v_checkcode = $q_checkcode->num_rows;
            
            if($v_checkcode == 0){
                echo ('failed');
            }else {
                $conn->query("UPDATE datms_studreq SET status='Received' WHERE id_number='$id'") or die(mysqli_error($conn));
                echo ('success');
            }
        }
?>
