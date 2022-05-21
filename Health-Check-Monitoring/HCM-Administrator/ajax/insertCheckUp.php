<?php

  require_once "../security/newsource.php";
  $insert = $db->query('INSERT INTO hcms_checkup (fullname, checkup_type)  VALUES (?,?)' , $_POST["fullname"] ,  $_POST["treatment");
 ?>
