<?php
require_once "Config.php";
require_once "timezone.php";
$userID = $_POST['userId'];
$userFullName = $_POST['userFullName'];
$userAddress = $_POST['userAddress'];
$userContact = $_POST['userContact'];
$userEmail = $_POST['userEmail'];
$account = $db->query('SELECT * FROM hcms_profile WHERE cont_id = ?', $userID)->fetchArray();
if (!isset($account['cont_id'])) {
  $insert = $db->query(
    'INSERT INTO hcms_profile (cont_id, cont_name, cont_address, cont_contact, cont_email, created_at) VALUES (?, ?, ?, ?, ?, ?)',
    $userID,
    $userFullName,
    $userAddress,
    $userContact,
    $userEmail,
    $time
  );
  echo $insert->affectedRows();
}