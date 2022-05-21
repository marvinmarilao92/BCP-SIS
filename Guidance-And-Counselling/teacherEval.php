<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'include/external.php';
  include 'include/header.php'; ?>
  <link rel="stylesheet" href="mdb5-free-standard/css/mdb.min.css">
  <script src="mdb5-free-standard/js/mdb.min.js"></script>
</head>

<!-- ======= Sidebar ======= -->
<?php include 'include/asideSidebar.php'; ?>
<style>
#ModalBody::-webkit-scrollbar {
  display: none;
}
</style>


<script>
function AddRequestion(errorMessage, surveyCreated) {

  var survey_title = document.getElementById("survey_title").value;
  var survey_description = document.getElementById("survey_description").value;
  var survey_ratingScale = document.getElementById("survey_ratingScale").value;

  var takeDataintoArray =

    'survey_title=' + survey_title +
    '&survey_description=' + survey_description +
    '&survey_ratingScale=' + survey_ratingScale;

  if (survey_title == '' || survey_description == '' || survey_ratingScale == '') {
    $.ajax({
      type: "POST",
      url: 'AjaxForm/errorMessage.php',
      data: takeDataintoArray,
      cache: false,
      success: function(html) {
        var ajaxDisplay = document.getElementById(errorMessage);
        ajaxDisplay.innerHTML = html;
        Swal.fire(
          'Incomplete!',
          'Please complete your answer!',
          'warning'
        )
      }
    });
  } else {
    $.ajax({
      type: "POST",
      url: 'ajaxForm/surveyCreation.php',
      data: takeDataintoArray,
      cache: false,
      success: function(html) {
        var ajaxDisplay = document.getElementById(surveyCreated);
        ajaxDisplay.innerHTML = html;
        Swal.fire(
          'Evaluation created!',
          'You can now make a survey!',
          'success'
        )
      }
    });
  }
}
</script>

<script>
function addNewQuestionField(Questions) {

  $.ajax({
    url: 'ajaxForm/createQuestionField.php',
    success: function(html) {
      var displayQuestion = document.getElementById(Questions);
      displayQuestion.innerHTML = html;
    }
  });
}
</script>

<script>
function removeNewQuestionField(Questions) {
  $.ajax({
    url: 'ajaxForm/createQuestionField.php?removeQfld=true',
    success: function(html) {
      var removeNewQuestionField = document.getElementById(Questions);
      removeNewQuestionField.innerHTML = html;
    }
  });
}
</script>


<script>
function Question1(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn1=' + data,
  });
}

function Question2(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn2=' + data,
  });
}

function Question3(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn3=' + data,
  });
}

function Question4(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn4=' + data,
  });
}

function Question5(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn5=' + data,
  });
}

function Question6(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn6=' + data,
  });
}

function Question7(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn7=' + data,
  });
}

function Question8(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn8=' + data,
  });
}

function Question9(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn9=' + data,
  });
}

function Question10(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn10=' + data,
  });
}

function Question11(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn11=' + data,
  });
}

function Question12(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn12=' + data,
  });
}

function Question13(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn13=' + data,
  });
}

function Question14(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn14=' + data,
  });
}

function Question15(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn15=' + data,
  });
}

function Question16(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn16=' + data,
  });
}

function Question17(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn17=' + data,
  });
}

function Question18(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn18=' + data,
  });
}

function Question19(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn19=' + data,
  });
}

function Question20(data) {
  $.ajax({
    url: 'ajaxForm/inputQuestions/question.php?qstn20=' + data,
  });
}
</script>

</head>

<body>
  <?php
  include 'filesLogic.php'; ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1 class="layout">Research/Survey Evaluation</h1>
      <nav>
        <ol class="breadcrumb" style="background-color: transparent;">
          <li class="breadcrumb-item"><a href="index.php?id=<?php echo $_SESSION['success']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Research/Survey Evaluation</li>
          <li class="breadcrumb-item active">Teacher's Evaluation</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->



    <br>
    <div class="form-row ">
      <div class="form-group col-sm-1"></div>
      <div class="form-group col-sm-10">
        <div
          style="background-color: white;  border-radius: 6px; border: 5px solid whitesmoke; box-shadow: 2px 10px 5px 5px #77aac9;">
          <div style="padding: 1px;">
            <br>

            <div id="surveyCreated">
              <div class="form-row">
                <div class="form-group col-2"></div>
                <div class="form-group col-8">
                  <div id="errorMessage"></div>
                </div>
                <div class="form-group col-2"></div>
              </div>
              <form method="POST" action="">
                <div class="form-row">
                  <div class="form-group col-2"></div>
                  <div class="form-group col-8">
                    <label for="survey_title"><i>Survey Title:</i></label>
                    <input type="text" id="survey_title" required class="form-control" placeholder="Enter Survey Title">
                  </div>
                  <div class="form-group col-2"></div>
                </div>



                <div class="form-row">
                  <div class="form-group col-2"></div>
                  <div class="form-group col-8">
                    <label for="survey_title"><i>Survey Description:</i></label>
                    <textarea class="form-control" id="survey_description" required rows="5"
                      placeholder="Enter Survey Description"></textarea>
                  </div>
                  <div class="form-group col-2"></div>
                </div>



                <div class="form-row">
                  <div class="form-group col-2"></div>
                  <div class="form-group col-8">
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
                  <div class="form-group col-3">
                    <a class="btn btn-success form-control" style="color:white;"
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




  </main>
  <!-- ======= Footer ======= -->
  <?php include 'include/footer.php'; ?>


  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>