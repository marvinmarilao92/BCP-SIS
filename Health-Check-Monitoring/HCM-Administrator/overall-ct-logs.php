<?php
include_once('security/newsource.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('includes/head_ext.php'); ?>

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
          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Total <span>| Covid-19 Positive </span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <?php
                  $query = "SELECT * FROM `hcms_ctracing` WHERE status = 'Positive'";
                  $query_run = mysqli_query($conn, $query);
                  $total = mysqli_num_rows($query_run);

                  echo "<h6>$total</h6>";
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Total <span>| Covid-19 Positive </span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <?php
                  $query = "SELECT * FROM `hcms_ctracing` WHERE status = 'Positive'";
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
    </section>
    <section class="dashboard">
      <div class="row">
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
          <div class="tab-content pt-2" id="borderedTabJustifiedContent">
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
    </section> <!-- End -->


  </main>
  <?php include('includes/footer.php'); ?>
</body>

</html>