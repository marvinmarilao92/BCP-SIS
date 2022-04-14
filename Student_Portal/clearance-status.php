<?php
include('includes/session.php');
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
      <h1>Clearance Status</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Clearance Status</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->



    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Departments</h5>
              <?php
                    // Attempt select query execution
                    $sql = "SELECT * FROM clearance_department_students";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="example" class="table datatable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>Department</th>";
                                        echo "<th scope='col'>Pending/Under Review/Declined</th>";
                                        echo "<th scope='col'>Completed</th>";
                                        echo "<th scope='col'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['department_name'] . "</td>";

                                        $student_id = $verified_session_username;
                                        $temp_dep_id = $row['id'];
                                        $requirements_completed = 0;
                                        $requirements_pending_initial = 0;
                                        $sql1 = "SELECT * FROM clearance_student_status where clearance_department_id = $temp_dep_id and student_id = $student_id";
                                        if($result1 = mysqli_query($link, $sql1)){
                                          if(mysqli_num_rows($result1) > 0){
                                            while($row1 = mysqli_fetch_array($result1)){
                                              if($row1['status'] == "Completed"){
                                                $requirements_completed++;
                                              }
                                            }
                                          }
                                        }
                                        $temp_department = $row['department_name'];
                                        $sql1 = "SELECT * FROM clearance_requirements_students where department = '$temp_department' and status = 'Active'";
                                        if($result1 = mysqli_query($link, $sql1)){
                                          $requirements_pending_initial = mysqli_num_rows($result1);
                                        }
                                        $requirements_pending = $requirements_pending_initial - $requirements_completed;
                                        echo "<td>$requirements_pending</td>";
                                        echo "<td>$requirements_completed</td>";
                                        echo "<td>";
                                            echo '<a href="clearance-status-read.php?id='. $row['id'] .'&name='. $row['department_name'] .'" class="m-1 btn btn-info" title="View Record" data-toggle="tooltip"><span class="bi bi-eye-fill"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-warning"><em>No records were found.</em></div>';
                        }
                    }else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    // Close connection
                    mysqli_close($link);
                    ?>
              <div class="float-end mb-3">
                  <a href="clearance-appointments.php"><button type="button" class="btn btn-success">View Appointments</button></a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php
include ("includes/footer.php");
?>

</body>

</html>