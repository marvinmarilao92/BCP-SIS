<?php require_once "../timezone.php";
require_once "../security/newsource.php";


function generateRandomString($length = 25)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}
//usage 
// $myRandomString = generateRandomString(5);

if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {

  $b_name = $_POST['b_name'];

  $stock = $db->query('SELECT *, count(*) as count FROM hcms_stock WHERE brand_name = ?', $b_name)->fetchArray();
  if ($stock['count'] > 0) {
    $prod_code = $stock['prod_code'];
  } else {
    $receivingItem = $db->query('SELECT *, count(*) as count FROM hcms_items_transac WHERE brand_name = ?', $b_name)->fetchArray();
    if ($receivingItem['count'] > 0) {
      $prod_code = $receivingItem['prod_code'];
    } else {
      $prod_code = generateRandomString(8);
    }
  }

  // echo $prod_code;
  $g_name = $_POST['g_name'];
  $dosage =  $_POST['dosage'];
  $quantity =  $_POST['quantity'];
  $received_date = $_POST['received_date'];
  $exp_date = $_POST['exp_date'];
  $fullname = $verified_session_lastname . ', ' . $verified_session_firstname . ' ' . $verified_session_middlename;
  $status = "Pending";

  $sql = $db->query(
    'INSERT INTO hcms_items_transac (prod_code, brand_name, gen_name, dosage, quantity, received_date, exp_date, creator, `status`, created_at)  
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
    $prod_code,
    $b_name,
    $g_name,
    $dosage,
    $quantity,
    $received_date,
    $exp_date,
    $fullname,
    $status,
    $time
  );

  if ($sql->affectedRows() == 1) {
    $_SESSION['alertsuccess'] = "Added to Receiving List";
    header("Location: " . $_SERVER['HTTP_REFERER']);
  }
}