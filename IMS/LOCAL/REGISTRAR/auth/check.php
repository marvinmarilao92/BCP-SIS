<?php 
include 'auth/config.php';


                  if(isset($_POST['submit'])    ) {
                        function validate($data){
                              $data = trim($data);
                              $data = stripslashes($data);
                              $data = htmlspecialchars($data);
                              return $data;
                        }
                  
                        $uname = validate($_POST['uname']);
                        $pass = validate($_POST['password']);
                        $role = 'Cashier';

                        $sql = "SELECT *FROM ims_dummy_free_users 
                        INNER JOIN ims_cashier_information 
                        ON 
                        ims_dummy_free_users.id = ims_cashier_information.id
                        WHERE 
                        ims_dummy_free_users.username ='$uname' 
                        AND 
                        ims_dummy_free_users.role ='$role'";

                        $result = mysqli_query($conn, $sql);
  
                        //checking row
                        if(mysqli_num_rows($result) > 0) {
                                    //if true execute tong baba
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    //oop var check row ['pass'] ==> db
                                    $oop = password_verify($pass,$row['password']);
                                          //pag ung oop var nag true = 1 execute yan baba true means 1 ,false = 0 => "Location: ../login.php?error=Invalid login, Please try again"
                                          if ($oop == 1)
                                          {
                                                session_start();
                                                $_SESSION['logged'] = true;
                                                $_SESSION['pass'] = $row['password'];
                                                $_SESSION['username'] = $row['username'];
                                                $_SESSION['full'] = $row['fullname'];
                                                $_SESSION['role'] = $row['role'];
                                                $_SESSION['dp'] = $row['myavatar'];
                                                $_SESSION['email'] = $row['email'];
                                                $_SESSION['fname'] = $row['fname'];
                                                $_SESSION['mname'] = $row['mname'];
                                                $_SESSION['lnamee'] = $row['lname'];
                                                $_SESSION['dob'] = $row['dob'];
                                                $_SESSION['gender'] = $row['gender'];
                                                $_SESSION['status'] = $row['c_status'];
                                                $_SESSION['citizenship'] = $row['citizenship'];
                                                $_SESSION['add'] = $row['address'];
                                                $_SESSION['zip'] = $row['zipcode'];
                                                header("location: ../");
                                                die();
                                          }
                                          else{
                                                header("Location: ../login.php?error=Invalid login, Please try again");
                                                die();
                                          }
                                    }
                        }
                        else{
                              header("Location: ../login.php?error=Invalid login, Please try again");
                              die();
                        }
                        
                  }
                  else{
                  header("Location: system/..");
                  die();
                  }

?>