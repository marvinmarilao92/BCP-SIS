	<?php
	
	include_once'config.php';
	

	
	if(isset($_POST['UPDATE'])) {
		
		$idS = $_POST['update_id'];
		$cemail = $_POST['cemail'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$status = $_POST['status'];
		$query = "UPDATE ims_users SET ims_status='$status' WHERE id='$idS'";
		$run = mysqli_query($link,$query);

		if($run)
		{
			header("location: ../data.php?t_#show=update");	
			exit();
		}else{

		}
	}

	
	
?>