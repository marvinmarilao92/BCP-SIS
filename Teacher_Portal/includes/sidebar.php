<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="<?php if($page=='dash'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" href="index.php">
          <i class="bi bi-grid"></i>
          <span>News Feed</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Clearance</li>

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
      </li><!-- End Semestral Clearance Nav -->

      <li class="nav-heading">Document Tracking</li>
      
      <li class="nav-item">
        <a class="<?php if($page=='docs'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" href="docu_req.php">
          <i class="bi bi-file-earmark-text"></i>
          <span>Documents Requested </span>
        </a>
      </li><!-- End Dashboard Nav -->
      
      <li class="nav-item">
          <a href="tracking_docs.php" class="<?php if($page=='track'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
            <i class="bi bi-geo"></i>
            <span>Track Douments</span>
          </a>
        </li><!-- tracking item Nav -->
    </ul>

  </aside><!-- End Sidebar-->