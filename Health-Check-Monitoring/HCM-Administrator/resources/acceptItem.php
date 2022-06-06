<?php
require_once "../security/newsource.php";
require_once "../timezone.php";



if (isset($_GET['idAccept'])) {
  $idAccept = $_GET['idAccept'];
  $accby = $verified_session_lastname . ', ' . $verified_session_firstname . ' ' . $verified_session_middlename;
  $status = "Accepted";
  $udpate = $db->query("UPDATE hcms_items_transac SET accepted_date =?, acc_dec_by =?, `status`=? WHERE prod_id = '$idAccept'", $time, $accby,  $status);
  if ($udpate->affectedRows()) {

    $stock = $db->query('SELECT *, count(*) as count FROM hcms_stock WHERE brand_name = ?', $b_name)->fetchArray();

    if ($stock['count'] > 0) {

      $addquantity = $db->query('SELECT * FROM hcms_items_transac WHERE brand_name = ? AND prod_id = ?', $b_name, $idAccept)->fetchArray();

      $stock['quantity'] + $addquantity['quantity'] = $addedStock;

      $Take_prod_id = $addquantity['prod_id'];

      $udpatePro = $db->query("UPDATE hcms_stock SET available =? WHERE prod_id = '$Take_prod_id'", $addedStock);
      if ($udpate->affectedRows()) {
      }
    } else {

      $insert = $db->query('INSERT INTO hcms_stock (Student_ID)  VALUES (?)', $test);
      echo $insert->affectedRows();

      if ($insert->affectedRows() == 1) {
      }
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