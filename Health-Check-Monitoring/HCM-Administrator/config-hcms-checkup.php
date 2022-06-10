<?php

$dbhost = 'localhost';
$dbuser = 'u692894633_sis_db';
$dbpass = 'l95o@WMN6~a';
$dbname = 'u692894633_sis_db';

// $db = new databaseFunction($dbhost, $dbuser, $dbpass, $dbname);

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$sql = mysqli_query($conn, 'SELECT * FROM hcms_checkup');
$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);

exit(json_encode($result));