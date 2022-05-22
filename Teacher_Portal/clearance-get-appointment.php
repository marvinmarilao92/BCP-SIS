<?php
include('includes/session.php');
//Set your timezone
date_default_timezone_set('Asia/Manila');
$statement = "";
$appointment_limit = 0;
$appointment_value = 0;
$sql = "SELECT * FROM clearance_teacher_appointment_limit where department = '" . trim($_GET["name"]) . "' and department_id = " . trim($_GET["id"]) . " LIMIT 1";
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
  $sql = "SELECT * FROM clearance_teacher_appointment_specific where date = '$date' LIMIT 1";
  if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $appointment_limit = $row['appointment'];
      }
    }else{
      $sql = "SELECT * FROM clearance_teacher_appointment_limit where department = '" . trim($_GET["name"]) . "' and department_id = " . trim($_GET["id"]) . " LIMIT 1";
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
    
    $sql1 = "SELECT * FROM clearance_teacher_appointment where department = '" . trim($_GET["name"]) . "' and department_id = '" . trim($_GET["id"]) . "' and appointment_date = '" . $date . "'";
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
          $statement = '
          <p style="margin-top: 10px; "><a href="clearance-set-appointment.php?date='. $date .'&id='. trim($_GET["id"]) .'&name='. trim($_GET["name"]) .'" class="btn btn-primary rounded-pill btn-sm">' . $appointment_limit - $appointment_value .' Slots</a></p style="margin-top: 2px;">';
        }else if($month_timestamp != $day_month){
          $statement = '<p style="margin-top: 10px;"><a href="clearance-set-appointment.php?date='. $date .'&id='. trim($_GET["id"]) .'&name='. trim($_GET["name"]) .'" class="btn btn-primary rounded-pill btn-sm">' . $appointment_limit - $appointment_value .' Slots</a></p style="margin-top: 2px;">';
        }
      }else if($year_timestamp > $day_year){
          $statement = '<p style="margin-top: 10px;"><a href="clearance-set-appointment.php?date='. $date .'&id='. trim($_GET["id"]) .'&name='. trim($_GET["name"]) .'" class="btn btn-primary rounded-pill btn-sm">' . $appointment_limit - $appointment_value .' Slots</a></p style="margin-top: 2px;">';
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

<?php
include ("includes/head.php");
?>
<style>
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

<?php
include ("includes/nav.php");
$page = 'clr' ; $col = 'Clearance'; include ("includes/sidebar.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Request an Appointment</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="clearance-status.php">Clearance Status</a></li>
          <li class="breadcrumb-item"><a href="clearance-status-read.php?id=<?php echo trim($_GET["id"]); ?>&name=<?php echo trim($_GET["name"]) ?>">Clearance Status for <?php $strr= trim($_GET["name"]);
      echo $strr; ?></a></li>
          <li class="breadcrumb-item">Request an Appointment</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <!-- Default Card -->
    <div class="card">
      <div class="card-body">
        <div class="container">
          <ul class="pagination justify-content-center pagination-lg">
            <li class="page-item" aria-disabled="true"><a href="?ym=<?= $prev; ?>&id=<?=trim($_GET["id"]);?>&name=<?=trim($_GET["name"]);?>" class="page-link">Prev</a></li>
            <li class="page-item active" aria-current="page"><span class="page-link"><?= $title; ?></span></li>
            <!-- <li class="class="page-item""><a class="page-link" href="#"></a></li> -->
            <li class="page-item"><a href="?ym=<?= $next; ?>&id=<?=trim($_GET["id"]);?>&name=<?=trim($_GET["name"]);?>" class="page-link">Next</a></li>
            </ul>
            <p class="text-end"><a href="clearance-get-appointment.php?id=<?=trim($_GET["id"]);?>&name=<?=trim($_GET["name"]);?>" class="btn btn-primary">Today</a></p>
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
        </div>
      </div>
    </div><!-- End Default Card -->

  </main><!-- End #main -->

<?php
include ("includes/footer.php");
?>

</body>

</html>