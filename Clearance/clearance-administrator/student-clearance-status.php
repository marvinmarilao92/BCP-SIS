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
      <h1>Students Clearance Status</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Students Clearance Status</li>
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
                    $sql = "SELECT * FROM student_information";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="example" class="table datatable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>ID Number</th>";
                                        echo "<th scope='col'>Full Name</th>";
                                        echo "<th scope='col'>Course</th>";
                                        echo "<th scope='col'>Section</th>";
                                        echo "<th scope='col'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td style='width:10%;'>" . $row['id_number'] . "</td>";
                                        echo "<td style='width:30%;'>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
                                        echo "<td>" . $row['course'] . "</td>";
                                        echo "<td>" . $row['section'] . "</td>";
                                        echo "<td>";
                                        echo '<a href="student-clearance-status-view.php?id='.$row['id_number'].'&name='.$row['firstname'].' '.$row['lastname'].'" target="" class="m-1 btn btn-primary" title="View Clearance" data-toggle="tooltip"><span class="bi bi-info-lg"></span></a>';
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
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    // Close connection
                    mysqli_close($link);
                    ?>
              <div class="float-end">
                <a href="previous-clearance-student.php"><button type="button" class="btn btn-info">View Previous Version</button></a>
                <a href="reset-clearance-student.php"><button type="button" class="btn btn-danger">Reset Clearance of Students</button></a>
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