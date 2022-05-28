<?php

	
	require '../../dbCon/config.php';
	



	if(isset($_POST['post']))
	{
			date_default_timezone_set('Asia/Manila');
		require '../control/check-session-login.php';
		function validate($data)
						{
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    	}



                    	$date = date('d-m-Y h:i A ');
                    	$post = validate($_POST['posting']);



                    	$sql =  "INSERT INTO ims_department_post (post,pdate,user_post,p_role,c_id)
                    			 values ('$post','$date','$fnamee','$rolee','$num')";

                    	$pst = mysqli_query($conn,$sql);

                    	if($pst)
                    	{ header("Location: ../index.php?success=posted succcess");
          				    die(); }
                    	else
                    	{ echo "Error: " . $sql . "<br>" . mysqli_error($conn); }







	}
	else
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}






?>