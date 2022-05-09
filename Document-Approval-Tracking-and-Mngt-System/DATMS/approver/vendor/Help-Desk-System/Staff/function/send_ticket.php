<?php

require_once("../include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');


    if(isset($_POST['id'])&&isset($_POST['subject'])&&isset($_POST['mes sage'])  && isset($_POST['t_act'])&& isset($_POST['date'])&& isset($_POST['remarks'])) {
        // Object Connection
             date_default_timezone_set("asia/manila");
             $date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
             $id = mysqli_real_escape_string($conn,trim($_POST['id']));
             $subject = mysqli_real_escape_string($conn,trim($_POST['subject']));
             $message = mysqli_real_escape_string($conn,trim($_POST['message']));
             $date = mysqli_real_escape_string($conn,trim($_POST['date']));
           
             $sql = "SELECT * FROM `user_information` WHERE `id` = '$t_act'";
             if($result = mysqli_query($conn, $sql)){
                if(mysqli_num_rows($result) > 0){
                   while ($row = mysqli_fetch_array($result)) {
                       $t_act =  mysqli_real_escape_string($conn,$row["firstname"].' '.$row["lastname"]);
                   }
                }
             }

        $q_checkcode = $conn->query("SELECT * FROM `hdms_ticket_department` WHERE `subject` = '$subject'") or die(mysqli_error($conn));
            $v_checkcode = $q_checkcode->num_rows;
            if($v_checkcode < 1){
                echo ('Val30');
            }else {
                $conn->query("UPDATE hdms_ticket_department SET status = '1', t_act ='$t_act', date ='$date'
               , remarks='$remarks' WHERE id='$id'") or die(mysqli_error($conn));
                // record for ticket
                $sql1 = "SELECT * FROM `hdms_ticket_department` WHERE `subject` = '$subject'";
                    if($result1 = mysqli_query($conn, $sql1)){
                        if(mysqli_num_rows($result1) > 0){
                        while ($row1 = mysqli_fetch_array($result1)) {
                            $message =  mysqli_real_escape_string($conn,$row1["message"]);

                            $t_act =  mysqli_real_escape_string($conn,$row1["t_act"]);
                           
                            $date =  mysqli_real_escape_string($conn,$row1["date"]);

                            $conn->query("INSERT INTO hdms_ticket_department (subject, message, status, t_act, date, remarks)
                            VALUES ('$subject', '$message','1','$t_act','$date','Ticket forwarded')") or die(mysqli_error($conn));

                            echo ('success');
                            }
                        }
                    }
                
            }
        }else{
            echo ('Val69');
        }
?>
