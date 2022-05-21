<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'drawer/header.php' ?>
</head>

<body>


              <div class="modal fade" id="largeModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Quick Access Panel</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="text-align: center;">
                    <a href="../CASHIER/login.php"> <button type="button" class="btn btn-secondary">Cashier Panel</button></a>
                    <a href="../REGISTRAR/login.php?"> <button type="button" class="btn btn-primary">Registrar Panel</button></button></a>
                    </div>
                   
                  </div>
                </div>
              </div>
  <!-- ======= Header ======= -->
 <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <!--<aside id="sidebar" class="sidebar">
  
  <?//php include 'drawer/sidebar.php'?>
    

  </aside> End Sidebar-->
  <br>
  <br>
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xxl-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <!-- End Logo -->

              <div class="card mb-4">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Magandang Buhay !</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>
                  <?php if (isset($_GET['error'])) { ?>
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?php echo $_GET['error']; ?>
                </div>
                 <?php 
                 } 
                 ?>
                  <form class="row g-3 needs-validation" action="constrait/get.php" method="POST">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Fullname</label>
                      <input type="text" name="fname" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>


                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                      </div>
                    </div>

                    

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">ReType Password</label>
                      <input type="password" name="retype" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Role</label>
                      <select id="inputState" class="form-select"  name="role">
                      <option disabled value="">Category</option>
                      <option>Cashier</option>
                      <option>Registrar</option>
                      <option>Student</option>
                      <option>Coordinator</option>
                    </div>
                    
                    
                    <div class="col-12">
                      <div class="form-check">
                      
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                      
                        <div class="invalid-feedback">You must agree before submitting.</div>

                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="submit">Create Account</button>
                    </div>
                    
                    <div class="col-12">
                      <h4><p class="small mb-0">Already have an account? <a href=""data-bs-toggle="modal" data-bs-target="#largeModal">Log in</a></p></h4>
                    </div>
                    <br>
                  </form>

                </div>
              </div>

             

            </div>
          </div>
        </div>

      </section>

    </div>
  </main> <!-- End #main -->

  <!-- ======= Footer ======= -->
  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php include 'drawer/js.php' ?>

</body>

</html>