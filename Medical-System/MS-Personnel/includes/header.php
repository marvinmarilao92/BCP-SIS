<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center bg-primary">
  <?php include "key_checker.php"; ?>
  <div class="d-flex align-items-center justify-content-between">
    <a href="index.php?id=<?php echo $_SESSION["login_key"]; ?>" class="logo d-flex align-items-center">
      <img src="../assets/img/pulse-svgrepo-com.svg" alt="">
      <span class="d-none d-lg-block text-light">Medical System</span>
    </a>



  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">




      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

          <?php
          // $result = displayProfile($verified_session_img, "imgSmall");
          // echo $result;
          if (file_exists('../../assets/users/' . $verified_session_img) && ($verified_session_img > 0)) {
            echo '<img src="../../assets/users/' . $verified_session_img . '" alt="Profile" class="rounded-circle m-2 w-100 h-100">';
          } else {
            echo '<img src="../../assets/users/person-circle.svg" alt="Profile" class="rounded-circle m-2 w-100 h-100">';
          }
          ?>
          <!-- class="rounded-circle" -->
          <span
            class="d-none d-md-block dropdown-toggle ps-2 text-light"><?php echo $verified_session_firstname . " " . $verified_session_lastname ?></span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?php echo $verified_session_firstname . " " . $verified_session_lastname ?></h6>
            <span><?php echo $verified_session_role ?></span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center"
              href="users-profile.php?id=<?php echo $_SESSION["login_key"]; ?>">
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
            <a class="dropdown-item d-flex align-items-center"
              href="pages-faq.php?id=<?php echo $_SESSION["login_key"]; ?>">
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
          if (isset($verified_session_department) && ($verified_session_username)) {
            switch ($verified_session_role) {
              case "SuperAdmin":
                //statement
                $output .= '
                    <li>
                      <a class="dropdown-item d-flex align-items-center" href="resources/logout.php?id=' . $key . '">
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
                      <a class="dropdown-item d-flex align-items-center" href="resources/logout.php">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                      </a>
                    </li>    
                  ';
            }
            echo $output;
          } else {
            // header("location:index.php");
          }
          ?>



        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header>