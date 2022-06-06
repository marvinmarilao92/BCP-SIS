<?php
include_once('security/newsource.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Contact Tracing
</title>

<head>
  <?php include('includes/head_ext.php'); ?>

</head>

<body>
  <?php $page = "contact-tracing-logs";
  $nav = "Mlogs"; ?>
  <?php include('includes/header.php'); ?>
  <?php include('includes/sidebar.php'); ?>
  <main id="main" class="main">

    <!-- Page Title -->
    <div class="pagetitle">
      <h1>Contact Tracing</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Logs</li>
        </ol>
      </nav>
    </div>

    <section class="section2">
      <div class="row">
        <div class="col-lg-12">
          <div class="card p-3">
            <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
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
                      $query = "SELECT hcms_ctracing.*, hcms_profile.cont_name FROM hcms_ctracing RIGHT JOIN hcms_profile ON hcms_ctracing.qrcode = hcms_profile.qr_code";
                      $query_run = mysqli_query($conn, $query);
                      $dateCheck = mysqli_fetch_assoc($query_run);
                      $dateOnly = date('Y-m-d', strtotime($dateCheck['created_at']));
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
                          if ($dateOnly == date('Y-m-d')) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                              $new_date = date("F j,Y", strtotime($row['created_at']));
                              echo '<td width="30%">' . $row['cont_name'] . '</td>';
                              if ($row['temperature'] <= "37.8" || $row['temperature'] == "36.1") {
                                echo '<td width="30%" class="bg-success text-white">' . $row['temperature'] . '<sub>°C</sub></td>';
                              } elseif ($row['temperature'] >= "38" || $row['temperature'] < "36.0") {
                                echo '<td width="30%" class="bg-danger text-white">' . $row['temperature'] . '<sub>°C</sub></td>';
                              }
                              echo '<td width="30%">' . $new_date . '</td>
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
              <div class="tab-pane fade" id="bordered-justified-visitor" role="tabpanel" aria-labelledby="visitor-tab">
                <div class="card-body">
                  <h1 class="card-title">Visitor Daily Contact Tracing</h1>
                  <div class="table-responsive">
                    <table class="table table-hover datatable">
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
                              <td width="30%">' . $row['name'] . '</td>';
                              if ($row['temp'] <= "37.8" || $row['temp'] == "36.1") {
                                echo '<td width="30%" class="bg-success text-white">' . $row['temp'] . '<sub>°C</sub></td>';
                              } elseif ($row['temp'] >= "38.0" || $row['temp'] < "36.0") {
                                echo '<td width="30%" class="bg-danger text-white">' . $row['temp'] . '<sub>°C</sub></td>';
                              }
                              echo '<td>' . $new_date . '</td>
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
    </section> <!-- End -->


  </main>
  <?php include('includes/footer.php'); ?>
</body>

</html>