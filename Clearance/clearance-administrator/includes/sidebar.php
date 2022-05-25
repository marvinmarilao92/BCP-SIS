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
        <a class="nav-link <?php if($collapsed != 'dashboard'){echo 'collapsed';} ?>" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if($collapsed != 'students-record'){echo 'collapsed';} ?>" href="students-record.php">
          <i class="bi bi-card-list"></i>
          <span>Students Record</span>
        </a>
      </li><!-- End Students Record Nav -->
      
      <li class="nav-item">
        <a class="nav-link <?php if($collapsed != 'teachers-record'){echo 'collapsed';} ?>" href="teachers-record.php">
          <i class="bi bi-card-list"></i>
          <span>Teachers Record</span>
        </a>
      </li><!-- End Teachers Record Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if($collapsed != 'semestral-clearance'){echo 'collapsed';} ?>" href="semestral-clearance.php">
          <i class="bi bi-list-check"></i>
          <span>Semestral Clearance</span>
        </a>
      </li><!-- End Semestral Clearance Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="student-clearance.php">
          <i class="bi bi-person"></i>
          <span>Students Clearance</span>
        </a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link collapsed" href="teacher-clearance.php">
          <i class="bi bi-person"></i>
          <span>Teachers Clearance</span>
        </a>
      </li> -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="clearance-audit-trail.php">
          <i class="bi bi-flag"></i>
          <span>Audit Trail Report</span>
        </a>
      </li><!-- End Audit Trail Report Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="clearance-audit-logs.php">
          <i class="bi bi-flag"></i>
          <span>Audit Logs Report</span>
        </a>
      </li><!-- End Audit Logs Report Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="clearance-departments.php">
          <i class="bi bi-menu-button-wide"></i>
          <span>Clearance Deparments</span>
        </a>
      </li><!-- End Clearance Deparments Nav -->

    </ul>

  </aside><!-- End Sidebar-->