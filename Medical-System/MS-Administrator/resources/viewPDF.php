<?php 

require_once '../security/newsource.php';
    // fetch file to download from database
    $tablename = $_GET['tablename'];
    $filename = $db->query('SELECT * FROM '.$tablename.' WHERE `file_name` = ?', $_GET['file'])->fetchArray();
    $file = $filename['file_name'];
    $filepath = '../../assets/uploads/' . $file;

    if (file_exists($filepath)) {
        header('Content-Type: application/pdf');
        readfile('../../assets/uploads/' . $file);
        exit;
    }

?>