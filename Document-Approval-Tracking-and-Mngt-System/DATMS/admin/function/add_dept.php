<?php

 require_once("../include/conn.php");
   
   if(isset($_POST['offname'])&&isset($_POST['offloc'])){
    // Object Connection
		 date_default_timezone_set("asia/manila");
		 $date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
        //  $Office_code = mysqli_real_escape_string($conn,$_POST['offcode']);
         $Office_title = mysqli_real_escape_string($conn,$_POST['offname']);
         $Office_loc = mysqli_real_escape_string($conn,$_POST['offloc']);
         		date_default_timezone_set("asia/manila");
            $year = date("Y",strtotime("+0 HOURS"));
            $random_num= rand(10000000,99999999);
            $off_code =  "doc".$year.$random_num;
				 
	$q_checkcode = $conn->query("SELECT * FROM `datms_dept` WHERE `off_name` = '$Office_title'") or die(mysqli_error($conn));
		$v_checkcode = $q_checkcode->num_rows;
		if($v_checkcode == 1){
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
				 $remarks="department has been created";  
				 //save to the audit trail table
				 mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$Office_title','$ip','$host','$date')")or die(mysqli_error($link));

				 //query action
				 $conn->query("INSERT INTO `datms_dept` VALUES('','$off_code', '$Office_title', '$Office_loc','$date')") or die(mysqli_error($conn));
				 echo ('success');
			}
		//end of audit trail
		}
	}
 ?>


