<?php

 require_once("include/conn.php");
   
   if(isset($_POST['save'])){
    // Object Connection
         $Office_code = mysqli_real_escape_string($conn,$_POST['offcode']);
         $Office_title = mysqli_real_escape_string($conn,$_POST['offtitle']);
         $Office_loc = mysqli_real_escape_string($conn,$_POST['offloc']);
         

	$q_checkcode = $conn->query("SELECT * FROM `datms_office` WHERE `off_code` = '$Office_code'") or die(mysqli_error($conn));
		$v_checkcode = $q_checkcode->num_rows;
		if($v_checkcode == 1){
			echo '
				<script type = "text/javascript">
					alert("Office code is currently in use");
					window.location = "create_office.php";
				</script>
			';
		}else {
			$conn->query("INSERT INTO `datms_office` VALUES('','$Office_code', '$Office_title', '$Office_loc')") or die(mysqli_error($conn));
			echo '<script type = "text/javascript">
					alert("Office is successfully saved");
					window.location = "create_office.php";
				  </script>';
		}
	}	


 ?>
  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>

