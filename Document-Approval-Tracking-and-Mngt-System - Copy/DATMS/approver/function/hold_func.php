<?php

require_once("../include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');

    if(isset($_POST['docs_id'])&&isset($_POST['docs_code'])&&isset($_POST['docs_act2']) && isset($_POST['docs_off2'])){
        // Object Connection
             date_default_timezone_set("asia/manila");
             $date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));
             $id = mysqli_real_escape_string($conn,$_POST['docs_id']);
             $doc_code = mysqli_real_escape_string($conn,$_POST['docs_code']);
             $d_act2 = mysqli_real_escape_string($conn,$_POST['docs_act2']);
             $d_off2 = mysqli_real_escape_string($conn,$_POST['docs_off2']);
             
        $q_checkcode = $conn->query("SELECT * FROM `datms_documents` WHERE `doc_code` = '$doc_code'") or die(mysqli_error($conn));
            $v_checkcode = $q_checkcode->num_rows;
            if($v_checkcode < 1){
                echo ('Val30');
            }else {
                $conn->query("UPDATE datms_documents SET doc_status = 'Hold', doc_actor2 ='$d_act2', doc_off2='$d_off2', doc_date2 ='$date' WHERE doc_id='$id'") or die(mysqli_error($conn));
                echo ('success');
            }
        }else{
            echo ('Val69');
        }
?>
