  <?php session_start();
    require_once '../Config.php';
    require_once 'timezone.php';

      $result = 0;
      for ($x = 1; $x <= $_SESSION["radioCount"]; $x++)
      {
        if ($x == 1)
        {
          $result  += $_POST["value".$x.""];
        }
        if ($x >=2 && $x <= $_SESSION["radioCount"]-2)
        {
            $result  += $_POST["value".$x.""];
        }
        if ($x == $_SESSION["radioCount"]-1)
        {
            if ($_SESSION["radioCount"]-1 == 1)
            {
              $result /= $_SESSION["radioCount"]-1;
            }
            else
            {
              $result  += $_POST["value".$x.""];
              $result /= $_SESSION["radioCount"]-1;
            }
        }
      }


    $surveyResult = $db->query('INSERT INTO gac_stdsurvey (

       Student_Name, Studnet_ID, Teacher_Name, Survey_Title, Survey_RatingScale,
       Question_one, Question_two, Question_three, Question_four, Question_five,
       Question_six, Question_seven, Question_eight, Question_nine, Question_ten,
       Question_eleven, Question_twelve, Question_Thirteen, Question_Fourteen, Question_Fifteen,
       Question_Sixteen, Question_Seventeen, Question_Eighteen, Question_Nineteen, Question_Twenty,
       Survey_Result, created_at, updated_at)

      VALUES (?,?,?,?,?,   ?,?,?,?,?   ,?,?,?,?,?,    ?,?,?,?,?   ,?,?,?,?,?   ,?,?,?)' ,

      "Marin, Kim Julius Carranza",
      "18012935",
      $_GET["Teacher_Name"],
      $_SESSION["survey_title"],
      $_SESSION["survey_ratingScale"],

      $_POST["value1"],
      $_POST["value2"],
      $_POST["value3"],
      $_POST["value4"],
      $_POST["value5"],

      $_POST["value6"],
      $_POST["value7"],
      $_POST["value8"],
      $_POST["value9"],
      $_POST["value10"],

      $_POST["value11"],
      $_POST["value12"],
      $_POST["value13"],
      $_POST["value14"],
      $_POST["value15"],

      $_POST["value16"],
      $_POST["value17"],
      $_POST["value18"],
      $_POST["value19"],
      $_POST["value20"],
      ($result."%"),

      $time, $time
      );

      if ($surveyResult->affectedRows() == 1)
      {
        // unset($_SESSION["survey_title"]);
        // unset($_SESSION["radioCount"]);
      }
   ?>

   <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Survey Submit!</strong> Thank you for you cooperation.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
