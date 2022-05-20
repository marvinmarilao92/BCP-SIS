<?php
include_once('security/newsource.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>HCM | Dashboard</title>

<head>
  <?php include('includes/head_ext.php'); ?>

</head>

<body>
  <?php $page = "check-up";
  $nav = "health-monitoring"; ?>
  <?php include('includes/header.php'); ?>
  <?php include('includes/sidebar.php'); ?>
  <main id="main" class="main">

    <!-- Page Title -->
    <div class="pagetitle">
      <h1>BCP Check-up</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Check-up</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-xxl-6 col-md-6">
              <div class="card p-4" onclick="checkupType();" style="cursor:pointer;">
                <div class="info-card  revenue-card">
                  <div class="card-body">
                    <h5 class="card-title">Today <span>| Today New Check-up</span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <?php
                        $dept = "Health Check Monitoring";
                        $stats = "Active";
                        $query = "SELECT * FROM hcms_checkup_type";
                        $query_run = mysqli_query($conn, $query);
                        $total = mysqli_num_rows($query_run);

                        echo "<h6>$total</h6>";
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-6 col-md-6">
              <div class="card p-4" onclick="checkupType();" style="cursor:pointer;">
                <div class="info-card sales-card">
                  <div class="card-body">
                    <h5 class="card-title">Today <span>| Total Scheduled</span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <?php
                        require_once "timezone.php";
                        $new_date = date('Y-m-d', strtotime($time));
                        $query = "SELECT * FROM hcms_checkup WHERE nxt_sched = '{$new_date}'";
                        $query_run = mysqli_query($conn, $query);
                        $total = mysqli_num_rows($query_run);

                        echo "<h6>$total</h6>";
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xxl-12 col-md-12">
          <div class="card p-4">
            <div class="col-lg-12">
              <div class="alert alert-info text-center" role="alert">
                <h4 class="alert-heading">Check up</h4>
                <p class="mb-0">Search first to show information</p>
              </div>
              <div class="col-12 col-md-4 input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text p-3" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg"
                      width="24" height="24" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
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



    </section> <!-- End -->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
      tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h5 class="text-center">Create Check up Type</h5>
            <input type="text" name="checkup-type" id="checkup-type" class="form-control" required>
            <h5 class="text-center mt-3">Description</h5>
            <textarea type="text" name="description" id="description" class="form-control" required></textarea>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
              data-bs-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit">Create</button>
          </div>
        </div>
      </div>
    </div>

  </main>
  <script>
  function checkupType() {
    $('#exampleModalToggle').modal('show')
  }
  </script>
  <script>
  function searchthis(showResult) {
    var id_number = document.getElementById("id_number").value;
    var takeDataintoArray =
      'id_number=' + id_number;
    if (id_number != '') {
      $.ajax({
        type: "GET",
        url: 'ajax/searchID.php',
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
  <script type="text/javascript">
  function formSubmit() {
    $.ajax({
      type: 'POST',
      url: 'insert.php',
      data: $('#frmBox').serialize(),
      success: function(response) {
        $('#success').html(response);
      }
    });
  }
  var form = document.getElementById('frmBox').reset();
  return false;
  </script>
  <?php include('includes/footer.php'); ?>
</body>

</html>