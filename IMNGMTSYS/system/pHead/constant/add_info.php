<?php
    
	require '../control/check-session-login.php';


		if(isset($_POST['submit']))
		{
			function validate($data)
			{
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }	


            $fn = validate($_POST['co_name']);	
            $c_deptt = validate($_POST['c_deptt']);
            $course = validate($_POST['courses']);	
            $level = validate($_POST['level']);
            $position = validate($_POST['position']);
            $dosw = validate($_POST['dosw']);
            $POB = validate($_POST['POB']);
            $DOB = validate($_POST['DOB']);
            $nationality = validate($_POST['nationality']);
            $gender = validate($_POST['gender']);
            $address = validate($_POST['pre_address']);
            $id = $verified_session_username;

            $query = "INSERT INTO ims_basic_coordinator_info(c_fullname,c_department,c_course,c_level,c_position,dobw,c_pob,c_dob,nationality,c_gender,c_paddress,c_number)
            	values('$fn','$c_deptt','$course','$level','$position','$dosw','$POB','$DOB','$nationality','$gender','$address','$id')";

            $run = mysqli_query($link,$query);
            if($run)
            {


        	
      			header("location: ../index.php?success=data added successfully".$url);
	       		

        	}else{

        	}
        	


            }
?>
		