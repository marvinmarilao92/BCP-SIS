<?php
session_start();
        require_once 'Config.php';
        include 'SForms/timezone.php';
        $insertConvo = $db->query('INSERT INTO conversation (
                    Employee_ID,
                    Employee_Name,
                    Student_ID,
                    Student_Name,
                    User,
                    Chat_Info,
                    Request_KEY,
                    created_at,
                    update_at ) VALUES (?,?,?,? ,?,?,?,?,?)' ,
                    $_SESSION['User_ID'.$_SESSION['success'].''],
                    $_SESSION['Lname'.$_SESSION['success'].''].', '.$_SESSION['Fname'.$_SESSION['success'].''],
                    $_SESSION["Student_ID".$_SESSION['success'].""],
                    $_SESSION["Student_Name".$_SESSION['success'].""],
                    $_SESSION['Role'.$_SESSION['success'].''],
                    $_POST["Chats"],
                    $_SESSION["Request_KEY".$_SESSION['success'].''],
                    $time,
                    $time);

        if ($insertConvo->affectedRows() == 1)
        {
            $_SESSION["Clear"] = "";
            require_once 'Config.php';
            $NotifMessage = $db->query('SELECT count(Request_KEY) as Chat FROM conversation WHERE Request_KEY =? AND Student_ID=? AND Employee_ID=?',
                    $_SESSION["Request_KEY".$_SESSION['success'].""], $_SESSION["Student_ID".$_SESSION['success'].""], $_SESSION["User_ID".$_SESSION['success'].""])->fetchArray();

            if ($NotifMessage["Chat"] == 1)
            {
                if ($_SESSION['Role'.$_SESSION['success'].''] == "Assistant Counselor")
                {
                    require_once  'Config.php';
                    $Imginsert =  $db->query('INSERT INTO notification (User_Img)
                    SELECT User_img FROM departmental_user WHERE User_ID =?' ,$_SESSION["User_ID".$_SESSION['success'].""]);

                    require_once  'Config.php';
                    include 'SForms/timezone.php';
                    $DataUpdate = $db->query('UPDATE notification SET User_ID=?, User_Name=?, Student_ID=?, Message_Title=?, Message=?, Read_Status=?, Notif_Messages=?, Request_KEY=?, created_at=? ORDER BY ID DESC LIMIT 1' ,
                    $_SESSION['User_ID'.$_SESSION['success'].''], $_SESSION['Fname'.$_SESSION['success'].''], $_SESSION["Student_ID".$_SESSION['success'].""], "Pre Counseling!", "Please check your messages.", "Unread", "Messages",
                    $_SESSION['Request_KEY'.$_SESSION['success'].''], $time);
                }

                if ($_SESSION['Role'.$_SESSION['success'].''] == "Student Counselor")
                {
                    require_once  'Config.php';
                    $Imginsert =  $db->query('INSERT INTO notification (User_Img)
                    SELECT User_img FROM departmental_user WHERE User_ID =?' ,$_SESSION['User_ID'.$_SESSION['success'].'']);
                    require_once  'Config.php';
                    include 'SForms/timezone.php';
                    $DataUpdate = $db->query('UPDATE notification SET User_ID=?, User_Name=?, Student_ID=?, Message_Title=?, Message=?, Read_Status=?, Notif_Messages=?, Request_KEY=?, created_at=? ORDER BY ID DESC LIMIT 1' ,
                    $_SESSION['User_ID'.$_SESSION['success'].''], $_SESSION['Fname'.$_SESSION['success'].''], $_SESSION["Student_ID".$_SESSION['success'].""], "Counseling!", "Please check your messages.", "Unread", "Messages",
                    $_SESSION["Request_KEY".$_SESSION['success'].""], $time);
                }

                if ($_SESSION['Role'.$_SESSION['success'].''] == "Psychometrician")
                {
                    require_once  'Config.php';
                    $Imginsert =  $db->query('INSERT INTO notification (User_Img)
                    SELECT User_img FROM departmental_user WHERE User_ID =?' ,$_SESSION['User_ID'.$_SESSION['success'].'']);
                    require_once  'Config.php';
                    include 'SForms/timezone.php';
                    $DataUpdate = $db->query('UPDATE notification SET User_ID=?, User_Name=?, Student_ID=?, Message_Title=?, Message=?, Read_Status=?, Notif_Messages=?, Request_KEY=?, created_at=? ORDER BY ID DESC LIMIT 1' ,
                    $_SESSION['User_ID'.$_SESSION['success'].''], $_SESSION['Fname'.$_SESSION['success'].''], $_SESSION["Student_ID".$_SESSION['success'].""], "Counseling!", "Please check your messages.", "Unread", "Messages",
                    $_SESSION["Request_KEY".$_SESSION['success'].""], $time);
                }

            }
        }
?>
