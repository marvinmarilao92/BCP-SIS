<?php
include_once('security/newsource.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Incident Reports</title>

<head>
  <?php include('includes/head_ext.php'); ?>

</head>

<body>
  <?php $page = "medsys" ?>
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
          <div class="card">
            <div class="card-body">
              <h1 class="card-title">Contact Tracing</h1>
              <div class="table-responsive">
                <table class="table table-hover datatable">
                  <?php
                  require_once "timezone.php";
                  $query = "SELECT * FROM ms_labtest ORDER BY id ASC";
                  $query_run = mysqli_query($conn, $query);
                  ?>
                  <!-- Table Head -->
                  <thead style="background-color:whitesmoke;">
                    <tr>
                      <th scope="col">ID Number</th>
                      <th scope="col">Full Name</th>
                      <th scope="col">Course</th>
                      <th scope="col">Year-Level</th>
                      <th scope="col">Contact#</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (mysqli_num_rows($query_run) > 0) {
                      while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                    <tr>
                      <td><?php echo $row['id_number']; ?></td>
                      <td><?php echo $row['full_n']; ?></td>
                      <td><?php echo $row['course']; ?></td>
                      <td><?php echo $row['yr_lvl']; ?></td>
                      <td><?php echo $row['contact']; ?></td>
                      <td><?php echo $row['status']; ?></td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                          <?php $table_name = "hcms_medical_records"; ?>
                          <a class="btn btn-secondary" title="View"><i class="ri-eye-2-line"></i></a>
                          <a class="btn btn-primary"
                            href="resources/req_approved.php?req_id=<?= $row['id'] ?>&tablename=<?= $table_name ?>"><i
                              class="ri-edit-2-fill"></i></a>
                          <a class="btn btn-danger"
                            href="resources/req_reject.php?req_id=<?= $row['id'] ?>&tablename=<?= $table_name ?>"><i
                              class="ri-delete-bin-6-fill"></i></a>
                        </div>
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
        </div>
      </div>
    </section> <!-- End -->


  </main>
  <?php include('includes/footer.php'); ?>
</body>

</html>