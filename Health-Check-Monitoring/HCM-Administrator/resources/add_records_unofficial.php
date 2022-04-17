<?php 
include_once('../security/session.php');
include('../includes/oopGlobal.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
  // <!-- ======= From input form Personal Information======= -->
  $id = mysqli_real_escape_string($conn, $_POST['id_number']);
  // <!-- ======= From input form Personal Information ENTITY FULL NAME======= -->
  $fname= mysqli_real_escape_string($conn, $_POST['fname']);
  $mname = mysqli_real_escape_string($conn, $_POST['mname']);
  $lname= mysqli_real_escape_string($conn, $_POST['lname']);
  $fullname = $fname. '' .$mname. '' .$lname;

   // <!-- ======= From input form Personal Information OTHER====== -->
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $course= mysqli_real_escape_string($conn, $_POST['course']);
  $status2= mysqli_real_escape_string($conn, $_POST['status2']);

   // <!-- ======= Table name for function====== -->
  $table_name= mysqli_real_escape_string($conn, $_POST['tablename']);

  // <!-- ======= Date for file id======= -->
  date_default_timezone_set("asia/manila");
  $date = date("Y", strtotime("+0 HOURS"));

  // <!-- ======= file======= -->
  $file_id = "MED".$date.'-'.rand(10000,100000);
  $file = rand(1,100000).'-'.$_FILES['upload']['name'];
  $targetDir = '../../assets/uploads/'. $file;
  $fileType = pathinfo($file, PATHINFO_EXTENSION);
  $fileTmp = $_FILES['upload']['tmp_name'];

  $status = "Approved";
  date_default_timezone_set("asia/manila");
  $assessment_date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));

  $allowTypes = array('pdf');
  $theFileTypeInvalid = !in_array($fileType, $allowTypes);

  // <!-- =======Actor======= -->

  $appr = $verified_session_firstname.' '.$verified_session_lastname;
  $type = "Direct";
  $status2 = "unofficial";
  $role = $verified_session_role;
  $dept = $verified_session_department;


  if($theFileTypeInvalid) {
    $msg = "Error File Type";
    $icon = "error";
    functionSwal($msg, $icon);
  } else  {

    if(move_uploaded_file($fileTmp, $targetDir)){
    
    
    $query = "INSERT INTO ".$table_name." (`stud_id`, `full_n`, `status`, `assess_date`, `file_id`, `file_name`, `status2`, `appr_name`, `cons_role`, `cons_dept`, `remarks`, `type`) 
              VALUES ('$id', '$fullname', '$status', '$assessment_date', '$file_id', '$file', '$status2', '$appr', '$role', '$dept', '$remarks', '$type')" ;

    $query_run = mysqli_query($conn, $query);

    } else {
      $msg = "Not Moved";
      $icon = "error";
      functionSwal($msg, $icon);
    }

    if ($query_run){
      $fname= $verified_session_role;    
      if (!empty($_SERVER["HTTP_CLIENT_IP"])){
  
        $ip = $_SERVER["HTTP_CLIENT_IP"];
  
      }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
  
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
  
      }else{
  
        $ip = $_SERVER["REMOTE_ADDR"];
        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $remarks= "User Profile has been updated";  
        //save to the audit trail table
          mysqli_query($conn,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$office','$ip','$host','$date')")or die(mysqli_error($conn));  
          
          $_SESSION['alert'] = "Successfully Uploaded";
          $msg = "Record Added";
          $icon = "success";
          functionSwal($msg, $icon);
          header("location:". $SERVER['HTTP_REFERER']);
          exit();
        }

     }else{
        $msg = "Already Has a File";
        $icon = "error";
        functionSwal($msg, $icon);
        $_SESSION['alert'] = "Action Failed";
        header("location:". $SERVER['HTTP_REFERER']);
        exit();
      }

  }
}
