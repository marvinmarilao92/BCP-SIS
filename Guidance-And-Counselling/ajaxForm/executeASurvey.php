<?php session_start();

      require_once 'Config.php';
      require_once 'timezone.php';
      $title = $db->query('SELECT * FROM gac_teachereval WHERE ID=?', $_GET["surveyTitle"])->fetchArray();
      $insert = $db->query('INSERT INTO gac_onsurvey (Survey_Title,
      Student_Course, Student_SchLvl, Student_YrLvl,
      created_at, updated_at)  VALUES (?,?,?, ?,?,?)'
      ,$title["survey_title"], $_POST["stdCourse"],
       $_POST["stdSchoolYear"], $_POST["stdyearLvl"],  $time, $time);

       require_once 'Config.php';
       $makeNotif = $db->query('SELECT * FROM student_enrolled WHERE

        Student_Yrentry=? AND
        Student_Course=? AND
        Student_yrlvl=?',

        $_POST["stdSchoolYear"],
        $_POST["stdCourse"],
        $_POST["stdyearLvl"])->fetchAll();

       foreach ($makeNotif as $Notif)
       {
         require_once 'Config.php';
         require_once 'timezone.php';
         $Imginsert =  $db->query('INSERT INTO notification (User_Img)
         SELECT User_img FROM departmental_user WHERE User_ID =?' ,$_SESSION['User_ID'.$_SESSION['success'].'']);

         $DataUpdate = $db->query('UPDATE notification SET

          User_ID=?,
          User_Name=?,
          Student_ID=?,
          Message_Title=?,
          notif_purpose=?,
          survey_ID=?,
          Message=?,
          Read_Status=?,
          Notif_Messages=?,
          created_at=?
          ORDER BY ID DESC LIMIT 1' ,

         $_SESSION['User_ID'.$_SESSION['success'].''],
         $Notif["Student_Lname"].', '.$Notif["Student_Fname"],
         $Notif["Student_ID"],
         $title["survey_title"],
         "Guidance Survey",
         $title["ID"],
         "We are Guidance department who conduct a survey please cooperate. Thank you.",
         "Unread",
         "Notification",
          $time);
       }



 ?>
