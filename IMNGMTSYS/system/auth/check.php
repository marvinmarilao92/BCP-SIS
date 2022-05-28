<?php 
session_start(); 


require '../dbCon/config.php';


            if(isset($_POST['submit'])) {
            function validate($data){
             $data = trim($data);
             $data = stripslashes($data);
             $data = htmlspecialchars($data);
             return $data;
                  }
                   $uname = validate($_POST['uname']);
                   $pass = validate($_POST['password']);
                   $role = 'Student';
                   $role2 = 'Coordinator';
                   $role3 = 'Admin';
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


                        //student
                        $sql = "SELECT *FROM ims_dummy_free_users 
                        INNER JOIN student_information
                        ON 
                        ims_dummy_free_users.id = student_information.id
                        WHERE 
                        ims_dummy_free_users.username='$uname' 
                        AND
                        ims_dummy_free_users.role='$role'";
                        $result = mysqli_query($conn, $sql);
                              
                        //department coordinator
                        $sql2 = "SELECT *FROM ims_dummy_free_users 
                        INNER JOIN ims_department_information
                        ON 
                        ims_dummy_free_users.id = ims_department_information.id
                        WHERE 
                        ims_dummy_free_users.username='$uname' 
                        AND
                        ims_dummy_free_users.role='$role2'";

                        $result2 = mysqli_query($conn, $sql2);


                        //admin
                        $sql3 = "SELECT *FROM ims_dummy_free_users 
                        INNER JOIN ims_admin_information
                        ON 
                        ims_dummy_free_users.id = ims_admin_information.id
                        WHERE 
                        ims_dummy_free_users.username='$uname' 
                        AND
                        ims_dummy_free_users.role='$role3'";

                        $result3 = mysqli_query($conn, $sql3);

                        
            
                             
                        //checking row
                        /**tudent information**/
                        if (mysqli_num_rows($result) > 0) {


                                    //if true execute tong baba
                                    while ($row = mysqli_fetch_assoc($result)) {


                                    //oop var check row ['pass'] ==> db
                                    $oop = password_verify($pass,$row['password']);
                                          //pag ung oop var nag true = 1 execute yan baba true means 1 ,false = 0 => "Location: ../login.php?error=Invalid login, Please try again"
                                          if ($oop == 1)
                                          {
                                                
                                                 
                                                $message = 'access grant';
                                                $encr = password_hash($message, PASSWORD_DEFAULT);
                                                $_SESSION['logged'] = true;
                                                $_SESSION['id'] = $row['id'];
                                                $_SESSION['num'] = $row['id_number'];
                                                $_SESSION['role'] = $row['role'];
                                                $_SESSION['fname'] = $row['firstname'];
                                                $_SESSION['mname'] = $row['middlename'];
                                                $_SESSION['lname'] = $row['lastname'];
                                                $_SESSION['email'] = $row['email'];
                                                $_SESSION['contact'] = $row['contact'];
                                                $_SESSION['course'] = $row['course'];  
                                                $_SESSION['level'] = $row['year_level'];
                                                $_SESSION['address'] = $row['address'];
                                                $_SESSION['dp'] = $row['stud_img'];
                                                $_SESSION['section'] = $row['section'];
                                                $_SESSION['yl'] = $row['school_year'];

                                                //for logs
                                                $fname = $_SESSION ['fname']; 
                                                $id = $_SESSION['id'];
                                                $num = $_SESSION['num'];
                                                $remarks = "account has been logged in";
                                                 mysqli_query($conn, "INSERT INTO internship_audit_trail(user,action,role,id) VALUES('$fname','$remarks','$role','$num')") or die(mysqli_error($conn));

                                                header("location: ../x/index.php?success=".$encr);
                                                




                                          }
                                          else{
                                                header("Location: ../index.php?error=Invalid login, Please try again");
                                                die();
                                          }
                                    }
                        }

                        //coordinator
                        else if (mysqli_num_rows($result2) > 0)
                        {
                              
                                                

                              while ($row2 = mysqli_fetch_assoc($result2)) {


                                    //oop var check row ['pass'] ==> db
                                    $oop2 = password_verify($pass,$row2['password']);
                                          //pag ung oop var nag true = 1 execute yan baba true means 1 ,false = 0 => "Location: ../login.php?error=Invalid login, Please try again"
                                          if ($oop2 == 1)
                                          {
                                          

                                                $message = 'access grant';
                                                $encr = md5($message);
                                                $encri = sha1($encr);
                                                $f = sha1($encri);
                                                $jk = sha1($role);
                                                $d = password_hash($encr, PASSWORD_DEFAULT);
                                                $url = $d."key".$encr.""."".$encri."".$f."".$jk;
                                                $_SESSION['logged'] = true;
                                                $_SESSION['id'] = $row2['id'];
                                                $_SESSION['id_number'] = $row2['id_num'];
                                                $_SESSION['role2'] = $row2['role'];
                                                $_SESSION['username'] = $row2['username'];
                                                $_SESSION['fname'] = $row2['firstname'];
                                                $id = $_SESSION['id'];
                                                $fname = $_SESSION['fname'];
                                                $num = $_SESSION['id_number'];
                                                $_SESSION['mname'] = $row2['middlename'];
                                                $_SESSION['lname'] = $row2['lastname'];
                                                $_SESSION['email'] = $row2['email'];
                                                $_SESSION['co_avatar'] = $row2['co_avatar'];
                                                $_SESSION['gender'] = $row2['gender'];
                                                $_SESSION['d_acronyy'] = $row2['d_acrony'];
                                                $_SESSION['contact'] = $row2['contact'];
                                                $_SESSION['dept_name'] = $row2['dept_name'];
                                                $_SESSION['civil_status'] = $row2['civil_status'];
                                                $_SESSION['dob'] = $row2['dob'];
                                                $_SESSION['nationality'] = $row2['nationatlity'];
                                                $_SESSION['religion'] = $row2['religion'];
                                                $_SESSION['URL'] = $url;
                                                header("location: ../y/?subno_key=".$url);

                                                $remarks = "account has been logged in";
                                                mysqli_query($conn, "INSERT INTO internship_audit_trail(user,action,role,id) VALUES('$fname','$remarks','$role2','$num')") or die(mysqli_error($conn));
                                          }
                                          else{
                                                header("Location: ../index.php?error=Invalid login, Please try again");
                                                die();
                                          }
                                    }




                        }

                        //adminstrator
                        else if (mysqli_num_rows($result3) > 0)
                        {


                              while ($row3 = mysqli_fetch_assoc($result3)) {


                                    //oop var check row ['pass'] ==> db
                                    $oop3 = password_verify($pass,$row3['password']);
                                          //pag ung oop var nag true = 1 execute yan baba true means 1 ,false = 0 => "Location: ../login.php?error=Invalid login, Please try again"
                                          if ($oop3 == 1)
                                          {
                                         
                                                $message = 'access grant';
                                                $encr = md5($message);
                                                $encri = sha1($encr);
                                                $f = sha1($encri);
                                                $jk = sha1($role);
                                                $d = password_hash($encr, PASSWORD_DEFAULT);
                                                $url = $d."key".$encr.""."".$encri."".$f."".$jk;
                                                $_SESSION['logged'] = true;
                                                $_SESSION['id'] = $row3['id'];
                                                $_SESSION['num'] = $row3['a_number'];
                                                $_SESSION['ad_role'] = $row3['role'];
                                                $_SESSION['ad_fname'] = $row3['fname'];
                                                $_SESSION['ad_mname'] = $row3['mname'];
                                                $_SESSION['ad_lname'] = $row3['lname'];
                                                $_SESSION['ad_email'] = $row3['email'];
                                                $_SESSION['dp'] = $row2['myavatar'];
                                                $_SESSION['URL'] = $url;
                                                header("location: ../z/index.php?subno_key=".$url);
                                                //for logs
                                                $fname = $_SESSION ['ad_fname']; 
                                                $id = $_SESSION['num'];

                                                $remarks = "account has been logged in";
                                                 mysqli_query($conn, "INSERT INTO internship_audit_trail(user,action,role,id) VALUES('$fname','$remarks','$role3','$id')") or die(mysqli_error($conn));
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


                        }}




                        else{
                        header("Location: system/..");
                        die();
                        }

?>