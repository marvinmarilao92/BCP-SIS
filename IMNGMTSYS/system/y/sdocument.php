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

    <div class="pagetitle" >
      <aria-label class="display-5" style="font-size: 2rem";><b>Bestlink College of the Philippines</b></aria-label>
    </div><!-- End Page Title -->
    <hr class="my-4">
    <!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <br>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"style="font-size: 1.3rem;
                                          font-family: Times New Roman;"><i class="bi bi-file-earmark-pdf"></i>&nbsp;Student Document</h5>
              
              
              <div class="table-responsive-lg">
              <table class="table datatable" style="font-size: 0.7em;
                                                          ">
                <thead>
                  <tr>
                    <th scope="col">Document ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Remarks</th>
                    <th scope="col">State</th>
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





