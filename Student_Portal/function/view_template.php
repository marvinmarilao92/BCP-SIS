
<?php 

require_once("../includes/conn.php");

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    
    // fetch file to download from database
    $sql = "SELECT * FROM  datms_tempreq WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../../assets/request/' . $file['file_name'];

    if (file_exists($filepath)) {
        header('Content-Type: application/pdf');
        readfile('../../assets/request/' . $file['file_name']);

        mysqli_query($conn, $updateQuery);
        exit;
    }

}


?>