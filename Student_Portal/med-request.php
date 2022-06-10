<?php
include('includes/session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include("includes/head.php");
  ?>
</head>

<body>

  <?php
  $page = 'medres';
  include("includes/nav.php");
  include("includes/sidebar.php");
  ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Medical Examination</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?id=<?= $_SESSION['login_key']; ?> ">Home</a></li>
          <li class="breadcrumb-item">Medical Examination</li>
        </ol>
      </nav>
    </div>
    <section class="section">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body p-4">
              <div class="alert alert-info">
                <div class="card-title">
                  <big>Medical Examination Results will be seen once you Complete the Stub Procedures</big>
                  <hr>
                  <p>Please wait patiently as you requested for your Medical Examination Result.</p>
                </div>
              </div>
              <div class="table-responsive">
                <?php require_once "timezone.php";
                require_once "includes/config.php";
                $sql =  "SELECT * FROM ms_labtest WHERE id_number = '$verified_session_username'";
                $sql_query = mysqli_query($link, $sql);
                if ($sql > 0) {

                ?>
                <table class="table table-bordered table-hover">
                  <thead style="background-color:whitesmoke;">
                    <tr>
                      <th class="text-center">Payment Date</th>
                      <th class="text-center">School Year</th>
                      <th class="text-center">Urin</th>
                      <th class="text-center">CBC</th>
                      <th class="text-center">Chest X-ray</th>
                      <th class="text-center">Result</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <?php foreach ($sql_query as $data) {
                    $newdate = date("F j, Y, g:i a", strtotime($data['date_paid']));
                    echo ' <tbody>
                  <tr>
                    <td class="text-center">' . $newdate . '</td>
                    <td class="text-center">' . $data['sy'] . '</td>';
                    if ($data['urin'] == 1) {
                      echo '<td width="5%">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked disabled>
                              <label class="form-check-label" for="flexCheckChecked" >
                              </label>
                            </div>
                          </td> ';
                    } else {
                      echo '<td width="5%">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" disabled>
                      <label class="form-check-label" for="flexCheckChecked" >
                      </label>
                    </div>
                  </td> ';
                    }
                    if ($data['cbc'] == 1) {
                      echo '<td width="5%">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked disabled>
                              <label class="form-check-label" for="flexCheckChecked" >
                              </label>
                            </div>
                          </td> ';
                    } else {
                      echo '<td width="5%">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" disabled>
                      <label class="form-check-label" for="flexCheckChecked" >
                      </label>
                    </div>
                  </td> ';
                    }
                    if ($data['c_xray'] == 1) {
                      echo '<td width="5%">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked disabled>
                              <label class="form-check-label" for="flexCheckChecked" >
                              </label>
                            </div>
                          </td> ';
                    } else {
                      echo '<td width="5%">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" disabled>
                      <label class="form-check-label" for="flexCheckChecked" >
                      </label>
                    </div>
                  </td> ';
                    }

                    if (!is_null($data['file_name2']) && $data['status'] == "Approved") {
                      echo '
                    <td class= "text-center bg-success">
                      <a class="text-white" href="../Medical-System/assets/result/' . $data['file_name2'] . '">Download Now!</a>
                    </td>';
                    } elseif ($data['status'] == "Pending") {
                      echo '
                    <td class= "text-center bg-info">
                      <div class="text-white">Pending</div>
                    </td>';
                    } elseif (is_null($data['file_name2']) && is_null($data['status'])) {
                      echo '
                    <td class= "text-center bg-secondary">
                      <div class="text-white">No Result Yet</div>
                    </td>';
                    } elseif (is_null($data['file_name2'])) {
                      echo '
                    <td class= "text-center bg-secondary">
                      <div class="text-white">No Result Yet</div>
                    </td>';
                    } elseif (!is_null($data['file_name2'])) {
                      echo '
                  <td class= "text-center bg-success">
                    <div class="text-white">Result is Ready</div>
                  </td>';
                    }
                    if ($data['status'] == "Approved") {
                      echo '<td>
                    <p class="text-center">Thankyou For your Consideration</p>
                    </td>';
                    } elseif ($data['status'] == "Pending") {
                      echo '<td>
                      <p class="text-center">Please Wait Patiently</p>
                    </td>';
                    } else {
                      echo '<td "text-center">
                      <a class="text-white btn btn-primary" href="function/updateInto.php?id=' . $data['id'] . '">Request for Result</a>
                    </td>';
                    }
                    echo '</tr>
                    </tbody>
                  </table>';
                  }
                } else {
                  echo '<div class= "alert alert danger" role ="alert" > No records Found</div>';
                } ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Button trigger modal -->
      <!-- Modal -->

    </section>


  </main><!-- End #main -->

  <?php
  include("includes/footer.php");
  ?>

</body>


</html>