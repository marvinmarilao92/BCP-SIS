<?php session_start();
require_once 'Config.php';
$Studentdata = $db->query('SELECT * FROM counselrequest WHERE ID = ?', $_GET['creqID'])->fetchArray();
$_SESSION["KEY"] = $Studentdata['Request_KEY'];
// if (isset($Studentdata["Student_ID"]) && $Studentdata["Student_Name"] && isset($Studentdata["Request_KEY"]))
// {
    $_SESSION["Student_ID".$_SESSION['success'].""]     = $Studentdata["Student_ID"];
    $_SESSION["Student_Name".$_SESSION['success'].""]   = $Studentdata["Student_Name"];
    $_SESSION["Request_KEY".$_SESSION['success'].""]    = $Studentdata["Request_KEY"];
// }

 ?>
