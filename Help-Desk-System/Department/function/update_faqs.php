<?php

require_once("../include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');

    if(isset($_POST['id'])&&isset($_POST['title'])&&isset($_POST['shortDesc'])&&isset($_POST['longDesc'])){
        // Object Connection
             date_default_timezone_set("asia/manila");
             $date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
             $id = mysqli_real_escape_string($conn,$_POST['id']);
             $title = mysqli_real_escape_string($conn,$_POST['title']);
             $shortDesc = mysqli_real_escape_string($conn,$_POST['shortDesc']);
             $longDesc = mysqli_real_escape_string($conn,$_POST['longDesc']);
             
        $q_checkcode = $conn->query("SELECT * FROM `hd_department` WHERE `title` = '$title'") or die(mysqli_error($conn));
            $v_checkcode = $q_checkcode->num_rows;
           
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
                  $remarks="update faqs";  
                  //save to the audit trail table
                  mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$title','$ip','$host','$date')")or die(mysqli_error($link));
 
                $conn->query("UPDATE hd_department SET title='$title', shortDesc='$shortDesc', longDesc='$longDesc', date='$date' WHERE id='$id'") or die(mysqli_error($conn));
                echo ('success');
            }
            //end of audit trail
        } 
        
?>
