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
  <title>BCP | Search</title>
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

    <div class="page-title" >
      <br>
      <form class="row g-3 needs-validation" action="includes/applyy.php" method="POST" enctype="multipart/form-data">
                                            <!-- Table with stripped rows -->
                                            <div class="col-lg-5">
                                                <div class="form-floating">
                                                  <select type="text" class="form-select" name="s_course" aria-label="State" id="lvl" onchange="oncollapse()" required autofocus  style="background-color: rgba(255, 255, 255, .4);">
                                                  <option value="" style="color:black" select ed="selected" disabled>Select a Category</option>
                                                  <option>PROGRAMMING</option>
                                                  <option>HARDWARE</option>
                                                  <option>CISCO</option>
                                                  <option>VPN</option>
                                                  <option>HACKING</option>
                                                  </select>
                                                  <label for="floatingName">Category</label>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-5">
                                                <div class="form-floating">
                                                  <select type="text" class="form-select" name="s_course" aria-label="State" id="lvl" onchange="oncollapse()" required autofocus style="background-color: rgba(255, 255, 255, .4);">
                                                  <option value="" style="color:black" select ed="selected" disabled>Select a Skills</option>
                                                  <option>C++</option>
                                                  <option>Website Phishing Site</option>
                                                  <option>Gateway Internet</option>
                                                  </select>
                                                  <label for="floatingName">Skills</label>
                                                </div>
                                                  
                                                 
                                          </div>
                                          <div class="col-lg-2">
                                                <div class="form-floating">
                                                  <button type ="submit"   name ="submit" class="btn btn-primary btn-lg rounded-pill" ><i class="bi bi-search"></i>&nbsp; Search</button>
                                                </div>
                                                
                                          </div>

                                           </form> 
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
             
              <br>




                                

                                










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
    
    <?php require 'drawer/footer.php'?> 
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php  require 'drawer/js.php' ?>

</body>

</html>