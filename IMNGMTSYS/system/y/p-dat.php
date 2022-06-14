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
      <h1>Positioning</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?php echo 'index.php?'.$url;
          ?>>Home</a></li>
          <li class="breadcrumb-item">Designated</li>
          <li class="breadcrumb-item active">Area</li>
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
              <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true" style="font-size: 1.3rem;
                                          font-family: Times New Roman;">Student</button>
                </li>
                
                
              </ul>
              <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="card">
            <div class="card-body">
             
              
              <br>
              <div class="table-responsive-lg">
              <table class="table datatable" style="font-size: 0.7em;
                                                          ">
                <thead>
                  <tr>
                   
                    <th scope="col">Name</th>
                    <th scope="col">Trainor</th>
                    <th scope="col">Company</th>
                    <th scope="col">Department</th>
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
                
               
              </div><!-- End Bordered Tabs Justified -->

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





