<?php

include  'dmtsConnect.php';

define('DB_SERVERDTMS', '31.220.110.2');
define('DB_USERNAMEDTMS', 'u692894633_sis_db');
define('DB_PASSWORDDTMS', 'l95o@WMN6~a');
define('DB_NAMEDTMS', 'u692894633_sis_db');


$dtmsDB = new databaseFunctionsDTMS(DB_SERVERDTMS, DB_USERNAMEDTMS, DB_PASSWORDDTMS, DB_NAMEDTMS);
?>
