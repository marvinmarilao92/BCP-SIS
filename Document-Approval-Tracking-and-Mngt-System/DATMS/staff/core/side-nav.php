 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">
 
<li class="nav-heading">Module</li>

  <li class="nav-item">
    <a href="incoming_docs.php" class="<?php if($page=='incoming'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="ri-file-download-line"></i>
      <span>Incoming &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <span class="badge bg-warning text-dark">2</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a href="recieved_docs.php" class="<?php if($page=='recieved'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="ri-mail-check-line"></i>
      <span>Received &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <span class="badge bg-success">5</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a href="outgoing_docs.php" class="<?php if($page=='outgoing'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="ri-send-plane-line"></i>
      <span>Outgoing &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <span class="badge bg-danger">2</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a href="pending_docs.php" class="<?php if($page=='pending'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="ri-question-mark"></i>
      <span>Hold &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <span class="badge bg-primary">4</span>
    </a>
  </li><!-- End Dashboard Nav -->
  
  <li class="nav-item">
  <a href="tracking.php" class="<?php if($page=='track'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-geo"></i>
      <span>Track Douments</span>
    </a>
  </li><!-- End All docs Nav -->
  <br>
 
  <li class="nav-heading">Settings</li>

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