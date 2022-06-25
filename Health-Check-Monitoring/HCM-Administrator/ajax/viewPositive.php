<?php
require_once "../security/newsource.php";
require_once "timezone.php";

$sql2 = $db->query("SELECT hcms_ctracing.*, hcms_profile.cont_name FROM hcms_ctracing LEFT JOIN hcms_profile ON hcms_ctracing.qrcode = hcms_profile.qr_code")->fetchAll();
echo ' <table class= "table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Temperature</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
    </thead>';
foreach ($sql2 as $data) {
  if ($data['status'] == "Not Normal") {
    $newdate = date("F j, Y", strtotime($data['created_at']));
    $fordateCheck = date("Y-m-d", strtotime($data['created_at'])); ?>
<tbody>
  <tr>
    <td><?php echo $data['cont_name'] ?></td>
    <td><?php echo $data['temperature'] ?></td>
    <td><?php echo $newdate ?></td>
    <td>
      <a href="#" class="btn btn-warning" id="newID"
        onclick="viewposDetails('<?php echo $data['qrcode']; ?>', 'Pdetails', '<?php echo $fordateCheck ?>');">View</a>
    </td>
  </tr>
</tbody>
<?php
  }
}
echo ' </table>';