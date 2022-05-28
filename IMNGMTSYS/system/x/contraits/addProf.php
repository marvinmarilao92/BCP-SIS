<?php

	
	if (isset($_POST['submit']))
	{
		toFiles();
		
	
	}
	else
	{

	}
	
	function toFiles()
	{
		require '../../dbCon/config.php';
        require '../control/check-session-login.php';
		try{

						function validate($data)
						{
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    	}
                    	$stu = validate($_POST['skills']);
                   	    $pyf = validate($_POST['course']);
                    	

                    	$stucat = validate($_POST['stud_cat']);
                   	   

                   	    $sql = "INSERT INTO `ims_category_list` (`cid`, `category`, `id`) VALUES ( NULL,'$stucat', '$id')";
                   	  
                   	   
                   	    $result = mysqli_multi_query($conn,$sql);
                   	   

                   	    if($result) // if true
                   	    {	
                   	    		// insert data to another table
                   	    		 mysqli_query($conn, "INSERT INTO ims_student_skills_list(id, course, skills, ids) 
                   	    		 					VALUES(NULL, '$pyf', '$stu', '$id')") or die(mysqli_error($link));

                   	    		//stmt message
                   	    		header("Location: ../../x/index.php?success=Data Inserted, Thank You !");
      				    		die();
                   	    }
                   	    else
                   		 {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    	}




		}
		catch(PDOException $e)
		{

		}
	
	}
	

?>