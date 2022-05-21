<!DOCTYPE html>
<html lang="en">

<head>

  <?php include 'include/external.php';
  include 'include/header.php'; ?>
  <!-- <link rel="stylesheet" href="mdb5-free-standard/css/mdb.min.css"> -->
  <!-- <script src="mdb5-free-standard/js/mdb.min.js"></script> -->
  <!-- ======= Sidebar ======= -->
  <?php include 'include/asideSidebar.php' ?>


  <script type="text/javascript">
  function takeDate(filterdate, produceComJob) {
    $.ajax({
      url: 'Ajax/fetchfilterData.php?getCompany=' + filterdate,
      success: function(html) {
        var ajaxDisplay = document.getElementById(produceComJob);
        ajaxDisplay.innerHTML = html;
      }
    });
  }
  </script>


  <script type="text/javascript">
  function takeJob(filterJob, DateandTime) {
    $.ajax({
      url: 'Ajax/fetchfilterDate.php?getJobTitle=' + filterJob,
      success: function(html) {
        var ajaxDisplay = document.getElementById(DateandTime);
        ajaxDisplay.innerHTML = html;
      }
    });
  }
  </script>

  <script type="text/javascript">
  function enabledButton(Jobdate, submitfilerpost) {
    $.ajax({
      url: 'Ajax/enabledButton.php?enabledB=' + filterJob,
      success: function(html) {
        var ajaxDisplay = document.getElementById(submitfilerpost);
        ajaxDisplay.innerHTML = html;
      }
    });
  }
  </script>

  <script type="text/javascript">
  function closedButton(filterdate, submitfilerpost) {
    $.ajax({
      url: 'Ajax/ClosedButton.php?closedBtn=' + filterdate,
      success: function(html) {
        var ajaxDisplay = document.getElementById(submitfilerpost);
        ajaxDisplay.innerHTML = html;
      }
    });
  }
  </script>

  <script type="text/javascript">
  function submitfilerpost(Jobdate, submitfilerpost) {
    $.ajax({
      url: 'Ajax/enabledButton.php?closedBtn=' + filterJob,
      success: function(html) {
        var ajaxDisplay = document.getElementById(submitfilerpost);
        ajaxDisplay.innerHTML = html;
      }
    });
  }
  </script>


  <script>
  function fetchFilter(filterPost) {
    var Jobdate = document.getElementById("Jobdate").value;
    $.ajax({
      url: 'ajaxForm/createSession.php?selectPost=' + Jobdate,
      success: function(html) {
        var ajaxDisplay = document.getElementById(filterPost);
        ajaxDisplay.innerHTML = html;
      }
    });
  }
  </script>


  <script>
  function editForm(editPost, filterPost) {

    $.ajax({
      url: 'ajaxForm/editPostForm.php?editPost=' + editPost,
      success: function(html) {
        var ajaxDisplay = document.getElementById(filterPost);
        ajaxDisplay.innerHTML = html;
      }
    });
  }
  </script>

  <script>
  function saveditForm(savePost, filterPost, errorMessage) {

    var saveJob_Title = document.getElementById("saveJob_Title").value;
    var saveJob_Type = document.getElementById("saveJob_Type").value;
    var saveJob_Description = document.getElementById("saveJob_Description").value;
    var saveSalary = document.getElementById("saveSalary").value;
    var saveWork_Location = document.getElementById("saveWork_Location").value;
    var savejob_link = document.getElementById("savejob_link").value;

    var takeDatainfoArray =

      'saveJob_Title=' + saveJob_Title +
      '&saveJob_Type=' + saveJob_Type +
      '&saveJob_Description=' + saveJob_Description +
      '&saveSalary=' + saveSalary +
      '&saveWork_Location=' + saveWork_Location +
      '&savejob_link=' + savejob_link;

    if (saveJob_Title == '' || saveJob_Type == '' || saveJob_Description == '' ||
      saveSalary == '' || saveWork_Location == '' || savejob_link == '') {
      $.ajax({
        type: "POST",
        url: 'AjaxForm/errorMessage.php?errorMessage=' + savePost,
        data: takeDatainfoArray,
        cache: false,
        success: function(html) {
          var ajaxDisplay = document.getElementById(errorMessage);
          ajaxDisplay.innerHTML = html;
        }
      });
    } else {

      $.ajax({
        type: "POST",
        url: 'AjaxForm/savePostForm.php?savePost=' + savePost,
        data: takeDatainfoArray,
        cache: false,
        success: function(html) {

          var ajaxDisplay = document.getElementById(filterPost);
          ajaxDisplay.innerHTML = html;

        }
      });
    }
    return false;
  }
  </script>



  <script>
  function updateCanceled(voidEdit, filterPost) {

    $.ajax({
      url: 'ajaxForm/canceledEdit.php?cancelEditPost=' + voidEdit,
      success: function(html) {
        var ajaxDisplay = document.getElementById(filterPost);
        ajaxDisplay.innerHTML = html;
      }
    });
  }
  </script>

  <script>
  function deletePost(deletePost, filterPost) {

    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this post!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: 'ajaxForm/deletePost.php?deletePost=' + deletePost,
          success: function(html) {
            var ajaxDisplay = document.getElementById(filterPost);
            ajaxDisplay.innerHTML = html;
            refreshPost(filterPost);
          }
        });
      }
    });
  }
  </script>


  <script>
  function refreshPost(filterPost) {
    $.ajax({
      url: 'ajaxForm/refreshPost.php',
      success: function(html) {
        var ajaxDisplay = document.getElementById(filterPost);
        ajaxDisplay.innerHTML = html;
      }
    });
  }
  </script>

  <script>
  function setKeyPhoto(keyID) {
    $.ajax({
      url: 'ajaxForm/PostLib/setKeyPhoto.php?keyPhoto=' + keyID,
      success: function(html) {}
    });
  }
  </script>


  <style>
  #ModalBody::-webkit-scrollbar {
    display: none;
  }

  #shapeLeft {
    border-radius: 50px 10px 50px 10px;
  }

  #shapeRight {
    border-radius: 10px 50px 10px 50px;
  }
  </style>


</head>

<body style="background-image:url('Picture/back.jpg'); background-repeat: no-repeat;
    background-size: cover; background-attachment: fixed;">


  <main id="main" class="main">
    <div class="pagetitle">
      <h1 class="layout">Posting</h1>
      <nav>
        <ol class="breadcrumb" style="background-color: transparent;">
          <li class="breadcrumb-item"><a href="index.php?id=<?php echo $_SESSION['success']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Posting</li>
          <li class="breadcrumb-item active">Manage Post</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <br>

    <!-- Button trigger modal -->
    <div class="row">
      <div class="col-10"></div>
      <div class="col-2">
        <button type="button" class="btn btn-secondary" style="width: 100%;" data-toggle="modal"
          data-target="#exampleModalCenter">
          <i class="bi bi-sliders"></i> Filter
        </button>
      </div>
    </div><br><br>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border: none; border-radius: 34px;
          border-bottom: 3px solid black;
          border-top: 3px solid black;">
          <div class="modal-header" style=" background-color: #c7efff;
                                      border-top-left-radius: 30px;
                                      border-top-right-radius: 30px;">
            <h5 class="modal-title" id="exampleModalLongTitle">Filter post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5 id="modalTile"><i>Use filter to find your post</i></h5><br>
            <form>
              <div class="form-row">

                <div class=" form-group col-12">
                  <select class="form-select" aria-label="Default select example" id="filterdate" onchange="takeDate(this.value, 'produceComJob'),
          closedButton(this.value, 'submitfilerpost');">
                    <option selected value="" disabled>Select Company Name</option>
                    <?php
                    require_once 'Config.php';
                    $fetchpostData = $db->query('SELECT * FROM gac_jobpost')->fetchAll();
                    foreach ($fetchpostData as $postData) {
                      echo '<option value="' . $postData["Company_Name"] . '" >' . $postData["Company_Name"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
            </form>
          </div>
          <div id="produceComJob"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <div id="submitfilerpost">
            <button type="button" disabled class="btn btn-primary">Done</button>
          </div>
        </div>
      </div>
    </div>
    </div>





    <div id="deleteMessage"></div>
    <div class="row justify-content-center" id="filterPost">

      <?php
      require_once 'Config.php';
      $jobPost = $db->query('SELECT * FROM gac_jobpost ORDER BY updated_at DESC',)->fetchAll();
      foreach ($jobPost as $post) { ?>
      <div class="form-row " style="margin-bottom: 20px; ">
        <div class="form-group col-sm-2"></div>
        <div class="form-group col-sm-8" style="height: 80%;">
          <div style="background-color: white;  border-radius: 10px; box-shadow: -5px 15px 15px 5px #77aac9;">
            <div style="padding: 10px; ">
              <h5><a href="<?php echo $post["job_link"] ?>"><b><?php echo $post["Company_Name"] ?></b></a>
                <span class="float-right">
                  <div class="dropdown show ">
                    <a class="" style="color:black;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="bi bi-three-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#" id="editPost"
                        onclick="editForm(<?php echo $post["ID"]; ?>, 'filterPost');"><i class="bi bi-pencil"></i> Edit
                        Data</a>
                      <a class="dropdown-item" href="#" data-toggle="modal"
                        onclick="setKeyPhoto(<?php echo $post["ID"]; ?>);" data-target="#reUploadPost">
                        <i class="bi bi-image"></i> Change Photo</a>
                      <a class="dropdown-item" href="#" id="deletePost"
                        onclick="deletePost(<?php echo $post["ID"]; ?>, 'filterPost');"><i class="bi bi-trash"></i>
                        Delete</a>
                    </div>
                  </div>
                </span>
              </h5>
              <p> <span class="text-primary">Job Title: </span> <?php echo $post["Job_Title"] ?> <br>
                <span class="text-primary"> Job Type: </span><?php echo $post["Job_Type"] ?>
              </p>

              <p> <span class="text-primary"> Description :</span> <?php echo $post["Job_Description"] ?> </p>

              <p> <span class="text-primary"> Salary: </span><?php echo $post["Salary"] ?> </p>
              <p> <span class="text-primary"> Work location: </span> <?php echo $post["Work_Location"] ?> </p>

              <br>
              <p>
                <span class="text-primary"> Link: </span><a
                  href="<?php echo $post["job_link"] ?>"><?php echo $post["job_link"] ?></a>
              </p>
            </div>
            <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($post['job_photo']) . ''; ?>"
              class="img-fluid" width="100%" style="border-radius: 0px 0px 10px 10px">
          </div>
        </div>

        <div class="form-group col-sm-2"></div>
      </div>

      <?php  } ?>
    </div>

    <!-- upload photo -->
    <div class="modal fade" id="reUploadPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Update image post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
              <div class="mb-3">
                <input class="form-control" type="file" name="postPhoto">
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="uploadPhoto">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["uploadPhoto"])) {
      if (count($_FILES) > 0) {
        if (is_uploaded_file($_FILES['postPhoto']['tmp_name'])) {
          require_once "dbImage/Imagedb.php";
          $imgData = addslashes(file_get_contents($_FILES['postPhoto']['tmp_name']));
          $imageProperties = getimageSize($_FILES['postPhoto']['tmp_name']);
          $sql = "UPDATE gac_jobpost SET imageType='{$imageProperties['mime']}' ,job_photo='{$imgData}' WHERE ID= '{$_SESSION["keyPosting"]}'";
          $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
          if (isset($current_id)) {
            // header("Location: listImages.php");
            echo    "
                        <script>
                          fetchFilter('filterPost');
                        </script>
                      ";
          }
        }
      }
    }
    ?>




  </main>
  <!-- ======= Footer ======= -->
  <?php include 'include/footer.php'; ?>


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
