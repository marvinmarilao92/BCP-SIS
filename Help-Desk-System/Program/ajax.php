<?php
ob_start();
$action = $_GET['action'];
include 'Program_class.php';
$crud = new Action();

if($action == "delete_comment"){
	$delsete = $crud->delete_comment();
	if($delsete)
		echo $delsete;
}