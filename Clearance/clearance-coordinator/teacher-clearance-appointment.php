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
$page = 'TCA' ; $col = 'clr1'; include ("includes/sidebar.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Clearance Appointments for Teachers</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Clearance Appointments for Teachers</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Teachers' Clearance Appointments</h5>
              <?php
                    $temp_name = "";
                    // Attempt select query execution
                    $sql = "SELECT * FROM clearance_teacher_appointment where department = '$verified_session_role'";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="example" class="table datatable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>Teacher ID</th>";
                                        echo "<th scope='col'>Name</th>";
                                        echo "<th scope='col'>Course</th>";
                                        echo "<th scope='col'>Appointment Date</th>";
                                        echo "<th scope='col'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    $sql1 = "SELECT * FROM teacher_information where id_number = '" . $row['teacher_id'] ."'";
                                    if($result1 = mysqli_query($link, $sql1)){
                                      if(mysqli_num_rows($result1) > 0){
                                        while($row1 = mysqli_fetch_array($result1)){
                                          $temp_name = $row1['firstname'] . " " . $row1['lastname'];
                                          echo "<td>" . $row1['id_number'] . "</td>";
                                          echo "<td>" . $row1['firstname'] . " " . $row1['lastname'] . "</td>";
                                          echo "<td>" . $row1['course'] . "</td>";
                                        }
                                      } else{
                                          echo '<div class="alert alert-warning"><em>No Clearance Appointments Yet.</em></div>';
                                      }
                                    } else{
                                        echo "Oops! Something went wrong. Please try again later.";
                                      }
                                        echo "<td>" . $row['appointment_date'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="teacher-clearance-view.php?id='. $row['teacher_id'] .'&name='. $temp_name .'" class="m-1 btn btn-primary" title="View Clearance" data-toggle="tooltip"><span class="bi bi-eye-fill"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-warning"><em>No Clearance Appointments Yet.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    // Close connection
                    mysqli_close($link);
                    ?>

            </div>
            <!-- <div class="container-fluid">
              <div class="float-end mb-4">
                  <a href="" class="btn btn-success pull-right">View Appointments Calendar</a>
              </div>
            </div> -->
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