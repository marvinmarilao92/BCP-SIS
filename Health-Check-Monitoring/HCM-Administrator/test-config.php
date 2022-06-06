<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'sis_db';

// $db = new databaseFunction($dbhost, $dbuser, $dbpass, $dbname);

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$sql = mysqli_query($conn, 'SELECT * FROM hcms_items_transac');
$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);

exit(json_encode($result));