<?php 

include ('../security/newsource.php');

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES['file']['name']))  {

  $id_number =  mysqli_real_escape_string($conn, $_POST['id_number']);//text
  $fullname =  mysqli_real_escape_string($conn, $_POST['fullname']);//text
  $title =  mysqli_real_escape_string($conn, $_POST['title']);//text
  $classified =  mysqli_real_escape_string($conn, $_POST['classified']);//hidden
  $personnel =  mysqli_real_escape_string($conn, $_POST['personnel']);//text
  $cons_name =  $verified_session_username;//session
  $cons_role =  $verified_session_role;//session
  date_default_timezone_set("asia/manila");
  $cons_date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));//hidden
//hidden
  $prod_name =  mysqli_real_escape_string($conn, $_POST['prod_name']);//text
  $prod_quantity =  mysqli_real_escape_string($conn, $_POST['prod_quantity']);//text
  $aid =  mysqli_real_escape_string($conn, $_POST['aid']);//text
  $file =  $_FILES['file']['name'];
  $targetDir = '../../assets/';
  $fileTmp = $_FILES['file_tmp']['name'];//hidden

  if(move_uploaded_file($file, $targetDir)){
  $sql = $conn->prepare('INSERT INTO ms_incidents_logs (`id_number`, `fullname`, `title`, `classified`, `personnel`, `cons_name`, `cons_role`, `cons_date`, `prod_name`, `prod_quantity`, `aid`, `file`) 
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $id_number, $fullname, $title, $classified, $personnel, $cons_name, $cons_role, $cons_date, $prod_name, $prod_quantity, $aid, $file);

  if ($insert->affectedRows()== 1)
  {
    
   }
  }
}
?> 