<?php

require_once("../include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');

    if(isset($_POST['ticketid'])&&isset($_POST['ticketact'])){
        // Object Connection
             date_default_timezone_set("asia/manila");
             $date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
             $id = mysqli_real_escape_string($conn,$_POST['ticketid']);
             $act = mysqli_real_escape_string($conn,$_POST['ticketact']);  
             
        $q_checkcode = $conn->query("SELECT * FROM `hdms_tickets` WHERE `id` = '$id'") or die(mysqli_error($conn));
            $v_checkcode = $q_checkcode->num_rows;
            if($v_checkcode == 1 || $v_checkcode == 0){
                $conn->query("UPDATE hdms_tickets SET ticket_department='$act', date='$date' WHERE id='$id'") or die(mysqli_error($conn));
                echo ('success');
            }else {                
                echo ('failed');
            }
        }
?>
