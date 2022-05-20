<?php
include_once 'security/newsource.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'includes/head_ext.php'; ?>
  <title>HCM | Daily Log</title>
</head>

<style>
</style>

<body>
  <?php $page = 'log'; ?>
  <?php include 'includes/header.php'; ?>
  <?php include 'includes/sidebar.php'; ?>
  <main id="main" class="main">

    <!-- Page Title -->
    <div class="pagetitle">
      <h1>Daily Log</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a>
          </li>
          <li class="breadcrumb-item active">Daily Log</li>
        </ol>
      </nav>
    </div>
    <div class="card p-4">
      <form action="resources/add_incident_reports.php" method="post" class="row g-3">
        <div class="col-12 col-md-4">
          <div class="form-floating">
            <input type="text" class="form-control form-control-lg" name="id_number" id="id_number"
              placeholder="ID Number" style="text-transform:capitalize;" required>
            <label for="floatingName">ID Number</label>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="form-floating">
            <input type="text" class="form-control form-control-lg" name="fullname" id="fullname"
              placeholder="Full Name" style="text-transform:capitalize;" required>
            <label for="floatingName">Full Name</label>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="form-floating">
            <input type="text" class="form-control form-control-lg" name="specify" id="specify" placeholder="Role"
              style="text-transform:capitalize;" required>
            <label for="floatingName">Role</label>
          </div>
        </div>

        <div class="col-12 col-md-4">
          <select class="form-select form-select-lg" name="classified" id="classified">
            <option value="" selected="selected" disabled="disabled">Intensity</option>
            <option value="Minor">Minor</option>
            <option value="Major">Major</option>
          </select>
        </div>
        <div class="col-12 col-md-4">
          <select id="prod_name" name="prod_name" class="form-select form-select-lg">
            <option value="" selected="selected" disabled="disabled">Item</option>
            <?php
            $sql2 = 'SELECT * FROM hcms_items ORDER BY prod_id';
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) {
              while ($row2 = mysqli_fetch_array($result2)) {
                echo '<option value = "' . $row2['med_name'] . '">' . $row2['med_name'] . '</option>';
              }
              // Free result set
              mysqli_free_result($result2);
            }
            ?>
          </select>
        </div>
        <div class="col-12 col-md-4">
          <input type="number" min="1" class="form-control form-control-lg" name="prod_quantity" id="prod_quantity"
            placeholder="Quantity" style="text-transform:capitalize;" required>
        </div>
        <div class="col-12 col-md-8">
          <div class="form-group">
            <textarea class="form-control" name="aid" id="aid" rows="3"
              placeholder="What incident happened today?"></textarea>
          </div>
        </div>
        <div class="text-end">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End No Labels Form -->
    </div>

  </main>
  <?php include('includes/footer.php') ?>
</body>

</html>