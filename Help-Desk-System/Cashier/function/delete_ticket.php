<?php

$conn = new mysqli("localhost","root","","sis_db");
// connection for online server
//$conn = new mysqli("localhost","u692894633_test","+KoB[b#KI2","u692894633_test_db");


$id = $conn->real_escape_string($_POST['id']);

if ($_POST['key'] == 'deleteRow') {
    $conn->query("DELETE FROM hdms_tickets WHERE id='$id'");
    exit('ticket deleted!');
} else {
     //create audit trail record
        //add session conncetion
        include('session.php');
        $fname=$verified_session_role; 
        if (!empty($_SERVER["HTTPS_CLIENT_IP"])){
            $ip = $_SERVER["HTTPS_CLIENT_IP"];
        }elseif (!empty($_SERVER["HTTPS_X_FORWARDED_FOR"])){
            $ip = $_SERVER["HTTPS_X_FORWARDED_FOR"];
        }else{
        $ip = $_SERVER["REMOTE_ADDR"];
        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $remarks="faqs has been deleted";  
        //save to the audit trail table
        mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host) VALUES('$verified_session_username','$remarks','$fname','$title','$ip','$host')")or die(mysqli_error($link));


}
//end of audit trail
}