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
            <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
              <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 active" id="student-tab" data-bs-toggle="tab"
                  data-bs-target="#bordered-justified-student" type="button" role="tab" aria-controls="student"
                  aria-selected="true">Student</button>
              </li>
              <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="teacher-tab" data-bs-toggle="tab"
                  data-bs-target="#bordered-justified-teacher" type="button" role="tab" aria-controls="teacher"
                  aria-selected="false">Teacher</button>
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
                  <h1 class="card-title">Students Daily Contact Tracing</h1>
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
                          <td><?php echo $new_date ?></td>
                          <td>
                            <a href="#" class="btn btn-primary"><i class="bi bi-cursor"></i>View Details</a>
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
              <div class="tab-pane fade" id="bordered-justified-teacher" role="tabpanel" aria-labelledby="teacher-tab">
                <div class="card-body">
                  <h1 class="card-title">Teachers Daily Contact Tracing</h1>
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
                          <td><?php echo $new_date ?></td>
                          <td>
                            <a href="#" class="btn btn-primary"><i class="bi bi-cursor"></i>View Details</a>
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
              <div class="tab-pane fade" id="bordered-justified-visitor" role="tabpanel" aria-labelledby="visitor-tab">
                <div class="card-body">
                  <h1 class="card-title">Visitor Daily Contact Tracing</h1>
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
                          <td><?php echo $new_date ?></td>
                          <td>
                            <a href="#" class="btn btn-primary"><i class="bi bi-cursor"></i>View Details</a>
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
          </div>
        </div>
      </div>
    </section> <!-- End -->


  </main>
  <?php include('includes/footer.php'); ?>
</body>

</html>