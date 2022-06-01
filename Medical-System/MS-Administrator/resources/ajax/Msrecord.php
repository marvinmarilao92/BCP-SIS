<?php

  require_once '../../security/newsource.php';

    $quickSearch = $_GET['quickSearch'];
    $result = $db->query('SELECT * FROM ms_cashier WHERE id_number = ?', $_GET['quickSearch'])->fetchArray();
    $instantCall = $db->query('SELECT * FROM ms_valid WHERE id_number = ?', $_GET['quickSearch'])->fetchArray();
    if ($instantCall) {
        $call = true;
    } else {
        $call = false;
    }
    if (isset($result['id_number'])) {
        $viewDATE = date('F j, Y g:i a', strtotime($result['create_at'])); ?>
<div class="container">
  <form action="" method="POST">
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
        $result2 = $db->query('SELECT * FROM ms_schedule WHERE course = ? AND yr_lvl = ?', $result['course'], $result['year'])->fetchArray();
        if (!$result2) { ?>
      <div class="col">
        <div class="alert alert-danger">No Schedule yet.</div>
      </div>

      <?php } else { ?>
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
        <input type="hidden" name="date" id="date" value="<?php $result['create_at']; ?>">
        <h3 class="text-end"><?php echo $viewDATE; ?>
      </div>
      <div class="row">
        <div class="col">
          <p class="text-end">From : <?php echo $newDatefrom; ?>
          </p>
          <p class="text-end">To : <?php echo $newDateto; ?>
          </p>
        </div>
      </div>
    </div>
    <?php } ?>
    <div class="row p-4">
      <div class="col text-center">
        <?php if (true == $call) { ?>
        <input type="hidden" id="validatetime" value="<?php echo $instantCall['created_at']; ?>">
        <h3><strong>VALIDATED</strong>&nbsp<i class="bi bi-check"></i></h3>
        <?php } elseif (false == $call) { ?><span>
          <h3><strong>NOT YET VALIDATED</strong>&nbsp<i class="bi bi-x"></i></h3>
          <small> Please be sure to follow the procedure and step by step process to Monitor
            properly</small>
          <?php } ?>
      </div>
    </div>
  </form>
</div>
<?php
    } else { ?>
<div class="row p-4">
  <div class="alert alert-danger">No Records Found</div>
</div>
<?php }