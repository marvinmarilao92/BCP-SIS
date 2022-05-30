<?php
session_start();
$_SESSION['session_username'] = false;
session_unset();
session_destroy();
header("location:../../../../");
?>