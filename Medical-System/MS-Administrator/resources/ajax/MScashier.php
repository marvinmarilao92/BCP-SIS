<?php

require_once '../../security/newsource.php';

$search = $_GET['searchID'];
$result = $db->query('SELECT * FROM ms_cashier WHERE id_number = ?', $_GET['searchID'])->fetchArray();
if (isset($result['id_number'])) {  ?>
<form action="" method="POST">
  <div class="card p-4">
    <div class"card-body">
      <div class="row">
        <div class="col p-2">
          <input type="hidden" name="id_number" id="id_number" value="<?php echo $result['id_number']; ?>">
          <h3><?php echo $result['id_number']; ?>
          </h3>
        </div>
        <div class="col p-2">
          <input type="hidden" name="course" id="course" value="<?php echo $result['course']; ?>">
          <h3 class="text-end text-danger"><?php echo $result['course']; ?>
          </h3>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col p-2">
          <input type="hidden" name="name" id="name" value="<?php echo $result['name']; ?>">
          <h3><?php echo $result['name']; ?>
          </h3>
        </div>
        <?php require_once 'timezone.php';
          $ifValidated = $db->query('SELECT * FROM ms_valid WHERE id_number = ? AND course = ?', $result['id_number'], $result['course'])->fetchArray();
          if ($ifValidated) { ?>
        <input type="hidden" name="status" id="status" value="Yval">
        <?php } else { ?>
        <input type="hidden" name="status" id="status" value="Nval">
        <?php
          }

          $result2 = $db->query('SELECT * FROM ms_schedule WHERE course = ? AND yr_lvl = ?', $result['course'], $result['year'])->fetchArray();
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
          <input type="hidden" name="pay_date" id="pay_date" value="<?php echo $result['create_at']; ?>">
        </div>
        <div class="col">
          <p class="text-end">From : <?php echo $newDatefrom; ?>
          </p>
          <p class="text-end">To : <?php echo $newDateto; ?>
          </p>
        </div>
        <?php } else { ?>
        <div class="col">
          <input type="hidden" name="pay_date" id="pay_date" value="<?php echo $result['create_at']; ?>">
          <input type="hidden" name="power" id="power" value="unable">
          <div class="alert alert-danger">No Schedule yet.</div>
        </div>
      </div>
    </div>
  </div>
</form>

<?php
          }
        } else { ?>
<div class="row p-4">
  <div class="alert alert-danger">No Records Found</div>
</div>
<?php }