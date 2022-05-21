<?php

  require_once "../security/newsource.php";
  $insert = $db->query('INSERT INTO hcms_checkup (fullname, checkup_type, item,
    quantity, 	prescription, 	description


  )  VALUES (?,?,?,?,?,?)' ,

   $_POST["fullname"] ,
   $_POST["treatment"],
   $_POST["prod_name"],

   $_POST["prod_quantity"] ,
   $_POST["prescription"],
   $_POST["aid"]);

 require_once "../security/newsource.php";

 $hcms_items = $db->query('SELECT * FROM hcms_items WHERE med_name=?', $_POST["prod_name"])->fetchArray();
 $test = $hcms_items["quantity"] -= $_POST["prod_quantity"];

 $udpatehcms_items = $db->query('UPDATE hcms_items SET quantity=? WHERE prod_id =?', $test, $hcms_items["prod_id"]);


 ?>
