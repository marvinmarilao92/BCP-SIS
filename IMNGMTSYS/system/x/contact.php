<!DOCTYPE html>
<html lang="en">
<?php require 'control/check-session-login.php';
    if ($user_online == "true") {
if ($role == "Student") {
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

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <?php require 'drawer/sidebar.php'?>
  </aside><!-- End Sidebar-->

    <main id="main" class="main">

      <div class="pagetitle">
        <h1>Contact</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="x/..">Home</a></li>
            <li class="breadcrumb-item">Chat Support</li>
            <li class="breadcrumb-item active">Contact</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section contact">

        <div class="row gy-4">

          <div class="col-xl-6">

            <div class="row">
              <div class="col-lg-6">
                <div class="info-box card">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>Lot 762 cor. Topaz St. and Sapphire St., Millionaire’s Village, Novaliches Quezon City, Philippines</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="info-box card">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>417-4355<br> 463-8787, 799-6617</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="info-box card">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@example.com<br>contact@example.com</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="info-box card">
                  <i class="bi bi-clock"></i>
                  <h3>Open Hours</h3>
                  <p>Monday - Friday<br>9:00AM - 05:00PM</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-xl-6">
            <div class="card p-4">
              <form action="forms/contact.php" method="post" class="php-email-form">
                <div class="row gy-4">

                  <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                  </div>

                  <div class="col-md-6 ">
                    <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                  </div>

                  <div class="col-md-12">
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                  </div>

                  <div class="col-md-12">
                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                  </div>

                  <div class="col-md-12 text-center">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>

                    <button type="submit">Send Message</button>
                  </div>

                </div>
              </form>
            </div>

          </div>

        </div>

      </section>

    </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    
  <?php require'drawer/footer.php' ?>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php require'drawer/js.php'?>

</body>

</html>