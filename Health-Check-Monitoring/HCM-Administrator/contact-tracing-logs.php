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
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover datatable">
                  <?php
                  require_once "timezone.php";
                  $query = "SELECT * FROM hcms_ctracing ORDER BY id ASC";
                  $query_run = mysqli_query($conn, $query);
                  ?>
                  <!-- Table Head -->
                  <thead style="background-color:whitesmoke;">
                    <tr>
                      <th scope="col">ID Number</th>
                      <th scope="col">Full Name</th>
                      <th scope="col">Contact</th>
                      <th scope="col">Address</th>
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
                        $new_date = date("F j,Y", strtotime($time));
                    ?>
                    <tr>
                      <td><?php echo $row['id_number']; ?></td>
                      <td><?php echo $row['fullname']; ?></td>
                      <td><?php echo $row['contact']; ?></td>
                      <td><?php echo $row['address']; ?></td>
                      <td><?php echo $row['temp']; ?></td>
                      <td><?php echo $new_date ?></td>
                      <td>
                        <a href="#" class="btn btn-primary"><i class="bi bi-cursor"></i>Send Now</a>
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