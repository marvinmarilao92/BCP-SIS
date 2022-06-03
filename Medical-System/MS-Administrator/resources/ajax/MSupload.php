<?php require_once "../../security/newsource.php";
require_once "timezone.php";

$recomID = $_GET['recomID'];

echo '<div class="row ">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
          <h5 class="mt-3">Recommendation Letter Template</h5><a href ="../assets/recommendation/template.pdf" class="btn btn-primary" download><i class="bi bi-download"></i>&nbspDownload</a>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
          <h5 class="mt-3">Upload Recommendation Letter</h5><label for="file1">
          <a class="btn btn-success "><i class="bi bi-upload"></i>&nbspUpload</a></label>'; ?>
<input type="hidden" name="id" id="id" value="<?php echo $recomID ?>">
<input type="file" id="file1" name="file1" style="display:none;" onchange="checkFile('errorIcon')">
<div id="errorIcon">
  <div>
    <?php
    echo '</div>
      </div>';