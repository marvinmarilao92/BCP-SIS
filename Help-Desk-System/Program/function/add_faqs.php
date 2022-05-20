<?php

 require_once("../include/conn.php");
 

   if(isset($_POST['title'])&&isset($_POST['shortDesc'])&&isset($_POST['longDesc'])){
    // Object Connection
		 date_default_timezone_set("asia/manila");
		 $date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
        //  $Dt_code = mysqli_real_escape_string($conn,$_POST['dtcode'])
         $title = mysqli_real_escape_string($conn,$_POST['title']);
         $shortDesc = mysqli_real_escape_string($conn,$_POST['shortDesc']);
		 $longDesc = mysqli_real_escape_string($conn,$_POST['longDesc']);

            $year = date("Y",strtotime("+0 HOURS"));
            

	$q_checkcode = $conn->query("SELECT * FROM `hd_department` WHERE `title` = '$title'") or die(mysqli_error($conn));
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
				 $remarks="add new faqs";  
				 //save to the audit trail table
				 mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$title','$ip','$host','$date')")or die(mysqli_error($link));

				 //save doctype to the database
				 $conn->query("INSERT INTO `hd_department` VALUES('','$title', 'Registrar', '$longDesc','$date')") or die(mysqli_error($conn));
				 echo ('success');
			}
		//end of audit trail
			
		}
	}
 ?>


