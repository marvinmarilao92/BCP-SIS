<?php

session_start();
require_once 'Config.php';
require_once 'timezone.php';
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    $validate = $db->query('INSERT INTO ms_valid (
  id_number, course, `name`, `date`, created_at, updated_at)  VALUES (?, ?, ? ,?, ?, ?)',
$_POST['id_number'],
$_POST['course'],
$_POST['name'],

$_POST['date'],
$time, $time);
}