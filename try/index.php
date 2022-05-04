<?php

include "QRBarCode.php"; 
    /* include QRBarCode class */
    if(isset($_POST['QR'])){


    $qr = new QRBarCode(); 


    $qr->text('boyboy'); 
    $size = rand(0, 177);
    $filename = "Jamaine";
    $qr->qrCode($size, $filename);

  }  
    // include "QRBarCode.php"; 
  
    // $qr = new QRBarCode(); 
  
    // $qr->qrCode(500, '');
  

    ?>

<div class="container">
  <form action="" method="POST">
    <div class="button" name = "QR" > Generate Qr Code</div>
  </form>
</div>