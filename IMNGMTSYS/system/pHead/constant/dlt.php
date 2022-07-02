<?php

		require '../control/check-session-login.php';

		if(isset($_POST['delete']))
		{
			if(isset($_POST['id']))
			{
				foreach ($_POST['id'] as $id)
				{
					$query = "DELETE ims_company_regis,ims_department_information,ims_files
					FROM ims_company_regis
                   	LEFT JOIN 
                    ims_department_information
                    ON
                    ims_department_information.id = ims_company_regis.id
                   	LEFT JOIN ims_files
                    ON 
                    ims_files.uid = ims_company_regis.id
                    WHERE 
                    ims_company_regis.id = '$id'";

            		 $querytt = mysqli_query($link,$query);

             if($querytt)
             {
             	header("location: ../registered-accounts.php?id=".$url);
             	
             }
             else{
             	echo 'error';
             }
				}
			}
		}





?>

