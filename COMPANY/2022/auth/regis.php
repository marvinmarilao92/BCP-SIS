<?php



if(isset($_POST['submit'])){

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
				 $role = 'coordinator';
				 $status = 'Pending';
				 $dater = date('d-m-Y h:i A ');
				 $i_no = '10'.get_rand_numbers(3).'';
				
				 
				$cname =       	validate($_POST['cname']);
				$rname =       	validate($_POST['rname']);	
				$repname =       	validate($_POST['rname']);
				$caddress =       	validate($_POST['caddress']);
				$pno =       	validate($_POST['pno']);
				$cemail = validate($_POST['cemail']);
				$password_1 =  	validate($_POST['password']);
				$password_2 = 	validate($_POST['re_pass']); 
				$password = PASSWORD_HASH($password_1, PASSWORD_DEFAULT);
				if ($password_1 != $password_2)
				{
					header("Location: ../index.php?error=Password did not match, Please try again");
      				die();
				}
				else
				{
				$sql = "INSERT INTO ims_company_regis(id,c_name,repre_name,c_address,phone,c_email,username,password,c_status,datee)
									   			values('$i_no','$cname','$rname','$caddress','$pno','$cemail','$autogen_reg','$password','$status','$dater')";
				
				$sql1 = "INSERT INTO ims_department_information(id,role)values('$i_no','$role')";

                $run = mysqli_query($conn,$sql) or die(mysqli_error());
                $ru2 = mysqli_query($conn,$sql1) or die(mysqli_error());
					
				
				if($run && $ru2)
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