<?php require_once "timezone.php";
require_once "Config.php";
$manageID = $_GET['id'];

$mResult = $db->query('SELECT * FROM ms_labtest WHERE id=?', $manageID)->fetchArray();
$newpaidDate = date("F j, Y, g:i a", strtotime($mResult['date_paid']));
$newDate = date("F j, Y, g:i a", strtotime($mResult['created_at']));
?>
<div class="row p-4">
  <input type="hidden" name="id" id="id" value="<?php echo $mResult['id']; ?>">
  <div class="col-lg-6 col-md-12 col-sm-12">
    <div class="row">
      <div class="col-12">
        <div class="card-title">Schedule Information</div>
        <label for="" class="p-2">Payment Date : </label>
        <input type="text" class="form-control " value="<?php echo $newpaidDate ?>" disabled>
        <label for="" class="p-2">Completion Date : </label>
        <input type="text" class="form-control " value="<?php echo $newDate ?>" disabled>
      </div>
    </div>
    <?php if ($mResult['urin'] == 1) { ?>
    <div class="row p-4">
      <div class="col">
        <div class="form-check">
          <input class="form-check-input" id="urin" type="checkbox" checked disabled>
          <label class="form-check-label" for="urin">
            Urinalysis
          </label>
        </div>
        <?php } else { ?>
        <div class="row p-4">
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" id="urin" type="checkbox" disabled>
              <label class="form-check-label" for="urin">
                Urinalysis
              </label>
            </div>
            <?php }
          if ($mResult['cbc'] == 1) { ?>
            <div class="form-check">
              <input class="form-check-input" id="cbc" type="checkbox" checked disabled>
              <label class="form-check-label" for="cbc">
                CBC
              </label>
            </div>
            <?php } else { ?>
            <div class="form-check">
              <input class="form-check-input" id="cbc" type="checkbox" disabled>
              <label class="form-check-label" for="cbc">
                CBC
              </label>
            </div>
            <?php }
          if ($mResult['c_xray'] == 1) { ?>
            <div class="form-check">
              <input class="form-check-input" id="c_xray" type="checkbox" checked disabled>
              <label class="form-check-label" for="c_xray">
                Chest X-ray
              </label>
            </div>
            <?php } else { ?>
            <div class="form-check">
              <input class="form-check-input" id="c_xray" type="checkbox" disabled>
              <label class="form-check-label" for="c_xray">
                Chest X-ray
              </label>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12 border p-4">
        <div class="row">
          <div class="col-12">
            <div class="card-title">Student Information</div>
            <label for="" class="p-2">Name : </label>
            <input type="text" class="form-control " value="<?php echo $mResult['full_n'] ?>" disabled>
            <label for="" class="p-2">ID Number : </label>
            <input type="text" class="form-control " value="<?php echo $mResult['id_number']  ?>" disabled>
            <label for="" class="p-2">Department</label>
            <input type="text" class="form-control " value="<?php echo $mResult['course'] ?>" disabled>
            <label for="" class="p-2">Year Level</label>
            <input type="text" class="form-control " value="<?php echo $mResult['yr_lvl'] ?>" disabled>
          </div>
        </div>