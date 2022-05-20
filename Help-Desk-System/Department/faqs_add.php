<?php

$conn = new mysqli("localhost","root","","sis_db");
		// connection for online server
		//$conn = new mysqli("localhost","u692894633_test","+KoB[b#KI2","u692894633_test_db");
$rowID = $conn->real_escape_string($_POST['rowID']);

		date_default_timezone_set("asia/manila");
		$date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
		$title = $conn->real_escape_string($_POST['title']);
		$shortDesc = $conn->real_escape_string($_POST['shortDesc']);
		$longDesc = $conn->real_escape_string($_POST['longDesc']);
	
if ($_POST['key'] == 'addNew') {
			$sql = $conn->query("SELECT id FROM hd_department WHERE title = '$title'");
			if ($sql->num_rows > 0)
				exit("Faqs with This title Already Exists!");
			else {

					//create audit trail record
						//add session conncetion
						include('session.php');
						$fname=$verified_session_role; 
						if (!empty($_SERVER["HTTP_CLIENT_IP"])){
							$ip = $_SERVER["HTTP_CLIENT_IP"];
						}elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
							$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
						}else{
							$ip = $_SERVER["REMOTE_ADDR"];
							$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
							 $remarks="Faqs has been added";  
							 //save to the audit trail table
							 mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$title','$ip','$host','$date')")or die(mysqli_error($link));
			
							 //query action
							 $conn->query("INSERT INTO hd_department (title, shortDesc, longDesc) 
							 VALUES ('$title', '$shortDesc', '$longDesc')");
				 			exit('faqs Has Been Inserted!');
			 }
						}
					//end of audit trail
		}
		
		