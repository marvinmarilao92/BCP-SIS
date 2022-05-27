<?php

include "QRBarCode.php";
/* include QRBarCode class */
if (isset($_POST['QR'])) {


  $qr = new QRBarCode();
  $qr->text('boyboyasdsad');
  $size = 177;
  $filename = "NyelYeaah";
  $qr->qrCode($size, $filename);
}
// include "QRBarCode.php"; 

// $qr = new QRBarCode(); 

// $qr->qrCode(500, '');


?>

<div class="container">
  <form action="" method="POST">
    <button class="btn btn-primary" name="QR"> Generate Qr Code</button>
  </form>
</div>