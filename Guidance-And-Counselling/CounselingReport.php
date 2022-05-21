<!DOCTYPE html>
<html>

<head>
  <?php include 'include/external.php';
  include 'include/header.php'; ?>
  <link rel="stylesheet" href="mdb5-free-standard/css/mdb.min.css">
  <script src="mdb5-free-standard/js/mdb.min.js"></script>
  <style>
  #ModalBody::-webkit-scrollbar {
    display: none;
  }
  </style>

</head>

<body>
  <?php
  include 'include/asideSidebar.php';
  ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1 class="layout">Report</h1>
      <nav>
        <ol class="breadcrumb" style="background-color: transparent;">
          <li class="breadcrumb-item"><a href="index.php?id=<?php echo $_SESSION['success']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Report</li>
          <li class="breadcrumb-item active">Counseling Report</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <form method="POST" action="create_excel.php">
      <div class="form-row">
        <div class="form-group col-10"></div>
        <div class="form-group col-2">
          <button class="btn btn-primary" style="width:100%; " name="exportCounseling"><i class="bi bi-printer"></i>
            Create report </button>
        </div>
      </div>
    </form>
    <table class="table table-hover" style="width:100%; font-size: 14px; text-align:center;" id="StudentINFO">
      <thead style="background: rgba(161, 213, 255, 0.1);">
        <tr style="text-align:center;">
          <th>Counselor Name</th>
          <th>Student ID</th>
          <th>Student Name</th>
          <th>Year Level</th>
          <th>Testing Status</th>
        </tr>
      </thead>
      <tbody>

        <?php
        require_once 'Config.php';
        $DefaultData = $db->query(' SELECT * FROM counseledlist')->fetchAll();
        foreach ($DefaultData as $fetch) :
          echo '
                                <td>' . $fetch['Couselor_Name'] . '</td>
                                <td>' . $fetch['Student_ID'] . '</td>
                                <td>' . $fetch['Student_Name'] . '</td>
                                <td>' . $fetch['Student_yrlvl'] . '</td>
                                <td>' . $fetch['Testing_Status'] . '</td>
                              </tr>';
        endforeach;
        ?>

      </tbody>

    </table>

    <script>
    $(document).ready(function() {
      $('#StudentINFO').DataTable();
    });
    </script>





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