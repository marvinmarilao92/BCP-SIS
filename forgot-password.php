
<html lang="en">
<?php
  
?>
<head>
  <?php include ('core/css-links.php');//css connection?>
</head>
<style>
  .gradient-custom-2 {
    /* fallback for old browsers */
    background: #fccb90;

    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right, lightblue, lightblue, #dd3675, #b44593);

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: whitesmoke;
  }

  @media (min-width: 768px) {
    .gradient-form {
      height: 100vh !important;
    }
  }
  @media (min-width: 769px) {
    .gradient-custom-2 {
      border-top-right-radius: .3rem;
      border-bottom-right-radius: .3rem;
    }
  }

  .s{
      display: list-item;
      text-align: -webkit-match-parent;
  }
</style>
<body>
  
<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                
              <div class="d-flex justify-content-center py-4">
                <a href="#" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/BCPlogo.png" alt="">
                  <span class="d-none d-lg-block">Change Password</span>
                </a>
              </div><!-- End Logo -->
                
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                  <p class="small"><b>Note:</b> Enter the Email Address associated to your account, We will send you the link to reset your password.</p>                
                  </div>

                  <form class="row g-3 needs-validation" action="#" method="POST" autocomplete="off">

                    <div class="col-12">
                      
                      
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="username" class="form-control" id="yourUsername" required
                        placeholder = "Enter your Email Address">
                        <div class="invalid-feedback">Please enter your valid Email</div>
                      </div>
                    </div>
                    
                    <div class="col-12">
                      <button class="btn btn-success w-100" type="submit" name="btnforgot">Send reset email</button>
                    </div>

                    <div class="col-12">
                      <a href = "dynamic-login" style="float: right;">Return to Login</a>
                    </div>
                    
                
                  </form>

                </div>
              </div>


            </div>
          </div>
        </div>

      </section>

    </div>
  </main>


  <!-- End #main -->

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>

</body>

</html>
