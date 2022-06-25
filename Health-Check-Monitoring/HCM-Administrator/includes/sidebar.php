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
                <a href="../../super_admin/index.php?id=' . $key . '"style="color: rgb(83, 107, 148);font-weight:600;">
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

     <li class="nav-heading text-primary"><i class="bi bi-tools"></i>&nbspModule</li>


     <li class="nav-item">
       <a href="check-up.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('check-up' == $page) {
                                                                                echo 'nav-link';
                                                                              } else {
                                                                                echo 'nav-link collapsed';
                                                                              } ?>">
         <i class="bi bi-thermometer-half"></i>
         <span>Check-up</span>
       </a>
     </li>


     <li class="nav-item">
       <a class="nav-link collapsed" data-bs-target="#Mlogs-nav" data-bs-toggle="collapse" href="#">
         <i class="bi bi-person-lines-fill"></i><span>Manage Logs</span><i class="bi bi-chevron-down ms-auto"></i>
       </a>
       <ul id="Mlogs-nav" class="
       
       <?php if ('Mlogs' == $nav) {
          echo 'nav-content collapse show';
        } else {
          echo 'nav-content collapse';
        } ?> " data-bs-parent="#sidebar-nav">

         <li>
           <a href="check-up-logs.php?id=<?php echo $_SESSION['login_key']; ?>" class="
           
           <?php if ('check-up-logs' == $page) {
              echo 'active';
            } ?>">
             <i class="bi bi-circle"></i><span>Check-up</span>
           </a>
         </li>


         <li>
           <a href="daily-ct-logs.php?id=<?php echo $_SESSION['login_key']; ?>" class="
           
           <?php if ('daily-contact-tracing-logs' == $page) {
              echo 'active';
            } ?>">
             <i class="bi bi-circle"></i><span>Daily Contact Tracing</span>
           </a>
         </li>

         <li>
           <a href="overall-ct-logs.php?id=<?php echo $_SESSION['login_key']; ?>" class="
           
           <?php if ('overall-contact-tracing-logs' == $page) {
              echo 'active';
            } ?>">
             <i class="bi bi-circle"></i><span>Overall Contact Tracing</span>
           </a>
         </li>
       </ul>
     </li>

     <li class="nav-item">
       <a class="nav-link collapsed" data-bs-target="#inv-nav" data-bs-toggle="collapse" href="#">
         <i class="bi bi-clipboard-data"></i><span>Inventory</span><i class="bi bi-chevron-down ms-auto"></i>
       </a>
       <ul id="inv-nav" class="
       
       <?php if ('inv' == $nav) {
          echo 'nav-content collapse show';
        } else {
          echo 'nav-content collapse';
        } ?> " data-bs-parent="#sidebar-nav">

         <li>
           <a href="stocks.php?id=<?php echo $_SESSION['login_key']; ?>" class="
           
           <?php if ('stocks' == $page) {
              echo 'active';
            } ?>">
             <i class="bi bi-circle"></i><span>Stocks</span>
           </a>
         </li>


         <li>
           <a href="receiving.php?id=<?php echo $_SESSION['login_key']; ?>" class="
           
           <?php if ('receiving' == $page) {
              echo 'active';
            } ?>">
             <i class="bi bi-circle"></i><span>Incoming</span>
           </a>
         </li>

         <li>
           <a href="stock-his.php?id=<?php echo $_SESSION['login_key']; ?>" class="
           
           <?php if ('stock-his' == $page) {
              echo 'active';
            } ?>">
             <i class="bi bi-circle"></i><span>History</span>
           </a>
         </li>
       </ul>
     </li>

     <li class="nav-item">
       <a class="nav-link collapsed" data-bs-target="#emplogs-nav" data-bs-toggle="collapse" href="#">
         <i class="bi bi-person-check-fill"></i><span>Employee Logs</span><i class="bi bi-chevron-down ms-auto"></i>
       </a>
       <ul id="emplogs-nav" class="<?php if ('emplogs' == $nav) {
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
           <a href="activities.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('activities' == $page) {
                                                                                      echo 'active';
                                                                                    } ?>">
             <i class="bi bi-circle"></i><span>Activities</span>
           </a>
         </li>
       </ul>
     </li>


     <li class="nav-heading text-primary"><i class="bi bi-gear-fill"></i>&nbspSettings</li>

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

   <div class="alert alert-info" role="alert">
     <h4 class="alert-heading">Health Check Monitoring System</h4>
     <p>Medical Practicioner</p>
     <p class="mb-0">This system contains clinic logs that is needed to monitor individuals of BESTLINK COLLEGE OF THE
       PHILIPPINES
       Health.
     </p>
   </div>

 </aside><!-- End Sidebar-->