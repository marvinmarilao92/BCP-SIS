<?php 

require_once("../include/conn.php");

if (isset($_GET['file_id'])) {
    $id = mysqli_real_escape_string($conn,$_GET['file_id']);

    // fetch file to download from database
    $sql = "SELECT * FROM  datms_documents WHERE doc_id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../../../../assets/uploads/' . $file['doc_name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../../../../assets/uploads/' . $file['doc_name']));
        readfile('../../../../assets/uploads/' . $file['doc_name']);

        // Now update downloads count
        $newCount = $file['doc_dl'] + 1;
        $updateQuery = "UPDATE datms_documents SET doc_dl=$newCount WHERE doc_id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}


?>