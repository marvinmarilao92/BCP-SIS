<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'sis_db');

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM datms_office WHERE off_id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo  "Data Deleted";
        // header("Location:create_office.php");
    }
    else
    {
        echo  "Data Not Deleted";
    }
}

?>
