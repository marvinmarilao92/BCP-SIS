<?php
require_once "config.php";
  session_start();
$error = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // username and password sent from form 
  $myusername = mysqli_real_escape_string($link,$_POST['username']);
  $mypassword = mysqli_real_escape_string($link,$_POST['password']); 
  $sql = "SELECT * FROM users WHERE id_number = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count == 1) {
      //Check department and role
      $sql1 = "SELECT * FROM user_information where id_number = '$myusername' ";
      if($result1 = mysqli_query($link, $sql1)){
        if(mysqli_num_rows($result1) > 0){
          while($row1 = mysqli_fetch_array($result1)){
            switch($row1["department"]){
              case "Help Desk System":
                //statement
                break;
              case "OJT System":
                //statement
                break;
              case "LMS Edmodo":
                //statement
                break;
              case "Clearance System":
                //statement
                switch($row1["role"]){
                  case "Clearance Administrator":
                    //statement
                    $_SESSION['session_username'] = $myusername;
                    header("location: Clearance/clearance-administrator/index.php");
                    break;
                  case "Laboratory Coordinator":
                    //statement
                    $_SESSION['session_username'] = $myusername;
                    header("location: Clearance/laboratory-coordinator/index.php");
                    break;
                  case "Book Coordinator":
                    //statement
                    $_SESSION['session_username'] = $myusername;
                    header("location: Clearance/book-coordinator/index.php");
                    break;
                  case "Library Coordinator":
                    //statement
                    $_SESSION['session_username'] = $myusername;
                    header("location: Clearance/library-coordinator/index.php");
                    break;
                  case "Cashier Coordinator":
                    //statement
                    $_SESSION['session_username'] = $myusername;
                    header("location: Clearance/cashier-coordinator/index.php");
                    break;
                  case "Registrar Coordinator":
                    //statement
                    $_SESSION['session_username'] = $myusername;
                    header("location: Clearance/registrar-coordinator/index.php");
                    break;
                  case "Guidance Coordinator":
                    //statement
                    $_SESSION['session_username'] = $myusername;
                    header("location: Clearance/guidance-coordinator/index.php");
                    break;
                  case "Department Head":
                    //statement
                    $_SESSION['session_username'] = $myusername;
                    header("location: Clearance/department-head/index.php");
                    break;
                }
                break;
              case "Guidance and Counselling":
                //statement
                break;
              case "DATMS":
                //statement
                switch($row1["role"]){
                  case "DATMS Administrator":
                    //statement
                    $_SESSION['session_username'] = $myusername;
                    header("location: DocumentApproval/DATMS-administrator/index.php");
                    break;
                }
                break;
              case "Student Services":
                //statement
                break;
              case "Health Check Monitoring":
                //statement
                break;
              case "LMS Moodle":
                //statement
                break;
              case "Medical System":
                //statement
                break;
              case "Scholarship System":
                //statement
                break;
              case "User Management":
                //statement
                switch($row1["role"]){
                  case "User Management Administrator":
                    //statement
                    $_SESSION['session_username'] = $myusername;
                    header("location: UserManagement/index.php");
                    break;
                }
                break;
            }
          }
          // Free result set
          mysqli_free_result($result1);
        }
        else{
          // The user was not in the list of departments above, so it means the the user is a student
          // Validate if the user was actually a student
          $sql2 = "SELECT * FROM student_information where id_number = '$myusername'";
          if($result2 = mysqli_query($link, $sql2)){
            if(mysqli_num_rows($result2) > 0){
              while($row2 = mysqli_fetch_array($result2)){
                //Add data to session
                $_SESSION['session_username'] = $myusername;
                $_SESSION['session_department'] = "Student";
                header("location: Student/index.php");
              }
              // Free result set
              mysqli_free_result($result2);
            }
          }
        }
      }
    }else {
      $error = "Your Username or Password is invalid";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login - Student Information System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo300.png" alt="">
                  <span class="d-none d-lg-block">Student Information System</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body mb-3">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <?php 
                      if(!$error==""){
                        echo "<p class='text-danger'>" . $error ."</p>";
                      }
                    ?>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <!-- <div class="col-12">
                      <p class="small mb-0">Forgot password? <a href="pages-register.html">Reset password here</a></p>
                    </div> -->
                  </form>

                </div>
              </div>

              <!-- <div class="credits"> -->
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
              <!-- </div> -->

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

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