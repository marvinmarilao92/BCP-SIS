<?php
	date_default_timezone_set('Asia/Manila');
	$current_year = date("y");
	if(isset($_POST['submit'])){
         $type = "Registrar"; 
		 $stype = "Student";
		 $ctype = "Coordinator";
		 $cm = "Company";
		 $a = "Admin";
		 $ca = "Cashier";
         if ( $type == $_POST['role'])
         {
           register_as_DUMMY_registrar();
         }
         else if ( $stype == $_POST['role'])
		 {
			register_as_DUMMY_student();
		 }
		 else if ( $ctype == $_POST['role']	)
		 {
			register_as_coordinator();
		 }
		 else if ( $cm == $_POST['role']){
			company();

		 }
		 else if ( $a == $_POST['role'])
		 {
			 admin();
		 }
		 else if ($ca == $_POST['role'])
		 {
			register_as_DUMMY_cashier();
		 }
		 else 
		 {
           
		 }
		}else{
			/* -----  */
		}
        

		// Account for Coordinator

		function register_as_coordinator()
		{
			try
			{
				function validate($data){
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
			 	}

				 require 'config.php';	
			  	 require 'uniq.php';
				 $autogen_reg = 'CO150'.get_rand_numbers(5).'';
				 $type = $_POST['role'];
				 $date = date('d-m-Y h:i A ');
				 $i_no = '10'.get_rand_numbers(3).'';

				$fname =       	validate($_POST['fname']);
				$email =       	validate($_POST['email']);
				$password_1 =  	validate($_POST['password']);
				$password_2 = 	validate($_POST['retype']); 
				$password = PASSWORD_HASH($password_1, PASSWORD_DEFAULT);
				if ($password_1 != $password_2)
				{
					header("Location: ../index.php?error=Password did not match, Please try again");
      				die();
				}
				else
				{
				$sql = "INSERT INTO ims_dummy_free_users(id,fullname,email,username,password,role)
									   			values('$i_no','$fname','$email','$autogen_reg','$password','$type')";
				$sqld = "INSERT INTO ims_deptco_info(id,id_number,firstname)values('$i_no','$autogen_reg','$fname')";

                $run = mysqli_query($conn,$sql) or die(mysqli_error());
                $run2 = mysqli_query($conn,$sqld) or die(mysqli_error());
					
				
				if($run && $run2)
				{
					
					
					echo '<br>';
					echo '<h1>Account Details </h1>';
					echo '<br>';
					echo "Please copy ur autogen Username ! ";
					echo '<br>';
					echo "Hello ur auto generated username : ".$autogen_reg;
					echo '<br>';
					echo "Account Created : ".$date;
					echo '<br>';
					echo '<br>';
					echo '<a href = "../">back to Register </a>';
					echo '</table>';
					
					die();
				}
				else{
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				}
			}
			catch(PDOException $e)
		    {
				
		    }

		}

		//ACCOUNT FOR STUDENT

		function register_as_DUMMY_student()
		{
			try
			{
				function validate($data){
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
			 	}

				 require 'config.php';	
			  	 require 'uniq.php';
				 $autogen_reg = 'S'.$current_year.'0'.get_rand_numbers(5).'';
				 $type = $_POST['role'];
				 $date = date('d-m-Y h:i A ');
				 $i_no = '10'.get_rand_numbers(3).'';

				$fname =       validate($_POST['fname']);
				$email =       validate($_POST['email']);
				$password_1 =  validate($_POST['password']);
				$password_2 = validate($_POST['retype']); 
				$password = PASSWORD_HASH($password_1, PASSWORD_DEFAULT);
				if ($password_1 != $password_2)
				{
					header("Location: ../index.php?error=Password did not match, Please try again");
      				die();
				}
				else
				{
				$sql = "INSERT INTO ims_dummy_free_users(id,fullname,email,username,password,role)
									   			values('$i_no','$fname','$email','$autogen_reg','$password','$type')";
				$sqld = "INSERT INTO student_information(id,id_number,firstname)values('$i_no','$autogen_reg','$fname')";

                $run = mysqli_query($conn,$sql) or die(mysqli_error());
                $run2 = mysqli_query($conn,$sqld) or die(mysqli_error());
					
				
				if($run && $run2)
				{
					
					
					echo '<br>';
					echo '<h1>Account Details </h1>';
					echo '<br>';
					echo "Please copy ur autogen Username ! ";
					echo '<br>';
					echo "Hello ur auto generated username : ".$autogen_reg;
					echo '<br>';
					echo "Account Created : ".$date;
					echo '<br>';
					echo '<br>';
					echo '<a href = "../">back to Register </a>';
					echo '</table>';
					
					die();
				}
				else{
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				}
			}
			catch(PDOException $e)
		    {
				
		    }

		}
      //ACCOUNT FOR CASHIER

      function register_as_DUMMY_cashier()
		{
			try{
				function validate($data){
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
			 }
				require 'config.php';	
			  	require 'uniq.php';
				$autogen_reg = 'CA180'.get_rand_numbers(5).'';
				$type = $_POST['role'];
				$date = date('d-m-Y h:i A ');
				$i_no = '170'.get_rand_numbers(5).'';


				$fname =       validate($_POST['fname']);
				$email =       validate($_POST['email']);
				$password_1 =  validate($_POST['password']);
				$password_2 = validate($_POST['retype']); 
				$password = PASSWORD_HASH($password_1, PASSWORD_DEFAULT);
				if ($password_1 != $password_2)
				{
					header("Location: ../index.php?error=Password did not match, Please try again");
      				die();
				}
				else
				{
				$sql = "INSERT INTO ims_dummy_free_users(id,fullname,email,username,password,role)
									   			values('$i_no','$fname','$email','$autogen_reg','$password','$type')";
				$sqld = "INSERT INTO ims_cashier_information(id,fname)values('$i_no','$fname')";

                $run = mysqli_query($conn,$sql) or die(mysqli_error());
                $run2 = mysqli_query($conn,$sqld) or die(mysqli_error());
					
				
				if($run && $run2)
				{
					
					echo '<br>';
					echo '<h1>Account Details </h1>';
					echo '<br>';
					echo "Please copy ur autogen Username ! ";
					echo '<br>';
					echo "Hello ur auto generated username : ".$autogen_reg;
					echo '<br>';
					echo "Account Created : ".$date;
					echo '<br>';
					echo '<br>';
					echo '<a href = "../">back to Register </a>';
					die();
				}
				else{
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				}
			}
			catch(PDOException $e)
		    {
		    
		    }
		}

      //ACCOUNT FOR REGISTRAR
		function register_as_DUMMY_registrar()
		{
			try{
				function validate($data){
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
			 }
				require 'config.php';	
			  	require 'uniq.php';
				$date = date('d-m-Y h:i A ');
				$autogen_reg = 'R180'.get_rand_numbers(5).'';
				$type = $_POST['role'];
				$i_no = '180'.get_rand_numbers(5).'';


				$fname =       validate($_POST['fname']);
				$email =       validate($_POST['email']);
				$password_1 =  validate($_POST['password']);
				$password_2 = validate($_POST['retype']); 
				$password = PASSWORD_HASH($password_1, PASSWORD_DEFAULT);
				if ($password_1 != $password_2)
				{
					header("Location: ../index.php?error=Password did not match, Please try again");
      				die();
				}
				else
				{
					$sql = "INSERT INTO ims_dummy_free_users(id,fullname,email,username,password,role)
					values('$i_no','$fname','$email','$autogen_reg','$password','$type')";
						$sqld = "INSERT INTO ims_registrar_information(id,fname)values('$i_no','$fname')";

						$run = mysqli_query($conn,$sql) or die(mysqli_error());
						$run2 = mysqli_query($conn,$sqld) or die(mysqli_error());
				
				if($run and $run2)
				{
					
					echo '<br>';
					echo '<h1>Account Details </h1>';
					echo '<br>';
					echo "Please copy ur autogen Username ! ";
					echo '<br>';
					echo "Hello ur auto generated username : ".$autogen_reg;
					echo '<br>';
					echo "Account Created : ".$date;
					echo '<br>';
					echo '<br>';
					echo '<a href = "../">back to Register </a>';
					die();
					
				}
				else{

				}
				}
			}
			catch(PDOException $e)
		    {
		    header("location:../request.php?");
		    }
		}
?>