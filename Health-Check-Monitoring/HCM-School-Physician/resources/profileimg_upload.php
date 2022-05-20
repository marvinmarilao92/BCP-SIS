<?php 
include_once('../includes/source.php');
if(isset($_POST['up_img'])) {
  
  date_default_timezone_set("asia/manila");
  $date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));

  $img = rand(10000,100000).'-'.$_FILES['file']['name'];
  $targetDir = '../../../assets/users/'. $img;

  $fileType = pathinfo($img, PATHINFO_EXTENSION);
  $new_img_name = strtolower($img);
  $final_img = str_replace(' ','-',$new_img_name);
  $file = $_FILES['file']['tmp_name'];
  $size = $_FILES['file']['size'];
      
  $allowTypes = array('jpg','png','jpeg');

  $theFileTypeInvalid = !in_array($fileType, $allowTypes);

  if($theFileTypeInvalid) {
      $msg = "Error File Type";
      $icon = "error";
      functionSwal($msg, $icon);
      $_SESSION['alert'] = "<strong>ERROR:</strong> Please kindly upload images <hr> <strong>FILE TYPES:</strong> JPEG, PNG, JPG";
      header("location:". $SERVER['HTTP_REFERER']);
      exit();
  }else{

    if(move_uploaded_file($file, $targetDir)){
   

      $query_run = updateImg($conn, $final_img, $verified_session_username);
      
    }else{
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
            header("location:". $SERVER['HTTP_REFERER']);
            exit();
            }
          }
    
      }else{
        $msg = "Profile Not Uploaded";
        $icon = "error";
        functionSwal($msg, $icon);
        $_SESSION['alert'] = "Action Failed";
        header("location:". $SERVER['HTTP_REFERER']);
        exit();
      }
  }

}
