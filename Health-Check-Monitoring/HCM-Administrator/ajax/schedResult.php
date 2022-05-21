<?php
require_once "../security/newsource.php";
require_once "../timezone.php";
$new_date = date('Y-m-d', strtotime($time));
$query = $db->query('SELECT * FROM hcms_checkup WHERE nxt_sched =?', $new_date)->fetchAll();
if ($query > 0) { ?>

<div class="row p-4">
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Full Name</th>
        <th>Check Up</th>
        <th class="text-center">Recent Checkup
        </th>
      </tr>
    </thead>
    <?php foreach ($query as $data) {
        $newdate = date("F j, Y", strtotime($data['created_at'])); ?>
    <tbody>
      <tr>
        <td><?php echo $data['fullname']; ?></td>
        <?php if ($data['remarks'] == "Good") { ?>
        <td class="bg-primary text-white"><?php echo $data['checkup_type']; ?></td>
        <?php } else if ($data['remarks'] == "Bad") { ?>
        <td class="bg-primary text-white"><?php echo $data['checkup_type']; ?></td>
        <?php } ?>
        <td class="text-center"><?php echo $newdate ?></td>
      </tr>

    </tbody>
  </table>
</div>
<?php }
    } else { ?>
<div class="alert alert-danger">
  No records Found
</div>

<?php } ?>