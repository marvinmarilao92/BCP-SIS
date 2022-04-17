<?php 
include ('../security/session.php');
include_once('../includes/scripts-top.php');
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
    $query = "UPDATE user_information 
              SET user_img = '{$final_img}'
              WHERE `id_number` = '$verified_session_username'";

      $query_run = mysqli_query($conn, $query);
      
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
    
          $ip = $_SERVER["REMOTE_ADDR"];
          $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
          $remarks= "User Profile has been updated";  
          //save to the audit trail table
            mysqli_query($conn,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$office','$ip','$host','$date')")or die(mysqli_error($conn));  
            
            $_SESSION['alert'] = "Successfully Uploaded";
            $msg = "Profile Uploaded";
            $icon = "success";
            functionSwal($msg, $icon);
            header("location:". $SERVER['HTTP_REFERER']);
            exit();
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
