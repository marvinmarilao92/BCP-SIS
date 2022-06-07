<?php
require_once "../security/newsource.php";
$resultforSEARCH = $db->query('SELECT * FROM student_information WHERE id_number = ?', $_GET['id_number'])->fetchArray();

if ($resultforSEARCH) {  ?>
<div class="container">
  <div class="row p-2 d-flex justify-content-center">
    <div class="col-lg-6 col-md-12 col-sm-12 text-center">
      <h5> Full Name</h5>
      <input type="hidden" id="id_number" value="<?php echo $_GET['id_number'] ?>">
      <input type="text" class="form-control text-center" disabled name="fullname" id="fullname"
        value="<?php echo $resultforSEARCH['lastname'] . ', ' . $resultforSEARCH['firstname'] . ' ' . $resultforSEARCH['middlename'] ?>"
        required>
    </div>
  </div>

  <div class="row p-2">
    <div class="col-lg-6 col-sm-12 p-2">
      <h5> Brand Name : </h5>
      <select id="prod_code" name="prod_code" class="form-select"
        onchange="validateCurrentQTY(this.value, 'validateTY');">
        <option value="" selected="selected" disabled="disabled">Select Available Medicines</option>
        <?php
          $sql2 = 'SELECT * FROM hcms_stock ORDER BY id';
          $result2 = mysqli_query($conn, $sql2);
          if (mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_array($result2)) {
              echo '<option value = "' . $row2['prod_code'] . '">' . $row2['brand_name'] . '<sup>(' . $row2['dosage'] . ')</sup></option>';
            }
            // Free result set
            mysqli_free_result($result2);
          }
          ?>
      </select>
    </div>

    <div class="col-lg-6 col-sm-12 p-2">
      <h5> QTY : </h5>
      <div id="validateTY">
        <input type="number" min="1" max="5" class="form-control" name="prod_quantity" id="prod_quantity"
          placeholder="Milligram" style="text-transform:capitalize;" required>
      </div>

    </div>

    <div class="col-lg-12 col-sm-12 pt-3">
      <div class="form-group">
        <h5>Any Prescription ? : </h5>
        <textarea class="form-control" name="prescription" id="prescription" rows="2"
          style="resize: none; height: 100px; font-size: 1.3rem;" placeholder="Prescribe"></textarea>
      </div>
    </div>

    <div class="col-lg-12 col-sm-12 pt-3">
      <div class="form-group">
        <h5>What Happened Today ? : </h5>
        <textarea class="form-control" name="description" id="description" rows="2"
          style="resize: none; height: 100px; font-size: 1.3rem;" placeholder="Describe"></textarea>
      </div>
    </div>
  </div>
</div>

<?php } else if (!$resultforSEARCH) {
  $resultforSEARCH2 = $db->query('SELECT * FROM teacher_information WHERE id_number = ?', $_GET['id_number'])->fetchArray();
  if ($resultforSEARCH2) {
  ?>
<div class="container">
  <div class="row p-2 d-flex justify-content-center">
    <div class="col-lg-6 col-md-12 col-sm-12 text-center">
      <h5> Full Name</h5>
      <input type="hidden" id="id_number" value="<?php echo $resultforSEARCH['id_number'] ?>">
      <input type="text" class="form-control text-center" disabled name="fullname" id="fullname"
        value="<?php echo $resultforSEARCH['lastname'] . ', ' . $resultforSEARCH['firstname'] . ' ' . $resultforSEARCH['middlename'] ?>"
        required>
    </div>
  </div>

  <div class="row p-2">
    <div class="col-lg-6 col-sm-12 p-2">
      <h5> Brand Name : </h5>
      <select id="prod_name" name="prod_name" class="form-select"
        onchange="validateCurrentQTY(this.value, 'validateTY');">
        <option value="" selected="selected" disabled="disabled">Select Available Medicines</option>
        <?php
            $sql2 = 'SELECT * FROM hcms_stock ORDER BY id';
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) {
              while ($row2 = mysqli_fetch_array($result2)) {
                echo '<option value = "' . $row2['brand_name'] . '">' . $row2['brand_name'] . '<sup>(' . $row2['dosage'] . ')</sup></option>';
              }
              // Free result set
              mysqli_free_result($result2);
            }
            ?>
      </select>
    </div>

    <div class="col-lg-6 col-sm-12 p-2">
      <h5> QTY : </h5>
      <div id="validateTY">
        <input type="number" min="1" max="5" class="form-control" name="prod_quantity" id="prod_quantity"
          placeholder="Milligram" style="text-transform:capitalize;" required>
      </div>

    </div>

    <div class="col-lg-12 col-sm-12 pt-3">
      <div class="form-group">
        <h5>Any Prescription ? : </h5>
        <textarea class="form-control" name="prescription" id="prescription" rows="2"
          style="resize: none; height: 100px; font-size: 1.3rem;" placeholder="Prescribe"></textarea>
      </div>
    </div>

    <div class="col-lg-12 col-sm-12 pt-3">
      <div class="form-group">
        <h5>What Happened Today ? : </h5>
        <textarea class="form-control" name="aid" id="aid" rows="2"
          style="resize: none; height: 100px; font-size: 1.3rem;" placeholder="Describe"></textarea>
      </div>
    </div>
  </div>
</div>

<?php
  } else { ?>
<div class="col p-2 mt-2">
  <div class="alert alert-danger">No records Found</div>
</div>
<?php  }
} else { ?>
<div class="col p-2 mt-2">
  <div class="alert alert-danger">No records Found</div>
</div>
<?php } ?>