<?php
require_once 'security/newsource.php';
$result = mysqli_query($conn, 'SELECT id_number, full_n, course, yr_lvl, contact FROM ms_labtest');

$json_array = array();
while ($row = mysqli_fetch_array($result)) {
  $id_number = $row['id_number'];
  $id_number = $row['id_number'];
  $id_number = $row['id_number'];
  $id_number = $row['id_number'];
  $id_number = $row['id_number'];
  $json_array[] = $row;
}

json_encode($json_array);

  // echo '<pre>';
  // print_r($json_array);
  // echo '<pre>'; 