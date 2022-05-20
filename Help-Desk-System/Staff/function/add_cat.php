<?php

 require_once("../include/conn.php");
 

   if(isset($_POST['title'])&&isset($_POST['shortDesc'])){
    // Object Connection
		 date_default_timezone_set("asia/manila");
		 $date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
      
         $category = mysqli_real_escape_string($conn,$_POST['title']);
         $description = mysqli_real_escape_string($conn,$_POST['shortDesc']);
		 //$longDesc = mysqli_real_escape_string($conn,$_POST['longDesc']);

            $year = date("Y",strtotime("+0 HOURS"));
            

	$q_checkcode = $conn->query("SELECT * FROM `hdms_category` WHERE `category` = '$category'") or die(mysqli_error($conn));
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
				 $remarks="added category";  
				 //save to the audit trail table
				 mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','','$ip','$host','$date')")or die(mysqli_error($link));

				 //save doctype to the database
				 $conn->query("INSERT INTO `hdms_category` VALUES('','$category', '$description','$date')") or die(mysqli_error($conn));
				 echo ('success');
			}
		//end of audit trail
			
		}
	}
 ?>


