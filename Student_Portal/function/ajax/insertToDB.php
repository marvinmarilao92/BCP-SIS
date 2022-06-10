<?php
require_once "Config.php";
require_once "timezone.php";
$userID = $_POST['userId'];
$userFullName = $_POST['userFullName'];
$userAddress = $_POST['userAddress'];
$userContact = $_POST['userContact'];
$userEmail = $_POST['userEmail'];
$account = $db->query('SELECT * FROM hcms_profile WHERE qr_code = ?', $userID)->fetchArray();
if (!isset($account['qr_code'])) {
  $insert = $db->query(
    'INSERT INTO hcms_profile (cont_name, qr_code, cont_address, cont_contact, cont_email, created_at) VALUES (?, ?, ?, ?, ?, ?)',
    $userFullName,
    $userID,
    $userAddress,
    $userContact,
    $userEmail,
    $time
  );
  echo $insert->affectedRows();
}