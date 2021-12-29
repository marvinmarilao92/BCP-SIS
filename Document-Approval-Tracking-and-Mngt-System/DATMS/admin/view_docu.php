<?php 

require_once("include/conn.php");

if (isset($_GET['ID'])) {
    $id = mysqli_real_escape_string($conn,$_GET['ID']);

    // fetch file to download from database
    $sql = "SELECT * FROM  datms_documents WHERE doc_id = $id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../uploads/' . $file['doc_name'];

    if (file_exists($filepath)) {
        header('Content-Type: application/pdf');
        readfile('../uploads/' . $file['doc_name']);

        mysqli_query($conn, $updateQuery);
        exit;
    }

}


?>