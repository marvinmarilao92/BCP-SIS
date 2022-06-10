
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

      <section class="h-100 gradient-form">
    <div class="container py-4 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">

              <!--<div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/BCPlogo.png" alt="" >
                  <span class="d-none d-lg-block">Internship (BETA)</span>
                </a>
              </div>End logo -->

              <div class="col-xl-10">
        <div class="row justify-content-center" >
              <img src="../assets/img/BCPlogo.png" style="width: 15%;
                                                          height: auto; ">
             </div>
             <br>
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">

              <div class="card-body p-md-5 mx-md-4">


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

                  <form class="row g-3 needs-validation" action="constant/connect.php" method="POST" >

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
                <div class="col-lg-6 d-flex align-items-center gradient-custom-2" style="font-size:13px;">
              <div class="text-black px-3 py-4 p-md-5 mx-md-4">
                <p><b>INSTRUCTIONS</b></p><p><i>Changing or resetting of password.</i></p><p></p><ol><li>Reset password is available by clicking "<a href="https://bcpeducollege.elearningcommons.com/login/forgot_password.php" target="_blank" rel="noreferrer noopener">Forget password or username</a>."</li><li class="s">Download the instructional material&nbsp;<a href="https://dl.dropbox.com/s/iioe46csf4n7khn/stud_email.docx?dl=0" target="_blank" rel="noreferrer noopener">here</a>&nbsp;for more information.</li></ol>
              </div>
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