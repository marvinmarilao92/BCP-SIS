
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['LoginbtnUMS']) == "POST")
            {
               if ( isset($_POST['Username']) && $_POST['Password'])
               {
                    include 'Config.php'; session_start();
                    $account = $db->query('SELECT * FROM usermanagements WHERE username = ? AND password = ?', $_POST['Username'], $_POST['Password'])->fetchArray();
                    $USERSaccount = $db->query('SELECT * FROM departmental_user WHERE username = ? AND password = ?', $_POST['Username'], $_POST['Password'])->fetchArray();
                    if (isset($account['username']) && isset( $account['password']))
                    {
                        include 'SForms/timezone.php';
                        include 'SForms/QueryParam.php';
                        require_once 'Config.php';
                        $update = $db->query('UPDATE usermanagements SET updated_at=?, QueryP=?  WHERE id=?', $dt->format('Y-m-d H:i:s'), $getQP ,$account['id']);
                        if ($update->affectedRows() == 1)
                        {
                            $_SESSION['success'] = $account['QueryP'];
                            $_SESSION["Fname".$_SESSION['success'].""]   = $account['first_name'];
                            $_SESSION["Lname".$_SESSION['success'].""]   = $account['last_name'];


                            if (isset($_SESSION['success']) && isset($_SESSION["Fname".$_SESSION['success'].""]) && isset(  $_SESSION["Lname".$_SESSION['success'].""]) )
                            {
                                echo '<script type="text/javascript">location.href = "index.php?id='.$account['QueryP'].'"</script>';
                            }
                        }
                        else
                        {
                            echo '<script type="text/javascript">alert("ERROR: Update query!");</script>';
                        }
                    }

                    if (isset($USERSaccount['username']) && isset( $USERSaccount['password']))
                    {
                        include 'SForms/timezone.php';
                        include 'SForms/QueryParam.php';
                        require_once 'Config.php';

                        $USERsupdate = $db->query('UPDATE departmental_user SET Update_at=?, QueryP=?  WHERE ID=?', $time, $getQP ,$USERSaccount['ID']);
                        if ($USERsupdate->affectedRows() == 1)
                        {
                            $_SESSION["success"]                            = $USERSaccount['QueryP'];
                            $_SESSION["Fname".$_SESSION['success'].""]      = $USERSaccount['first_name'];
                            $_SESSION["Lname".$_SESSION['success'].""]      = $USERSaccount['last_name'];
                            $_SESSION["User_img".$_SESSION['success'].""]   = $USERSaccount['User_img'];
                            $_SESSION["User_ID".$_SESSION['success'].""]    = $USERSaccount['User_ID'];
                            $_SESSION["Role".$_SESSION['success'].""]       = $USERSaccount['Role'];

                            if (isset($_SESSION['success']) && isset($_SESSION["Fname".$_SESSION['success'].""]) && isset($_SESSION["Lname".$_SESSION['success'].""])
                             && isset($_SESSION["User_img".$_SESSION['success'].""]) && isset($_SESSION["User_ID".$_SESSION['success'].""]) && isset($_SESSION["Role".$_SESSION['success'].""]))
                            {
                                echo '<script type="text/javascript">location.href = "index.php?id='.$USERSaccount['QueryP'].'"</script>';
                            }
                        }
                        else
                        {
                            echo '<script type="text/javascript">alert("ERROR: Update query!");</script>';
                        }
                    }
                    else
                    {
                         echo '<script type="text/javascript">location.href = "modules.php"</script>';
                    }
               }
               else
               {
                   echo '<script type="text/javascript">location.href = "modules.php"</script>';
               }
            }
        ?>
