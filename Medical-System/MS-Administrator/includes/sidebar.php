 <!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <?php 
      $output = '';
      $key = $_SESSION["login_key"];
      if(isset($verified_session_department) && ($verified_session_username)){
        switch($verified_session_role) {
          case "SuperAdmin":
            $output = '
              <li class="nav-item" >
                <a href="../../../super_admin/index.php?id='.$key.'"style="color: rgb(83, 107, 148);font-weight:600;">
                  <i class="bi bi-arrow-return-left"></i>
                  <span>Return to SuperUser</span>
                </a>
              </li><!-- End Return Nav -->    
            ';
            break;  
        }
        echo $output;
      }
    ?>

    <li class="nav-item">
      <a href="index.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='Dashboard'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>">
        <i class="bi bi-graph-up"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-heading">Module</li>
    <li class="nav-item">
      <a href="incidents-report.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='daily-logs'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>">
        <i class="bi bi-journal-check"></i>
        <span>Incident Reports&nbsp;</span>
        
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#prog-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-card-list"></i><span>Manage Programs</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="prog-nav" class="<?php if($nav=='Programs'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
        <li>
          <a href="programs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='progs'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Programs</span>
          </a>
        </li>
        <li>
          <a href="program-logs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='prog-logs'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Program Logs</span>
          </a>
        </li>
      </ul>
    </li>


    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#logs-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-lines-fill"></i><span>Employee Logs</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="logs-nav" class="<?php if($nav=='logs'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
        <li>
          <a href="logs-admin.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='logs-admin'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Admin-Logs</span>
          </a>
        </li>
        <li>
          <a href="logs-staff.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='logs-staffs'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Staff-Logs</span>
          </a>
        </li>
        <li>
          <a href="activities.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='activities'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Activities</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#enrolled-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-sidebar-reverse"></i><span>Over All Records</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>  
      <ul id="enrolled-nav" class="<?php if($nav=='OAR'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
        <li>
          <a href="overall-records-students.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='student-list'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Student List</span> 
          </a>
        </li>
        <li>
          <a href="overall-records-teacher.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='teacher-list'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Faculty List</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-heading">Inventory</li>

  <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#inventory-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-list-check"></i><span>Manage Inventory</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>  
      <ul id="inventory-nav" class="<?php if($nav=='inventory'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
        <li>
          <a href="ms-medical-medicines.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='ms-medicines'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Medicines</span> 
          </a>
        </li>
        <li>
          <a href="ms-medical-equipments.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='ms-equipments'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Medical Equipments</span>
          </a>
        </li>
      </ul>
    </li>


    <li class="nav-heading">Program</li>
 
    <li class="nav-item">
      <a href="annua-examination.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='Records-list'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>">
        <i class="ri-health-book-line"></i>
        <span>Annual Medical Examination</span>
      </a>
    </li>

    <li class="nav-heading">Settings</li>

    <li class="nav-item">
      <a href="users-profile.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='Profile'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a href="FAQ.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='FAQ'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
        <i class="bi bi-question-circle"></i>
        <span>F.A.Q</span>
      </a>
    </li><!-- End Contact Page Nav -->

    <li class="nav-item">
      <a href="pages-contact.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='contact'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
        <i class="bi bi-envelope"></i>
        <span>Contact</span>
      </a>
    </li><!-- End Contact Page Nav -->
  </ul>
</aside><!-- End Sidebar-->
