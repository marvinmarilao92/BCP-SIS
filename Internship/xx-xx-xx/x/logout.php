<?php
	session_start();
	if(isset($_SESSION['id'])){
	session_destroy();
	header("location: ../192.168.254.254/..");
  	
	}else
	{
		header("location: ../192.168.254.254/..");
  	die();
	}
  	

?>