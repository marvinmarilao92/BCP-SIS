<?php
require_once "../../security/newsource.php";
require_once "timezone.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $creator = $verified_session_firstname . '' . $verified_session_lastname;
  $schedule = $db->query(
    'INSERT INTO ms_schedule (
  course, yr_lvl, sched_from, sched_to, created_at, creator)  VALUES (?, ?, ?, ?, ?, ?)',
    $_POST["course"],
    $_POST['yr_lvl'],
    $_POST['start'],
    $_POST['end'],
    $time,
    $creator
  );
}