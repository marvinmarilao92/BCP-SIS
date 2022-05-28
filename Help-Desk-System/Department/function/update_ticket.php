<?php

require_once("../include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');

    if(isset($_POST['id'])&&isset($_POST['status'])){
        // Object Connection
             date_default_timezone_set("asia/manila");
             $date = date("Y-m-d H:i:s",strtotime("+0 HOURS"));
             $id = mysqli_real_escape_string($conn,$_POST['id']);
			 $status = mysqli_real_escape_string($conn,$_POST['status']);
        
             
        $q_checkcode = $conn->query("SELECT * FROM `hdms_tickets` WHERE `status` = '$status'") or die(mysqli_error($conn));
            $v_checkcode = $q_checkcode->num_rows;
                $conn->query("UPDATE hdms_tickets SET status='$status', date='$date' WHERE id='$id'") or die(mysqli_error($conn));
                echo ('success');
            }               
              
           
       
?>