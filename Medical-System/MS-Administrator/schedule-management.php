<?php
include_once 'security/newsource.php';
?>
<!DOCTYPE html>
<html lang="en">
<title>Schedule</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />

<head>

  <?php include 'includes/head_ext.php'; ?>

</head>

<body>
  <?php $page = 'schedule';
  $nav = 'manage'; ?>
  <?php include 'includes/header.php'; ?>
  <?php include 'includes/sidebar.php'; ?>
  <main id="main" class="main">

    <!-- Page Title -->
    <div class="pagetitle">
      <h1>Schedule Management</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a>
          </li>
          <li class="breadcrumb-item active">Schedule Management</li>
        </ol>
      </nav>
    </div>

    <section class="section2">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
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
            <form action="" method="POST">
              <div class="card border border-primary">
                <div class="card-body">
                  <h1 class="card-title">Set Schedule</h1>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <div class="form-outline">
                          <?php $sql = $db->query('SELECT * FROM ms_dummy_course')->fetchAll();
                          ?>
                          <select class="form-select" aria-label="Default select example" id="course" name="course"
                            onchange="changeThis(this.id,'yr_lvl')">
                            <option selected disabled hidden>--Select Course--</option>
                            <?php foreach ($sql as $row) { ?>
                            <option value="<?php echo $row['prog_code']; ?>">
                              <?php echo $row['progs']; ?>
                            </option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <select class="form-select" aria-label="Default select example" id="yr_lvl" name="yr_lvl">
                          <option selected disabled>--Select Course--</option>
                        </select>
                      </div>
                    </div>
                    <script>
                    function changeThis(s1, s2) {
                      var s1 = document.getElementById(s1);
                      var s2 = document.getElementById(s2);
                      s2.innerHTML = "";
                      if (s1.value == "ABM" || s1.value == "HUMSS" || s1.value == "GAS" || s1.value == "STEM") {
                        var optionArray = ["G-11|G-11", "G-12|G12"];
                      } else {
                        var optionArray = ["1st Year|1st Year", "2nd Year|2nd Year", "3rd Year|3rd Year",
                          "4th Year|4th Year"
                        ];
                      }
                      for (var option in optionArray) {
                        var pair = optionArray[option].split("|");
                        var newoption = document.createElement("option");
                        newoption.value = pair[0];
                        newoption.innerHTML = pair[1];
                        s2.options.add(newoption);
                      }
                    }
                    </script>
                    <div class="col">
                      <div class="form-group">
                        <input type="datetime-local" class="form-control" id="start">
                        <small id="emailHelp" class="form-text text-muted">Date Start</small>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <input type="datetime-local" class="form-control" id="end">
                        <small id="emailHelp" class="form-text text-muted">Date Ends</small>
                      </div>
                    </div>
                    <div class="col">
                      <button type="button" onclick="insertSched('insertNow')" class="btn btn-danger">Go</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <div class="card card border border-primary">
              <div class="card-body">
                <h1 class="card-title">List of Schedule</h1>
                <div class="row">
                  <div class="col">
                    <div class="table-responsive">
                      <table class="table table-hover" id="schedtable">

                        <!-- Table Head -->
                        <thead style="background-color:whitesmoke;">
                          <tr>
                            <th scope="col">Course</th>
                            <th scope="col">Year Level</th>
                            <th scope="col">Date Start</th>
                            <th scope="col">Date End</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $query = 'SELECT * FROM ms_schedule ORDER BY id ASC';
                          $query_run = mysqli_query($conn, $query);
                          date_default_timezone_set('asia/manila');
                          if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                              $date1 = $row['sched_from'];
                              $date2 = $row['sched_to'];
                              $newDate1 = date('F j, Y', strtotime($date1));
                              $newDate2 = date('F j, Y', strtotime($date2)); ?>
                          <tr>
                            <td title="edit" style="cursor:pointer;" value="<?php echo $row['id']; ?>">
                              <?php echo $row['course']; ?>
                            </td>
                            <td title="edit" style="cursor:pointer;" value="<?php echo $row['id']; ?>">
                              <?php echo $row['yr_lvl']; ?>
                            </td>
                            <td title="edit" style="cursor:pointer;" value="<?php echo $row['id']; ?>">
                              <?php echo $newDate1; ?>
                            </td>
                            <td title="edit" style="cursor:pointer;" value="<?php echo $row['id']; ?>">
                              <?php echo $newDate2; ?>
                            </td>
                            <td>
                              <button class="btn btn-warning" name="id_view" onclick="view()" title="View" href="#"
                                id="veiw" value="<?php echo $row['id']; ?>"><i class="bx bxs-bullseye"></i></button>
                              <button class="btn btn-secondary" name="id_edit" onclick="edit(<?php echo $row['id']; ?>)"
                                title="Edit" href="#" id="editID"><i class="bx bxs-calendar-edit"></i></button>
                              <button class="btn btn-danger" name="id_trash"
                                onclick="deleteID(<?php echo $row['id']; ?>)" title="Delete" href="#" id="deleteID"><i
                                  class="bx bxs-trash-alt"></i></button>
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
            </div>
          </div>
        </div>
      </div>
    </section> <!-- End -->
    <script>
    $(document).ready(function() {
      $('#schedtable').DataTable();
    });

    function deleteID(deleteID) {
      var table = "ms_schedule";
      var takeDataintoArray = '&table=' + table;
      Swal.fire({
        allowOutsideClick: false,
        icon: 'question',
        title: 'Do you want to Delete Schedule?',
        text: 'Note: You cannot undo this action',
        confirmButtonText: 'Delete',
        confirmButtonColor: '#f93154',
        cancelButtonColor: '#B23CFD',
        showCancelButton: true,
        backdrop: `rgba(0,0,0,0.2)`,

      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          Swal.fire({
            icon: 'success',
            title: 'You Have Deleted a Schedule',
            text: 'Please be careful to delete next time',
            timer: 2000,
            timerProgressBar: true,
          }).then(() => {
            location.href = 'resources/trash.php?id=' + deleteID + '&table=' + table;
          })
        }
      })

    }


    function edit(editID) {
      Swal.fire({
        toast: true,
        allowOutsideClick: false,
        icon: 'question',
        title: 'Do you want to Edit ?',
        confirmButtonText: 'Edit yes',
        confirmButtonColor: '#f93154',
        cancelButtonColor: '#B23CFD',
        showCancelButton: true,
      }).then((result) => {
        if (result.isConfirmed) {
          swal.fire({
            title: 'Course',
            input: 'text',
            inputPlaceholder: 'Enter your name or nickname',
            showCancelButton: true,
            inputValidator: function(value) {
              return new Promise(function(resolve, reject) {
                if (value) {
                  resolve()
                } else {
                  reject('You need to write something!')
                }
              })
            }
          })
        }
      })
    }
    </script>
    <script>
    function insertSched(insertNow) {

      var course = document.getElementById("course").value;
      var yr_lvl = document.getElementById("yr_lvl").value;
      var start = document.getElementById("start").value;
      var end = document.getElementById("end").value;

      var takeDataintoArray =
        'course=' + course +
        '&yr_lvl=' + yr_lvl +
        '&start=' + start +
        '&end=' + end;

      if (course != '' && yr_lvl != '' && start != '' && end != '') {

        if (start > end) {

          Swal.fire({
            allowOutsideClick: false,
            toast: true,
            icon: 'error',
            title: 'Please specify the date properly',
            showConfirmButton: true,
          })

        } else {

          Swal.fire({
            icon: 'question',
            title: 'Create a Schedule ?',
            showCancelButton: true,
            showConfirmButton: true,
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire({
                icon: 'success',
                title: 'You Have Created A Schedule',
                text: 'Wait for a Bit',
                timer: 4000,
                timerProgressBar: true,
              }).then(() => {
                $.ajax({
                  type: "POST",
                  url: 'resources/ajax/MSscheduler.php',
                  data: takeDataintoArray,
                  cache: false,
                  success: function(html) {
                    var ajaxDisplay = document.getElementById(insertNow);
                    ajaxDisplay.innerHTML = html;
                  }
                });
              })
            }
          })
        }
      } else {
        Swal.fire({
          allowOutsideClick: false,
          icon: 'error',
          title: 'Please Complete the following Form',
          showConfirmButton: true,
          backdrop: `rgba(0,0,0,0.2)`,
        })
      }
    }
    </script>
  </main>
  <?php include 'includes/footer.php'; ?>
</body>

</html>