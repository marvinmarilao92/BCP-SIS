<?php



if(isset($_POST['submit']) && isset($_FILES['uploaded_file'])){

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
			 		
			  	//FILES
			 	$name = $conn->real_escape_string($_FILES['uploaded_file']['name']);
		        $mime = $conn->real_escape_string($_FILES['uploaded_file']['type']);
		        $data = $conn->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
		        $size = intval($_FILES['uploaded_file']['size']);




				 $autogen_reg = 'COM120'.get_rand_numbers(4).'';
				
				 $status = 'Pending';
				 date_default_timezone_set("asia/manila");
				 $date = date('d-m-Y h:i A ');
				 $i_no = '10'.get_rand_numbers(3).'';
				
				 
				$cname =       	validate($_POST['cname']);
				$rname =       	validate($_POST['rname']);	
				
				$caddress =       	validate($_POST['caddress']);
				
				$cemail = validate($_POST['cemail']);

				$password_1 =  	validate($_POST['password']);
				$password_2 = 	validate($_POST['re_pass']); 
				$password = PASSWORD_HASH($password_1, PASSWORD_DEFAULT);
				


				

				$fname =       	validate($_POST['fname']);
				$mname =       	validate($_POST['midname']);	
				$lname =       	validate($_POST['lname']);
				$paddress =       	validate($_POST['presentadd']);
				$contact =       	validate($_POST['contact']);	
				$email =       	validate($_POST['r_email']);
				$gender =       	validate($_POST['gender']);
				$position =			validate($_POST['position']);

				$role = 'coordinator';
				if ($password_1 != $password_2)
				{
					header("Location: ../index.php?error=Password did not match, Please try again");
      				die();
				}
				else
				{

				$sql = "INSERT INTO ims_company_regis(id,c_name,repre_name,c_address,c_email,username,password,c_status)
									   			values('$i_no','$cname','$rname','$caddress','$cemail','$autogen_reg','$password','$status')";

				$sql2 = "INSERT INTO ims_department_information (id,id_number,firstname,middlename,lastname,address,contact,email,gender,position,role)values('$i_no','$autogen_reg','$fname','$mname','$lname','$paddress','$contact','$email','$gender','$position','$role')";
				

		        
				
                $run = mysqli_query($conn,$sql) or die(mysqli_error());

				$run2 = mysqli_query($conn,$sql2) or die(mysqli_error());
				if($run && $run2)
				{	
					 
					mysqli_query($conn,	"INSERT INTO `ims_files` (`uid`,`name`, `mime`, `size`, `data`, `created`)
		            VALUES ('{$i_no}','{$name}', '{$mime}', '{$size}', '{$data}', NOW())") or die(mysqli_error($conn));
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