<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Clearance Appointment</title>
<?php include ('core/css-links.php');//css connection?>

<body>

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'SCA' ; $col = 'clr'; include ('core/side-nav.php');//Design for sidebar?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Clearance Appointments for Students</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Clearance Appointments for Students</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Students' Clearance Appointments </h5>
              <?php
                    $temp_name = "";
                    // Attempt select query execution
                    $sql = "SELECT * FROM clearance_student_appointment where department = 'Registrar Coordinator'";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="example" class="table datatable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>Student ID</th>";
                                        echo "<th scope='col'>Name</th>";
                                        echo "<th scope='col'>Course</th>";
                                        echo "<th scope='col'>Year Level</th>";
                                        echo "<th scope='col'>Appointment Date</th>";
                                        echo "<th scope='col'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    $sql1 = "SELECT * FROM student_information where id_number = '" . $row['student_id'] ."'";
                                    if($result1 = mysqli_query($link, $sql1)){
                                      if(mysqli_num_rows($result1) > 0){
                                        while($row1 = mysqli_fetch_array($result1)){
                                          $temp_name = $row1['firstname'] . " " . $row1['lastname'];
                                          echo "<td>" . $row1['id_number'] . "</td>";
                                          echo "<td>" . $row1['firstname'] . " " . $row1['lastname'] . "</td>";
                                          echo "<td>" . $row1['course'] . "</td>";
                                          echo "<td>" . $row1['year_level'] . "</td>";
                                        }
                                      } else{
                                          echo '<div class="alert alert-warning"><em>No Clearance Appointments for today.</em></div>';
                                      }
                                    } else{
                                        echo "Oops! Something went wrong. Please try again later.";
                                      }
                                        echo "<td>" . $row['appointment_date'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="student-clearance-view.php?id='. $row['student_id'] .'&name='. $temp_name .'" class="m-1 btn btn-primary" title="View Clearance" data-toggle="tooltip"><span class="bi bi-eye"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-warning"><em>No Clearance Appointments for today.</em></div>';
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

 
  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>

</body>

</html>