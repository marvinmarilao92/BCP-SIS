<?php

 require_once("../include/conn.php");

   if(isset($_POST['remarks'])&&isset($_POST['req_code'])&&isset($_POST['docu'])&&isset($_POST['studid'])&&isset($_POST['req_act'])){
    // Object Connection
		 date_default_timezone_set("asia/manila");
		 $date = date("Y-m-d H:i:s",strtotime("+0 HOURS"));
        //  $Dt_code = mysqli_real_escape_string($conn,$_POST['dtcode']);
         $R_remarks = mysqli_real_escape_string($conn,$_POST['remarks']);
         $R_code = mysqli_real_escape_string($conn,$_POST['req_code']);
				 $R_docu = mysqli_real_escape_string($conn,$_POST['docu']);
				 $R_studid = mysqli_real_escape_string($conn,$_POST['studid']);
				 $R_actor = mysqli_real_escape_string($conn,$_POST['req_act']);

	$q_checkcode = $conn->query("SELECT * FROM `datms_tempreq` WHERE `req_code` = '$R_code'") or die(mysqli_error($conn));
		$v_checkcode = $q_checkcode->num_rows;
		if($v_checkcode != 1){
			echo ('failed');
		}else {
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
				$remarks="Request for $R_docu has been rejected";  
				//save to the audit trail table
				mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$R_studid','$ip','$host','$date')")or die(mysqli_error($link));

				//save doctype to the database
				$conn->query("UPDATE datms_tempreq SET status='Rejected', remarks='$R_remarks', actor='$R_actor', date='$date' WHERE req_code='$R_code'") or die(mysqli_error($conn));

				$conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
				VALUES ('$verified_session_firstname $verified_session_lastname', '0' ,'','0','Request Rejected','You rejected request for $R_docu','$verified_session_office','Active','$date')") or die(mysqli_error($conn));

				//notif of students              
				$conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
				VALUES ('', '0' ,'$R_studid','0','Request Rejected','Your $R_docu is Rejected by $verified_session_firstname $verified_session_lastname','$verified_session_office','Active','$date')") or die(mysqli_error($conn));   

				echo ('success');
			}
		//end of audit trail
			
		}
	}
 ?>


