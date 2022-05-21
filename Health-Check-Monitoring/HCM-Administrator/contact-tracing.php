<?php
include_once('security/newsource.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Payment Update</title>

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

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon text-light" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-danger badge-number">1</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
              <span class="status active"></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Announcement</h4>
                <p>Put notification here</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Memo</h4>
                <p>Put notification here</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Announcement</h4>
                <p>Put notification here</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Announcement</h4>
                <p>Put notification here</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon text-light" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-danger badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="../assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Message Content Must Be Placed Here...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="../assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Message Content Must Be Placed Here...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="../assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Message Content Must Be Placed Here...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

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
              <a class="dropdown-item d-flex align-items-center"
                href="users-profile.php?id=<?php echo $_SESSION["login_key"]; ?>">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
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
                      <a class="dropdown-item d-flex align-items-center" href="../../../super_admin/index.php?id=' . $key . '">
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
                      <a class="dropdown-item d-flex align-items-center" href="resources/logout.php">
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

    <section class="section dashboard">
      <div class="container pt-5">
        <div class="row justify-content-center">
          <div class="col-lg-8 d-flex flex-column align-items-center justify-content-center">
            <div class="d-flex justify-content-center py-4">
              <a href="dynamic-login.php" class="logo d-flex align-items-center w-auto">
                <span class="d-none d-lg-block">Contact Tracing</span>
              </a>
            </div>
            <div class="card w-75 h-75">
              <div class="card-body">
                <div class="row">
                  <div class="col-12 d-flex justify-content-center p-5">
                    <button type="button" class="btn btn-primary btn-lg btn-block p-3" data-bs-toggle="modal"
                      data-bs-target="#exampleModal">Student</button>
                    <button type="button" class="btn btn-info btn-lg btn-block p-3">Faculty</button>
                    <button type="button" class="btn btn-warning btn-lg btn-block p-3">Visitor</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content ">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Student Contact Tracing Form</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="col-xxl-12 col-md-12">
            <div class="card p-4">
              <div class="col-lg-12">
                <div class="alert alert-info text-center" role="alert">
                  <h4 class="alert-heading">Contact-Tracing Form</h4>
                </div>
                <div class="col-12 col-md-4 input-group mb-3">
                  <div class="input-group-prepend">
                    <span onclick="searchthis('showResult');" style="cursor:pointer;" class="input-group-text p-3"
                      id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path
                          d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                      </svg></span>
                  </div>
                  <input type="text" class="form-control text-center" name="id_number" id="id_number"
                    placeholder="ID Number" style="text-transform:capitalize;" onchange="searchthis('showResult');"
                    required>
                </div>
                <div id="showResult"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>


  <!-- ======= Footer ======= -->
  <!-- ======= Footer ======= -->
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

  <script>
  function searchthis(showResult) {
    var id_number = document.getElementById("id_number").value;
    var takeDataintoArray =
      'id_number=' + id_number;
    if (id_number != '') {
      $.ajax({
        type: "GET",
        url: 'ajax/CTid.php',
        data: takeDataintoArray,
        cache: false,
        success: function(html) {
          var ajaxDisplay = document.getElementById(showResult);
          ajaxDisplay.innerHTML = html;
        }
      });
    } else {
      alert('Asd')
    }
  }
  </script>
</body>

</html>