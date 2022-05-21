<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'include/external.php';
  include 'include/header.php'; ?>
  <link rel="stylesheet" href="mdb5-free-standard/css/mdb.min.css">
  <script src="mdb5-free-standard/js/mdb.min.js"></script>


  <script>
  function makeSurvey() {
    $("#makeSurvey").modal("show");
  }

  function closeSurvey() {
    $("#makeSurvey").modal("hide");
  }
  </script>
</head>


<?php include 'include/asideSidebar.php'; ?>


<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<?php
include 'include/header.php';
?>
<style>
#ModalBody::-webkit-scrollbar {
  display: none;
}
</style>

<script>
function viewSurvey(surveyID, formContent) {
  $.ajax({
    url: 'AjaxForm/getSurveyID.php?srvyID=' + surveyID,
    success: function(html) {
      var ajaxDisplay = document.getElementById(formContent);
      ajaxDisplay.innerHTML = html;
      $(document).ready(function() {
        $("#viewSurveyEval").modal("show");
      });
    }
  });
}

function closeModal() {
  $("#viewSurveyEval").modal("hide");
}
</script>


<script>
function submitSurvey(errorMessage) {
  var Teacher_Name = document.getElementById("Teacher_Name").value;
  <?php include 'ajaxForm/loadStatement.php'; ?> {
    Swal.fire(
      'Incomplete!',
      'Please complete your answer!',
      'warning'
    )
  } else {
    $.ajax({
      type: "POST",
      url: 'AjaxForm/insertstdSurveryResult.php?Teacher_Name=' + Teacher_Name,
      data: takeDataintoArray,
      cache: false,
      success: function(html) {
        swal.fire(
          'Submited!',
          'Thank your for your cooperation!',
          'success'
        )
      }
    });
  }
}
</script>

<script>
function removeCurrentForm(formKey, refresh) {
  Swal.fire({
    title: 'Are you sure?',
    text: "Student logs will be deleted!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Delete record!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: 'ajaxForm/deleteEvaluationForm.php?deleteForm=' + formKey,
        success: function(html) {
          $.ajax({
            url: 'ajaxForm/loadEvaluationTable.php',
            success: function(html) {
              var ajaxDisplay = document.getElementById(refresh);
              ajaxDisplay.innerHTML = html;
              $('#StudentINFO').DataTable();
              swal.fire(
                'Deleted!',
                'Evaluation form has been deleted!',
                'success'
              )
            }
          });
        }
      });
    }
  });
}
</script>

<!-- make a survey for student -->
<script>
function forwardSurvey(survey) {


  var stdCourse = document.getElementById("stdCourse").value;
  var stdSchoolYear = document.getElementById("stdSchoolYear").value;
  var stdyearLvl = document.getElementById("stdyearLvl").value;

  var intoArray =

    'stdCourse=' + stdCourse +
    '&stdSchoolYear=' + stdSchoolYear +
    '&stdyearLvl=' + stdyearLvl;

  if (stdCourse == '' || stdSchoolYear == '' || stdyearLvl == '') {
    Swal.fire(
      'Incomplete!',
      'Please select Information!.',
      'warning');
  } else {
    Swal.fire({
      title: 'Make a survey?',
      text: "It will affected a students",
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Make a Survey!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: 'ajaxForm/executeASurvey.php?surveyTitle=' + survey,
          data: intoArray,
          cache: false,
          success: function(html) {
            Swal.fire(
              'Success!',
              'Each student will receive this survey.',
              'success');
          }
        });
      }
    });
  }

}
</script>



</head>

<body>
  <?php
  include 'include/asideSidebar.php';; ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1 class="layout">Research/Survey Evaluation</h1>
      <nav>
        <ol class="breadcrumb" style="background-color: transparent;">
          <li class="breadcrumb-item"><a href="index.php?id=<?php echo $_SESSION['success']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Research/Survey Evaluation</li>
          <li class="breadcrumb-item active">Evaluation Form</li>
        </ol>
      </nav>
    </div><!-- End Page Title --> <br>
    <div id="loadEvaluationTable">
      <table class="table table-hover" style="width:100%; font-size: 14px;" id="StudentINFO">
        <thead>
          <tr style="background: rgba(161, 213, 255, 0.1);">

            <th>#</th>
            <th>Survey Title</th>
            <th>Survey Rating Scale</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require_once 'Config.php';
          $Guidance_eval = $db->query('SELECT DISTINCT  survey_title, survey_ratingScale, ID FROM gac_teachereval')->fetchAll();

          $x = "";
          foreach ($Guidance_eval as $data) :
            if (
              isset($data["survey_title"]) && isset($data["survey_ratingScale"]) &&
              !empty($data["survey_title"]) && !empty($data["survey_ratingScale"])
            ) {
              echo '  <tr>
                                          <td>' . ++$x . '</td>
                                          <td>' . $data["survey_title"] . '</td>
                                          <td>' . $data["survey_ratingScale"] . '</td>';
          ?>
          <td>
            <a href="#" class="btn btn-info" onclick="viewSurvey(<?php echo $data["ID"] ?>, 'formContent');"><i
                class="bi bi-eye"></i></a>
            <a href="#" class="btn btn-danger"
              onclick="removeCurrentForm(<?php echo $data["ID"]; ?>, 'loadEvaluationTable');"><i
                class="bi bi-trash"></i></a>
          </td>
          </tr>
          <?php }
          endforeach;
          ?>

        </tbody>
      </table>
      <script>
      $(document).ready(function() {
        $('#StudentINFO').DataTable();
      });
      </script>
    </div>



    <!-- Modal evaluation-->
    <div class="modal fade" id="viewSurveyEval" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color:transparent; border:none;">
          <div class="modal-body" id="formContent"></div>
        </div>
      </div>
    </div>



    <!-- Modal Survey-->
    <div class="modal fade" id="makeSurvey" tabindex="-1" role="dialog" aria-labelledby="makeSurvey" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color:rgba(245, 254, 255, 1)">
            <h5 class="modal-title" id="">Set Student for survey</h5>
          </div>
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-12">
                <label for="">Student Course</label>
                <select class="form-select" aria-label="Default select example" id="stdCourse">
                  <option selected>Open this select menu</option>
                  <option value="BS Information Technology">BS Information Technology</option>
                  <option value="BS Hospitality Management">BS Hospitality Management</option>
                  <option value="BS Office Administration">BS Office Administration</option>
                  <option value="BS Business Administration">BS Business Administration</option>
                  <option value="BS Criminology">BS Criminology</option>
                  <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
                  <option value="Bachelor of Secondary Education">Bachelor of Secondary Education</option>
                  <option value="BS Computer Engineering">BS Computer Engineering</option>
                  <option value="Bachelor of Library in Information Science">Bachelor of Library in Information Science
                  </option>
                  <option value="BS Tourism Management">BS Tourism Management</option>
                  <option value="BS Entrepreneurship">BS Entrepreneurship</option>
                  <option value="BS Accounting Information System">BS Accounting Information System</option>
                  <option value="BS Psychology">BS Psychology</option>

                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-6">
                <label for="">School Year</label>
                <select class="form-select" aria-label="Default select example" id="stdSchoolYear">
                  <option selected value="" disabled>Select School Year</option>
                  <option value="2021-2022">2021-2022</option>
                  <option value="2020-2021">2020-2021</option>
                  <option value="2019-2020">2019-2020</option>
                  <option value="2018-2019">2018-2019</option>
                  <option value="2017-2018">2017-2018</option>
                  <option value="2016-2017">2016-2017</option>
                  <option value="2015-2016">2015-2016</option>
                  <option value="2014-2015">2014-2015</option>
                  <option value="2013-2014">2013-2014</option>
                  <option value="2012-2013">2012-2013</option>
                  <option value="2011-2012">2011-2012</option>
                  <option value="2010-2011">2010-2011</option>
                  <option value="2009-2010">2009-2010</option>
                  <option value="2008-2009">2008-2009</option>
                  <option value="2007-2008">2007-2008</option>
                  <option value="2006-2007">2006-2007</option>
                  <option value="2005-2006">2005-2006</option>
                  <option value="2004-2005">2004-2005</option>
                  <option value="2003-2004">2003-2004</option>
                  <option value="2002-2003">2002-2003</option>


                </select>
              </div>
              <div class="form-group col-6">
                <label for="">Year Level</label>
                <select class="form-select" aria-label="Default select example" id="stdyearLvl">
                  <option selected value="" disabled>Select year level</option>
                  <option value="1st Year">1st Year</option>
                  <option value="2nd Year">2nd Year</option>
                  <option value="3rd Year">3rd Year</option>
                  <option value="4th Year">4th Year</option>
                  <option value="All Year Level">All Year Level</option>
                </select>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" onclick="closeSurvey();" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <?php
            echo '<a  href="#" style="color:white;" onclick="forwardSurvey(' . $_SESSION["survey_ID"] . ');" class="btn btn-primary">Done</a>';
            ?>
          </div>
        </div>
      </div>
    </div>








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