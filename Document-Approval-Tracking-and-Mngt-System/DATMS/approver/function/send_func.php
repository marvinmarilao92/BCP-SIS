<?php

require_once("../include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');

    if(isset($_POST['docs_id'])&&isset($_POST['docs_code'])&&isset($_POST['docs_act1'])  && isset($_POST['docs_off1'])&& isset($_POST['docs_date1']) && isset($_POST['docs_act2']) && isset($_POST['docs_off2'])&& isset($_POST['docs_remarks'])){
        // Object Connection
             date_default_timezone_set("asia/manila");
             $date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));
             $id = mysqli_real_escape_string($conn,trim($_POST['docs_id']));
             $doc_code = mysqli_real_escape_string($conn,trim($_POST['docs_code']));

             $d_act1 = mysqli_real_escape_string($conn,trim($_POST['docs_act1']));
             $d_off1 = mysqli_real_escape_string($conn,trim($_POST['docs_off1']));
             $d_date1 = mysqli_real_escape_string($conn,$_POST['docs_date1']);
             
             $d_act2 = mysqli_real_escape_string($conn,trim($_POST['docs_act2']));
             $d_off2 = mysqli_real_escape_string($conn,$_POST['docs_off2']);

             $d_remarks = mysqli_real_escape_string($conn,$_POST['docs_remarks']);
           
             $sql = "SELECT * FROM `user_information` WHERE `id_number` = '$d_act2'";
             if($result = mysqli_query($conn, $sql)){
                if(mysqli_num_rows($result) > 0){
                   while ($row = mysqli_fetch_array($result)) {
                       $d_actor3 =  mysqli_real_escape_string($conn,$row["firstname"].' '.$row["lastname"]);
                   }
                }
             }

        $q_checkcode = $conn->query("SELECT * FROM `datms_documents` WHERE `doc_code` = '$doc_code'") or die(mysqli_error($conn));
            $v_checkcode = $q_checkcode->num_rows;
            if($v_checkcode < 1){
                echo ('Val30');
            }else {
                $conn->query("UPDATE datms_documents SET doc_status = 'Outgoing', doc_actor3 ='$d_actor3', doc_off3='$d_off2', doc_date3 ='$date'
                , doc_actor2 ='$d_act1', doc_off2='$d_off1', doc_date2 ='$d_date1', doc_remarks='$d_remarks' WHERE doc_id='$id'") or die(mysqli_error($conn));
                echo ('success');
            }
        }else{
            echo ('Val69');
        }
?>
