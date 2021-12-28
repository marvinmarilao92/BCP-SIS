<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include ('core/css-links.php');//css connection?>

</head>
<body>

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'track';  include ('core/side-nav.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      
      <h1>Track Documents</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Module</li>
          <li class="breadcrumb-item active">Track Document</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
          <div class="row">

            <!-- Reports -->
          
              <div class="card">
                <!-- Activity Body -->
                <div class="card-body">
                  <!-- Search Bar -->
                  <center>
                    <div class="col-md-11">
                      <br>
                          <div class="form-floating">
                            <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
                            <label for="floatingName">Enter Code</label>
                          </div>
                      <br>
                    </div>  
                  </center>
                  <!-- End of search Bar -->
                    <!-- Tracking Activity module -->
                    <div class="activity" style="margin-left:100px; ">

                        <div class="activity-item d-flex">
                          <div class="activite-label card-title">32 min</div>
                          <i class='bi bi-circle-fill activity-badge text-info align-self-start' style="padding-top: 25px;"></i>
                          <div class="activity-content card-title" style="margin-left:20px ;">
                            Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                          </div>
                        </div><!-- End activity item-->

                        <div class="activity-item d-flex">
                          <div class="activite-label card-title">20 min</div>
                          <i class='bi bi-circle-fill activity-badge text-danger align-self-start' style="padding-top: 25px;"></i>
                          <div class="activity-content card-title" style="margin-left:20px;">
                            Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                          </div>
                        </div><!-- End activity item-->

                        <div class="activity-item d-flex">
                          <div class="activite-label card-title">10 min</div>
                          <i class='bi bi-circle-fill activity-badge text-primary align-self-start' style="padding-top: 25px;"></i>
                          <div class="activity-content card-title" style="margin-left:20px ;">
                            Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                          </div>
                        </div><!-- End activity item-->

                        <div class="activity-item d-flex">
                          <div class="activite-label card-title">15 min</div>
                          <i class='bi bi-circle-fill activity-badge text-warning align-self-start' style="padding-top: 25px;"></i>
                          <div class="activity-content card-title" style="margin-left:20px;">
                            Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                          </div>
                        </div><!-- End activity item-->

                        <div class="activity-item d-flex">
                          <div class="activite-label card-title">20 min</div>
                          <i class='bi bi-circle-fill activity-badge text-success align-self-start' style="padding-top: 25px;"></i>
                          <div class="activity-content card-title" style="margin-left:20px ;">
                            Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                          </div>
                        </div><!-- End activity item-->

                        <div class="activity-item d-flex">
                          <div class="activite-label card-title">90 min</div>
                          <i class='bi bi-circle-fill activity-badge text-muted align-self-start' style="padding-top: 25px;"></i>
                          <div class="activity-content card-title" style="margin-left:20px;">
                            Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                          </div>
                        </div><!-- End activity item-->

                    </div>
                    <!-- End Tracking Activity module -->
                </div>
              <!-- End Activity Body -->
              </div>
            </div>

          </div>

      
    </section>
  </main><!-- End #main -->

 
  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>

</body>

</html>