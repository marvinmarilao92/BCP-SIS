<?php

 require_once("../includes/conn.php");
   
   if(isset($_POST['id_no'])&&isset($_POST['prog'])&&isset($_POST['docs'])&&isset($_POST['reason'])){
    // Object Connection
		date_default_timezone_set("asia/manila");
		$date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));

		$stud_id = mysqli_real_escape_string($conn,$_POST['id_no']);
		$program = mysqli_real_escape_string($conn,$_POST['prog']);
		$docu = mysqli_real_escape_string($conn,$_POST['docs']);
		$res = mysqli_real_escape_string($conn,$_POST['reason']);

		$random_num= rand(10000000,99999999);
		$req_code =  "req".$random_num;
				 
		$q_checkcode = $conn->query("SELECT * FROM `datms_tempreq` WHERE `docu` = '$docu' AND status = 'Sent'") or die(mysqli_error($conn));
		$v_checkcode = $q_checkcode->num_rows;
		if($v_checkcode == 1){
			echo ('failed');
		}else {
		//create audit trail record
			//add session conncetion
			include('../includes/session.php');
			$fname='Student'; 
			if (!empty($_SERVER["HTTP_CLIENT_IP"])){
				$ip = $_SERVER["HTTP_CLIENT_IP"];
			}elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
				$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			}else{
				$ip = $_SERVER["REMOTE_ADDR"];
				$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
				 $remarks="Request has been sent to registrar department";  
				 //save to the audit trail table
				 mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$program','$ip','$host','$date')")or die(mysqli_error($link));

				 //query action
				 $conn->query("INSERT INTO `datms_tempreq` VALUES('','$req_code', '$verified_session_username', '$program','$docu','Sent','$res','$date','')") or die(mysqli_error($conn));

					//notif of students  
					$conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
					VALUES ('', '0' ,'$verified_session_username','0','Request Submitted','You successfully Submit your request for $docu','$program','Active','$date')") or die(mysqli_error($conn));

					//notif of employee              
					$conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
					VALUES ('Registrar Department', '0' ,'','0','Incoming Request','You have incoming request for $docu','$program','Active','$date')") or die(mysqli_error($conn));  
				 echo ('success');
			}
		//end of audit trail
		}
	}
 ?>


