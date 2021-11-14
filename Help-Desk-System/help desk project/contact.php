<?php

    include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <div class = "container">
            <h1>Contact Us</h1>
            <div class = "border"></div>
            <form action= "contactform.php" method = "POST" class = "contact">
                <input type = "text" name = "fname" placeholder = "Enter fullname" id = "text-from">
                <input type = "text" name = "schoolid" placeholder = "Enter Student Id" id = "text-from">
                <input type = "text" name = "phone" placeholder = "Enter phone number" id = "text-from">
                <input type = "text" name = "mail" placeholder = "Enter email" id = "text-from">
                <textarea name = "mesage" placeholder = "Message" id = "text-from"></textarea>
                <button type = "submit" name = "submit" id = "cont-btn">Submit</button>
            </form>
        </div>
    </main>
        
</body>
</html>