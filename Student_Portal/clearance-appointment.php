<?php
include('includes/session.php');
$collapsed = "clearance-appointment";
if(isset($_GET["notif"]) && !empty(trim($_GET["notif"])) && trim($_GET["notif"])==1){
  $notif_id = trim($_GET["notif_id"]);
    $delete_query = "DELETE FROM datms_notification WHERE act2 = '$verified_session_username' AND stat2 = 1 and id = '$notif_id'";
    mysqli_query($link, $delete_query);
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="new-request" && isset($_POST["department_name"]) && isset($_POST["appointment_date"]) && isset($_POST["appointment_hour"])){
  $department_name = trim($_POST["department_name"]);
  $appointment_date = trim($_POST["appointment_date"]);
  $appointment_hour = trim($_POST["appointment_hour"]);
  $sql = "SELECT * FROM clearance_appointments where department_name = '$department_name' and id_number = '$verified_session_username' and status = 'Pending'";
  if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      // Prepare an update statement
      $sql = "UPDATE clearance_appointments SET appointment_code=?, appointment_date=?, appointment_hour=? WHERE id_number=? and department_name=? and status=?";
      if($stmt = mysqli_prepare($link, $sql)){
        $appointment_code = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'), 0, 8);
        $status = "Pending";
        mysqli_stmt_bind_param($stmt, "ssssss", $appointment_code, $appointment_date, $appointment_hour, $verified_session_username, $department_name, $status);
        if(mysqli_stmt_execute($stmt)){
          // Records updated successfully. Redirect to landing page
          header("location: clearance-appointment.php");
          exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
      }
    }else{
      $sql = "INSERT INTO clearance_appointments (appointment_code, id_number, name, department_name, appointment_date, appointment_hour, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
      if($stmt = mysqli_prepare($link, $sql)){
        $appointment_code = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'), 0, 8);
        $status = "Pending";
        $name = $verified_session_firstname.' '.$verified_session_lastname;
        mysqli_stmt_bind_param($stmt, "sssssss", $appointment_code, $verified_session_username, $name, $department_name, $appointment_date, $appointment_hour, $status);
        if(mysqli_stmt_execute($stmt)){
          // Records updated successfully. Redirect to landing page
          header("location: clearance-appointment.php");
          exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
      }
    }
  }
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="cancel-appointment" && isset($_POST["id"])){
  $id = trim($_POST["id"]);
  $status="Cancelled";
  // Prepare an update statement
  $sql = "UPDATE clearance_appointments SET status=? WHERE id=?";
  if($stmt = mysqli_prepare($link, $sql)){
    mysqli_stmt_bind_param($stmt, "ss", $status, $id);
    if(mysqli_stmt_execute($stmt)){
      // Records updated successfully. Redirect to landing page
      header("location: clearance-appointment.php");
      exit();
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
include ("includes/head.php");
?>

<body>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/js/dataTables.checkboxes.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script>
<?php
include ("includes/nav.php");
include ("includes/sidebar.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Clearance Appointments</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Clearance Appointments</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Clearance Appointments</h5>
              <?php
                  $today = date('Y-m-j');
                  // Attempt select query execution
                  $sql = "SELECT * FROM clearance_appointments where status = 'Waiting' and id_number = '$verified_session_username' ORDER BY status";
                  if($result = mysqli_query($link, $sql)){
                    echo '<table id="example" class="table datatable">';
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th scope='col'>Department Name</th>";
                            echo "<th scope='col'>Appointment Code</th>";
                            echo "<th scope='col'>Appointment Date</th>";
                            echo "<th scope='col'>Appointment Hour</th>";
                            echo "<th scope='col'>Action</th>";
                        echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                      if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                              echo "<td>" . $row['department_name'] . "</td>";
                              echo "<td>" . $row['appointment_code'] . "</td>";
                              echo "<td>" . $row['appointment_date'] . "</td>";
                              echo "<td>" . $row['appointment_hour'] . "</td>";
                              echo "<td>";
                                echo '
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
                                      <input type="hidden" name="action" value="cancel-appointment">
                                      <input type="hidden" name="id" value="'. $row['id'] .'">
                                      <button type="submit" class="btn btn-danger btn-sm" title="Cancel Appointment" data-toggle="tooltip"><span class="bi bi-x"></span></button>
                                    </form>
                                  </div>';
                              echo "</td>";
                          echo "</tr>";
                        }
                      } else{
                          echo "<td class='text-center' colspan='5'>No Appointments Added Yet</td>";
                      }
                    echo "</tbody>";                            
                    echo "</table>";
                  } else{
                      echo "Oops! Something went wrong. Please try again later.";
                  }
                    ?>
              <div class="float-end">
                  <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#view-appointment-requests-modal">Appointment Request</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- Appointment Record Modal -->
  <div class="modal fade" id="view-appointment-requests-modal" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">List of Pending Clearance Appointments</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php
            // Attempt select query execution
            $sql = "SELECT * FROM clearance_appointments where status = 'Pending' and id_number = '$verified_session_username' ORDER BY appointment_date";
            if($result = mysqli_query($link, $sql)){
              echo '<table id="example" class="table datatable">';
              echo "<thead>";
                  echo "<tr>";
                      echo "<th scope='col'>Department Name</th>";
                      echo "<th scope='col'>Appointment Code</th>";
                      echo "<th scope='col'>Appointment Date</th>";
                      echo "<th scope='col'>Appointment Hour</th>";
                      echo "<th scope='col'>Action</th>";
                  echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['department_name'] . "</td>";
                        echo "<td>" . $row['appointment_code'] . "</td>";
                        echo "<td>" . $row['appointment_date'] . "</td>";
                        echo "<td>" . $row['appointment_hour'] . "</td>";
                        echo "<td>";
                          echo '
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
                                <input type="hidden" name="action" value="cancel-appointment">
                                <input type="hidden" name="id" value="'. $row['id'] .'">
                                <button type="submit" class="btn btn-danger btn-sm" title="Cancel Appointment Request" data-toggle="tooltip"><span class="bi bi-x"></span></button>
                              </form>
                            </div>';
                        echo "</td>";
                    echo "</tr>";
                  }
                } else{
                    echo "<td class='text-center' colspan='6'>No Appointment Requests Yet</td>";
                }
              echo "</tbody>";                            
              echo "</table>";
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new-appointment-requests-modal">Request New Appointment</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
        </div>
      </div>
    </div>
  </div><!-- End Appointment Record Modal-->
  
  <!-- Appointment Record Modal -->
  <div class="modal fade" id="new-appointment-requests-modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Request New Appointment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <input type="hidden" name="action" value="new-request">
            <div class="form-floating mb-3">
              <select class="form-select" id="floatingSelect" aria-label="Floating label select example" required name="department_name">
                <option selected value=""></option>
                <?php 
                  $sql = "SELECT * FROM clearance_department_students";
                  if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                      while($row = mysqli_fetch_array($result)){
                        echo "<option value='".$row['department_name']."'>".$row['department_name']."</option>";
                      }
                    }
                  }
                ?>
              </select>
              <label for="floatingSelect">Select Department</label>
            </div>
            <div class="form-floating mb-3">
              <input type="date" class="form-control" id="floatingInput" required name="appointment_date">
              <label for="floatingInput">Appointment Date</label>
            </div>
            <div class="form-floating mb-3">
              <select class="form-select" id="floatingSelect" aria-label="Floating label select example" required name="appointment_hour">
                <option selected value=""></option>
                <option value="8am-10am">8am-10am</option>
                <option value="10am-12pm">10am-12pm</option>
                <option value="1pm-3pm">1pm-3pm</option>
                <option value="3pm-5pm">3pm-5pm</option>
              </select>
              <label for="floatingSelect">Appointment Hour</label>
            <div class="float-end mt-3">
                <input type="submit" class="btn btn-primary" value="Send Request">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#view-appointment-requests-modal" aria-label="Close">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div><!-- End Appointment Record Modal-->
<?php
include ("includes/footer.php");
?>
</body>

</html>