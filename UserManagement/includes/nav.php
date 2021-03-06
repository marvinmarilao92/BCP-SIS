<!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
  <?php
  // include "key_checker.php";?>
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php?id=<?php echo $_SESSION["login_key"];?>" class="logo d-flex align-items-center">
        <img src="../assets/img/BCPlogo.png" alt="">
        <span class="d-none d-lg-block">User Management</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- <img src="../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <img src="../assets/img/BCPlogo.png" alt="Profile">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $verified_session_lastname . ", " . $verified_session_firstname ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $verified_session_lastname . ", " . $verified_session_firstname ?></h6>
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
                        <a class="dropdown-item d-flex align-items-center" href="../super_admin/index.php?id='.$key.'">
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
                        <a class="dropdown-item d-flex align-items-center" href="logout.php">
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

  </header><!-- End Header -->
