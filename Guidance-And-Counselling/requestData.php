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
function healthCheckReqForm(RequestContent) {
  $.ajax({
    url: 'ajaxRequestForm/healthCheckRequest.php',
    success: function(html) {
      var datmsForm = document.getElementById(RequestContent);
      datmsForm.innerHTML = html;
    }
  });
}
</script>

<script>
function medicalReqForm(RequestContent) {
  $.ajax({
    url: 'ajaxRequestForm/medicalRequest.php',
    success: function(html) {
      var datmsForm = document.getElementById(RequestContent);
      datmsForm.innerHTML = html;
    }
  });
}
</script>

<script>
function studentServiceReqForm(RequestContent) {
  $.ajax({
    url: 'ajaxRequestForm/studentServiceRequest.php',
    success: function(html) {
      var datmsForm = document.getElementById(RequestContent);
      datmsForm.innerHTML = html;
    }
  });
}
</script>


<script>
function datmsReqForm(RequestContent) {
  $.ajax({
    url: 'ajaxRequestForm/datmsFormRequest.php',
    success: function(html) {
      var datmsForm = document.getElementById(RequestContent);
      datmsForm.innerHTML = html;
    }
  });
}
</script>

<script>
function submitDTMSRequest(table) {
  var stdyearLvl = document.getElementById("stdyearLvl").value;
  var stdSchoolYear = document.getElementById("stdSchoolYear").value;
  var stdCourse = document.getElementById("stdCourse").value;

  var intoArray =

    'stdyearLvl=' + stdyearLvl +
    '&stdSchoolYear=' + stdSchoolYear +
    '&stdCourse=' + stdCourse;

  if (stdyearLvl == '' || stdSchoolYear == '' || stdCourse == '') {
    Swal.fire(
      'Incomplete!',
      'You must complete all Information.',
      'warning')
  } else {
    Swal.fire({
      title: 'Create this request',
      text: "Request will receive by Document tracking System",
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete a request!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: 'ajaxRequestForm/requestFunction/sendRequestDTMS.php',
          data: intoArray,
          cache: false,
          success: function(html) {
            Swal.fire(
              'Success!',
              'Request has been created.',
              'success');

          }
        });
      }
    });
  }
}
</script>

<script>
function editRequestDTMS(editID, table) {
  $.ajax({
    url: 'ajaxRequestForm/refreshRequestTable/editRequest.php?dtReq=' + editID,
    success: function(html) {

    }
  });
}

function deleteRequestDTMS(deleteID, table) {
  Swal.fire({
    title: 'Delete this request',
    text: "You can't revert this request",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, make a request!'
  }).then((result) => {
    if (result.isConfirmed) {

      $.ajax({
        url: 'ajaxRequestForm/refreshRequestTable/deleteRequest.php?rmvID=' + deleteID,
        success: function(html) {
          Swal.fire(
            'Success!',
            'Request has been deleted.',
            'success');
          $.ajax({
            url: 'ajaxRequestForm/refreshRequestTable/dtmsTable.php',
            success: function(html) {
              var dtmsLoadTable = document.getElementById(table);
              dtmsLoadTable.innerHTML = html;
              $(document).ready(function() {
                $('#DATMSINFO').DataTable();
              });
            }
          });
        }
      });
    }
  });
}
</script>

</head>



<main id="main" class="main">
  <div class="pagetitle">
    <h1 class="layout">Request Data</h1>
    <nav>
      <ol class="breadcrumb" style="background-color: transparent;">
        <li class="breadcrumb-item"><a href="index.php?id=<?php echo $_SESSION['success']; ?>">Home</a></li>
        <li class="breadcrumb-item active">Request Data</li>
        <li class="breadcrumb-item active">Request Status</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="hcm-tab" onclick="healthCheckReqForm('RequestContent');" data-bs-toggle="tab"
        data-bs-target="#hcm" type="button" role="tab" aria-controls="hcm" aria-selected="true">Health Check </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="ms-tab" onclick="medicalReqForm('RequestContent');" data-bs-toggle="tab"
        data-bs-target="#ms" type="button" role="tab" aria-controls="ms" aria-selected="false">Medical System</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="ss-tab" onclick="studentServiceReqForm('RequestContent');" data-bs-toggle="tab"
        data-bs-target="#ss" type="button" role="tab" aria-controls="ss" aria-selected="false">Student Service</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="clearance-tab" onclick="datmsReqForm('RequestContent');" data-bs-toggle="tab"
        data-bs-target="#clearance" type="button" role="tab" aria-controls="clearance"
        aria-selected="false">Clearance</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="DATMsS-tab" onclick="datmsReqForm('RequestContent');" data-bs-toggle="tab"
        data-bs-target="#DATMS" type="button" role="tab" aria-controls="DATMS" aria-selected="false">Student
        data</button>
    </li>
  </ul>






  <div class="tab-content pt-2" id="myTabContent">
    <div class="tab-pane fade show active" id="hcm" role="tabpanel" aria-labelledby="hcm-tab">
      <div class="card p-3">
        <table class="table table-hover" style="width:100%; font-size: 14px; text-align:center;" id="hcmINFO">
          <thead style="background: rgba(161, 213, 255, 0.1);">
            <tr style="">
              <th>Department</th>
              <th>Student Count</th>
              <th>Remarks</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Health Check Monitoring</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Pending</td>
              <td>Button Action</td>
            </tr>
            <tr>
              <td>Medical System</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Pending</td>
              <td>Button Action</td>
            </tr>
            <tr>
              <td>Student Service</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Requesting</td>
              <td>Button Action</td>
            </tr>
            <tr>
              <td>Clearance</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Requesting</td>
              <td>Button Action</td>
            </tr>
            <tr>
              <td>Document Approval Tranking And Mngt</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Pending</td>
              <td>Button Action</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="tab-pane fade" id="ms" role="tabpanel" aria-labelledby="ms-tab">
      <div class="card p-3">
        <table class="table table-hover" style="width:100%; font-size: 14px; text-align:center;" id="msINFO">
          <thead style="background: rgba(161, 213, 255, 0.1);">
            <tr style="">
              <th>Department</th>
              <th>Student Count</th>
              <th>Remarks</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Health Check Monitoring</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Pending</td>
              <td>Button Action</td>
            </tr>
            <tr>
              <td>Medical System</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Pending</td>
              <td>Button Action</td>
            </tr>
            <tr>
              <td>Student Service</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Requesting</td>
              <td>Button Action</td>
            </tr>
            <tr>
              <td>Clearance</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Requesting</td>
              <td>Button Action</td>
            </tr>
            <tr>
              <td>Document Approval Tranking And Mngt</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Pending</td>
              <td>Button Action</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="tab-pane fade" id="ss" role="tabpanel" aria-labelledby="ss-tab">
      <div class="card p-3">
        <table class="table table-hover" style="width:100%; font-size: 14px; text-align:center;" id="ssINFO">
          <thead style="background: rgba(161, 213, 255, 0.1);">
            <tr style="">
              <th>Department</th>
              <th>Student Count</th>
              <th>Remarks</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Health Check Monitoring</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Pending</td>
              <td>Button Action</td>
            </tr>
            <tr>
              <td>Medical System</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Pending</td>
              <td>Button Action</td>
            </tr>
            <tr>
              <td>Student Service</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Requesting</td>
              <td>Button Action</td>
            </tr>
            <tr>
              <td>Clearance</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Requesting</td>
              <td>Button Action</td>
            </tr>
            <tr>
              <td>Document Approval Tranking And Mngt</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Pending</td>
              <td>Button Action</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="tab-pane fade" id="clearance" role="tabpanel" aria-labelledby="clearance-tab">
      <div class="card p-3">
        <table class="table table-hover" style="width:100%; font-size: 14px; text-align:center;" id="clINFO">
          <thead style="background: rgba(161, 213, 255, 0.1);">
            <tr style="">
              <th>Department</th>
              <th>Student Count</th>
              <th>Remarks</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Health Check Monitoring</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Pending</td>
              <td>Button Action</td>
            </tr>
            <tr>
              <td>Medical System</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Pending</td>
              <td>Button Action</td>
            </tr>
            <tr>
              <td>Student Service</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Requesting</td>
              <td>Button Action</td>
            </tr>
            <tr>
              <td>Clearance</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Requesting</td>
              <td>Button Action</td>
            </tr>
            <tr>
              <td>Document Approval Tranking And Mngt</td>
              <td>30</td>
              <td>Some Remarks</td>
              <td>Pending</td>
              <td>Button Action</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="tab-pane fade" id="DATMS" role="tabpanel" aria-labelledby="DATMS-tab">
      <div class="card p-3">
        <div id="dtmsTable">
          <table class="table table-hover" style="width:100%; font-size: 14px; text-align:center;" id="DATMSINFO">
            <thead style="background: rgba(161, 213, 255, 0.1);">
              <tr style="">
                <th>Department</th>
                <th>Status</th>
                <th>Classification</th>
                <th>Course</th>
                <th>School year</th>
                <th>Year Level</th>
                <th>Remarks</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once 'Config.php';
              $dtmsRequest = $db->query('SELECT * FROM gac_datarequest ORDER By created_at DESC')->fetchAll();
              foreach ($dtmsRequest as $request) {
                if ($request["Request_Status"] == "Pending") {
                  echo
                  '<tr>
                              <td>' . $request["Department"] . '</td>
                              <td>' . $request["Request_Status"] . '</td>
                              <td>' . $request["Student_Classification"] . '</td>
                              <td>' . $request["Student_Course"] . '</td>
                              <td>' . $request["Student_School_year"] . '</td>
                              <td>' . $request["Student_Year_Level"] . '</td>';
                  if ($request["Request_Remarks"] != null) echo '  <td>' . $request["Request_Remarks"] . '</td>';
                  else echo '<td> - </td>';
                  echo
                  '<td>

                                <button type="button" onclick="deleteRequestDTMS(' . $request["ID"] . ',';
                  echo "'dtmsTable'";
                  echo ');" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                             </td>
                          </tr>';
                } else {
                  echo
                  '<tr>
                              <td>' . $request["Department"] . '</td>
                              <td>' . $request["Request_Status"] . '</td>
                              <td>' . $request["Student_Classification"] . '</td>
                              <td>' . $request["Student_Course"] . '</td>
                              <td>' . $request["Student_School_year"] . '</td>
                              <td>' . $request["Student_Year_Level"] . '</td>';
                  if ($request["Request_Remarks"] != null) echo '  <td>' . $request["Request_Remarks"] . '</td>';
                  else echo '<td> - </td>';
                  echo
                  '<td>

                                <button type="button"  disabled class="btn btn-danger"><i class="bi bi-trash"></i></button>
                             </td>
                          </tr>';
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



  <script>
  $(document).ready(function() {
    $('#hcmINFO').DataTable();
  });
  $(document).ready(function() {
    $('#msINFO').DataTable();
  });
  $(document).ready(function() {
    $('#ssINFO').DataTable();
  });
  $(document).ready(function() {
    $('#clINFO').DataTable();
  });
  $(document).ready(function() {
    $('#DATMSINFO').DataTable();
  });
  </script>


  <div class="form-row fixed-bottom ">
    <div class="form-group col-md-11"></div>
    <div class="form-group  col-md-1 ">

      <button type="button" name="Convo" class="btn btn-info  form-control animate__animated animate__slideInRight "
        data-toggle="modal" data-target="#requestModal" style="background-image: linear-gradient(to right,  #6699ff ,  #4d88ff);
                                   box-shadow: 5px 7px 17px grey;
                                   border-radius: 50px;
                                   width: 50px;
                                   height: 50px;

                      ">

        <i class="bi bi-clipboard-data" style="font-size: 20px; color: white; "></i>
      </button>
    </div>
  </div>



  <div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div id="RequestContent">
          <div class="modal-header" style="background-color:rgba(245, 254, 255, 1)">
            <h5 class="modal-title" id="exampleModalLongTitle">Healt Check Request</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-row">
              <div class="form-group col-12">
                <label for="">Student Course</label>
                <select class="form-select" aria-label="Default select example">
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
                <select class="form-select" aria-label="Default select example">
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
                <select class="form-select" aria-label="Default select example">
                  <option selected value="" disabled>Select year level</option>
                  <option value="1st Year">1st Year</option>
                  <option value="2nd Year">2nd Year</option>
                  <option value="3rd Year">3rd Year</option>
                  <option value="4th Year">4th Year</option>
                  <option value="All Year Level">All Year Level</option>
                </select>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Create Request</button>
            </div>
          </div>

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