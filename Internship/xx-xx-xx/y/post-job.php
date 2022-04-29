<!DOCTYPE html>
<?php 
require 'session.php';
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bestlink College of the Philippines: Internship(BETA)</title>
  <meta content="Internship Management System / Intern Portal" name="description">
  <meta content="job, work, resume, applicants, application, employee, employer, hire, hiring, human resource management, hr, online job management, company, worker, career, recruiting, recruitment" name="keywords">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Favicons -->
  <link href="https://bcp.edu.ph/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
        <i class="bi bi-exclamation-circle text-warning"></i>
        Log out ?
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to log out?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a type="button" class="btn btn-primary" href="logout.php">Yes</a>
      </div>
    </div>
  </div>
</div>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="home.php?t_#id=202390219342" class="logo d-flex align-items-center">
        <img src="assets/img/ojt.png" alt="">
        <span class="d-none d-lg-block">Internship</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
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
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
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

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <?php if($_SESSION['myavatar'] == null){
                          echo'<img src="assets/img/default.jpg" alt="Profile" class="rounded-circle">';
                        }
                          else{
                            echo'<img src="data:image;base64, '.base64_encode($_SESSION['myavatar']).'" alt="Profile" class="rounded-circle">';
                          }

                          ?>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo($_SESSION['myfname']);?></span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo($_SESSION['myfname']);?></h6>
              <h1 style="font-size: 12px";><?php echo($_SESSION['myrole']);?></h1>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile.php?=<?php

               echo md5($_SESSION['myid']);

                ?> + <?php echo md5($_SESSION['myrole']);?>">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="user_profile.php?t=#id=@928392173100323#">
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
              <a class="dropdown-item d-flex align-items-center" data-toggle="modal" data-target="#exampleModal" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="profile.php?=<?php

               echo md5($_SESSION['myid']);

                ?> + <?php echo md5($_SESSION['myrole']);?>">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->
       <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Support
          </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>--/--/--</span>
            </a>
          </li>
        </ul>
      <li class="nav-heading">Pages</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-question-circle"></i>
          <span>Announcement</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="form.php?=<?php $token = rand(1,100000);
                $h = md5($token); echo $h; ?>">
          <i class="bi bi-person"></i>
          <span>Company Overview</span>
        </a>
      </li>
      <!-- End Profile Page Nav -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="post-job.php?=t">
          <i class="bi bi-question-circle"></i>
          <span>Post Job</span>
        </a>
      </li>
      
     <!-- End F.A.Q Page Nav -->

      <!-- End Blank Page Nav -->

     

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Post</li>
          <li class="breadcrumb-item active">Job</li>
        </ol>
      </nav>
    </div>
    <br>
    <section class="pagetitle">
       <fieldset class="clearfix" id="id_changepassword">
            <aria-label class="display-5" style="font-size: 2rem";>Post Job</aria-label>
            <hr class="my-4">
        </fieldset>
    

        
            <div class="card-body">

              <!-- Vertical Form -->
              <form class="row g-3">
                
               
                <div class="col-12">
                  <label for="inputEmail4" class="form-label" required>Job Title</label>
                  <input type="text" class="form-control" id="inputEmail4">
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label" required>Country</label>
                  <input type="text" class="form-control" id="inputPassword4">
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Job Type</label>
                  <select name = "jobtype" required class="selectpicker show-tick form-control" data-live-search="false" data-selected-text-format="count > 3" data-done-button="true" data-done-button-text="OK" data-none-selected-text="All">
                  <option value="" selected>Select</option>
                  <option value="Full-time" data-content="<span class='label label-warning'>Full-time</span>">Full-time</option>
                              <option value="Part-time" data-content="<span class='label label-danger'>Part-time</span>">Part-time</option>
                              <option value="Freelance" data-content="<span class='label label-success'>Freelance</span>">Freelance</option>
                  </select>
                </div>
                <div class="col-12">
                <label>Experience:</label>
                            <select name="experience" required class="selectpicker show-tick form-control" data-live-search="false" data-selected-text-format="count > 3" data-done-button="true" data-done-button-text="OK" data-none-selected-text="All">
                              
                              <option value="Expert">Expert</option>
                              <option value="2 Years">2 Years</option>
                              <option value="3 Years">3 Years</option>
                              <option value="4 Years">4 Years</option>
                              <option value="5 Years">5 Years</option>
                            </select>
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label" required>Closing Date</label>
                  <input type="Date" class="form-control" id="inputPassword4">
                </div>
                <div class="col-12">
                <div class="clear"></div>
                <label>Job Description</label>
                            <textarea class="form-control bootstrap3-wysihtml5" name="description" required placeholder="Enter description ..." style="height: 100px;"></textarea>
                </div>
                <div class="col-12">
                  <div class="form-group bootstrap3-wysihtml5-wrapper">
                            <label>Job Responsibilies</label>
                            <textarea name="responsiblities" required class="form-control bootstrap3-wysihtml5" placeholder="Enter responsiblities..." style="height: 100px;"></textarea>
                          </div>
                </div>
                <div class="col-12">
                <div class="form-group bootstrap3-wysihtml5-wrapper">
                            <label>Requirements</label>
                            <textarea name="requirements" required class="form-control bootstrap3-wysihtml5" placeholder="Enter requirements..." style="height: 100px;"></textarea>
                          </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Post</button>
                  <button type="reset" class="btn btn-danger">Cancel</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          
              <br>
    
    </section>           
  </main>
 
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>BCPInternship</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      
      
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
