<?php require_once "../../includes/session.php";
require_once "timezone.php";
$datenow = date("F j, Y", strtotime($time));
$id_number = $_GET['id_number'];
if ($id_number == $verified_session_username) {
  $ref_no = $_GET['ref_no'];
  $sql2 = "SELECT * FROM ims_dummy_cashier_transc WHERE s_id = '$id_number' AND py_ref_no = '$ref_no' AND p_desc = 'AME'";
  $msql2 = mysqli_query($link, $sql2);
  $Result = mysqli_fetch_assoc($msql2);
  if ($Result > 0) { ?>
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="container card border border-dark">
      <div class="row pt-3">
        <div class="col-lg-3 col-md-2 col-sm-2">
          <img src="stub/BCPlogo.png" alt="" width="100%" height="90%">
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 text-center">
          <h4> <strong>Beslink College of the Philippines</strong><br> 1071 Barangay Kaligayahan Quirino Highway,
            Novaliches
            Quezon City</h4>
        </div>
      </div>
      <div class="row pt-3">
        <div class="col-lg-6 col-md-12 col-sm-12">
          <h5 for="">Name :
            <u><?php echo $verified_session_lastname . ', ' . $verified_session_firstname . ' ' . $verified_session_middlename; ?></u>
          </h5>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
          <h5 for="">Date :
            <u><?php echo $datenow ?></u>
          </h5>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
          <h5 for="">Department :
            <?php echo $verified_session_course; ?>
          </h5>
        </div>
      </div>
      <div class="row pt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Process</th>
                <th width="30%">Date</th>
                <th width="40%">Remarks</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="height:10vh">Urinalysis</td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td style="height:10vh">CBC</td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td style="height:10vh">Chest X-ray</td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  } else {
    echo '<div class= "alert alert-danger">No Transaction Found</div>';
  }
} else {
  echo '<div class= "alert alert-danger">Error Username</div>';
} ?>