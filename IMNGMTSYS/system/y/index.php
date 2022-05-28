<!DOCTYPE html>
<html lang="en">
<?php require 'control/check-session-login.php';
if ($user_online == "true") {
if ($rolee == "Coordinator") {
}else{
header("location:../");   
}
}else{
header("location:../"); 
}   
?>
<head>
  

  

  <?php require 'drawer/header.php' ?>

</head>

<body>
    <?php require 'drawer/modal.php' ?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">


    <?php require 'drawer/navbar.php' ?>
    <!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <?php require 'drawer/sidebar.php' ?>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle" >
      <aria-label class="display-5" style="font-size: 2rem";><b>Bestlink College of the Philippines</b></aria-label>
    </div><!-- End Page Title -->
    <hr class="my-4">
    <section class="section dashboard">
      <div class="row">
    
        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->


                         
                        
                      
            <?php
                     require '../dbCon/config.php';
                       try {
                                             $conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_user, $db_pass);
                                             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      
                                             $stmt = $conn->prepare("SELECT * FROM ims_department_post ORDER BY rand() limit 1");
                                             $stmt->execute();
                                             $result = $stmt->fetchAll();

                                             foreach($result as $row)
                                             {
                                            ?>
            
                         

                          <div class="alert alert-info" role="alert" style="text-align:left;">

                         <aria-label class="display-5" style="font-size: 2em;">Announcement ! </aria-label>
                         <br>
                         <br>
                          <div class = "container" style="text-align: left;">
                                <b> <?php  echo $row['p_role']?></b>
                                <br>
                                <br>
                        

                                <p><?php echo $row['post']; ?></p>
                                <br>
                                <br>
                                <p style="text-align: right;">Date Posted: <?php echo $row['pdate']?></p>
                                <br>


                            </div>
                        </div>
                        <?php
                                       }
                                         $stmt->execute();
            
                                       }catch(PDOException $e)
                                         {
        
                                         }
  
                      ?>
            <!-- End Sales Card -->

            <!-- Revenue Card -->

            <!-- End Revenue Card -->

            <!-- Customers Card -->

            <!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
            <h5 class="card-title">BCP <span>| Courses</span></h5>
              <div class="card">
             
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
              <?php require 'drawer/carousel.php' ?>
                
                </div>
              </div>
            </div><!-- End Reports -->

            <!-- Recent Sales -->
            <!-- End Recent Sales -->

            <!-- Top Selling -->
            <!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

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
              
              <?php require 'drawer/news.php' ?>
              <!-- End sidebar recent posts-->

            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
      
    <?php require 'drawer/footer.php' ?>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php require'drawer/js.php' ?>
  
</body>

</html> 





