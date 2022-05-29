<?php
include('includes/session.php');
$collapsed = "teachers-record";
$show_modal = false;
// Check existence of id parameter before processing further
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="add" && isset($_POST["id"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["course"])){
  $teacher_id = trim($_POST["id"]);
  $firstname = trim($_POST["firstname"]);
  $lastname = trim($_POST["lastname"]);
  $course = trim($_POST["course"]);
  $dept_name = $verified_session_role;
  $show_modal = true;
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="add-record" && isset($_POST["id"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["course"]) && isset($_POST["description"])){
  $teacher_id = trim($_POST["id"]);
  $firstname = trim($_POST["firstname"]);
  $lastname = trim($_POST["lastname"]);
  $course = trim($_POST["course"]);
  $description = trim($_POST["description"]);
  $dept_name = $verified_session_role;

  // Attempt select query execution
  $sql = "SELECT * FROM clearance_teachers_record where teacher_id = '".$teacher_id."' and department_name = '".$verified_session_role."'";
  if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      unset($_POST['action']);
      unset($_POST['id']);
      unset($_POST['firstname']);
      unset($_POST['lastname']);
      unset($_POST['course']);
      unset($_POST['description']);
      // Records created successfully. Redirect to landing page
      header("location: teachers-record.php?notif=failed");
      exit();
    } else{
      // Prepare an insert statement
      $sql = "INSERT INTO clearance_teachers_record (teacher_id, firstname, lastname, course, description, department_name) VALUES (?, ?, ?, ?, ?, ?)";
      if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssss", $teacher_id, $firstname, $lastname, $course, $description, $dept_name);
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
          $semester = 0;
          $sql = "SELECT * FROM clearance_semester_current LIMIT 1";
          if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
                $semester = $row['semester_id'];
                $date_started = null;
                $status = "Pending";
                // Prepare an update statement
                $sql1 = "UPDATE clearance_semestral_clearance_list SET status=?, date=?, description=? WHERE id_number=? and department_name=? and semester_id=?";
                if($stmt1 = mysqli_prepare($link, $sql1)){
                  // Bind variables to the prepared statement as parameters
                  mysqli_stmt_bind_param($stmt1, "sssssi", $status, $date_started, $description, $teacher_id, $verified_session_role, $semester);
                  // Attempt to execute the prepared statement
                  if(mysqli_stmt_execute($stmt1)){
                      unset($_POST['id']);
                      unset($_COOKIE['id_number']);
                      // Records deleted successfully. Redirect to landing page
                      header("location: teachers-record.php?notif=delete_success");
                      exit();
                  } else{
                      echo "Oops! Something went wrong. Please try again later.";
                  }
                }
              }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }
          unset($_POST['action']);
          unset($_POST['id']);
          unset($_POST['firstname']);
          unset($_POST['lastname']);
          unset($_POST['course']);
          unset($_POST['description']);
          // Records created successfully. Redirect to landing page
          header("location: teachers-record.php?notif=success");
          exit();
        } else{
          header("location: teachers-record.php?notif=failed");
          exit();
        }
      }
    }
  } else{
      echo "Oops! Something went wrong. Please try again later.";
  }
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="delete-record" && isset($_POST["id"])){
  $teacher_id = trim($_POST["id"]);
  // Prepare a delete statement
  $sql = "DELETE FROM clearance_teachers_record WHERE teacher_id = ?";
  if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $teacher_id);
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
      $semester = 0;
      $sql = "SELECT * FROM clearance_semester_current LIMIT 1";
      if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_array($result)){
            $semester = $row['semester_id'];
            // Set the new timezone
            date_default_timezone_set('Asia/Manila');
            $date_started = date('Y-m-d H:i:s');
            $status = "Cleared";
            $description = "";
            // Prepare an update statement
            $sql1 = "UPDATE clearance_semestral_clearance_list SET status=?, date=?, description=? WHERE id_number=? and department_name=? and semester_id=?";
            if($stmt1 = mysqli_prepare($link, $sql1)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt1, "sssssi", $status, $date_started, $description, $teacher_id, $verified_session_role, $semester);
              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt1)){
                  unset($_POST['id']);
                  unset($_COOKIE['id_number']);
                  // Records deleted successfully. Redirect to landing page
                  header("location: teachers-record.php?notif=delete_success");
                  exit();
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
            }
          }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
      } else{
          echo "Oops! Something went wrong. Please try again later.";
      }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
  }
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="update-record" && isset($_POST["id"]) && isset($_POST["description"])){
  $teacher_id = trim($_POST["id"]);
  $description = trim($_POST["description"]);
  // Prepare an update statement
  $sql = "UPDATE clearance_teachers_record SET description=? WHERE teacher_id=?";
  if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ss", $description, $teacher_id);
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
      $semester = 0;
      $sql = "SELECT * FROM clearance_semester_current LIMIT 1";
      if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_array($result)){
            $semester = $row['semester_id'];
            $status = "Pending";
            // Prepare an update statement
            $sql1 = "UPDATE clearance_semestral_clearance_list SET status=?, description=? WHERE id_number=? and department_name=? and semester_id=?";
            if($stmt1 = mysqli_prepare($link, $sql1)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt1, "ssssi", $status, $description, $teacher_id, $verified_session_role, $semester);
              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt1)){
                  unset($_POST['id']);
                  unset($_POST['description']);
                  unset($_COOKIE['id_number']);
                  // Records updated successfully. Redirect to landing page
                  header("location: teachers-record.php?notif=update_success");
                  exit();
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
            }
          }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
      } else{
          echo "Oops! Something went wrong. Please try again later.";
      }
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
if($show_modal == true){
?>
<script type="text/javascript">
  window.onload = function () {
    OpenBootstrapPopup();
  };
  function OpenBootstrapPopup() {
    $("#teachers-record-modal-add").modal('show');
  }
</script>
<?php
}
?>
<?php
include ("includes/nav.php");
include ("includes/sidebar.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Teachers Record</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Teachers Record</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Teachers Record</h5>
              <?php 
              if(isset($_GET["notif"]) && trim($_GET["notif"])=="success"){
              ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Teacher Record Added Successfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php 
              }
              ?>
              <?php 
              if(isset($_GET["notif"]) && trim($_GET["notif"])=="delete_success"){
              ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Teacher Record Deleted Successfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php 
              }
              ?>
              <?php 
              if(isset($_GET["notif"]) && trim($_GET["notif"])=="update_success"){
              ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Teacher Record Updated Successfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php 
              }
              ?>
              <?php 
              if(isset($_GET["notif"]) && trim($_GET["notif"])=="failed"){
              ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Teacher Record Already on the List
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php 
              }
              ?>
              <?php
                  // Attempt select query execution
                  $sql = "SELECT * FROM clearance_teachers_record where department_name = '".$verified_session_role."' ORDER BY teacher_id";
                  if($result = mysqli_query($link, $sql)){
                      if(mysqli_num_rows($result) > 0){
                        echo '<table id="example" class="table datatable">';
                          echo "<thead>";
                              echo "<tr>";
                                  echo "<th scope='col'>ID Number</th>";
                                  echo "<th scope='col'>First Name</th>";
                                  echo "<th scope='col'>Last Name</th>";
                                  echo "<th scope='col'>Course</th>";
                                  echo "<th scope='col'>Description</th>";
                                  echo "<th scope='col'>Action</th>";
                              echo "</tr>";
                          echo "</thead>";
                          echo "<tbody>";
                          while($row = mysqli_fetch_array($result)){
                              echo "<tr>";
                                  echo "<td style='width:10%;'>" . $row['teacher_id'] . "</td>";
                                  echo "<td>" . $row['firstname'] . "</td>";
                                  echo "<td>" . $row['lastname'] . "</td>";
                                  echo "<td style='width:10%;'>" . $row['course'] . "</td>";
                                  echo "<td style='width:40%;'>" . $row['description'] . "</td>";
                                  echo "<td style='width:10%;'>";
                                    echo'
                                      <div class="btn-group" role="group" aria-label="Basic example">
                                        <button id="'.$row['teacher_id'].'" type="button" class="btn btn-warning" title="Update Description" data-toggle="tooltip" onclick="updateFunction(this.id)"><span class="bi bi-pencil"></span></button>
                                        <button id="'.$row['teacher_id'].'" type="button" class="btn btn-danger" title="Remove Record" data-toggle="tooltip" onclick="deleteFunction(this.id)"><span class="bi bi-x"></span></button>
                                      </div>
                                    ';
                                  echo "</td>";
                              echo "</tr>";
                          }
                          echo "</tbody>";                            
                        echo "</table>";
                      } else{
                          echo '<div class="alert alert-warning"><em>No Teachers Record Added Yet.</em></div>';
                      }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    ?>
              <div class="float-end">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#teachers-record-modal">Add New Record</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- Teachers Record Modal -->
  <div class="modal fade" id="teachers-record-modal" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Select teacher you want to add record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php
          // Attempt select query execution
          $sql = "SELECT * FROM teacher_information where account_status = 'Active' ORDER BY id_number";
          if($result = mysqli_query($link, $sql)){
              if(mysqli_num_rows($result) > 0){
                  echo '<table id="example" class="table datatable">';
                      echo "<thead>";
                          echo "<tr>";
                              echo "<th scope='col'>Teacher Number</th>";
                              echo "<th scope='col'>First Name</th>";
                              echo "<th scope='col'>Last Name</th>";
                              echo "<th scope='col'>Course</th>";
                              echo "<th scope='col'>Action</th>";
                          echo "</tr>";
                      echo "</thead>";
                      echo "<tbody>";
                      while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                              echo "<td>" . $row['id_number'] . "</td>";
                              echo "<td>" . $row['firstname'] . "</td>";
                              echo "<td>" . $row['lastname'] . "</td>";
                              echo "<td>" . $row['course'] . "</td>";
                              echo "<td>";
                                echo '
                                <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
                                  <input type="hidden" name="action" value="add">
                                  <input type="hidden" name="id" value="'. $row['id_number'] .'">
                                  <input type="hidden" name="firstname" value="'. $row['firstname'] .'">
                                  <input type="hidden" name="lastname" value="'. $row['lastname'] .'">
                                  <input type="hidden" name="course" value="'. $row['course'] .'">
                                  <input type="submit" class="btn btn-primary btn-sm" title="Add Record" data-toggle="tooltip" value="Add">
                                </form>';
                              echo "</td>";
                          echo "</tr>";
                      }
                      echo "</tbody>";                            
                  echo "</table>";
              } else{
                  echo '<div class="alert alert-warning"><em>No Teacher Record Added Yet.</em></div>';
              }
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }
          ?>
        </div>
      </div>
    </div>
  </div><!-- End Teachers Record Modal-->

  <!-- Teachers Record Modal -->
  <div class="modal fade" id="teachers-record-modal-add" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Description of Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <input type="hidden" name="action" value="add-record">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" placeholder="ID Number" name="id" value="<?php echo $teacher_id ?>" readonly>
              <label for="floatingInput">ID Number</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" placeholder="First Name" name="firstname" value="<?php echo $firstname ?>" readonly>
              <label for="floatingInput">First Name</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" placeholder="Last Name" name="lastname" value="<?php echo $lastname ?>" readonly>
              <label for="floatingInput">Last Name</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" placeholder="Course" name="course" value="<?php echo $course ?>" readonly>
              <label for="floatingInput">Course</label>
            </div>
            <div class="form-floating mb-3">
              <textarea class="form-control" placeholder="Enter Description" id="floatingTextarea" style="height: 100px;" required name="description"></textarea>
              <label for="floatingTextarea">Description</label>
            </div>
            <div class="float-end">
                <input type="submit" class="btn btn-primary" value="Save Record">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div><!-- End Teachers Record Modal-->

  <!-- Delete Teachers Record Modal -->
  <div class="modal fade" id="teachers-record-modal-delete" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete Teacher Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="delete-div">
          Are you sure you want to delete teacher record with ID Number:?
        </div>
        <div class="modal-footer">
          <div class="float-end">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <input type="hidden" name="action" value="delete-record">
              <input type="hidden" id="delete-id" name="id" value="">
              <input type="submit" class="btn btn-danger" value="Delete Record">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </form>';
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Delete Teachers Record Modal-->

  <!-- Update Teachers Record Modal -->
  <div class="modal fade" id="teachers-record-modal-update" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="update-div">Update Teacher Record of</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="update-div">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <input type="hidden" name="action" value="update-record">
            <input type="hidden" id="update-id" name="id" value="">
            <div class="form-floating mb-3">
              <textarea class="form-control" placeholder="Enter Description" id="floatingTextarea" style="height: 100px;" required name="description"></textarea>
              <label for="floatingTextarea">Description</label>
            </div>
            <div class="float-end">
                <input type="submit" class="btn btn-primary" value="Update Record">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div><!-- End Update Teachers Record Modal-->
  

<?php
include ("includes/footer.php");
?>
<script>
  function deleteFunction(id_number) {
    var expires;
    var name="id_number";
    var date = new Date();
    date.setTime(date.getTime() + (1 * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toGMTString();
    document.cookie = escape(name) + "=" + escape(id_number) + expires + ";";
    document.getElementById('delete-div').innerHTML = 'Delete teacher Record of teacher ID: ' + escape(getCookie("id_number"));
    var Myelement = document.getElementById("delete-id");
    Myelement.value = escape(getCookie("id_number"));
    $("#teachers-record-modal-delete").modal('show');
  }
  function updateFunction(id_number) {
    var expires;
    var name="id_number";
    var date = new Date();
    date.setTime(date.getTime() + (1 * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toGMTString();
    document.cookie = escape(name) + "=" + escape(id_number) + expires + ";";
    document.getElementById('update-div').innerHTML = 'Update teacher Record of teacher ID: ' + escape(getCookie("id_number"));
    var Myelement = document.getElementById("update-id");
    Myelement.value = escape(getCookie("id_number"));
    $("#teachers-record-modal-update").modal('show');
  }
  function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
  }
</script>
</body>

</html>