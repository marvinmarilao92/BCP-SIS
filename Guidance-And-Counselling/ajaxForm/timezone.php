<?php

// $ip = $_SERVER['REMOTE_ADDR'];
// $ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
// $ipInfo = json_decode($ipInfo);
// $timezone = $ipInfo->timezone ?? "GMT+8";
//
// $dt = new DateTime("now", new DateTimeZone($timezone));
// $time = $dt->format('Y-m-d H:i:s');
// $timeFormat = date_format(date_create($time), 'g:ia \o\n l jS F Y'); -->


// $ip = $_SERVER['REMOTE_ADDR'];
// $ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
// $ipInfo = json_decode($ipInfo);
// $timezone = $ipInfo->timezone ?? "GMT+8";
//
// $dt = new DateTime("now", new DateTimeZone($timezone));
// $time = $dt->format('Y-m-d H:i:s');
// $timeFormat = date_format(date_create($time), 'g:ia \o\n l jS F Y');
date_default_timezone_set('Asia/Manila');
$plain_date = date('Y-m-d H:i:s');
/**
* or... alternatively set it using a string value
*/

// Prepare the timezones
$utc = new DateTimeZone('+0800');
$ph  = new DateTimeZone('+0800');

// Conversion procedure
$datetime = new DateTime( $plain_date, $utc ); // UTC timezone
$datetime->setTimezone( $ph ); // Philippines timezone

$time =  $datetime->format('Y-m-d H:i:s');
