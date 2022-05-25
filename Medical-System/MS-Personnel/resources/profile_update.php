<?php 
include_once('../includes/source.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {

  date_default_timezone_set("asia/manila");
  $date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));
  $office = "User Profile"; 
  $about = mysqli_real_escape_string($conn,$_POST['about']); 
  $address = mysqli_real_escape_string($conn,$_POST['address']); 
  $phone = mysqli_real_escape_string($conn,$_POST['phone']); 
  $email = mysqli_real_escape_string($conn,$_POST['email']); 


  $query_run = updateProfile($conn, $about, $address, $phone, $email, $verified_session_username);

  if ($query_run){
    $fname= $verified_session_role; 
    $msg = "Profile Updated";
    $icon = "success";
    functionSwal($msg, $icon);
    if (!empty($_SERVER["HTTPS_CLIENT_IP"])){

      $ip = $_SERVER["HTTPS_CLIENT_IP"];

    }elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])){

      $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];

    }else{
      date_default_timezone_set("asia/manila");
      $audit_date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));
      $ip = $_SERVER["REMOTE_ADDR"];
      $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
      $remarks= "User Profile has been updated";  
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
    $msg = "Error";
    $icon = "error";
    functionSwal($msg, $icon);
    }
  }
?>