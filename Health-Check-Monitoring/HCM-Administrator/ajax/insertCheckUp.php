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
   $_POST["aid"]

 );
 ?>
