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

  

    <li class="nav-heading text-primary">Module</li>

    <li class="nav-item">
      <a href="services-health-check.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='health-services'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>">
        <i class="bi bi-shield-plus"></i>
        <span>Health Monitoring</span>
      </a>
    </li>

   

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#incident-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-text"></i><span>Incident-Report</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="incident-nav" class="<?php if($nav=='incident-logs'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
        <li>
          <a href="minor-logs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='minor'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Minor incidents</span>
          </a>
        </li>
        <li>
          <a href="major-logs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='major'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Major Incidents</span>
          </a>
        </li>
        <li>
          <a href="add-incident-logs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='log'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Log</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#inventory-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-list-check"></i><span>Inventory</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>  
      <ul id="inventory-nav" class="<?php if($nav=='inventory'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
        <li>
          <a href="medical-medicines.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='medicines'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Medicines</span> 
          </a>
        </li>
        <li>
          <a href="medical-equipments.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='equipments'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Medical Equipments</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#records-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-card-list"></i><span>Manage Records</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>  
      <ul id="records-nav" class="<?php if($nav=='Records'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
        <li>
          <a href="records-add-student.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='Records-Add-Student'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Add Student Record</span>
          </a>
        </li>
        <li>
          <a href="records-add-faculty.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='Records-Add-Faculty'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Add Faculty Record</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#records-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-card-checklist"></i><span>Records List</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="records-nav" class="<?php if($nav=='records'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
        <li>
          <a href="records-health.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='health'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Health Records</span>
          </a>
        </li>
        <li>
          <a href="records-incident.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='incident'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Daily Incident Records</span>
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
            <i class="bi bi-circle"></i><span>HCMS Admin</span>
          </a>
        </li>
        <li>
          <a href="logs-staff.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='logs-staffs'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>HCMS Staffs</span>
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
        <i class="bi bi-collection"></i><span>Over All Records</span><i class="bi bi-chevron-down ms-auto"></i>
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

    
    <li class="nav-heading text-primary">Records</li>


    <li class="nav-item">
      <a href="records-list.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='Records-list'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>">
        <i class="bi bi-file-medical"></i>
        <span>Records List&nbsp;</span>
      </a>
    </li>


 
    <li class="nav-item">
      <a href="annua-examination.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='Records-list'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>">
        <i class="ri-health-book-line"></i>
        <span>Annual Medical Examination</span>
      </a>
    </li>

    <li class="nav-heading text-primary">Settings</li>

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
        <i class="bi bi-telephone-inbound"></i>
        <span>Contact</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a href="pages-contact.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='contact'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
        <i class="bi bi-box-arrow-right"></i>
        <span>log-out</span>
      </a>
    </li><!-- End Contact Page Nav -->
  </ul>
</aside><!-- End Sidebar-->
