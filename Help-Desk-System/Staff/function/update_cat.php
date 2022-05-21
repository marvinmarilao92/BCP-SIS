<?php

require_once("../include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');

    if(isset($_POST['id'])&&isset($_POST['title'])&&isset($_POST['shortDesc'])){
        // Object Connection
             date_default_timezone_set("asia/manila");
             $date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
             $id = mysqli_real_escape_string($conn,$_POST['id']);
             $category = mysqli_real_escape_string($conn,$_POST['title']);
             $description = mysqli_real_escape_string($conn,$_POST['shortDesc']);
             //$longDesc = mysqli_real_escape_string($conn,$_POST['longDesc']);
             
        $q_checkcode = $conn->query("SELECT * FROM `hdms_category` WHERE `category` = '$category'") or die(mysqli_error($conn));
            $v_checkcode = $q_checkcode->num_rows;
            if($v_checkcode == 1){
                echo ('failed');
            }else {
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
                  $remarks="Updated Category";  
                  //save to the audit trail table
                  mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','','$ip','$host','$date')")or die(mysqli_error($link));
 
                $conn->query("UPDATE hdms_category SET category='$category', description='$description', date='$date' WHERE id='$id'") or die(mysqli_error($conn));
                echo ('success');
            }
            //end of audit trail
        } 
        }
?>
