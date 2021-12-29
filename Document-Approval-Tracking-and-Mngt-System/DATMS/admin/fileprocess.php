<?php
    // connect to the database
    require_once("include/conn.php");

    // Uploads files
    if (isset($_POST['save'])) { // if save button on the form is clicked
          // name of the uploaded file
          date_default_timezone_set("asia/manila");
          $time = date("M-d-Y h:i A",strtotime("+0 HOURS"));
          // $doc_user = $_POST['doccreator'];
          // $doc_office = $_POST['docoffice'];
          // $doc_title = $_POST['docname'];
          // $doc_type = $_POST['doctype'];
          // $doc_desc = $_POST['docdesc'];
          $doc_user = mysqli_real_escape_string($conn,$_POST['doccreator']);
          $doc_office = mysqli_real_escape_string($conn,$_POST['docoffice']);
          $doc_title = mysqli_real_escape_string($conn,$_POST['docname']);
          $doc_type = mysqli_real_escape_string($conn,$_POST['doctype']);
          $doc_desc = mysqli_real_escape_string($conn,$_POST['docdesc']);
          
          $filename = $_FILES['docfile']['name'];

          // $Admin = $_FILES['admin']['name'];
          // destination of the file on the server
          $destination = '../uploads/' . $filename;

          // get the file extension
          $extension = pathinfo($filename, PATHINFO_EXTENSION);

          // the physical file on a temporary uploads directory on the server
          $file = $_FILES['docfile']['tmp_name'];
          $size = $_FILES['docfile']['size'];

          $isExist = true;
          //checking if there's a duplicate number because we use random number for id numbers to prevent errors (NOTE PARTILLY TESTED)
          $doc_code = rand(10000000,99999999);

        if (!in_array($extension, ['pdf'])) {
                    echo '<script type = "text/javascript">
                                alert("You file extension must be: .pdf");
                                window.location = "documents.php";
                          </script>
                        ';
        } elseif ($_FILES['docfile']['size'] > 3000000) { // file shouldn't be larger than 3 Megabyte
                    echo "File too large!";
        } else{
          $query=mysqli_query($conn,"SELECT * FROM `datms_documents` WHERE `doc_name` = '$filename'")or die(mysqli_error($conn));
          $counter=mysqli_num_rows($query);
           
           if ($counter == 1) 
             { 
                echo '
               <script type = "text/javascript">
                   alert("Files already taken");
                   window.location = "documents.php";
               </script>
              ';
             }else{
          // move the uploaded (temporary) file to the specified destination
            if (move_uploaded_file($file, $destination)) {
                $sql = "INSERT INTO datms_documents (doc_code, doc_title, doc_name, doc_size, doc_dl, doc_type, doc_status, doc_desc, doc_actor1, doc_off1, doc_date1, doc_actor2, doc_off2, doc_date2)
                VALUES ('$doc_code', '$doc_title' ,'$filename','$size',0,'$doc_type', 'Created', '$doc_desc','$doc_user','$doc_office','$time','','','')";
                if (mysqli_query($conn, $sql)) {
                      echo '<script type = "text/javascript">
                              alert("File Upload");
                              window.location = "documents.php";
                            </script>';
                }
            } else {
                echo "Failed Upload files!";
            }
             }         
      }
    }
?>