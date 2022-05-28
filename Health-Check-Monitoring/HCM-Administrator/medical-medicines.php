<?php
include_once('security/newsource.php');


?>
<!DOCTYPE html>
<html lang="en">
<title>Programs</title>

<head>
  <?php include('includes/head_ext.php'); ?>
</head>

<body>
  <?php $page = "medicines";
  $nav = "inventory"; ?>
  <?php include('includes/header.php'); ?>
  <?php include('includes/sidebar.php'); ?>
  <main id="main" class="main">


    <!-- Page Title -->
    <div class="pagetitle">
      <h1>Medicine Inventory</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Medicine Inventory</li>
        </ol>
      </nav>
    </div>
    <section class="section2">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
              <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab"
                  data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home"
                  aria-selected="true">Medicine Current Stocks</button>
              </li>
              <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab"
                  data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile"
                  aria-selected="false">Medicine Stocks History</button>
              </li>
            </ul>
            <div class="tab-content pt-2" id="borderedTabJustifiedContent">
              <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel"
                aria-labelledby="home-tab">
                <div class="card-title d-flex justify-content-between">List of Medicines <button type="button"
                    class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#medForm"><i
                      class="ri-add-circle-line">&nbsp Add Medicine</i></button>
                </div>
                <div class="table-responsive">
                  <?php require_once "timezone.php";
                  $items = "SELECT * FROM hcms_items ORDER BY prod_id ASC";
                  $itemsResult = mysqli_query($conn, $items);
                  ?>
                  <table class="table table-hover datatable">
                    <thead>
                      <tr>
                        <th class="text-center">Medicine</th>
                        <th>Scientific Name</th>
                        <th>Milligrams</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($itemsResult as $data) { ?>
                      <tr>
                        <?php if ($data['quantity'] < 50) { ?>
                        <td class="bg-danger text-white text-center"><?php echo $data['med_name']; ?> </td>
                        <?php } elseif ($data['quantity'] >= 50) { ?>
                        <td class="bg-info text-white text-center"><?php echo $data['med_name']; ?> </td>
                        <?php } ?>

                        <td><?php echo $data['med_sci']; ?> </td>
                        <td><?php echo $data['quantity']; ?> </td>
                        <td Width="10%">
                          <a href="#" onclick class="btn btn-primary" type="button"><i class="bi bi-plus"></i>
                            Add</a>

                        </td>
                      </tr>
                      <?php
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card-title">Medicines Transaction History</div>
                <div class="table-responsive">
                  <?php require_once "timezone.php";
                  $items = "SELECT * FROM hcms_items ORDER BY prod_id ASC";
                  $itemsResult = mysqli_query($conn, $items);
                  ?>
                  <table class="table table-hover datatable">
                    <thead>
                      <tr>
                        <th class="text-center">Medicine</th>
                        <th>Scientific Name</th>
                        <th>Milligrams</th>
                        <th>Stock Holder</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($itemsResult as $data) { ?>
                      <tr>
                        <td><?php echo $data['med_name']; ?> </td>
                        <td><?php echo $data['med_sci']; ?> </td>
                        <td><?php echo $data['quantity']; ?> </td>
                        <td><?php echo $data['creator']; ?> </td>
                        <td Width="10%">
                          <a href="#" onclick class="btn btn-primary" type="button"><i class="bi bi-plus"></i>
                            Add</a>

                        </td>
                      </tr>
                      <?php
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="medForm" tabindex="-1" aria-labelledby="myModallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title text-white" id="exampleModalLongTitle">Add Medicine</h5>
              <a type="button" class="close text-light" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </a>
            </div>
            <form method="POST">
              <div class="modal-body">
                <div class="row">
                  <div class="col">
                    <h5 class="p-2">Brand Name</h5>
                    <input type="text" class="form-control" name="drug_name" id="drug_name"
                      style="text-transform:capitalize;" required>
                  </div>
                  <div class="col">
                    <h5 class="p-2">Generic Name</h5>
                    <input type="text" class="form-control" name="sci_name" id="sci_name"
                      style="text-transform:capitalize;" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col py-3">
                    <h5>Milligram</h5>
                    <input type="number" class="form-control" name="quantity" min="1" max="" id="quantity" required>
                  </div>
                  <div class="col py-3">
                    <h5>Expiration Date:</h5>
                    <input type="date" class="form-control" name="exp_date" min="1" max="" id="exp_date" required>
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <div class="text-end">
                  <button type="close" class="btn btn-secondary" data-bs-dismiss="modal"
                    aria-label="Close">close</button>
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php include('includes/footer.php'); ?>
    </section>
  </main>

  <?php require_once "timezone.php";
  require_once "security/newsource.php";
  if (isset($_POST['submit'])) {
    $medname = $_POST['drug_name'];
    $sci = $_POST['sci_name'];
    $quan = $_POST['quantity'];
    // $query = "SELECT count(med_name) as notVAlid FROM hcms_items WHERE med_name =" . $medname . "";

    $query = $db->query('SELECT count(med_name) as notVAlid FROM hcms_items WHERE med_name=?', $medname)->fetchArray();


    if ($query["notVAlid"] >= 1) {
  ?>
  <script>
  Swal.fire({
    allowOutsideClick: true,
    icon: 'error',
    title: 'Temp!',
    text: 'You should not forget about the temperature check',
    confirmButtonText: 'Thankyou',
    confirmButtonColor: '#f93154',


  })
  </script>
  <?php
    } else {
      $sql = $db->query('INSERT INTO hcms_items (med_name, med_sci, quantity)  VALUES (?, ?, ?)', $medname, $sci, $quan);
    }
  }
  ?>


</body>

</html>