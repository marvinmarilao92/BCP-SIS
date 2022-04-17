 <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
    <?php 
          $output = '';
          $key = $_SESSION["login_key"];
          if(isset($verified_session_department) && ($verified_session_username)){
            switch($verified_session_role){
              case "SuperAdmin":
                //statement
                $output .= '
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
        }else{

        }
        ?>
      <li class="nav-item">
      <a href="index.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='dashboard'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Module</li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="validate-records.php">
          <i class="bi bi-clipboard-check"></i>
          <span>Request &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
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
          <a class="nav-link collapsed" data-bs-target="#records-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person-lines-fill"></i><span>Manage Records</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="records-nav" class="<?php if($col=='list'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
            <li>
              <a href="stud_list.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='SL'){echo 'active';}?>">
              <i class="bi bi-circle"></i><span>Validate</span>
              </a>
            </li>
            <li>
            <a href="teacher_list.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='TL'){echo 'active';}?>">
              <i class="bi bi-circle"></i><span>Rejected</span>
              </a>
            </li>
          </ul>
        </li>

      <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#logs-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person-lines-fill"></i><span>Audit Trail</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="logs-nav" class="<?php if($col=='list'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
            <li>
              <a href="stud_list.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='SL'){echo 'active';}?>">
              <i class="bi bi-circle"></i><span>HCM Nurse Logs</span>
              </a>
            </li>
            <li>
            <a href="teacher_list.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='TL'){echo 'active';}?>">
              <i class="bi bi-circle"></i><span>HCM Dentist Logs</span>
              </a>
            </li>
            <li>
            <a href="teacher_list.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='TL'){echo 'active';}?>">
              <i class="bi bi-circle"></i><span>HCM Physician Logs</span>
              </a>
            </li>
          </ul>
        </li>


      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="Frecords.php">
          <i class="bi bi-trash"></i>
          <span>Trash</span>
        </a>
      </li> -->
      <li class="nav-heading">Settings</li>
<!-- End Add office Page Nav -->

      <li class="nav-item">
        <a href="users-profile.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='PRO'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
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
