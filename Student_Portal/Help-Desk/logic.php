<?php
error_reporting(0);

//fet id
$id = $_GET['id'];

//fetch blogs 
$service = mysqli_query($con,"SELECT * FROM services WHERE id=$id");
$fetch = mysqli_fetch_array($service);


//fetch recent post
$recent = mysqli_query($con,"SELECT * FROM services ORDER BY id DESC");

  //fetch category

$cat = mysqli_query($con,"SELECT * FROM category ORDER BY id DESC");


   //fetch settings
$settings = mysqli_query($con,"SELECT * FROM settings");
$setting  = mysqli_fetch_array($settings);


?>
