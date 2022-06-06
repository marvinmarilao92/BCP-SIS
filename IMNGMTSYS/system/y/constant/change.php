<?php
	
	include_once '../control/check-session-login.php';
	

	
	if(isset($_POST['updateid'])) {
		
		$idS = $_POST['update_id'];	
		$stat = $_POST['status'];
		$num = $_POST['number'];
        date_default_timezone_set("asia/manila");
		$date = date('d-m-Y h:i A ');
        $reason =  $_POST['rname'];

     	
		$query = "UPDATE ims_apply_info 
				  SET status = '$stat' , reason = '$reason' , u_date = '$date'
				  WHERE s_number ='$num'";


		$run = mysqli_query($link,$query) or die(mysqli_error());


		if($run)
		{
				$fname=$fnamee.' '.$lnamee;
				$ip = $_SERVER["REMOTE_ADDR"];
	      		$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	      		$role = $rolee;
				$remarks = $reason;	
	      	 mysqli_query($link, "INSERT INTO internship_audit_trail(user,action,role,id,account_no,ip,host) VALUES('$fname','$remarks','$rolee	','$getID','$verified_session_username','$ip','$host')") or die(mysqli_error($link));
				header("location: ../pending.php?");	

		}else{



		}
	}

	
	
?>