<?php 
include ('../security/session.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {

  date_default_timezone_set("asia/manila");
  $date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));
  $office = "User Profile"; 
  $about = mysqli_real_escape_string($conn,$_POST['about']); 
  $address = mysqli_real_escape_string($conn,$_POST['address']); 
  $phone = mysqli_real_escape_string($conn,$_POST['phone']); 
  $email = mysqli_real_escape_string($conn,$_POST['email']); 



  $query = "UPDATE user_information 
            SET `about` = '{$about}', `address` = '{$address}', `contact` = '{$phone}', `email` = '{$email}' 
            WHERE `id_number` = '$verified_session_username'";

  $query_run = mysqli_query($conn, $query);

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
        $_SESSION['alert'] = "Successfully Updated";
        header("location: ../users-profile.php?id=".$_SESSION["login_key"]."");
        
      }

  }else{

    echo ('failed');

    }
  }else{

}
?>