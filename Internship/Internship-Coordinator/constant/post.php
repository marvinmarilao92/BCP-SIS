
<?php

session_start();



if (isset($_POST['submit'])) {
as_post();
}else{
header("location:../");		
}




function as_post()
{		
		

		try{

	    require 'config.php';
	    require 'univ.php';
		$desc = ucfirst($_POST['desc']);
		$title  = ucwords($_POST['title']);
	    $city  = ucwords($_POST['city']);
	    $country = $_POST['country'];
		$postdate = date('F d, Y');
		$p_no = 'PO'.get_rand_numbers(10).'';
        




		$sql = "INSERT INTO tbl_post (post_id,title,city,country,description,date_posted) 
						VALUES ('$p_no','$title','$city','$country','$desc','$postdate')";
   	
   		$run = mysqli_query($conn,$sql) or die(mysqli_error());



   		if($run){
		header("location: ../posting.php?success=Posted successfully");	  
		}else{

		}

		}catch(Exception $e){

		}
}


?>
