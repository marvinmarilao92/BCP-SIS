<?php
ob_start();
$action = $_GET['action'];
include 'class.php';
$crud = new Action();

if($action == "update_ticket"){
	$save = $crud->update_ticket();
	if($save)
		echo $save;
}

ob_end_flush();
?>
