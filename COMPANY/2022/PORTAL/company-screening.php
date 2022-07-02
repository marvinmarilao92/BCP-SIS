<!DOCTYPE html>
<html lang="en">
<?php require 'control/check-session-login.php';
if ($user_online == "true") {
if ($role == "Company Coordinator") {
}else{
header("location:../");   
}
}else{
header("location:../"); 
}   
?>
<head>
  <title>BCP | Screening plan </title>
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
      <aria-label class="display-5" style="font-size: 2rem";><b>Bestlink College of the Philippines</b></aria-label>
    </div><!-- End Page Title -->
    <hr class="my-4">
    <section class="section dashboard">
      <div class="row">


          

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

              <div class="card">
            <div class="card-body">
              <h5 class="card-title"style="font-size: 1.5rem;
                                          font-family: Times New Roman;">Screening Plan </h5>
              
              
              <div class="table-responsive-lg">
              <table class="table datatable" style="font-size: 0.7em;
                                                          ">
                <thead>
                  <tr>
                   
                    <th scope="col">Trainee</th>
                    <th scope="col">sLINK</th>
                    <th scope="col">sCODE</th>
                    <th scope="col">Date Started</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                  <!--<tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>-->
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
            </div>
          </div>
            <!-- End News & Updates -->

        </div><!-- End Right side columns -->
        </div>
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