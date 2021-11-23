 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a href="dashboard.php" class="<?php if($page=='dashboard'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-bar-chart-line"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-folder2-open"></i><span>Documents</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="<?php if($col=='Docs'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
      <li>
        <a href="Try.php" class="<?php if($page=='PF'){echo 'active';}?>">
          <i class="bi bi-circle "></i><span>Pending Files</span>
        </a>
      </li>
      <li>
        <a href="forms-layouts.html"class="<?php if($page=='RF'){echo 'active';}?>">
          <i class="bi bi-circle"></i><span>Revision Files</span>
        </a>
      </li>
      <li>
        <a href="forms-editors.html" class="<?php if($page=='AF'){echo 'active';}?>">
          <i class="bi bi-circle"></i><span>Approved Files</span>
        </a>
      </li>
    </ul>
  </li><!-- End Documents Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-file-earmark-text"></i><span>File Template</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="<?php if($col=='FT'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?>" data-bs-parent="#sidebar-nav">
      <li>
        <a href="upload_file.php" class="<?php if($page=='UT'){echo 'active';}?>">
          <i class="bi bi-circle"></i><span>Upload Template</span>
        </a>
      </li>
      <li>
        <a href="tables-data.html" class="<?php if($page=='TL'){echo 'active';}?>">
          <i class="bi bi-circle"></i><span>Template Lists</span>
        </a>
      </li>
    </ul>
  </li><!-- End Template Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-people"></i><span>Account Management</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="<?php if($col=='logs'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
      <li>
        <a href="logs_admin.php" class="<?php if($page=='AL'){echo 'active';}?>">
          <i class="bi bi-circle"></i><span>Admin Logged</span>
        </a>
      </li>
      <li>
        <a href="logs_supervisor.php" class="<?php if($page=='SL'){echo 'active';}?>">
          <i class="bi bi-circle"></i><span>Supervisor Logged</span>
        </a>
      </li>
      <li>
        <a href="logs_depthead.php" class="<?php if($page=='DHL'){echo 'active';}?>">
          <i class="bi bi-circle"></i><span>Dept. Head Logged</span>
        </a>
      </li>
    </ul>
  </li><!-- End Account Management Nav -->

  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="<?php if($col=='rep'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
          <li>
          <a href="logs_admin.php" class="<?php if($page==''){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>User Reports</span>
            </a>
          </li>
          <li>
          <a href="logs_supervisor.php" class="<?php if($page==''){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Document Reports</span>
            </a>
          </li>
        </ul>
      </li><!-- End Reports Nav -->


  <li class="nav-heading">Pages</li>

  <li class="nav-item">
  <a href="users-profile.php" class="<?php if($page=='PRO'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a href="about.php" class="<?php if($page=='about'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-info-circle"></i>
      <span>About</span>
    </a>
  </li><!-- End Contact Page Nav -->

  
  <li class="nav-item">
  <a href="pages-contact.php" class="<?php if($page=='contact'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-envelope"></i>
      <span>Contact</span>
    </a>
  </li><!-- End Contact Page Nav -->

</ul>

</aside><!-- End Sidebar-->