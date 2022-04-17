<?php
require '../include/conn.php';
$getRows = $conn->query("SELECT * FROM datms_program ORDER BY date DESC");
echo $getRows->num_rows;
 ?>