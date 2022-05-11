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
             
        $q_checkcode = $conn->query("SELECT * FROM `datms_documents` WHERE `doc_code` = '$doc_code'") or die(mysqli_error($conn));
            $v_checkcode = $q_checkcode->num_rows;
            if($v_checkcode < 1){
                echo ('Val30');
            }else {
                $conn->query("UPDATE datms_documents SET doc_status = 'Received', doc_actor2 ='$d_act2', doc_off2='$d_off2', doc_date2 ='$date' WHERE doc_id='$id'") or die(mysqli_error($conn));

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

                            //create audit trail record
                                //add session conncetion
                                include('../session.php');
                                $fname=$verified_session_role; 
                                if (!empty($_SERVER["HTTPS_CLIENT_IP"])){
                                    $ip = $_SERVER["HTTPS_CLIENT_IP"];
                                }elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])){
                                    $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                                }else{
                                    $ip = $_SERVER["REMOTE_ADDR"];
                                    $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                                    $remarks="You received document from $d_act1";  
                                    //save to the audit trail table
                                    mysqli_query($conn,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$doc_code','$ip','$host','$date')")or die(mysqli_error($conn));
                                    // query
                                    $conn->query("INSERT INTO datms_tracking (doc_code, doc_title, doc_name, doc_size, doc_type, doc_status, doc_desc, doc_actor1, doc_off1, doc_date1,doc_actor2,doc_off2, doc_date2,doc_remarks)
                                    VALUES ('$doc_code', '$doc_title' ,'$filename','$size','$doc_type','Received','$doc_desc','$d_act2','$d_off2','$date','$d_act1','$d_off1','$d_date1','Document is Recieved by')") or die(mysqli_error($conn));
        
                                    $conn->query("INSERT INTO datms_tracking (doc_code, doc_title, doc_name, doc_size, doc_type, doc_status, doc_desc, doc_actor1, doc_off1, doc_date1,doc_actor2,doc_off2, doc_date2,doc_remarks)
                                    VALUES ('$doc_code', '$doc_title' ,'$filename','$size','$doc_type','Received','$doc_desc','$d_act2','$d_off2','$date','$d_act1','$d_off1','$d_date1','Document is Recieved by')") or die(mysqli_error($conn));
                                    $update_notif = $conn->query("UPDATE datms_notification SET act1 = '', act2 = '', date = '$date' WHERE affected = '".$R_code."'") or die(mysqli_error($conn));
                                    if($update_notif){
                                    $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date, affected)
                                    VALUES ('$d_act1', '0' ,'','0','Received Document','You successfully received the document','$d_off2','Active','$date','$doc_code')") or die(mysqli_error($conn));
                                     $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date, affected)
                                     VALUES ('$doc_title', '0' ,'','0','Received Document','Your $doc_type document has been received by $verified_session_firstname $verified_session_lastname','$d_off2','Active','$date','$doc_code')") or die(mysqli_error($conn));
                                    echo ('success');
                                    }else{
                                    echo ('failed');
                                    }       
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
