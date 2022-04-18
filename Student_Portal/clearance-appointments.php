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
$page = 'clr' ; $col = 'Clearance'; include ("includes/sidebar.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Clearance Appointment</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Appointments</h5>
              <?php
                    // Attempt select query execution
                    $sql = "SELECT * FROM clearance_student_appointment where student_id = $verified_session_username";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="example" class="table datatable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>Department</th>";
                                        echo "<th scope='col'>Appointment Date</th>";
                                        echo "<th scope='col'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['department'] . "</td>";
                                        echo "<td>" . $row['appointment_date'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="clearance-status-read.php?id=" class="m-1 btn btn-danger" title="Cancel Appointment" data-toggle="tooltip"><span class="bi bi-x-lg"></span></a>';
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
                        <a href="clearance-status.php"><button type="button" class="btn btn-primary">Back</button></a>
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