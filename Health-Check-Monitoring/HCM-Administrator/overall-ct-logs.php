<?php
include_once('security/newsource.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('includes/head_ext.php'); ?>
  <style>
  #offcanvasRight {
    z-index: 1055;
  }

  #showDetails {
    z-index: 1800;
  }
  </style>
</head>

<body>
  <?php $page = "overall-contact-tracing-logs";
  $nav = "Mlogs"; ?>
  <?php include('includes/header.php'); ?>
  <?php include('includes/sidebar.php'); ?>
  <main id="main" class="main">

    <!-- Page Title -->
    <div class="pagetitle">
      <h1>Manage Logs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Overall Contact Tracing</li>
        </ol>
      </nav>
    </div>

    <section class="dashboard">
      <div class="row">
        <div class="col-12">
          <div class="alert alert-info" role="alert">
            <h4 class="alert-heading">Overall Contact Tracing</h4>
            <p></p>
            <p class="mb-0">This Module is for the Overall Management Reports of Contact tracing Including the
              Contact Tracing for Visitors</p>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="card info-card sales-card" onclick="viewPositive('listPositive');" style="cursor:pointer;"
            title="click here to view information">

            <div class="card-body">
              <h5 class="card-title">Total <span>| List of Persons who might have Symptoms of Covid-19 </span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <?php
                  $query = $db->query("SELECT count(status) as count1 FROM `hcms_ctracing`  WHERE `status` = ?", "Not Normal")->fetchArray();
                  $query2 = $db->query("SELECT count(status) as count2 FROM `hcms_ctracingv`  WHERE `status` = ?", "Not Normal")->fetchArray();
                  $total = $query['count1'] += $query2['count2'];
                  echo "<h6>$total</h6>";
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Total <span>| Number of close contacts </span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <?php
                  $query = "SELECT * FROM `hcms_ctracing`, `hcms_ctracingv` WHERE hcms_ctracing.status = 'Positive' AND hcms_ctracingv.status = 'Positive'";
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
      <div class="row">
        <div class="col-lg-12">
          <div class="card top-selling">
            <ul class="mt-3 nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
              <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 active" id="student-tab" data-bs-toggle="tab"
                  data-bs-target="#bordered-justified-student" type="button" role="tab" aria-controls="student"
                  aria-selected="true">Student & Teachers</button>
              </li>
              <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="visitor-tab" data-bs-toggle="tab"
                  data-bs-target="#bordered-justified-visitor" type="button" role="tab" aria-controls="visitor"
                  aria-selected="false">Visitor</button>
              </li>
            </ul>
            <div class="tab-content" id="borderedTabJustifiedContent">
              <div class="tab-pane fade show active" id="bordered-justified-student" role="tabpanel"
                aria-labelledby="student-tab">
                <div class="card-body">
                  <h1 class="card-title">Students & Teachers Daily Contact Tracing</h1>
                  <div class="table-responsive">
                    <table class="table table-hover datatable">
                      <?php
                      require_once "timezone.php";
                      $query = "SELECT hcms_ctracing.*, hcms_profile.cont_name FROM hcms_ctracing LEFT JOIN hcms_profile ON hcms_ctracing.qrcode = hcms_profile.qr_code";
                      $query_run = mysqli_query($conn, $query);
                      // echo $dateOnly;
                      // echo date('Y-m-d');
                      ?>
                      <!-- Table Head -->
                      <thead style="background-color:whitesmoke;">
                        <tr>
                          <th scope="col">Full Name</th>
                          <th scope="col">Temperature</th>
                          <th scope="col">Date</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        require_once "timezone.php";
                        if (mysqli_num_rows($query_run) > 0) {
                          while ($row = mysqli_fetch_assoc($query_run)) {
                            $new_date = date("F j,Y", strtotime($row['created_at']));
                            echo '<td width="30%">' . $row['cont_name'] . '</td>
                              <td width="30%">' . $row['temperature'] . '</td>
                              <td width="30%">' . $new_date . '</td>
                              <td width="10%"> 
                                <a href = "" class="btn btn-primary"><i class="bi bi-info-circle"></i></a>
                                <a href = "" class="btn btn-warning"><i class="bi bi-envelope-fill"></i></a>
                              </td>
                            </tr>';
                          }
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="bordered-justified-visitor" role="tabpanel" aria-labelledby="visitor-tab">
                <div class="card-body">
                  <h1 class="card-title">Visitor Daily Contact Tracing</h1>
                  <div class="table-responsive">
                    <table class="table table-borderless datatable">
                      <?php
                      require_once "timezone.php";
                      $query = "SELECT * FROM hcms_ctracingv ORDER BY id ASC";
                      $query_run = mysqli_query($conn, $query);
                      $dateCheck = mysqli_fetch_assoc($query_run);
                      $dateOnly = date('Y-m-d', strtotime($dateCheck['created_at']));
                      ?>
                      <!-- Table Head -->
                      <thead style="background-color:whitesmoke;">
                        <tr>
                          <th scope="col">Full Name</th>
                          <th scope="col">Temperature</th>
                          <th scope="col">Date</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        require_once "timezone.php";
                        if (mysqli_num_rows($query_run) > 0) {
                          if ($dateOnly == date('Y-m-d')) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                              $new_date = date("F j,Y", strtotime($row['created_at']));
                              echo '<tr>
                              <td width="30%">' . $row['name'] . '</td>
                              <td width="30%">' . $row['temp'] . '</td>
                              <td>' . $new_date . '</td>
                              <td width="10%"> 
                                <a href = "" class="btn btn-primary"><i class="bi bi-info-circle"></i></a>
                                <a href = "" class="btn btn-warning"><i class="bi bi-envelope-fill"></i></a>
                              </td>
                            </tr>';
                            }
                          }
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" id="showPositive" tabindex="1" role="dialog" aria-labelledby="modelTitleId"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">List of Infected</h5>
            <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div id="listPositive"></div>
            </div>
          </div>
          <div class="modal-footer">
            <a type="button" class="btn btn-primary" data-bs-dismiss="modal">Done</a>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="showDetails" data-bs-keyboard="false" tabindex="-1" role="dialog"
      aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h5 class="modal-title">Contact Information</h5>
            <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div id="Pdetails"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="previews();">Back</button>
            <a class="btn btn-primary" type="button" onclick="showClosecontact('showClosecontact')">See Close
              Contacts</a>
          </div>
        </div>
      </div>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
      <div id="showClosecontact"></div>
    </div>

    <script>
    $('#exampleModal').on('show.bs.modal', event => {
      var button = $(event.relatedTarget);
      var modal = $(this);
      // Use above variables to manipulate the DOM

    });
    </script>
  </main>
  <?php include('includes/footer.php'); ?>
  <script>
  function viewPositive(listPositive) {
    $.ajax({
      url: 'ajax/viewPositive.php',
      success: function(html) {
        var ajaxDisplay = document.getElementById(listPositive);
        ajaxDisplay.innerHTML = html;
        $('#showPositive').modal('show');
      }
    });
  }

  function viewposDetails(newID, Pdetails, createdAt) {
    $('#showPositive').modal('hide');
    $.ajax({
      url: 'ajax/viewDetails.php?qrID=' + newID + '&date=' + createdAt,
      success: function(html) {
        var ajaxDisplay = document.getElementById(Pdetails);
        ajaxDisplay.innerHTML = html;
        $('#showDetails').modal('show');
      }
    });
  }

  function previews() {
    $('#showPositive').modal('show');
    $('#showDetails').modal('hide');
    $('#offcanvasRight').offcanvas('hide');
  }

  function showClosecontact(showClosecontact) {
    var dateCheck = document.getElementById("checkDate").value;
    $.ajax({
      url: 'ajax/viewcloseContacts.php?dateCheck=' + dateCheck,
      success: function(html) {
        var ajaxDisplay = document.getElementById(showClosecontact);
        ajaxDisplay.innerHTML = html;
        $('#showDetails').modal('hide');
      }
    });
    $('#offcanvasRight').offcanvas('show');
  }
  </script>
</body>

</html>