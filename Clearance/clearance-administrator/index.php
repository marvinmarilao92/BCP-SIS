<?php
include('includes/session.php');
$collapsed = "dashboard";
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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-9">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Total Students</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <?php 
                      $sql = "SELECT * FROM student_information where account_status = 'Official' ORDER BY id_number";
                      if($result = mysqli_query($link, $sql)){
                        $total_student = mysqli_num_rows($result);
                      } else{
                          echo "Oops! Something went wrong. Please try again later.";
                      }
                      ?>
                      <h6><?php echo $total_student; ?></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Number of Students</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Students' Clearance Requirements</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-clipboard-check"></i>
                    </div>
                    <div class="ps-3">
                      <?php 
                      $sql = "SELECT * FROM clearance_requirements_students";
                      if($result = mysqli_query($link, $sql)){
                        $total_requirements = mysqli_num_rows($result);
                      } else{
                          echo "Oops! Something went wrong. Please try again later.";
                      }
                      ?>
                      <h6><?php echo $total_requirements; ?></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Number of Requirements</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
            
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Todays Students Appointment</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-calendar-date"></i>
                    </div>
                    <div class="ps-3">
                      <?php 
                      $date_today = date('Y-m-j');
                      $sql = "SELECT * FROM clearance_student_appointment where appointment_date = '".$date_today."'";
                      if($result = mysqli_query($link, $sql)){
                        $total_appointments = mysqli_num_rows($result);
                      } else{
                          echo "Oops! Something went wrong. Please try again later.";
                      }
                      ?>
                      <h6><?php echo $total_appointments; ?></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Number of Appointments</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

          </div>
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Total Teachers</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <?php 
                      $sql = "SELECT * FROM teacher_information where account_status = 'Active' ORDER BY id_number";
                      if($result = mysqli_query($link, $sql)){
                        $total_teacher = mysqli_num_rows($result);
                      } else{
                          echo "Oops! Something went wrong. Please try again later.";
                      }
                      ?>
                      <h6><?php echo $total_teacher; ?></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Number of Teachers</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Teachers' Clearance Requirements</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-clipboard-check"></i>
                    </div>
                    <div class="ps-3">
                      <?php 
                      $sql = "SELECT * FROM clearance_requirements_teachers";
                      if($result = mysqli_query($link, $sql)){
                        $total_requirements = mysqli_num_rows($result);
                      } else{
                          echo "Oops! Something went wrong. Please try again later.";
                      }
                      ?>
                      <h6><?php echo $total_requirements; ?></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Number of Requirements</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
            
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Todays Teachers Appointment</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-calendar-date"></i>
                    </div>
                    <div class="ps-3">
                      <?php 
                      $date_today = date('Y-m-j');
                      $sql = "SELECT * FROM clearance_teacher_appointment where appointment_date = '".$date_today."'";
                      if($result = mysqli_query($link, $sql)){
                        $total_appointments = mysqli_num_rows($result);
                      } else{
                          echo "Oops! Something went wrong. Please try again later.";
                      }
                      ?>
                      <h6><?php echo $total_appointments; ?></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Number of Appointments</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

          </div>
          <div class="row">
            <!-- Sales Card -->
            <div class="col-xxl-6 col-md-6">
              <!-- Website Traffic -->
              <div class="card">

                <div class="card-body pb-0">
                  <h5 class="card-title">Clearance Status of Students</span></h5>

                  <div id="studentChart" style="min-height: 400px;" class="echart"></div>
                  <?php 
                  // $sql = "SELECT * FROM clearance_department_students where department_name = '".$verified_session_role."' LIMIT 1";
                  // if($result = mysqli_query($link, $sql)){
                  //   if(mysqli_num_rows($result) > 0){
                  //     while($row = mysqli_fetch_array($result)){
                  //       $department_id = $row['id'];
                  //     }
                  //   } else{
                  //       echo "Oops! Something went wrong. Please try again later.";
                  //   }
                  // } else{
                  //     echo "Oops! Something went wrong. Please try again later.";
                  // }

                  $sql = "SELECT * FROM clearance_student_status where status = 'Completed'";
                  if($result = mysqli_query($link, $sql)){
                    $approved_clearance = mysqli_num_rows($result);
                  } else{
                      echo "Oops! Something went wrong. Please try again later.";
                  }

                  $sql = "SELECT * FROM clearance_student_status where status = 'Declined'";
                  if($result = mysqli_query($link, $sql)){
                    $declined_clearance = mysqli_num_rows($result);
                  } else{
                      echo "Oops! Something went wrong. Please try again later.";
                  }
                  ?>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      echarts.init(document.querySelector("#studentChart")).setOption({
                        tooltip: {
                          trigger: 'item'
                        },
                        legend: {
                          top: '5%',
                          left: 'center'
                        },
                        series: [{
                          name: 'Access From',
                          type: 'pie',
                          radius: ['50%', '70%'],
                          avoidLabelOverlap: false,
                          label: {
                            show: false,
                            position: 'center'
                          },
                          emphasis: {
                            label: {
                              show: true,
                              fontSize: '18',
                              fontWeight: 'bold'
                            }
                          },
                          labelLine: {
                            show: false
                          },
                          data: [{
                              value: <?php echo $approved_clearance; ?>,
                              name: 'Approved Clearance'
                            },
                            {
                              value: <?php echo $declined_clearance; ?>,
                              name: 'Declined Clearance'
                            }
                          ]
                        }]
                      });
                    });
                  </script>

                </div>
              </div><!-- End Website Traffic -->
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-xxl-6 col-md-6">
              <!-- Website Traffic -->
              <div class="card">

                <div class="card-body pb-0">
                  <h5 class="card-title">Clearance Status of Teachers</span></h5>

                  <div id="teacherChart" style="min-height: 400px;" class="echart"></div>

                  <?php 
                  // $sql = "SELECT * FROM clearance_department_teachers where department_name = '".$verified_session_role."' LIMIT 1";
                  // if($result = mysqli_query($link, $sql)){
                  //   if(mysqli_num_rows($result) > 0){
                  //     while($row = mysqli_fetch_array($result)){
                  //       $department_id = $row['id'];
                  //     }
                  //   } else{
                  //       echo "Oops! Something went wrong. Please try again later.";
                  //   }
                  // } else{
                  //     echo "Oops! Something went wrong. Please try again later.";
                  // }

                  $sql = "SELECT * FROM clearance_teacher_status where status = 'Completed'";
                  if($result = mysqli_query($link, $sql)){
                    $approved_clearance = mysqli_num_rows($result);
                  } else{
                      echo "Oops! Something went wrong. Please try again later.";
                  }

                  $sql = "SELECT * FROM clearance_teacher_status where status = 'Declined'";
                  if($result = mysqli_query($link, $sql)){
                    $declined_clearance = mysqli_num_rows($result);
                  } else{
                      echo "Oops! Something went wrong. Please try again later.";
                  }
                  ?>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      echarts.init(document.querySelector("#teacherChart")).setOption({
                        tooltip: {
                          trigger: 'item'
                        },
                        legend: {
                          top: '5%',
                          left: 'center'
                        },
                        series: [{
                          name: 'Access From',
                          type: 'pie',
                          radius: ['50%', '70%'],
                          avoidLabelOverlap: false,
                          label: {
                            show: false,
                            position: 'center'
                          },
                          emphasis: {
                            label: {
                              show: true,
                              fontSize: '18',
                              fontWeight: 'bold'
                            }
                          },
                          labelLine: {
                            show: false
                          },
                          data: [{
                              value: <?php echo $approved_clearance;; ?>,
                              name: 'Approved Clearance'
                            },
                            {
                              value: <?php echo $declined_clearance;; ?>,
                              name: 'Declined Clearance'
                            }
                          ]
                        }]
                      });
                    });
                  </script>

                </div>
              </div><!-- End Website Traffic -->
            </div><!-- End Sales Card -->

              
              
          </div>
          
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-3">

          <!-- Recent Activity -->
          <div class="card">


            <div class="card-body">
              <h5 class="card-title">Recent Activity</h5>

              <div class="activity">
                <?php 
                $sql = "SELECT * FROM clearance_audit_trail where department = '".$verified_session_role."' ORDER BY id DESC LIMIT 5 ";
                  if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                      while($row = mysqli_fetch_array($result)){
                        $current_date = strtotime(date('Y-m-d H:i:s'));
                        $action_date = strtotime($row['date']);
                        $seconds = $current_date - $action_date;
                        if($seconds < 60){
                          $count = round($seconds, 0);
                          $time = $count." secs";
                        }else if($seconds < 3600){
                          $count = round($seconds/60, 0);
                          $time = $count." mins";
                        }else if($seconds < 86400){
                          $count = round($seconds/3600, 0);
                          $time = $count." hours";
                        }else if($seconds < 604800){
                          $count = round($seconds/86400, 0);
                          $time = $count." days";
                        }
                        ?>
                        <div class="activity-item d-flex">
                          <div class="activite-label"><?php echo $time; ?></div>
                          <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                          <div class="activity-content">
                            <?php echo $row['action']; ?>
                          </div>
                        </div><!-- End activity item-->
                        <?php
                      }
                    } else{
                        ?>
                        <div class="activity-item d-flex">
                          <div class="activity-content">
                            No Recent Activity
                          </div>
                        </div><!-- End activity item-->
                        <?php
                    }
                  } else{
                      echo "Oops! Something went wrong. Please try again later.";
                  }
                ?>
                

              </div>

            </div>
          </div><!-- End Recent Activity -->

          <!-- Recent Activity -->
          <div class="card">


            <div class="card-body">
              <h5 class="card-title">Login Activity</span></h5>

              <div class="activity">

                <?php 
                $sql = "SELECT * FROM audit_logs where account_no = '".$verified_session_username."' ORDER BY id DESC LIMIT 5 ";
                  if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                      while($row = mysqli_fetch_array($result)){
                        $current_date = strtotime(date('Y-m-d H:i:s'));
                        $action_date = strtotime($row['login_time']);
                        $seconds = $current_date - $action_date;
                        if($seconds < 60){
                          $count = round($seconds, 0);
                          $time = $count." secs";
                        }else if($seconds < 3600){
                          $count = round($seconds/60, 0);
                          $time = $count." mins";
                        }else if($seconds < 86400){
                          $count = round($seconds/3600, 0);
                          $time = $count." hours";
                        }else if($seconds < 604800){
                          $count = round($seconds/86400, 0);
                          $time = $count." days";
                        }
                        ?>
                        <div class="activity-item d-flex">
                          <div class="activite-label"><?php echo $time; ?></div>
                          <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                          <div class="activity-content">
                            <?php echo $row['action']; ?> on device named: <?php echo $row['host']; ?> and IP Address: <?php echo $row['ip']; ?>
                          </div>
                        </div><!-- End activity item-->
                        <?php
                      }
                    } else{
                        ?>
                        <div class="activity-item d-flex">
                          <div class="activity-content">
                            No Recent Activity
                          </div>
                        </div><!-- End activity item-->
                        <?php
                    }
                  } else{
                      echo "Oops! Something went wrong. Please try again later.";
                  }
                ?>


              </div>

            </div>
          </div><!-- End Recent Activity -->

          

        </div><!-- End Right side columns -->

      </div>
    </section>
    

  </main><!-- End #main -->

<?php
include ("includes/footer.php");
?>

</body>

</html>