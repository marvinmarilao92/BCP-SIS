<?php

date_default_timezone_set('Asia/Manila');
$plain_date = date('Y-m-d H:i:s');


$utc = new DateTimeZone('+0800');
$ph  = new DateTimeZone('+0800');


$datetime = new DateTime($plain_date, $utc); // UTC timezone
$datetime->setTimezone($ph); // Philippines timezone

$time =  $datetime->format('Y-m-d H:i:s');