<?php 

require_once("../include/conn.php");

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    
    // fetch file to download from database
    $sql = "SELECT * FROM  datms_tempreq WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../../../../assets/uploads/request/' . $file['file_name'];

    if (file_exists($filepath)) {
        header('Content-Type: application/pdf');
        readfile('../../../../assets/uploads/request/' . $file['file_name']);

        mysqli_query($conn, $updateQuery);
        exit;
    }

}


?>