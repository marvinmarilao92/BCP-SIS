<?php session_start();
  require_once 'Config.php';
  require_once 'QueryParam.php';
  require_once 'timezone.php';
  $surveyForm = $db->query('INSERT INTO gac_teachereval (survey_title, survey_description, survey_ratingScale, survey_Questions, survey_key, created_at, updated_at)
   VALUES (?,?,?,?,?,?,?)' ,$_POST["survey_title"] ,$_POST["survey_description"] ,$_POST["survey_ratingScale"], $_SESSION["QUESTION"][0], $getQP, $time, $time );
  if ($surveyForm->affectedRows() == 1) {
      for ($x=1; $x<$_SESSION["addQuestion"]; $x++)
      {
        require_once 'Config.php';
        $surveyForm = $db->query('INSERT INTO gac_teachereval (survey_Questions, survey_key, created_at, updated_at)
        VALUES (?,?,?,?)' ,$_SESSION["QUESTION"][$x], $getQP, $time, $time );
      }
    ?>
    <div id="surveyCreated">
      <div class="form-row">
        <div class="form-group col-2"></div>
          <div class="form-group col-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> you created a new survey form.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
      <div class="form-group col-2"></div>
      </div>
         <form method="POST" action="">
            <div class="form-row">
                <div class="form-group col-2"></div>
                  <div class="form-group col-8" >
                    <label for="survey_title"><i>Survey Title:</i></label>
                    <input type="text" id="survey_title"  required class="form-control" placeholder="Enter Survey Title" >
                  </div>
                <div class="form-group col-2"></div>
            </div>



       <div class="form-row">
           <div class="form-group col-2"></div>
             <div class="form-group col-8" >
               <label for="survey_title"><i>Survey Description:</i></label>
               <textarea class="form-control" id="survey_description" required rows="5" placeholder="Enter Survey Description"></textarea>
             </div>
           <div class="form-group col-2"></div>
       </div>



                        <div class="form-row">
                            <div class="form-group col-2"></div>
                              <div class="form-group col-8" >
                                <label for="survey_title"><i>Rating Scale:</i></label>
                                <select class="form-select" required id="survey_ratingScale">
                                  <option selected value="" disabled>Select Rating Scale</option>
                                  <option value="Graphic rating scale">Graphic rating scale (e.g 1-5)</option>
                                  <option value="Descriptive rating scale">Descriptive rating scale (eg. Excellent or Poor)</option>
                                </select>
                              </div>

                            <div class="form-group col-2"></div>
                        </div>

                        <div id="Questions"></div>
                        <div class="form-row">
                            <div class="form-group col-3"></div>
                              <div class="form-group col-3" >
                                <a  class="btn btn-success form-control" style="color:white;"
                                  onclick="AddRequestion('errorMessage', 'surveyCreated');">
                                  <i class="bi bi-file-earmark-plus"></i> Create form</a>
                              </div>
                                <div class="form-group col-3">
                                    <a class="btn btn-info form-control" style="color:white;"
                                      onclick="addNewQuestionField('Questions');">
                                      <i class="bi bi-file-earmark-plus"></i> Add question</a>
                                </div>
                            <div class="form-group col-3"></div>
                        </div>
                        <form>
    <div>

<?php  }


for ($x=0; $x<$_SESSION["addQuestion"]; $x++) { unset($_SESSION["QUESTION"][$x]); } unset($_SESSION["addQuestion"]);


 ?>
