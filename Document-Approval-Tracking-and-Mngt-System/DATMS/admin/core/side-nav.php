<!-- ======= Sidebar ======= -->

  <aside id="sidebar" class="sidebar">
  <!-- Side Nav -->
    <ul class="sidebar-nav" id="sidebar-nav">
      <!-- Adding return nav item for super admin -->
        <?php 
          $output = '';
          $key = $_SESSION["login_key"];
          if(isset($verified_session_department) && ($verified_session_username)){
            switch($verified_session_role){
              case "SuperAdmin":
                //statement
                ?>
                 <li class="nav-item">
                  <a href="../../../super_admin/index.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php echo 'nav-link collapsed';?>" >
                    <i class="bi bi-arrow-return-left"></i>
                    <span>Return to SuperUser</span>
                  </a>
                </li><!-- End Return Nav -->        
            
                <?php
                break;  
            } 
        }else{

        }
        ?>

      <li class="nav-heading">Module</li>

        <li class="nav-item">
          <a href="index.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='dashboard'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
            <i class="bi bi-bar-chart-line"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
          <a href="requirements.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='req'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
            <i class="ri-folder-5-line"></i>
            <span>Requirements &nbsp;</span>
          </a>
        </li><!-- All docs Nav -->

        <li class="nav-item">
          <a href="documents_list.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='docs'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
            <i class="ri-book-2-line"></i>
            <span>Documents &nbsp;&nbsp;&nbsp;</span>
            <span class="badge bg-secondary">
              <?php 
                  require_once("include/conn.php");
                  $query="SELECT * FROM datms_documents WHERE (`doc_actor3`='$verified_session_firstname $verified_session_lastname' OR `doc_off3` = '$verified_session_office') AND `doc_status` NOT IN ('Deleted')";
                  $result=mysqli_query($conn,$query);
                  if($result){
                    echo mysqli_num_rows($result);
                    }
              ?> 
            </span>
          </a>
        </li><!-- All docs Nav -->

        <li class="nav-item">
          <a href="incoming_docs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='incoming'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
            <i class="ri-file-download-line"></i>
            <span>Incoming &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="badge bg-warning text-dark">
            <?php 
                  require_once("include/conn.php");
                  $query="SELECT * FROM datms_documents WHERE `doc_status` = 'Outgoing' AND (`doc_actor1`='$verified_session_firstname $verified_session_lastname ');";
                  $result=mysqli_query($conn,$query);
                  if($result){
                    echo mysqli_num_rows($result);
                    }
              ?> 
            </span>
          </a>
        </li><!-- Incoming item Nav -->

        <li class="nav-item">
          <a href="received_docs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='recieved'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
            <i class="ri-mail-check-line"></i>
            <span>Received &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="badge bg-success badge-number">
              <?php 
                  require_once("include/conn.php");
                  $query="SELECT * FROM datms_documents WHERE (`doc_status` = 'Created' OR `doc_status` = 'Received') AND (`doc_actor1`='$verified_session_firstname $verified_session_lastname ');";
                  $result=mysqli_query($conn,$query);
                  if($result){
                    echo mysqli_num_rows($result);
                    }
              ?> 
            </span>
          </a>
        </li><!-- recieved item Nav -->

        <li class="nav-item">
          <a href="outgoing_docs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='outgoing'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
            <i class="ri-send-plane-line"></i>
            <span>Outgoing &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="badge bg-danger badge-number">
            <?php 
                  require_once("include/conn.php");
                  $query="SELECT * FROM datms_documents WHERE `doc_status` = 'Outgoing'  AND (`doc_actor2`='$verified_session_firstname $verified_session_lastname ');";
                  $result=mysqli_query($conn,$query);
                  if($result){
                    echo mysqli_num_rows($result);
                    }
              ?> 
            </span>
          </a>
        </li><!-- outgoing item Nav -->

        <li class="nav-item">
          <a href="hold_docs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='hold'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
            <i class="ri-question-mark"></i>
            <span>Hold &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="badge bg-primary badge-number"> <?php 
                  require_once("include/conn.php");
                  $query="SELECT * FROM datms_documents WHERE `doc_status` = 'Hold'  AND (`doc_actor2`='$verified_session_firstname $verified_session_lastname ')";
                  $result=mysqli_query($conn,$query);
                  if($result){
                    echo mysqli_num_rows($result);
                    }
              ?> </span>
          </a>
        </li> <!-- hold item Nav -->

        <li class="nav-item">
          <a href="reject_docs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='reject'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
            <i class="ri-delete-bin-2-line"></i>
            <span>Rejected &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="badge bg-dark badge-number"> <?php 
                  require_once("include/conn.php");
                  $query="SELECT * FROM datms_documents WHERE `doc_status` = 'Rejected'  AND (`doc_actor3`='$verified_session_firstname $verified_session_lastname ')";
                  $result=mysqli_query($conn,$query);
                  if($result){
                    echo mysqli_num_rows($result);
                    }
              ?> </span>
          </a>
        </li> <!-- hold item Nav -->

        <li class="nav-item">
          <a href="tracking_docs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='track'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
            <i class="bi bi-geo"></i>
            <span>Track Douments</span>
          </a>
        </li><!-- tracking item Nav -->
         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#clearance-students-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-card-checklist"></i><span>Registrar Clearance</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="clearance-students-nav" class="<?php if($col=="clr"){echo "nav-content collapse show";}else{echo "nav-content collapse";}?>
            " data-bs-parent="#sidebar-nav">

            <li class="nav-heading">Students Clearance</li>
              <li>
                <a href="student-clearance-requirements.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='SCR'){echo 'active';}?>">
                  <i class="bi bi-circle"></i><span>Students Requirements</span>
                </a>
              </li>
              <li>
                <a href="student-clearance-status.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='SCS'){echo 'active';}?>">
                  <i class="bi bi-circle"></i><span>Students Status List</span>
                </a>
              </li>
              <li>
                <a href="student-clearance-appointment.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='SCA'){echo 'active';}?>">
                  <i class="bi bi-circle"></i><span>Students Appointments</span>
                </a>
              </li>

              <li class="nav-heading">Teachers Clearance</li>
              <li>
                <a href="teacher-clearance-requirements.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='TCR'){echo 'active';}?>">
                  <i class="bi bi-circle"></i><span>Teachers Requirements</span>
                </a>
              </li>
              <li>
                <a href="teacher-clearance-status.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='TCS'){echo 'active';}?>">
                  <i class="bi bi-circle"></i><span>Teachers Status List</span>
                </a>
              </li>
              <li>
                <a href="teacher-clearance-appointment.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='TCA'){echo 'active';}?>">
                  <i class="bi bi-circle"></i><span>Teachers Appointments</span>
                </a>
              </li>
              
            </ul>
          </li>

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#list-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person-lines-fill"></i><span>Over All Records</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="list-nav" class="<?php if($col=='list'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
            <li>
            <a href="stud_list.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='SL'){echo 'active';}?>">
              <i class="bi bi-circle"></i><span>Students List</span>
              </a>
            </li>
            <li>
            <a href="teacher_list.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='TL'){echo 'active';}?>">
              <i class="bi bi-circle"></i><span>Teachers List</span>
              </a>
            </li>
          </ul>
        </li><!-- End Reports Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="reports-nav" class="<?php if($col=='reports'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
            <li>
            <a href="reports_user.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='UR'){echo 'active';}?>">
              <i class="bi bi-circle"></i><span>User Reports</span>
              </a>
            </li>
            <li>
            <a href="reports_docs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='DR'){echo 'active';}?>">
              <i class="bi bi-circle"></i><span>Document Reports</span>
              </a>
            </li>
          </ul>
        </li><!-- End Reports Nav -->
        
        <!-- Audit Trail -->
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#audit-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-people"></i><span>Audit Trail</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="audit-nav" class="<?php if($col=='logs'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
          <li>
              <a href="logs_admin.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='AdL'){echo 'active';}?>">
                <i class="bi bi-circle"></i><span>Registrar Admin Logs</span>
              </a>
            </li>
            <li>
              <a href="logs_approver.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='ApL'){echo 'active';}?>">
                <i class="bi bi-circle"></i><span>Approver Logs</span>
              </a>
            </li>
            <li>
              <a href="logs_assistant.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='AL'){echo 'active';}?>">
                <i class="bi bi-circle"></i><span>Assistant Registrar Logs</span>
              </a>
            </li>
            <li>
              <a href="logs_admission.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='AdmL'){echo 'active';}?>">
                <i class="bi bi-circle"></i><span>Admission Logs</span>
              </a>
            </li>
            <li>
              <a href="logs_ro.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='ROL'){echo 'active';}?>">
                <i class="bi bi-circle"></i><span>Registrar Officer Logs</span>
              </a>
            </li>
          </ul>
        </li><!-- End Account Management Nav -->
        
      <li class="nav-heading">Settings</li>

       <li class="nav-item">
          <a href="create_program.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='prog'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
            <i class="bi bi-book"></i>
            <span>Program</span>
          </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
          <a href="create_doctype.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='doctT'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
            <i class="bi bi-file-earmark-text"></i>
            <span>Doc Type</span>
          </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
          <a href="create_dept.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='department'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
            <i class="bi bi-building"></i>
            <span>Department</span>
          </a>
        </li><!-- End Add office Page Nav -->

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

  </aside>
<!-- End Sidebar-->