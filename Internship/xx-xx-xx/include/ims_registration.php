<?php
	session_start();
	include_once 'config.php';

	
	
	if(isset($_POST['submit'])){

		$ims_fname = mysqli_real_escape_string($link,$_POST['ims_fname']);
		$ims_cname = mysqli_real_escape_string($link,$_POST['ims_cname']);
		$ims_email = mysqli_real_escape_string($link,$_POST['ims_email']);
		$ims_username = mysqli_real_escape_string($link,$_POST['ims_username']);
		$ims_password = mysqli_real_escape_string($link,$_POST['ims_password']);
		$ims_doc = mysqli_real_escape_string($link,$_POST['ims_doc']);

		
		$sql = "INSERT INTO ims_accounts(ims_fname,ims_cname,ims_email,ims_username,ims_password,ims_doc,ims_status) values ('$ims_fname','$ims_cname','$ims_email','$ims_username','$ims_password','$ims_doc','PENDING')";
        	
        	$run = mysqli_query($link,$sql) or die(mysqli_error());

			if($run){
				header("Location: ../request.php?=#verify");	
			}
			else{
				echo 'Something went wrong!';
			}}

?>