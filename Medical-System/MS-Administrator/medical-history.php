<?php
include_once 'security/newsource.php';
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />

<head>

  <?php include 'includes/head_ext.php'; ?>

</head>

<body>
  <?php $page = 'medhis';
  include 'includes/header.php';
  include 'includes/sidebar.php'; ?>
  <main id="main" class="main">

    <!-- Page Title -->
    <div class="pagetitle">
      <h1>Medical History</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a>
          </li>
          <li class="breadcrumb-item active">Medical History</li>
        </ol>
      </nav>
    </div>

    <section class="section2">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Medical History</h4>
              <div class="alert alert-info" role="alert">
                <h4 class="alert-heading text-center">Search for the ID Number</h4>
                <p></p>
                <p class="mb-0"></p>
              </div>
              <div class="row g-4">
                <div class="col p-3">
                  <div class="input-group">
                    <input type="text" placeholder="Search Student Number" id="searchmedID" class="form-control"
                      name="search" onchange="searchmedID('showMedinfo');">
                    <label for="sub"><a class="btn btn-primary bi bi-search"
                        style="cursor: pointer;">&nbspSearch</a></label>
                    <a href="#" id="sub" onclick="searchmedID('showMedinfo');" name="submit"
                      style="display: none; visibility: none;"></a>
                  </div>
                </div>
              </div>
              <div id="showMedinfo"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="recomModal" tabindex="-1" role="dialog" aria-labelledby="recomModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title"></h5>
              <a type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </a>
            </div>
            <div class="modal-body">
              <form action="resources/medrecom.php" method="POST" enctype="multipart/form-data">
                <div class="container-fluid">
                  <div id="showRecom"></div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-primary">Submit</button></form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="medhisModal" tabindex="-1" role="dialog" aria-labelledby="medhisModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title"></h5>
              <a type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </a>
            </div>
            <div class="modal-body">
              <form action="resources/medhis.php" method="POST" enctype="multipart/form-data">
                <div class="container-fluid">
                  <div id="showMedhis"></div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="submit2" class="btn btn-primary">Submit</button></form>
            </div>
          </div>
        </div>
      </div>
    </section> <!-- End -->
  </main>
  <?php include 'includes/footer.php'; ?>
  <script>
  function searchmedID(showMedinfo) {
    var medid = document.getElementById("searchmedID").value;
    if (medid != "") {
      $.ajax({
        url: 'resources/ajax/MSmedhis.php?medid=' + medid,
        success: function(html) {
          var ajaxDisplay = document.getElementById(showMedinfo);
          ajaxDisplay.innerHTML = html;
        }
      });
    } else {
      Swal.fire({
        allowOutsideClick: false,
        icon: 'error',
        title: 'Please Enter ID Number',
        showConfirmButton: true,
      })
    }
  }

  function RecomModal(showRecom) {
    var recomID = document.getElementById("newID").value;
    $.ajax({
      url: 'resources/ajax/MSupload.php?recomID=' + recomID,
      success: function(html) {
        $('#recomModal').modal('show');
        var ajaxDisplay = document.getElementById(showRecom);
        ajaxDisplay.innerHTML = html;

      }
    });
  }

  function MedhisModal(showMedhis) {
    var recomID = document.getElementById("newID").value;
    $.ajax({
      url: 'resources/ajax/MSupload2.php?recomID=' + recomID,
      success: function(html) {
        $('#medhisModal').modal('show');
        var ajaxDisplay = document.getElementById(showMedhis);
        ajaxDisplay.innerHTML = html;

      }
    });
  }

  function checkFile(errorIcon) {
    var file1 = document.getElementById("file1").value;
    if (file1 == "") {
      $.ajax({
        url: 'resources/ajax/MScheckicon.php',
        success: function(html) {
          var ajaxDisplay = document.getElementById(errorIcon);
          ajaxDisplay.innerHTML = html;

        }
      });
    } else {
      $.ajax({
        url: 'resources/ajax/MScheckicon2.php',
        success: function(html) {
          var ajaxDisplay = document.getElementById(errorIcon);
          ajaxDisplay.innerHTML = html;

        }
      });
    }
  }
  </script>
</body>

</html>