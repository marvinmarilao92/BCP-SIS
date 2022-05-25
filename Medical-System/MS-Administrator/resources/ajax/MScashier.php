<?php

require_once '../../security/newsource.php';
require_once 'timezone.php';
$search = $_GET['searchID'];
$ifPaid = $db->query('SELECT * FROM `ims_dummy_cashier_transc` WHERE s_id = ? AND p_desc =?', $_GET['searchID'], "AME")->fetchArray();
if (isset($ifPaid['py_ref_no'])) {

  $idnum = $ifPaid['s_id'];
  $pay_date = $ifPaid['p_date'];
  $newdate = date("F j, Y", strtotime($pay_date));

  $sqlResult =  $db->query('SELECT * FROM `student_information` WHERE id_number = ?', $idnum)->fetchArray();

  $fullname = $sqlResult['lastname'] . ', ' . $sqlResult['firstname'] . ' ' . $sqlResult['middlename'];
  $course = $sqlResult['course'];
  $yr_lvl = $sqlResult['year_level'];
  $sy = $sqlResult['school_year'];
  $section = $sqlResult['section'];

  $ifValidated = $db->query('SELECT * FROM ms_labtest WHERE id_number = ? AND course = ?', $idnum, $course)->fetchArray();
  if ($ifValidated) { ?>

<input type="hidden" name="status" id="status" value="Yval">
<?php } else { ?>
<input type="hidden" name="status" id="status" value="Nval">
<?php
  }
  $MSschedule = $db->query('SELECT * FROM ms_schedule WHERE course = ? AND yr_lvl = ?', $course, $yr_lvl)->fetchArray();

  if (isset($MSschedule['created_at'])) {
    $to = date('Y-m-d H:i:s', strtotime($MSschedule['sched_to']));
    $from = date('Y-m-d H:i:s', strtotime($MSschedule['sched_from']));
    $newDatefrom = date('F j, Y g:i a', strtotime($MSschedule['sched_from']));
    $newDateto = date('F j, Y g:i a', strtotime($MSschedule['sched_to']));
    if ($yr_lvl == $MSschedule['yr_lvl']) {
      if ($time <= $to && $time >= $from) { ?>

<input type="hidden" name="power" id="power" value="able">
<?php } else { ?>
<input type="hidden" name="power" id="power" value="unable">
<?php }
    } else { ?>
<input type="hidden" name="power" id="power" value="unable">
<?php } ?>
<!-- cashier -->
<input type="hidden" name="pay_date" id="pay_date" value="<?php echo $pay_date; ?>">
<!-- S.I -->
<input type="hidden" name="id_number" id="id_number" value="<?php echo $idnum; ?>">
<input type="hidden" name="name" id="name" value="<?php echo $fullname; ?>">
<input type="hidden" name="course" id="course" value="<?php echo $course; ?>">
<input type="hidden" name="yr_lvl" id="yr_lvl" value="<?php echo $yr_lvl; ?>">
<input type="hidden" name="sy" id="sy" value="<?php echo $sy; ?>">
<input type="hidden" name="section" id="section" value="<?php echo $section; ?>">
<form action="" method="POST">
  <div class="container">
    <div class="row  border border-info p-4">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="row">
          <div class="col-12">
            <div class="card-title">Schedule Information</div>
            <label for="" class="p-2">Schedule Start : </label>
            <input type="text" class="form-control " value="<?php echo $newDatefrom ?>" disabled>
            <label for="" class="p-2">Schedule end : </label>
            <input type="text" class="form-control " value="<?php echo $newDateto ?>" disabled>
          </div>
        </div>
        <div class="row p-4">
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" id="urin" type="checkbox" value="">
              <label class="form-check-label" for="urin">
                Urinalysis
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" id="cbc" type="checkbox" value="">
              <label class="form-check-label" for="cbc">
                CBC
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" id="c_xray" type="checkbox" value="">
              <label class="form-check-label" for="c_xray">
                Chest X-ray
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12 border p-4">
        <div class="row">
          <div class="col-12">
            <div class="card-title">Student Information</div>
            <label for="" class="p-2">Name : </label>
            <input type="text" class="form-control " value="<?php echo $fullname ?>" disabled>
            <label for="" class="p-2">ID Number : </label>
            <input type="text" class="form-control " value="<?php echo $idnum ?>" disabled>
            <label for="" class="p-2">Department</label>
            <input type="text" class="form-control " value="<?php echo $course ?>" disabled>
            <label for="" class="p-2">Year Level</label>
            <input type="text" class="form-control " value="<?php echo $yr_lvl ?>" disabled>
          </div>
        </div>
      </div>
    </div>

    <?php } else { ?>
    <div class="col">
      <input type="hidden" name="power" id="power" value="unable">
      <div class="alert alert-danger">No Schedule yet.</div>
    </div>
  </div>
  </div>
</form>

<?php }
  } else { ?>
<div class="row p-4">
  <div class="alert alert-danger">No Records Found</div>
</div>
<?php }