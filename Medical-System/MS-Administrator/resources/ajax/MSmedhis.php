<?php require_once "../../security/newsource.php";
require_once "timezone.php";

$medid = $_GET['medid'];
$labtest = $db->query('SELECT * FROM `ms_labtest` WHERE id_number = ?', $medid)->fetchArray();
$checkups = $db->query('SELECT * FROM `hcms_checkup` WHERE id_number = ?', $medid)->fetchAll();
$labtest2 = $db->query('SELECT * FROM `ms_labtest` WHERE id_number = ?', $medid)->fetchAll();
$recommendation = $db->query('SELECT * FROM `ms_recommendation` WHERE id_number = ?', $medid)->fetchArray();
$recommendation2 = $db->query('SELECT * FROM `ms_recommendation` WHERE id_number = ?', $medid)->fetchAll();
$medhis = $db->query('SELECT * FROM `ms_medhis` WHERE id_number = ?', $medid)->fetchArray();
$medhis2 = $db->query('SELECT * FROM `ms_medhis` WHERE id_number = ?', $medid)->fetchAll();

echo '<div class= "container">
        <div class="row"><h5 class="pt-5 ">Annual Medical Examination</h5>';

if (isset($labtest['created_at'])) {

  echo '
        <div class="row">
          <div class="col-lg-4 col-md-12 col-sm-12">
            <input type="text" class="form-control" id="fullname" value="' . $labtest['full_n'] . '" disabled>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12">
            <input type="text" class="form-control" id="course" value="' . $labtest['course'] . '" disabled>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12">
            <input type="text" class="form-control" id="yr_lvl" value="' . $labtest['yr_lvl'] . '" disabled>
          </div>
        </div>';

  $newyear = date("Y", strtotime($labtest['created_at']));
  echo '<div class="row pt-3">
          <table class= "table table-bordered table-hover">
          <thead>
            <tr>
            <th>Full Name</th>
            <th>Labtest Result</th>
            <th>School Year</th>
            <tr>
          </thead>';

  foreach ($labtest2 as $datalabtest) {
    echo '
          <tbody>
            <tr>
            <td>' . $datalabtest['full_n'] . '</td>';

    if (!is_null($datalabtest['file_name2'])) {
      echo '  <td>' . $datalabtest['file_name2'] . '</td>';
    } else {
      echo '  <td><i>None</i></td>';
    }
    echo '<td>' . $newyear . '</td>
            <tr>
          </tbody>';
  }
  echo '</table>
      </div><hr class="mt-5">';
} else {
  echo '
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">No Results Found</h4>
  </div>';
}

echo '<h5 class="pt-5 ">Check Ups</h5>';
if (isset($checkups['created_at'])) {
  foreach ($checkups as $datacheckups) {

    echo '  <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        ' . $newyear . '
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class.</div>
    </div>
  </div>
</div>
';
  }
} else {
  echo '
  <div class="alert alert-danger" role="alert">
    <small class="alert-heading">No Results Found</small>
  </div>';
}

echo '<h5 class="pt-5 ">Recommendation</h5>';

if (isset($recommendation['created_at'])) {

  $newyear = date("Y", strtotime($recommendation['created_at']));
  echo '<div class="row pt-3">
    <table class= "table table-bordered table-hover">
    <thead>
      <tr class="text-center">
      <th>School Year</th>
      <th>Recommendation Letter</th>
      <tr>
    </thead>';

  foreach ($recommendation2 as $datarecommendation) {
    echo '
    <tbody>
      <tr class="text-center">
      <td>' . $newyear . '</td>';

    if (!is_null($datarecommendation['file_name'])) {
      echo '  <td width="50%"><a href="../assets/recommendation/' . $datarecommendation['file_name'] . '">View</a></td>';
    } else {
      echo '  <td width="50%"><i>None</i></td>';
    }
    echo '
      <tr>
    </tbody>';
  }
  echo '</table>
</div>
<hr class="mt-5">';
} else {
  echo '
<div class="alert alert-danger" role="alert">
<h4 class="alert-heading">No Results Found</h4>
</div>';
}

echo '<h5 class="pt-5 ">Medical History</h5>';

if (isset($medhis['create_at'])) {

  $newyear = date("Y", strtotime($medhis['create_at']));
  echo '<div class="row pt-3">
    <table class= "table table-bordered table-hover">
    <thead>
      <tr class="text-center">
      <th>School Year</th>
      <th>Medical History</th>
      <tr>
    </thead>';

  foreach ($medhis2 as $datamedhis) {
    echo '
    <tbody>
      <tr class="text-center">
      <td width="50%">' . $newyear . '</td>';

    if (!is_null($datamedhis['file_name'])) {
      echo '  <td width="50%"><a href="../assets/medhis/' . $datamedhis['file_name'] . '">View</a></td>';
    } else {
      echo '  <td width="50%"><i>None</i></td>';
    }
    echo '
      <tr>
    </tbody>';
  }
  echo '</table>
</div>
<hr class="mt-5">';
} else {
  echo '
<div class="alert alert-danger" role="alert">
<h4 class="alert-heading">No Results Found</h4>
</div>';
}

echo '</div>
      <div class="row">
        <div class="col text-end">
          <input type="hidden" id="newID" value="' . $medid . '">'; ?>

<button class="btn btn-primary" onclick="RecomModal('showRecom');">Recommendation</button>
<button class="btn btn-primary" onclick="MedhisModal('showMedhis');">Medical History</button>

<?php
echo '
        </div>
      </div>
    </div>';