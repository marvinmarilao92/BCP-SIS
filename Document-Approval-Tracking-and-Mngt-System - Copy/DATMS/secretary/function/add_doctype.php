<?php

 require_once("../include/conn.php");
   
   if(isset($_POST['dtcode'])&&isset($_POST['dtname'])&&isset($_POST['dtdesc'])){
    // Object Connection
		 date_default_timezone_set("asia/manila");
		 $date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));
         $Dt_code = mysqli_real_escape_string($conn,$_POST['dtcode']);
         $Dt_name = mysqli_real_escape_string($conn,$_POST['dtname']);
         $Dt_desc = mysqli_real_escape_string($conn,$_POST['dtdesc']);
         
	$q_checkcode = $conn->query("SELECT * FROM `datms_doctype` WHERE `dt_name` = '$Dt_name'") or die(mysqli_error($conn));
		$v_checkcode = $q_checkcode->num_rows;
		if($v_checkcode == 1){
			echo ('failed');
		}else {
			$conn->query("INSERT INTO `datms_doctype` VALUES('','$Dt_code', '$Dt_name', '$Dt_desc','$date')") or die(mysqli_error($conn));
			echo ('success');
		}
	}
 ?>


