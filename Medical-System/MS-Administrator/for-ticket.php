<?php
  include_once 'security/newsource.php';
?>
<!DOCTYPE html>
<html lang="en">
<title>Activities</title>

<head>
  <?php include 'includes/head_ext.php'; ?>

</head>

<body>
  <?php $page = 'logs-admin'; $nav = 'help'; ?>
  <?php include 'includes/header.php'; ?>
  <?php include 'includes/sidebar.php'; ?>

  <body>





    <?php

//include the new connection
include 'new_db.php';

//THE KEY FOR ENCRYPTION AND DECRYPTION
$key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';

//ENCRYPT FUNCTION
function encryptthis($data, $key)
{
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);

    return base64_encode($encrypted.'::'.$iv);
}

//DECRYPT FUNCTION
function decryptthis($data, $key)
{
    $encryption_key = base64_decode($key);
    list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2), 2, null);

    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$new_status = 0;
$waiting_reply_status = 1;
$closed_status = 2;

$new_count = 0;
$reply_count = 0;
$closed_count = 0;

$db = new DB();

$new_tickets_query = "SELECT COUNT(*) AS new_tickets FROM hdms_tickets WHERE status=$new_status";
$ntr = $db->conn->query($new_tickets_query);
if ($ntr->num_rows > 0) {
    while ($row = $ntr->fetch_assoc()) {
        $new_count = $row['new_tickets'];
    }
}

$reply_tickets_query = "SELECT COUNT(*) AS new_tickets FROM hdms_tickets WHERE status=$waiting_reply_status";
$rtc = $db->conn->query($reply_tickets_query);
if ($rtc->num_rows > 0) {
    while ($row = $rtc->fetch_assoc()) {
        $reply_count = $row['new_tickets'];
    }
}

$closed_tickets_query = "SELECT COUNT(*) AS new_tickets FROM hdms_tickets WHERE status=$closed_status";
$ctr = $db->conn->query($closed_tickets_query);
if ($ctr->num_rows > 0) {
    while ($row = $ctr->fetch_assoc()) {
        $closed_count = $row['new_tickets'];
    }
}
$latest = [];
$recodes = $db->conn->query("SELECT * FROM hdms_tickets WHERE ticket_department = '10' ORDER BY 'date'");
if ($recodes->num_rows > 0) {
    while ($row = $recodes->fetch_assoc()) {
        $latest[] = $row;
    }
}

?>
    <main id="main" class="main">
      <div class="container mt-4">
        <div class="row justify-content-center">
          <div class="col-12 col-md-12">
            <div class="card mb-3">
              <div class="card-body">
                <h3>Help desk Support team</h3>

              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              Latest Tickets
            </div>
            <div class="card-body">
              <?php if (count($latest) > 0) {?>
              <table class="table datatable">
                <thead>
                  <tr>


                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($latest as $k => $v) {
    echo '
                                    <tr>
                                       
                                    
                                        <td>'.decryptthis($v['email'], $key).'</td>
                                        <td>'.decryptthis($v['subject'], $key).'</td>
                                        <td>'.decryptthis($v['message'], $key).'</td>
                                        <td>'.$v['date'].'</td>
                                        <td><a href="view_ticket.php?id='.$v['id'].'" class="btn btn-outline-info">View<a/></td>
                                       
                                        
                                    </tr>
                                    ';
}
                                ?>
                </tbody>
              </table>
              <?php } else {
                                    echo '<div class="alert alert-info">No any new tickets</div>';
                                } ?>
            </div>
          </div>
        </div>
      </div>
      </div>
    </main>

    <!-- ======= Footer ======= -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files/ Template main js file -->

  </body>

</html>