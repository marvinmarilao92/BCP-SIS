<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'include/external.php';
  include 'include/header.php'; ?>

</head>

<body>
  <!-- ======= Sidebar ======= -->
  <?php include 'include/asideSidebar.php' ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <script>
  function draftPost(draftPost, draftPostDetails, errorMessage) {
    var Company_Name = document.getElementById("Company_Name").value;
    var Job_Title = document.getElementById("Job_Title").value;
    var Job_Type = document.getElementById("Job_Type").value;
    var Job_Description = document.getElementById("Job_Description").value;
    var Salary = document.getElementById("Salary").value;
    var Work_Location = document.getElementById("Work_Location").value;
    var job_link = document.getElementById("job_link").value;

    var takeDataintoArray =

      'Company_Name=' + Company_Name +
      '&Job_Title=' + Job_Title +
      '&Job_Type=' + Job_Type +
      '&Job_Description=' + Job_Description +
      '&Salary=' + Salary +
      '&Work_Location=' + Work_Location +
      '&job_link=' + job_link;

    if (Company_Name == '' || Job_Title == '' || Job_Type == '' ||
      Job_Description == '' || Salary == '' || Work_Location == '' || job_link == '') {
      $.ajax({
        type: "POST",
        url: 'AjaxForm/errorMessage.php?',
        data: takeDataintoArray,
        cache: false,
        success: function(html) {
          var ajaxDisplay = document.getElementById(errorMessage);
          ajaxDisplay.innerHTML = html;
        }
      });
    } else {

      Swal.fire({
        title: 'Are you sure?',
        text: "post info here!",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, post it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: "POST",
            url: 'ajaxForm/createPost.php',
            data: takeDataintoArray,
            cache: false,
            success: function(html) {
              var ajaxDisplay = document.getElementById(draftPostDetails);
              ajaxDisplay.innerHTML = html;

              Swal.fire(
                'Post added!',
                'Some info here.',
                'success')
            }
          });
        }
      });
    }
  }
  </script>

  <script>
  function viewPost(viewPost, draftPostDetails, errorMessage) {
    var Company_Name = document.getElementById("Company_Name").value;
    var Job_Title = document.getElementById("Job_Title").value;
    var Job_Type = document.getElementById("Job_Type").value;
    var Job_Description = document.getElementById("Job_Description").value;
    var Salary = document.getElementById("Salary").value;
    var Work_Location = document.getElementById("Work_Location").value;
    var job_link = document.getElementById("job_link").value;

    var takeDataintoArray =

      'Company_Name=' + Company_Name +
      '&Job_Title=' + Job_Title +
      '&Job_Type=' + Job_Type +
      '&Job_Description=' + Job_Description +
      '&Salary=' + Salary +
      '&Work_Location=' + Work_Location +
      '&job_link=' + job_link;

    if (Company_Name == '' || Job_Title == '' || Job_Type == '' ||
      Job_Description == '' || Salary == '' || Work_Location == '' || job_link == '') {
      $.ajax({
        type: "POST",
        url: 'AjaxForm/errorMessage.php?',
        data: takeDataintoArray,
        cache: false,
        success: function(html) {
          var ajaxDisplay = document.getElementById(errorMessage);
          ajaxDisplay.innerHTML = html;

        }
      });
    } else {
      $.ajax({
        type: "POST",
        url: 'ajaxForm/jobDraftPOST.php',
        data: takeDataintoArray,
        cache: false,
        success: function(html) {
          var ajaxDisplay = document.getElementById(draftPostDetails);
          ajaxDisplay.innerHTML = html;
        }
      });
    }
  }
  </script>


  <script>
  function editForm(editForm, draftPostDetails) {
    $.ajax({

      url: 'ajaxForm/editDraftPost.php',

      success: function(html) {
        var ajaxDisplay = document.getElementById(draftPostDetails);
        ajaxDisplay.innerHTML = html;
      }
    });

  }
  </script>
  <style>
  #ModalBody::-webkit-scrollbar {
    display: none;
  }

  .form-group #alipunga {
    border: 1px black solid;
    height: 30vh;
  }
  </style>
  </head>

  <body>
    <?php include 'include/asideSidebar.php'; ?>
    <main id="main" class="main">
      <div class="pagetitle">
        <h1 class="layout">Posting</h1>
        <nav>
          <ol class="breadcrumb" style="background-color: transparent;">
            <li class="breadcrumb-item"><a href="index.php?id=<?php echo $_SESSION['success']; ?>">Home</a></li>
            <li class="breadcrumb-item active">Posting</li>
            <li class="breadcrumb-item active">Job Posting</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <button class="btn btn-primary float-right" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Create Post</button>

      <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
        id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel" >
        <div class="offcanvas-header bg-primary">
          <h5 class="offcanvas-title text-light" id="offcanvasScrollingLabel">CREATE POST</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div class="row">
            <div class="col">
              <form action="">
                <div class="form-group p-5">
                  <label for="">Company name:</label>
                  <input type="text" class="form-control">
                  <label for="">Job Title:</label>
                  <input type="text" class="form-control">
                  <label for="">Job Type:</label>
                  <input type="text" class="form-control">
                  <label for="">Description :</label>
                  <input type="text" class="form-control">
                  <label for="">Salary:</label>
                  <input type="text" class="form-control">
                  <label for="">Work location:</label>
                  <input type="text" class="form-control">
                  <label for="">Link:</label>
                  <input type="text" class="form-control">
                  <label for="" class="pt-3">Picture:</label>
                  <input type="file" class="form-control" id="imgInp">
                </div>
                <div class="col text-right">
                  <input class="btn btn-secondary" type="reset"></input>
                  <button class="btn btn-primary" type="">Post</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="form-row ">
        <div class="form-group col-sm-2"></div>
        <div class="form-group col-sm-8">
          <div id="errorMessage"></div>
        </div>
        <div class="form-group col-sm-1"></div>
      </div>

      <div class="justify-content-center" id="draftPostDetails">

        <?php if (!isset($_SESSION["draftKEY"])) { ?>
        <!-- <div class=""> -->
        <div class="d-flex justify-content-center">
          <div class="form-group col-sm-10" style="height: 80%; width:100%">
            <div style="background-color: white;  border-radius: 10px; box-shadow: -5px 15px 15px 5px #77aac9;">
              <div class="row p-4 ">
                <div class=" col ">
                  <h5>Guidance And Counseling</h5>
                </div>
                <!-- <div class="col text-right">
                  <div class="dropdown show">
                    <a style=" color:black;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="bi bi-three-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#" id="editPost"
                        onclick="editForm(<?php echo $post["ID"]; ?>, 'filterPost');"><i class="bi bi-pencil"></i>
                        Edit
                        Data</a>
                      <a class="dropdown-item" href="#" data-toggle="modal"
                        onclick="setKeyPhoto(<?php echo $post["ID"]; ?>);" data-target="#reUploadPost">
                        <i class="bi bi-image"></i> Change Photo</a>
                      <a class="dropdown-item" href="#" id="deletePost"
                        onclick="deletePost(<?php echo $post["ID"]; ?>, 'filterPost');"><i class="bi bi-trash"></i>
                        Delete</a>
                    </div>
                  </div>
                </div> -->
              </div>
              <div class="row p-4">
                <h5 class="pt-1">Job Title: </h5>
                <h5 class="pt-1">Job Type: </h5>
                <h5 class="pt-1"> Description :</h5>
                <h5 class="pt-1"> Salary: </h5>
                <h5 class="pt-1"> Work location: </h5>
                <h5 class="pt-1"> Link: </h5>
              </div>
              <div class="row d-flex justify-content-center">
                <div class="col p-5">
                  <img src="images/default.png" id="blah" class="img-fluid" width="100%"
                    style="max-height:50vh; border-radius: 0px 0px 10px 10px">
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } else { ?>
        <div class="form-row ">
          <div class="form-group col-sm-2"></div>
          <div class="form-group col-sm-8" style="height: 80%;">
            <form class="needs-validation" novalidate>
              <?php
                require_once 'Config.php';
                $viewDraft = $db->query('SELECT * FROM gac_draftpost WHERE Post_KEY = ?', $_SESSION["draftKEY"])->fetchArray();
                ?>
              <span class="text-primary">Company name:</span>
              <div class="input-group">
                <input type="text" class="form-control" value="<?php echo $viewDraft["Company_Name"]; ?>"
                  id="Company_Name" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please fill a Company name.
                </div>
              </div>

              <span class="text-primary">Job Title:</span>
              <div class="input-group">
                <input type="text" class="form-control" value="<?php echo $viewDraft["Job_Title"]; ?>" id="Job_Title"
                  aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please fill a job title.
                </div>
              </div>

              <span class="text-primary"> Job Type: </span>
              <div class="input-group">
                <input type="text" class="form-control" value="<?php echo $viewDraft["Job_Type"]; ?>" id="Job_Type"
                  aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please fill a job type.
                </div>
              </div>


              <span class="text-primary"> Description :</span>
              <div class="input-group">
                <textarea type="text" class="form-control" rows="5" id="Job_Description"
                  aria-describedby="inputGroupPrepend" required><?php echo $viewDraft["Job_Description"]; ?></textarea>
                <div class="invalid-feedback">
                  Please fill a job Description.
                </div>
              </div>

              <span class="text-primary"> Salary: </span>
              <div class="input-group">
                <input type="text" class="form-control" value="<?php echo $viewDraft["Salary"]; ?>" id="Salary"
                  aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please fill a job Salary.
                </div>
              </div>

              <span class="text-primary"> Work location: </span>
              <div class="input-group">
                <input type="text" class="form-control" value="<?php echo $viewDraft["Work_Location"]; ?>"
                  id="Work_Location" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please fill a Work location.
                </div>
              </div>

              <span class="text-primary"> Link: </span>
              <div class="input-group">
                <input type="text" class="form-control" value="<?php echo $viewDraft["job_link"]; ?>" id="job_link"
                  aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please fill a Link:
                </div>
              </div>
              </p>
          </div>
          <!-- <img src=""  class="img-fluid" width="100%" style="border-radius: 0px 0px 10px 10px"> -->
        </div>
      </div>

      <div class="form-group col-sm-2"></div>
      </div> <?php } ?>
      </div>


    </main>
    <!-- ======= Footer ======= -->
    <?php include 'include/footer.php'; ?>
    <script>
    imgInp.onchange = evt => {
      const [file] = imgInp.files
      if (file) {
        blah.src = URL.createObjectURL(file)
      }
    }
    </script>
    <script src="mdb5-free-standard/js/mdb.min.js"></script>
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
