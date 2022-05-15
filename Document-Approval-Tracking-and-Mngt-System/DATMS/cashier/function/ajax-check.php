<?php
require_once "../session.php";

$result = "SELECT * FROM student_information WHERE id_number = {$_GET['checkNum']}";
$query_result = mysqli_query($link, $result);
if (mysqli_num_rows($query_result) > 0) {
  foreach ($query_result as $data) ?>
<div class="row">
  <div class="col">
    <input type="text" class="form-control" value="<?php echo $data['id_number'] ?>" disabled>
    <small>ID Number</small>
  </div>
  <div class="col">
    <input type="text" class="form-control"
      value="<?php echo $data['lastname'] . ', ' . $data['firstname'] . ' ' . $data['middlename'] ?>" disabled>
    <small>Full Name</small>
  </div>
</div>
<?php } else { ?>
<div class="col">
  <div class="alert alert-danger">Not Enrolled</div>
</div>
<?php } ?>