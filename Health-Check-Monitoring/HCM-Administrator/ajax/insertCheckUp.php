<?php

  require_once "../security/newsource.php";
  $insert = $db->query('INSERT INTO hcms_checkup (fullname, )  VALUES (?)' , $_POST["fullname"] ,  $_POST["aid");
 ?>
