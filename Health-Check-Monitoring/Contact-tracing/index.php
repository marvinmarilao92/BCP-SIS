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
      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path
            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
          <path
            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path
            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
      </svg>
      <div class="container p-5">
        <?php if (isset($_SESSION['alert'])) {
          echo '<div class="alert alert-success d-flex align-items-center" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
          <div>
            ' . $_SESSION['alert'] . '
          </div>
        </div>';
        } ?>
        <div class="card p-5">
          <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100 active" id="QR-default-tab" data-bs-toggle="tab"
                data-bs-target="#bordered-justified-QR-default" type="button" role="tab" aria-controls="QR-default"
                aria-selected="false">QR-Scanner</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100 " id="stft-tab" data-bs-toggle="tab"
                data-bs-target="#bordered-justified-stft" type="button" role="tab" aria-controls="stft"
                aria-selected="true">Student & Faculty</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="visitor-tab" data-bs-toggle="tab"
                data-bs-target="#bordered-justified-visitor" type="button" role="tab" aria-controls="visitor"
                aria-selected="false">Visitor</button>
            </li>
          </ul>
          <div class="row">
            <div class="tab-content pt-2" id="borderedTabJustifiedContent">
              <div class="tab-pane fade show active" id="bordered-justified-QR-default" role="tabpanel"
                aria-labelledby="QR-default-tab">
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12 ">
                    <label for="preview"><img width="100%" height="100%^" src="../assets/img/scanner.gif"
                        alt=""></label>
                    <video id="preview" width="100%" style="display:none;"></video>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 mt-5">
                    <div id="valueCheck"></div>
                    <form class="d-flex align-items-center justify-content-center flex-column" action="tracing.php"
                      method="post">
                      <label for="QRtext" class="p-2">
                        <label class="p-2">QR-CODE</label>
                      </label>
                      <div class="input-group">
                        <input type="password" name="QRtext" id="QRtext" placeholder="scan qrcode" class="form-control">
                        <a class="input-group-text" onclick="checkNOW('valueCheck');">Check</a>
                      </div>
                      <label class="p-2">Temperature</label>
                      <div class="input-group">
                        <input type="number" name="temp" id="temp" min="35" max="42.3"
                          placeholder="Insert Body Temperature" class="form-control " required>
                        <div class="input-group-text">°C</div>
                      </div>
                      <div class="col text-end">
                        <button type=" submit" name="submit" class="btn btn-primary mt-5">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="bordered-justified-stft" role="tabpanel" aria-labelledby="stft-tab">
              <div class="alert alert-info">
                <h5 class="text-center">Incase of you forgot to bring your QRcode</h5>
              </div>
              <div class="row pt-5">
                <div class="col-12">
                  <form class="d-flex align-items-center justify-content-center flex-column" action="tracing.php"
                    method="post">
                    <label for="QRtext" class="p-2">
                      <div id="valueCheck"></div>
                    </label>
                    <label class=" p-2">Insert Code</label>
                    <input type="text" name="idnum" id="idnum" placeholder="Insert Qr Code no." class="form-control">
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-lg-8 col-md-12 ">
                  <label class="p-2">Temperature</label>
                  <div class="input-group">
                    <input type="number" name="temp" id="temp" min="35" max="42.3" placeholder="Insert Body Temperature"
                      class="form-control " required>
                    <div class="input-group-text">°C</div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col text-end">
                  <button type=" submit" name="submit" class="btn btn-primary mt-5">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="bordered-justified-visitor" role="tabpanel" aria-labelledby="visitor-tab">
              <div class="alert alert-info mt-5">
                <h5 class="text-center">For Visitors who doesn't have QRcode</h5>
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <form action="tracing.php" method="post">
                  <label class="p-2">Name</label>
                  <input type="text" class="form-control" placeholder="Insert Full Name Format (LN, FN MN.)" name="name"
                    required>
                  <label class="p-2">Contact #</label>
                  <input type="text" class="form-control" placeholder="Insert Contact Number " name="contact" required>
                  <label class="p-2">Address</label>
                  <input type="text" class="form-control" placeholder="Insert Address " name="address" required>
                  <label class="p-2">Email</label>
                  <input type="text" class="form-control" placeholder="Insert email " name="email" required>
                  <label class="p-2">Temperature</label>
                  <div class="input-group">
                    <input type="number" name="temp" id="temp" min="35" max="42.3" placeholder="Insert Body Temperature"
                      class="form-control ">
                    <div class="input-group-text">°C</div>
                  </div>
                  <div class="col text-end">
                    <button type=" submit" name="submit" class="btn btn-primary mt-5">Submit</button>
                </form>
              </div>
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
  function checkNOW(valueCheck) {
    var QRtext = document.getElementById("QRtext").value;
    if (QRtext == "") {
      $.ajax({
        url: 'ajax/xvalue.php',
        success: function(html) {
          var ajaxDisplay = document.getElementById(valueCheck);
          ajaxDisplay.innerHTML = html;
        }
      });
    } else {
      $.ajax({
        url: 'ajax/cvalue.php?qrID=' + QRtext,
        success: function(html) {
          var ajaxDisplay = document.getElementById(valueCheck);
          ajaxDisplay.innerHTML = html;
        }
      });
    }
  }
  // function checkifValueOK() {
  //   alert("GO")
  //   var getID = document.getElementById("text").value;
  //   if (getID == "") {
  //     $.ajax({
  //       url: 'ajax/xvalue.php',
  //       success: function(html) {
  //         var ajaxDisplay = document.getElementById(valueCheck);
  //         ajaxDisplay.innerHTML = html;
  //       }
  //     });
  //   } else {
  //     $.ajax({
  //       url: 'ajax/cvalue.php',
  //       success: function(html) {
  //         var ajaxDisplay = document.getElementById(valueCheck);
  //         ajaxDisplay.innerHTML = html;
  //       }
  //     });
  //   }
  // }
  </script>
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
    document.getElementById('QRtext').value = c;
    document.forms[0].submit();
  });
  </script>


</body>

</html>