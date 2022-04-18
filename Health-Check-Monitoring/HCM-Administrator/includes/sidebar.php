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
      <a href="request_list.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='Request'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>">
        <i class="bi bi-clipboard-check"></i>
        <span>Request&nbsp;</span>
        <span class="badge bg-success badge-number">
          <?php 
            require_once("security/sec-conn.php");
            $query="SELECT * FROM hcms_request WHERE `status` = 'Pending'";
            $result=mysqli_query($conn2,$query);
            if($result){
              echo mysqli_num_rows($result);
            }
          ?> 
        </span>          
      </a>
    </li>

    <li class="nav-item">
      <a href="records-list.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='Records-list'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>">
        <i class="bi bi-file-medical"></i>
        <span>Records List&nbsp;</span>
        
      </a>
    </li>

    <li class="nav-item">
      <a href="records-validation.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='Records-Validation'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>">
        <i class="ri-mail-check-line"></i>
        <span>Records validation&nbsp;</span>
        <span class="badge bg-secondary badge-number">
          <?php 
            require_once("security/sec-conn.php");
            $query="SELECT * FROM hcms_student_records WHERE `status` = 'Pending'";
            $result=mysqli_query($conn2,$query);
            if($result){
              echo mysqli_num_rows($result);
            }
          ?> 
        </span>     
      </a>
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
