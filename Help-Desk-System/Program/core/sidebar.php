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
                <a href="index.php?id=<?php echo $_SESSION["login_key"];?>"class="<?php if($page=='manage'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" id="sideButton">
                <i class="bi bi-question-octagon"></i>
                        <span>Library &nbsp;</span>
                    </a>
                </li><!-- End Dashboard Nav -->

               

                    <li class="nav-item">
                        <a href="ticket_list.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='ticket'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" id="sideButton">
                        <i class="bi bi-card-checklist"></i>
                            <span>Ticket &nbsp;</span>
                        
                        </a>
                    </li><!-- All faqs analytics Nav -->

            
                

                    <li class="nav-item">
                        <a href="user_policy.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='UP'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" id="sideButton">
                        <i class="bi bi-shield-check"></i>
                            <span>User Policy &nbsp;</span>
                        </a>
                        </li><!-- Policy Nav -->
                    

                        <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-bookmark"></i></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="reports-nav" class="<?php if($col=='reports'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
                      <li>
                      <a href="faqs_report.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='FR'){echo 'active';}?>">
                        <i class="bi bi-circle"></i><span>FAQs Reports</span>
                        </a>
                      </li>
                      <li>
                      <a href="reports_ticket.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='TR'){echo 'active';}?>">
                        <i class="bi bi-circle"></i><span>Ticket Reports</span>
                        </a>
                      </li>
                    </ul>
                  </li><!-- End Reports Nav -->
        

               
                           

                    <li class="nav-heading">Other</li>

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

        </aside><!-- End Sidebar-->
