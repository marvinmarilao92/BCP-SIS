<!-- Login PHP Function -->
<?php
require_once "config.php";
session_start();
$error = "";
if (isset($_SESSION['session_url'])) {
  header("location: " . $_SESSION['session_url'] . "");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $time = time() - 70;
  $ip_address = getIpAddr();
  // Getting total count of hits on the basis of IP
  $query = mysqli_query($link, "select count(*) as total_count from login_attempts where attempt_time > $time and ip_address='$ip_address'");
  $check_login_row = mysqli_fetch_assoc($query);
  $total_count = $check_login_row['total_count'];

  //Checking if the attempt 3, or youcan set the no of attempt her. For now we taking only 3 fail attempted
  if ($total_count == 3) {
    $error = "To many failed login attempts. Please login after 60 sec.";
  } else {
    // username and password sent from form
    date_default_timezone_set("asia/manila");
    $date = date("Y-m-d H:i:s", strtotime("+0 HOURS"));
    $myusername = mysqli_real_escape_string($link, $_POST['username']);
    $mypassword = mysqli_real_escape_string($link, $_POST['password']);

    $sql = mysqli_query($link, "SELECT * FROM users WHERE id_number = '$myusername'") or die(mysqli_error($link));
    //used to retreive login key form user table

    if ($row = mysqli_fetch_array($sql)) {
      $_SESSION['login_key'] = $row["login_key"];
    } else {
      $error = "No login key registered";
    }

    $count = mysqli_num_rows($sql);
    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($count == 0) {
      //this is used to identify the numbers of attempts
      $total_count++;
      $rem_attm = 3 - $total_count;
      if ($rem_attm == 0) {
        $error = "To many failed login attempts. Please login after 60 sec.";
      } else {
        $error = "Your Username or Password is invalid. remaining attempts: $rem_attm  ";
        // $error="Your Username or Password is invalid.";
      }
      $try_time = time();
      //used to adding ip address record for login attempts
      mysqli_query($link, "insert into login_attempts(ip_address,attempt_time) values('$ip_address','$try_time')");
    } else {
      //password checking
      if (password_verify($mypassword, $row["password"])) {
        //Check department and role
        $_SESSION['session_pass'] = $mypassword;
        $sql1 = "SELECT * FROM user_information WHERE id_number = '$myusername' AND account_status='Active'";
        if ($result1 = mysqli_query($link, $sql1)) {
          if (mysqli_num_rows($result1) > 0) {
            while ($row1 = mysqli_fetch_array($result1)) {
              $id = $row1['id'];
              $admin = $row1['id_number'];
              $fname = $row1['role'];
              switch ($row1["department"]) {
                case "Clearance System":
                  //statement
                  switch ($row1["role"]) {
                    case "Clearance Administrator":
                      //statement
                      $_SESSION['session_username'] = $myusername;
                      $_SESSION['session_url'] = "Clearance/clearance-administrator/index?id=" . $_SESSION["login_key"] . "";
                      if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                        $ip = $_SERVER["HTTPS_CLIENT_IP"];
                      } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                      } else {
                        $ip = $_SERVER["REMOTE_ADDR"];
                        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                        $remarks = "account has been logged in";
                        mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                        //used to delete ip address record for login attempts
                        mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                        //calling php file for new login_key
                        require_once "core/update_key.php";
                        //update login key
                        $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                        header("location: Clearance/clearance-administrator/index?id=" . $_SESSION["login_key"] . "");
                      }
                      break;

                    default:
                      //statement
                      // Attempt select query execution
                      $sqll = "SELECT * FROM roles WHERE department_id = 4";
                      if ($resultt = mysqli_query($link, $sqll)) {
                        if (mysqli_num_rows($resultt) > 0) {

                          while ($roww = mysqli_fetch_array($resultt)) {
                            if ($row1["role"] == $roww["role"]) {
                              $_SESSION['session_username'] = $myusername;
                              $_SESSION['session_url'] = "Clearance/clearance-coordinator/index?id=" . $_SESSION["login_key"] . "";
                              if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                                $ip = $_SERVER["HTTPS_CLIENT_IP"];
                              } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                                $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                              } else {
                                $ip = $_SERVER["REMOTE_ADDR"];
                                $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                                $remarks = "account has been logged in";
                                mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                                //used to delete ip address record for login attempts
                                mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                                //calling php file for new login_key
                                require_once "core/update_key.php";
                                //update login key
                                $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                                header("location: Clearance/clearance-coordinator/index?id=" . $_SESSION["login_key"] . "");
                              }
                            }
                          }
                          // Free result set
                          mysqli_free_result($resultt);
                        }
                      }
                      break;
                  }
                  break;
                case "Guidance and Counselling":
                  //statement
                  break;
                    
                case "OJT System":
                  //statement
                  switch ($row1["role"]) {
                    case "Internship Admin":
                      //statement
                      $_SESSION['session_username'] = $myusername;
                      $_SESSION['session_url'] = "IMNGMTSYS/z/index?id=" . $_SESSION["login_key"] . "";
                      if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                        $ip = $_SERVER["HTTPS_CLIENT_IP"];
                      } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                      } else {
                        
                        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                        $remarks = "account has been logged in";
                        $fnames=  $ad_fname.' '.$ad_lname; 
                        mysqli_query($link, "INSERT INTO internship_audit_trail(user,action,role,id,account_no,ip,host) VALUES('$fname','$remarks','$fname','$id','$admin','$ip','$host')") or die(mysqli_error($link));
                        mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                        //used to delete ip address record for login attempts
                        mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                        //calling php file for new login_key
                        require_once "core/update_key.php";
                        //update login key
                        $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                        header("location: IMNGMTSYS/system/z/index?id=" . $_SESSION["login_key"] . "");
                      }

                      break;
                    case "Internship Coordinator":  
                      //statement
                      
                  $encr = md5($rolee);
                  $encri = sha1($encrr);
                  $f = sha1($encri);
                  $jk = sha1($verified_session_role);
                  $d = password_hash($encr, PASSWORD_DEFAULT);
                  $url = $d."key".$encr.""."".$encri."".$f."".$jk;
                  $_SESSION['hehe'] = $url;
                      $_SESSION['session_username'] = $myusername;
                      $_SESSION['session_url'] = "IMNGMTSYS/y/index?id=" . $_SESSION["login_key"] . "";

                      if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                        $ip = $_SERVER["HTTPS_CLIENT_IP"];
                      } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                      } else {

                        $ip = $_SERVER["REMOTE_ADDR"];
                        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                        $remarks = "account has been logged in";
                        $fnamewe= $fnamee.' '.$lnamee;  
                        $role = $rolee;

                        mysqli_query($link, "INSERT INTO internship_audit_trail(user,action,role,id,account_no,ip,host) VALUES('$fnamewe','$remarks','$fname','$id','$admin','$ip','$host')") or die(mysqli_error($link));
                        mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                        //used to delete ip address record for login attempts
                        mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                        //calling php file for new login_key
                        require_once "core/update_key.php";
                        //update login key
                        $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                        header("location: IMNGMTSYS/system/y/index?id=" . $_SESSION['hehe'] . "");
                      }

                      break;
                      case "Internship Company":
                        //statement
                        $_SESSION['session_username'] = $myusername;
                        $_SESSION['session_url'] = "IMNGMTSYS/w/login/index?id=" . $_SESSION["login_key"] . "";
                        if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                          $ip = $_SERVER["HTTPS_CLIENT_IP"];
                        } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                          $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                        } else {
                          $ip = $_SERVER["REMOTE_ADDR"];
                          $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                          $remarks = "account has been logged in";
                          mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                          //used to delete ip address record for login attempts
                          mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                          //calling php file for new login_key
                          require_once "core/update_key.php";
                          //update login key
                          $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                          header("location: IMNGMTSYS/w/login/index?id=" . $_SESSION["login_key"] . "");
                        }
  
                        break;
                  }
                  break;

                case "Help Desk System":
                  //statement ROLE
                  switch($row1["role"]){
                    case "Help Desk Administrator":
                      //statement
                      $_SESSION['session_username'] = $myusername;
                      $_SESSION['session_url'] = "Help-Desk-System/Admin/index?id=".$_SESSION["login_key"]."";
                      if (!empty($_SERVER["HTTPS_CLIENT_IP"])){
                          $ip = $_SERVER["HTTPS_CLIENT_IP"];
                        }elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])){
                          $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                        }else{
                          $ip = $_SERVER["REMOTE_ADDR"];
                          $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                            $remarks="account has been logged in";  
                            mysqli_query($link,"INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')")or die(mysqli_error($link));
                            //used to delete ip address record for login attempts
                            mysqli_query($link,"delete from login_attempts where ip_address='$ip_address'");
                            //calling php file for new login_key
                            require_once "core/update_key.php";
                            //update login key
                            $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                            header("location: Help-Desk-System/Admin/index?id=".$_SESSION["login_key"]."");
                            
                        }
                      
                      break;
                    case "Staff":
                      //statement
                      $_SESSION['session_username'] = $myusername;
                      $_SESSION['session_url'] = "Help-Desk-System/Staff/index?id=".$_SESSION["login_key"]."";
                      if (!empty($_SERVER["HTTPS_CLIENT_IP"])){
                          $ip = $_SERVER["HTTPS_CLIENT_IP"];
                        }elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])){
                          $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                        }else{
                          $ip = $_SERVER["REMOTE_ADDR"];
                          $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                            $remarks="account has been logged in";  
                            mysqli_query($link,"INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')")or die(mysqli_error($link));
                            //used to delete ip address record for login attempts
                            mysqli_query($link,"delete from login_attempts where ip_address='$ip_address'");
                            //calling php file for new login_key
                            require_once "core/update_key.php";
                            //update login key
                            $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                            header("location: Help-Desk-System/Staff/index.php?id=".$_SESSION["login_key"]."");
                        }
                      
                      break;
                      case "hdms Cashier":
                        //statement
                        $_SESSION['session_username'] = $myusername;
                      $_SESSION['session_url'] = "Help-Desk-System/Cashier/index?id=".$_SESSION["login_key"]."";
                        if (!empty($_SERVER["HTTPS_CLIENT_IP"])){
                            $ip = $_SERVER["HTTPS_CLIENT_IP"];
                          }elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])){
                            $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                          }else{
                            $ip = $_SERVER["REMOTE_ADDR"];
                            $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                              $remarks="account has been logged in";  
                              mysqli_query($link,"INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')")or die(mysqli_error($link));
                              //used to delete ip address record for login attempts
                              mysqli_query($link,"delete from login_attempts where ip_address='$ip_address'");
                              //calling php file for new login_key
                              require_once "core/update_key.php";
                              //update login key
                              $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                              header("location: Help-Desk-System/Cashier/index.php?id=".$_SESSION["login_key"]."");
                          }
                        
                        break;
                        case "hdms Admission":
                          //statement
                          $_SESSION['session_username'] = $myusername;
                          $_SESSION['session_url'] = "Help-Desk-System/Admission/index?id=".$_SESSION["login_key"]."";
                          if (!empty($_SERVER["HTTPS_CLIENT_IP"])){
                              $ip = $_SERVER["HTTPS_CLIENT_IP"];
                            }elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])){
                              $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                            }else{
                              $ip = $_SERVER["REMOTE_ADDR"];
                              $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                                $remarks="account has been logged in";  
                                mysqli_query($link,"INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')")or die(mysqli_error($link));
                                //used to delete ip address record for login attempts
                                mysqli_query($link,"delete from login_attempts where ip_address='$ip_address'");
                                //calling php file for new login_key
                                require_once "core/update_key.php";
                                //update login key
                                $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                                header("location: Help-Desk-System/Admission/index.php?id=".$_SESSION["login_key"]."");
                            }
                          
                          break;
                    
              
                      case "hdms Accounting":
                        //statement
                        $_SESSION['session_username'] = $myusername;
                        $_SESSION['session_url'] = "Help-Desk-System/Department/index?id=".$_SESSION["login_key"]."";
                        if (!empty($_SERVER["HTTPS_CLIENT_IP"])){
                            $ip = $_SERVER["HTTPS_CLIENT_IP"];
                          }elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])){
                            $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                          }else{
                            $ip = $_SERVER["REMOTE_ADDR"];
                            $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                            $remarks="account has been logged in";  
                            mysqli_query($link,"INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')")or die(mysqli_error($link));
                            //used to delete ip address record for login attempts
                            mysqli_query($link,"delete from login_attempts where ip_address='$ip_address'");
                            //calling php file for new login_key
                            require_once "core/update_key.php";
                            //update login key
                            $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                            header("location: Help-Desk-System/Department/index?id=".$_SESSION["login_key"]."");
                          }                            
                        break;

                      case "hdms Registrar":
                        //statement
                        $_SESSION['session_username'] = $myusername;
                        $_SESSION['session_url'] = "Help-Desk-System/Program/index?id=".$_SESSION["login_key"]."";
                        if (!empty($_SERVER["HTTPS_CLIENT_IP"])){
                            $ip = $_SERVER["HTTPS_CLIENT_IP"];
                          }elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])){
                            $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                          }else{
                            $ip = $_SERVER["REMOTE_ADDR"];
                            $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                            $remarks="account has been logged in";  
                            mysqli_query($link,"INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')")or die(mysqli_error($link));  
                            //used to delete ip address record for login attempts
                            mysqli_query($link,"delete from login_attempts where ip_address='$ip_address'");
                            //calling php file for new login_key
                            require_once "core/update_key.php";
                            //update login key
                            $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                             header("location: Help-Desk-System/Program/index?id=".$_SESSION["login_key"]."");                         
                          }                            
                        break;                        
                  }
                  break;
                  case "SuperUser":
                    //statement role
                    switch ($row1["role"]) {
                      case "SuperAdmin":
                        //statement
                        $_SESSION['session_username'] = $myusername;
                        $_SESSION['session_url'] = "super_admin/index?id=" . $_SESSION["login_key"] . "";
                        if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                          $ip = $_SERVER["HTTPS_CLIENT_IP"];
                        } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                          $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                        } else {
                          $ip = $_SERVER["REMOTE_ADDR"];
                          $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                          $remarks = "account has been logged in";
                          mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                          //used to delete ip address record for login attempts
                          mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                          //calling php file for new login_key
                          require_once "core/update_key.php";
                          //update login key
                          $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                          header("location: super_admin/index?id=" . $_SESSION["login_key"] . "");
                        }
                        break;
                    }
                    break;
                case "DATMS":
                  //statement ROLE
                  switch ($row1["role"]) {
                    case "Registrar Administrator":
                      //statement
                      $_SESSION['session_username'] = $myusername;
                      $_SESSION['session_url'] = "Document-Approval-Tracking-and-Mngt-System/DATMS/admin/index?id=" . $_SESSION["login_key"] . "";
                      if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                        $ip = $_SERVER["HTTPS_CLIENT_IP"];
                      } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                      } else {
                        $ip = $_SERVER["REMOTE_ADDR"];
                        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                        $remarks = "account has been logged in";
                        mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                        //used to delete ip address record for login attempts
                        mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                        //calling php file for new login_key
                        require_once "core/update_key.php";
                        //update login key
                        $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                        header("location: Document-Approval-Tracking-and-Mngt-System/DATMS/admin/index?id=" . $_SESSION["login_key"] . "");
                      }

                      break;
                    case "Registrar Approver":
                      //statement
                      $_SESSION['session_username'] = $myusername;
                      $_SESSION['session_url'] = "Document-Approval-Tracking-and-Mngt-System/DATMS/approver/index?id=" . $_SESSION["login_key"] . "";
                      if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                        $ip = $_SERVER["HTTPS_CLIENT_IP"];
                      } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                      } else {
                        $ip = $_SERVER["REMOTE_ADDR"];
                        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                        $remarks = "account has been logged in";
                        mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                        //used to delete ip address record for login attempts
                        mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                        //calling php file for new login_key
                        require_once "core/update_key.php";
                        //update login key
                        $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                        header("location: Document-Approval-Tracking-and-Mngt-System/DATMS/approver/index?id=" . $_SESSION["login_key"] . "");
                      }

                      break;
                    case "Assistant Registrar":
                      //statement
                      $_SESSION['session_username'] = $myusername;
                      $_SESSION['session_url'] = "Document-Approval-Tracking-and-Mngt-System/DATMS/assistant/index?id=" . $_SESSION["login_key"] . "";
                      if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                        $ip = $_SERVER["HTTPS_CLIENT_IP"];
                      } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                      } else {
                        $ip = $_SERVER["REMOTE_ADDR"];
                        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                        $remarks = "account has been logged in";
                        mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                        //used to delete ip address record for login attempts
                        mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                        //calling php file for new login_key
                        require_once "core/update_key.php";
                        //update login key
                        $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                        header("location: Document-Approval-Tracking-and-Mngt-System/DATMS/assistant/index?id=" . $_SESSION["login_key"] . "");
                      }

                      break;
                    case "Registrar Officer":
                      //statement
                      $_SESSION['session_username'] = $myusername;
                      $_SESSION['session_url'] = "Document-Approval-Tracking-and-Mngt-System/DATMS/officer/index?id=" . $_SESSION["login_key"] . "";
                      if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                        $ip = $_SERVER["HTTPS_CLIENT_IP"];
                      } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                      } else {
                        $ip = $_SERVER["REMOTE_ADDR"];
                        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                        $remarks = "account has been logged in";
                        mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                        //used to delete ip address record for login attempts
                        mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                        //calling php file for new login_key
                        require_once "core/update_key.php";
                        //update login key
                        $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                        header("location: Document-Approval-Tracking-and-Mngt-System/DATMS/officer/index?id=" . $_SESSION["login_key"] . "");
                      }
                      break;

                    case "Cashier":
                      //statement
                      $_SESSION['session_username'] = $myusername;
                      $_SESSION['session_url'] = "Document-Approval-Tracking-and-Mngt-System/DATMS/cashier/index?id=" . $_SESSION["login_key"] . "";
                      if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                        $ip = $_SERVER["HTTPS_CLIENT_IP"];
                      } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                      } else {
                        $ip = $_SERVER["REMOTE_ADDR"];
                        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                        $remarks = "account has been logged in";
                        mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                        //used to delete ip address record for login attempts
                        mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                        //calling php file for new login_key
                        require_once "core/update_key.php";
                        //update login key
                        $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                        header("location: Document-Approval-Tracking-and-Mngt-System/DATMS/cashier/index?id=" . $_SESSION["login_key"] . "");
                      }
                      break;

                    case "Admission":
                      //statement
                      $_SESSION['session_username'] = $myusername;
                      $_SESSION['session_url'] = "Document-Approval-Tracking-and-Mngt-System/DATMS/admission/index?id=" . $_SESSION["login_key"] . "";
                      if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                        $ip = $_SERVER["HTTPS_CLIENT_IP"];
                      } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                      } else {
                        $ip = $_SERVER["REMOTE_ADDR"];
                        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                        $remarks = "account has been logged in";
                        mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                        //used to delete ip address record for login attempts
                        mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                        //calling php file for new login_key
                        require_once "core/update_key.php";
                        //update login key
                        $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                        header("location: Document-Approval-Tracking-and-Mngt-System/DATMS/admission/index?id=" . $_SESSION["login_key"] . "");
                      }
                      break;
                    default:
                      $role = $row1["role"];
                      $query = "SELECT * FROM role_config WHERE `role`='$role'";
                      $result = mysqli_query($link, $query);
                      while ($rs = mysqli_fetch_array($result)) {
                        $type = $rs['	role_type'];
                        if ($type = 'RO') {
                          //statement
                          $_SESSION['session_username'] = $myusername;
                          $_SESSION['session_url'] = "Document-Approval-Tracking-and-Mngt-System/DATMS/RO_role/index?id=" . $_SESSION["login_key"] . "";
                          if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                            $ip = $_SERVER["HTTPS_CLIENT_IP"];
                          } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                            $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                          } else {
                            $ip = $_SERVER["REMOTE_ADDR"];
                            $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                            $remarks = "account has been logged in";
                            mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                            //used to delete ip address record for login attempts
                            mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                            //calling php file for new login_key
                            require_once "core/update_key.php";
                            //update login key
                            $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                            header("location: Document-Approval-Tracking-and-Mngt-System/DATMS/RO_role/index?id=" . $_SESSION["login_key"] . "");
                          }
                        } else {
                          //this is used to identify the numbers of attempts
                          $total_count++;
                          $rem_attm = 3 - $total_count;
                          if ($rem_attm == 0) {
                            $error = "To many failed login attempts. Please login after 60 sec.";
                          } else {
                            $error = "Please enter valid login details. $rem_attm attempts remaining";
                            // $error="Your Username or Password is invalid.";
                          }
                          $try_time = time();
                          mysqli_query($link, "insert into login_attempts(ip_address,attempt_time) values('$ip_address','$try_time')");
                        }
                      }

                      break;
                  }
                  break;
                case "SuperUser":
                  //statement role
                  switch ($row1["role"]) {
                    case "SuperAdmin":
                      //statement
                      $_SESSION['session_username'] = $myusername;
                      $_SESSION['session_url'] = "super_admin/index?id=" . $_SESSION["login_key"] . "";
                      if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                        $ip = $_SERVER["HTTPS_CLIENT_IP"];
                      } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                      } else {
                        $ip = $_SERVER["REMOTE_ADDR"];
                        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                        $remarks = "account has been logged in";
                        mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                        //used to delete ip address record for login attempts
                        mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                        //calling php file for new login_key
                        require_once "core/update_key.php";
                        //update login key
                        $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                        header("location: super_admin/index?id=" . $_SESSION["login_key"] . "");
                      }
                      break;
                  }
                  break;

                case "Student Services":
                  //statement
                  break;
                case "Health Check Monitoring":

                  switch ($row1["role"]) {
                    case "Health Check Monitoring Administrator":
                      //statement
                      $_SESSION['session_username'] = $myusername;
                      if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                        $ip = $_SERVER["HTTPS_CLIENT_IP"];
                      } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                      } else {
                        $ip = $_SERVER["REMOTE_ADDR"];
                        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                        $remarks = "account has been logged in";
                        mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                        //used to delete ip address record for login attempts
                        mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                        //calling php file for new login_key
                        require_once "core/update_key.php";
                        //update login key
                        $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                        header("location: Health-Check-Monitoring/HCM-Administrator/index.php?id=" . $_SESSION["login_key"] . "");
                      }

                      break;
                    case "Health Check Monitoring Assistant":
                      //statement
                      $_SESSION['session_username'] = $myusername;
                      if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                        $ip = $_SERVER["HTTPS_CLIENT_IP"];
                      } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                      } else {
                        $ip = $_SERVER["REMOTE_ADDR"];
                        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                        $remarks = "account has been logged in";
                        mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                        //used to delete ip address record for login attempts
                        mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                        //calling php file for new login_key
                        require_once "core/update_key.php";
                        //update login key
                        $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                        header("location: Health-Check-Monitoring/HCM-Assistant/index.php?id=" . $_SESSION["login_key"] . "");
                      }

                      break;
                    case "Contact Tracing":
                      //statement
                      $_SESSION['session_username'] = $myusername;
                      if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                        $ip = $_SERVER["HTTPS_CLIENT_IP"];
                      } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                      } else {
                        $ip = $_SERVER["REMOTE_ADDR"];
                        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                        $remarks = "account has been logged in";
                        mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                        //used to delete ip address record for login attempts
                        mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                        //calling php file for new login_key
                        require_once "core/update_key.php";
                        //update login key
                        $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                        header("location: Health-Check-Monitoring/Contact-tracing/index.php?id=" . $_SESSION["login_key"] . "");
                      }

                      break;
                  }
                  break;
                case "LMS Moodle":
                  //statement
                  break;
                case "Medical System":
                  switch ($row1["role"]) {
                    case "Medical System Administrator":
                      //statement
                      $_SESSION['session_username'] = $myusername;
                      if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                        $ip = $_SERVER["HTTPS_CLIENT_IP"];
                      } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                      } else {
                        $ip = $_SERVER["REMOTE_ADDR"];
                        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                        $remarks = "account has been logged in";
                        mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                        //used to delete ip address record for login attempts
                        mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                        //calling php file for new login_key
                        require_once "core/update_key.php";
                        //update login key
                        $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                        header("location: Medical-System/MS-Administrator/index.php?id=" . $_SESSION["login_key"] . "");
                      }

                      break;
                    case "Medical System Physician":
                      //statement
                      $_SESSION['session_username'] = $myusername;
                      if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                        $ip = $_SERVER["HTTPS_CLIENT_IP"];
                      } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                      } else {
                        $ip = $_SERVER["REMOTE_ADDR"];
                        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                        $remarks = "account has been logged in";
                        mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                        //used to delete ip address record for login attempts
                        mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                        //calling php file for new login_key
                        require_once "core/update_key.php";
                        //update login key
                        $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                        header("location: Health-Check-Monitoring/HCM-Assistant/index.php?id=" . $_SESSION["login_key"] . "");
                      }

                      break;
                  }
                  break;
                case "Scholarship System":
                  //statement
                  break;
                case "User Management":
                  //statement
                  switch ($row1["role"]) {
                    case "User Management Administrator":
                      //statement
                      $_SESSION['session_username'] = $myusername;
                      $_SESSION['session_url'] = "UserManagement/index?id=" . $_SESSION["login_key"] . "";
                      if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                        $ip = $_SERVER["HTTPS_CLIENT_IP"];
                      } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                      } else {
                        $ip = $_SERVER["REMOTE_ADDR"];
                        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                        $remarks = "account has been logged in";
                        mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')") or die(mysqli_error($link));
                        //used to delete ip address record for login attempts
                        mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                        //calling php file for new login_key
                        require_once "core/update_key.php";
                        //update login key
                        $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                        header("location: UserManagement/index?id=" . $_SESSION["login_key"] . "");
                      }
                      break;
                  }
                  break;
              }
            }
            // Free result set
            mysqli_free_result($result1);
          } else {
            // The user was not in the list of departments above, so it means the user may be a student
            // Validate if the user was actually a student
            $sql2 = "SELECT * FROM student_information where id_number = '$myusername' AND `account_status` NOT IN ('Temporally Enrolled')AND account_status NOT LIKE '%Deactivated%'";
            if ($result2 = mysqli_query($link, $sql2)) {
              if (mysqli_num_rows($result2) > 0) {
                while ($row2 = mysqli_fetch_array($result2)) {
                  //Add data to session
                  $_SESSION['session_username'] = $myusername;
                  $_SESSION['session_department'] = "Student";
                  $_SESSION['session_url'] = "Student_Portal/index?id=" . $_SESSION["login_key"] . "";
                  $id1 = $row2['id'];
                  $admin1 = $row2['id_number'];
                  $fname1 = $row2['role'];
                  if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                    $ip = $_SERVER["HTTPS_CLIENT_IP"];
                  } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                    $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                  } else {
                    $ip = $_SERVER["REMOTE_ADDR"];
                    $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                    $remarks = "account has been logged in";
                    mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id1','$admin1','$remarks','$fname1','$ip','$host','$date')") or die(mysqli_error($link));
                    //used to delete ip address record for login attempts
                    mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                    //calling php file for new login_key
                    require_once "core/update_key.php";
                    //update login key
                    $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                    header("location: Student_Portal/index?id=" . $_SESSION["login_key"] . "");
                  }
                }
                // Free result set
                mysqli_free_result($result2);
              } else {
                //The user was not in the list of departments above and not also in the list of student, so that user may be a teacher
                //Validate if the user was actually a teacher
                $sql3 = "SELECT * FROM teacher_information where id_number = '$myusername' AND account_status='Active'";
                if ($result3 = mysqli_query($link, $sql3)) {
                  if (mysqli_num_rows($result3) > 0) {
                    while ($row3 = mysqli_fetch_array($result3)) {
                      //Add data to session
                      $_SESSION['session_username'] = $myusername;
                      $_SESSION['session_url'] = "Teacher_Portal/index?id=" . $_SESSION["login_key"] . "";
                      $_SESSION['session_department'] = "Teacher";

                      $id2 = $row3['id'];
                      $admin2 = $row3['id_number'];
                      $fname2 = $row3['firstname'] . ' ' . $row3['lastname'];

                      if (!empty($_SERVER["HTTPS_CLIENT_IP"])) {
                        $ip = $_SERVER["HTTPS_CLIENT_IP"];
                      } elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])) {
                        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
                      } else {
                        $ip = $_SERVER["REMOTE_ADDR"];
                        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                        $remarks = "account has been logged in";
                        mysqli_query($link, "INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id2','$admin2','$remarks','$fname2','$ip','$host','$date')") or die(mysqli_error($link));
                        //used to delete ip address record for login attempts
                        mysqli_query($link, "delete from login_attempts where ip_address='$ip_address'");
                        //calling php file for new login_key
                        require_once "core/update_key.php";
                        //update login key
                        $link->query("UPDATE users SET login_key='$getQP' WHERE id_number='$myusername'") or die(mysqli_error($link));
                        header("location: Teacher_Portal/index?id=" . $_SESSION["login_key"] . "");
                      }
                    }
                    // Free result set
                    mysqli_free_result($result3);
                  } else {
                    //this is used to identify the numbers of attempts
                    $total_count++;
                    $rem_attm = 3 - $total_count;
                    if ($rem_attm == 0) {
                      $error = "To many failed login attempts. Please login after 60 sec.";
                    } else {
                      $error = "Please enter valid login details. $rem_attm attempts remaining";
                      // $error="Your Username or Password is invalid.";
                    }
                    $try_time = time();
                    mysqli_query($link, "insert into login_attempts(ip_address,attempt_time) values('$ip_address','$try_time')");
                  }
                }
              }
            } else {
              //this is used to identify the numbers of attempts
              $total_count++;
              $rem_attm = 3 - $total_count;
              if ($rem_attm == 0) {
                $error = "To many failed login attempts. Please login after 60 sec.";
              } else {
                $error = "Please enter valid login details. $rem_attm attempts remaining";
                // $error="Your Username or Password is invalid.";
              }
              $try_time = time();
              mysqli_query($link, "insert into login_attempts(ip_address,attempt_time) values('$ip_address','$try_time')");
            }
          }
        }
      } //end of password checking
      else {
        //this is used to identify the numbers of attempts
        $total_count++;
        $rem_attm = 3 - $total_count;
        if ($rem_attm == 0) {
          $error = "To many failed login attempts. Please login after 60 sec.";
        } else {
          $error = "Please enter valid login details. $rem_attm attempts remaining";
          // $error="Your Username or Password is invalid.";
        }
        $try_time = time();
        mysqli_query($link, "insert into login_attempts(ip_address,attempt_time) values('$ip_address','$try_time')");
      }
    } //end else
  }
}

// Getting IP Address
function getIpAddr()
{
  if (!empty($_SERVER['HTTPS_CLIENT_IP'])) {
    $ipAddr = $_SERVER['HTTPS_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTPS_X_FORWARDED_FOR'])) {
    $ipAddr = $_SERVER['HTTPS_X_FORWARDED_FOR'];
  } else {
    $ipAddr = $_SERVER['REMOTE_ADDR'];
  }
  return $ipAddr;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('core/css-links.php'); //css connection
  ?>
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <img src="assets/img/BCPlogo.png" alt="" style=" width: 120px;">
              <div class="d-flex justify-content-center py-4">

                <a href="dynamic-login.php" class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block">SCHOOL INFORMATION SYSTEM</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Get access with your subsystem using username & password to login</p>
                  </div>

                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3">

                    <div class="col-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="username" id="username" placeholder="first name"
                          Required autofocus>
                        <label for="floatingName">Username</label>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="password"
                          placeholder="first name" Required>
                        <label for="floatingName">Password</label>
                      </div>
                    </div>
                    <!-- Error Message onpaste="return false;"-->
                    <?php
                    if (!$error == "") {
                      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' id='msg'>";
                      echo  $error;
                      echo "</div>";
                    }
                    ?>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Did you forget your password? <a href="forgot-password">Change Password</a>
                      </p>
                    </div>
                  </form>


                </div>
              </div>
              <footer class="footer">
                <div class="copyright">
                  <center>
                    &copy;Copyright <a href="https://bcp.edu.ph/home" target="_blank " data-bs-toggle="tooltip"
                      data-bs-placement="top" title="Access BCP Website">Bestlink College of the Philippines</a> All
                    Rights Reserved
                  </center>
                </div>
              </footer>
            </div>
          </div>
        </div>
      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include('core/js.php'); //css connection
  ?>
  <script>
  // timer countdown
  var timeLeft = 60;
  var elem = document.getElementById('some_div');
  var errormsg = document.getElementById('msg');
  var timerId = setInterval(countdown, 900);

  function countdown() {
    if (timeLeft == -1) {
      clearTimeout(timerId);
      doSomething();
    } else {
      // elem.innerHTML = "To many failed login attempts. Please login after " +timeLeft +" sec.";
      timeLeft--;
    }
  }

  function doSomething() {
    errormsg.style.display = 'none';
    // document.location.reload(true)//refresh pages
  }
  </script>
</body>

</html>