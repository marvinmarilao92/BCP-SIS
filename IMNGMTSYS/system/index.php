
<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    Bestlink College of the Philippines: Internship(BETA)
  </title>

      <?php include 'drawer/header.php'?>
      <script type ="text/javascript">

        function antiBack(){
          window.history.forward()
        };
        setTimeout("antiBack()",0);
        window.onunload = function(){null;}
      </script>

</head>


<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <!--<div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/BCPlogo.png" alt="" >
                  <span class="d-none d-lg-block">Internship (BETA)</span>
                </a>
              </div>End logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>
                  <?php 
                    if (isset($_GET['error'])) { 

                  ?>
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?php 

                  echo $_GET['error'];

                   ?>
                    </div>
                 <?php 
                 } 
                 ?>

                 <?php
                 if(isset($_GET['success'])){
                  ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?php
                    echo $_GET['success'];
                  ?>
                </div>
                  <?php
                 }
                 ?>

                  <form class="row g-3 needs-validation" action="auth/check.php" method="POST" >

                    <div class="col-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="uname" id="username"   placeholder="first name" autofocus>
                        <label for="floatingName">Username</label>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="password"  placeholder="first name" autofocus>
                        <label for="floatingName">Password</label>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember username</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="../REGISTER-SUPPORT">Create an account</a></p>
                      <a href="#">Forgotten your username or password?</a>
                    </div>
                  </form>

                </div>
              </div>


            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php require 'drawer/jss.php' ?>

</body>

</html>