<?php
include('includes/session.php');
$sql = "SELECT * FROM clearance_teacher_semester ORDER BY id DESC LIMIT 1";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
      $current_sem = $row['name']." SY: ".$row['school_year'];
    }
  }else{
    $current_sem = "";
  }
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
      <h1>Teachers Clearance Status <?php echo $current_sem; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Teachers Clearance Status <?php echo $current_sem; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <?php 
          $semester = 0;
          $sql = "SELECT * FROM clearance_teacher_semester_current LIMIT 1";
          if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
                $semester = $row['semester_id'];
              }
            } else{
                echo '<div class="alert alert-warning"><em>Clearance Completion has not started yet.</em></div>';
            }
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }
          if($semester == 0){ ?>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"></h5>
            <?php
            echo '<div class="alert alert-warning"><em>Clearance Completion has not started yet.</em></div>';
            ?>
                <div class="float-end">
                  <a href="new-clearance-teacher.php"><button type="button" class="btn btn-success">Start New Clearance of teachers</button></a>
                </div>
              </div>
            </div>
          <?php
          }else{
          ?>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of teachers</h5>
              <?php
                    // Attempt select query execution
                    $sql = "SELECT * FROM teacher_information";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="example" class="table datatable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>ID Number</th>";
                                        echo "<th scope='col'>Full Name</th>";
                                        echo "<th scope='col'>Course</th>";
                                        echo "<th scope='col'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id_number'] . "</td>";
                                        echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
                                        echo "<td>" . $row['course'] . "</td>";
                                        echo "<td>";
                                        echo '<a href="teacher-clearance-status-view.php?id='.$row['id_number'].'&name='.$row['firstname'].' '.$row['lastname'].'" target="" class="m-1 btn btn-primary" title="View Clearance" data-toggle="tooltip"><span class="bi bi-info-lg"></span></a>';
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
                <a href="previous-clearance-teacher.php"><button type="button" class="btn btn-info">View Previous Semester</button></a>
                <a href="add-new-clearance-teacher.php"><button type="button" class="btn btn-success">Start New Clearance of teachers</button></a>
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

</body>

</html>