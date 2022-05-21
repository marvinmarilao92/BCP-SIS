<?php
include_once('security/newsource.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>HCM | Dashboard</title>

<head>
  <?php include('includes/head_ext.php'); ?>

</head>

<body>
  <?php $page = "monitoring";
  $nav = "health-monitoring"; ?>
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
      <div class="row">
        <div class="card p-4">
          <div class="col-lg-12">
            <div class="alert alert-info text-center" role="alert">
              <h4 class="alert-heading">Monitoring</h4>
              <p class="mb-0">Search Here to Monitor</p>
            </div>
            <div class="col-12 col-md-4 input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text p-3" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path
                      d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                  </svg></span>
              </div>
              <input type="text" class="form-control text-center" name="id_number" id="id_number"
                placeholder="ID Number" style="text-transform:capitalize;" onchange="searchthis('showResult');"
                required>
            </div>
          </div>
        </div>
        <div id="showResult"></div>
        <div class="card p-4">
          <div class="col-lg-12">
            <!-- Table Starts -->
            <table class="table table-hover datatable">
              <?php
              $deptStudent = "Student";
              $query = "SELECT * FROM hcms_health_services ORDER BY id ASC";
              $query_run = mysqli_query($conn, $query);
              ?>
              <!-- Table Head -->
              <thead style="background-color:whitesmoke;">
                <tr>
                  <th scope="col">ID Number</th>
                  <th scope="col">Full Name</th>
                  <th scope="col">Check-up</th>
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
                    <a class="btn btn-success" title="Edit"><i class="ri-edit-2-fill"></i></a>
                    <a class="btn btn-warning" title="view"><i class="ri-eye-fill"></i></a>
                    <a class="btn btn-danger" title="Delete"><i class="ri-delete-bin-7-fill"></i></a>
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


    </section> <!-- End -->


  </main>
  <script>
  function searchthis(showResult) {
    var id_number = document.getElementById("id_number").value;
    var takeDataintoArray =
      'id_number=' + id_number;
    if (id_number != '') {
      $.ajax({
        type: "GET",
        url: 'ajax/searchID2.php',
        data: takeDataintoArray,
        cache: false,
        success: function(html) {
          var ajaxDisplay = document.getElementById(showResult);
          ajaxDisplay.innerHTML = html;
        }
      });
    } else {
      alert('Asd')
    }
  }
  </script>
  <script type="text/javascript">
  function formSubmit() {
    $.ajax({
      type: 'POST',
      url: 'insert.php',
      data: $('#frmBox').serialize(),
      success: function(response) {
        $('#success').html(response);
      }
    });
  }
  var form = document.getElementById('frmBox').reset();
  return false;
  </script>
  <?php include('includes/footer.php'); ?>
</body>

</html>