<?php
	session_start();
	include_once 'config.php';
	

	
	if(isset($_POST['update'])) {
		
		$idS = $_POST['update_id'];
		
		$namee = $_POST['fname'];
		$company = $_POST['company'];
		$statuss = $_POST['status'];
		$query = "UPDATE ims_user_accounts SET fname='$namee', cname='$company' , status='$statuss' WHERE id = '$idS' ";
		$run = mysqli_query($link,$query);

		if($run)
		{
			header("Location: ../account-data.php?t_#show=update");	
		}else{

		}
	}

	
	
?>