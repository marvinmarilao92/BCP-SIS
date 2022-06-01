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
                          <a href="#" id="delete" class="btn btn-danger"><i class="bi bi-box"></i>&nbspDelete</a>
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
            </div>

            <div class="modal fade" id="editModal" data-mdb-backdrop="static" aria-hidden="true"
              aria-labelledby="addModalLabel2" tabindex="-1">
              <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-light">
                    <h5 class="modal-title" id="addModalLabel2">Manage Stub Record</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div id="editField"></div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" data-mdb-toggle="close" data-mdb-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" onclick="editNow();" name="submit">Edit Now</button>
                  </div>
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
      url: 'resources/ajax/editame.php?id=' + editID,
      success: function(html) {
        var ajaxDisplay = document.getElementById(editField);
        ajaxDisplay.innerHTML = html;
        $("#editModal").modal("show");
      }
    });
  }

  function editNow() {
    var urin = document.getElementById("urin")
    var cbc = document.getElementById("cbc")
    var c_xray = document.getElementById("c_xray")

    if (urin.checked) {
      var urin = "1";
    } else {
      var urin = "0";
    }

    if (cbc.checked) {
      var cbc = "1";
    } else {
      var cbc = "0";
    }

    if (c_xray.checked) {
      var c_xray = "1";
    } else {
      var c_xray = "0";
    }

    var takeDataintoArray = 'urin=' + urin + '&cbc=' + cbc + '&c_xray=' + c_xray;

    Swal.fire({
      allowOutsideClick: false,
      icon: 'question',
      title: 'Do you want to Assess this even if Not in Schedule?',
      text: 'Note: This wiil write the record in advance',
      confirmButtonText: 'Overwrite',
      confirmButtonColor: '#f93154',
      cancelButtonColor: '#B23CFD',
      showCancelButton: true,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: 'resources/ajax/updateame.php',
          data: takeDataintoArray,
          cache: false,
          success: function(result) {
            Swal.fire({
              allowOutsideClick: true,
              icon: 'success',
              title: 'Successfully Inserted',
              showConfirmButton: true,
            })

          }
        });

      }
    })


  }
  </script>
</body>

</html>