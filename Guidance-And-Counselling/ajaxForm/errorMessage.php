<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {



      echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert" >';

      if (isset($_POST["saveJob_Title"]) && empty($_POST["saveJob_Title"]))
      {
        echo "<strong>INVALID!</strong> Please fill in Job Title!.<br>";
      }
      if (isset($_POST["saveJob_Type"]) && empty($_POST["saveJob_Type"]))
      {
        echo "<strong>INVALID!</strong> Please fill in Job Type!.<br>";
      }
      if (isset($_POST["saveJob_Description"]) && empty($_POST["saveJob_Description"]))
      {
        echo "<strong>INVALID!</strong> Please fill in Job Description!.<br>";
      }
      if (isset($_POST["saveSalary"]) && empty($_POST["saveSalary"]))
      {
        echo "<strong>INVALID!</strong> Please fill in Job Salary!.<br>";
      }
      if (isset($_POST["saveWork_Location"]) && empty($_POST["saveWork_Location"]))
      {
        echo "<strong>INVALID!</strong> Please fill in Job Location!.<br>";
      }
      if (isset($_POST["savejob_link"]) && empty($_POST["savejob_link"]))
      {
        echo "<strong>INVALID!</strong> Please fill in Job Link!.<br>";
      }



      if (isset($_POST["Company_Name"]) && empty($_POST["Company_Name"]))
      {
        echo "<strong>INVALID!</strong> Please fill in Company Name!<br>";
      }
      if (isset($_POST["Job_Title"]) && empty($_POST["Job_Title"]))
      {
        echo "<strong>INVALID!</strong> Please fill in Job Title!<br>";
      }
      if (isset($_POST["Job_Type"]) && empty($_POST["Job_Type"]))
      {
        echo "<strong>INVALID!</strong> Please fill in Job Type!<br>";
      }
      if (isset($_POST["Job_Description"]) && empty($_POST["Job_Description"]))
      {
        echo "<strong>INVALID!</strong> Please fill in Job Description!<br>";
      }
      if (isset($_POST["Salary"]) && empty($_POST["Salary"]))
      {
        echo "<strong>INVALID!</strong> Please fill in Job Salary!<br>";
      }
      if (isset($_POST["Work_Location"]) && empty($_POST["Work_Location"]))
      {
        echo "<strong>INVALID!</strong> Please fill in Job Location!<br>";
      }
      if (isset($_POST["job_link"]) && empty($_POST["job_link"]))
      {
        echo "<strong>INVALID!</strong> Please fill in Job Link!<br>";
      }


      if (isset($_POST["survey_title"]) && empty($_POST["survey_title"]))
      {
        echo "<strong>INVALID!</strong> Please fill in survey title !<br>";
      }
      if (isset($_POST["survey_description"]) && empty($_POST["survey_description"]))
      {
        echo "<strong>INVALID!</strong> Please fill in survey description !<br>";
      }
      if (isset($_POST["survey_ratingScale"]) && empty($_POST["survey_ratingScale"]))
      {
        echo "<strong>INVALID!</strong> Please fill in survey rating cale !<br>";
      }
      if (isset($_POST["question1"]) && empty($_POST["question1"]))
      {
        echo "<strong>INVALID!</strong> Please complete a form <br>";
      }


      echo'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
           </button>
      </div>';


   }
 ?>
