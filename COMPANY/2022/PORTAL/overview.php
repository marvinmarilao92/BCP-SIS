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
        <div class="col-lg-12">
          <div class="row">




            <!-- COUROSEL -->

              




            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h5>Filter</h5>
                    </li>

                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#BSinfo">Today</a></li>
                    
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
                      <h6 style="font-size: 1.5em;">No Available</h6>
                      
                    </div>
                  </div>
                </div>
              </div>

            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h5>Filter</h5>
                    </li>

                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#BAinfo">Today</a></li>
                   
                    
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
                      <h6 style="font-size: 1.5em;">No Available</h6>
                      
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-md-6">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h5>Filter</h5>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    
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
                      <h6 style="font-size: 1.5em;">1 Available</h6>
                      
                    </div>
                  </div>
                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->

            <div class="col-xxl-4 col-md-6">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h5>Filter</h5>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    
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
                      <h6 style="font-size: 1.5em;">No Available</h6>
                      
                    </div>
                  </div>
                </div>
              </div>

            </div>

           <!-- End Reports -->

            <!-- Recent Sales -->
            <!-- End Recent Sales -->

            <!-- Top Selling -->
            <!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
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