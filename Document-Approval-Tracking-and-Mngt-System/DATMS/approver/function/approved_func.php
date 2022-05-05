<?php

require_once("../include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');

    if(isset($_POST['docs_id'])&&isset($_POST['docs_code'])&&isset($_POST['docs_act2']) && isset($_POST['docs_off2'])){
        // Object Connection
             date_default_timezone_set("asia/manila");
             $date = date("Y-m-d H:i:s",strtotime("+0 HOURS"));
             $id = mysqli_real_escape_string($conn,$_POST['docs_id']);
             $doc_code = mysqli_real_escape_string($conn,$_POST['docs_code']);
             $d_act2 = mysqli_real_escape_string($conn,$_POST['docs_act2']);
             $d_off2 = mysqli_real_escape_string($conn,$_POST['docs_off2']);
             $d_remarks = mysqli_real_escape_string($conn,$_POST['docs_remarks']);
             
        $q_checkcode = $conn->query("SELECT * FROM `datms_documents` WHERE `doc_code` = '$doc_code'") or die(mysqli_error($conn));
            $v_checkcode = $q_checkcode->num_rows;
            if($v_checkcode < 1){
                echo ('Val30');
            }else {
                $conn->query("UPDATE datms_documents SET doc_status = 'Approved', doc_actor2 ='$d_act2', doc_off2='$d_off2', doc_date2 ='$date' , doc_remarks ='$d_remarks' WHERE doc_id='$id'") or die(mysqli_error($conn));

                // record for tracking
                $sql1 = "SELECT * FROM `datms_documents` WHERE `doc_code` = '$doc_code'";
                    if($result1 = mysqli_query($conn, $sql1)){
                        if(mysqli_num_rows($result1) > 0){
                        while ($row1 = mysqli_fetch_array($result1)) {
                            $doc_title =  mysqli_real_escape_string($conn,$row1["doc_title"]);
                            $filename =  mysqli_real_escape_string($conn,$row1["doc_name"]);
                            $size =  mysqli_real_escape_string($conn,$row1["doc_size"]);
                            $doc_type =  mysqli_real_escape_string($conn,$row1["doc_type"]);
                            $doc_desc =  mysqli_real_escape_string($conn,$row1["doc_desc"]);

                            $d_act1 =  mysqli_real_escape_string($conn,$row1["doc_actor1"]);
                            $d_off1 =  mysqli_real_escape_string($conn,$row1["doc_off1"]);
                            $d_date1 =  mysqli_real_escape_string($conn,$row1["doc_date1"]);

                            $tracker =  mysqli_real_escape_string($conn,$row1["doc_actor3"]);

                            

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
                                    $remarks="Document has been approved";  
                                    //save to the audit trail table
                                    mysqli_query($conn,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$doc_code','$ip','$host','$date')")or die(mysqli_error($conn));
                                    // query
                                    $conn->query("INSERT INTO datms_tracking (doc_code, doc_title, doc_name, doc_size, doc_type, doc_status, doc_desc, doc_actor1, doc_off1, doc_date1,doc_actor2,doc_off2, doc_date2,doc_remarks)
                                    VALUES ('$doc_code', '$doc_title' ,'$filename','$size','$doc_type','Approved','$doc_desc','$d_act2','$d_off2','$date','$d_act1','$d_off1','$d_date1','Document is Approved by')") or die(mysqli_error($conn));

                                    $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                                    VALUES ('$tracker', '0' ,'','0','Approved Document','Your document has been approved','$d_off2','Active','$date')") or die(mysqli_error($conn));
                                    // Self notifier
                                    $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                                    VALUES ('$verified_session_firstname $verified_session_lastname', '0' ,'','0','Approved Document','You approved $doc_type of $doc_title','$d_off2','Active','$date')") or die(mysqli_error($conn));

                                     //notif of students              
                                     $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                                     VALUES ('', '0' ,'$doc_title','0','Approved Document','Your $doc_type is approved by $d_act2','$d_off2','Active','$date')") or die(mysqli_error($conn));   

                                    echo ('success');
                                }
                            //end of audit trail
                            }
                        }
                    }
            }
        }else{
            echo ('Val69');
        }
?>
