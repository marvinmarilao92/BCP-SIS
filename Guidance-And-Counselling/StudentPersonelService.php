<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'include/external.php';
  include 'include/header.php'; ?>
  <link rel="stylesheet" href="mdb5-free-standard/css/mdb.min.css">
  <script src="mdb5-free-standard/js/mdb.min.js"></script>
</head>

<!-- ======= Sidebar ======= -->
<?php include 'include/asideSidebar.php'; ?>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->

<style>
#ModalBody::-webkit-scrollbar {
  display: none;
}
</style>

</head>

<body>
  <?php
  include 'include/asideSidebar.php';
  include 'filesLogic.php'; ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1 class="layout">Research/Survey Evaluation</h1>
      <nav>
        <ol class="breadcrumb" style="background-color: transparent;">
          <li class="breadcrumb-item"><a href="index.php?id=<?php echo $_SESSION['success']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Research/Survey Evaluation</li>
          <li class="breadcrumb-item active">Student Perosonnel Services</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->






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