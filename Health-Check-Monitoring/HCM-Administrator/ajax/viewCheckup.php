<?php
require_once "../timezone.php";
require_once "../security/newsource.php";

$sql = $db->query('SELECT * FROM hcms_checkup WHERE id =?', $_GET['viewID'])->fetchArray();

echo '<div class="row">
        <label>Full Name : <label>
        <p>' . $sql["fullname"] . '</p>
      </div><hr>
      <h5>Check up Information</h5>
      <div class="row mt-3">
        <label>Brand Name : <label>
        <div class="input-group">
          <input type="text" class= "form-control" value ="' . $sql["bn"] . '" disabled> 
          <span class="input-group-text" id="basic-addon1">' . $sql['mg'] . 'mg</span>
        </div>
      </div>
      <div class="row p-2">
        <label>Prescription <label>
      </div>
      <div class="row p-2">
        <textarea rows="4" cols="50" class= "form-control" readonly style="resize:none;">' . $sql["prescription"] . '</textarea>
      </div>
      <div class="row p-2">
        <label>Description <label>
      </div>
      <div class="row p-2">
        <textarea rows="4" cols="50" class= "form-control" readonly style="resize:none;">' . $sql["description"] . '</textarea>
      </div>
      <div class="row mt-3">
        <div class="col">
          <div class= "float-end"><p>Consultant : ' . $sql["cons_name"] . '</p>
          <div>
        </div>
      </div>';