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
      <h1 class="d-flex justify-content-between">List of Medicines <button type="button" class="btn btn-primary"
          data-bs-toggle="modal" data-bs-target="#medForm"><i class="ri-add-circle-line">&nbsp Add Medicine</i></button>
      </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Medicine List</li>
        </ol>
      </nav>
    </div>
    <section class="section2">
      <div class="col">
        <div class="card p-4">
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
                  <th>Quantity</th>
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
                      Add Item</a>

                  </td>
                </tr>
                <?php
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal fade" id="medForm" tabindex="-1" aria-labelledby="myModallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white" id="exampleModalLongTitle">Add Medicine</h5>
              <a type="button" class="close text-light" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </a>
            </div>
            <form method="dsads">
              <div class="modal-body">
                <div class="row">
                  <div class="col">
                    <small class="p-2">Drug Name</small>
                    <input type="text" class="form-control" name="drug_name" id="drug_name"
                      style="text-transform:capitalize;" required>
                  </div>
                  <div class="col">
                    <small class="p-2">Scientific Name</small>
                    <input type="text" class="form-control" name="sci_name" id="sci_name"
                      style="text-transform:capitalize;" required>
                  </div>
                </div>
                <div class="col">
                  <small class="p-2">Description</small>
                  <textarea rows="4" class="form-control" style="text-transform:capitalize;" name="descr"
                    required></textarea>
                </div>
                <div class="col py-3">
                  <small>Quantity</small>
                  <input type="number" class="form-control" name="quantity" min="1" max="" id="quantity" required>
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


    </section>
  </main>
  <?php include('includes/footer.php'); ?>
</body>

</html>