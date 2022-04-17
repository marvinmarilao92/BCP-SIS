<!-- ======= @marilao Swal2 Script======= -->
<?php
 // S W E E T A L E R
function functionSwal($msg, $icon) {
  $_SESSION['status'] = $msg;
  $_SESSION['status_icon'] = $icon;
  header("Location: ".$_SERVER['HTTP_REFERER']);
  exit();
}

function SelectQuery($table_name, $conn, $search){
  $sql = "SELECT * FROM ".$table_name." WHERE `id_number` = '$search'";
  return mysqli_query($conn, $sql);
}