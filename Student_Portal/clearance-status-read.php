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
      <h1>Clearance Status for <?php $str= trim($_GET["name"]);
      echo $str; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="clearance-status.php">Clearance Status</a></li>
          <li class="breadcrumb-item">Clearance Status of <?php echo $str; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of <?php echo $str; ?>'s Clearance Requirements for Students</h5>
              <?php
                    $count = 0;
                    // Attempt select query execution
                    $department = trim($_GET["name"]);
                    $sql = "SELECT * FROM clearance_requirements_students where department = '$department'";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="example" class="table datatable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>Clearance Name</th>";
                                        echo "<th scope='col'>Clearance Type</th>";
                                        echo "<th scope='col'>Status</th>";
                                        echo "<th scope='col'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['clearance_name'] . "</td>";
                                        echo "<td>" . $row['clearance_type'] . "</td>";
                                        $temp_id = $row['id'];
                                        $status = "";
                                        $sql1 = "SELECT * FROM clearance_student_status where clearance_requirement_id = '$temp_id' and student_id = '$verified_session_username' LIMIT 1";
                                        if($result1 = mysqli_query($link, $sql1)){
                                          if(mysqli_num_rows($result1) > 0){
                                            while($row1 = mysqli_fetch_array($result1)){
                                              $status = $row1['status'];
                                              $location = $row1['location'];
                                              echo "<td>" . $row1['status'] . "</td>";
                                            }
                                          } else{
                                            $status = 'Pending';
                                            $location = "";
                                              echo "<td>$status</td>";
                                          }
                                        } else{
                                            echo "Oops! Something went wrong. Please try again later.";
                                        }
                                        echo "<td>";
                                          echo '<a href="clearance-status-view.php?req_id='. $row['id'] .'&req_name='. $row['clearance_name'] .'&id='. trim($_GET["id"]) .'&name='. trim($_GET["name"]) .'" class="m-1 btn btn-primary" data-toggle="tooltip" title="View details"><span class="bi bi-info-lg"></span></a>';
                                          if($status == "Pending" && $row['clearance_type'] == "File Submission Soft Copy (Can be submitted online) or Hard Copy (Optional to submit the original copy)"){
                                            echo '<a href="clearance-status-upload.php?req_id='. $row['id'] .'&req_name='. $row['clearance_name'] .'&id='. trim($_GET["id"]) .'&name='. trim($_GET["name"]) .'" class="m-1 btn btn-info" data-toggle="tooltip" title="Upload a Document"><span class="bi bi-upload"></span></a>';
                                          }
                                          if($status == "Declined" && $location == "Database"){
                                            echo '<a href="clearance-status-upload.php?req_id='. $row['id'] .'&req_name='. $row['clearance_name'] .'&id='. trim($_GET["id"]) .'&name='. trim($_GET["name"]) .'&status='. $status . '" class="m-1 btn btn-info" data-toggle="tooltip" title="Upload a New Document"><span class="bi bi-upload"></span></a>';
                                          }
                                          echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-warning"><em>No Clearance Requirements Added Yet.</em></div>';
                            $count = 1;
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    // Close connection
                    mysqli_close($link);
                    ?>
              <div class="float-end mb-3">
                  <?php 
                    if($count == 0){
                      echo '<a href="clearance-get-appointment.php?id='. trim($_GET["id"]) .'&name='. trim($_GET["name"]) .'"><button type="button" class="btn btn-success">Request for Appointment</button></a>';
                    }
                  ?>
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