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
        <i class="ri-dashboard-line"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-heading">Module</li>


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
      <a class="nav-link collapsed" data-bs-target="#enrolled-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-card-list"></i><span>Over All Records</span><i class="bi bi-chevron-down ms-auto"></i>
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
