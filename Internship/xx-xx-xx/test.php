<?php

$token = rand(1,1000);
$h = md5($token);
echo $h;


?>