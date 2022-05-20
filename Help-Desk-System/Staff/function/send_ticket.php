<?php

require_once("../include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');

    if(isset($_POST['ticketid']) &&isset($_POST['stud_num']) &&isset($_POST['ticketact'])){
        // Object Connection
             date_default_timezone_set("asia/manila");
             $date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
             $id = mysqli_real_escape_string($conn,$_POST['ticketid']);
             $student_number = mysqli_real_escape_string($conn,$_POST['stud_num']);
             $act = mysqli_real_escape_string($conn,$_POST['ticketact']);  
             
             
        $q_checkcode = $conn->query("SELECT * FROM `hdms_tickets` WHERE `id` = '$id'") or die(mysqli_error($conn));
            $v_checkcode = $q_checkcode->num_rows;
            if($v_checkcode == 1 || $v_checkcode == 0){
                $conn->query("UPDATE hdms_tickets SET ticket_department='$act', date='$date' WHERE id='$id'") or die(mysqli_error($conn));
               

                            //create audit trail record
                                //add session conncetion
                                include('../session.php');
                                $fname=$verified_session_role; 
                                if (!empty($_SERVER["HTTP_CLIENT_IP"])){
                                    $ip = $_SERVER["HTTP_CLIENT_IP"];
                                }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
                                    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                                }else{
                                    $ip = $_SERVER["REMOTE_ADDR"];
                                    $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                                    $remarks="forward a ticket";  
                                    //save to the audit trail table
                                    mysqli_query($conn,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','success','$ip','$host','$date')")or die(mysqli_error($conn));
                            
                                   
                                    $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                                    VALUES ('$act', '0' ,'','0','forwarded ticket','You have incoming ticket','$verified_session_role','Active','$date')") or die(mysqli_error($conn));
                                    
                                    $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                                    VALUES ('1', '0' ,'','0','forwarded ticket','Staff forwarded a ticket to $act','$verified_session_role','Active','$date')") or die(mysqli_error($conn));

                                     $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                                     VALUES ('$student_number', '0' ,'','0','ticket forwarded','Your ticket has been forwarded to $act','$verified_session_role','Active','$date')") or die(mysqli_error($conn));
                                    echo ('success');
                                }
                            //end of audit trail             
            }
        } else{
            echo ('Val69');
        }
?>