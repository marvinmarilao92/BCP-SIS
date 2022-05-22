<?php

require_once '../../security/newsource.php';

$search = $_GET['searchID'];
$result = $db->query('SELECT * FROM `ims_dummy_cashier_transc` WHERE py_ref_no = ? AND p_desc =?', $_GET['searchID'], "AME")->fetchArray();
if (isset($result['s_id'])) {
  $idnum = $result['s_id'];
  $pay_date = $result['p_date'];
  $newdate = date("F j, Y", strtotime($pay_date));

  $sqlResult =  $db->query('SELECT * FROM `student_information` WHERE id_number = ?', $idnum)->fetchArray();

  if ($sqlResult > 0) {
    $fullname = $sqlResult['lastname'] . ',&nbsp' . $sqlResult['firstname'] . '&nbsp' . $sqlResult['middlename'];
    $course = $sqlResult['course'];
    $yr_lvl = $sqlResult['year_level'];
    $sy = $sqlResult['school_year']; ?>

<form action="" method="POST">
  <div class="card p-4">
    <div class="card-body">
      <div class="row">
        <div class="col">
          <input type="hidden" name="id_number" id="id_number" value="<?php echo $idnum; ?>">
          <input type="hidden" name="pay_date" id="pay_date" value="<?php echo $newdate ?>">
          <h3 class="text-danger"><?php echo $newdate ?>
          </h3>
        </div>
        <div class="col">
          <input type="hidden" name="course" id="course" value="<?php echo $course; ?>">
          <h3 class="text-end text-danger"><?php echo $course; ?>
          </h3>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col p-2">
          <input type="hidden" name="name" id="name" value="<?php echo $fullname; ?>">
          <h3>
            <?php echo $fullname; ?>
          </h3>
        </div>
        <?php require_once 'timezone.php';
            $ifValidated = $db->query('SELECT * FROM ms_valid WHERE id_number = ? AND course = ?', $idnum, $course)->fetchArray();
            if ($ifValidated) { ?>

        <input type="hidden" name="status" id="status" value="Yval">
        <?php } else { ?>
        <input type="hidden" name="status" id="status" value="Nval">
        <?php
            }
            $result2 = $db->query('SELECT * FROM ms_schedule WHERE course = ? AND `yr_lvl` =?', $course, $yr_lvl)->fetchArray();

            if ($result2) { ?>

        <div class="col">
          <?php
                $to = date('Y-m-d H:i:s', strtotime($result2['sched_to']));
                $from = date('Y-m-d H:i:s', strtotime($result2['sched_from']));
                $newDatefrom = date('F j, Y g:i a', strtotime($result2['sched_from']));
                $newDateto = date('F j, Y g:i a', strtotime($result2['sched_to']));

                if ($result['year'] == $result2['yr_lvl']) {
                  if ($time <= $to && $time >= $from) { ?>

          <input type="hidden" name="power" id="power" value="able">
          <?php } else { ?>
          <input type="hidden" name="power" id="power" value="unable">
          <?php }
                } else { ?>
          <input type="hidden" name="power" id="power" value="unable">
          <?php } ?>
          <input type="hidden" name="pay_date" id="pay_date" value="<?php echo $pay_date; ?>">
        </div>
        <div class="col">
          <p class="text-end">From : <?php echo $newDatefrom; ?>
          </p>
          <p class="text-end">To : <?php echo $newDateto; ?>
          </p>
        </div>

        <?php } else { ?>
        <div class="col">
          <input type="hidden" name="pay_date" id="pay_date" value="<?php echo $pay_date; ?>">
          <input type="hidden" name="power" id="power" value="unable">
          <div class="alert alert-danger">No Schedule yet.</div>
        </div>
      </div>
    </div>
  </div>
</form>

<?php }
          } else {
            echo '<div class="row p-4">
            <div class="alert alert-danger">Error Occur</div>
          </div>';
          }
        } else { ?>
<div class="row p-4">
  <div class="alert alert-danger">No Records Found</div>
</div>
<?php }