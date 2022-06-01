<?php
include_once 'security/newsource.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Medical System</title>
  <!-- Favicons -->
  <link href="../assets/img/pulse-svgrepo-com.svg" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <script src="../assets/vendor/bootstrap/js/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">
  <!-- <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
<!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../mdb5-free-standard/css/mdb.min.css" />

  <!-- <link rel="stylesheet" href="../../assets/css/dropzone.css" />
	<link href="../../assets/css/cropper.css" rel="stylesheet"/> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.css">
  <!-- Selector search -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link href="cropperjs/cropper.min.css" rel="stylesheet" type="text/css" />

  <style>
  @media(max-width: 500px) {
    .table thead {
      display: none;
    }

    .table,
    .table tbody,
    .table tr,
    .table td {
      display: block;
      width: 100%;
    }

    .table tr {
      background: #ffffff;
      box-shadow: 0 8px 8px -4px lightblue;
      border-radius: 5%;
      margin-bottom: 13px;
      margin-top: 13px;
    }

    .table td {
      /* max-width: 20px; */
      padding-left: 50%;
      text-align: right;
      position: relative;
    }

    .table td::before {
      margin-top: 10px;
      content: attr(data-label);
      position: absolute;
      left: 0;
      width: 50%;
      padding-left: 15px;
      font-size: 15px;
      font-weight: bold;
      text-align: left;
    }
  }
  </style>
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center bg-primary">
    <?php include "key_checker.php"; ?>
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php?id=<?php echo $_SESSION["login_key"]; ?>" class="logo d-flex align-items-center">
        <img src="../assets/img/pulse-svgrepo-com.svg" alt="">
        <span class="d-none d-lg-block text-light">Medical System</span>
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
                      <a class="dropdown-item d-flex align-items-center" href="resources/logout.php?id=' . $key . '">
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
    <!-- Page Title -->
    <div class="pagetitle">
      <h1>Annual Medical Reports</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a>
          </li>
          <li class="breadcrumb-item active">Annual Medical Reports</li>
        </ol>
      </nav>
    </div>

    <section class="section2">
      <div class="container pt-5">
        <div class="row">
          <div class="col-lg-12">
            <?php if (isset($_SESSION['alert'])) { ?>
            <div class="alert alert-info" role="alert"><strong><?php echo $_SESSION['alert'] ?></strong></div>
            <?php } else if (isset($_SESSION['alert2'])) { ?>
            <div class="alert alert-danger " role="alert"><strong><?php echo $_SESSION['alert2'] ?></strong></div>
            <?php } ?>
            <div class="card border border-primary">
              <div class="card-body">
                <div class="d-flex bd-highlight mb-3">
                  <h1 class="card-title me-auto me-auto p-2 bd-highlight">Annual Medical Examination Results</h1>
                  <!-- <div class="btn btn-primary p-2 bd-highlight" onclick="addRecord()">Add Record</div> -->
                </div>
                <?php require_once "timezone.php";
                $sql = $db->query('SELECT * FROM ms_labtest')->fetchAll();
                ?>
                <div class="table-responsive">
                  <table class="display table" id="medtable" cellspacing="0">
                    <thead>
                      <tr>
                        <th scope="col">ID Number</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Program</th>
                        <th scope="col">Section</th>
                        <th scope="col">Year Level</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <?php foreach ($sql as $data) { ?>
                    <tbody>

                      <tr>
                        <td><?php echo $data['id_number']; ?></td>
                        <td><?php echo $data['full_n']; ?></td>
                        <td><?php echo $data['course']; ?></td>
                        <td><?php echo $data['section']; ?></td>
                        <td><?php echo $data['yr_lvl']; ?></td>
                        <td>
                          <a href="#" id="manage" onclick="manage('<?php echo $data['id']; ?>', 'manageField');"
                            class="btn btn-outline-primary text-dark"><i class="bi bi-box"></i>&nbspUpload Files</a>
                          <a href="resources/viewPDF.php?id=<?php echo $data['id'] ?>"
                            class="btn btn-outline-success text-dark"><i class="bi bi-file-pdf"></i>&nbspView
                            Recommendation</a>
                          <a href="resources/viewPDF2.php?id=<?php echo $data['id'] ?>"
                            class="btn btn-outline-info text-dark"><i class="bi bi-file-pdf"></i>&nbspView
                            Result</a>
                        </td>
                      </tr>
                    </tbody>
                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="viewModal" data-bs-backdrop="static" aria-hidden="true"
        aria-labelledby="viewModalLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="viewModalLabel">Student Information</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div id="viewresult"></div>
            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-danger btn-sm" onclick="editContent('editresult');" title="Edit"><i
                  class="bx bxs-pencil"></i>Edit</a>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="editModal" data-bs-backdrop="static" aria-hidden="true"
        aria-labelledby="editModalLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel2">Modal 2</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div id="editresult"></div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" data-bs-target="#viewModal" data-bs-toggle="modal"
                data-bs-dismiss="modal">Cancel Editing</button>
              <button class="btn btn-danger" onclick="saveChanges()" data-bs-dismiss="modal">Save Changes</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="addModal" data-bs-backdrop="static" aria-hidden="true"
        aria-labelledby="addModalLabel2" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-primary text-light">
              <h5 class="modal-title" id="addModalLabel2">Add Record</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row g-4">
                <div class="col p-3">
                  <div class="input-group">
                    <input type="text" placeholder="Search Student Number" id="quickSearch" class="form-control"
                      name="search" onchange="searchInfo('showStudentResult');">
                    <label for="sub"><i class="btn btn-primary ri-search-eye-line"
                        style="cursor: pointer;">&nbspSearch</i></label>
                    <a href="#" id="sub" onclick="searchInfo('showStudentResult');" name="submit"
                      style="display: none; visibility: none;"></a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="container">
                  <div id="showStudentResult"></div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" data-bs-toggle="close" data-bs-dismiss="modal">Cancel</button>
              <button class="btn btn-danger" onclick="addNow();">Add Now</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="manageModal" data-bs-backdrop="static" aria-hidden="true"
        aria-labelledby="addModalLabel2" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-primary text-light">
              <h5 class="modal-title" id="addModalLabel2">Add Record</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="container">
                  <form action="resources/meduploads.php" method="POST" enctype="multipart/form-data">
                    <div id="manageField"></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 border p-4">
                      <div class="row">
                        <div class="card-title">Upload Files</div>
                        <label for="" class="p-2">Recommendation Letter</label>
                        <input type="file" name="file1" id="file1" accept="application/pdf, application/msword"
                          class="form-control">
                        <label for="" class="p-2">Annual Medical Examination Result</label>
                        <input type="file" name="file2" id="file2" accept="application/pdf" class="form-control">
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" data-bs-toggle="close" data-bs-dismiss="modal">Cancel</button>
              <button class="btn btn-danger" type="submit" name="submit">Add Now</button></form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- ======= Footer ======= -->
  <footer class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>School System</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://facebook.com/">Medical System Module</a>
    </div>

  </footer><!-- End Footer -->

  <!-- ======= Scripts ======= -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i></a>
  <!-- vendor -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <!-- <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script> -->
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/sweetalert2.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/JsBarcode.all.min.js"></script>
  <script src="../assets/js/main.js"></script>
  </script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js">
  </script>
  <!-- extras -->
  <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
  <script type="text/javascript" src="../mdb5-free-standard/js/mdb.min.js"></script>
  <script type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script type="text/javascript"></script>

  <script>
  function viewContent(viewID, viewresult) {

    $.ajax({
      url: 'resources/ajax/Msview.php?viewID=' + viewID,
      success: function(html) {
        var ajaxDisplay = document.getElementById(viewresult);
        ajaxDisplay.innerHTML = html;
        $("#viewModal").modal("show");

      }
    });

  }

  function editContent(editresult) {
    var editID = document.getElementById("id").value;
    $.ajax({
      url: 'resources/ajax/Msedit.php?editID=' + editID,
      success: function(html) {
        var ajaxDisplay = document.getElementById(editresult);
        ajaxDisplay.innerHTML = html;
        $("#viewModal").modal("hide");
        $("#editModal").modal("show");

      }
    });
  }

  function addRecord() {
    $("#addModal").modal("show");
  }

  function manage(manage, manageField) {
    $.ajax({
      url: 'resources/ajax/manageame.php?id=' + manage,
      success: function(html) {
        var ajaxDisplay = document.getElementById(manageField);
        ajaxDisplay.innerHTML = html;
        $("#manageModal").modal("show");
      }
    });
  }
  </script>


  <script>
  $(document).ready(function() {
    $('#medtable').DataTable();
  });
  </script>
  <script>
  function addNow() {
    var id_number = document.getElementById("id_number").value;
    var course = document.getElementById("course").value;
    var name = document.getElementById("name").value;
    var yr_lvl = document.getElementById("yr_lvl").value;
    var takeDataintoArray =
      'id_number=' + id_number + '&course=' + course + '&name=' + name + '&table=' + table;
  }
  </script>

  <script>
  function myFunction() {
    window.print();
  }
  </script>
  <!-- crud function -->
  <script>
  function deleteID() {
    var deleteID = document.getElementById(deleteID).value;
    var table = "ms_labtest";
    var takeDataintoArray =
      'deleteID=' + deleteID + '&table=' + table;
    Swal.fire({
      toast: true,
      allowOutsideClick: false,
      icon: 'question',
      title: 'Do you want to Delete Schedule?',
      text: 'Note: You cannot undo this action',
      confirmButtonText: 'Delete',
      confirmButtonColor: '#f93154',
      cancelButtonColor: '#B23CFD',
      showCancelButton: true,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        Swal.fire({
          icon: 'success',
          title: 'You Have Deleted a Record',
          text: 'Please be careful to delete next time',
          timer: 4000,
          timerProgressBar: true,
        }).then(() => {
          location.href = 'resources/trash.php?id=' + deleteID + '&table=' + table;
        })
      }
    })

  }


  function edit() {
    var editID = document.getElementById("deleteID").value;
    var takeDataintoArray =
      'editID=' + editID;
    Swal.fire({
      toast: true,
      allowOutsideClick: false,
      icon: 'question',
      title: 'Do you want to Edit ?',
      confirmButtonText: 'Edit yes',
      confirmButtonColor: '#f93154',
      cancelButtonColor: '#B23CFD',
      showCancelButton: true,
    }).then((result) => {
      if (result.isConfirmed) {
        swal.fire({
          title: 'Course',
          input: 'text',
          inputPlaceholder: 'Enter your name or nickname',
          showCancelButton: true,
          inputValidator: function(value) {
            return new Promise(function(resolve, reject) {
              if (value) {
                resolve()
              } else {
                reject('You need to write something!')
              }
            })
          }
        })
      }
    })
  }

  function saveChanges() {
    Swal.fire({
      allowOutsideClick: true,
      icon: 'question',
      title: 'Do you want to Save Changes ?',
      showConfirmButton: true,
      showCancelButton: true,
    }).then((result) => {
      if (result.isConfirmed) {

        var id_number = document.getElementById("id_number").value;
        var full_name = document.getElementById("full_name").value;
        var start = document.getElementById("start").value;
        var end = document.getElementById("end").value;

        var takeDataintoArray =
          'course=' + course +
          '&yr_lvl=' + yr_lvl +
          '&start=' + start +
          '&end=' + end;
      }
    })

  }
  </script>

  <script>
  function insertSched() {
    var course = document.getElementById("course").value;
    var yr_lvl = document.getElementById("yr_lvl").value;
    var start = document.getElementById("start").value;
    var end = document.getElementById("end").value;

    var takeDataintoArray =
      'course=' + course +
      '&yr_lvl=' + yr_lvl +
      '&start=' + start +
      '&end=' + end;

    if (course != '' && yr_lvl != '' && start != '' && end != '') {

      if (start > end) {

        Swal.fire({
          allowOutsideClick: true,
          toast: true,
          icon: 'error',
          title: 'Please specify the date properly',
          showConfirmButton: true,
        })

      } else {

        Swal.fire({
          icon: 'question',
          title: 'Create a Schedule ?',
          showCancelButton: true,
          showConfirmButton: true,
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire({
              icon: 'success',
              title: 'You Have Created A Schedule',
              text: 'Wait for a Bit',
              timer: 4000,
              timerProgressBar: true,
              backdrop: `rgba(255,0,0,0.3) left top no-repeat`
            }).then(() => {
              $.ajax({
                type: "POST",
                url: 'resources/ajax/MSscheduler.php',
                data: takeDataintoArray,
                cache: false,
                success: function(html) {
                  location.reload();
                }
              });
            })
          }
        })
      }
    } else {
      Swal.fire({
        allowOutsideClick: true,
        toast: true,
        icon: 'error',
        title: 'Please Complete the following Form',
        showConfirmButton: true,

      })
    }
  }


  function searchInfo(showStudentResult) {
    var quickSearch = document.getElementById("quickSearch").value;
    var takeDataintoArray =
      'quickSearch=' + quickSearch;
    if (quickSearch != '') {
      $.ajax({
        type: "GET",
        url: 'resources/ajax/MSrecord.php',
        data: takeDataintoArray,
        cache: false,
        success: function(html) {
          var ajaxDisplay = document.getElementById(showStudentResult);
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