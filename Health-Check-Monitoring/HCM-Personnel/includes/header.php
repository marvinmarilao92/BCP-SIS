<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
<?php include "key_checker.php";?>
<div class="d-flex align-items-center justify-content-between">
  <a href="index.php?id=<?php echo $_SESSION["login_key"];?>" class="logo d-flex align-items-center">
    <img src="../assets/img/hcmlogo.png" alt="">
    <span class="d-none d-lg-block">HCM System</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">
   
    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
        <span class="badge bg-primary badge-number">1</span>
      </a><!-- End Notification Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">
          You have 4 new notifications
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
          <span class="status actiuve"></span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-exclamation-circle text-warning"></i>
          <div>
            <h4>Announcement</h4>
            <p>Put notification here</p>
            <p>30 min. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-x-circle text-danger"></i>
          <div>
            <h4>Memo</h4>
            <p>Put notification here</p>
            <p>1 hr. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-check-circle text-success"></i>
          <div>
            <h4>Announcement</h4>
            <p>Put notification here</p>
            <p>2 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-info-circle text-primary"></i>
          <div>
            <h4>Announcement</h4>
            <p>Put notification here</p>
            <p>4 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>
        <li class="dropdown-footer">
          <a href="#">Show all notifications</a>
        </li>

      </ul><!-- End Notification Dropdown Items -->

    </li><!-- End Notification Nav -->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-chat-left-text"></i>
        <span class="badge bg-success badge-number">3</span>
      </a><!-- End Messages Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
        <li class="dropdown-header">
          You have 3 new messages
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="../assets/img/messages-1.jpg" alt="" class="rounded-circle">
            <div>
              <h4>Maria Hudson</h4>
              <p>Message Content Must Be Placed Here...</p>
              <p>4 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="../assets/img/messages-2.jpg" alt="" class="rounded-circle">
            <div>
              <h4>Anna Nelson</h4>
              <p>Message Content Must Be Placed Here...</p>
              <p>6 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="../assets/img/messages-3.jpg" alt="" class="rounded-circle">
            <div>
              <h4>David Muldon</h4>
              <p>Message Content Must Be Placed Here...</p>
              <p>8 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="dropdown-footer">
          <a href="#">Show all messages</a>
        </li>

      </ul><!-- End Messages Dropdown Items -->

    </li><!-- End Messages Nav -->

    <li class="nav-item dropdown pe-3">
   
      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

          <?php 
            $result = displayProfile($verified_session_img, "imgSmall");
            echo $result;
          ?>
        <!-- class="rounded-circle" -->
        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $verified_session_firstname . " " . $verified_session_lastname ?></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><?php echo $verified_session_firstname . " " . $verified_session_lastname ?></h6>
          <span><?php echo $verified_session_role?></span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.php?id=<?php echo $_SESSION["login_key"];?>">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="pages-faq.php?id=<?php echo $_SESSION["login_key"];?>">
            <i class="bi bi-question-circle"></i>
            <span>Need Help?</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <!-- Adding return nav item for super admin -->
          <?php 
            $output = '';
            $key = $_SESSION["login_key"];
            if(isset($verified_session_department) && ($verified_session_username)){
              switch($verified_session_role){
                case "SuperAdmin":
                    //statement
                    $output .= '
                    <li>
                      <a class="dropdown-item d-flex align-items-center" href="../../../super_admin/index.php?id='.$key.'">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                      </a>
                    </li>    
                  ';
                break;  

                default:
                //statement
                  $output .= '
                    <li>
                      <a class="dropdown-item d-flex align-items-center" href="function/logout.php">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                      </a>
                    </li>    
                  ';
              }
              echo $output;
          }else{
              // header("location:index.php");
          }
          ?>

        

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header>