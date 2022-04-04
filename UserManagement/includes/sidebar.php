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
                <a href="../super_admin/index.php?id='.$key.'" style="color: rgb(83, 107, 148);font-weight: 600;">
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
        <a class="<?php if($page=='SI'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" href="index.php?id=<?php echo $_SESSION["login_key"];?>">
          <i class="bi bi-person-plus-fill"></i>
          <span>Students</span>
        </a>
      </li>
      <!-- End Student Page Nav -->

      <li class="nav-item">
        <a class="<?php if($page=='TI'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" href="teacher.php?id=<?php echo $_SESSION["login_key"];?>">
          <i class="ri ri-parent-fill"></i>
          <span>Teacher</span>
        </a>
      </li><!-- End Teacher Page Nav -->

      <li class="nav-item">
        <a class="<?php if($page=='EI'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" href="admin.php?id=<?php echo $_SESSION["login_key"];?>">
          <i class="bi bi-briefcase-fill"></i>
          <span>Employee</span>
        </a>
      </li><!-- End Employee Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->
