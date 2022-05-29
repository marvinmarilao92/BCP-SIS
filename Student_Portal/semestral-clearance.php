<?php
include('includes/session.php');
  require "vendor/autoload.php";
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
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="view-description" && isset($_POST["department_name"])){
  $department_name = trim($_POST["department_name"]);
   // Set the new timezone
  date_default_timezone_set('Asia/Manila');
  $date_started = date('Y-m-d H:i:s');
  $show_modal1 = true;
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="print-clearance"){

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
  // Set the new timezone
  date_default_timezone_set('Asia/Manila');
  $date_started = date('Y-m-d H:i:s');

  // Attempt select query execution
  $content = "";
    $sql = "SELECT * FROM clearance_semestral_clearance_list where semester_id = '".$semester."' and id_number = '".$verified_session_username."' ORDER BY department_name";
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
    <div class="col-6"><span class="ms-5">Name:'.$verified_session_firstname.' '.$verified_session_lastname.'</span></div>
    <div class="col-6"><span class="ms-5">ID Number:'.$verified_session_username.'</span></div>
  </div>
  <div class="row mx-5 mb-5">
    <div class="col-6"><span class="ms-5">Course:'.$verified_session_course.'</span></div>
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
  $dompdf->stream(''.$verified_session_username.' '.$current_sem.' Semestral Clearance.pdf');
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
            // Set the new timezone
            date_default_timezone_set('Asia/Manila');
            $date_started = date('Y-m-d H:i:s');
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
                </div>
              </div>
            <?php
            }else{
            ?>

            <div class="card">
              <div class="card-body">
            <div class="row mx-5 mb-2 mt-5">
              <div class="col-6"><span class="ms-5">Name: <?php echo $verified_session_firstname.' '.$verified_session_lastname; ?></span></div>
              <div class="col-6"><span class="ms-5">ID Number: <?php echo $verified_session_username; ?></span></div>
            </div>
            <div class="row mx-5 mb-5">
              <div class="col-6"><span class="ms-5">Course: <?php echo $verified_session_course; ?></span></div>
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
                $sql = "SELECT * FROM clearance_semestral_clearance_list where semester_id = '".$semester."' and id_number = '".$verified_session_username."' ORDER BY department_name";
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
                                      <input type="hidden" name="department_name" value="'. $row['department_name'] . '">
                                      <button type="submit" class="btn btn-info btn-sm" title="View Description" data-toggle="tooltip"><span class="bi bi-eye-fill"></span></button>
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
              <div class="float-end">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                  <input type="hidden" name="action" value="print-clearance">
                  <button type="submit" class="btn btn-success">Print Clearance</button>
                  <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#semestral-clearance-previous">View Previous Semester</button>
                </form>
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
  <div class="modal fade" id="clearance-record-modal-view-description" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Clearance Description</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="clearance">
          <div class="row mx-5 mb-2">
            <div class="col-12"><span class="">Name: <?php echo $verified_session_lastname.' '.$verified_session_lastname; ?></span></div>
            <div class="col-12"><span class="">ID Number: <?php echo $verified_session_username; ?></span></div>
            <div class="col-12"><span class="">Course: <?php echo $verified_session_course; ?></span></div>
            <div class="col-12"><span class="">Department: <?php echo $department_name; ?></span></div>
            <div class="col-12"><span class="">Status: Pending</span></div>
            <?php 
              $sql = "SELECT * FROM clearance_students_record where student_id = '".$verified_session_username."' and department_name = '".$department_name."' LIMIT 1";
              if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    echo '<div class="col-12"><span class="">Description: '.$row['description'].'</span></div>';
                  }
                }
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
            ?>
            
          </div>
        </div>
        <div class="modal-footer">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <button type="submit" class="btn btn-secondary btn-sm">Back</button>
          </form>
        </div>
      </div>
    </div>
  </div><!-- End Students Record Modal-->

</body>

</html>
<?php 

?>