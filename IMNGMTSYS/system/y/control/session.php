<?php
  include '../dbCon/bonak.php';
  session_start();
  if(isset($_SESSION['session_username'])){
    $user_id_checker = $_SESSION['session_username'];

    $sql5 = "SELECT * FROM user_information where id_number = '$user_id_checker'";
            if($result5 = mysqli_query($link, $sql5)){
              if(mysqli_num_rows($result5) > 0){
                while($row5 = mysqli_fetch_array($result5)){
                  $verified_session_username= $row5['id_number'];
                  $verified_session_firstname = $row5['firstname'];
                  $verified_session_lastname = $row5['lastname'];
                  $verified_session_email = $row5['email'];
                  $verified_session_contact = $row5['contact'];
                  $verified_session_address = $row5['address'];
                  $verified_session_office = $row5['office'];
                  $verified_session_department = $row5['department'];
                  $verified_session_role = $row5['role'];
                  $verified_session_about = $row5['about'];
                  $verified_session_img = $row5['user_img'];
                  $encr = md5($verified_session_role);
                  $encri = sha1($encr);
                  $f = sha1($encri);
                  $jk = sha1($verified_session_role);
                  $d = password_hash($encr, PASSWORD_DEFAULT);
                  $url = $d."key".$encr.""."".$encri."".$f."".$jk;
                  $_SESSION['hehe'] = $url;           
                  $user_online = true;
                }
                // Free result set
                mysqli_free_result($result5);
              }
            }
    
    if(isset($verified_session_department) && ($verified_session_username == $_SESSION['session_username'])){
        switch($verified_session_role){
          case "Internship Coordinator":
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
