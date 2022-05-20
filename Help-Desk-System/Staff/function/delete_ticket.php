<?php

$conn = new mysqli("localhost","root","","sis_db");
// connection for online server
//$conn = new mysqli("localhost","u692894633_test","+KoB[b#KI2","u692894633_test_db");
date_default_timezone_set("asia/manila");
$date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));

$id = $conn->real_escape_string($_POST['id']);

if ($_POST['key'] == 'deleteRow') {
    $conn->query("DELETE FROM hdms_tickets WHERE id='$id'");
    exit('ticket deleted!');
} else {
     //create audit trail record
        //add session conncetion
        include('session.php');
        $fname=$verified_session_role; 
        if (!empty($_SERVER["HTTP_CLIENT_IP"])){
        $ip = $_SERVER["HTTP_CLIENT_IP"];
        }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }else{
        $ip = $_SERVER["REMOTE_ADDR"];
        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $remarks="deleted ticket";  
        //save to the audit trail table
        mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$affected','$ip','$host','$date')")or die(mysqli_error($link));


}
//end of audit trail
}