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
        echo  "OfficeDeleted";
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
