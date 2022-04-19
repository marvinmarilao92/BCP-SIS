 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

   <!-- Adding return nav item for super admin -->
   <?php 
          $output = '';
          $key = $_SESSION["login_key"];
          if(isset($verified_session_department) && ($verified_session_username)){
            switch($verified_session_role){
              case "SuperAdmin":
                //statement
                $output .= '
                <li class="nav-item">
                <a href="../../../super_admin/index.php?id='.$key.'" style="color: rgb(83, 107, 148);font-weight: 600;">
                  <i class="bi bi-arrow-return-left"></i>
                  <span>Return to SuperUser</span>
                </a>
              </li><!-- End Return Nav -->    
              ';

                break;  
            }
            echo $output;
        }else{
            // header("location:index.php");
        }
  ?>

<li class="nav-heading">Module</li>

  <li class="nav-item">
    <a href="dashboard.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='dashboard'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-bar-chart-line"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a href="app_list.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='applist'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-person-lines-fill"></i>
      <span>Student Application &nbsp;&nbsp;</span>
      <span class="badge bg-primary badge-number"> 
        <?php 
             require_once("include/conn.php");
             $query="SELECT * FROM student_application WHERE `account_status` NOT IN ('Enrolled') ORDER BY stud_date DESC ";
            $result=mysqli_query($conn,$query);
            if($result){
               echo mysqli_num_rows($result);
              }
        ?> 
      </span>
    </a>
  </li> <!-- hold item Nav -->

  <li class="nav-item">
    <a href="req_submit.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='reqsub'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="ri-pencil-line"></i>
        <span>Submit Requirements&nbsp;&nbsp;&nbsp;</span>
    </a>
  </li><!-- All docs Nav -->

  <li class="nav-item">
    <a href="index.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='enroll'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
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
      <a href="ofstud_list.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='offlist'){echo 'active';}?>">
        <i class="bi bi-circle"></i><span>Officially Enrolled</span>
        </a>
      </li>
      <li>
      <a href="transstud_list.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='translist'){echo 'active';}?>">
        <i class="bi bi-circle"></i><span>Transferee Students</span>
        </a>
      </li>
      <li>
      <a href="unstud_list.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='unlist'){echo 'active';}?>">
        <i class="bi bi-circle"></i><span>Unofficially Enrolled</span>
        </a>
      </li>
    </ul>
  </li><!-- End Reports Nav -->

  <li class="nav-item">
    <a href="stud_req.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='adreq'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="ri-send-plane-line"></i>
        <span>Admission Records</span>
    </a>
  </li><!-- outgoing item Nav -->

  <li class="nav-item">
    <a href="requirements.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='regreq'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="ri-folder-5-line"></i>
        <span>Registrar Records</span>
    </a>
  </li><!-- outgoing item Nav -->

</ul>

</aside><!-- End Sidebar-->