<!DOCTYPE html>
<html lang="en">
<title>SuperUser | Home</title>
<head>
<?php include 'drawer/header.php' ?>
</head>

<body>

  <main style="padding: 20px;">
    
    <div class="pagetitle">
      <h1>Internship Quick Access Panel</h1>
      <nav>
        <ol class="breadcrumb">
          <br>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="pagetitle">
      <h1>School Information System</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index">Home</a></li>
          <li class="breadcrumb-item active">School Information System</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row align-items-top">
        <!-- Insert your Module here -->
        <div class="col-lg-2">
          <div class="card">
            <a href="CASHIER/login.php"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title">Cashier Panel</h5>
              <p class="card-text">Subsystem Description insert here...</p>
            </div>
          </div>
        </div>
        <!-- End Insert your Module here -->
        <!-- Insert your Module here -->
        <div class="col-lg-2">
          <div class="card">
            <a href="REGISTRAR/login.php"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title">Registrar Panel</h5>
              <p class="card-text">Subsystem Description insert here...</p>
            </div>
          </div>
        </div>
        <!-- End Insert your Module here -->
        <!-- Insert your Module here -->
        <div class="col-lg-2">
          <div class="card">
            <a href="PATH/STUDENT-INTERN-PANEL/login.php"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title">Intern Panel</h5>
              <p class="card-text">Subsystem Description insert here...</p>
            </div>
          </div>
        </div>
        <!-- End Insert your Module here -->
        <!-- Insert your Module here -->
        <div class="col-lg-2">
          <div class="card">
            <a href="PATH/DEPARTMENT-COORDINATOR-PANEL/login.php"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title">Coordinator Panel</h5>
              <p class="card-text">Subsystem Description insert here...</p>
            </div>
          </div>
        </div>
        <!-- End Insert your Module here -->
        <!-- Insert your Module here -->
        <div class="col-lg-2">
          <div class="card">
            <a href="DEPARTMENT-ADMIN-PANEL/login.php"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title">Admin Panel</h5>
              <p class="card-text">Subsystem Description insert here...</p>
            </div>
          </div>
        </div>
        <!-- End Insert your Module here -->
        <!-- Insert your Module here -->
        <div class="col-lg-2">
          <div class="card">
            <a href="SECTION/LOGIN/LOGIN/login.php"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title">Company Panel</h5>
              <p class="card-text">Subsystem Description insert here...</p>
            </div>
          </div>
        </div>
        <!-- End Insert your Module here -->

          <!-- End Insert your Module here -->
      </div>
    </section>

  </main><!-- End #main -->
  <hr>
    <!-- ======= Footer ======= -->
    <footer class="footer">
      <div class="copyright" style="margin-bottom: 30px;">
        <center>
          &copy;Copyright <a href="https://bcp.edu.ph/home" target="_blank " data-bs-toggle="tooltip" data-bs-placement="top" 
          title="Access BCP Website">Bestlink College of the Philippines</a> All Rights Reserved
        </center>                 
      </div>
    </footer>
    <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
<!-- Charts -->
</body>

  <!-- prevent you for turning back -->
  <script>
    (function (global) {

      if(typeof (global) === "undefined") {
          throw new Error("window is undefined");
      }

      var _hash = "!";
      var noBackPlease = function () {
          global.location.href += "#";

          // Making sure we have the fruit available for juice (^__^)
          global.setTimeout(function () {
              global.location.href += "!";
          }, 50);
      };

      global.onhashchange = function () {
          if (global.location.hash !== _hash) {
              global.location.hash = _hash;
          }
      };

      global.onload = function () {
          noBackPlease();

          // Disables backspace on page except on input fields and textarea..
          document.body.onkeydown = function (e) {
              var elm = e.target.nodeName.toLowerCase();
              if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                  e.preventDefault();
              }
              // Stopping the event bubbling up the DOM tree...
              e.stopPropagation();
          };
      }
    })(window);
  </script>
</html>