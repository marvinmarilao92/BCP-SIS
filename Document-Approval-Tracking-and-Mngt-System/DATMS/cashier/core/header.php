
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
  <?php include "key_checker.php";?>
<div class="d-flex align-items-center justify-content-between">
  <a href="index?id=<?php echo $_SESSION["login_key"];?>" class="logo d-flex align-items-center">
    <img src="../assets/img/Cashier.png" alt="">
    <span class="d-none d-lg-block">Payment Update</span>
  </a>
  <!-- <i class="bi bi-list toggle-sidebar-btn"></i> -->
</div><!-- End Logo -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">
   
    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="../assets/img/BCPlogo.png" alt="Profile" class="rounded-circle">
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
          <a class="dropdown-item d-flex align-items-center" href="index?id=<?php echo $_SESSION["login_key"];?>">
            <i class="bi bi-wallet2"></i>
            <span>Cashier</span>
          </a>
        </li>
        
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="ame-payment.php?id=<?php echo $_SESSION["login_key"];?>">
            <i class="ri ri-syringe-line"></i>
            <span>(A.M.E) Payment</span>
          </a>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="records?id=<?php echo $_SESSION["login_key"];?>">
            <i class="bi bi-cash-stack"></i>
            <span>Payment Records</span>
          </a>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile?id=<?php echo $_SESSION["login_key"];?>">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
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
                      <a class="dropdown-item d-flex align-items-center" href="../../../super_admin/index?id='.$key.'">
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

</header><!-- End Header -->