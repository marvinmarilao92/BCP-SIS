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
      <h1>View Previous Semester</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">View Previous Semester</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Previous Semester</h5>
              <?php
                    // Attempt select query execution
                    $sql = "SELECT * FROM clearance_student_semester";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) == 1){
                          echo '<div class="alert alert-warning"><em>No Previous Semester Recorded Yet.</em></div>';
                        }else if(mysqli_num_rows($result) > 0){
                            echo '<table id="example" class="table datatable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>School Year</th>";
                                        echo "<th scope='col'>Semester</th>";
                                        echo "<th scope='col'>Date Started</th>";
                                        echo "<th scope='col'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                $count = 1;
                                while($row = mysqli_fetch_array($result)){
                                  if(mysqli_num_rows($result) != $count){
                                    $count++;
                                    echo "<tr>";
                                        echo "<td style='width:30%;'>" . $row['school_year'] . "</td>";
                                        echo "<td style='width:30%;'>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['date_started'] . "</td>";
                                        echo "<td>";
                                        echo '<a href="student-clearance-previous.php?id='.$row['id'].'" target="" class="m-1 btn btn-primary" title="View Record" data-toggle="tooltip"><span class="bi bi-eye"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                  }
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-warning"><em>No Previous Semester Recorded Yet.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    // Close connection
                    mysqli_close($link);
                    ?>
              <div class="float-end">
                <a href="student-clearance.php"><button type="button" class="btn btn-primary">Back</button></a>
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