 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-heading">Module</li>

  <li class="nav-item">
    <a href="dashboard.php" class="<?php if($page=='dashboard'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-bar-chart-line"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a href="app_list.php" class="<?php if($page=='applist'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-person-lines-fill"></i>
      <span>Student Application &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <span class="badge bg-primary badge-number"> 
        <?php 
             require_once("include/conn.php");
             $query="SELECT * FROM student_application ORDER BY stud_date DESC ";
            $result=mysqli_query($conn,$query);
            if($result){
               echo mysqli_num_rows($result);
              }
        ?> 
      </span>
    </a>
  </li> <!-- hold item Nav -->

  <li class="nav-item">
    <a href="index.php" class="<?php if($page=='enroll'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="ri-book-2-line"></i>
        <span>Enroll Student &nbsp;&nbsp;&nbsp;</span>
    </a>
  </li><!-- All docs Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Student Records</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="<?php if($col=='reports'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
      <li>
      <a href="ofstud_list.php" class="<?php if($page=='offlist'){echo 'active';}?>">
        <i class="bi bi-circle"></i><span>Offically Enrolled</span>
        </a>
      </li>
      <li>
      <a href="unstud_list.php" class="<?php if($page=='unlist'){echo 'active';}?>">
        <i class="bi bi-circle"></i><span>Unoffically Enrolled</span>
        </a>
      </li>
    </ul>
  </li><!-- End Reports Nav -->

  <li class="nav-item">
    <a href="outgoing_docs.php" class="<?php if($page=='outgoing'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="ri-send-plane-line"></i>
        <span>Requirement Submited</span>
    </a>
  </li><!-- outgoing item Nav -->

</ul>

</aside><!-- End Sidebar-->