<?php
include('includes/session.php');
$collapsed = "clearance-appointment";
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="accept-appointment" && isset($_POST["id"])){
  $id = trim($_POST["id"]);
  $status="Waiting";
  // Prepare an update statement
  $sql = "UPDATE clearance_appointments SET status=? WHERE id=? and department_name=?";
  if($stmt = mysqli_prepare($link, $sql)){
    mysqli_stmt_bind_param($stmt, "sis", $status, $id, $verified_session_role);
    if(mysqli_stmt_execute($stmt)){
      unset($_POST['action']);
      unset($_POST['id']);
      // Records updated successfully. Redirect to landing page
      header("location: clearance-appointment.php");
      exit();
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
  }
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="mark-done" && isset($_POST["id"])){
  $id = trim($_POST["id"]);
  $status="Done";
  // Prepare an update statement
  $sql = "UPDATE clearance_appointments SET status=? WHERE id=? and department_name=?";
  if($stmt = mysqli_prepare($link, $sql)){
    mysqli_stmt_bind_param($stmt, "sis", $status, $id, $verified_session_role);
    if(mysqli_stmt_execute($stmt)){
      unset($_POST['action']);
      unset($_POST['id']);
      // Records updated successfully. Redirect to landing page
      header("location: clearance-appointment.php");
      exit();
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
  }
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="mark-overdue" && isset($_POST["id"])){
  $id = trim($_POST["id"]);
  $status="Overdue";
  // Prepare an update statement
  $sql = "UPDATE clearance_appointments SET status=? WHERE id=? and department_name=?";
  if($stmt = mysqli_prepare($link, $sql)){
    mysqli_stmt_bind_param($stmt, "sis", $status, $id, $verified_session_role);
    if(mysqli_stmt_execute($stmt)){
      unset($_POST['action']);
      unset($_POST['id']);
      // Records updated successfully. Redirect to landing page
      header("location: clearance-appointment.php");
      exit();
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
  }
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="decline-appointment" && isset($_POST["id"])){
  $id = trim($_POST["id"]);
  $status="Declined";
  // Prepare an update statement
  $sql = "UPDATE clearance_appointments SET status=? WHERE id=? and department_name=?";
  if($stmt = mysqli_prepare($link, $sql)){
    mysqli_stmt_bind_param($stmt, "sis", $status, $id, $verified_session_role);
    if(mysqli_stmt_execute($stmt)){
      unset($_POST['action']);
      unset($_POST['id']);
      // Records updated successfully. Redirect to landing page
      header("location: clearance-appointment.php?modal=show");
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
<?php 
if(isset($_GET["modal"]) && trim($_GET["modal"]) == "show"){
?>
<script type="text/javascript">
  window.onload = function () {
    OpenBootstrapPopup();
  };
  function OpenBootstrapPopup() {
    $("#view-appointment-requests-modal").modal('show');
  }
</script>
<?php
}
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
              <h5 class="card-title">List of Clearance Appointments For Today</h5>
              <?php
                  $today = date('Y-m-j');
                  // Attempt select query execution
                  $sql = "SELECT * FROM clearance_appointments where status = 'Waiting' and department_name = '$verified_session_role' and appointment_date = '$today' ORDER BY status";
                  if($result = mysqli_query($link, $sql)){
                    echo '<table id="example" class="table datatable">';
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th scope='col'>Appointment Code</th>";
                            echo "<th scope='col'>ID Number</th>";
                            echo "<th scope='col'>Name</th>";
                            echo "<th scope='col'>Appointment Date</th>";
                            echo "<th scope='col'>Appointment Hour</th>";
                            echo "<th scope='col'>Action</th>";
                        echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                      if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                              echo "<td>" . $row['appointment_code'] . "</td>";
                              echo "<td>" . $row['id_number'] . "</td>";
                              echo "<td>" . $row['name'] . "</td>";
                              echo "<td>" . $row['appointment_date'] . "</td>";
                              echo "<td>" . $row['appointment_hour'] . "</td>";
                              echo "<td>";
                                echo '
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
                                      <input type="hidden" name="action" value="mark-done">
                                      <input type="hidden" name="id" value="'. $row['id'] .'">
                                      <button type="submit" class="btn btn-success btn-sm" title="Mark as Done" data-toggle="tooltip"><span class="bi bi-check"></span></button>
                                    </form>
                                    <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
                                      <input type="hidden" name="action" value="mark-overdue">
                                      <input type="hidden" name="id" value="'. $row['id'] .'">
                                      <button type="submit" class="btn btn-danger btn-sm" title="Mark as Overdue" data-toggle="tooltip"><span class="bi bi-x"></span></button>
                                    </form>
                                  </div>';
                              echo "</td>";
                          echo "</tr>";
                        }
                      } else{
                          echo "<td class='text-center' colspan='6'>No Appointments Added Yet</td>";
                      }
                    echo "</tbody>";                            
                    echo "</table>";
                  } else{
                      echo "Oops! Something went wrong. Please try again later.";
                  }
                    ?>
              <div class="float-end">
                  <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#view-appointment-requests-modal">View Appointment Requests</button>
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
            $sql = "SELECT * FROM clearance_appointments where status = 'Pending' and department_name = '$verified_session_role' ORDER BY appointment_date";
            if($result = mysqli_query($link, $sql)){
              echo '<table id="example" class="table datatable">';
              echo "<thead>";
                  echo "<tr>";
                      echo "<th scope='col'>Appointment Code</th>";
                      echo "<th scope='col'>ID Number</th>";
                      echo "<th scope='col'>Name</th>";
                      echo "<th scope='col'>Appointment Date</th>";
                      echo "<th scope='col'>Appointment Hour</th>";
                      echo "<th scope='col'>Action</th>";
                  echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['appointment_code'] . "</td>";
                        echo "<td>" . $row['id_number'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['appointment_date'] . "</td>";
                        echo "<td>" . $row['appointment_hour'] . "</td>";
                        echo "<td>";
                          echo '
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
                                <input type="hidden" name="action" value="accept-appointment">
                                <input type="hidden" name="id" value="'. $row['id'] .'">
                                <button type="submit" class="btn btn-success btn-sm" title="Accept Appointment" data-toggle="tooltip"><span class="bi bi-check"></span></button>
                              </form>
                              <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
                                <input type="hidden" name="action" value="decline-appointment">
                                <input type="hidden" name="id" value="'. $row['id'] .'">
                                <button type="submit" class="btn btn-danger btn-sm" title="Decline Appointment" data-toggle="tooltip"><span class="bi bi-x"></span></button>
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
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
        </div>
      </div>
    </div>
  </div><!-- End Teachers Record Modal-->
<?php
include ("includes/footer.php");
?>
</body>

</html>