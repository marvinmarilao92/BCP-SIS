<?php
include_once('security/newsource.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>HCM | Dashboard</title>

<head>
  <?php include('includes/head_ext.php'); ?>

</head>
<style>
.wrapper {
  border: solid 1px #cccccc;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.3);
  padding: 1em;
  ;
}
</style>

<body>
  <?php $page = "health-services"; ?>
  <?php include('includes/header.php'); ?>
  <?php include('includes/sidebar.php'); ?>
  <main id="main" class="main">

    <!-- Page Title -->
    <div class="pagetitle">
      <h1>List of Records</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Records List</li>
        </ol>
      </nav>
    </div>

    <section class="section2">
      <div class="wrapper">
        <div class="row">
          <div class="col-lg-12">

            <h1 class="card-title">Recently Added</h1>
            <!-- Table Starts -->
            <div class="table-responsive">
              <table class="table table-hover" id="table">
                <?php
                $deptStudent = "Student";
                $query = "SELECT * FROM hcms_health_services ORDER BY id ASC LIMIT 7";
                $query_run = mysqli_query($conn, $query);
                ?>
                <!-- Table Head -->
                <thead style="background-color:whitesmoke;">
                  <tr>
                    <th scope="col">ID Number</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Day 1</th>
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
                    <td><?php echo $row['date']; ?></td>
                    <td>

                      <a class="btn btn-secondary"><i class="ri-eye-2-line"></i></a>
                      <a class="btn btn-warning" title="Edit"><i class="ri-edit-2-fill"></i></a>
                      <a class="btn btn-danger" href="resources/delete.php?req_id=<?= $row['id'] ?>"><i
                          class="ri-delete-bin-6-fill"></i></a>
                    </td>
                  </tr>
                  <?php }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section> <!-- End -->


  </main>
  <?php include('includes/footer.php'); ?>
</body>

</html>