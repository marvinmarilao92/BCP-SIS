<?php
require_once "../security/newsource.php";
$resultforSEARCH = $db->query('SELECT * FROM student_information WHERE id_number = ?', $_GET['id_number'])->fetchArray();

if ($resultforSEARCH) {  ?>
<div class="row p-2">


  <div class="col-md-6 col-sm-12 p-2">
    <small>Full Name</small>
    <input type="text" class="form-control " disabled name="fullname" id="fullname"
      value="<?php echo $resultforSEARCH['lastname'] . ', ' . $resultforSEARCH['firstname'] . ' ' . $resultforSEARCH['middlename'] ?>"
      required>
  </div>

  <div class="col-md-6 col-sm-12 p-2">
    <small>Department</small>
    <input type="text" class="form-control " disabled name="BCPROLE" id="role" value="Student" required>
  </div>


  <div class="col-md-6 col-sm-12 p-2">
    <small>Contact</small>
    <input type="text" class="form-control " disabled name="contact" id="contact"
      value="<?php echo $resultforSEARCH['contact'] ?>" required>
  </div>

  <div class="col-md-6 col-sm-12 p-2">
    <small>address</small>
    <input type="text" class="form-control " disabled name="address" id="address"
      value="<?php echo $resultforSEARCH['address'] ?>" required>
  </div>

  <div class="col-md-6 col-sm-12 p-2">
    <small>Course</small>
    <input type="text" class="form-control " disabled name="course" id="course"
      value="<?php echo $resultforSEARCH['course'] ?>" required>
  </div>

  <div class="col-md-6 col-sm-12 p-2">
    <small>Year Level</small>
    <input type="text" class="form-control " disabled name="year_level" id="year_level"
      value="<?php echo $resultforSEARCH['year_level'] ?>" required>
  </div>

  <div class="col-md-6 col-sm-12 p-2">
    <small>Section</small>
    <input type="text" class="form-control " disabled name="section" id="section"
      value="<?php echo $resultforSEARCH['section'] ?>" required>
  </div>

  <div class="col-md-6 col-sm-12 p-2">
    <small>Temperature</small>
    <input type="number" class="form-control " name="temperature" id="temperature" min="" max="100"
      placeholder="Insert Temperature" required>
  </div>

</div>



<?php } else { ?>
<div class="col p-2 mt-2">
  <div class="alert alert-danger">No records Found</div>
</div>
<?php } ?>