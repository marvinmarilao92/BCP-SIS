<!DOCTYPE html>
<html lang="en">
<?php 
require 'control/check-session-login.php';
if ($user_online == "true") {
  if ($rolee == "Internship Coordinator" || $rolee == "SuperAdmin") {
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

    <div class="pagetitle">
      <h1>Evaluation</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?php echo 'index.php?'.$url;
          ?>>Home</a></li>
          <li class="breadcrumb-item">Form</li>
          <li class="breadcrumb-item active">Grade</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <br>
              

              <!-- Bordered Tabs Justified -->
               
     
                      <section class="section">
                        <div class="row">
                          <div class="col-lg-12">

                            <div class="card">
                              <div class="card-body">
                                <br>

                               

                                <!-- Table with stripped rows -->
                                <div class="table-responsive-lg">
                                <table class="table datatable" style=" font-size: 0.7em;" >
                                  <thead>
                                    <tr>
                                      <th scope="col">Student No</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Trainor Name</th>
                                      <th scope="col">Type</th>
                                      <th scope="col">Description</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    
                                  </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
                              </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      </section><!-- End Bordered Tabs Justified -->

            </div>
          </div>
        </div>
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
  
  <?php require 'drawer/copy.php' ?>
</body>

</html> 





