<?php
  include '../dbCon/bonak.php';
  session_start();
  if(isset($_SESSION['session_username']) == true){
    $user_id_checker = $_SESSION['session_username'];

    $sql6 = "SELECT * FROM user_information where id_number = '$user_id_checker'";
            if($result6 = mysqli_query($link, $sql6)){
              if(mysqli_num_rows($result6) > 0){
                while($row6 = mysqli_fetch_array($result6)){
                  $verified_session_username= $row6['id_number'];
                  $ad_fname = $row6['firstname'];
                  $ad_lname = $row6['lastname'];
                  $ad_mname = $row6['middlename'];
                  $verified_session_email = $row6['email'];
                  $verified_session_contact = $row6['contact'];
                  $verified_session_address = $row6['address'];
                  $verified_session_office = $row6['office'];
                  $verified_session_department = $row6['department'];
                  $dp = $row6['user_img'];
                  $ad_rolee = $row6['role'];
                  $verified_session_about = $row6['about'];
                  $verified_session_img = $row6['user_img'];
                  $encr = md5($ad_rolee);
                  $encri = sha1($encr);
                  $f = sha1($encri);
                  $jk = sha1($ad_rolee);
                  $d = password_hash($encr, PASSWORD_DEFAULT);
                  $url = $d."key".$encr.""."".$encri."".$f."".$jk;
                  $_SESSION['hehe'] = $url;           
                  $user_online = true;
                }
                // Free result set
                mysqli_free_result($result6);
              }
            }
    
    if(isset($verified_session_department) && ($verified_session_username == $_SESSION['session_username'])){
        switch($ad_rolee){
          case "Internship Administrator":
            //statement
            break;
          case "SuperAdmin":
            //statement
            break;
          default:  
            session_destroy();
           
            // header("location:index.php");
            header("location:../index.php");
            die();

        }
    }else{
        // header("location:index.php");
        $user_online = false;
        header("location:../index.php");
        die();
    }
  }else{
    // header("location:index.php");
    $user_online = false;
    header("location:../index.php");
    die();
  }
?>
