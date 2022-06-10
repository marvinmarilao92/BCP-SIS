<?php

require_once "../security/newsource.php";
require_once "timezone.php";
$hcms_items = $db->query('SELECT * FROM hcms_stock WHERE prod_code=?', $_POST["prod_code"])->fetchArray();
$prod_name = $hcms_items['brand_name'];
$mg = $hcms_items['dosage'];

$session_fullname = $verified_session_lastname . ', ' . $verified_session_firstname;

$insert = $db->query(
  'INSERT INTO hcms_checkup (id_number, fullname, prod_code, bn,
    mg, quantity, prescription, `description`, cons_name, created_at


  )  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',

  $_POST["id_number"],
  $_POST["fullname"],
  $_POST["prod_code"],
  $prod_name,
  $mg,
  $_POST["prod_quantity"],
  $_POST["prescription"],
  $_POST["description"],
  $session_fullname,
  $time
);

// $hcms_items = $db->query('SELECT * FROM hcms_stock WHERE prod_code=?', $_POST["prod_name"])->fetchArray();
$test = $hcms_items["available"] -= $_POST["prod_quantity"];
$udpatehcms_items = $db->query('UPDATE hcms_stock SET available=? WHERE prod_code =?', $test, $hcms_items["prod_code"]);