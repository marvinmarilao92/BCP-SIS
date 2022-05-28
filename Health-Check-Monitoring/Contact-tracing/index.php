<?php
include('security/newsource.php')
?>
<!DOCTYPE html>
<html lang="en">
<title>Contact Tracing</title>

<head>
  <?php include('includes/head_ext.php'); ?>
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center" style="background-color:#7CA9F4;">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php?id=<?php echo $_SESSION["login_key"]; ?>" class="logo d-flex align-items-center">
        <img src="../assets/img/pulse-svgrepo-com.svg" alt="">
        <span class="d-none d-lg-block text-light">Contact Tracing</span>
      </a>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">



        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

            <?php
            // $result = displayProfile($verified_session_img, "imgSmall");
            // echo $result;
            if (file_exists('../../assets/users/' . $verified_session_img) && ($verified_session_img > 0)) {
              echo '<img src="../../assets/users/' . $verified_session_img . '" alt="Profile" class="rounded-circle m-2 w-100 h-100">';
            } else {
              echo '<img src="../../assets/users/person-circle.svg" alt="Profile" class="rounded-circle m-2 w-100 h-100">';
            }
            ?>
            <!-- class="rounded-circle" -->
            <span
              class="d-none d-md-block dropdown-toggle ps-2 text-light"><?php echo $verified_session_firstname . " " . $verified_session_lastname ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $verified_session_firstname . " " . $verified_session_lastname ?></h6>
              <span><?php echo $verified_session_role ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center"
                href="pages-faq.php?id=<?php echo $_SESSION["login_key"]; ?>">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <!-- Adding return nav item for super admin -->
            <?php
            $output = '';
            $key = $_SESSION["login_key"];
            if (isset($verified_session_department) && ($verified_session_username)) {
              switch ($verified_session_role) {
                case "SuperAdmin":
                  //statement
                  $output .= '
                    <li>
                      <a class="dropdown-item d-flex align-items-center" href="../../super_admin/index.php?id=' . $key . '">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                      </a>
                    </li>    
                  ';
                  break;

                default:
                  //statement
                  $output .= '
                    <li>
                      <a class="dropdown-item d-flex align-items-center" href="logout.php">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                      </a>
                    </li>
                  ';
              }
              echo $output;
            } else {
              // header("location:index.php");
            }
            ?>



          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>

  <main>

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <br>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="dashboard">
      <div class="container p-5">
        <?php if (isset($_SESSION['alert'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong><?php echo $_SESSION['alert']; ?></strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php  } else if (isset($_SESSION['alerterror'])) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong><?php echo $_SESSION['alerterror']; ?></strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php  }  ?>
        <div class="card p-5">
          <div class="row p-5">
            <div class="col-md-6">
              <video id="preview" width="100%"></video>
            </div>
            <div class="col-md-6">
              <form class="d-flex align-items-center justify-content-center flex-column" action="tracing.php"
                method="post">
                <label class="p-2">SCAN QR CODE</label>
                <input type="text" name="text" id="text" readonly="" placeholder="scan qrcode" class="form-control">
                <label class="p-2">Insert Code</label>
                <input type="text" name="idnum" id="idnum" placeholder="Insert Qr Code no." class="form-control ">
                <button type=" submit" name="submit" class="btn btn-primary mt-5">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <footer class="footer" style="border: none; margin-top: auto;">
    <div class="copyright">
      &copy; Copyright <strong><span>School System</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://facebook.com/">Medical System Module</a>
    </div>

  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.js"></script>
  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <!-- datatable filter -->
  <!-- <script type="text/javascript" src="dataTables.filter.html.js"></script> -->
  <!-- for sweet alert -->
  <script src="../assets/vendor/bootstrap/js/sweetalert2.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/jquery-3.6.0.min.js"></script>
  <!-- For barcode -->
  <script src="../assets/vendor/bootstrap/js/JsBarcode.all.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

  <!-- Datatable JS connection -->
  <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

  <!-- Ajax JS -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
  <!-- Selector search -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- Custom scripts -->
  <script type="text/javascript"></script>
  <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
  <script>
  let scanner = new Instascan.Scanner({
    video: document.getElementById('preview')
  });
  Instascan.Camera.getCameras().then(function(cameras) {
    if (cameras.length > 0) {
      scanner.start(cameras[0]);
    } else {
      alert('No cameras found');
    }
  }).catch(function(e) {
    console.error(e);
  });
  scanner.addListener('scan', function(c) {
    document.getElementById('text').value = c;
    document.forms[0].submit();
  });
  </script>


</body>

</html>