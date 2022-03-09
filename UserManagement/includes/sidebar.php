<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
<!-- 
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li> -->
      <!-- End Dashboard Nav -->
      <li class="nav-heading">Module</li>

      <li class="nav-item">
        <a class="<?php if($page=='SI'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" href="index.php">
          <i class="bi bi-person-plus-fill"></i>
          <span>Students</span>
        </a>
      </li><!-- End Student Page Nav -->

      <li class="nav-item">
        <a class="<?php if($page=='TI'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" href="teacher.php">
          <i class="ri ri-parent-fill"></i>
          <span>Teacher</span>
        </a>
      </li><!-- End Teacher Page Nav -->

      <li class="nav-item">
        <a class="<?php if($page=='EI'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" href="admin.php">
          <i class="bi bi-briefcase-fill"></i>
          <span>Employee</span>
        </a>
      </li><!-- End Employee Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->