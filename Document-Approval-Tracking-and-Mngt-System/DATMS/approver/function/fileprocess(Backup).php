<?php
// connect to the database
require_once("../include/conn.php");

// Uploads files
if (isset($_POST['doccreator'])&&isset($_POST['docoffice'])&&isset($_POST['doctitle']) && 
isset($_POST['doctype'])&&isset($_POST['docdesc'])&&isset($_POST['docfile'])) { // if save button on the form is clicked
    // name of the uploaded file
    date_default_timezone_set("asia/manila");
    $time = date("Y-m-d h:i A",strtotime("+0 HOURS"));
    $doc_user = mysqli_real_escape_string($conn,$_POST['doccreator']);
    $doc_office = mysqli_real_escape_string($conn,$_POST['docoffice']);
    $doc_title = mysqli_real_escape_string($conn,$_POST['doctitle']);
    $doc_type = mysqli_real_escape_string($conn,$_POST['doctype']);
    $doc_desc = mysqli_real_escape_string($conn,$_POST['docdesc']);
    
    $filename = $_FILES['docfile']['name'];

    // $Admin = $_FILES['admin']['name'];
    // destination of the file on the server
    $destination = '../../uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['docfile']['tmp_name'];
    $size = $_FILES['docfile']['size'];

    $isExist = true;
    //checking if there's a duplicate number because we use random number for id numbers to prevent errors (NOTE PARTILLY TESTED)
    do{
        //generate 8 number value
        $doc_code = rand(10000000,99999999);
        $sql1 = "SELECT doc_code from documents where doc_code = $doc_code";
        if($result = mysqli_query($db->connect, $sql1)){
            if(mysqli_num_rows($result) > 0){
                $isExist = true;
            }
            else{
                $isExist = false;
            }
        } 
    }while($isExist == true);

    if (!in_array($extension, ['pdf'])) {
                echo '<script type = "text/javascript">
                            alert("You file extension must be: .pdf");
                            window.location = "add_file.php";
                      </script>
                     ';
    } elseif ($_FILES['docfile']['size'] > 3000000) { // file shouldn't be larger than 3 Megabyte
                echo "File too large!";
    } else{


  $query=mysqli_query($conn,"SELECT * FROM `documents` WHERE `doc_name` = '$filename'")or die(mysqli_error($conn));
           $counter=mysqli_num_rows($query);
            
            if ($counter == 1) 
              { 
                   echo 'failed';
              } 
      
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO documents (doc_code, doc_name, doc_size, doc_dl, doc_type, doc_status, doc_desc, doc_actor1, doc_off1, doc_date1, doc_actor2, doc_off2, doc_date2)
             VALUES ('$doc_code', '$filename','$size',0,'$doc_type', 'Created', '$doc_desc','$doc_user','$doc_office','$time','','','')";
            if (mysqli_query($conn, $sql)) {
                   echo 'success';

            }
        } else {
             echo "Failed Upload files!";
        }
    
  }
}
