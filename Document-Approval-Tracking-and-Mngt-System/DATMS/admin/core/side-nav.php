 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-heading">Module</li>

  <li class="nav-item">
    <a href="index.php" class="<?php if($page=='dashboard'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-bar-chart-line"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->


  <li class="nav-item">
  <a href="documents_list.php" class="<?php if($page=='docs'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="ri-book-2-line"></i>
      <span>Documents &nbsp;&nbsp;&nbsp;</span>
      <span class="badge bg-secondary">4</span>
    </a>
  </li><!-- All docs Nav -->

  <li class="nav-item">
    <a href="incoming_docs.php" class="<?php if($page=='incoming'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="ri-file-download-line"></i>
      <span>Incoming &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <span class="badge bg-warning text-dark">2</span>
    </a>
  </li><!-- Incoming item Nav -->

  <li class="nav-item">
    <a href="recieved_docs.php" class="<?php if($page=='recieved'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="ri-mail-check-line"></i>
      <span>Received &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <span class="badge bg-success">5</span>
    </a>
  </li><!-- recieved item Nav -->

  <li class="nav-item">
    <a href="outgoing_docs.php" class="<?php if($page=='outgoing'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="ri-send-plane-line"></i>
      <span>Outgoing &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <span class="badge bg-danger">2</span>
    </a>
  </li><!-- outgoing item Nav -->

  <li class="nav-item">
    <a href="pending_docs.php" class="<?php if($page=='hold'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="ri-question-mark"></i>
      <span>Hold &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <span class="badge bg-primary">4</span>
    </a>
  </li> <!-- hold item Nav -->

  <li class="nav-item">
    <a href="tracking.php" class="<?php if($page=='track'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-geo"></i>
      <span>Track Douments</span>
    </a>
  </li><!-- tracking item Nav -->

  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="<?php if($col=='reports'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
          <li>
          <a href="reports_user.php" class="<?php if($page=='UR'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>User Reports</span>
            </a>
          </li>
          <li>
          <a href="reports_docs.php" class="<?php if($page=='DR'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Document Reports</span>
            </a>
          </li>
        </ul>
      </li><!-- End Reports Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-people"></i><span>Account Management</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="<?php if($col=='logs'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
      <li>
        <a href="logs_approver.php" class="<?php if($page=='AL'){echo 'active';}?>">
          <i class="bi bi-circle"></i><span>Approver Logged</span>
        </a>
      </li>
      <li>
        <a href="logs_sec.php" class="<?php if($page=='SL'){echo 'active';}?>">
          <i class="bi bi-circle"></i><span>Secretary Logged</span>
        </a>
      </li>
      <li>
        <a href="logs_faculty.php" class="<?php if($page=='FL'){echo 'active';}?>">
          <i class="bi bi-circle"></i><span>Faculty Logged</span>
        </a>
      </li>
    </ul>
  </li><!-- End Account Management Nav -->


  <li class="nav-heading">Settings</li>

  <li class="nav-item">
  <a href="create_doctype.php" class="<?php if($page=='doctT'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-file-earmark-text"></i>
      <span>Doc Type</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
  <a href="create_office.php" class="<?php if($page=='office'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-house-door"></i>
      <span>Office</span>
    </a>
  </li><!-- End Add office Page Nav -->

  <li class="nav-item">
  <a href="users-profile.php" class="<?php if($page=='PRO'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a href="FAQ.php" class="<?php if($page=='FAQ'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-question-circle"></i>
      <span>F.A.Q</span>
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