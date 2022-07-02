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
  <title>BCP | Result </title>
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
              <h5 class="card-title">Screening Result</h5>

              <!-- Bordered Tabs Justified -->
              <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">Passed</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Failed</button>
                </li>
                
                <br>
              </ul>
              <br>
              <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="card">
            <div class="card-body">
              
            
              <br><br>
              <div class="table-responsive-lg">
              <table class="table datatable" style="font-size: 0.8rem;
                                                          ">
                <thead>
                  <tr>
                    
                    <th scope="col">Name</th>
                    <th scope="col">Trainor Name</th>
                    <th scope="col">Date Started</th>
                    <th scope="col">Link</th>
                    <th scope="col">Label</th>
                    <th scope="col">Status</th>
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
                <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="card">
            <div class="card-body">
              
            
              <br><br>
              <div class="table-responsive-lg">
              <table class="table datatable" style="font-size: 0.8rem;
                                                          ">
                <thead>
                  <tr>
                    
                    <th scope="col">Name</th>
                    <th scope="col">Trainor Name</th>
                    <th scope="col">Date Started</th>
                    <th scope="col">Link</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Status</th>
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
              </div><!-- passed/failed section-->

            </div><br>

            <div class="card">
            <div class="card-body">
              <h5 class="card-title">Re - Schedule</h5>

              <!-- Bordered Tabs Justified -->
              <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">Details</button>
                </li>
              
                <br>
              </ul>
              <br>
              <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                  <div class='alert alert-danger' role='alert' >
                                <center>
                                           No Data Found !
                                </center>
                          </div>
                </div>
            
                </div>
              </div><!-- End Bordered Tabs Justified -->

            </div>







          </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->
  <br>
  <br>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    
    <?php require 'drawer/footer.php'?> 
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php  require 'drawer/js.php' ?>

</body>

</html>