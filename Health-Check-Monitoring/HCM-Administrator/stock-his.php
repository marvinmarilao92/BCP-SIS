<?php
include_once('security/newsource.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('includes/head_ext.php'); ?>
</head>

<body>
  <?php $page = "stock-his";
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
          <li class="breadcrumb-item active">Medicine Inventory</li>
        </ol>
      </nav>
    </div>
    <section class="section2">
      <div class="row">
        <div class="col-lg-12">
          <div class="card p-5">
            <div class="alert alert-info" role="alert">
              <h4 class="alert-heading">Stock History</h4>
              <p></p>
              <p class="mb-0">This module Focused on monitoring the Accepted, Rejected, And Disposed Medicines</p>
            </div>
            <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
              <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 active" id="accepted-tab" data-bs-toggle="tab"
                  data-bs-target="#bordered-justified-accepted" type="button" role="tab" aria-controls="accepted"
                  aria-selected="true">Accepted</button>
              </li>
              <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="rejected-tab" data-bs-toggle="tab"
                  data-bs-target="#bordered-justified-rejected" type="button" role="tab" aria-controls="rejected"
                  aria-selected="true">Rejected</button>
              </li>
              <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="disposed-tab" data-bs-toggle="tab"
                  data-bs-target="#bordered-justified-disposed" type="button" role="tab" aria-controls="disposed"
                  aria-selected="false">Disposed</button>
              </li>
            </ul>
            <div class="tab-content pt-2" id="borderedTabJustifiedContent">
              <div class="tab-pane fade show active" id="bordered-justified-accepted" role="tabpanel"
                aria-labelledby="accepted-tab">
                <div class="table-responsive">
                  <?php require_once "timezone.php";
                  $items = "SELECT * FROM hcms_items_transac WHERE status = 'Accepted' ORDER BY prod_id ASC";
                  $itemsResult = mysqli_query($conn, $items);

                  ?>
                  <table class="table table-hover datatable">
                    <thead>
                      <tr>
                        <th class="text-center">Brand Name</th>
                        <th class="text-center">Generic Name</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Date Accepted</th>
                        <th class="text-center">Accepted By</th>
                        <th class="text-center">Receiver</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($itemsResult as $data) {
                        $newdate = date("F j, Y, g:i a", strtotime($data['accepted_date']));
                        $newdate2 = date("Y-m-d H:i:s", strtotime($data['accepted_date'])); ?>
                      <tr>
                        <td class="text-center">
                          <?php echo $data['brand_name'] . '<sup>' . $data['dosage'] . 'mg</sup>' ?>
                        </td>
                        <td class="text-center"><?php echo $data['gen_name']; ?> </td>
                        <td class="text-center"><?php echo $data['quantity']; ?></td>
                        <td class="text-center"><?php echo $newdate; ?> </td>
                        <td class="text-center"><?php echo $data['acc_dec_by']; ?> </td>
                        <td class="text-center"><?php echo $data['creator']; ?> </td>
                        <td class="text-center">
                          <a href="resources/acceptItem.php?idAccept=<?= $data['prod_id']; ?>" class="btn btn-info"
                            type="button"><i class="bi bi-info-circle"></i>
                          </a>
                          <a href="resources/acceptItem.php?idReject=<?= $data['prod_id']; ?>" class="btn btn-warning"
                            type="button"><i class="bi bi-envelope"></i>
                          </a>
                        </td>
                      </tr>
                      <?php
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="bordered-justified-rejected" role="tabpanel"
                aria-labelledby="rejected-tab">
                <div class="table-responsive">
                  <?php require_once "timezone.php";
                  $items = "SELECT * FROM hcms_items_transac WHERE `status` = 'Rejected' ORDER BY prod_id ASC";
                  $itemsResult = mysqli_query($conn, $items);

                  ?>
                  <table class="table table-hover datatable">
                    <thead>
                      <tr>
                        <th class="text-center">Brand Name</th>
                        <th class="text-center">Generic Name</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Date Accepted</th>
                        <th class="text-center">Rejected By</th>
                        <th class="text-center">Receiver</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($itemsResult as $data) {
                        $newdate = date("F j, Y, g:i a", strtotime($data['accepted_date']));
                      ?>
                      <tr>
                        <td class="text-center">
                          <?php echo $data['brand_name'] . '<sup>' . $data['dosage'] . 'mg</sup>' ?>
                        </td>
                        <td class="text-center"><?php echo $data['gen_name']; ?> </td>
                        <td class="text-center"><?php echo $data['quantity']; ?></td>
                        <td class="text-center"><?php echo $newdate; ?> </td>
                        <td class="text-center"><?php echo $data['acc_dec_by']; ?> </td>
                        <td class="text-center"><?php echo $data['creator']; ?> </td>
                        <td class="text-center">
                          <a href="resources/acceptItem.php?idAccept=<?= $data['prod_id']; ?>" class="btn btn-info"
                            type="button"><i class="bi bi-info-circle"></i>
                          </a>
                          <a href="resources/acceptItem.php?idReject=<?= $data['prod_id']; ?>" class="btn btn-warning"
                            type="button"><i class="bi bi-envelope"></i>
                          </a>
                        </td>
                      </tr>
                      <?php
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="bordered-justified-disposed" role="tabpanel"
                aria-labelledby="disposed-tab">
                <div class="table-responsive">
                  <?php require_once "timezone.php";
                  $items = "SELECT * FROM hcms_items_transac WHERE `status` = 'Disposed'";
                  $itemsResult = mysqli_query($conn, $items);
                  ?>
                  <table class="table table-hover datatable">
                    <thead>
                      <tr>
                        <th class="text-center">Brand Name</th>
                        <th class="text-center">Generic Name</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Disposed By</th>
                        <th class="text-center">Date Disposed</th>
                        <th class="text-center">Date Expired</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($itemsResult as $data) {
                        $newexpDate = date("F j, Y, G:i:a", strtotime($data['exp_date'])) ?>
                      <tr>

                        <td class="text-center"><?php echo $data['brand_name'];
                                                  '<sup>' . $data['dosage'] . ' </sup>' ?> </td>
                        <td class="text-center"><?php echo $data['gen_name']; ?> </td>
                        <td class="text-center"><?php echo $data['quantity']; ?> </td>
                        <td class="text-center"><?php echo $data['disposed_by']; ?> </td>
                        <td class="text-center"><?php echo $data['date_disposed']; ?> </td>
                        <td class="text-center"><?php echo $newexpDate; ?> </td>
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
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php include('includes/footer.php'); ?>


</body>

</html>