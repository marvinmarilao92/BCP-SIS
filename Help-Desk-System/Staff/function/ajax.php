<?php
ob_start();
$action = $_GET['action'];
include 'update_ticket.php';
$crud = new Action();
if($action == "update_ticket"){
	$save = $crud->update_ticket();
	if($save)
		echo $save;
}