<?php

require_once("../include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');

if(isset($_POST['dtid']))
{
    $id = $_POST['dtid'];

    $query = "DELETE FROM hdms_category WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo  "Category Deleted";
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
