<?php
//fetch.php
require_once("../include/conn.php");
require_once("../session.php");
$output = '';
$error = '';
$idenifier='';
$d1;
$d2;
if(isset($_POST["query"]))
{
  $search = mysqli_real_escape_string($conn, $_POST["query"]);
  $query  = "SELECT *,LEFT(middlename,1) as MI FROM student_information WHERE course = '".$verified_session_office."' AND id_number = '".$search."'";
  $result = mysqli_query($conn, $query);


  if(mysqli_num_rows($result) > 0)
  {
    while($row = mysqli_fetch_array($result))
    {
      //array data
        $idnum = $row["id_number"];
        $fname = $row["firstname"];
        $lname = $row["lastname"];
        $mname = $row["MI"];
        $course = $row["course"];
        $YL = $row["year_level"];
        $sec = $row["section"];
        $SY = $row["school_year"];
        $AS = $row["account_status"];

      $output .= ' <small>Name: '. $fname .' '. $mname .'. '. $lname .' ('. $YL .' | '. $course .' Student | Sec: '. $sec .')</small>    
      ';
      
    }
  echo $output;
        }else{
          $query = "SELECT *,LEFT(middlename,1) as MI FROM user_information WHERE `account_status` NOT IN ('Deactivated') AND id_number = '".$search."'";
          $result = mysqli_query($conn, $query);
          if(mysqli_num_rows($result) > 0)
          {
            while($row = mysqli_fetch_array($result))
            {
              //array data
                $idnum = $row["id_number"];
                $fname = $row["firstname"];
                $lname = $row["lastname"];
                $mname = $row["MI"];
                $dept = $row["office"];
                $subsys = $row["department"];
                $role = $row["role"];
    
                $output .= ' <small>Name: '. $fname .' '. $mname .'. '. $lname .' ('. $subsys .' | '. $role .' | '. $dept .')</small>';    
            }
          echo $output;
          }else{
            $query1  = "SELECT *,LEFT(middlename,1) as MI FROM teacher_information WHERE course = '".$verified_session_office."' AND `account_status` NOT IN ('Deactivated') AND id_number = '".$search."'";
            $result1 = mysqli_query($conn, $query1);
              if (mysqli_num_rows($result1) > 0){
                while($row2 = mysqli_fetch_array($result1))
                  {
                    //array data
                      $idnum1 = $row2["id_number"];
                      $fname1 = $row2["firstname"];
                      $lname1 = $row2["lastname"];
                      $mname1 = $row2["MI"];
                      $course1 = $row2["course"];
                      // $doc_desc = $row["year_level"];
                      // $doc_actor1 = $row["section"];
                      // $doc_actor1 = $row["school_year"];
                      $doc_actor1 = $row2["account_status"];
                    $output .= ' <small>Name: '. $fname1 .' '. $mname1 .'. '. $lname1.' ('. $course1 .' Teacher)</small>';          
                  }
                echo $output;
              }else{
                $error .='
                <div class="alert alert-primary border-light alert-dismissible fade show" role="alert">
                  <i class="bi bi-info-circle me-1"></i>
                  No Data Detected
                </div>
                ';
              echo $error;
              }
           
          }
        }
}else{
    $error .='
    <div class="alert alert-primary border-light alert-dismissible fade show" role="alert">
      <i class="bi bi-info-circle me-1"></i>
      No Data Detected
    </div>
  ';
  echo $error;
}


?>