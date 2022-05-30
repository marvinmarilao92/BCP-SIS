<?php

			date_default_timezone_set('Asia/Manila');

            if(isset($_POST['submit']))
            {
                register_as_company();
            }
			else{
				

            }

			
			
			
			
 
            function register_as_company()
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
				 $autogen_reg = 'COM150'.get_rand_numbers(5).'';
				
				$date = date('d-m-Y h:i A ');
				$i_no = '10'.get_rand_numbers(3).'';
				
				$stutus = 'Pending';
				$fname =       	validate($_POST['companyname']);
				$email =       	validate($_POST['emailad']);
				$password_1 =  	validate($_POST['password']);
				$password_2 =   validate($_POST['re_pass']); 
				$password = PASSWORD_HASH($password_1, PASSWORD_DEFAULT);
				if ($password_1 != $password_2)
				{
					header("Location: ../index.php?error=Password did not match, Please try again");
      				die();
				}
				else
				{
				$sql = "INSERT INTO ims_company_account(id,company,email,username,password,status)
						values('$i_no','$fname','$email','$autogen_reg','$password','status')";

				$sqld = "INSERT INTO ims_company_information(id,cpy_name)
						 values('$i_no','$fname')";

                $runi = mysqli_query($conn,$sql) or die(mysqli_error());
                $run2 = mysqli_query($conn,$sqld) or die(mysqli_error());
					
				
				if($runi && $run2)
				{
					
					
					
					header("location: ../request.php");
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
?>