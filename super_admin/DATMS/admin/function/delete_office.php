<?php

require_once("../include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');

if(isset($_POST['offid']))
{
    $id = $_POST['offid'];

    $query = "DELETE FROM datms_office WHERE off_id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
         //statement
         $_SESSION['session_username'] = $myusername;
         if (!empty($_SERVER["HTTP_CLIENT_IP"])){
            $ip = $_SERVER["HTTP_CLIENT_IP"];
          }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
          }else{
            $ip = $_SERVER["REMOTE_ADDR"];
            $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
             $remarks="Department has been delete";  
             mysqli_query($link,"INSERT INTO audit_trail(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')")or die(mysqli_error($link));
            
             echo  "DepartmentDeleted";
          }
        // header("Location:create_office.php");
    }
    else
    {
        echo  "NoData";
    }
}else{
    echo  "action fail";
}

?>
