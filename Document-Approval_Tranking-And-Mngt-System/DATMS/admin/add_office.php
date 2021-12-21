<?php

 require_once("include/conn.php");
   
   if(isset($_POST['offcode'])&&isset($_POST['offname'])&&isset($_POST['offloc'])){
    // Object Connection
		 date_default_timezone_set("asia/manila");
		 $date = date("M-d-Y h:i A",strtotime("+0 HOURS"));
         $Office_code = mysqli_real_escape_string($conn,$_POST['offcode']);
         $Office_title = mysqli_real_escape_string($conn,$_POST['offname']);
         $Office_loc = mysqli_real_escape_string($conn,$_POST['offloc']);
         
	$q_checkcode = $conn->query("SELECT * FROM `datms_office` WHERE `off_name` = '$Office_title'") or die(mysqli_error($conn));
		$v_checkcode = $q_checkcode->num_rows;
		if($v_checkcode == 1){
			echo ('failed');
		}else {
			$conn->query("INSERT INTO `datms_office` VALUES('','$Office_code', '$Office_title', '$Office_loc','$date')") or die(mysqli_error($conn));
			echo ('success');
		}
	}
 ?>


