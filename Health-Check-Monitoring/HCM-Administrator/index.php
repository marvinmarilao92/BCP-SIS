<?php
  $path = 'view';
  include_once('includes/source.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>HCM | Dashboard</title>
<head>
<?php include ('includes/head_ext.php');?>
</head>

<body>
<?php $page = "Dashboard"?>
<?php include ('includes/header.php');?>
<?php include ('includes/sidebar.php');?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-6 col-md-6">
          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Total <span>| Active now</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                <?php
                $dept = "Health Check Monitoring";
                $stats = "Active";
                $query = "SELECT * FROM `user_information` WHERE user_information.department = '{$dept}' AND account_status = '{$stats}'";
                $query_run = mysqli_query($conn, $query);      
                $total = mysqli_num_rows($query_run);
                
                echo "<h6>$total</h6>";
                ?>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-6 col-md-6">
          <div class="card info-card revenue-card">

            <div class="card-body">
              <h5 class="card-title">Total <span>| Employee</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                <?php
                
                $dept = "Health Check Monitoring";
                $query = "SELECT * FROM `user_information` WHERE user_information.department = '{$dept}'";
                $query_run = mysqli_query($conn, $query);
                
                $total = mysqli_num_rows($query_run);
                
                echo "<h6>$total</h6>";
                ?>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

      </div>
    </div><!-- End Left side columns -->

  </div>
</section>

</main><!-- End #main -->


  <?php include('includes/footer.php'); ?>
</body>

</html>