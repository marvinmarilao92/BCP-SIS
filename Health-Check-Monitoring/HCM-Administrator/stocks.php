<?php
include_once('security/newsource.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('includes/head_ext.php'); ?>
</head>

<body>
  <?php $page = "stocks";
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
          <li class="breadcrumb-item active">Stocks</li>
        </ol>
      </nav>
    </div>
    <section class="dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="card top-selling">
            <div class="alert alert-info" role="alert">
              <h4 class="alert-heading">Medicine Stocks</h4>
              <p></p>
              <p class="mb-0">This module is for monitoring the current stocks</p>
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
                    <th class="text-center">Available</th>
                    <th class="text-center">Expired</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($itemsResult as $data) {
                    $dataprodCode = $data['prod_code'] ?>
                  <tr>
                    <td class="text-center">
                      <?php echo $data['brand_name'] . '<sup>' . $data['dosage'] . 'mg</sup>' ?>
                    </td>
                    <td class="text-center" class="text-center"><?php echo $data['gen_name']; ?> </td>
                    <td class="text-center"><?php echo $data['available']; ?></td>
                    <?php if ($data['expired'] > 0) { ?>
                    <td class="text-center"><?php echo $data['expired']; ?></td>
                    <?php } else { ?>
                    <td class="text-center">0</td>
                    <?php } ?>
                    <td class="text-center">
                      <a href="#" onclick class="btn btn-warning" type="button"><i class="bi bi-trash"></i>
                        Dispose</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php include('includes/footer.php'); ?>
  <script>
  function viewExpired(id, expiredList) {
    alert(id)
  }
  </script>
</body>

</html>