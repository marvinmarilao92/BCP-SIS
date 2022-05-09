<?php 

// require_once("../includes/conn.php");

// if (isset($_GET['id'])) {
//     $id = mysqli_real_escape_string($conn,$_GET['id']);
    
//     // fetch file to download from database
//     $sql = "SELECT * FROM  datms_tempreq WHERE id = $id";
//     $result = mysqli_query($conn, $sql);

//     $file = mysqli_fetch_assoc($result);
//     $filepath = '../../assets/uploads/request/' . $file['file_name'];

//     if (file_exists($filepath)) {
//         header('Content-Type: application/pdf');
//         readfile('../../assets/uploads/request/' . $file['file_name']);

//         mysqli_query($conn, $updateQuery);
//         exit;
//     }

// }


?>

<?php 

require_once("../includes/conn.php");

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn,$_GET['id']);

    // fetch file to download from database
    $sql = "SELECT * FROM  datms_tempreq WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../../assets/uploads/request/' . $file['file_name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../../assets/uploads/request/' . $file['file_name']));
        readfile('../../assets/uploads/request/' . $file['file_name']);

        // Now update downloads count        
        $updateQuery = "UPDATE datms_tempreq SET status='Downloaded' WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}


?>