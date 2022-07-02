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
  <title>BCP | Certificate of Registration Form</title>
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
              <br>
              <div class="row justify-content-center" >
              <img src="assets/img/cerlogo.png" style="width: 20%;
                                                          height: auto;">
         
             </div>
             <br>
   
                <label class="row justify-content-center" style="font-size: 1.8rem;
                font-family: monospace;" >
                 Certificate of Completion
                </label>

                <br>
                <br>
                
                <form class="row g-3 needs-validation" action="includes/applyy.php" method="POST" enctype="multipart/form-data">

                        <div class="col-lg-4">
                            <div class="form-floating">
                              <select type="text" class="form-select" name="co_id" id="co_id" placeholder="Trainee_ID" required autofocus readonly>
                              </select>
                              <label for="floatingName">Trainee ID</label>
                            </div>
                            
                          </div>

                          <div class="col-lg-8">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="co_id" id="co_id" placeholder="Trainee_ID" required autofocus readonly>
                              
                              <label for="floatingName">Name of Trainee</label>
                            </div>
                            
                          </div>
                          <div class="col-lg-12 ">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="co_id" id="co_id" placeholder="Trainee_ID" required autofocus readonly>
                              
                              <label for="floatingName">Department</label>
                            </div>
                           <br>
                          </div>
                          
                          <div class="row justify-content-center">
                            <div class="container" style="text-align: center">
                              <br>
                          <span><i class="fa fa-cloud-upload text-dark fa-5x" aria-hidden="true"></i></span>

                                              <p class="text-dark">Choose your file Upload</p></label>
                                              <input type="file" id="file" class="text-dark" name="uploaded_file"accept="application/pdf, application/vnd.ms-excel" required>
                                            <p>
                                              <br>
                                                  <b><label style="font-size: 1rem;
                                                  font-style: Times New Roman;">NOTE : Your filetype must be pdf and contain Certificate of Completion</label></b>
                                              </p>

                                                <br>
                                               
                                                  </div>
                                                </div>
                           
                                    <button type ="submit"   name ="submit" class="btn btn-primary btn-lg rounded-pill" >Submit</button>
                                    

                                  </form>

                                
              <br>


              
              
              
     
            </div>
          </div>
          </div>
          </div>


          



        </div>

        
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