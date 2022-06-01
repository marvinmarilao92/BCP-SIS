<?php

session_start();
require_once 'Config.php';
require_once 'timezone.php';
$validate = $db->query(
  'INSERT INTO ms_labtest (
  id_number, full_n, date_paid, course, section, yr_lvl, sy, urin, cbc, c_xray, created_at)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',

  $_POST['id_number'],
  $_POST['name'],
  $_POST['pay_date'],
  $_POST['course'],
  $_POST['section'],
  $_POST['yr_lvl'],
  $_POST['sy'],
  $_POST['urin'],
  $_POST['cbc'],
  $_POST['c_xray'],
  $time
);