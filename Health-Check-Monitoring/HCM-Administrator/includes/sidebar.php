 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">
   <ul class="sidebar-nav" id="sidebar-nav">

     <?php $output = '';
      $key = $_SESSION['login_key'];
      if (isset($verified_session_department) && ($verified_session_username)) {
        switch ($verified_session_role) {
          case 'SuperAdmin':
            $output = '
              <li class="nav-item" >
                <a href="../../../super_admin/index.php?id=' . $key . '"style="color: rgb(83, 107, 148);font-weight:600;">
                  <i class="bi bi-arrow-return-left"></i>
                  <span>Return to SuperUser</span>
                </a>
              </li><!-- End Return Nav -->    
            ';
            break;
        }
        echo $output;
      }
      ?>

     <li class="nav-item">
       <a href="index.php?id=<?php echo $_SESSION['login_key']; ?>" class="
       <?php if ('Dashboard' == $page) {
          echo 'nav-link';
        } else {
          echo 'nav-link collapsed';
        } ?>">
         <i class="bi bi-graph-up"></i>
         <span>Dashboard</span>
       </a>
     </li><!-- End Dashboard Nav -->


     <li class="nav-heading text-primary">Module</li>

     <li class="nav-item">
       <a class="nav-link collapsed" data-bs-target="#hs-nav" data-bs-toggle="collapse" href="#">
         <i class="bi bi-shield-plus"></i><span>Health Monitoring</span><i class="bi bi-chevron-down ms-auto"></i>
       </a>
       <ul id="hs-nav" class="
       
       <?php if ('health-monitoring' == $nav) {
          echo 'nav-content collapse show';
        } else {
          echo 'nav-content collapse';
        } ?> " data-bs-parent="#sidebar-nav">

         <li>
           <a href="check-up.php?id=<?php echo $_SESSION['login_key']; ?>" class="
           
           <?php if ('check-up' == $page) {
              echo 'active';
            } ?>">
             <i class="bi bi-circle"></i><span>Check-up</span>
           </a>
         </li>


         <li>
           <a href="contact-tracing.php?id=<?php echo $_SESSION['login_key']; ?>" class="
           
           <?php if ('contact-tracing' == $page) {
              echo 'active';
            } ?>">
             <i class="bi bi-circle"></i><span>Contact Tracing</span>
           </a>
         </li>
       </ul>
     </li>


     <li class="nav-item">
       <a class="nav-link collapsed" data-bs-target="#inventory-nav" data-bs-toggle="collapse" href="#">
         <i class="bi bi-list-check"></i><span>Inventory</span><i class="bi bi-chevron-down ms-auto"></i>
       </a>
       <ul id="inventory-nav" class="
       
       <?php if ('inventory' == $nav) {
          echo 'nav-content collapse show';
        } else {
          echo 'nav-content collapse';
        } ?> " data-bs-parent="#sidebar-nav">
         <li>
           <a href="medical-medicines.php?id=<?php echo $_SESSION['login_key']; ?>" class="
           
           <?php if ('medicines' == $page) {
              echo 'active';
            } ?>">
             <i class="bi bi-circle"></i><span>Medicines</span>
           </a>
         </li>
         <li>
           <a href="medical-equipments.php?id=<?php echo $_SESSION['login_key']; ?>" class="
           
           <?php if ('equipments' == $page) {
              echo 'active';
            } ?>">
             <i class="bi bi-circle"></i><span>Medical Equipments</span>
           </a>
         </li>
       </ul>
     </li>

     <li class="nav-heading text-primary">Records</li>


     <li class="nav-item">
       <a href="annua-examination.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('Records-list' == $page) {
                                                                                          echo 'nav-link';
                                                                                        } else {
                                                                                          echo 'nav-link collapsed';
                                                                                        } ?>">
         <i class="ri-health-book-line"></i>
         <span>Annual Medical Examination</span>
       </a>
     </li>


     <li class="nav-heading text-primary">Monitor</li>


     <li class="nav-item">
       <a class="nav-link collapsed" data-bs-target="#logs-nav" data-bs-toggle="collapse" href="#">
         <i class="bi bi-person-lines-fill"></i><span>Employee Logs</span><i class="bi bi-chevron-down ms-auto"></i>
       </a>
       <ul id="logs-nav" class="<?php if ('logs' == $nav) {
                                  echo 'nav-content collapse show';
                                } else {
                                  echo 'nav-content collapse';
                                } ?> " data-bs-parent="#sidebar-nav">
         <li>
           <a href="logs-admin.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('logs-admin' == $page) {
                                                                                      echo 'active';
                                                                                    } ?>">
             <i class="bi bi-circle"></i><span>Admin-Logs</span>
           </a>
         </li>
         <li>
           <a href="logs-staff.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('logs-staffs' == $page) {
                                                                                      echo 'active';
                                                                                    } ?>">
             <i class="bi bi-circle"></i><span>Staff-Logs</span>
           </a>
         </li>
         <li>
           <a href="activities.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('activities' == $page) {
                                                                                      echo 'active';
                                                                                    } ?>">
             <i class="bi bi-circle"></i><span>Activities</span>
           </a>
         </li>
       </ul>
     </li>

     <li class="nav-item">
       <a class="nav-link collapsed" data-bs-target="#enrolled-nav" data-bs-toggle="collapse" href="#">
         <i class="bi bi-layout-text-sidebar-reverse"></i><span>Over All Records</span><i
           class="bi bi-chevron-down ms-auto"></i>
       </a>
       <ul id="enrolled-nav" class="<?php if ('OAR' == $nav) {
                                      echo 'nav-content collapse show';
                                    } else {
                                      echo 'nav-content collapse';
                                    } ?> " data-bs-parent="#sidebar-nav">
         <li>
           <a href="overall-records-students.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('student-list' == $page) {
                                                                                                    echo 'active';
                                                                                                  } ?>">
             <i class="bi bi-circle"></i><span>Student List</span>
           </a>
         </li>
         <li>
           <a href="overall-records-teacher.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('teacher-list' == $page) {
                                                                                                    echo 'active';
                                                                                                  } ?>">
             <i class="bi bi-circle"></i><span>Faculty List</span>
           </a>
         </li>
       </ul>
     </li>

     <li class="nav-heading text-primary">Settings</li>

     <li class="nav-item">
       <a href="users-profile.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('Profile' == $page) {
                                                                                      echo 'nav-link';
                                                                                    } else {
                                                                                      echo 'nav-link collapsed';
                                                                                    } ?>">
         <i class="bi bi-person"></i>
         <span>Profile</span>
       </a>
     </li><!-- End Profile Page Nav -->

     <li class="nav-item">
       <a href="FAQ.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('FAQ' == $page) {
                                                                            echo 'nav-link';
                                                                          } else {
                                                                            echo 'nav-link collapsed';
                                                                          } ?>">
         <i class="bi bi-question-circle"></i>
         <span>F.A.Q</span>
       </a>
     </li><!-- End Contact Page Nav -->

     <li class="nav-item">
       <a href="pages-contact.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('contact' == $page) {
                                                                                      echo 'nav-link';
                                                                                    } else {
                                                                                      echo 'nav-link collapsed';
                                                                                    } ?>">
         <i class="bi bi-telephone-inbound"></i>
         <span>Contact</span>
       </a>
     </li>

     <li class="nav-item">
       <a href="pages-contact.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('contact' == $page) {
                                                                                      echo 'nav-link';
                                                                                    } else {
                                                                                      echo 'nav-link collapsed';
                                                                                    } ?>">
         <i class="bi bi-box-arrow-right"></i>
         <span>log-out</span>
       </a>
     </li><!-- End Contact Page Nav -->
   </ul>
 </aside><!-- End Sidebar-->