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

<script type="text/javascript">
function getData(empid, SLG_ChangeContent) {
  $.ajax({
    url: 'Ajax/SetSTDdataLogs.php?empid=' + empid,
    success: function(html) {
      var ajaxDisplay = document.getElementById(SLG_ChangeContent);
      ajaxDisplay.innerHTML = html;
    }
  });
}
</script>


<!-- ======= Header ======= -->

<!-- Student Logs Forms -->
<script type="text/javascript">
function StdLGFormContent(changeValue, SLG_ChangeContent) {
  $.ajax({
    url: 'Ajax/LogForms.php?getFC=' + changeValue,
    success: function(html) {
      var ajaxDisplay = document.getElementById(SLG_ChangeContent);
      ajaxDisplay.innerHTML = html;
    }
  });
}
</script>

<!-- Student Logs Forms (OTHER)-->
<script type="text/javascript">
function Other(RStudentName, SLG_ChangeContent) {
  $.ajax({
    url: 'Ajax/LogForms_GMprps.php?getFCprps=' + RStudentName,
    success: function(html) {
      var ajaxDisplay = document.getElementById(SLG_ChangeContent);
      ajaxDisplay.innerHTML = html;
    }
  });
}
</script>

<!-- Student Logs -->
<script type="text/javascript">
function getStdLGTable(changeValue, StudentLogs) {
  $.ajax({
    url: 'Ajax/StdLGTable.php?getStdLGTable=' + changeValue,
    success: function(html) {
      var ajaxDisplay = document.getElementById(StudentLogs);
      ajaxDisplay.innerHTML = html;

      $(document).ready(function() {
        $('#StudentINFO').DataTable();
      });
    }
  });
}
</script>


<script type="text/javascript">
function getStdLGrecords(searchLogs, Stdlogs) {
  $.ajax({
    url: 'Ajax/SearchLogRec.php?getStdLGrecords=' + searchLogs,
    success: function(html) {
      var ajaxDisplay = document.getElementById(Stdlogs);
      ajaxDisplay.innerHTML = html;
    }
  });
}
</script>


<script type="text/javascript">
function changeIcon(Chngicon, icon38) {
  $.ajax({
    url: 'Ajax/iconChanged.php?changingIcon=' + Chngicon,
    success: function(html) {
      var ajaxDisplay = document.getElementById(icon38);
      ajaxDisplay.innerHTML = html;
    }
  });
}
</script>

<script type="text/javascript">
function removeTableDataLG(dlrw, rmvrw) {

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
        url: 'Ajax/removeTableDataLG.php?deleteRow=' + dlrw,
        success: function(html) {
          var ajaxDisplay = document.getElementById(rmvrw);
          ajaxDisplay.innerHTML = html;
        }
      });
    }
  });
}
</script>


<script>
function submitGoodmoralLogs(loadTableLogs) {
  $.ajax({
    url: 'Ajax/InsertLogs.php',
    success: function(html) {
      var tableAfterLogs = document.getElementById(loadTableLogs);
      tableAfterLogs.innerHTML = html;
      Swal.fire(
        'Log Success!',
        'Student already logged.',
        'success')
    }
  });
}
</script>

<script>
function submitGoodmoralOtherLogs(loadTableLogs) {
  var otherPurpose = document.getElementById("otherPurpose").value;

  $.ajax({
    url: 'Ajax/InsertGMotherLg.php?otherPurpose=' + otherPurpose,
    success: function(html) {
      var tableAfterLogs = document.getElementById(loadTableLogs);
      tableAfterLogs.innerHTML = html;
      Swal.fire(
        'Log Success!',
        'Student already logged.',
        'success')
    }
  });
}
</script>


<!-- <script type="text/javascript">
    function enabledSearchEngin(enable, searchBar){
        $.ajax({
            url: 'Ajax/enabledSearchEngin.php?deleteRow='+enable,
            success: function(html) {
                var ajaxDisplay = document.getElementById(searchBar);
                ajaxDisplay.innerHTML = html;
            }
        });
    }
</script> -->


<script type="text/javascript">
function tableRefresh(Stdlogs) {
  $.ajax({
    url: 'Ajax/logsTableRefresh.php',
    success: function(html) {
      var ajaxDisplay = document.getElementById(Stdlogs);
      ajaxDisplay.innerHTML = html;
    }
  });
}
</script>



<style>
.search {
  position: relative;
  box-shadow: 0 0 40px rgba(51, 51, 51, .1);
  background-color: transparent;
  margin: 0px;
}

.search input {

  text-indent: 15px;

}

.search input:focus {
  box-shadow: none;
}

.search .bi-search {
  position: absolute;
  top: 8px;
  left: 16px
}
</style>


</head>

<body style="background-color: white;">

  <!-- ======= Sidebar ======= -->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1 class="layout">Profiling</h1>
      <nav>
        <ol class="breadcrumb" style="background-color: transparent;">
          <li class="breadcrumb-item"><a href="index.php?id=<?php echo $_SESSION['success']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Profiling</li>
          <li class="breadcrumb-item active">Student Logs</li>
        </ol>
      </nav>
    </div><br><!-- End Page Title -->

    <!-- Button trigger modal -->



    <!-- <div class="form-group row"
           style="">
         <div class="col-sm-4 search" id="searchBar">
           <!-- <i class="bi bi-search"></i><input type="text" disabled class="form-control" placeholder="<?php if (isset($_SESSION["SStudent_ID"])) {
                                                                                                            echo $_SESSION["SStudent_ID"];
                                                                                                          } else {
                                                                                                            echo "Search Student ID";
                                                                                                          } ?>" id="searchLogs" onchange="getStdLGrecords(this.value, 'Stdlogs')"
           style="border:none; border-bottom: 2px solid grey; background-color:transparent;"
           > -->
    <!-- </div>
         <div class="col-sm-5"></div>
          <div class="col-sm-3">
            <select class="form-select "  name="formName" required id="changeValue" onchange="getStdLGTable(this.value, 'StudentLogs'), enabledSearchEngin(this.value, 'searchBar');" style="margin-left: 10%; width:90%;">
                <option value="" selected disabled >Select table</option>
                    <option value="Good_Moral">Good moral</option>
                    <option value="Alumni">Alumni</option>
                    <option value="Concern">Concern</option>
            </select>
           </div>
       </div> -->

    <ul class="nav nav-tabs"
      style="border-bottom: 5px solid  rgba(161, 213, 255, 0.1); box-shadow: 0 1px 0 0 rgba(161, 213, 255, 0.1);"
      id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="sl-tab" data-bs-toggle="tab" data-bs-target="#selectAll" type="button"
          role="tab" aria-controls="gm" aria-selected="true">Select all</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="alu-tab" data-bs-toggle="tab" data-bs-target="#alumni" type="button" role="tab"
          aria-controls="alu" aria-selected="false">Alumni</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="con-tab" data-bs-toggle="tab" data-bs-target="#concern" type="button" role="tab"
          aria-controls="con" aria-selected="false">Concern</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="gm-tab" data-bs-toggle="tab" data-bs-target="#gm" type="button" role="tab"
          aria-controls="gm" aria-selected="false">Good Moral</button>
      </li>
    </ul>
    <div class="tab-content pt-2" id="myTabContent">
      <div class="tab-pane fade show active" id="selectAll" role="tabpanel" aria-labelledby="sl-tab"><br>
        <table class="table table-hover" style="width:100%; font-size: 14px;" id="SelectAll">
          <thead style="background: rgba(161, 213, 255, 0.1);">
            <tr style="text-align:center;">
              <th>Student Name</th>
              <th>Type of Logs</th>
              <th>Purpose</th>
              <th>IN</th>
              <th>OUT</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="loadTableLogs">
            <?php
            require_once 'Config.php';
            $DefaultData = $db->query(' SELECT * FROM gac_logsdata ORDER BY created DESC')->fetchAll();
            foreach ($DefaultData as $data) :
              echo '<tr style="text-align:center;" id="rmvrw' . $data["ID"] . '" >

                                <td>' . $data["Student_Name"] . '</td>
                                <td>' . $data["LogsType"] . '</td>
                                <td>' . $data["Visit_Purpose"] . '</td>
                                <td>';
              if (isset($data["created"])) {
                echo '<i class="bi bi-check2-circle" style="color: green;"></i>';
              } else {
                echo '<i class="bi bi-x-circle"  style="color: red;"></i>';
              }
              echo '   </td>
                                <td id="icon' . $data["ID"] . '">';
              if (isset($data["updated"])) {
                echo '<i  class="bi bi-check2-circle" style="color: green;"></i>';
              } else {
                echo '<i  class="bi bi-x-circle"  style="color: red;"></i>';
              }
              echo   '</td>
                                <td  id="TDbutton">
                                <a Role="button" id="Chngicon"  onclick="changeIcon(' . $data["ID"] . ',';
              echo "'icon" . $data["ID"] . "'";
              echo ')"
                                class="btn btn-warning" style="background-color: #f5e282;"><i class="bi bi-box-arrow-right" style="color:#4a4945;"></i></a>

                                <a href="#" id="dlrw"  onclick="removeTableDataLG(' . $data["ID"] . ',';
              echo "'rmvrw" . $data["ID"] . "'";
              echo ')"
                                class="btn btn-danger" style="background-color: #ff6666;"><i class="bi bi-trash" style="color:#4a4945;"></i></a>
                                </td>
                          </tr>';
            endforeach;
            ?>
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="alumni" role="tabpanel" aria-labelledby="alu-tab"><br>

        <table class="table table-hover" style="width:100%; font-size: 14px;" id="alumni-table">
          <thead>
            <tr style="text-align:center;">
              <th>Student Name</th>
              <th>Type of Logs</th>
              <th>Purpose</th>
              <th>Yr Graduate</th>
              <th>IN</th>
              <th>OUT</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="Stdlogs">


            <?php
            require_once 'Config.php';
            $Alumni = $db->query(' SELECT * FROM gac_logsdata WHERE LogsType =? ORDER BY created DESC', "Alumni")->fetchAll();
            foreach ($Alumni as $data) :
              echo '<tr style="text-align:center;" id="rmvrw' . $data["ID"] . '">

                                      <td>' . $data["Student_Name"] . '</td>

                                      <td>' . $data["LogsType"] . '</td>
                                      <td>' . $data["Visit_Purpose"] . '</td>
                                      <td>' . $data["Year_Graduate"] . '</td>
                                      <td>';
              if (isset($data["created"])) {
                echo '<i class="bi bi-check2-circle" style="color: green;"></i>';
              } else {
                echo '<i class="bi bi-x-circle"  style="color: red;"></i>';
              }
              echo '   </td>
                                      <td id="icon' . $data["ID"] . '">';
              if (isset($data["updated"])) {
                echo '<i  class="bi bi-check2-circle" style="color: green;"></i>';
              } else {
                echo '<i  class="bi bi-x-circle"  style="color: red;"></i>';
              }
              echo   '</td>
                                      <td  id="TDbutton">
                                      <a Role="button" id="Chngicon"  onclick="changeIcon(' . $data["ID"] . ',';
              echo "'icon" . $data["ID"] . "'";
              echo ')"
                                      class="btn btn-warning" style="background-color: #f5e282;"><i class="bi bi-box-arrow-right" style="color:#4a4945;"></i></a>

                                      <a Role="button" id="dlrw"  onclick="removeTableDataLG(' . $data["ID"] . ',';
              echo "'rmvrw" . $data["ID"] . "'";
              echo ')"
                                      class="btn btn-danger" style="background-color: #ff6666;"><i class="bi bi-trash" style="color:#4a4945;"></i></a>
                                      </td>
                                </tr>';
            endforeach;
            ?>
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="concern" role="tabpanel" aria-labelledby="con-tab"><br>

        <table class="table table-hover" style="width:100%; font-size: 14px;" id="concern-table">
          <thead>
            <tr style="text-align:center;">
              <th>Student Name</th>
              <th>Type of Logs</th>
              <th>Purpose</th>
              <th>IN</th>
              <th>OUT</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="Stdlogs">
            <?php
            require_once 'Config.php';
            $Concern = $db->query(' SELECT * FROM gac_logsdata WHERE LogsType =? ORDER BY created DESC', "Concern")->fetchAll();
            foreach ($Concern as $data) :
              echo '<tr style="text-align:center;" id="rmvrw' . $data["ID"] . '">

                                    <td>' . $data["Student_Name"] . '</td>

                                    <td>' . $data["LogsType"] . '</td>
                                    <td>' . $data["Visit_Purpose"] . '</td>
                                    <td>';
              if (isset($data["created"])) {
                echo '<i class="bi bi-check2-circle" style="color: green;"></i>';
              } else {
                echo '<i class="bi bi-x-circle"  style="color: red;"></i>';
              }
              echo '   </td>
                                    <td id="icon' . $data["ID"] . '">';
              if (isset($data["updated"])) {
                echo '<i  class="bi bi-check2-circle" style="color: green;"></i>';
              } else {
                echo '<i  class="bi bi-x-circle"  style="color: red;"></i>';
              }
              echo   '</td>
                                    <td  id="TDbutton">
                                    <a Role="button" id="Chngicon"  onclick="changeIcon(' . $data["ID"] . ',';
              echo "'icon" . $data["ID"] . "'";
              echo ')"
                                    class="btn btn-warning" style="background-color: #f5e282;"><i class="bi bi-box-arrow-right" style="color:#4a4945;"></i></a>

                                    <a Role="button" id="dlrw"  onclick="removeTableDataLG(' . $data["ID"] . ',';
              echo "'rmvrw" . $data["ID"] . "'";
              echo ')"
                                    class="btn btn-danger" style="background-color: #ff6666;"><i class="bi bi-trash" style="color:#4a4945;"></i></a>

                                    </td>
                              </tr>';
            endforeach; ?>

          </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="gm" role="tabpanel" aria-labelledby="gm-tab"><br>

        <table class="table table-hover" style="width:100%; font-size: 14px;" id="gm-table">
          <thead>
            <tr style="text-align:center;">
              <th>Student Name</th>
              <th>Type of Logs</th>
              <th>Purpose</th>
              <th>IN</th>
              <th>OUT</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="Stdlogs">
            <?php
            require_once 'Config.php';

            $Goodmoral = $db->query(' SELECT * FROM gac_logsdata WHERE LogsType =?  ORDER BY created DESC', "Good moral")->fetchAll();

            foreach ($Goodmoral as $data) :
              echo '<tr style="text-align:center;" id="rmvrw' . $data["ID"] . '">

                                       <td>' . $data["Student_Name"] . '</td>

                                       <td>' . $data["LogsType"] . '</td>
                                       <td>' . $data["Visit_Purpose"] . '</td>
                                       <td>';
              if (isset($data["created"])) {
                echo '<i class="bi bi-check2-circle" style="color: green;"></i>';
              } else {
                echo '<i class="bi bi-x-circle"  style="color: red;"></i>';
              }
              echo '   </td>
                                       <td id="icon' . $data["ID"] . '">';
              if (isset($data["updated"])) {
                echo '<i  class="bi bi-check2-circle" style="color: green;"></i>';
              } else {
                echo '<i  class="bi bi-x-circle"  style="color: red;"></i>';
              }
              echo   '</td>
                                       <td  id="TDbutton">
                                       <a Role="button" id="Chngicon"  onclick="changeIcon(' . $data["ID"] . ',';
              echo "'icon" . $data["ID"] . "'";
              echo ')"
                                       class="btn btn-warning" style="background-color: #f5e282;"><i class="bi bi-box-arrow-right" style="color:#4a4945;"></i></a>

                                       <a Role="button" id="dlrw"  onclick="removeTableDataLG(' . $data["ID"] . ',';
              echo "'rmvrw" . $data["ID"] . "'";
              echo ')"
                                       class="btn btn-danger" style="background-color: #ff6666;"><i class="bi bi-trash" style="color:#4a4945;"></i></a>

                                       </td>
                                 </tr>';
            endforeach; ?>

          </tbody>
        </table>
      </div>
    </div>


    <script>
    $(document).ready(function() {
      $('#SelectAll').DataTable();
    });
    $(document).ready(function() {
      $('#alumni-table').DataTable();
    });
    $(document).ready(function() {
      $('#concern-table').DataTable();
    });
    $(document).ready(function() {
      $('#gm-table').DataTable();
    });
    </script>





    <!--Modal application for appointment-->
    <div class="modal animate__animated animate__fadeIn" id="AddAppointment" tabindex="-1" role="dialog"
      aria-labelledby="AddAppointment" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="CAmodalcontent" style="border-left: 3px solid #5e5e5e;
                                                               border-right: 3px solid #5e5e5e;
                                                               border-radius: 30px;">
          <div class="modal-header" style=" background: rgba(161, 213, 255, 0.4);
                                               border-top-left-radius: 30px;
                                               border-top-right-radius: 30px;
                                               ">
            <h5 id="TitleforSlip" class="animate__animated animate__zoomInDown">Student log form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-row">

              <div class="form-group col-md-6">
                <select class="form-select animate__animated animate__lightSpeedInRight" name="formName" required
                  id="changeValue" onchange="StdLGFormContent(this.value, 'SLG_ChangeContent')">
                  <option value="" selected disabled>Select Form</option>
                  <option value="Good_Moral">Good moral</option>
                  <option value="Alumni">Alumni </option>
                  <!-- <option value="SHS">Senior high School</option> -->
                  <!-- <option value="IODOCS">Incoming/Outgoing Documents</option> -->
                  <option value="Concern">Concern</option>
                </select>
              </div>

              <div class="form-group col-md-6">
                <form method="POST" action="">
                  <!-- <button type="submit" style="visibility: hidden" name="SearchStudent" class="btn btn-info form-control animate__animated animate__zoomInDown "><i class="bi bi-search "></i></button> -->
                  <input type="text" required class="form-control animate__animated animate__zoomInDown" id="search"
                    name="StudentKey"
                    placeholder="<?php if (isset($_SESSION["Student_ID"])) {
                                                                                                                                                      echo $_SESSION["Student_ID"];
                                                                                                                                                    } else {
                                                                                                                                                      echo "Search ID or Name";
                                                                                                                                                    } ?>"
                    onchange="getData(this.value, 'SLG_ChangeContent')">
                </form>
              </div>
            </div>

            <form method="POST" action="" enctype="multipart/form-data">
              <!-- change content  -->
              <div id="SLG_ChangeContent"> <br><label for="referral">
                  <span style="font-style: italic;">Please select log form!</span></label>

                <div id="Purpose"></div>

              </div>
              <!--end change content  -->
          </div> <!-- end of modal body -->
          </form>
        </div>
      </div>
    </div <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["SearchStudent"])) {
            echo " <script>
                 getData(" . $_POST["SearchStudent"] . ", 'displaydata');
              </script>";
          }
          ?> <?php
              if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["StudentLogs"])) {
                require_once 'Config.php';
                include 'SForms\timezone.php';

                // if ($_SESSION["StudentLogs"] == "Good_Moral" || isset($_POST["formName"]))
                // {
                //       $Good_Moral = $db->query('INSERT INTO gac_logsdata (Student_ID, Student_Name, Student_Section, Student_Course,  Visit_Purpose, LogsType, created)  VALUES (?,?,?,?,?,?,?)' ,
                //
                //       $_SESSION["Student_ID".$_SESSION['success'].""],
                //       $_SESSION["Student_Name".$_SESSION['success'].""],
                //       $_SESSION["Student_Section".$_SESSION['success'].""],
                //       $_SESSION["Student_Course".$_SESSION['success'].""],
                //       $_SESSION["Purpose".$_SESSION['success'].""],
                //       "Good Moral",
                //       $time);
                //
                //       if ($Good_Moral->affectedRows() == 1)
                //       {
                //
                //       }
                // }
                if ($_SESSION["StudentLogs"] == "Alumni") {
                  $Alumni = $db->query(
                    'INSERT INTO gac_logsdata (Student_ID, Student_Name, Student_Section, Student_Course,  Year_Graduate, Visit_Purpose, LogsType, created)  VALUES (?,?,?,?,?,?,?,?)',
                    $_SESSION["Student_ID" . $_SESSION['success'] . ""],
                    $_SESSION["Student_Name" . $_SESSION['success'] . ""],
                    $_SESSION["Student_Section" . $_SESSION['success'] . ""],
                    $_SESSION["Student_Course" . $_SESSION['success'] . ""],
                    $_POST["alumniYGR"],
                    $_POST["alumniPRP"],
                    "Alumni",
                    $time
                  );

                  if ($Alumni->affectedRows() == 1) {
                  }
                }
                if ($_SESSION["StudentLogs"] == "SHS") {
                }
                if ($_SESSION["StudentLogs"] == "IODOCS") {
                }
                if ($_SESSION["StudentLogs"] == "Concern") {
                  $Concern = $db->query(
                    'INSERT INTO gac_logsdata (Student_ID, Student_Name, Student_Section, Student_Course,  Visit_Purpose, LogsType, created)  VALUES (?,?,?,?,?,?,?)',
                    $_SESSION["Student_ID" . $_SESSION['success'] . ""],
                    $_SESSION["Student_Name" . $_SESSION['success'] . ""],
                    $_SESSION["Student_Section" . $_SESSION['success'] . ""],
                    $_SESSION["Student_Course" . $_SESSION['success'] . ""],
                    $_POST["concernINFO"],
                    "Concern",
                    $time
                  );

                  if ($Concern->affectedRows() == 1) {
                  }
                }
              }
              ?> <!--Chat support content-->
    <!-- <div class="form-row fixed-bottom " >
            <div class="form-group col-md-11"></div>
            <div class="form-group  col-md-1 ">

                <?php
                if (isset($_SESSION["KEY"])) {
                  echo '<button type="button" name="Convo" class="btn btn-info  form-control animate__animated animate__slideInRight " data-toggle="modal" data-target="#Convowithstudent" ';
                } else {
                  echo '<button type="button" name="Convo" disabled class="btn btn-info  form-control animate__animated animate__slideInRight " data-toggle="modal" data-target="#Convowithstudent" ';
                }


                echo 'style="background-image: linear-gradient(to right,  #6699ff ,  #4d88ff);
                               box-shadow: 5px 7px 17px grey;
                               border-radius: 50px;
                               width: 60px;
                               height: 60px;

                        ">';
                ?>

                    <i class="bi bi-chat-square-quote" style="font-size: 25px; color: white; "></i>
                </button></div>
        </div> -->




    <div id="InfoButton" class="nav-content collapse ">







      <!-- Logs Modal -->
      <div class="form-row fixed-bottom ">
        <div class="form-group col-md-11"></div>
        <div class="form-group  col-md-1 ">
          <button type="button" name="SearchStudent"
            class="btn btn-info  form-control animate__animated animate__bounceInUp " data-toggle="modal"
            data-target="#AddAppointment" style="background-image: linear-gradient(to right,  #6666ff ,  #4d88ff);
                                   box-shadow: 5px 7px 17px grey;
                                   border-radius: 50px;
                                   width: 50px;
                                   height: 50px;
                                   position: relative;
                                   top: -120px;

                            ">
            <i class="bi bi-journal-text" style="margin-left: -8px; font-size: 20px; color: white; "></i>
          </button>
        </div>
      </div>




      <div class="form-row fixed-bottom ">
        <div class="form-group col-md-11"></div>
        <div class="form-group  col-md-1 ">

          <?php
          if (isset($_SESSION["KEY"])) {
            echo '<button type="button" name="Convo" class="btn btn-info  form-control animate__animated animate__bounceInUp " data-toggle="modal" data-target="#Convowithstudent" ';
          } else {
            echo '<button type="button" name="Convo" disabled class="btn btn-info  form-control animate__animated animate__bounceInUp " data-toggle="modal" data-target="#Convowithstudent" ';
          }


          echo 'style="background-image: linear-gradient(to right,  #6699ff ,  #4d88ff);
                                   box-shadow: 5px 7px 17px grey;
                                   border-radius: 50px;
                                   width: 50px;
                                   height: 50px;
                                   position: relative;
                                   top: -65px;

                            ">';
          ?>

          <i class="bi bi-chat-square-quote" style=" margin-left: -8px; font-size: 20px; color: white; "></i>
          </button>
        </div>
      </div>


    </div>


    <div class="form-row fixed-bottom ">
      <div class="form-group col-md-11"></div>
      <div class="form-group  col-md-1 ">
        <a class="nav-link collapsed btn btn-info" data-bs-target="#InfoButton" data-bs-toggle="collapse" href="#"
          id="Eguls">
          <i class="bi bi-menu-button" style="margin-left: -8px; font-size: 20px; color: white; text-align: center;"></i>
        </a>
      </div>
    </div>


    <?php include 'ChatBox.php'; ?>


  </main><!-- End #main -->

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
