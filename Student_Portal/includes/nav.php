<!-- ======= Header ======= -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="../assets/img/BCPlogo.png" alt="">
        <span class="d-none d-lg-block">Student Module</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" id="viewnotif" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number count"></span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have <span class="notif"></span> new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
              <span class="status actiuve"></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <div style="overflow-y: scroll; max-height:370px;">
              <?php
                require_once 'gac_Config.php';
                $notif = $db->query('SELECT * FROM notification')->fetchAll();
                $titleCount = 0;
                foreach ($notif as $data)
                {

                }
               ?>
              <li class="notification"></li>
            </div>

            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul>
        </li>
        <!-- End Notification Nav -->


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../assets/img/BCPlogo.png" alt="Profile" class="rounded-circle">
            <!-- <i class="rounded-circle bi bi-person-circle"></i> -->
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $verified_session_lastname . ", " . $verified_session_firstname ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $verified_session_lastname . ", " . $verified_session_firstname ?></h6>
              <span><?php echo $_SESSION['session_department'] ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="student-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="includes/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
  <!-- for notification -->
<script>
  $(document).ready(function(){

  function load_unseen_notification(view = '')
  {
    $.ajax({
    url:"notif/fetch.php",
    method:"POST",
    data:{view:view},
    dataType:"json",
    success:function(data)
    {
      $('.notification').html(data.notification);
      if(data.unseen_notification > 0)
      {
      $('.count').html(data.unseen_notification);
      }else{
        $('.notif').html('0');
      }
    }
    });
  }

  load_unseen_notification();

  $(document).on('click', '#viewnotif', function(){
    $('.count').html('');
    load_unseen_notification('yes');
  });

  setInterval(function(){
    load_unseen_notification();;
  }, 5000);

  });
</script>
