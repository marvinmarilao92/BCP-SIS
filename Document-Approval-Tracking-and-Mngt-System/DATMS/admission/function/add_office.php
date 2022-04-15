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
				 
	$q_checkcode = $conn->query("SELECT * FROM `datms_office` WHERE `off_name` = '$Office_title'") or die(mysqli_error($conn));
		$v_checkcode = $q_checkcode->num_rows;
		if($v_checkcode == 1){
			echo ('failed');
		}else {
			$conn->query("INSERT INTO `datms_office` VALUES('','$off_code', '$Office_title', '$Office_loc','$date')") or die(mysqli_error($conn));
			echo ('success');
		}
	}
 ?>


