<?php
include('includes/session.php');
$collapsed = "semestral-clearance";
$sql = "SELECT * FROM clearance_semester ORDER BY id DESC LIMIT 1";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
      $current_sem = $row['name']." SY: ".$row['school_year'];
    }
  }else{
    $current_sem = "";
  }
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="add" && isset($_POST["semester"]) && isset($_POST["school_year"])){
  $semester = trim($_POST["semester"]);
  $school_year = trim($_POST["school_year"]);
  // Set the new timezone
  date_default_timezone_set('Asia/Manila');
  $date_started = date('Y-m-d H:i:s');
  // Prepare an insert statement
  $sql = "INSERT INTO clearance_semester (name, school_year, date_started) VALUES (?, ?, ?)";
  if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "sss", $param_semester, $param_school_year, $date_started);
    // Set parameters
    $param_semester = $semester;
    $param_school_year = $school_year;
    $param_date_started = $date_started;
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
      $sql = "SELECT * FROM clearance_semester ORDER BY id DESC LIMIT 1";
      if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_array($result)){
            $id = $row['id'];
          }
        }
      }else{
        echo "Oops! Something went wrong. Please try again later.";
      }
      $sql = "UPDATE clearance_semester_current SET semester_id=? WHERE id=?";
      if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ii", $param_semester_id, $param_id);
        // Set parameters
        $param_semester_id = $id;
        $param_id = 0;
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
          //Add Record of Students
          $sql = "SELECT * FROM clearance_department_students";
          if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
                $temp_dept = $row['department_name'];
                $sql1 = "SELECT * FROM student_information";
                if($result1 = mysqli_query($link, $sql1)){
                  if(mysqli_num_rows($result1) > 0){
                    while($row1 = mysqli_fetch_array($result1)){
                      $id_number = $row1['id_number'];
                      $firstname = $row1['firstname'];
                      $lastname = $row1['lastname'];
                      $course = $row1['course'];
                      $sql2 = "SELECT * FROM clearance_students_record where student_id = '".$id_number."' and department_name = '".$temp_dept."' LIMIT 1";
                      if($result2 = mysqli_query($link, $sql2)){
                        if(mysqli_num_rows($result2) > 0){
                          while($row2 = mysqli_fetch_array($result2)){
                            $status = "Pending";
                            $description = $row2['description'];
                            $sql3 = "INSERT INTO clearance_semestral_clearance_list (id_number, firstname, lastname, course, department_name, status, description, semester_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                            if($stmt1 = mysqli_prepare($link, $sql3)){
                              // Bind variables to the prepared statement as parameters
                              mysqli_stmt_bind_param($stmt1, "sssssssi", $id_number, $firstname, $lastname, $course, $temp_dept, $status, $description, $id);
                              if(mysqli_stmt_execute($stmt1)){
                              }
                            }else{
                              echo "error";
                            }
                          }
                        }else{
                          $status = "Cleared";
                          $description = "";
                          $sql3 = "INSERT INTO clearance_semestral_clearance_list (id_number, firstname, lastname, course, department_name, status, date, description, semester_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                          if($stmt1 = mysqli_prepare($link, $sql3)){
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt1, "ssssssssi", $id_number, $firstname, $lastname, $course, $temp_dept, $status, $date_started, $description, $id);
                            if(mysqli_stmt_execute($stmt1)){
                            }
                          }
                        }
                      }else{
                        echo "Oops! Something went wrong. Please try again later.";
                      }
                    }
                  }
                }else{
                  echo "Oops! Something went wrong. Please try again later.";
                }
              }
            }
          }else{
            echo "Oops! Something went wrong. Please try again later.";
          }
          //Add Record of Teachers
          $sql = "SELECT * FROM clearance_department_teachers";
          if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
                $temp_dept = $row['department_name'];
                $sql1 = "SELECT * FROM teacher_information";
                if($result1 = mysqli_query($link, $sql1)){
                  if(mysqli_num_rows($result1) > 0){
                    while($row1 = mysqli_fetch_array($result1)){
                      $id_number = $row1['id_number'];
                      $firstname = $row1['firstname'];
                      $lastname = $row1['lastname'];
                      $course = $row1['course'];
                      $sql2 = "SELECT * FROM clearance_teachers_record where teacher_id = '".$id_number."' and department_name = '".$temp_dept."' LIMIT 1";
                      if($result2 = mysqli_query($link, $sql2)){
                        if(mysqli_num_rows($result2) > 0){
                          while($row2 = mysqli_fetch_array($result2)){
                            $status = "Pending";
                            $description = $row2['description'];
                            $sql3 = "INSERT INTO clearance_semestral_clearance_list (id_number, firstname, lastname, course, department_name, status, description, semester_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                            if($stmt1 = mysqli_prepare($link, $sql3)){
                              // Bind variables to the prepared statement as parameters
                              mysqli_stmt_bind_param($stmt1, "sssssssi", $id_number, $firstname, $lastname, $course, $temp_dept, $status, $description, $id);
                              if(mysqli_stmt_execute($stmt1)){
                              }
                            }else{
                              echo "error";
                            }
                          }
                        }else{
                          $status = "Cleared";
                          $description = "";
                          $sql3 = "INSERT INTO clearance_semestral_clearance_list (id_number, firstname, lastname, course, department_name, status, date, description, semester_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                          if($stmt1 = mysqli_prepare($link, $sql3)){
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt1, "ssssssssi", $id_number, $firstname, $lastname, $course, $temp_dept, $status, $date_started, $description, $id);
                            if(mysqli_stmt_execute($stmt1)){
                            }
                          }
                        }
                      }else{
                        echo "Oops! Something went wrong. Please try again later.";
                      }
                    }
                  }
                }else{
                  echo "Oops! Something went wrong. Please try again later.";
                }
              }
            }
          }else{
            echo "Oops! Something went wrong. Please try again later.";
          }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
      }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
  }
  unset($_POST['action']);
  unset($_POST['semester']);
  unset($_COOKIE['school_year']);
  // Records updated successfully. Redirect to landing page
  header("location: semestral-clearance.php?notif=success");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
include ("includes/head.php");
?>

<body>

<?php
include ("includes/nav.php");
include ("includes/sidebar.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?php echo $current_sem; ?> Semestral Clearance</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><?php echo $current_sem; ?> Semestral Clearance</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <?php 
          $semester = 0;
          $sql = "SELECT * FROM clearance_semester_current LIMIT 1";
          if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
                $semester = $row['semester_id'];
              }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }
          if($semester == 0){ ?>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"></h5>
            <?php
            echo '<div class="alert alert-warning"><em>Semestral Clearance has not started yet.</em></div>';
            ?>
                <div class="float-end">
                  <!-- <a href="new-clearance-student.php"><button type="button" class="btn btn-success">Start Semestral Clearance</button></a> -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#semestral-clearance-add">Start Semestral Clearance</button>
                </div>
              </div>
            </div>
          <?php
          }else{
          ?>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Clearance</h5>
              <?php
                    // Attempt select query execution
                    $sql = "SELECT * FROM clearance_semestral_clearance_list";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="example" class="table datatable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>ID Number</th>";
                                        echo "<th scope='col'>Full Name</th>";
                                        echo "<th scope='col'>Course</th>";
                                        echo "<th scope='col'>Pending</th>";
                                        echo "<th scope='col'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                $sql = "SELECT * FROM student_information";
                                if($result = mysqli_query($link, $sql)){
                                  if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                      echo "<tr>";
                                        echo "<td>" . $row['id_number'] . "</td>";
                                        echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
                                        echo "<td>" . $row['course'] . "</td>";
                                        $sql1 = "SELECT * FROM clearance_semestral_clearance_list where id_number = '".$row['id_number']."' and status = 'Pending'";
                                        if($result1 = mysqli_query($link, $sql1)){
                                          echo "<td>" . mysqli_num_rows($result1) . "</td>";
                                        } else{
                                          echo "Oops! Something went wrong. Please try again later.";
                                        }
                                        echo "<td>";
                                          echo '<a href="" target="" class="m-1 btn btn-primary" title="View Clearance" data-toggle="tooltip"><span class="bi bi-info-lg"></span></a>';
                                        echo "</td>";
                                      echo "</tr>";
                                    }
                                  }
                                } else{
                                  echo "Oops! Something went wrong. Please try again later.";
                                }
                                $sql = "SELECT * FROM teacher_information";
                                if($result = mysqli_query($link, $sql)){
                                  if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                      echo "<tr>";
                                        echo "<td>" . $row['id_number'] . "</td>";
                                        echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
                                        echo "<td>" . $row['course'] . "</td>";
                                        $sql1 = "SELECT * FROM clearance_semestral_clearance_list where id_number = '".$row['id_number']."' and status = 'Pending'";
                                        if($result1 = mysqli_query($link, $sql1)){
                                          echo "<td>" . mysqli_num_rows($result1) . "</td>";
                                        } else{
                                          echo "Oops! Something went wrong. Please try again later.";
                                        }
                                        echo "<td>";
                                          echo '<a href="" target="" class="m-1 btn btn-primary" title="View Clearance" data-toggle="tooltip"><span class="bi bi-info-lg"></span></a>';
                                        echo "</td>";
                                      echo "</tr>";
                                    }
                                  }
                                } else{
                                  echo "Oops! Something went wrong. Please try again later.";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                        } else{
                            echo '<div class="alert alert-warning"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    ?>
              <div class="float-end">
                <a href="previous-clearance-student.php"><button type="button" class="btn btn-info">View Previous Semester</button></a>
                <a href="add-new-clearance-student.php"><button type="button" class="btn btn-success">Start New Clearance of Students</button></a>
              </div>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
    </section>


  </main><!-- End #main -->

<?php
include ("includes/footer.php");
?>
  <!-- Students Record Modal -->
  <div class="modal fade" id="semestral-clearance-add" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Start Semestral Clearance</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- General Form Elements -->
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">  
              <h4 class="alert-heading">A Notification will be send to all of students and teachers informing that the semestral has started.</h4>
              <p>Once you started a new semestral clearance, the previous record of clearance will be saved to database.</p>
              <hr>
              <p class="mb-0">© Copyright Bestlink College of the Philippines. All Rights Reserved.</p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="form-floating mb-3">
              <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="semester" Required>
                <option value="" selected="selected" disabled="disabled"></option>
                <option value="1st Semester">1st Semester</option>
                <option value="2nd Semester">2nd Semester</option>
              </select>
              <label for="floatingSelect">Select Semester</label>
            </div>
            <div class="form-floating mb-3">
              <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="school_year" Required>
                <option value="" selected="selected" disabled="disabled"></option>
                <option value="2019-2020">2019-2020</option>
                <option value="2020-2021">2020-2021</option>
                <option value="2021-2022">2021-2022</option>
                <option value="2022-2023">2022-2023</option>
                <option value="2023-2024">2023-2024</option>
                <option value="2024-2025">2024-2025</option>
                <option value="2025-2026">2025-2026</option>
              </select>
              <label for="floatingSelect">Select School Year</label>
            </div>
            <div class="float-end">
              <input type="hidden" name="action" value="add">
              <input type="submit" class="btn btn-primary" value="Submit">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form><!-- End General Form Elements -->
        </div>
      </div>
    </div>
  </div><!-- End Students Record Modal-->
</body>

</html>