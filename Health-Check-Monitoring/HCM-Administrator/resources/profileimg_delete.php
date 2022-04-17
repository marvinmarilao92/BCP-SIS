<?php
include('../security/session.php');
    $query = "UPDATE user_information SET user_img = null WHERE `id_number` = '$verified_session_username'";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
 
    $_SESSION['alert'] = "Successfully Deleted";
    header("location:". $SERVER['HTTP_REFERER']);
    die;
    }
 ?>



 