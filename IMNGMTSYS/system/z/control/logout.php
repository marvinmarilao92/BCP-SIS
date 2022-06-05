<?php
 
  include 'check-session-login.php';

  if(session_destroy()) {
    date_default_timezone_set("asia/manila");
		$date = date("Y-m-d H:i:s",strtotime("+0 HOURS"));
    $fname=$ad_fname.' '.$ad_lname;  
    if (!empty($_SERVER["HTTP_CLIENT_IP"])){
      $ip = $_SERVER["HTTP_CLIENT_IP"];
    }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
      $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }else{
      $ip = $_SERVER["REMOTE_ADDR"];
      $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
       $remarks="account has been logged out";  
       mysqli_query($link, "INSERT INTO internship_audit_trail(user,action,id,account_no,ip,host) VALUES('$fname','$remarks','$getID','$verified_session_username','$ip','$host')") or die(mysqli_error($link));
       mysqli_query($link,"INSERT INTO audit_logs(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$getID','$verified_session_username','$remarks','$fname','$ip','$host','$date')")or die(mysqli_error($link));
      header("Location: ../../../../");
    }
      
  }
?>