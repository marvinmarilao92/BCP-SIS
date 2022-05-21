<?php session_start();

    require_once 'documentTrackingConfigConnetion.php';
    if ($_SESSION["Student_Year_Level"] ==  "All Year Level")
    {
      $verify = $dtmsDB->query('SELECT * FROM student_information WHERE course=? AND school_year=?',
      $_SESSION["Student_Course"], $_SESSION["Student_School_year"]);
    }
    else
    {
      $verify = $dtmsDB->query('SELECT * FROM student_information WHERE course=? AND school_year=? AND
      year_level=?', $_SESSION["Student_Course"], $_SESSION["Student_School_year"], $_SESSION["Student_Year_Level"] );
    }

    if ($verify->numRows() >= 1)
    {
      $stdInfo = $dtmsDB->query('SELECT * FROM student_information WHERE course=? AND school_year=? AND
      year_level=?', $_SESSION["Student_Course"], $_SESSION["Student_School_year"], $_SESSION["Student_Year_Level"] )->fetchAll();

      foreach ($stdInfo as $dtmsStudent)
      {
        require_once 'Config.php';
        $verifyEachSTD = $db->query('SELECT * FROM student_enrolled WHERE Student_ID =?', $dtmsStudent["id_number"]);

        if ($verifyEachSTD->numRows() == 1) {} else
        {
          require_once 'Config.php';
          $insert = $db->query('INSERT INTO student_enrolled (

            Student_ID,
            Student_Fname,
            Student_Lname,
            Student_Mname,
            Student_Email,

            Student_Contact,
            Student_Address,
            Student_Course,
            Student_yrlvl,
            Student_Section,

            Student_Yrentry,
            Student_Gender,
            Student_Bdate,
            Student_Nationality,
            Student_Religion,

            Student_CevilStatus,
            Student_Status,
            created_at

          )  VALUES (?,?,?,?,? ,?,?,?,?,? ,?,?,?,?,? ,?,?,?)' ,

            $dtmsStudent["id_number"],
            $dtmsStudent["firstname"],
            $dtmsStudent["lastname"],
            $dtmsStudent["middlename"],
            $dtmsStudent["email"],

            $dtmsStudent["contact"],
            $dtmsStudent["address"],
            $dtmsStudent["course"],
            $dtmsStudent["year_level"],
            $dtmsStudent["section"],

            $dtmsStudent["school_year"],
            $dtmsStudent["gender"],
            $dtmsStudent["birthday"],
            $dtmsStudent["nationality"],
            $dtmsStudent["religion"],

            $dtmsStudent["civil_status"],
            $dtmsStudent["account_status"],
            $dtmsStudent["stud_date"]

        );
        }
  }


          require_once 'Config.php';
          $updateReg = $db->query('UPDATE gac_datarequest SET Request_Status=? , Request_Remarks=? WHERE ID=?',
          "Approved", "Students information has been approved by Registral Department", $_SESSION["current_Request"]);


      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">

              <strong>Success!</strong> Request has been approved!

              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    }
    else
    {

      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">

              <strong>No data exist!</strong> Student information is  not available.

              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    }



 ?>
