<!-- ======= @marilao Swal2 Script======= -->
<?php
if($path == 'view'){
include('security/session.php');
} else {
  include('../security/session.php');
}
 // S W E E T A L E R
function functionSwal($msg, $icon) {
  $_SESSION['status'] = $msg;
  $_SESSION['status_icon'] = $icon;
  header("Location: ".$_SERVER['HTTP_REFERER']);
  exit();
}
// C R U D
function SelectQuery($table_name, $conn, $search){
  $sql = "SELECT * FROM ".$table_name." WHERE `id_number` = '$search'";
  return mysqli_query($conn, $sql);
}

function auditQuery($conn, $verified_session_username, $remarks , $fname, $office , $ip , $host , $audit_date){

$query = "INSERT INTO hcms_audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$office','$ip','$host','$audit_date')"or die(mysqli_error($conn));  
return mysqli_query($conn, $query);

}

$data = array(`stud_id`, `full_n`, `status`, `assess_date`, `file_id`, `file_name`, `appr_name`, `cons_role`, `cons_dept`, `remarks`, `type`);
$data2 = array('$id', '$fullname', '$status', '$assessment_date', '$file_id', '$file', '$appr', '$role', '$dept', '$remarks', '$type');

function registerQuery($conn, $table_name, $data, $data2){
  $query = "INSERT INTO ".$table_name." ('$data') 
  VALUES ('$data2')" ;
  return mysqli_query($conn, $query);
}

function updateStatus($table_name, $conn, $fstatus, $date, $id){
  $query = "UPDATE ".$table_name." SET `status` = '$fstatus', `assess_date` = '$date' WHERE id ='$id'";
  return mysqli_query($conn, $query);
}

function updateProfile($conn, $about, $address, $phone, $email, $verified_session_username){
$query = "UPDATE user_information 
SET `about` = '{$about}', `address` = '{$address}', `contact` = '{$phone}', `email` = '{$email}' 
WHERE `id_number` = '$verified_session_username'";
return mysqli_query($conn, $query);
}

function updateImg($conn, $final_img, $verified_session_username){
  $query = "UPDATE user_information 
  SET user_img = '{$final_img}'
  WHERE `id_number` = '$verified_session_username'";
  return mysqli_query($conn, $query);
}

// PROFILE DISPLAY
function displayProfile($verified_session_img, $idImg) {
  $path = "../../assets/users/";
  $person = "person-circle.svg";
  $dir = "{$path}{$person}";
  $dir2 = "{$path}{$verified_session_img}";
  $hasNoImage = '<img src="' . $dir . '" id="' . $idImg . '" alt="Profile" class="rounded-circle m-2">'; 
  $hasImage = '<img src="' . $dir2 . '" id="' .$idImg. '" alt="Profile" class="rounded-circle m-2">'; 
  $str = $verified_session_img > 0 ? $hasImage : $hasNoImage;
  return $str;
} 

?>

