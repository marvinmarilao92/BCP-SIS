<?php 
include_once('../includes/source.php');

if($_SERVER["REQUEST_METHOD"] == "GET"){

date_default_timezone_set("asia/manila");
$date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));

  $sql = "SELECT * FROM hcms_student_records WHERE `create_at` BETWEEN CURRENT_TIMESTAMP AND MONTH(CURRENT_TIMESTAMP - INTERVAL 1 MONTH)";
  $sql_run = mysqli_query($conn, $sql);
  if(mysqli_num_rows($query_run) > 0 ){

    $query = $conn->prepare("INSERT INTO 'tablename'(`id_number`, `full_name`, `assess_date`, `remarks`, `file`) VALUES (?, ?, ?, ?, ?) ");
    $stmt->bind_param("is", $id_number, $full_name, $asses_date, $remarks, $file);
}

$id = $_GET['req_id'];
$table_name = $_GET['tablename'];
$fstatus = "Approved";

 
    $query_run = updateStatus($table_name, $conn, $fstatus, $date, $id);
    
    if ($query_run){
      $fname= $verified_session_role; 
      $msg = "Profile Updated";
      $icon = "success";
      functionSwal($msg, $icon);
      if (!empty($_SERVER["HTTPS_CLIENT_IP"])){
  
        $ip = $_SERVER["HTTPS_CLIENT_IP"];
  
      }elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])){
  
        $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
  
      }else{
        date_default_timezone_set("asia/manila");
        $audit_date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));
        $ip = $_SERVER["REMOTE_ADDR"];
        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $remarks= "Approved Medical Records";  
        //save to the audit trail table
          mysqli_query($conn,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$office','$ip','$host','$date')")or die(mysqli_error($conn));  
          $_SESSION['alert'] = "Successfully Updated";
          header("location:". $_SERVER['HTTPS_REFERER']);
          
          $sql_run = auditQuery($conn, $verified_session_username, $remarks , $fname, $office , $ip , $host , $audit_date);
          if($sql_run){
        
          // swal
          $msg = "Record Added";
          $icon = "success";
          functionSwal($msg, $icon);
          header("location:". $SERVER['HTTPS_REFERER']);
          $_SESSION['alert'] = "Successfully Uploaded";
          exit();
          }
        }
  
    }else{
      $msg = "Error";
      $icon = "error";
      functionSwal($msg, $icon);
      }

}
exit();
?>

