<?php
	session_start();
	include_once '../../dbCon/bonak.php';
	

	
	if(isset($_POST['update'])) {
		
		$idS = $_POST['update_id'];
		$statuss = $_POST['status'];
        $num = $_POST['number'];
        $fname = $_POST['name'];
		$query = "UPDATE ims_studcreen_status SET s_number='$num',s_status = '$statuss' WHERE sid ='$idS'";
		$run = mysqli_query($link,$query);
		if($run)
		{
			header("Location: ../pending.php?");	
		}else{

		}
	}

	
	
?>