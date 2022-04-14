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
                }
                // Free result set
                mysqli_free_result($result5);
              }
            }
    
    if(isset($verified_session_department) && ($verified_session_username == $_SESSION['session_username'])){
        switch($verified_session_role){
          case "Clearance Administrator":
            //statement
            header("location:clearance-administrator/index.php");
            break;
          case "Laboratory Coordinator":
            //statement
            header("location:laboratory-coordinator/index.php");
            break;
          case "Book Coordinator":
            //statement
            header("location:book-coordinator/index.php");
            break;
          case "Library Coordinator":
            header("location:library-coordinator/index.php");
            //statement
            break;
          case "Cashier Coordinator":
            header("location:cashier-coordinator/index.php");
            //statement
            break;
          case "Registrar Coordinator":
            header("location:registrar-coordinator/index.php");
            //statement
            break;
          case "Guidance Coordinator":
            header("location:guidance-coordinator/index.php");
            //statement
            break;
          case "Department Head":
            //statement
            header("location:department-head/index.php");
            break;
          default:
            header("location:../../login.php");
            die();

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
