<?php
  include 'config.php';
  session_start();
  if(isset($_SESSION['session_username'])){
    $user_id_checker = $_SESSION['session_username'];

    $sql5 = "SELECT * FROM user_information where id_number = '$user_id_checker'";
            if($result5 = mysqli_query($link, $sql5)){
              if(mysqli_num_rows($result5) > 0){
                while($row5 = mysqli_fetch_array($result5)){
                  $verified_session_username = $row5['id_number'];
                  $verified_session_firstname = $row5['firstname'];
                  $verified_session_lastname = $row5['lastname'];
                  $verified_session_department = $row5['department'];
                  $verified_session_role = $row5['role'];
                  $_SESSION['session_role'] = $row5['role'];
                }
                // Free result set
                mysqli_free_result($result5);
              }
            }
    
    if(isset($verified_session_department) && (($verified_session_department == 'Clearance System')||($verified_session_department == 'SuperUser') )){
        if($verified_session_department == 'SuperUser'){
          $verified_session_role = $_SESSION['session_temp_role'];
        }
    }else{
        header("location:../../login.php");
        die();
    }
  }else{
    header("location:../../login.php");
    die();
  }
?>
