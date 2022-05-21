<?php

date_default_timezone_set('Asia/Manila');

            if(isset($_POST['submit']))
            {
                register_as_company();
            }else{
				

            }

			include_once 'config.php';
if(isset($_FILES['uploaded_file'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
        // Connect to the database
        
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
 
        // Gather all required data
        $name = $link->real_escape_string($_FILES['uploaded_file']['name']);
        $mime = $link->real_escape_string($_FILES['uploaded_file']['type']);
        $data = $link->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $size = intval($_FILES['uploaded_file']['size']);
 
        // Create the SQL query
        $query = "
            INSERT INTO `file` (
                `name`, `mime`, `size`, `data`, `created`
            )
            VALUES (
                '{$name}', '{$mime}', {$size}, '{$data}', NOW()
            )";
 
        // Execute the query
        $result = $link->query($query);
 
        // Check if it was successfull
        if($result) {
            echo 'Success! Your file was successfully added!';
        }
        else {
            echo 'Error! Failed to insert the file'
               . "<pre>{$link->error}</pre>";
        }
    }

    
    else {
        echo 'An error accured while the file was being uploaded. '
           . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    }
 
    // Close the mysql connection
    $link->close();
	}
else {
    echo 'Error! A file was not sent!';
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
				 $autogen_reg = 'CO150'.get_rand_numbers(5).'';
				
				 $date = date('d-m-Y h:i A ');
				 $i_no = '10'.get_rand_numbers(3).'';

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
				$sql = "INSERT INTO ims_company_account(id,company,email,username,password)
						values('$i_no','$fname','$email','$autogen_reg','$password')";

				$sqld = "INSERT INTO ims_company_information(id,cpy_name)
						 values('$i_no','$fname')";

                $runi = mysqli_query($conn,$sql) or die(mysqli_error());
                $run2 = mysqli_query($conn,$sqld) or die(mysqli_error());
					
				
				if($runi && $run2)
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
?>