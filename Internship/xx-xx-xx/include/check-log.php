<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
$user_online = true;	
$myrole = $_SESSION['ims_role'];
}else{
$user_online = false;
}
?>