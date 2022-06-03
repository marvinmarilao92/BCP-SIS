<?php
include_once 'security/newsource.php';
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />

<head>

  <?php include 'includes/head_ext.php'; ?>

</head>

<body>
  <?php $page = 'stud-req';
  include 'includes/header.php';
  include 'includes/sidebar.php'; ?>
  <main id="main" class="main">

    <!-- Page Title -->
    <div class="pagetitle">
      <h1>Medical Examination Result Request</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a>
          </li>
          <li class="breadcrumb-item active">Medical Examination Result Request</li>
        </ol>
      </nav>
    </div>

    <section class="section2">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card border">
            <div class="card-body">
              <h1 class="card-title">List of Requests</h1>
              <div class="row">
                <div class="col">
                  <div class="table-responsive">
                    <?php require_once "timezone.php";
                    $sql = $db->query("SELECT * FROM ms_labtest WHERE status = 'Pending'")->fetchArray();
                    $sql2 = $db->query("SELECT * FROM ms_labtest WHERE status = 'Pending'")->fetchAll();
                    if ($sql > 0) {
                    ?>
                    <table class="display table" id="reqtable" cellspacing="0">
                      <thead style="background-color:whitesmoke;">
                        <tr>
                          <th class="text-center">Full Name</th>
                          <th class="text-center">School Year</th>
                          <th class="text-center">Urin</th>
                          <th class="text-center">CBC</th>
                          <th class="text-center">Chest X-ray</th>
                          <th class="text-center">Result</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <?php foreach ($sql2 as $data) {
                          $newdate = date("F j, Y, g:i a", strtotime($data['date_paid']));
                          echo ' <tbody>
                            <tr>
                              <td class="text-center">' . $data['full_n'] . '</td>
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
                          echo '<td class= "text-center">
                                <a class="btn btn-primary bi bi-check" href="resources/approvedreq.php?id=' . $data['id'] . '">Approve</a>
                              </td>
                            </tr>
                          </tbody>';
                        } ?>
                    </table>
                    <?php  } else {
                      echo '<div class= "alert alert danger" role ="alert" > No records Found</div>';
                    } ?>
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
      $('#reqtable').DataTable();
    });
    </script>
  </main>
  <?php include 'includes/footer.php'; ?>
</body>

</html>