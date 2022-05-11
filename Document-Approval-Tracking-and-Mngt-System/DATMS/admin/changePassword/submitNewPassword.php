<?php session_start();
  include('../session.php');
  require_once("../include/conn.php");

  // echo $_SESSION["USER_NEW_PASSOWORD"];
  if($_SESSION["USER_NEW_PASSOWORD"] != '' &&  $_SESSION['session_username'] != ''){
    date_default_timezone_set("asia/manila");
    $date = date("Y-m-d H:i:s",strtotime("+0 HOURS"));
    $id = $_SESSION['session_username'];
    $password = password_hash($_SESSION["USER_NEW_PASSOWORD"], PASSWORD_BCRYPT, array('cost' => 12));  //PASSWORD_ARGON2I//PASSWORD_ARGON2ID
    //create audit trail record
			//add session conncetion
			$fname=$verified_session_role; 
			if (!empty($_SERVER["HTTP_CLIENT_IP"])){
				$ip = $_SERVER["HTTP_CLIENT_IP"];
			}elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
				$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			}else{
				$ip = $_SERVER["REMOTE_ADDR"];
				$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
				 $remarks="Your password has been changed";  
				 //save to the audit trail table
				 mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$Office_title','$ip','$host','$date')")or die(mysqli_error($link));

				 //query action
				 $conn->query("UPDATE users SET `password`='$password', `date`='$date' WHERE 	`id_number`='$id'") or die(mysqli_error($conn));
         $conn->query("INSERT INTO `used_password` VALUES('','$id', '$password')") or die(mysqli_error($conn));
				 $_SESSION['session_pass'] = $_SESSION["USER_NEW_PASSOWORD"];
			}
		//end of audit trail
  }

 ?>
