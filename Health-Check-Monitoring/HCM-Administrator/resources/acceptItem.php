<?php
require_once "../security/newsource.php";
require_once "../timezone.php";



if (isset($_GET['idAccept'])) {
  $idAccept = $_GET['idAccept'];
  $accby = $verified_session_lastname . ', ' . $verified_session_firstname . ' ' . $verified_session_middlename;
  $status = "Accepted";

  $newStocks = $db->query('SELECT * FROM hcms_items_transac WHERE prod_id = ?', $idAccept)->fetchArray();

  $checkprod_code = $newStocks['prod_code'];
  $checkprod_brand_name = $newStocks['brand_name'];
  $checkprod_gen_name = $newStocks['gen_name'];
  $checkprod_dosage = $newStocks['dosage'];
  $checkprod_quantity = $newStocks['quantity'];

  $checkStock = $db->query('SELECT * FROM hcms_stock WHERE prod_code = ? AND brand_name = ? AND dosage= ?', $checkprod_code, $checkprod_brand_name, $checkprod_dosage)->fetchArray();
  if (isset($checkStock['prod_code'])) {
    $imp_prod_code = $checkStock['prod_code'];
    $addAvailable = $checkStock['available'];
    $addNewStock = $checkprod_quantity;

    $addedValue = $addAvailable + $addNewStock;

    $updatedStock = $udpatePro = $db->query("UPDATE hcms_stock SET available =? WHERE prod_code = '$imp_prod_code'", $addedValue);
    if ($updatedStock->affectedRows()) {
      $udpate = $db->query("UPDATE hcms_items_transac SET accepted_date =?, acc_dec_by =?, `status`=? WHERE prod_id = '$idAccept'", $time, $accby,  $status);
      $_SESSION['alertsuccess'] = "Item Accepted";
      header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
      $_SESSION['alertsuccess'] = "Item Accepted";
      // header("Location: " . $_SERVER['HTTP_REFERER']);
    }
  } else {
    $insert = $db->query(
      'INSERT INTO hcms_stock (prod_code, brand_name, gen_name, dosage, available, created_at)  VALUES (?, ?, ?, ?, ?, ?)',
      $checkprod_code,
      $checkprod_brand_name,
      $checkprod_gen_name,
      $checkprod_dosage,
      $checkprod_quantity,
      $time
    );
    // echo $insert->affectedRows();

    if ($insert->affectedRows() == 1) {
      $udpate = $db->query("UPDATE hcms_items_transac SET accepted_date =?, acc_dec_by =?, `status`=? WHERE prod_id = '$idAccept'", $time, $accby,  $status);
      $_SESSION['alertsuccess'] = "Item Accepted";
      header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
      $_SESSION['alertError'] = "An Error Occur";
      header("Location: " . $_SERVER['HTTP_REFERER']);
    }
  }
}



if (isset($_GET['idReject'])) {
  $idReject = $_GET['idReject'];
  $accby = $verified_session_lastname . ', ' . $verified_session_firstname . ' ' . $verified_session_middlename;
  $status = "Accepted";


  $udpate = $db->query("UPDATE hcms_items_transac SET rejected_date =?, acc_dec_by =?, `status`=? WHERE prod_id = '$idReject'", $time, $accby,  $status);
  if ($udpate->affectedRows()) {

    $_SESSION['alert'] = "Item Accepted";
  }
}