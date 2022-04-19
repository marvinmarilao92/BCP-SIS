<?php
    include('../session.php');
    // database configuration
    require_once("../include/config.php");
    // Define variables and initialize with empty values
    $status = "Enrolled";
    // agon date
    $current_year = date("y");
    // Processing form data when form is submitted
    if(isset($_POST['Tfname'])&&isset($_POST['Tlname'])&&(isset($_POST['Tmname'])||!isset($_POST['Tmname']))){
      
      //agun implementation for student number
      $sqll = "SELECT id FROM student_information ORDER BY id DESC Limit 1";
      if($resultt = mysqli_query($link, $sqll)){
        if(mysqli_num_rows($resultt) == 0){
          $student_number = "" . $current_year . "010001";
        }
        else if(mysqli_num_rows($resultt) > 0){
          while($roww = mysqli_fetch_array($resultt)){
            if($roww['id'] < 9){
              $new_id = $roww['id'] + 1;
              $student_number = "" . $current_year . "01000" . $new_id;
            }
            else if ($roww['id'] == 9){
              $student_number = "" . $current_year . "010010";
            }
            else if ($roww['id'] < 99){
              $new_id = $roww['id'] + 1;
              $student_number = "" . $current_year . "0100" . $new_id;
            }
            else if ($roww['id'] == 99){
              $student_number = "" . $current_year . "010100";
            }
            else if ($roww['id'] < 999){
              $new_id = $roww['id'] + 1;
              $student_number = "" . $current_year . "010" . $new_id;
            }
            else if ($roww['id'] == 999){
              $student_number = "" . $current_year . "011000";
            }
            else if ($roww['id'] < 9999){
              $new_id = $roww['id'] + 1;
              $student_number = "" . $current_year . "01" . $new_id;
            }
            else if ($roww['id'] == 9999){
              $student_number = "" . $current_year . "010000";
            }
            else if ($roww['id'] < 99999){
              $new_id = $roww['id'] + 1;
              $student_number = "" . $current_year . "0" . $new_id;
            }
            else if ($roww['id'] == 99999){
              $student_number = "" . $current_year . "100000";
            }
            else if ($roww['id'] < 999999){
              $new_id = $roww['id'] + 1;
              $student_number = "" . $current_year . "" . $new_id;
            }
          }
        }
      }
      $code = mysqli_real_escape_string($link,trim($_POST["Tcode"]));
      $first_name = mysqli_real_escape_string($link,trim($_POST["Tfname"]));
      $last_name = mysqli_real_escape_string($link,trim($_POST["Tlname"]));
      $middle_name = mysqli_real_escape_string($link,trim($_POST["Tmname"]));
      $course = mysqli_real_escape_string($link,trim($_POST["Tcourse"]));
      $year_level = mysqli_real_escape_string($link,trim($_POST["Tyl"]));
      $section = mysqli_real_escape_string($link,trim($_POST["Tsec"]));
      $school_year = mysqli_real_escape_string($link,trim($_POST["Tsy"]));
      $address = mysqli_real_escape_string($link,trim($_POST["Taddress"]));
      $email = mysqli_real_escape_string($link,trim($_POST["Temail"]));
      $contact = mysqli_real_escape_string($link,trim($_POST["Tcontact"]));
      $gender = mysqli_real_escape_string($link,trim($_POST["Tgen"]));
      $birthday = date('Y-m-d', strtotime(mysqli_real_escape_string($link,trim($_POST["Tbday"]))));
      $nationality = mysqli_real_escape_string($link,trim($_POST["Tnation"]));
      $religion = mysqli_real_escape_string($link,trim($_POST["Treligion"]));
      $civil_status = mysqli_real_escape_string($link,trim($_POST["Tcs"]));
      $account_status = mysqli_real_escape_string($link,trim($_POST["Tstat"]));
      $password = password_hash("#ChangeMe01!", PASSWORD_BCRYPT, array('cost' => 12));  //PASSWORD_ARGON2I//PASSWORD_ARGON2ID
      
      //Check if the student number is not existing in the database
      $sql1 = "SELECT id FROM student_information WHERE id_number = '$student_number'";
      $result = mysqli_query($link,$sql1);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      
      //Check if the student number is not existing in the database
      $sql2 = "SELECT id FROM users WHERE id_number = '$student_number'";
      $result2 = mysqli_query($link,$sql2);
      $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
      $count2 = mysqli_num_rows($result2);
      
      // If the student number is not existing in the database, count must be 0
      if($count == 0 && $count2 == 0) {
        // Prepare an insert statement
        $sql = "INSERT INTO student_information (id_number, firstname, lastname, middlename, email, contact, address, course, year_level, section, school_year, gender, birthday, nationality, religion, civil_status, account_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "sssssssssssssssss", $student_number, $first_name, $last_name, $middle_name, $email, $contact, $address, $course, $year_level, $section, $school_year, $gender, $birthday, $nationality, $religion, $civil_status, $account_status);

          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
            //Create user account
            require_once "../core/update_key.php";
            $sql = "INSERT INTO users (id_number, password, login_key) VALUES (?, ?, ?)";

            if($stmt1 = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt1, "sss", $student_number, $password, $getQP);

              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt1)){
                  // Records created successfully. Redirect to landing page
             
                  $query = "UPDATE student_application SET account_status='$status' WHERE id_number='$code'";
                  if($query_run = mysqli_query($link, $query)){
                    // unset($_SESSION['status']);
                    $_SESSION['studnum'] = $student_number;
                    // echo ('success');
                    $query = "UPDATE datms_studreq SET id_number='$student_number' WHERE id_number='$code'";
                    if($query_run = mysqli_query($link, $query)){
                      // unset($_SESSION['status']);
                      $_SESSION['studnum'] = $student_number;
                      echo ('success');
                    }else{
                      echo ('failed');
                    }
                  }else{
                    echo ('failed');
                  }
                  

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
        mysqli_close($link);

      }else {
        echo ('failed');
      }
    }

?>