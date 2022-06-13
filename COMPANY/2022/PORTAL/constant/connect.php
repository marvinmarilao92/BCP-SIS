<?php 
session_start();
require 'connection.php';

	if(isset($_POST['submit']))
	{
	

			function validate($data)
			{
		         $data = trim($data);
		         $data = stripslashes($data);
		         $data = htmlspecialchars($data);
		         return $data;
            }
                   

            		//input textfield
                   $uname = validate($_POST['uname']);
                   $pass = validate($_POST['password']);		
                   $role = 'coordinator';


                   	 if(empty($uname) && empty($pass)) {
                  //user and pass empty
                       header("Location: ../?error=Both fields is required, Please try again");
                       die();
                  }
                  else if (empty($uname)) {
                      //user field empty
                      header("Location: ../?error=Username must be required, Please try again");
                      die();
                  }else if(empty($pass)){
                  //password field empty
                  header("Location: ../?error=Password must be required, Please try again");
                  die(); 
                  }else{

                            $as='Approved';
                  			$sql = "SELECT *FROM ims_company_regis 
	                        INNER JOIN ims_department_information
	                        ON 
	                        ims_company_regis.id = ims_department_information.id
	                        WHERE 
	                        ims_company_regis.username='$uname' 
	                        AND
	                        ims_department_information.role='$role'
                            AND ims_company_regis.c_status = '$as'";

	                        $result = mysqli_query($link, $sql);

	                        if(mysqli_num_rows($result) > 0) {

	                        	while ($row = mysqli_fetch_assoc($result)) {

	                        			 $oop = password_verify($pass,$row['password']);

	                        			 if ($oop == 1)
                                          {
                                                
                                                $message = 'access grant';
                                                $encr = md5($message);
                                                $encri = sha1($encr);
                                                $f = sha1($encri);
                                                $jk = sha1($role);
                                                $d = password_hash($encr, PASSWORD_DEFAULT);
                                                $url = $d."key".$encr.""."".$encri."".$f."".$jk;
                                                $_SESSION['logged'] = true;
                                                $_SESSION['id'] = $row['id'];
                                                $_SESSION['id_number'] = $row['id_number'];
                                                $_SESSION['role'] = $row['role'];
                                                $_SESSION['username'] = $row2['username'];
                                                $_SESSION['fname'] = $row['firstname'];
                                                $id = $_SESSION['id'];
                                                $fname = $_SESSION['fname'];
                                                $num = $_SESSION['id_number'];
                                                $_SESSION['mname'] = $row['middlename'];
                                                $_SESSION['lname'] = $row['lastname'];


                                                $_SESSION['email'] = $row['email'];
                                                $_SESSION['co_avatar'] = $row['co_avatar'];
                                                $_SESSION['gender'] = $row['gender'];
                                                $_SESSION['d_acronyy'] = $row['d_acrony'];
                                                $_SESSION['contact'] = $row['contact'];
                                                $_SESSION['dept_name'] = $row['dept_name'];
                                                $_SESSION['civil_status'] = $row['civil_status'];
                                                $_SESSION['dob'] = $row['dob'];
                                                $_SESSION['nationality'] = $row['nationatlity'];
                                                $_SESSION['address'] = $row['address'];
                                                $_SESSION['row'] = $row['row'];
                                                $_SESSION['religion'] = $row['religion'];
                                                $_SESSION['postition'] = $row['position'];
                                                $_SESSION['religion'] = $row['religion'];
                                                $_SESSION['URL'] = $url;
                                                header("location: ../y/?subno_key=".$url);

                                                //for logs
                                                $fname = $_SESSION ['fname']; 
                                                $id = $_SESSION['id'];
                                                $num = $_SESSION['id_number'];
                                                $remarks = "account has been logged in";
                                                 mysqli_query($link, "INSERT INTO internship_audit_trail(user,action,role,id,account_no) VALUES('$fname','$remarks','$role','$id','$num')") or die(mysqli_error($link));

                                                header("location: ../login.php?success=".$url);
                                                




                                          }
                                          else{
                                                header("Location: ../index.php?error=Invalid login, Please try again");
                                                die();
                                          }
	                        	}
	                        }
	                        else{
                              header("Location: ../index.php?error=Invalid login, Please try again");
                              die();
                       		 }



                  }


	}

	else
	{
	

			

    }
    

    


			



?>