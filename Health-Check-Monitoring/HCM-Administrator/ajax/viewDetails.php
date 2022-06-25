<?php
require_once "../security/newsource.php";
require_once "timezone.php";
$newDate = date("F j, Y", strtotime($_GET['date']));
$sql1 = $db->query("SELECT * FROM hcms_profile WHERE qr_code = ?", $_GET['qrID'])->fetchArray();
if (isset($sql1['qr_code'])) {

  echo '<div class="container">
          <div class="row">
            <div class="col-xxl-6 col-md-12 col-sm-12">
              <input type="text" class= "text-center form-control mt-3" value ="' . $sql1['cont_name'] . '"disabled>
              <div class="text-center mt-1"><small><strong>Full Name</strong></small></div>
            </div>
            <div class="col-xxl-6 col-md-12 col-sm-12">
              <input type="text" class= "form-control text-center mt-3" value = "' . $newDate . '"disabled>
              <input type="hidden" id="checkDate" value = "' . $_GET['date'] . '">
              <div class="text-center mt-1"><small><strong>Date</strong></small></div>
            </div>
            <div class="col-xxl-12 col-md-12 col-sm-12">
            <input type="text" class= "form-control text-center mt-3" id="checkAddress" value = "' . $sql1['cont_address'] . '"disabled>
            <div class="text-center mt-1"><small><strong>Address</strong></small></div>
            </div>
            <div class="col-xxl-3 col-md-12 col-sm-12">
              <input type="text" class= "form-control text-center mt-3" id="checkContact" value = "' . $sql1['cont_contact'] . '"disabled>
              <div class="text-center mt-1"><small><strong>Contact No</strong></small></div>
            </div>
            <div class="col-xxl-9 col-md-12 col-sm-12">
              <input type="text" class= "form-control text-center mt-3" id="checkEmail" value = "' . $sql1['cont_email'] . '"disabled>
              <div class="text-center mt-1"><small><strong>Email</strong></small></div>
            </div>
          </div>
        </div>';
} else {
  echo '<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading"></h4>
    <p>No Records Found</p>
    <p class="mb-0"></p>
  </div>';
}