<?php
include('includes/session.php');
  require "../vendor/autoload.php";
  use Dompdf\Dompdf;
$collapsed = "semestral-clearance";
$show_modal = false;
$show_modal1 = false;
$show_modal2 = false;
$sql = "SELECT * FROM clearance_semester ORDER BY id DESC LIMIT 1";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
      $current_sem = $row['name']." SY: ".$row['school_year'];
    }
  }else{
    $current_sem = "";
  }
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="add" && isset($_POST["semester"]) && isset($_POST["school_year"])){
  $semester = trim($_POST["semester"]);
  $school_year = trim($_POST["school_year"]);
  // Set the new timezone
  date_default_timezone_set('Asia/Manila');
  $date_started = date('Y-m-d H:i:s');
  // Prepare an insert statement
  $sql = "INSERT INTO clearance_semester (name, school_year, date_started) VALUES (?, ?, ?)";
  if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "sss", $param_semester, $param_school_year, $date_started);
    // Set parameters
    $param_semester = $semester;
    $param_school_year = $school_year;
    $param_date_started = $date_started;
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
      if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
      } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
      } else {
        $ip = $_SERVER["REMOTE_ADDR"];
      }
      $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
      $action = "Started New Semestral Clearance for ".$semester." ".$school_year."";
      date_default_timezone_set("asia/manila");
      $date = date("Y-m-d H:i:s", strtotime("+0 HOURS"));
      mysqli_query($link, "INSERT INTO audit_trail(account_no,action,actor,ip,host,date) VALUES('$verified_session_username','$action','Clearance Administrator','$ip','$host','$date')") or die(mysqli_error($link));
      $sql = "SELECT * FROM clearance_semester ORDER BY id DESC LIMIT 1";
      if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_array($result)){
            $id = $row['id'];
          }
        }
      }else{
        echo "Oops! Something went wrong. Please try again later.";
      }
      $sql = "UPDATE clearance_semester_current SET semester_id=? WHERE id=?";
      if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ii", $param_semester_id, $param_id);
        // Set parameters
        $param_semester_id = $id;
        $param_id = 0;
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
          //Add Record of Students
          $sql = "SELECT * FROM clearance_department_students";
          $count = 0;
          if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
                $temp_dept = $row['department_name'];
                $count++;
                $sql1 = "SELECT * FROM student_information";
                if($result1 = mysqli_query($link, $sql1)){
                  if(mysqli_num_rows($result1) > 0){
                    while($row1 = mysqli_fetch_array($result1)){
                      $id_number = $row1['id_number'];
                      $firstname = $row1['firstname'];
                      $lastname = $row1['lastname'];
                      $course = $row1['course'];
                      if($count == mysqli_num_rows($result)){
                        // Notification
                        $notif = "Semestral Clearance for ".$semester." ".$school_year." has started";
                        $date = date('Y-m-d H:i:s');
                        $link->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date,affected) VALUES ('', '0', '$id_number', '0', 'Semestral Clearance Started', '$notif', '$verified_session_role', 'Active', '$date', '123')") or die(mysqli_error($link)); 
                      }
                      $sql2 = "SELECT * FROM clearance_students_record where student_id = '".$id_number."' and department_name = '".$temp_dept."' LIMIT 1";
                      if($result2 = mysqli_query($link, $sql2)){
                        if(mysqli_num_rows($result2) > 0){
                          while($row2 = mysqli_fetch_array($result2)){
                            $status = "Pending";
                            $description = $row2['description'];
                            $sql3 = "INSERT INTO clearance_semestral_clearance_list (id_number, firstname, lastname, course, department_name, status, description, semester_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                            if($stmt1 = mysqli_prepare($link, $sql3)){
                              // Bind variables to the prepared statement as parameters
                              mysqli_stmt_bind_param($stmt1, "sssssssi", $id_number, $firstname, $lastname, $course, $temp_dept, $status, $description, $id);
                              if(mysqli_stmt_execute($stmt1)){
                              }
                            }else{
                              echo "error";
                            }
                          }
                        }else{
                          $status = "Cleared";
                          $description = "";
                          $sql3 = "INSERT INTO clearance_semestral_clearance_list (id_number, firstname, lastname, course, department_name, status, date, description, semester_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                          if($stmt1 = mysqli_prepare($link, $sql3)){
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt1, "ssssssssi", $id_number, $firstname, $lastname, $course, $temp_dept, $status, $date_started, $description, $id);
                            if(mysqli_stmt_execute($stmt1)){
                            }
                          }
                        }
                      }else{
                        echo "Oops! Something went wrong. Please try again later.";
                      }
                    }
                  }
                }else{
                  echo "Oops! Something went wrong. Please try again later.";
                }
              }
            }
          }else{
            echo "Oops! Something went wrong. Please try again later.";
          }
          //Add Record of Teachers
          $sql = "SELECT * FROM clearance_department_teachers";
          $count = 0;
          if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
                $temp_dept = $row['department_name'];
                $count++;
                $sql1 = "SELECT * FROM teacher_information";
                if($result1 = mysqli_query($link, $sql1)){
                  if(mysqli_num_rows($result1) > 0){
                    while($row1 = mysqli_fetch_array($result1)){
                      $id_number = $row1['id_number'];
                      $firstname = $row1['firstname'];
                      $lastname = $row1['lastname'];
                      $course = $row1['course'];
                      if($count == mysqli_num_rows($result)){
                        // Notification
                        $notif = "Semestral Clearance for ".$semester." ".$school_year." has started";
                        $date = date('Y-m-d H:i:s');
                        $link->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date,affected) VALUES ('', '0', '$id_number', '0', 'Semestral Clearance Started', '$notif', '$verified_session_role', 'Active', '$date', '123')") or die(mysqli_error($link)); 
                      }
                      $sql2 = "SELECT * FROM clearance_teachers_record where teacher_id = '".$id_number."' and department_name = '".$temp_dept."' LIMIT 1";
                      if($result2 = mysqli_query($link, $sql2)){
                        if(mysqli_num_rows($result2) > 0){
                          while($row2 = mysqli_fetch_array($result2)){
                            $status = "Pending";
                            $description = $row2['description'];
                            $sql3 = "INSERT INTO clearance_semestral_clearance_list (id_number, firstname, lastname, course, department_name, status, description, semester_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                            if($stmt1 = mysqli_prepare($link, $sql3)){
                              // Bind variables to the prepared statement as parameters
                              mysqli_stmt_bind_param($stmt1, "sssssssi", $id_number, $firstname, $lastname, $course, $temp_dept, $status, $description, $id);
                              if(mysqli_stmt_execute($stmt1)){
                              }
                            }else{
                              echo "error";
                            }
                          }
                        }else{
                          $status = "Cleared";
                          $description = "";
                          $sql3 = "INSERT INTO clearance_semestral_clearance_list (id_number, firstname, lastname, course, department_name, status, date, description, semester_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                          if($stmt1 = mysqli_prepare($link, $sql3)){
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt1, "ssssssssi", $id_number, $firstname, $lastname, $course, $temp_dept, $status, $date_started, $description, $id);
                            if(mysqli_stmt_execute($stmt1)){
                            }
                          }
                        }
                      }else{
                        echo "Oops! Something went wrong. Please try again later.";
                      }
                    }
                  }
                }else{
                  echo "Oops! Something went wrong. Please try again later.";
                }
              }
            }
          }else{
            echo "Oops! Something went wrong. Please try again later.";
          }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
      }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
  }
  unset($_POST['action']);
  unset($_POST['semester']);
  unset($_COOKIE['school_year']);
  // Records updated successfully. Redirect to landing page
  header("location: semestral-clearance.php?notif=success");
  exit();
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="view-clearance" && isset($_POST["user"]) && isset($_POST["id"]) && isset($_POST["fullname"]) && isset($_POST["course"])){
  $user = trim($_POST["user"]);
  $course = trim($_POST["course"]);
  $fullname = trim($_POST["fullname"]);
  $id_number = trim($_POST["id"]);
   // Set the new timezone
  date_default_timezone_set('Asia/Manila');
  $date_started = date('Y-m-d H:i:s');
  $show_modal = true;
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="view-description" && isset($_POST["user"]) && isset($_POST["id"]) && isset($_POST["fullname"]) && isset($_POST["course"]) && isset($_POST["department_name"])){
  $user = trim($_POST["user"]);
  $course = trim($_POST["course"]);
  $fullname = trim($_POST["fullname"]);
  $department_name = trim($_POST["department_name"]);
  $id_number = trim($_POST["id"]);
   // Set the new timezone
  date_default_timezone_set('Asia/Manila');
  $date_started = date('Y-m-d H:i:s');
  $show_modal1 = true;
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="mark-cleared" && isset($_POST["user"]) && isset($_POST["id"]) && isset($_POST["fullname"]) && isset($_POST["course"]) && isset($_POST["department_name"])){
  $user = trim($_POST["user"]);
  $course = trim($_POST["course"]);
  $fullname = trim($_POST["fullname"]);
  $department_name = trim($_POST["department_name"]);
  $id_number = trim($_POST["id"]);
   // Set the new timezone
  date_default_timezone_set('Asia/Manila');
  $date_started = date('Y-m-d H:i:s');
  $show_modal2 = true;
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="approve-clearance" && isset($_POST["user"]) && isset($_POST["id"]) && isset($_POST["fullname"]) && isset($_POST["course"]) && isset($_POST["department_name"])){
  $user = trim($_POST["user"]);
  $course = trim($_POST["course"]);
  $fullname = trim($_POST["fullname"]);
  $department_name = trim($_POST["department_name"]);
  $id_number = trim($_POST["id"]);
  $status= "Cleared";
  $new_description= "";
   // Set the new timezone
  date_default_timezone_set('Asia/Manila');
  $date_started = date('Y-m-d H:i:s');
  $sql = "SELECT * FROM clearance_semester ORDER BY id DESC LIMIT 1";
  if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $semester_id = $row['id'];
      }
    }
  }else{
    echo "Oops! Something went wrong. Please try again later.";
  }
  // Prepare an update statement
  $sql = "UPDATE clearance_semestral_clearance_list SET status=?, date=?, description=? WHERE id_number=? and department_name=? and semester_id=?";
  if($stmt = mysqli_prepare($link, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sssssi", $status, $date_started, $new_description, $id_number, $department_name, $semester_id);
      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
          // Records updated successfully. Redirect to landing page
          header("location: semestral-clearance.php?status=approve-success");
          exit();
      } else{
          echo "Oops! Something went wrong. Please try again later.";
      }
  }
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="print-clearance" && isset($_POST["semester"]) && isset($_POST["id_number"])){

  $current_semester = trim($_POST["semester"]);
  $current_id_number = trim($_POST["id_number"]);
  $fullname = trim($_POST["fullname"]);
  $course = trim($_POST["course"]);
  // Set the new timezone
  date_default_timezone_set('Asia/Manila');
  $date_started = date('Y-m-d H:i:s');

  // Attempt select query execution
  $content = "";
    $sql = "SELECT * FROM clearance_semestral_clearance_list where semester_id = '".$current_semester."' and id_number = '".$current_id_number."' ORDER BY department_name";
    if($result = mysqli_query($link, $sql)){
      if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_array($result)){
            $content = $content.'
            <tr>
              <td>'.$row['department_name'].'</td>
              <td>'.$row['status'].'</td>
              <td>'.$row['date'].'</td>
            </tr>
            ';
          }
      } else{
          echo '<div class="alert alert-warning"><em>No Students Record Added Yet.</em></div>';
      }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

  $dompdf = new Dompdf();
  $html = '
  <style>
.row {
  --bs-gutter-x: 1.5rem;
  --bs-gutter-y: 0;
  display: flex;
  flex-wrap: wrap;
  margin-top: calc(-1 * var(--bs-gutter-y));
  margin-right: calc(-0.5 * var(--bs-gutter-x));
  margin-left: calc(-0.5 * var(--bs-gutter-x));
}
.row > * {
  flex-shrink: 0;
  width: 100%;
  max-width: 100%;
  padding-right: calc(var(--bs-gutter-x) * 0.5);
  padding-left: calc(var(--bs-gutter-x) * 0.5);
  margin-top: var(--bs-gutter-y);
}
.mx-5 {
  margin-right: 3rem !important;
  margin-left: 3rem !important;
}
.mb-2 {
  margin-bottom: 0.5rem !important;
}
.col-6 {
  flex: 0 0 auto;
  width: 50%;
}
.col {
  flex: 1 0 0%;
}
.mb-5 {
  margin-bottom: 3rem !important;
}
.mt-1 {
  margin-top: 0.25rem !important;
}
.border {
border: 1px solid #dee2e6 !important;
}
.ms-5 {
  margin-left: 3rem !important;
}
.text-center {
  text-align: center !important;
}
.table {
  --bs-table-bg: transparent;
  --bs-table-accent-bg: transparent;
  --bs-table-striped-color: #212529;
  --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
  --bs-table-active-color: #212529;
  --bs-table-active-bg: rgba(0, 0, 0, 0.1);
  --bs-table-hover-color: #212529;
  --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
  width: 100%;
  margin-bottom: 1rem;
  color: #212529;
  vertical-align: top;
  border-color: #dee2e6;
}
.text-end {
  text-align: right !important;
}
.me-5 {
  margin-right: 3rem !important;
}
  </style>
  <div class="row mx-5 mb-2">
    <div class="col-6"><span class="ms-5">Name:'.$fullname.'</span></div>
    <div class="col-6"><span class="ms-5">ID Number:'.$current_id_number.'</span></div>
  </div>
  <div class="row mx-5 mb-5">
    <div class="col-6"><span class="ms-5">Course:'.$course.'</span></div>
    <div class="col-6"><span class="ms-5">Date:'.$date_started.'</span></div>
  </div>
  <div class="row">
    <div class="col"><h4 class="text-center">BESTLINK COLLEGE OF THE PHILIPPINES</h4></div>
  </div>
  <div class="row">
    <div class="col"><h4 class="text-center">'.$current_sem.' Semestral Clearance</h4></div>
  </div>
  <div class="row mx-5 mb-5 mt-1 border">
    <table id="example" class="table">
      <thead>
        <tr>
          <th scope="col">Department Name</th>
          <th scope="col">Status</th>
          <th scope="col">Date</th>
        </tr>
      </thead>
      <tbody>
        '.$content.'
      </tbody>
    </table>
  </div>
  <div class="row mx-5 mb-2">
    <div class="col-6"><span class="ms-5">_______________________</span></div>
    <div class="col-6"><span class="ms-5">&nbsp;&nbsp;&nbsp;&nbsp;Clearance Administrator</span></div>
  </div>
  ';
  
  $dompdf->loadHtml($html);
  $dompdf->setPaper('letter', 'portrait');
  $dompdf->render();
  $dompdf->stream(''.$current_id_number.' '.$current_sem.' Semestral Clearance.pdf');
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
include ("includes/head.php");
?>
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
    $("#clearance-record-modal-view-clearance").modal('show');
  }
</script>
<?php
}
?>
<?php 
if($show_modal1 == true){
?>
<script type="text/javascript">
  window.onload = function () {
    OpenBootstrapPopup1();
  };
  function OpenBootstrapPopup1() {
    $("#clearance-record-modal-view-description").modal('show');
  }
</script>
<?php
}
?>
<?php 
if($show_modal2 == true){
?>
<script type="text/javascript">
  window.onload = function () {
    OpenBootstrapPopup2();
  };
  function OpenBootstrapPopup2() {
    $("#clearance-record-modal-mark-cleared").modal('show');
  }
</script>
<?php
}
?>
<body>

<?php
include ("includes/nav.php");
include ("includes/sidebar.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?php echo $current_sem; ?> Semestral Clearance</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><?php echo $current_sem; ?> Semestral Clearance</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <?php 
          $semester = 0;
          $sql = "SELECT * FROM clearance_semester_current LIMIT 1";
          if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
                $semester = $row['semester_id'];
              }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }
          if($semester == 0){ ?>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"></h5>
            <?php
            echo '<div class="alert alert-warning"><em>Semestral Clearance has not started yet.</em></div>';
            ?>
                <div class="float-end">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#semestral-clearance-add">Start Semestral Clearance</button>
                </div>
              </div>
            </div>
          <?php
          }else{
          ?>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Clearance</h5>
              <?php
                    // Attempt select query execution
                    $sql = "SELECT * FROM clearance_semestral_clearance_list";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="example" class="table datatable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>ID Number</th>";
                                        echo "<th scope='col'>Full Name</th>";
                                        echo "<th scope='col'>Course</th>";
                                        echo "<th scope='col'>Pending</th>";
                                        echo "<th scope='col'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                $sql = "SELECT * FROM student_information";
                                if($result = mysqli_query($link, $sql)){
                                  if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                      echo "<tr>";
                                        echo "<td>" . $row['id_number'] . "</td>";
                                        echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
                                        echo "<td>" . $row['course'] . "</td>";
                                        $sql1 = "SELECT * FROM clearance_semester_current LIMIT 1";
                                        if($result1 = mysqli_query($link, $sql1)){
                                          if(mysqli_num_rows($result1) > 0){
                                            while($row1 = mysqli_fetch_array($result1)){
                                              $semester_current = $row1['semester_id'];
                                            }
                                          } else{
                                              echo "Oops! Something went wrong. Please try again later.";
                                          }
                                        } else{
                                            echo "Oops! Something went wrong. Please try again later.";
                                        }
                                        $sql1 = "SELECT * FROM clearance_semestral_clearance_list where id_number = '".$row['id_number']."' and status = 'Pending' and semester_id = '".$semester_current."'";
                                        if($result1 = mysqli_query($link, $sql1)){
                                          echo "<td>" . mysqli_num_rows($result1) . "</td>";
                                        } else{
                                          echo "Oops! Something went wrong. Please try again later.";
                                        }
                                        echo "<td>";
                                          echo '
                                          <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
                                            <input type="hidden" name="action" value="view-clearance">
                                            <input type="hidden" name="user" value="student">
                                            <input type="hidden" name="id" value="'. $row['id_number'] .'">
                                            <input type="hidden" name="course" value="'. $row['course'] .'">
                                            <input type="hidden" name="fullname" value="'. $row['firstname'] .' '. $row['lastname'] . '">
                                            <button type="submit" class="btn btn-info btn-sm" title="View Clearance" data-toggle="tooltip"><span class="bi bi-eye-fill"></span></button>
                                          </form>';
                                        echo "</td>";
                                      echo "</tr>";
                                    }
                                  }
                                } else{
                                  echo "Oops! Something went wrong. Please try again later.";
                                }
                                $sql = "SELECT * FROM teacher_information";
                                if($result = mysqli_query($link, $sql)){
                                  if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                      echo "<tr>";
                                        echo "<td>" . $row['id_number'] . "</td>";
                                        echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
                                        echo "<td>" . $row['course'] . "</td>";
                                        $sql1 = "SELECT * FROM clearance_semestral_clearance_list where id_number = '".$row['id_number']."' and status = 'Pending' and semester_id = '".$semester_current."'";
                                        if($result1 = mysqli_query($link, $sql1)){
                                          echo "<td>" . mysqli_num_rows($result1) . "</td>";
                                        } else{
                                          echo "Oops! Something went wrong. Please try again later.";
                                        }
                                        echo "<td>";
                                          echo '
                                          <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
                                            <input type="hidden" name="action" value="view-clearance">
                                            <input type="hidden" name="user" value="teacher">
                                            <input type="hidden" name="id" value="'. $row['id_number'] .'">
                                            <input type="hidden" name="course" value="'. $row['course'] .'">
                                            <input type="hidden" name="fullname" value="'. $row['firstname'] .' '. $row['lastname'] . '">
                                            <button type="submit" class="btn btn-info btn-sm" title="View Clearance" data-toggle="tooltip"><span class="bi bi-eye-fill"></span></button>
                                          </form>';
                                        echo "</td>";
                                      echo "</tr>";
                                    }
                                  }
                                } else{
                                  echo "Oops! Something went wrong. Please try again later.";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                        } else{
                            echo '<div class="alert alert-warning"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    ?>
              <div class="float-end">
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#semestral-clearance-previous">View Previous Semester</button>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#semestral-clearance-add">Start New Semestral Clearance</button>
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
  <!-- Students Record Modal -->
  <div class="modal fade" id="semestral-clearance-add" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Start Semestral Clearance</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- General Form Elements -->
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">  
              <h4 class="alert-heading">A Notification will be send to all of students and teachers informing that the semestral has started.</h4>
              <p>Once you started a new semestral clearance, the previous record of clearance will be saved to database.</p>
              <hr>
              <p class="mb-0">© Copyright Bestlink College of the Philippines. All Rights Reserved.</p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="form-floating mb-3">
              <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="semester" Required>
                <option value="" selected="selected" disabled="disabled"></option>
                <option value="1st Semester">1st Semester</option>
                <option value="2nd Semester">2nd Semester</option>
              </select>
              <label for="floatingSelect">Select Semester</label>
            </div>
            <div class="form-floating mb-3">
              <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="school_year" Required>
                <option value="" selected="selected" disabled="disabled"></option>
                <option value="2019-2020">2019-2020</option>
                <option value="2020-2021">2020-2021</option>
                <option value="2021-2022">2021-2022</option>
                <option value="2022-2023">2022-2023</option>
                <option value="2023-2024">2023-2024</option>
                <option value="2024-2025">2024-2025</option>
                <option value="2025-2026">2025-2026</option>
              </select>
              <label for="floatingSelect">Select School Year</label>
            </div>
            <div class="float-end">
              <input type="hidden" name="action" value="add">
              <input type="submit" class="btn btn-primary" value="Submit">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form><!-- End General Form Elements -->
        </div>
      </div>
    </div>
  </div><!-- End Students Record Modal-->

  <!-- Students Record Modal -->
  <div class="modal fade" id="semestral-clearance-previous" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">List of Previous Semester</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="border">
            <?php
            // Attempt select query execution
            $sql = "SELECT * FROM clearance_semester";
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
                                echo '
                                  <form action="semestral-clearance-previous.php" method="post">
                                    <input type="hidden" name="action" value="view-previous-clearance">
                                    <input type="hidden" name="semester_id" value="'. $row['id'] .'">
                                    <button type="submit" class="btn btn-info btn-sm" title="View Clearance Record" data-toggle="tooltip"><span class="bi bi-eye-fill"></span></button>
                                  </form>
                                ';
                                echo "</td>";
                            echo "</tr>";
                          }
                        }
                        echo "</tbody>";                            
                    echo "</table>";
                } else{
                    echo '<div class="alert alert-warning"><em>No Previous Semester Recorded Yet.</em></div>';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            ?>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Back</button>
        </div>
      </div>
    </div>
  </div><!-- End Students Record Modal-->

  <!-- Students Record Modal -->
  <div class="modal fade" id="clearance-record-modal-view-clearance" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Clearance Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="clearance">
          <div class="row mx-5 mb-2">
            <div class="col-6"><span class="ms-5">Name: <?php echo $fullname; ?></span></div>
            <div class="col-6"><span class="ms-5">ID Number: <?php echo $id_number; ?></span></div>
          </div>
          <div class="row mx-5 mb-5">
            <div class="col-6"><span class="ms-5">Course: <?php echo $course; ?></span></div>
            <div class="col-6"><span class="ms-5">Date: <?php echo $date_started; ?></span></div>
          </div>
          <div class="row">
            <div class="col"><h4 class="text-center">BESTLINK COLLEGE OF THE PHILIPPINES</h4></div>
          </div>
          <div class="row">
            <div class="col"><h4 class="text-center"><?php echo $current_sem; ?> Semestral Clearance</h4></div>
          </div>
          <div class="row mx-5 mb-5 mt-1 border">
            <?php
              $semester = 0;
              $sql = "SELECT * FROM clearance_semester_current LIMIT 1";
              if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    $semester = $row['semester_id'];
                  }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
              // Attempt select query execution
              $sql = "SELECT * FROM clearance_semestral_clearance_list where semester_id = '".$semester."' and id_number = '".$id_number."' ORDER BY department_name";
              if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                  echo '<table id="example" class="table">';
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th scope='col'>Department Name</th>";
                            echo "<th scope='col'>Status</th>";
                            echo "<th scope='col'>Date</th>";
                            echo "<th scope='col'>Action</th>";
                        echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                            echo "<td style='width:50%;'>" . $row['department_name'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td style='width:20%;'>" . $row['date'] . "</td>";
                            echo "<td style='width:10%;'>";
                            if($row['status']=="Pending"){
                              echo'
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
                                    <input type="hidden" name="action" value="view-description">
                                    <input type="hidden" name="user" value="'.$user.'">
                                    <input type="hidden" name="id" value="'. $id_number .'">
                                    <input type="hidden" name="course" value="'. $course .'">
                                    <input type="hidden" name="fullname" value="'. $fullname . '">
                                    <input type="hidden" name="department_name" value="'. $row['department_name'] . '">
                                    <button type="submit" class="btn btn-info btn-sm" title="View Description" data-toggle="tooltip"><span class="bi bi-eye-fill"></span></button>
                                  </form>
                                  <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
                                    <input type="hidden" name="action" value="mark-cleared">
                                    <input type="hidden" name="user" value="'.$user.'">
                                    <input type="hidden" name="id" value="'. $id_number .'">
                                    <input type="hidden" name="course" value="'. $course .'">
                                    <input type="hidden" name="fullname" value="'. $fullname . '">
                                    <input type="hidden" name="department_name" value="'. $row['department_name'] . '">
                                    <button type="submit" class="btn btn-success btn-sm" title="Mark as Cleared" data-toggle="tooltip"><span class="bi bi-check"></span></button>
                                  </form>
                                </div>
                              ';
                            }
                            echo "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";                            
                  echo "</table>";
                } else{
                    echo '<div class="alert alert-warning"><em>No Students Record Added Yet.</em></div>';
                }
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
            ?>
          </div>
        </div>
        <div class="modal-footer">
          <div class="float-end">
            <!-- <a href="previous-clearance-student.php"><button type="button" class="btn btn-info">View Previous Semester</button></a>
            <a href="add-new-clearance-student.php"><button type="button" class="btn btn-success">Start New Clearance of Students</button></a> -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <input type="hidden" name="action" value="print-clearance">
              <input type="hidden" name="semester" value="<?php echo $semester; ?>">
              <input type="hidden" name="id_number" value="<?php echo $id_number; ?>">
              <input type="hidden" name="fullname" value="<?php echo $fullname; ?>">
              <input type="hidden" name="course" value="<?php echo $course; ?>">
              <button type="submit" class="btn btn-primary">Print Clearance</button>
            </form>;
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Students Record Modal-->
  <!-- Students Record Modal -->
  <div class="modal fade" id="clearance-record-modal-view-description" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Clearance Description</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="clearance">
          <div class="row mx-5 mb-2">
            <div class="col-12"><span class="">Name: <?php echo $fullname; ?></span></div>
            <div class="col-12"><span class="">ID Number: <?php echo $id_number; ?></span></div>
            <div class="col-12"><span class="">Course: <?php echo $course; ?></span></div>
            <div class="col-12"><span class="">Department: <?php echo $department_name; ?></span></div>
            <div class="col-12"><span class="">Status: Pending</span></div>
            <?php 
            if($user == "student"){
              $sql = "SELECT * FROM clearance_students_record where student_id = '".$id_number."' and department_name = '".$department_name."' LIMIT 1";
              if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    echo '<div class="col-12"><span class="">Description: '.$row['description'].'</span></div>';
                  }
                }
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
            }else if($user == "teacher"){
              $sql = "SELECT * FROM clearance_teachers_record where teacher_id = '".$id_number."' and department_name = '".$department_name."' LIMIT 1";
              if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    echo '<div class="col-12"><span class="">Description: '.$row['description'].'</span></div>';
                  }
                }
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
            }
            ?>
            
          </div>
        </div>
        <div class="modal-footer">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="action" value="view-clearance">
            <input type="hidden" name="user" value="<?php echo $user; ?>">
            <input type="hidden" name="id" value="<?php echo $id_number; ?>">
            <input type="hidden" name="course" value="<?php echo $course; ?>">
            <input type="hidden" name="fullname" value="<?php echo $fullname; ?>">
            <button type="submit" class="btn btn-secondary btn-sm">Back</button>
          </form>
        </div>
      </div>
    </div>
  </div><!-- End Students Record Modal-->
  <!-- Students Record Modal -->
  <div class="modal fade" id="clearance-record-modal-mark-cleared" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Mark Clearance as Cleared</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="clearance">
          <div class="row mx-5 mb-2">
            <!-- <div class="col-12"><span class="">Name: <?php echo $fullname; ?></span></div>
            <div class="col-12"><span class="">ID Number: <?php echo $id_number; ?></span></div>
            <div class="col-12"><span class="">Course: <?php echo $course; ?></span></div>
            <div class="col-12"><span class="">Department: <?php echo $department_name; ?></span></div>
            <div class="col-12"><span class="">Status: Pending</span></div> -->
            <div class="col-12"><h5 class="">Are you sure you want to mark clearance of <?php echo $fullname; ?> in <?php echo $department_name; ?> as Cleared?</h5></div>
          </div>
        </div>
        <div class="modal-footer">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="action" value="approve-clearance">
            <input type="hidden" name="user" value="<?php echo $user; ?>">
            <input type="hidden" name="id" value="<?php echo $id_number; ?>">
            <input type="hidden" name="course" value="<?php echo $course; ?>">
            <input type="hidden" name="fullname" value="<?php echo $fullname; ?>">
            <input type="hidden" name="department_name" value="<?php echo $department_name; ?>">
            <button type="submit" class="btn btn-success btn-sm">Yes</button>
          </form>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="action" value="view-clearance">
            <input type="hidden" name="user" value="<?php echo $user; ?>">
            <input type="hidden" name="id" value="<?php echo $id_number; ?>">
            <input type="hidden" name="course" value="<?php echo $course; ?>">
            <input type="hidden" name="fullname" value="<?php echo $fullname; ?>">
            <input type="hidden" name="department_name" value="<?php echo $department_name; ?>">
            <button type="submit" class="btn btn-secondary btn-sm">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </div><!-- End Students Record Modal-->
</body>

</html>
<?php 

?>