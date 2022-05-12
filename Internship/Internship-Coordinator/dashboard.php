<!DOCTYPE html>

<?php require 'session.php'; ?>
<html lang="en" >

<head>
  
  <title>Bestlink College of the Philippines  </title>
  <?php require 'header.php'; ?>

</head>

<body >

  <!-- ======= Header ======= -->
  <?php require 'nav.php'; ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar" >

    <?php require 'sidebar.php'; ?>


    <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="bi bi-exclamation-circle-fill" style="width:10px;"></i>Fair Warning</h5>
              <div class="no-overflow"><p><b>PROSECUTION</b>: Under Philippine law (Republic Act No. 8293), copyright infringement is punishable by the following: Imprisonment of between 1 to 3 years and a fine of between 50,000 to 150,000 pesos for the first offense. Imprisonment of 3 years and 1 day to six years plus a fine of between 150,000 to 500,000 pesos for the second offense.</p><p><b>COURSE OF ACTION</b>: Whoever has maliciously uploaded these concerned materials are hereby given an ultimatum to take it down within 24-hours. Beyond the 24-hour grace period, our Legal Department shall initiate the proceedings in coordination with the National Bureau of Investigation for IP Address tracking, account owner identification, and filing of cases for prosecution.</p></div>
            <div class="footer"></div>
            </div>
          </div>
  </aside>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="login/..">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <h5 class="card-title">Recently Accessed Task</h5>
    <hr>
    <section class="section">
      <div class="row justify-content-center">
        <div class="col-lg-3" >

          <div class="card">
            <img src="assets/img/bcplogo.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Task Title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
          
        </div>
        <div class="col-lg-3">

          <div class="card">
            <img src="assets/img/bcplogo.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Task Title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        
        </div> 
        <h5 class="card-title">Task Overview</h5>
        <hr>


      </div>
    </section>

  </main>

  <!-- ======= Footer ======= -->
  <?php require 'footer.php'; ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php require 'js.php'; ?>

</body>
  

</html>