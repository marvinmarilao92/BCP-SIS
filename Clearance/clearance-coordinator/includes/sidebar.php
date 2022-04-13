<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
    <!-- Adding return nav item for super admin -->
    <?php 
          $output = '';
          $key = $_SESSION["login_key"];
          if(isset($verified_session_department) && ($verified_session_username)){
            switch($verified_session_role){
              case "SuperAdmin":
                //statement
                $output .= '
                <li class="nav-item" >
                  <a href="../../super_admin/index.php?id='.$key.'"style="color: rgb(83, 107, 148);font-weight:600;">
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
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <?php 
      $sql = "SELECT * FROM clearance_department_students where department_name = '$verified_session_role'";
      if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
          echo '<li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#clearance-students-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Clearance For Students</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="clearance-students-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                      <a href="student-clearance-requirements.php">
                        <i class="bi bi-circle"></i><span>Clearance Requirements</span>
                      </a>
                    </li>
                    <li>
                      <a href="student-clearance-status.php">
                        <i class="bi bi-circle"></i><span>Clearance Status</span>
                      </a>
                    </li>
                    <li>
                      <a href="student-clearance-appointment.php">
                        <i class="bi bi-circle"></i><span>Clearance Appointments</span>
                      </a>
                    </li>
                  </ul>
                </li>';
        } else{
            
        }
      } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        
        $sql = "SELECT * FROM clearance_department_teachers where department_name = '$verified_session_role'";
      if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
          echo '<li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#clearance-teachers-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Clearance For Teachers</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="clearance-teachers-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                      <a href="teacher-clearance-requirements.php">
                        <i class="bi bi-circle"></i><span>Clearance Requirements</span>
                      </a>
                    </li>
                    <li>
                      <a href="teacher-clearance-status.php">
                        <i class="bi bi-circle"></i><span>Clearance Status</span>
                      </a>
                    </li>
                  </ul>
                </li>';
        } else{
            
        }
      } else{
            echo "Oops! Something went wrong. Please try again later.";
        }


      ?>

    </ul>

  </aside><!-- End Sidebar-->