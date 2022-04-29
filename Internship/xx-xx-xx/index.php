
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bestlink College of the Philippines: Log in to the Internship</title>
  
  <meta content="Internship Management System / Intern Portal" name="description">
  <meta content="job, work, resume, applicants, application, employee, employer, hire, hiring, human resource management, hr, online job management, company, worker, career, recruiting, recruitment" name="keywords">


  <link href="https://bcp.edu.ph/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  
  <link href="assets/css/style.css" rel="stylesheet">

  
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
                  <img src="assets/img/ojt.png" alt="">
                  <span class="d-none d-lg-block">Internship</span>
                </a>
              </div>
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">

              <div class="card-body p-md-5 mx-md-4">


                <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Internship</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                </div>

                <form class="row g-3 needs-validation" action="include/login.php" method="POST">
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
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

                    
                  </form>
                      
                  </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2" style="font-size:13px;">
              <div class="text-black px-3 py-4 p-md-5 mx-md-4">
                <p><b>INSTRUCTIONS</b></p><p><i>Changing or resetting of password.</i></p><p></p><ol><li>Reset password is available by clicking "<a href="forgot-password(1).php?=<?php $token = rand(1,100000);
                $h = md5($token); echo $h; ?>" target="_blank" rel="noreferrer noopener">Forget password</a>."</li><li class="s">Download the instructional material&nbsp;<a href="" target="_blank" rel="noreferrer noopener">here</a>&nbsp;for more information.</li></ol>
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


  <!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
