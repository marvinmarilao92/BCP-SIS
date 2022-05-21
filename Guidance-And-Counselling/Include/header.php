
 <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center shadow-sm p-3 mb-5 bg-white rounded" style= " height: 50px; marigin: 0px; ">
          <!-- background-color: rgba(245, 254, 255, 1); -->

            <div class="d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <img src="images/newLOgo.png">
                    <span class="d-none d-lg-block" style="font-size: 19px;">Guidance & Counseling</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->

<!--            <div class="search-bar">
                <form class="search-form d-flex align-items-center" method="POST" action="#">
                    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                </form>
            </div> End Search Bar -->

            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">

                    <li class="nav-item d-block d-lg-none">
                        <a class="nav-link nav-icon search-bar-toggle " href="#">
                            <i class="bi bi-search"></i>
                        </a>
                    </li><!-- End Search Icon-->



                    <li class="nav-item dropdown">

                        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" >
                            <i class="bi bi-bell text-primary"  ></i>
                            <span class="badge bg-danger badge-number">4</span>
                        </a><!-- End Notification Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications"   >

                            <li class="dropdown-header">
                                <span id="notifBadges">You have 4 new notifications</span>
                                <a href="#" onclick="showAllNotif();"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <div Style="
                                            height: 500px; width: 330px;
                                            overflow-x: hidden;
                                            overflow-y: auto;"
                                            id="notifContainer">
                            <?php
                              require_once 'Config.php';
                              require_once 'timezone.php';
                              $dtmsRequest = $db->query('SELECT * FROM gac_datarequest
                                ORDER BY created_at desc')->fetchAll();
                              foreach ($dtmsRequest as $req) :


                              if ($req["Request_Status"] == "Pending")
                              {

                                $date_a = new DateTime($req["created_at"]);
                                $date_b = new DateTime($time);
                                $interval = date_diff($date_a,$date_b);
                                echo ' <a href="#" onclick="showCurrentNofif('.$req["ID"].','; echo "'notifInfo'"; echo ');">
                                <li class="notification-item">
                                      <i class="bi bi-exclamation-circle text-primary"></i>
                                      <div>
                                          <h4>Guidance and Counselor</h4>
                                          <p>Requesting student information</p>
                                          <p>Couse: <b>'.$req["Student_Course"].'</b></p>
                                          <p>Shool Year: <b>'.$req["Student_School_year"].'</b></p>
                                          <p>Year Level: <b>'.$req["Student_Year_Level"].'</b></p>';
                                          if ($req["Request_Remarks"] != null) echo '  <p class="card-text">Remarks: '.$req["Request_Remarks"].'</p>'; else echo '<p class="card-text">Remarks:  - </p>';
                                echo'     <p class="card-text">'.$interval->format('%h:%i:%s').' Ago</p>
                                      </div>
                                  </li>

                                  <li>
                                      <hr class="dropdown-divider">
                                  </li></a>';
                              }
                              if ($req["Request_Status"] == "Approved")
                              {
                                $date_a = new DateTime($req["updated_at"]);
                                $date_b = new DateTime($time);
                                $interval = date_diff($date_a,$date_b);
                                echo '
                                <li class="notification-item">
                                      <i class="bi bi-exclamation-circle text-success"></i>
                                      <div>
                                          <h4>Guidance and Counselor</h4>
                                          <p>Requesting student information</p>
                                          <p>Couse: <b>'.$req["Student_Course"].'</b></p>
                                          <p>Shool Year: <b>'.$req["Student_School_year"].'</b></p>
                                          <p>Year Level: <b>'.$req["Student_Year_Level"].'</b></p>';
                                          if ($req["Request_Remarks"] != null) echo '  <p class="card-text">Remarks: '.$req["Request_Remarks"].'</p>'; else echo '<p class="card-text">Remarks:  - </p>';
                                echo'     <p class="card-text">'.$interval->format('%h:%i:%s').' Ago</p>
                                      </div>
                                  </li>

                                  <li>
                                      <hr class="dropdown-divider">
                                  </li>';
                              }
                              if ($req["Request_Status"] == "Declined")
                              {
                                $date_a = new DateTime($req["updated_at"]);
                                $date_b = new DateTime($time);
                                $interval = date_diff($date_a,$date_b);
                                echo '
                                <li class="notification-item">
                                      <i class="bi bi-exclamation-circle text-danger"></i>
                                      <div>
                                          <h4>Guidance and Counselor</h4>
                                          <p>Requesting student information</p>
                                          <p>Couse: <b>'.$req["Student_Course"].'</b></p>
                                          <p>Shool Year: <b>'.$req["Student_School_year"].'</b></p>
                                          <p>Year Level: <b>'.$req["Student_Year_Level"].'</b></p>';
                                          if ($req["Request_Remarks"] != null) echo '  <p class="card-text">Remarks: '.$req["Request_Remarks"].'</p>'; else echo '<p class="card-text">Remarks:  - </p>';
                                echo'     <p class="card-text">'.$interval->format('%h:%i:%s').' Ago</p>
                                      </div>
                                  </li>

                                  <li>
                                      <hr class="dropdown-divider">
                                  </li>';
                              }


                                  endforeach;
                                  $badge = $db->query('SELECT count(Request_Status) AS Req FROM gac_datarequest  WHERE Request_Status = ?', "Pending")->fetchArray();
                                  $_SESSION["badgeCount"] = $badge["Req"];   ?>
                                  <script> myBadge('notifBadges'); </script>
                              </div>
                              <li>
                                  <hr class="dropdown-divider">
                              </li>

                            <li class="dropdown-footer">
                                <a href="#" onclick="showAllNotif();">Show all notifications</a>
                            </li>

                        </ul><!-- End Notification Dropdown Items -->

                    </li><!-- End Notification Nav -->

















                    <li class="nav-item dropdown">

                        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-chat-left-text text-primary"></i>
                            <span class="badge bg-danger badge-number">3</span>
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
                                    <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                                    <div>
                                        <h4>Maria Hudson</h4>
                                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                        <p>4 hrs. ago</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="message-item">
                                <a href="#">
                                    <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                    <div>
                                        <h4>Anna Nelson</h4>
                                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                        <p>6 hrs. ago</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="message-item">
                                <a href="#">




                                    <div>
                                        <h4>David Muldon</h4>
                                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
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
                        <?php
                            if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id']))
                            {
                                if (!isset($_SESSION['success']) && !isset($_SESSION["Fname".$_SESSION['success'].""]) && !isset($_SESSION["Lname".$_SESSION['success'].""]))
                                {
                                    echo '<script type="text/javascript">location.href = "modules.php"</script>'; session_destroy();   die();
                                }
                                if ($_SESSION['success'] != $_GET['id'])
                                {
                                    echo '<script type="text/javascript">location.href = "modules.php"</script>'; session_destroy();   die();
                                }
                            }
                            if (!isset($_GET['id']))
                            {
                                    echo '<script type="text/javascript">location.href = "modules.php"</script>';  session_destroy(); die();
                            }

                        ?>
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" onclick="Username();">

                            <?php
                                if (isset($_SESSION["User_img".$_SESSION['success'].""]))
                                {
                                    echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION["User_img".$_SESSION['success'].""]).'" alt="Profile" class="rounded-circle">';
                                }
                                else
                                {
                                    echo '<img src="https://st3.depositphotos.com/3581215/18899/v/600/depositphotos_188994514-stock-illustration-vector-illustration-male-silhouette-profile.jpg" alt="Profile" class="rounded-circle">';
                                }
                            ?>

                            <span class="d-none d-md-block dropdown-toggle ps-2" id="Username">
                                    <?php echo $_SESSION['Fname'.$_SESSION['success'].""]; ?>
                            </span>
                        </a><!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6>
                                    <?php echo   $_SESSION["Lname".$_SESSION['success'].""].", ".$_SESSION["Fname".$_SESSION['success'].""]; ?>
                                </h6>
                                <span>
                                    <?php
                                        if (isset($_SESSION["Role".$_SESSION['success'].""]))
                                        {
                                            echo $_SESSION["Role".$_SESSION['success'].""];
                                        }
                                        else
                                        {
                                             echo 'Administrator';
                                        }
                                    ?>
                                </span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                    <i class="bi bi-person"></i>
                                    <span>My Profile</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                    <i class="bi bi-gear"></i>
                                    <span>Account Settings</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                    <i class="bi bi-question-circle"></i>
                                    <span>Need Help?</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="Logout.php">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </a>
                            </li>

                        </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->

                </ul>
            </nav><!-- End Icons Navigation -->


        </header><!-- End Header -->



      <?php include 'tableModal.php'; ?>
