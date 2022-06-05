<?php
	
	include_once '../control/check-session-login.php';
	

	
	if(isset($_POST['updatee'])) {
		
		$idS = $_POST['update_id'];	
		$statuss = $_POST['status'];
        $num = $_POST['number'];
        $fname = $_POST['name'];
		$query = "UPDATE ims_appy_info SET status = '$statuss' WHERE id ='$idS'";
		$run = mysqli_query($link,$query);
		if($run)
		{
			
			
			$fname=$fnamee.' '.$lnamee;
			$ip = $_SERVER["REMOTE_ADDR"];
      		$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
			mysqli_query($link, "INSERT INTO ims_ql_status(rid,id_number,i_name)values('$id','$num','$fname')");
				$remarks="Changed intern status into Qualified";  
	       		mysqli_query($link, "INSERT INTO internship_audit_trail(user,action,role,id,account_no,ip,host) VALUES('$fname','$remarks','$rolee	','$getID','$verified_session_username','$ip','$host')") or die(mysqli_error($link));
				header("Location: ../pending.php?");	

		}else{



		}
	}

	
	
?>