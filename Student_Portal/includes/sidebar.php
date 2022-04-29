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

    <!-- Audit Trail -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-people"></i><span>Clearance For Students</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="<?php if($col=='Clearance'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
      <li>
          <a href="clearance-status.php" class="<?php if($page=='clr'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Clearance Status</span>
          </a>
        </li>
      </ul>
    </li><!-- End Account Management Nav -->

<li class="nav-heading">Document Tracking</li>

  <li class="nav-item">
    <a class="<?php if($page=='docs'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" href="docu_req.php">
      <i class="bi bi-file-earmark-text"></i>
      <span>Documents Requested </span>
    </a>
  </li><!-- End Dashboard Nav -->



  <!-- <li class="nav-item">
    <a class="<?php if($page=='track'){echo 'nav-link';}else{echo 'nav-link collapsed show';}?>" data-bs-target="#clearance-students-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person-lines-fill"></i><span>Clearance For Students</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="clearance-students-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="clearance-status.php">
          <i class="bi bi-circle"></i><span>Clearance Status</span>
        </a>
      </li>
    </ul>
  </li> -->
  <!-- End clearance-students Nav -->

  <li class="nav-item">
      <a href="tracking_docs.php" class="<?php if($page=='track'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
        <i class="bi bi-geo"></i>
        <span>Track Douments</span>
      </a>
    </li><!-- tracking item Nav -->


    <li class="nav-heading">Help Desk</li>

    <li class="nav-item">
  <a href="pages-faq.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='faqs'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
    <i class="bi bi-question-circle"></i>
      <span>F.A.Q.S</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->
  <li class="nav-item">
<a data-bs-toggle="modal" data-bs-target="#verticalycentered" class="<?php if($page=='ticket'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
    <i class="bi bi-envelope"></i>
      <span>Inbox</span>
 </a>

  </li>


 

</ul>





</aside><!-- End Sidebar-->