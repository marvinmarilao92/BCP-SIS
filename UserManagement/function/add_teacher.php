<?php
  require_once("../includes/conn.php");
  // Processing form data when form is submitted
  if(isset($_POST['Tfname'])&&isset($_POST['Tlname'])&&(isset($_POST['Tmname'])||!isset($_POST['Tmname']))&&isset($_POST['Tcourse'])&&isset($_POST['Taddress'])&&isset($_POST['Temail'])&&isset($_POST['Tcontact'])&&isset($_POST['Tgen'])&&isset($_POST['Tbday'])&&isset($_POST['Tnation'])&&isset($_POST['Treligion'])&&isset($_POST['Tstat'])){
      
      // $id_number = mysqli_real_escape_string($conn,trim($_POST["id_number"]));\
      $current_year = date("y");
      //agun implementation for student number
      $sqll = "SELECT id FROM teacher_information ORDER BY id DESC Limit 1";
      if($resultt = mysqli_query($conn, $sqll)){
        if(mysqli_num_rows($resultt) == 0){
          $id_number = "" . $current_year . "000001";
        }
        else if(mysqli_num_rows($resultt) > 0){
          while($roww = mysqli_fetch_array($resultt)){
            if($roww['id'] < 9){
              $new_id = $roww['id'] + 1;
              $id_number = "" . $current_year . "00000" . $new_id;
            }
            else if ($roww['id'] == 9){
              $id_number = "" . $current_year . "000010";
            }
            else if ($roww['id'] < 99){
              $new_id = $roww['id'] + 1;
              $id_number = "" . $current_year . "0000" . $new_id;
            }
            else if ($roww['id'] == 99){
              $id_number = "" . $current_year . "000100";
            }
            else if ($roww['id'] < 999){
              $new_id = $roww['id'] + 1;
              $id_number = "" . $current_year . "000" . $new_id;
            }
            else if ($roww['id'] == 999){
              $id_number = "" . $current_year . "001000";
            }
            else if ($roww['id'] < 9999){
              $new_id = $roww['id'] + 1;
              $id_number = "" . $current_year . "00" . $new_id;
            }
            else if ($roww['id'] == 9999){
              $id_number = "" . $current_year . "010000";
            }
            else if ($roww['id'] < 99999){
              $new_id = $roww['id'] + 1;
              $id_number = "" . $current_year . "0" . $new_id;
            }
            else if ($roww['id'] == 99999){
              $id_number = "" . $current_year . "100000";
            }
            else if ($roww['id'] < 999999){
              $new_id = $roww['id'] + 1;
              $id_number = "" . $current_year . "" . $new_id;
            }
          }
        }
      }
    $userid ="T".$id_number;
    $first_name = mysqli_real_escape_string($conn,trim($_POST["Tfname"]));
    $last_name = mysqli_real_escape_string($conn,trim($_POST["Tlname"]));
    $middle_name = mysqli_real_escape_string($conn,trim($_POST["Tmname"]));
    $course = mysqli_real_escape_string($conn,trim($_POST["Tcourse"]));
    $address = mysqli_real_escape_string($conn,trim($_POST["Taddress"]));
    $email = mysqli_real_escape_string($conn,trim($_POST["Temail"]));
    $contact = mysqli_real_escape_string($conn,trim($_POST["Tcontact"]));
    $gender = mysqli_real_escape_string($conn,trim($_POST["Tgen"]));
    $birthday = date('Y-m-d', strtotime(mysqli_real_escape_string($conn,trim($_POST["Tbday"]))));
    $nationality = mysqli_real_escape_string($conn,trim($_POST["Tnation"]));
    $religion = mysqli_real_escape_string($conn,trim($_POST["Treligion"]));
    $civil_status = mysqli_real_escape_string($conn,trim($_POST["Tstat"]));
    $account_status = "Active";
    $password = password_hash("#ChangeMe01!", PASSWORD_BCRYPT, array('cost' => 12));  //PASSWORD_ARGON2I//PASSWORD_ARGON2ID
    //Check if the id number is not existing in the database
    $sql1 = "SELECT id FROM teacher_information WHERE id_number = '$userid'";
    $result = mysqli_query($conn,$sql1);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    
    //Check if the id number is not existing in the database
    $sql2 = "SELECT id FROM users WHERE id_number = '$userid'";
    $result2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
    $count2 = mysqli_num_rows($result2);
    
    // If the id number is not existing in the database, count must be 0
    if($count == 0 && $count2 == 0) {
      // Prepare an insert statement
      $sql = "INSERT INTO teacher_information (id_number, firstname, lastname, middlename, email, contact, address, course, gender, birthday, nationality, religion, civil_status, account_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

      if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssssssssssss", $userid, $first_name, $last_name, $middle_name, $email, $contact, $address, $course, $gender, $birthday, $nationality, $religion, $civil_status, $account_status);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
          //Create user account
          $sql = "INSERT INTO users (id_number, password, login_key) VALUES (?, ?, ?)";

          if($stmt1 = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            require_once "../includes/update_key.php";
            mysqli_stmt_bind_param($stmt1, "sss", $userid, $password, $getQP);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt1)){
                // Records created successfully. Redirect to landing page
                echo ('success');
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
          }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
      }

      // Close statement
      mysqli_stmt_close($stmt);

      // Close connection
      mysqli_close($conn);

    }else {
      echo ('failed');
    }
  }
?>