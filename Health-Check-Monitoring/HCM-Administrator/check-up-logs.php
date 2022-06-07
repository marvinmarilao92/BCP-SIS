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
  <?php $page = "check-up-logs";
  $nav = "Mlogs"; ?>
  <?php include('includes/header.php'); ?>
  <?php include('includes/sidebar.php'); ?>
  <main id="main" class="main">

    <!-- Page Title -->
    <div class="pagetitle">
      <h1>Check-up Logs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Logs</li>
        </ol>
      </nav>
    </div>



    <div class="row">
      <div class="col-lg-8">
        <section class="section2">
          <div class="alert alert-info" role="alert">
            <h4 class="alert-heading">Check-up Logs</h4>
            <p></p>
            <p class="mb-0">This module contains all the checkup informations</p>
          </div>
          <div class="card">
            <div class="card-body">
              <h1 class="card-title"></h1>
              <div class="table-responsive">
                <table class="table table-hover datatable">
                  <?php
                  require_once "timezone.php";
                  $query = "SELECT * FROM hcms_checkup ORDER BY id ASC";
                  $query_run = mysqli_query($conn, $query);
                  ?>
                  <!-- Table Head -->
                  <thead style="background-color:whitesmoke;">
                    <tr>
                      <th scope="col">Full Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (mysqli_num_rows($query_run) > 0) {
                      while ($row = mysqli_fetch_assoc($query_run)) {
                        $newdate = date("F j, Y, g:i:a", strtotime($row['created_at']));
                    ?>
                    <tr>
                      <td><?php echo $row['fullname']; ?></td>
                      <td><?php echo $row['description']; ?></td>
                      <td><?php echo $newdate ?></td>
                      <td>
                        <a href="#" class="btn btn-info bi bi-info-circle-fill"></a>
                        <a href="#" class="btn btn-warning bi bi-pen-fill"></a>
                      </td>
                    </tr>
                    <?php }
                    }
                    ?>
                  </tbody>
                </table>
                <?php if (isset($_GET['dlt'])) : ?>
                <div class="flash-data" data-flashdata="<?= $_GET['dlt']; ?>"></div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12">
        <section class="dashboard">

          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Total <span>| Patients</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <?php
                  $dept = 'Health Check Monitoring';
                  $stats = 'Active';
                  $query = "SELECT * FROM `hcms_checkup`";
                  $query_run = mysqli_query($conn, $query);
                  $total = mysqli_num_rows($query_run);

                  echo "<h6>$total</h6>";
                  ?>
                </div>
              </div>
            </div>
          </div>

          <div class="card">

            <div class="card-body">
              <h5 class="card-title"><small>Today</small></h5>

              <div class="activity">
                <?php
                require_once('timezone.php');
                $checkDate = date('Y-m-d', strtotime($time));
                $test = $db->query("SELECT * FROM hcms_checkup")->fetchAll();
                foreach ($test as $sql) {
                  $dateOnly = date('Y-m-d', strtotime($sql['created_at']));
                  if ($dateOnly == $checkDate) {
                    $newdate = date("g:i:a", strtotime($sql['created_at'])); ?>
                <div class="activity-item d-flex">
                  <div class="activite-label"><?php echo $newdate; ?></div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    <strong><?php echo $sql['fullname'] ?></strong><br><a href="#" class="fw-bold text-primary">Click
                      Here To View</a>
                  </div>
                </div>
                <?php }
                }
                ?>
              </div>

            </div>
          </div>
        </section>
      </div>
    </div>
    <!-- End -->


  </main>
  <?php include('includes/footer.php'); ?>
</body>

</html>