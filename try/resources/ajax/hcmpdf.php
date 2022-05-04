<?php 

require_once 'Config.php';
    // fetch file to download from database
    $filename = $db->query('SELECT * FROM hcms_student_records WHERE `file_id` = ?', $_GET['file'])->fetchArray();
    $file = $filename['file_name'];
    $filepath = '../../../../Health-Check-Monitoring/assets/uploads/' . $file;

    if (file_exists($filepath)) {
        header('Content-Type: application/pdf');
        readfile('../../../../Health-Check-Monitoring/assets/uploads/' . $file);
        exit;
    }

?>