<?php
  require_once 'Config.php';
  require_once 'timezone.php';
  $insert = $db->query('INSERT INTO gac_datarequest (

    Department,
    Request_Status,
    Student_Classification,
    Student_Course,
    Student_School_year,
    Student_Year_Level,
    Notification_Status,
    created_at,
    updated_at

  ) VALUES (?,?,?,?, ?,?,?,?,?)' ,

    "Registral Department",
    "Pending",
    "College",
    $_POST["stdCourse"],
    $_POST["stdSchoolYear"],
    $_POST["stdyearLvl"],
    "Unread",
    $time, $time

  );
 ?>


 <!-- require_once '../../localConfig.php';
 require_once '../../SForms/timezone.php';
 $insert = $db->query('INSERT INTO StudentInfo (

   Department,
   Request_Status,
   Student Classification,
   Student_Course,
   Student_School_year,
   Student_Year_Level,
   created_at,
   updated_at

 ) VALUES (?,?,?,?, ?,?,?,?)' ,

   "Document Approval Tranking And Mngt",
   "Pending",
   "College",
   "BSIT",
   "2021-2022",
   "4th Year",
   $time, $time
 ); -->
