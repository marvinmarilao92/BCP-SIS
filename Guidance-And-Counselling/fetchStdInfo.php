<?php
      require_once 'Config.php';
      $StudentData = $db->query('SELECT * FROM student_enrolled WHERE Student_ID = ?', $_SESSION["Student_ID".$_SESSION['success'].""])->fetchArray();
      $_SESSION["Student_Course".$_SESSION['success'].""]         = $StudentData["Student_Course"];
      $_SESSION["Student_yrlvl".$_SESSION['success'].""]          = $StudentData["Student_yrlvl"];
      $_SESSION["Student_Section".$_SESSION['success'].""]        = $StudentData["Student_Section"];
      $_SESSION["Student_Gender".$_SESSION['success'].""]         = $StudentData["Student_Gender"];
      $_SESSION["Student_Bdate".$_SESSION['success'].""]          = $StudentData["Student_Bdate"];
      $_SESSION["Student_Address".$_SESSION['success'].""]        = $StudentData["Student_Address"];
      $_SESSION["Student_Nationality".$_SESSION['success'].""]    = $StudentData["Student_Nationality"];
      $_SESSION["Student_Religion".$_SESSION['success'].""]       = $StudentData["Student_Religion"];
      $_SESSION["Student_Status".$_SESSION['success'].""]         = $StudentData["Student_Status"];
      $_SESSION["Student_Name".$_SESSION['success'].""]           = $StudentData["Student_Lname"] .', '. $StudentData["Student_Fname"] .' '. $StudentData["Student_Mname"];
      $_SESSION["Student_ID".$_SESSION['success'].""]             = $StudentData["Student_ID"];
      $_SESSION["Stundet_Img".$_SESSION['success'].""]            = $StudentData["Stundet_Img"];
 ?>
