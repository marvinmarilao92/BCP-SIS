<?php
session_start();
    if(isset($_SESSION['session_url'])){
        header("location: ".$_SESSION['session_url']."");
      }
?>