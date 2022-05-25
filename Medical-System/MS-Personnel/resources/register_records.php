<?php 
include('../includes/source.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
  // <!-- ======= From input form======= -->
  $id = mysqli_real_escape_string($conn, $_POST['id_number']);
  $fname = mysqli_real_escape_string($conn, $_POST['firstname']);
  $mname = mysqli_real_escape_string($conn, $_POST['middlename']);
  $lname = mysqli_real_escape_string($conn, $_POST['lastname']);
  $fullname = $fname.' '.$mname.' '.$lname;

  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $course = mysqli_real_escape_string($conn, $_POST['course']);
  // <!-- ======= From input form======= -->
  $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
  $table_name= "hcms_student_records";

  // <!-- ======= Date for file id======= -->
  date_default_timezone_set("asia/manila");
  $date = date("Y", strtotime("+0 HOURS"));

  // <!-- ======= file======= -->
  $file_id = "MED".$date.'-'.rand(10000,100000);
  $file = rand(1,100000).'-'.$_FILES['upload']['name'];
  $targetDir = '../../assets/uploads/'. $file;
  $fileType = pathinfo($file, PATHINFO_EXTENSION);
  $fileTmp = $_FILES['upload']['tmp_name'];

  $status = "Pending";
  date_default_timezone_set("asia/manila");
  $assessment_date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));

  $allowTypes = array('pdf');
  $theFileTypeInvalid = !in_array($fileType, $allowTypes);

  // <!-- =======Actor======= -->

  $appr = $verified_session_firstname.' '.$verified_session_lastname;
  $type = "Direct";
  $role = $verified_session_role;
  $dept = $verified_session_department;


  if($theFileTypeInvalid) {
    $msg = "Error File Type";
    $icon = "error";
    functionSwal($msg, $icon);
  } else  {

    if(move_uploaded_file($fileTmp, $targetDir)){
    
    
    $query = "INSERT INTO ".$table_name." (`stud_id`, `full_n`, `status`, `assess_date`, `file_id`, `file_name`, `appr_name`, `cons_role`, `cons_dept`, `remarks`, `type`) 
              VALUES ('$id', '$fullname', '$status', '$assessment_date', '$file_id', '$file', '$appr', '$role', '$dept', '$remarks', '$type')" ;

    $query_run = mysqli_query($conn, $query);

    } else {
      $msg = "Not Moved";
      $icon = "error";
      functionSwal($msg, $icon);
    }

    if ($query_run){
      $fname= $verified_session_role;    
      if (!empty($_SERVER["HTTPS_CLIENT_IP"])){
  
        $ip = $_SERVER["HTTPS_CLIENT_IP"];
  
      }elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])){
  
        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
  
      }else{
        date_default_timezone_set("asia/manila");
        $audit_date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));
        $ip = $_SERVER["REMOTE_ADDR"];
        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $remarks= "Record Registered";  
        //save to the audit trail table

          $sql_run = auditQuery($conn, $verified_session_username, $remarks , $fname, $office , $ip , $host , $audit_date);
          if($sql_run){
          $_SESSION['alert'] = "Successfully Uploaded";
          // swal
          $msg = "Record Added";
          $icon = "success";
          functionSwal($msg, $icon);
          header("location:". $SERVER['HTTPS_REFERER']);
          exit();
          }
        }

     }else{
        $msg = "Already Has a File";
        $icon = "error";
        functionSwal($msg, $icon);
        $_SESSION['alert'] = "Action Failed";
        header("location:". $SERVER['HTTPS_REFERER']);
        exit();
      }

  }
}
