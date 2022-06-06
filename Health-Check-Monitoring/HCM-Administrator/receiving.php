<?php
include_once('security/newsource.php');


?>
<!DOCTYPE html>
<html lang="en">


<head>
  <?php include('includes/head_ext.php'); ?>
</head>

<body>
  <?php $page = "receiving";
  $nav = "inv"; ?>
  <?php include('includes/header.php'); ?>
  <?php include('includes/sidebar.php'); ?>
  <main id="main" class="main">


    <!-- Page Title -->
    <div class="pagetitle">
      <h1>Medicine Inventory</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Receiving</li>
        </ol>
      </nav>
    </div>
    <section class="section2">
      <div class="row">
        <div class="col-lg-12">
          <div class="card p-4">
            <?php
            if (isset($_SESSION['alertsuccess'])) { ?>
            <div class="alert alert-success d-flex align-items-center" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
              </svg>
              <div>
                <?php echo $_SESSION['alertsuccess'] ?>
              </div>
            </div>
            <?php
              unset($_SESSION['alertsuccess']);
            }
            ?>
            <div class="card-title d-flex justify-content-between">ON Pending<button type="button"
                class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#medForm"><i
                  class="ri-add-circle-line">&nbsp Add
                  Medicine</i></button></div>
            <div class="table-responsive">
              <?php require_once "timezone.php";
              $items = "SELECT * FROM hcms_items_transac WHERE status = 'Pending' ORDER BY prod_id ASC";
              $itemsResult = mysqli_query($conn, $items);

              ?>
              <table class="table table-hover datatable">
                <thead>
                  <tr>
                    <th class="text-center">Brand Name</th>
                    <th class="text-center">Generic Name</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Received Date</th>
                    <th class="text-center">Expiration Date</th>
                    <th class="text-center">Reciver</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($itemsResult as $data) {
                    $newmanu = date("F j, Y", strtotime($data['received_date']));
                    $newmexp = date("F j, Y", strtotime($data['exp_date'])); ?>
                  <tr>
                    <td class="text-center">
                      <?php echo $data['brand_name'] . '<sup>' . $data['dosage'] . 'mg</sup>' ?>
                    </td>
                    <td class="text-center"><?php echo $data['gen_name']; ?> </td>
                    <td class="text-center"><?php echo $data['quantity']; ?></td>
                    <td class="text-center"><?php echo $newmanu ?> </td>
                    <td class="text-center"><?php echo $newmexp ?> </td>
                    <td class="text-center"><?php echo $data['creator']; ?> </td>
                    <td class="text-center">
                      <a href="resources/acceptItem.php?idAccept=<?= $data['prod_id']; ?>" class="btn btn-primary"
                        type="button"><i class="bi bi-hand-thumbs-up-fill"></i>
                        Accept</a>
                      <a href="resources/acceptItem.php?idReject=<?= $data['prod_id']; ?>" class="btn btn-danger"
                        type="button"><i class="bi bi-hand-thumbs-down-fill"></i>
                        Reject</a>
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
      <div class="modal fade" id="medForm" tabindex="-1" aria-labelledby="myModallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title text-white" id="exampleModalLongTitle">Add Medicine</h5>
              <a type="button" class="close text-light" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </a>
            </div>
            <form method="POST" action="resources/insertstock.php">
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
                    <input type="number" class="form-control" name="quantity" min="1" max="" id="quantity" required>
                  </div>
                  <div class="col-6 py-3">
                    <h5>Date Received:</h5>
                    <input type="date" class="form-control" name="received_date" min="1" max="" id="manufactured-date"
                      required>
                  </div>
                  <div class="col-6 py-3">
                    <h5>Expiration Date:</h5>
                    <input type="date" class="form-control" name="exp_date" min="1" max="" id="expiry-date" required>
                  </div>
                </div>
                <div class="text-end">
                  <div class="modal-footer">
                    <a type="close" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">close</a>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php include('includes/footer.php'); ?>
</body>

</html>