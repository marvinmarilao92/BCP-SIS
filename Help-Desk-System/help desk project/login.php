<?php
 include("config.php");
   session_start();
   
   if( filter_input(INPUT_SERVER,"REQUEST_METHOD") == "POST") {
      // username and password sent from form 
      
  $username = mysqli_real_escape_string($link,filter_input(INPUT_POST, 'user'));
  $password = mysqli_real_escape_string($link,filter_input(INPUT_POST, 'pass')); 
      
$sql = "SELECT id FROM employees WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $username;
         
         header("location: adminwindow.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
 
