<?php 
include 'config.php';

function validate($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
}
                  if(isset($_POST['submit'])) {

  
                   $uname = validate($_POST['uname']);
                   $pass = validate($_POST['password']);
                   $role = 'Admin';
                        $sql = "SELECT *FROM ims_dummy_free_users 
                        INNER JOIN ims_admin_information
                        ON 
                        ims_dummy_free_users.id = ims_admin_information.id
                        WHERE 
                        ims_dummy_free_users.username='$uname' 
                        AND
                        ims_dummy_free_users.role='$role'";

                        $result = mysqli_query($conn, $sql);
  
                        //checking row
                        if (mysqli_num_rows($result) > 0) {
                                    //if true execute tong baba
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    //oop var check row ['pass'] ==> db
                                    $oop = password_verify($pass,$row['password']);
                                          //pag ung oop var nag true = 1 execute yan baba true means 1 ,false = 0 => "Location: ../login.php?error=Invalid login, Please try again"
                                          if ($oop == 1)
                                          {
                                                session_start();
                                                $_SESSION['logged'] = true;
                                                $_SESSION['num'] = $row['a_id'];
                                                $_SESSION['role'] = $row['role'];
                                                $_SESSION['fname'] = $row['fname'];
                                                $_SESSION['mname'] = $row['mname'];
                                                $_SESSION['lname'] = $row['lname'];
                                                $_SESSION['dp'] = $row['myavatar'];
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