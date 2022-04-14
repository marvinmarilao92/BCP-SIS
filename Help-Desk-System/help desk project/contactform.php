<?php

if (isset($_POST ['submit'])) {
    $fname = $_POST ["fname"];
    $schoolid = $_POST ["schoolid"];
    $phone = $_POST ["phone"];
    $mailFrom = $_POST ["mail"];
    $mesage = $_POST ["mesage"];

    $mailTo = "help@bcp.ed.ph";
    $headers = "From: ".$mailFrom ;
    $txt = "Email recieve from ".$fname.".\n\n".$mesage;


    mail($mailTo, $schoolid, $headers, $txt);
    header("Location: contact.php?mailsend");
}


