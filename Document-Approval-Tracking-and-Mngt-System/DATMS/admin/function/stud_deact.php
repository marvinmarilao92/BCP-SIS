<?php

require_once("../include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');

    if(isset($_POST['deactid'])){
        // Object Connection
             date_default_timezone_set("asia/manila");
             $date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
             $id = mysqli_real_escape_string($conn,$_POST['deactid']);  
            //  $account_status = mysqli_real_escape_string($conn,trim($_POST["dtstat"]));

             
        $q_checkcode = $conn->query("SELECT * FROM `student_information` WHERE `id_number` = '$id '") or die(mysqli_error($conn));
            $v_checkcode = $q_checkcode->num_rows;
            if($v_checkcode > 1){
                echo ('failed');
            }else {
                $conn->query("UPDATE student_information SET account_status= 'Deactivated', stud_date ='$date' WHERE id_number='$id'") or die(mysqli_error($conn));
                echo ('success');
            }
        }
?>
