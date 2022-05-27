<?php require_once "timezone.php";
require_once "Config.php";
$editID = $_GET['id'];

$mResult = $db->query('SELECT * FROM ms_labtest WHERE id=?', $editID)->fetchArray();

?>
<input type="hidden" id="editID" value="<?php echo $mResult['id'] ?>">
<?php if ($mResult['urin'] == 1) { ?>
<div class="row p-4">
  <div class="col">
    <div class="form-check">
      <input class="form-check-input" id="urin" type="checkbox" checked>
      <label class="form-check-label" for="urin">
        Urinalysis
      </label>
    </div>
    <?php } else { ?>
    <div class="row p-4">
      <div class="col">
        <div class="form-check">
          <input class="form-check-input" id="urin" type="checkbox">
          <label class="form-check-label" for="urin">
            Urinalysis
          </label>
        </div>
        <?php }
      if ($mResult['cbc'] == 1) { ?>
        <div class="form-check">
          <input class="form-check-input" id="cbc" type="checkbox" checked>
          <label class="form-check-label" for="cbc">
            CBC
          </label>
        </div>
        <?php } else { ?>
        <div class="form-check">
          <input class="form-check-input" id="cbc" type="checkbox">
          <label class="form-check-label" for="cbc">
            CBC
          </label>
        </div>
        <?php }
      if ($mResult['c_xray'] == 1) { ?>
        <div class="form-check">
          <input class="form-check-input" id="c_xray" type="checkbox" checked>
          <label class="form-check-label" for="c_xray">
            Chest X-ray
          </label>
        </div>
        <?php } else { ?>
        <div class="form-check">
          <input class="form-check-input" id="c_xray" type="checkbox">
          <label class="form-check-label" for="c_xray">
            Chest X-ray
          </label>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>