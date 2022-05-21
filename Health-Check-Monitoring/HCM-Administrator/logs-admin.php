<?php
include_once('security/newsource.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Activities</title>

<head>
  <?php include('includes/head_ext.php'); ?>

</head>

<body>
  <?php $page = "logs-admin";
  $nav = "emplogs"; ?>
  <?php include('includes/header.php'); ?>
  <?php include('includes/sidebar.php'); ?>
  <main id="main" class="main">

    <!-- Page Title -->
    <div class="pagetitle">
      <h1>Admin Logs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Admin Logs</li>
        </ol>
      </nav>
    </div>

    <section class="section2">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body pt-4">

              <!-- Table Starts -->
              <div class="table-responsive">
                <table class="table table-hover datatable">
                  <?php
                  $actor = "Health Check Monitoring Administrator";
                  $query = "SELECT * FROM audit_logs WHERE action_name = '$actor' ORDER BY id ASC";
                  $query_run = mysqli_query($conn, $query);
                  ?>
                  <!-- Table Head -->
                  <thead style="background-color:whitesmoke;">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Account Number</th>
                      <th scope="col">Action</th>
                      <th scope="col">Actor</th>
                      <th scope="col">Host</th>
                      <th scope="col">Log</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (mysqli_num_rows($query_run) > 0) {
                      while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                    <tr>
                      <td>#<?php echo $row['id']; ?></td>
                      <td><?php echo $row['account_no']; ?></td>
                      <td><?php echo $row['action']; ?></td>
                      <td><?php echo $row['action_name']; ?></td>
                      <td><?php echo $row['host']; ?></td>
                      <td><?php echo $row['login_time']; ?></td>
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
      </div>
    </section> <!-- End -->


  </main>
  <?php include('includes/footer.php'); ?>
</body>

</html>