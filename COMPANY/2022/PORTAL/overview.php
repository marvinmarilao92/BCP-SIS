<!DOCTYPE html>
<html lang="en">
<?php require 'control/check-session-login.php';
if ($user_online == "true") {
if ($role == "coordinator") {
}else{
header("location:../");   
}
}else{
header("location:../"); 
}   
?>  
<head>
  <title> BCP - Request </title>
  <?php require 'drawer/header.php'?>
</head>

<body>
    <?php require 'drawer/modal.php' ?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <?php require'drawer/navbar.php' ?><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <?php require 'drawer/sidebar.php'?>
  </aside><!-- End Sidebar-->

 <main id="main" class="main">

    <div class="pagetitle" >
      <aria-label class="display-5" style="font-size: 2rem;
      font-family: monospace;"><b>Bestlink College of the Philippines</b></aria-label>
    </div>
    <hr class="my-4"> <!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">







            <!-- COUROSEL -->

              




            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-12">


              <!-- BSIT_SECTION -->
              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h5>Filter</h5>
                    </li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#BSinfo">Today</a></li>
                    <li><a class="dropdown-item" href="saq.php">Skills and Qualifications</a></li>
                    
                  </ul>
                </div>

                <div class="card-body" style="text-align: right;">
                  <label class="card-title" style="font-size:1.8em;
                  font-family: Times-New Roman;">BS<span> Information Technology </span></label>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"><img src="assets/img/BCPlogo.png" alt="">&nbsp;</i>
                    </div>
                    <div class="card-body">
                      <?php 
                       require 'dbCon/config.php';
                        try{  
                          $total = "SELECT *FROM ims_apply_info
                                      WHERE s_course = 'BSIT'";
                           $get_row = mysqli_query($conn, $total);


                         if($get_total = mysqli_num_rows($get_row))
                           {
                           echo '<h6>'.$get_total.'</h6>';
                           }
                         else
                         {
                            ?>
                           <h6 style="font-size: 1em;
                                      color: red;">No Available</h6>
                           <?php


                        }
                      }catch(PDOException $e)
                      {

                     }

                      ?>
                      
                    </div>
                  </div>
                </div>
              </div>

            </div><!-- End BSIT_SECTION -->

            <!-- BSOA_SECTION -->


            <div class="col-xxl-4 col-md-12">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h5>Filter</h5>
                    </li>

                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#OAinfo">Today</a></li>
                   
                    
                  </ul>
                </div>

                <div class="card-body" style="text-align: right;">
                  <label class="card-title" style="font-size:1.8em;
                  font-family: Times-New Roman;">BS<span> Office Administration</span></label>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <img src="assets/img/BCPlogo.png" alt="">&nbsp;
                    </div>
                    <div class="card-body">
                     <?php 
                       require 'dbCon/config.php';
                        try{  
                          $total = "SELECT *FROM ims_apply_info
                                      WHERE s_course = 'BSOA'";
                           $get_row = mysqli_query($conn, $total);


                         if($get_total = mysqli_num_rows($get_row))
                           {
                           echo '<h6>'.$get_total.'</h6>';
                           }
                         else
                         {
                            ?>
                           <h6 style="font-size: 1em;
                                      color: red;">No Available</h6>
                           <?php


                        }
                      }catch(PDOException $e)
                      {

                     }

                      ?>
                      
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End BSOA_SECTION-->

            <!-- BSCRIM_DEPARTMENT -->
            <div class="col-xxl-4 col-md-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h5>Filter</h5>
                    </li>

                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#BSCrim">Preview</a></li>
                    <li><a class="dropdown-item" href="saq.php">Skills and Qualifications</a></li>
                    
                  </ul>
                </div>

                <div class="card-body" style="text-align: right;">
                  <label class="card-title" style="font-size:1.8em;
                  font-family: Times-New Roman;">BS<span> Criminology</span></label>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <img src="assets/img/BCPlogo.png" alt="">&nbsp;
                    </div>
                    <div class="card-body">


                      <?php 
                       require 'dbCon/config.php';
                        try{  
                          $total = "SELECT *FROM ims_apply_info
                                      WHERE s_course = 'BSCrim'";
                           $get_row = mysqli_query($conn, $total);


                         if($get_total = mysqli_num_rows($get_row))
                           {
                           echo '<h6>'.$get_total.'</h6>';
                           }
                         else
                         {
                            ?>
                           <h6 style="font-size: 1em;
                                      color: red;">No Records Found</h6>
                           <?php


                        }
                      }catch(PDOException $e)
                      {

                     }

                      ?>
                      
                    </div>
                  </div>
                </div>
              </div>

            </div><!-- End BSCRIM_SECTION -->

            <!-- BSHM SECTION -->

            <div class="col-xxl-4 col-md-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h5>Filter</h5>
                    </li> 

                     <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#BSHMinfo">Preview</a></li>
                    <li><a class="dropdown-item" href="saq.php">Skills and Qualifications</a></li>
                    
                  </ul>
                </div>

                <div class="card-body" style="text-align: right;">
                  <label class="card-title" style="font-size:1.8em;
                  font-family: Times-New Roman;">BS<span> Hospitality Management</span></label>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"><img src="assets/img/BCPlogo.png" alt="">&nbsp;</i>
                    </div>
                    <div class="card-body">
                      <?php 
                       require 'dbCon/config.php';
                        try{  
                          $total = "SELECT *FROM ims_apply_info
                                      WHERE s_course = 'BSHM'";
                           $get_row = mysqli_query($conn, $total);


                         if($get_total = mysqli_num_rows($get_row))
                           {
                           echo '<h6>'.$get_total.'</h6>';
                           }
                         else
                         {
                            ?>
                           <h6 style="font-size: 1em;
                                      color: red;">No Available</h6>
                           <?php


                        }
                      }catch(PDOException $e)
                      {

                     }

                      ?>
                      
                    </div>
                  </div>
                </div>
              </div>

            </div>

           <!-- End BSHM_SECTION -->

            <!-- BSBA_SECTION  -->

            <div class="col-xxl-4 col-md-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h5>Filter</h5>
                    </li>

                     <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#BAinfo">Preview</a></li>
                    <li><a class="dropdown-item" href="saq.php">Skills and Qualifications</a></li>
                    
                  </ul>
                </div>

                <div class="card-body" style="text-align: right;">
                  <label class="card-title" style="font-size:1.8em;
                  font-family: Times-New Roman;">BS<span> Business Administration</span></label>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"><img src="assets/img/BCPlogo.png" alt="">&nbsp;</i>
                    </div>
                    <div class="card-body">
                      <?php 
                       require 'dbCon/config.php';
                        try{  
                          $total = "SELECT *FROM ims_apply_info
                                      WHERE s_course = 'BSBA'";
                           $get_row = mysqli_query($conn, $total);


                         if($get_total = mysqli_num_rows($get_row))
                           {
                           echo '<h6>'.$get_total.'</h6>';
                           }
                         else
                         {
                            ?>
                           <h6 style="font-size: 1em;
                                      color: red;">No Available</h6>
                           <?php


                        }
                      }catch(PDOException $e)
                      {

                     }

                      ?>
                    </div>
                  </div>
                </div>
              </div>

            </div>


            <!-- End Recent Sales -->

            <!-- Top Selling -->
            <!-- End Top Selling -->

          </div>
        </div>
        <!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Recent Activity <span>| Today</span></h5>

              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">32 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    Voluptatem blanditiis blanditiis eveniet
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 hrs</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    Voluptates corrupti molestias voluptatem
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                  <div class="activity-content">
                    Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activity-content">
                    Est sit eum reiciendis exercitationem
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">4 weeks</div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                  </div>
                </div><!-- End activity item-->

              </div>

            </div>
          </div><!-- End Recent Activity -->

          <!-- Budget Report -->
          <!-- End Budget Report -->

          <!-- Website Traffic -->
          

            <!-- End Website Traffic -->

          <!-- News & Updates Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              
             
              <!-- End sidebar recent posts-->

            </div>
          </div><!-- End News & Updates -->

        </div>
        <!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    
    <?php require 'drawer/footer.php'?> 
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php  require 'drawer/js.php' ?>

</body>

</html>