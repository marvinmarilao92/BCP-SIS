<?php

require_once("../include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');

    if(isset($_POST['id'])&&isset($_POST['title'])&&isset($_POST['shortDesc'])&&isset($_POST['longDesc'])){
        // Object Connection
             date_default_timezone_set("asia/manila");
             $date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
             $id = mysqli_real_escape_string($conn,$_POST['id']);
             $title = mysqli_real_escape_string($conn,$_POST['title']);
             $shortDesc = mysqli_real_escape_string($conn,$_POST['shortDesc']);
             $longDesc = mysqli_real_escape_string($conn,$_POST['longDesc']);
             
        $q_checkcode = $conn->query("SELECT * FROM `hd_department` WHERE `title` = '$title'") or die(mysqli_error($conn));
            $v_checkcode = $q_checkcode->num_rows;
            if($v_checkcode == 1){
                echo ('failed');
            }else {
                $conn->query("UPDATE hd_department SET title='$title', shortDesc='$shortDesc', longDesc='$longDesc', date='$date' WHERE id='$id'") or die(mysqli_error($conn));
                echo ('success');
            }
        }
?>
