<?php

if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
$myid = $_SESSION['ims_uid'];
$myfname = $_SESSION['ims_fname'];
$mymname = $_SESSION['ims_mname'];
$mylname = $_SESSION['ims_lname'];
$mygender = $_SESSION['ims_gender'];
$myemail = $_SESSION['ims_gender'];
$mydate = $_SESSION['ims_bdate'];
$myphone = $_SESSION['ims_phone'];
$myedu = $_SESSION['ims_education'];
$mytitle = $_SESSION['ims_title'];
$mycity = $_SESSION['ims_city'];
$mystreet = $_SESSION['mystreet'];
$myzip = $_SESSION['myzip'];
$mycountry = $_SESSION['mycountry'];
$mydesc = $_SESSION['mydesc'];
$myavatar = $_SESSION['avatar'];
$mylogin = $_SESSION['lastlogin'];
$myrole = $_SESSION['role'];
	
$user_online = true;	
$myavatar = $_SESSION['avatar'];
}else{
$user_online = false;
}
?>