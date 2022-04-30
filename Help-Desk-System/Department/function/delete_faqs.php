<?php

require_once("../include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');

if(isset($_POST['fid']))
{
    $id = $_POST['fid'];

    $query = "DELETE FROM datms_doctype WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo  "faqs Deleted";
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
