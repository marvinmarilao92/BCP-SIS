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
                $output .= '
                <li class="nav-item" >
                  <a href="../../super_admin/index.php?id='.$key.'"style="color: rgb(83, 107, 148);font-weight:600;">
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
                    <a href="index.php?id=<?php echo $_SESSION["login_key"];?>"class="<?php if($page=='dashboard'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" id="sideButton">
                        <i class="bi bi-grid"></i>
                        <span >Dashboard</span>
                    </a>
                </li><!-- End Dashboard Nav -->

       
       
          <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#faqs-nav" data-bs-toggle="collapse" href="#" id="sideButton">
          <i class="bi bi-collection"></i><span>Department F.A.Q.S</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="faqs-nav" class="<?php if($col=='managef'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
            <li>
            <a href="view-faqs-reg.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='P'){echo 'active';}?>">
            <i class="bi bi-caret-right-fill" style="font-size: 14px;"></i><span>Registrar</span>
              </a>
            </li>
            <li>
            <a href="view-faqs-acc.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='D'){echo 'active';}?>">
            <i class="bi bi-caret-right-fill" style="font-size: 14px;"></i><span>Accounting</span>
              </a>
            </li>
            <li>
            <a href="view-faqs-ad.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='A'){echo 'active';}?>">
            <i class="bi bi-caret-right-fill" style="font-size: 14px;"></i><span>Admission</span>
              </a>
            </li>
            <li>
            <a href="view-faqs-cas.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='C'){echo 'active';}?>">
            <i class="bi bi-caret-right-fill" style="font-size: 14px;"></i><span>Cashier</span>
              </a>
            </li>
           
          </ul>
        </li><!-- End Reports Nav -->
       
        <li class="nav-item">
          <a href="admin-ticket-view.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='tic'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" id="sideButton">
          <i class="ri-ticket-line"></i>
            <span>Tickets &nbsp;</span>
            
          </a>
        </li><!-- All ticket analytics Nav -->

        <li class="nav-item">
          <a href="student_logs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='student'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" id="sideButton">
          <i class="bi bi-layout-text-window-reverse"></i>
            <span>Student logs &nbsp;</span>
            
          </a>
        </li><!-- student log Nav -->

            
    <!-- Audit Trail -->
    <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#audit-nav" data-bs-toggle="collapse" href="#" id="sideButton">
          <i class="bi bi-people"></i><span>Audit trail</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="audit-nav" class="<?php if($col=='list'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
            <li>
            <a href="logs_staff.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='S'){echo 'active';}?>">
            <i class="bi bi-caret-right-fill" style="font-size: 14px;"></i><span>Staff</span>
              </a>
            </li>
            <li>
            <a href="logs_accounting.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='D'){echo 'active';}?>">
            <i class="bi bi-caret-right-fill" style="font-size: 14px;"></i><span>Accounting</span>
              </a>
            </li>
            <li>
            <a href="logs_registrar.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='P'){echo 'active';}?>">
            <i class="bi bi-caret-right-fill" style="font-size: 14px;"></i><span>Registrar</span>
              </a>
            </li>
            <li>
            <a href="logs_cashier.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='C'){echo 'active';}?>">
            <i class="bi bi-caret-right-fill" style="font-size: 14px;"></i><span>Cashier</span>
              </a>
            </li>
            <li>
            <a href="logs_admission.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='A'){echo 'active';}?>">
            <i class="bi bi-caret-right-fill" style="font-size: 14px;"></i><span>Admission</span>
              </a>
            </li>
          </ul>
        </li><!-- End Reports Nav -->
        <li class="nav-item">
          <a href="user_policy.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='UP'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" id="sideButton">
          <i class="bi bi-shield-check"></i>
            <span>User Policy &nbsp;</span>
          </a>
        </li><!-- Policy Nav -->
    
        
      
       

                <li class="nav-heading">Settings</li>

                <li class="nav-item">
                    <a href="user-profile.php?id=<?php echo $_SESSION["login_key"];?>"class="<?php if($page=='profile'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                </li><!-- End Profile Page Nav -->

              

                <li class="nav-item">
                    <a href="contact.php?id=<?php echo $_SESSION["login_key"];?>"class="<?php if($page=='contact'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                        <i class="bi bi-envelope"></i>
                        <span>Contact</span>
                    </a>
                </li><!-- End Contact Page Nav -->

              
              
            </ul>

        </aside><!-- End Sidebar-->
