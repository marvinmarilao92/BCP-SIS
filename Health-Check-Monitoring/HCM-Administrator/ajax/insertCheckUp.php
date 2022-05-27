<?php

require_once "../security/newsource.php";
require_once "timezone.php";
$session_fullname = $verified_session_lastname . ', ' . $verified_session_firstname;
$insert = $db->query(
  'INSERT INTO hcms_checkup (fullname, bn,
    mg, prescription, `description`, cons_name, created_at


  )  VALUES (?,?,?,?,?,?,?)',

  $_POST["fullname"],
  $_POST["prod_name"],
  $_POST["prod_quantity"],
  $_POST["prescription"],
  $_POST["aid"],
  $session_fullname,
  $time
);

require_once "../security/newsource.php";

$hcms_items = $db->query('SELECT * FROM hcms_items WHERE med_name=?', $_POST["prod_name"])->fetchArray();
$test = $hcms_items["quantity"] -= $_POST["prod_quantity"];

$udpatehcms_items = $db->query('UPDATE hcms_items SET quantity=? WHERE prod_id =?', $test, $hcms_items["prod_id"]);