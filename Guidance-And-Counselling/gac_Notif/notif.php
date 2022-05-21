<?php session_start();
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["req"]))
    {
      echo "ASd";
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["badge"]))
    {
      echo "You have ".$_SESSION["badgeCount"]." new notifications";
    }

?>
