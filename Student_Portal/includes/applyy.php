<?php



		if(isset($_POST['submit']) && isset($_FILES['uploaded_file']))
		{
			//calling function
			apply_intern();

		}

			else{

			}
		function apply_intern()
		{
			//start
			try{

				//function to avoid sql injection
				function validate($data){
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
			 	}

			 	//calling dbconnection
			 	require 'session.php';


				//variables
				$sname = validate($_POST['sname']);
				$fname = validate($_POST['fname']);
				$mname = validate($_POST['mname']);
				$address = validate($_POST['address']);
				$zipcode = validate($_POST['zipcode']);
				$email = validate($_POST['email']);
				$contact = validate($_POST['contact']);
				$s_dept = validate($_POST['s_dept']);
				$s_course = validate($_POST['s_course']);
				$section = validate($_POST['section']);
				$category = validate($_POST['category']);
				$skills = validate($_POST['skills']);
				$s_lvl = validate($_POST['s_lvl']);
				$describe = validate($_POST['desc']);

				//date
				 date_default_timezone_set("asia/manila");
				 $date = date('d-m-Y h:i A ');
				//id number
				 $sid = $verified_session_username;
				 $status = 'Pending';
				//files	
				$name = $link->real_escape_string($_FILES['uploaded_file']['name']);
		        $mime = $link->real_escape_string($_FILES['uploaded_file']['type']);
		        $data = $link->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
		        $size = intval($_FILES['uploaded_file']['size']);


		        //query
		        $query = "INSERT INTO ims_apply_info(sname,fname,mname,address,zipcode,email,contact,s_dept,s_course,section,status,lvl,datee_cre,s_number)
		        		  values('$sname','$fname','$mname','$address','$zipcode','$email','$contact','$s_dept','$s_course','$section','$status','$s_lvl','$date','$sid')";


		       	$query2 = "INSERT INTO ims_category_list(s_number,category)VALUES('$sid','$category')";

		       	$result = mysqli_query($link,$query) or die(mysqli_error());
		       	$result2 = mysqli_query($link,$query2) or die(mysqli_error());



		       	//insertion
		       	if($result && $result2)
		       	{		
		       		//stud_skills
		       		mysqli_query($link,"INSERT INTO ims_skill_list(s_number,s_skill,s_desc)
		       							VALUES('$sid','$skills','$describe')")or die (mysqli_error($link));

		       		//stud_files
		       		mysqli_query($link,	"INSERT INTO `ims_stud_files` (`s_number`,`name`, `mime`, `size`, `data`, `d_upload`)
		            VALUES ('{$sid}','{$name}', '{$mime}', '{$size}', '{$data}', NOW())") or die(mysqli_error($link));


		          	header("location: ../index.php?success");

		       	}
		       	else
		       	{
		       			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		       	}	
		       
			}

			//end
			catch(PDOException $e)
			{

			}
		}



?>