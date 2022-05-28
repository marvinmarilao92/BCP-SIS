<?php
include('session.php');
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["date"]) && !empty($_POST["date"])){

  $sql = "SELECT * FROM clearance_department_teachers where department_name = 'Registrar Coordinator'";
  if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $dept_id = $row['id'];
      }
    } else{
        // echo '<div class="alert alert-warning"><em>No Clearance Appointments Yet.</em></div>';
    }
  } else{
      echo "Oops! Something went wrong. Please try again later.";
  }
    
    // Validate name
    $input_limit = trim($_POST["limit"]);
    $input_date = trim($_POST["date"]);

    $sql = "SELECT * FROM clearance_teacher_appointment_specific where department = 'Registrar Coordinator' and department_id = '$dept_id' and date = '$input_date' LIMIT 1";
    if($result = mysqli_query($link, $sql)){
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
          $sql = "UPDATE clearance_teacher_appointment_specific SET appointment=? WHERE department_id=? and department=? and date=?";
        
          if($stmt = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "iiss", $param_appointment, $param_department_id, $param_department, $param_date);
              
              // Set parameters
              $param_appointment = $input_limit;
              $param_department_id = $dept_id;
              $param_department = 'Registrar Coordinator';
              $param_date = $input_date;
              
              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt)){
                  // Records updated successfully. Redirect to landing page
                  header("location: teacher-clearance-appointment-calendar.php");
                  exit();
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
          }

        }
      } else{
          // Prepare an insert statement
          $sql = "INSERT INTO clearance_teacher_appointment_specific (appointment, department_id, department, date) VALUES (?, ?, ?, ?)";

          if($stmt = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "iiss", $param_appointment, $param_department_id, $param_department, $param_date);

              // Set parameters
              $param_appointment = $input_limit;
              $param_department_id = $dept_id;
              $param_department = 'Registrar Coordinator';
              $param_date = $input_date;

              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt)){
                  // Records created successfully. Redirect to landing page
                  header("location: teacher-clearance-appointment-calendar.php");
                  exit();
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
          }
      }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

        

}else if($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["date"]) && empty($_POST["date"])){

  $sql = "SELECT * FROM clearance_department_teachers where department_name = 'Registrar Coordinator'";
  if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $dept_id = $row['id'];
      }
    } else{
        // echo '<div class="alert alert-warning"><em>No Clearance Appointments Yet.</em></div>';
    }
  } else{
      echo "Oops! Something went wrong. Please try again later.";
  }
    
    // Validate name
    $input_limit = trim($_POST["limit"]);

    $sql = "SELECT * FROM clearance_teacher_appointment_limit where department = 'Registrar Coordinator' and department_id = '$dept_id' LIMIT 1";
    if($result = mysqli_query($link, $sql)){
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
          $sql = "UPDATE clearance_teacher_appointment_limit SET appointment=? WHERE department_id=? and department=?";
        
          if($stmt = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "iis", $param_appointment, $param_department_id, $param_department);
              
              // Set parameters
              $param_appointment = $input_limit;
              $param_department_id = $dept_id;
              $param_department = 'Registrar Coordinator';
              
              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt)){
                  // Records updated successfully. Redirect to landing page
                  header("location: teacher-clearance-appointment-calendar.php");
                  exit();
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
          }

        }
      } else{
          // Prepare an insert statement
          $sql = "INSERT INTO clearance_teacher_appointment_limit (appointment, department_id, department) VALUES (?, ?, ?)";

          if($stmt = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "iis", $param_appointment, $param_department_id, $param_department);

              // Set parameters
              $param_appointment = $input_limit;
              $param_department_id = $dept_id;
              $param_department = 'Registrar Coordinator';

              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt)){
                  // Records created successfully. Redirect to landing page
                  header("location: teacher-clearance-appointment-calendar.php");
                  exit();
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
          }
      }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

        

}
//Set your timezone
date_default_timezone_set('Asia/Manila');
$statement = "";
$appointment_limit = 0;
$appointment_value = 0;
$sql = "SELECT * FROM clearance_teacher_appointment_limit where department = 'Registrar Coordinator' LIMIT 1";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
      $appointment_limit = $row['appointment'];
    }
  } else{
      $appointment_limit = 100;
  }
} else{
    echo "Oops! Something went wrong. Please try again later.";
}
// Get prev and next month
if(isset($_GET['ym'])){
  $ym = $_GET['ym'];
}else {
  //This month
  $ym = date('Y-m');
}

//Check format
$timestamp = strtotime($ym . '-01'); //The first day of the month
if($timestamp === false){
  $ym = date('Y-m');
  $timestamp = strtotime($ym . '-01');
}

//Today (Format: 2022-04-06)
$today = date('Y-m-j');

//Title (Format: April, 2022)
$title = date('F, Y', $timestamp);

//Create prev and next month link
$prev = date('Y-m', strtotime('-1 month', $timestamp));
$next = date('Y-m', strtotime('+1 month', $timestamp));

//Number of days in the month
$day_count = date('t', $timestamp);

//1:Mon 2:Tue 3:Wed ... 7:Sun
$str = date('N', $timestamp);

//Get the current day today
$day_today = (int)(date("d"));
// $day_today = (int)(date("d", strtotime("+1 days")));

//Get the current date today
$day_month = (int)(date("m"));
$day_year = (int)(date("Y"));

$month_timestamp = (int)(date('m', strtotime('+0 month', $timestamp)));
$year_timestamp = (int)(date('Y', strtotime('+0 month', $timestamp)));

//Array for calendar
$weeks = [];
$week = '';

//Add empty cells
$week .= str_repeat('<td></td>', $str - 1);

for($day = 1; $day <= $day_count; $day++, $str++){
  $date = $ym . '-' . $day;
  if($today == $date){
    $week .= '<td class="today table-primary">';
  }else{
    $week .= '<td>';
  }

  $sql = "SELECT * FROM clearance_teacher_appointment_specific where department = 'Registrar Coordinator' and date = '$date' LIMIT 1";
  if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $appointment_limit = $row['appointment'];
      }
    }else{
      $sql = "SELECT * FROM clearance_teacher_appointment_limit where department = 'Registrar Coordinator' LIMIT 1";
      if($resultt = mysqli_query($link, $sql)){
        if(mysqli_num_rows($resultt) > 0){
          while($roww = mysqli_fetch_array($resultt)){
            $appointment_limit = $roww['appointment'];
          }
        } else{
            $appointment_limit = 100;
        }
      } else{
          echo "Oops! Something went wrong. Please try again later.";
      }
    }
  } else{
      echo "Oops! Something went wrong. Please try again later.";
  }
  
  if($str != 6 && $str != 7 && $str != 13 && $str != 14 && $str != 20 && $str != 21 && $str != 27 && $str != 28 && $str != 34 && $str != 35){
    
    $sql1 = "SELECT * FROM clearance_teacher_appointment where department = 'Registrar Coordinator' and appointment_date = '" . $date . "'";
    if($result1 = mysqli_query($link, $sql1)){
      $appointment_value = mysqli_num_rows($result1);
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
    if(($appointment_limit - $appointment_value) > 0){
      if($month_timestamp >= $day_month && $year_timestamp == $day_year){
        if($month_timestamp == $day_month && $day_today == $day){
          $statement = '<p style="margin-top: 10px;">Today</p style="margin-top: 2px;">';
        }else if($month_timestamp == $day_month && $day_today < $day){
          $statement = '<p style="margin-top: 10px;"><a href="#" class="btn btn-primary rounded-pill btn-sm">' . $appointment_limit - $appointment_value .' Slots</a></p style="margin-top: 2px;">';
        }else if($month_timestamp != $day_month){
          $statement = '<p style="margin-top: 10px;"><a href="#" class="btn btn-primary rounded-pill btn-sm">' . $appointment_limit - $appointment_value .' Slots</a></p style="margin-top: 2px;">';
        }
      }else if($year_timestamp > $day_year){
          $statement = '<p style="margin-top: 10px;"><a href="#" class="btn btn-primary rounded-pill btn-sm">' . $appointment_limit - $appointment_value .' Slots</a></p style="margin-top: 2px;">';
      }
    }
    else{
      $statement = '';
    }
  }else{
    $statement = '';
  }
  $week .=  $day . $statement . '</td>';
  
  //Sunday of last day of the month
  if($str % 7 == 0 || $day == $day_count){
    //Last day fo the month
    if($day == $day_count && $str % 7 != 0){
      //Add empty cell(s)
      $week .= str_repeat('<td></td>', 7 - $str % 7);
    }

    $weeks[] = '<tr>' . $week . '</tr>';
    $week = '';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Registrar Appointment</title>
<?php include ('core/css-links.php');//css connection?>
<style>
  /*responsive*/
  @media(max-width: 500px){
    .table thead{
      display: none;
    }

    .table, .table tbody, .table tr, .table td{
      display: block;
      width: 100%;
    }
    .table tr{
      background: #ffffff;
      box-shadow: 0 8px 8px -4px lightblue;
      border-radius: 5%;
      margin-bottom:13px;
      margin-top: 13px;
    }
    .table td{
      /* max-width: 20px; */
      padding-left: 50%;
      text-align: right;
      position: relative;
    }
    .table td::before{      
      margin-top: 10px;      
      content: attr(data-label);
      position: absolute;
      left:0;
      width: 50%;
      padding-left:15px;
      font-size:15px;
      font-weight: bold;
      text-align: left;
    }
  }
  .container {
    font-family: 'Montserrat', sans-serif;
    margin: 60px auto;
  }
  .list-inline {
    text-align: center;
    margin-bottom: 30px;
  }
  .title {
    font-weight: bold;
    font-size: 26px;
  }
  th {
    text-align: center;
  }
  td {
    height: 100px;
  }
  th:nth-of-type(6), td:nth-of-type(6) {
    color: rgb(11, 94, 215);
  }
  th:nth-of-type(7), td:nth-of-type(7) {
    color: rgb(226, 59, 46);
  }
  .today {
    background-color: gray;
  }
</style>
<body>

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'TCA' ; $col = 'clr'; include ('core/side-nav.php');//Design for sidebar?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Calendar of Appointments</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Calendar of Appointments</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <!-- Default Card -->
    <div class="card">
      <div class="card-body">
        <div class="container">
          <ul class="pagination justify-content-center pagination-lg">
            <li class="page-item" aria-disabled="true"><a href="?ym=<?= $prev; ?>" class="page-link">Prev</a></li>
            <li class="page-item active" aria-current="page"><span class="page-link"><?= $title; ?></span></li>
            <!-- <li class="class="page-item""><a class="page-link" href="#"></a></li> -->
            <li class="page-item"><a href="?ym=<?= $next; ?>" class="page-link">Next</a></li>
            </ul>
            <p class="text-end"><a href="teacher-clearance-appointment-calendar.php" class="btn btn-primary">Today</a></p>
            <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Mon</th>
                <th scope="col">Tue</th>
                <th scope="col">Wed</th>
                <th scope="col">Thu</th>
                <th scope="col">Fri</th>
                <th scope="col">Sat</th>
                <th scope="col">Sun</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                foreach ($weeks as $week) {
                  echo $week;
                }
              ?>
            </tbody>
          </table>
          <div class="float-end">
              <!-- Basic Modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                Set Default Appointment Limit
              </button>
              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Set Default Appointment Limit</h5>
                      <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <div class="modal-body">
                          <div class="form-group">
                              <label>Appointment Limit</label>
                              <input type="number" name="limit" class="form-control" Required>
                              <span class="invalid-feedback"></span>
                          </div>
                          
                          
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Submit">
                      </div>
                    </form>
                  </div>
                </div>
              </div><!-- End Basic Modal-->
              <!-- Basic Modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal1">
                Set Default Appointment Limit on Specific Date
              </button>
              <div class="modal fade" id="basicModal1" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Set Default Appointment Limit on Specific Date</h5>
                      <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <div class="modal-body">
                          <div class="form-group">
                              <label>Select Date</label>
                              <input type="date" name="date" class="form-control" Required>
                              <span class="invalid-feedback"></span>
                          </div>

                          <div class="form-group">
                              <label>Appointment Limit</label>
                              <input type="number" name="limit" class="form-control" Required>
                              <span class="invalid-feedback"></span>
                          </div>
                          
                          
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Submit">
                      </div>
                    </form>
                  </div>
                </div>
              </div><!-- End Basic Modal-->
          </div>
        </div>
      </div>
    </div><!-- End Default Card -->
  </main><!-- End #main -->

 
  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>

</body>

</html>