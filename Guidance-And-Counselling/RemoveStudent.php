<?php session_start();


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['DeleteKey']) && isset($_SESSION['success']) )
{
    require_once 'Config.php';
    $delete = $db->query('DELETE FROM studentinfo where ID=?', $_GET['DeleteKey']);
    if ($delete->affectedRows() == 1) :
              $_SESSION['RemoveSucess'] = "Success";
              echo "<script>location.href = 'StudentProfile.php?id=".$_SESSION["success"]."&Success=".$_GET['DeleteKey']."'</script>";
    endif;
}


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['CRDelete']) && isset($_SESSION['success']) )
{
    require_once 'Config.php';
    $getData = $db->query('SELECT * FROM counselrequest WHERE Request_KEY=?', $_GET['CRDelete'])->fetchArray();

                require_once 'Config.php';
                require_once 'SForms/timezone.php';
                $created = $time;
                $Reject = $db->query('INSERT INTO rejectappointment ( Employee_ID, Student_ID, Student_Name, Remarks,  created_at, updated_at)  VALUES (?,?,?, ?,?,?)' ,
                    $_SESSION["User_ID".$_SESSION['success'].""],
                    $_SESSION["Student_ID".$_SESSION['success'].""],
                    $_SESSION["Student_Name".$_SESSION['success'].""],
                    "...",
                    $created,
                    $created);
                        if ($Reject->affectedRows() == 1)
                        {
                             $_SESSION['RemoveSucess'] = "Success";
                                 $Imginsert =  $db->query('INSERT INTO notification (User_Img)
                                    SELECT User_img FROM departmental_user WHERE User_ID =?' ,$_SESSION['User_ID'.$_SESSION['success'].'']);

                                         require_once  'Config.php';
                                         include 'SForms/timezone.php';
                                         $DataUpdate = $db->query('UPDATE notification SET User_ID=?, User_Name=?, Student_ID=?, Message_Title=?, Message=?, Read_Status=?, Notif_Messages=? ,created_at=? ORDER BY ID DESC LIMIT 1' ,
                                         $_SESSION['User_ID'.$_SESSION['success'].''], $_SESSION['Fname'.$_SESSION['success'].''], $_SESSION["Student_ID".$_SESSION['success'].""], "Disapproved!", "Invalid reason can't accept your request.", "Unread", "Notification", $time);
                        }

                       require_once 'Config.php';
                       $delete = $db->query('DELETE FROM counselrequest where Request_KEY=?', $_GET['CRDelete']);
                       if ($delete->affectedRows() == 1) :
                                 $_SESSION['RemoveSucess'] = "Success";
                                 echo "<script>location.href = 'ConandAss.php?id=".$_SESSION["success"]."&RemoveReq=".$_GET['CRDelete']."'</script>";
                       endif;
}


                    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['DRLDelete']) && isset($_SESSION['success']) )
                    {
                       require_once 'Config.php';
                       $delete = $db->query('DELETE FROM rejectappointment WHERE ID=?', $_GET['DRLDelete']);
                       if ($delete->affectedRows() == 1) :
                                 $_SESSION['RemoveSucess'] = "Success";
                                 echo "<script>location.href = 'Rejectedlist.php?id=".$_SESSION["success"]."&RemoveReq=".$_GET['DRLDelete']."'</script>";
                       endif;
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['DocsDelete']) && isset($_SESSION['success']) )
                    {
                       require_once 'Config.php';
                       $delete = $db->query('DELETE FROM gac_files WHERE ID=?', $_GET['DocsDelete']);
                       if ($delete->affectedRows() == 1) :
                                 $_SESSION['RemoveSucess'] = "Success";
                                 echo "<script>location.href = 'GuidanceForms.php?id=".$_SESSION["success"]."&RemoveReq=Success'</script>";
                       endif;
                    }



//                     Approaved student for counseling
                    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['CAUpdate']) && isset($_SESSION['success']))
                    {
                        include 'SForms/timezone.php';
                        require_once 'Config.php';
                        $datete = $time;
                        $AppoveStudent = $db->query('UPDATE counselrequest SET Status=?, update_at=? WHERE Request_KEY=?','Counseling', $datete, $_GET['CAUpdate']);
                        if ($AppoveStudent->affectedRows() == 1)
                        {
                            $_SESSION["Counseling"] = "Success";
                            echo "<script>location.href = 'ConandAss.php?id=".$_SESSION["success"]."&Counseling=Success'</script>";
                        }
                    }




if (!isset($_SESSION['success']))
{
    echo '<script type="text/javascript">location.href = "modules.php"</script>'; die();
}
