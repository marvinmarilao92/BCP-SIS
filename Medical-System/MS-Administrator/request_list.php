<?php
include_once 'security/newsource.php';
?>
<!DOCTYPE html>
<html lang="en">


<head>
  <?php include 'includes/head_ext.php'; ?>
</head>

<body>
  <?php $page = 'Request'; ?>
  <?php include 'includes/header.php'; ?>
  <?php include 'includes/sidebar.php'; ?>
  <main id="main" class="main">

    <!-- Page Title -->
    <div class="pagetitle">
      <h1>Student Completion Management</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a>
          </li>
          <li class="breadcrumb-item active">Stub Completion</li>
        </ol>
      </nav>
    </div>

    <section class="section2">
      <div class="row">
        <div class="col-lg-9">
          <?php
          if (isset($_SESSION['alert'])) {
          ?>
          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong><?php echo $_SESSION['alert']; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php

            unset($_SESSION['alert']);
          }
          ?>
          <div class="card border border-primary">
            <div class="card-body">
              <h1 class="card-title">Stub Completion List</h1>
              <div class="table-responsive">
                <table class="display table table-hover" id="proccess1">
                  <?php require_once "timezone.php";
                  $query = "SELECT * FROM ms_labtest ORDER BY id ASC";
                  $query_run = mysqli_query($conn, $query);
                  ?>
                  <!-- Table Head -->
                  <thead style="background-color:whitesmoke;">
                    <tr>
                      <th scope="col">Full Name</th>
                      <th scope="col">Course</th>
                      <th scope="col">Year Level</th>
                      <th scope="col">Payment Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (mysqli_num_rows($query_run) > 0) {
                      while ($row = mysqli_fetch_assoc($query_run)) {
                        $newdate = date("F j, Y, g:i a", strtotime($row['date_paid']));
                    ?>
                    <tr>
                      <td onclick="view();" style="cursor:pointer;"><?php echo $row['full_n']; ?>
                      </td>
                      <td class="bg-primary text-light" onclick="view();" style="cursor:pointer;">
                        <?php echo $row['course']; ?>
                      </td>
                      <td onclick="view();" style="cursor:pointer;"><?php echo $row['yr_lvl']; ?>
                      </td>
                      <td onclick="view();" style="cursor:pointer;"><?php echo $newdate ?>
                      </td>
                      <td>
                        <div class="input-group">
                          <a href="#" id="edit" onclick="edit('<?php echo $row['id']; ?>', 'editField');"
                            class="btn btn-success"><i class="bi bi-box"></i>&nbspEdit</a>
                          <a href="#" id="delete" onclick="edit('<?php echo $row['id']; ?>', 'editField');"
                            class="btn btn-danger"><i class="bi bi-box"></i>&nbspDelete</a>
                        </div>
                      </td>
                    </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <section class="dashboard">
            <!-- Recent Announcement -->
            <div class="card">

              <div class="card-body">
                <h5 class="card-title"><small>Validated Student </small></h5>

                <div class="activity">
                  <?php
                  require_once('timezone.php');
                  $result = $db->query('SELECT * FROM ms_labtest ORDER BY id ASC LIMIT 10')->fetchAll();

                  foreach ($result as $sql) {
                    $newdate = date("F j,Y", strtotime($sql['created_at'])); ?>

                  <div class="activity-item d-flex">
                    <div class="activite-label"><?php echo $newdate; ?></div>
                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                    <div class="activity-content">
                      <strong><?php echo $sql['full_n'] . '&nbsp' . $sql['course']; ?></strong><br><a href="#"
                        class="fw-bold text-primary">Click
                        Here To View</a>
                    </div>
                  </div>
                  <?php } ?>
                </div>

              </div>
            </div><!-- End Recent Activity -->
          </section>
        </div>

      </div>
    </section> <!-- End -->


  </main>
  <?php include 'includes/footer.php'; ?>
  <script>
  $(document).ready(function() {
    $('#proccess1').DataTable();
  });

  function view() {
    alert("viewNow")
  }

  function edit(editID, editField) {
    $.ajax({
      url: 'resources/ajax/manageame.php?id=' + editID,
      success: function(html) {
        var ajaxDisplay = document.getElementById(editField);
        ajaxDisplay.innerHTML = html;
        $("#manageModal").modal("show");
      }
    });
  }
  </script>
</body>

</html>