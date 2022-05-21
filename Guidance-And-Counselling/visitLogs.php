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
          <li class="breadcrumb-item active">Visit Logs</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <form method="POST" action="create_excel.php">
      <div class="form-row">
        <div class="form-group col-10"></div>
        <div class="form-group col-2">
          <button class="btn btn-primary" style="width:100%;" name="export"><i class="bi bi-printer"></i> Create report
          </button>
        </div>
      </div>
    </form>
    <table class="table table-hover" style="width:100%; font-size: 14px;" id="StudentINFO">
      <thead style="background: rgba(161, 213, 255, 0.1);">
        <tr style="text-align:center;">
          <th>Student Name</th>
          <th>Type of Logs</th>
          <th>Purpose</th>
          <th>IN</th>
          <th>OUT</th>

        </tr>
      </thead>
      <tbody>

        <?php
        require_once 'Config.php';
        $DefaultData = $db->query(' SELECT * FROM gac_logsdata ORDER BY created DESC')->fetchAll();
        foreach ($DefaultData as $data) :
          echo '<tr style="text-align:center;" id="rmvrw' . $data["ID"] . '" >

                                    <td>' . $data["Student_Name"] . '</td>
                                    <td>' . $data["LogsType"] . '</td>
                                    <td>' . $data["Visit_Purpose"] . '</td>
                                    <td style="color:green" >
                                      ' . $data["created"] .
            '</td style="color: rgba(110, 255, 99, 0.1)">';
          if ($data["updated"] != null) {
            echo '<td style="color:green">
                                        ' . $data["updated"] . '</td>';
          } else {
            echo '<td style="color:red;"> - </td>';
          }
          echo '      </tr>';
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