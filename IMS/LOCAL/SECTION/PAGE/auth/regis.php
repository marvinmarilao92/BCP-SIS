<?php



if(isset($_POST['submit']) && isset($_FILES['submit'])){

	register_as_company();

}else{

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
				 $autogen_reg = 'COM120'.get_rand_numbers(4).'';
				 $type = $_POST['role'];
				 $date = date('d-m-Y h:i A ');
				 $i_no = '10'.get_rand_numbers(3).'';
				 $name = $conn->real_escape_string($_FILES['uploaded_file']['name']);
				 $mime = $conn->real_escape_string($_FILES['uploaded_file']['type']);
				 $data = $conn->real_escape_string(file_get_contents($_FILES ['uploaded_file']['tmp_name']));
				 $size = intval($_FILES['uploaded_file']['size']);
				 
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
				$sql = "INSERT INTO ims_user_comp_information(uid,email,com_user,com_pass)
									   			values('$i_no','$email','$autogen_reg','$password','$type')";
				$sqld = "
				INSERT INTO `file` (
					`id`, `name`, `mime`, `size`, `data`, `created`
				)
				VALUES (
					'{$$_ino}','{$name}', '{$mime}', {$size}, '{$data}', NOW()
				)";

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

?>