<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <!-- Adding return nav item for super admin -->
    <?php 
    $sql = "SELECT * FROM clearance_department_students where department_name = '$verified_session_role'";
      if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
          $student = 1;
        }else{
            $student = 0;
        }
      }else{
          echo "Oops! Something went wrong. Please try again later.";
      }

    $sql = "SELECT * FROM clearance_department_teachers where department_name = '$verified_session_role'";
      if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
          $teacher = 1;
        }else{
            $teacher = 0;
        }
      }else{
          echo "Oops! Something went wrong. Please try again later.";
      }
          $output = '';
          $key = $_SESSION["login_key"];
          if(isset($verified_session_department) && ($verified_session_username)){
            switch($verified_session_department){
              case "SuperUser":
                //statement
                $output .= '
                <li class="nav-item" >
                  <a href="../../super_admin/index.php?id='.$key.'&logs=2&dept='.$verified_session_role.'"style="color: rgb(83, 107, 148);font-weight:600;">
                    <i class="bi bi-arrow-return-left"></i>
                    <span>Return to SuperUser</span>
                  </a>
                </li><!-- End Return Nav -->    
                ';

                break;  
            }
            echo $output;
        }else{

        }
        ?>

      <li class="nav-heading">Module</li>
      
      <li class="nav-item">
        <a class="nav-link <?php if($collapsed != 'dashboard'){echo 'collapsed';} ?>" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <?php if($student == 1){ ?>
      <li class="nav-item">
        <a class="nav-link <?php if($collapsed != 'students-record'){echo 'collapsed';} ?>" href="students-record.php">
          <i class="bi bi-card-list"></i>
          <span>Students Record</span>
        </a>
      </li><!-- End Students Record Nav -->
      <?php } ?>

      <?php if($teacher == 1){ ?>
      <li class="nav-item">
        <a class="nav-link <?php if($collapsed != 'teachers-record'){echo 'collapsed';} ?>" href="teachers-record.php">
          <i class="bi bi-card-list"></i>
          <span>Teachers Record</span>
        </a>
      </li><!-- End Teachers Record Nav -->
      <?php } ?>
      <li class="nav-heading">Clearance Module</li>

      <li class="nav-item">
        <a class="nav-link <?php if($collapsed != 'semestral-clearance'){echo 'collapsed';} ?>" href="semestral-clearance.php">
          <i class="bi bi-list-check"></i>
          <span>Semestral Clearance</span>
        </a>
      </li><!-- End Semestral Clearance Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if($collapsed != 'clearance-appointment'){echo 'collapsed';} ?>" href="clearance-appointment.php">
          <i class="bi bi-calendar-check"></i>
          <span>Clearance Appointment</span>
        </a>
      </li><!-- End Clearance Appointment Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if($collapsed != 'clearance-audit-trail'){echo 'collapsed';} ?>" href="clearance-audit-trail.php">
          <i class="bi bi-flag"></i>
          <span>Audit Trail Report</span>
        </a>
      </li><!-- End Audit Trail Report Nav -->

    </ul>

  </aside><!-- End Sidebar-->