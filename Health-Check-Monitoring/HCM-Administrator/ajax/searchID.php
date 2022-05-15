<?php
require_once "../security/newsource.php";
$resultforSEARCH = $db->query('SELECT * FROM student_information WHERE id_number = ?', $_GET['id_number'])->fetchArray();

if ($resultforSEARCH) {  ?>

<div class="row p-2">
  <div class="col-md-6 col-sm-12 p-2">
    <input type="text" class="form-control form-control-lg text-primary" disabled name="fullname" id="fullname"
      value="<?php echo $resultforSEARCH['lastname'] . ', ' . $resultforSEARCH['firstname'] . ' ' . $resultforSEARCH['middlename'] ?>"
      style="text-transform:capitalize; font-size: 1.3rem;" required>
  </div>

  <div class="col-md-6 col-sm-12 p-2">
    <select type="text" class="form-select form-select-lg" name="personnel" id="personnel">
      <option value="" selected="selected" disabled="disabled">Select personnel</option>
      <option value="Student">Student</option>
      <option value="Faculty">Faculty</option>
      <option value="Non Teaching Staff">Non Teaching Staff</option>
    </select>
  </div>



  <div class="col-md-6 col-sm-12 p-2">
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

  <div class="col-md-6 col-sm-12 p-2">
    <input type="number" min="1" class="form-control form-control-lg" name="prod_quantity" id="prod_quantity"
      placeholder="Quantity" style="text-transform:capitalize;" required>
  </div>


  <div class="col-md-6 col-sm-12 p-2">
    <div class="form-group">
      <textarea class="form-control" name="aid" id="aid" rows="3"
        style="resize: none; height: 100px; font-size: 1.3rem;" placeholder="Description"></textarea>
    </div>
  </div>

  <div class="col-md-6 col-sm-12 p-2">
    <div class="form-group">
      <textarea class="form-control" name="aid" id="aid" rows="3"
        style="resize: none; height: 100px; font-size: 1.3rem;" placeholder="Description"></textarea>
    </div>
  </div>

</div>
<div class="text-center">
  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="reset" class="btn btn-secondary">Reset</button>
</div>
<?php } else if (!$resultforSEARCH) {
  $resultforSEARCH2 = $db->query('SELECT * FROM teacher_information WHERE id_number = ?', $_GET['id_number'])->fetchArray();
  if ($resultforSEARCH2) {
  ?>

<div class="row p-2">
  <div class="col-md-6 col-sm-12 p-2">
    <input type="text" class="form-control form-control-lg text-primary" disabled name="fullname" id="fullname"
      value="<?php echo $resultforSEARCH2['lastname'] . ', ' . $resultforSEARCH2['firstname'] . ' ' . $resultforSEARCH2['middlename'] ?>"
      style="text-transform:capitalize; font-size: 1.3rem;" required>
  </div>

  <div class="col-md-6 col-sm-12 p-2">
    <select type="text" class="form-select form-select-lg" name="personnel" id="personnel">
      <option value="" selected="selected" disabled="disabled">Select personnel</option>
      <option value="Student">Student</option>
      <option value="Faculty">Faculty</option>
      <option value="Non Teaching Staff">Non Teaching Staff</option>
    </select>
  </div>



  <div class="col-md-6 col-sm-12 p-2">
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

  <div class="col-md-6 col-sm-12 p-2">
    <input type="number" min="1" class="form-control form-control-lg" name="prod_quantity" id="prod_quantity"
      placeholder="Quantity" style="text-transform:capitalize;" required>
  </div>


  <div class="col-md-6 col-sm-12 p-2">
    <div class="form-group">
      <textarea class="form-control" name="aid" id="aid" rows="3"
        style="resize: none; height: 100px; font-size: 1.3rem;" placeholder="Description"></textarea>
    </div>
  </div>

  <div class="col-md-6 col-sm-12 p-2">
    <div class="form-group">
      <textarea class="form-control" name="aid" id="aid" rows="3"
        style="resize: none; height: 100px; font-size: 1.3rem;" placeholder="Description"></textarea>
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