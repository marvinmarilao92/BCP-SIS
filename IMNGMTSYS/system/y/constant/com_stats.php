<?php 

	
	include_once '../control/check-session-login.php';


	if(isset($_POST['companyedit']))

	{


			$idS = $_POST['com_id'];
			$statuss = $_POST['cstatus'];	
	        $num = $_POST['companyid'];
	        $fname = $_POST['rname'];
	        $reason = $_POST['reason'];
	        date_default_timezone_set("asia/manila");
			$date = date('d-m-Y h:i A ');
			$query = "UPDATE ims_company_regis
					  SET c_status='$statuss',  reason = '$reason' , u_date = '$date'
					  WHERE username ='$num'";
			$run = mysqli_query($link,$query);
			if($run)
			{
				//
				
				$fname=$fnamee.' '.$lnamee;
				$ip = $_SERVER["REMOTE_ADDR"];
	      		$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	      		$role = $rolee;
				  $remarks = $reason;	
	       mysqli_query($link, "INSERT INTO internship_audit_trail(user,action,role,id,account_no,ip,host) VALUES('$fname','$remarks','$rolee	','$getID','$verified_session_username','$ip','$host')") or die(mysqli_error($link));
				header("Location: ../registered-accounts.php?");	
			}else{

		}
	}



	


?>



