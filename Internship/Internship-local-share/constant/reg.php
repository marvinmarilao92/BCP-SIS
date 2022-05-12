<?php
session_start();






if (isset($_POST['submit'])) {
register_as_stud();
}else{
header("location:../");		
}



function register_as_stud(){
try {

	function validate($data){
	       $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
	}
		require 'config.php';
		require 'univ.php';
		$role = 'coordinator';
		$status = 'pending';
		$s_no = 'CM180'.get_rand_numbers(5).'';
		$i_no = '180'.get_rand_numbers(5).'';

    
  		 
		$email =    validate($_POST['email']);
		$password_1 = validate($_POST['password']);
		$password_2 = validate($_POST['repass']); 
   	$password = md5($password_1);



    if(empty($email) && empty($password_1) && empty($password_2)){
        header("Location: ../register-account.php?error=all fields required, Please try again");
      die();
  	}else if(empty($email)){
        header("Location: ../register-account.php?error=Email must be required, Please try again");
      die(); 
  	}else if(empty($password_1)){
        header("Location: ../register-account.php?error=Password must be required, Please try again");
      die(); 
  	}else if(empty($password_2)){
        header("Location: ../register-account.php?error=Re-type password must be required, Please try again");
      die(); 
  	}else if($password_1 != $password_2){
  		header("Location: ../register-account.php?error=Password did not match, Please try again");
      die(); 
  	}else{

  		$sql = "INSERT INTO ims_user_accounts(id,uid,email,username,password,u_status) VALUES('$i_no','$s_no','$email','$s_no','$password','$status','$role')";
  		$sqlw = "INSERT INTO ims_user_informations(id) VALUES ($i_no)";
   	
   	$run = mysqli_query($conn,$sql) or die(mysqli_error());		
		$runn = mysqli_query($conn,$sqlw) or die(mysqli_error());

   	if($run and $runn){
		header("location: ../request.php?");	  
		}else{

		}

		}



  	}
  	catch(PDOException $e)
    {
    header("location:../register-account.php?p=account&r=4568");
    }
	}














/*if (isset($_POST['reg_user'])) {

	// Receiving the values entered and storing
	// in the variables
	// Data sanitization is done to prevent
	// SQL injections
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

	// Ensuring that the user has not left any input field blank
	// error messages will be displayed for every blank input
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($password_1)) { array_push($errors, "Password is required"); }

	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
		// Checking if the passwords match
	}

	// If the form is error free, then register the user
	if (count($errors) == 0) {
		
		// Password encryption to increase data security
		$password = md5($password_1);
		
		// Inserting data into table
		$query = "INSERT INTO users (username, email, password)
				VALUES('$username', '$email', '$password')";
		
		mysqli_query($db, $query);

		// Storing username of the logged in user,
		// in the session variable
		$_SESSION['username'] = $username;
		
		// Welcome message
		$_SESSION['success'] = "You have logged in";
		
		// Page on which the user will be
		// redirected after logging in
		header('location: index.php');
	}
}*/
?>