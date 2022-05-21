
<!DOCTYPE html>

<html lang="en">

<head>
<title>Bestlink College of the Philippines: Log in to the site</title>
        <?php require 'drawer/header.php' ?>
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
      <div class="col-xl-10">

        <div class="d-flex justify-content-center py-4">
                <a href="" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/BCPlogo.png" alt="" style="width: auto;
                  height: auto;
                  max-width: 100%;">
                  <span class="d-none d-lg-block"></span>
                </a>
              </div>

        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">

              <div class="card-body p-md-5 mx-md-4">


                <div class="pt-2 pb-3">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Internship</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                </div>
                <?php if (isset($_GET['error'])) { ?>
                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?php echo $_GET['error']; ?>
                </div>
                 <?php } ?>
                <form class="row g-3 needs-validation" action="" method="POST">
                     <div class="col-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="uname" id="username"  pattern="[a-zA-Z0-9]+" placeholder="first name" autofocus>
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
                      <button class="btn btn-primary w-100" type="submit" name="submit"><a href ="company/..">Login</a></button>
                    </div>

                    
                  </form>
                      
                  </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2" style="font-size:13px;">
              <div class="text-black px-3 py-4 p-md-5 mx-md-4">
                <p><b>INSTRUCTIONS</b></p><p><i>Changing or resetting of password.</i></p><p></p><ol><li>Reset password is available by clicking "<a href="forgot-password(1).php?=<?php $token = rand(1,100000);
                $h = md5($token); echo $h; ?>" target="_blank" rel="noreferrer noopener">Forgot password</a>."</li><li class="s">Download the instructional material&nbsp;<a href="" target="_blank" rel="noreferrer noopener">here</a>&nbsp;for more information.</li></ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    </section>
  
  </div>
  </main>
  <?php require 'drawer/footer.php' ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
   <?php require 'drawer/js.php'; ?>

</body>

</html>