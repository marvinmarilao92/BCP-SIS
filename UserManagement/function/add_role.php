<?php

 require_once("../includes/conn.php");
   
   if(isset($_POST['roletitle'])&&isset($_POST['roledept'])){
    // Object Connection
		 date_default_timezone_set("asia/manila");
		 $date = date("Y-m-d H:i:s",strtotime("+0 HOURS"));
        //  $Office_code = mysqli_real_escape_string($conn,$_POST['offcode']);
         $Role_title = mysqli_real_escape_string($conn,$_POST['roletitle']);
         $Role_dept = mysqli_real_escape_string($conn,$_POST['roledept']);
         		date_default_timezone_set("asia/manila");
            $year = date("Y",strtotime("+0 HOURS"));
            $random_num= rand(10000000,99999999);
            $off_code =  "doc".$year.$random_num;
				 
	$q_checkcode = $conn->query("SELECT * FROM `roles` WHERE `role` = '$Role_title'") or die(mysqli_error($conn));
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
				 $remarks="Program has been created";  
				 //save to the audit trail table
				 mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$Role_title','$ip','$host','$date')")or die(mysqli_error($link));

				 //query action
				 $conn->query("INSERT INTO `roles` VALUES('', '$Role_dept', '$Role_title')") or die(mysqli_error($conn));
				 echo ('success');
			}
		//end of audit trail
		}
	}
 ?>


