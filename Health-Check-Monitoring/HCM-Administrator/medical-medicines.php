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
          <div class="card p-5">
            <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
              <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab"
                  data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home"
                  aria-selected="true">Medicine Current Stocks</button>
              </li>
              <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab"
                  data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile"
                  aria-selected="false">Medicine Transaction History</button>
              </li>
            </ul>
            <div class="tab-content pt-2" id="borderedTabJustifiedContent">
              <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel"
                aria-labelledby="home-tab">
                <div class="card-title ">List of Medicines
                </div>
                <div class="table-responsive">
                  <?php require_once "timezone.php";
                  $items = "SELECT * FROM hcms_stock ORDER BY id ASC";
                  $itemsResult = mysqli_query($conn, $items);
                  ?>
                  <table class="table table-hover datatable">
                    <thead>
                      <tr>
                        <th class="text-center">Brand Name</th>
                        <th class="text-center">Generic Name</th>
                        <th class="text-center">Total Dosage</th>
                        <th class="text-center">Dosage/pc</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($itemsResult as $data) { ?>
                      <tr>
                        <?php if ($data['dosage'] < 50) { ?>
                        <td class="text-center" class="bg-danger text-white">
                          <?php echo $data['brand_name']; ?> </td>
                        <?php } elseif ($data['quantity'] >= 50) { ?>
                        <td class="text-center" class="bg-info text-white text-center">
                          <?php echo $data['brand_name']; ?> </td>
                        <?php } ?>
                        <td class="text-center" class="text-center"><?php echo $data['gen_name']; ?> </td>
                        <td class="text-center"><?php echo $data['total_dosage']; ?> </td>
                        <td class="text-center"><?php echo $data['dosage_pc']; ?> </td>
                        <td class="text-center"><?php echo $data['quantity']; ?> </td>
                        <td class="text-center">
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
                <div class="card-title d-flex justify-content-between">Medicines Transaction History <button
                    type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#medForm"><i
                      class="ri-add-circle-line">&nbsp Add
                      Medicine</i></button></div>
                <div class="table-responsive">
                  <?php require_once "timezone.php";
                  $items = "SELECT * FROM hcms_items_transac ORDER BY prod_id ASC";
                  $itemsResult = mysqli_query($conn, $items);
                  ?>
                  <table class="table table-hover datatable">
                    <thead>
                      <tr>
                        <th class="text-center">Brand Name</th>
                        <th class="text-center">Generic Name</th>
                        <th class="text-center">Dosage</th>
                        <th class="text-center">Manufactured Date</th>
                        <th class="text-center">Expiration Date</th>
                        <th class="text-center">Staff</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($itemsResult as $data) { ?>
                      <tr>
                        <td class="text-center"><?php echo $data['brand_name']; ?> </td>
                        <td class="text-center"><?php echo $data['gen_name']; ?> </td>
                        <td class="text-center"><?php echo $data['dosage']; ?> mg</td>
                        <td class="text-center"><?php echo $data['man_date']; ?> </td>
                        <td class="text-center"><?php echo $data['exp_date']; ?> </td>
                        <td class="text-center"><?php echo $data['creator']; ?> </td>
                        <td class="text-center">
                          <a href="#" onclick="add('<?php echo $data['prod_id'] ?>');" class="btn btn-primary"
                            type="button"><i class="bi bi-plus"></i>
                            Add</a>
                          <a href="#" onclick class="btn btn-danger" type="button"><i class="bi bi-minus"></i>
                            Dispose</a>
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
                    <input type="text" class="form-control" name="b_name" id="b_name" style="text-transform:capitalize;"
                      required>
                  </div>
                  <div class="col">
                    <h5 class="p-2">Generic Name</h5>
                    <input type="text" class="form-control" name="g_name" id="g_name" style="text-transform:capitalize;"
                      required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6 py-3">
                    <h5>Dosage(per/piece)</h5>
                    <div class="input-group">
                      <input type="number" class="form-control" name="dosage" min="1" max="" id="dosage" required>
                      <span class="input-group-text" id="basic-addon1">mg</span>
                    </div>
                  </div>
                  <div class="col-6 py-3">
                    <h5>Quantity</h5>
                    <input type="number" class="form-control" name="dosage" min="1" max="" id="dosage" required>
                  </div>
                  <div class="col-6 py-3">
                    <h5>Manufactured Date:</h5>
                    <input type="date" class="form-control" name="man_date" min="1" max="" id="manufactured-date"
                      required>
                  </div>

                  <div class="col-6 py-3">
                    <h5>Expiration Date:</h5>
                    <input type="date" class="form-control" name="exp_date" min="1" max="" id="expiry-date" required>
                  </div>

                </div>
                <div class="text-end">
                  <div class="modal-footer">
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
  <script>
  function add(itemID) {
    $.ajax({
      url: 'ajax_HRM_Form/bookingForm.php?bookingID=' + bookingID,
      success: function(html) {
        var ajaxDisplay = document.getElementById(disabledField);
        ajaxDisplay.innerHTML = html;
        $("#booking").modal("show");
      }
    });
  }
  </script>
  <?php require_once "timezone.php";
  require_once "security/newsource.php";
  if (isset($_POST['submit'])) {
    $b_name = $_POST['b_name'];
    $g_name = $_POST['g_name'];
    $dosage = $_POST['dosage'];
    $man_date = $_POST['man_date'];
    $exp_date = $_POST['exp_date'];
    $fullname = $verified_session_lastname . ', ' . $verified_session_firstname . ' ' . $verified_session_middlename;
    $sql = $db->query('INSERT INTO hcms_items_transac (brand_name, gen_name, dosage, man_date, exp_date, creator, created_at)  VALUES (?, ?, ?, ?, ?, ?, ?)', $b_name, $g_name, $dosage, $man_date, $exp_date, $fullname, $time);
    // $query = "SELECT count(med_name) as notVAlid FROM hcms_items WHERE med_name =" . $medname . "";
    // .|.
  ?>
  <!-- <script>
  // @TODO jakol 3x a day
  Swal.fire({
    allowOutsideClick: true,
    icon: 'error',
    title: 'Error',
    text: 'Already Exist',
    confirmButtonText: 'Okay!',
    confirmButtonColor: '#a96929',
  })
  </script> -->
  <?php
  }
  ?>


  <script>
  const dosage = document.querySelector('#dosage').value;
  const manufacturedDate = document.querySelector('#manufactured-date').value;
  const expiryDate = document.querySelector('#expiry-date').value;
  console.log(dosage, manufacturedDate, expiryDate);
  console.log(" ");
  let quantity = 255;
  let unitQuantity = quantity <= 1 ? 'pc' : 'pcs';
  let total = dosage * quantity;
  console.log(`| Units Dosage per 1pc: ${paracetamolDosage} |`);
  console.log(
    `Total Dosage: ${total}mg | Quantity: ${quantity}${unitQuantity}`);
  </script>

</body>

</html>