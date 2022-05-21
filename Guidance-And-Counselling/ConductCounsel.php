<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'include/external.php';
  include 'include/header.php'; ?>
  <link rel="stylesheet" href="mdb5-free-standard/css/mdb.min.css">
  <script src="mdb5-free-standard/js/mdb.min.js"></script>
  <!-- ======= Sidebar ======= -->
  <?php include 'include/asideSidebar.php'; ?>

  <style>
  #ModalBody::-webkit-scrollbar {
    display: none;
  }

  #SelectData {
    color: black;
    border-left: 3px solid #5e5e5e;
    border-right: 3px solid #5e5e5e;
    border-radius: 10px;
    font-family: "Lucida Console", "Courier New", monospace;
    transition: color 2s;
  }
  </style>





  <script>
  function openChatBox(tmp, id) {
    $.ajax({
      url: 'Ajax/openChatBox_CC.php?creqID=' + id,
      success: function(html) {
        $(document).ready(function() {
          $("#Convowithstudent").modal("show");
        });
      }
    });
  }
  </script>

</head>

<body style="background-color: white;">


  <main id="main" class="main">
    <div class="pagetitle">
      <h1 class="layout">Counseling Services</h1>
      <nav>
        <ol class="breadcrumb" style="background-color: transparent;">
          <li class="breadcrumb-item"><a href="index.php?id=<?php echo $_SESSION['success']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Counseling Services</li>
          <li class="breadcrumb-item active">Conduct Counsel</li>
          <li class="breadcrumb-item active" id="DATA">
            <?php
            if (isset($_SESSION["secondTitle"])) {
              echo $_SESSION["secondTitle"];
            } else {
              echo "Counseling";
            }
            ?>
          </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!-- <form method="POST" action="" enctype="multipart/form-data" action="">
               <div class="form-group row"
                    style="">
                  <div class="col-sm-9"></div>
                   <div class="col-sm-3">
                       <select class="form-select" name="Counselect"  onchange='this.form.submit()'  id="SelectData" style="margin-left: 10%; width:90%;">

                                <option disabled selected  value="" >Select data</option>
                                <option value="Counseling">Couseling Data</option>
                                <option value="Testing">Testing Data</option>
                        </select>
                    </div>
                </div>
            <form> -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="testing-tab" data-bs-toggle="tab" data-bs-target="#testing" type="button"
          role="tab" aria-controls="testing" aria-selected="true">Counseling</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="counseling-tab" data-bs-toggle="tab" data-bs-target="#counseling" type="button"
          role="tab" aria-controls="counseling" aria-selected="false">Testing</button>
      </li>
    </ul>

    <div class="tab-content pt-2" id="myTabContent">
      <div class="tab-pane fade show active" id="testing" role="tabpanel" aria-labelledby="home-tab">
        <div class="card p-3">
          <table class="table  table-hover" style="width:100%;  text-align:center; font-size: 14px" id="Counseling">
            <thead style="background: rgba(161, 213, 255, 0.1);">
              <tr>
                <th>Student Name</th>
                <th>Year Level</th>
                <th>Test Status</th>
                <th>Action </th>
              </tr>
            </thead>
            <tbody>
              <!-- $data['Request_KEY'] -->
              <?php
              require_once 'Config.php';
              $studentData = $db->query('SELECT * FROM counselrequest WHERE Status = "Counseling"')->fetchAll();
              foreach ($studentData as $data) :  $date = date_create($data['Schedule']);
                echo '<tr style=" text-align:center;">
                                  <td>' . $data['Student_Name'] . '</td>
                                  <td>' . date_format($date, 'g:ia \o\n l jS F Y') . '</td>
                                  <td>' . $data['Status'] . '</td>

                                  <td style="" id="TDbutton">

                                      <a  href="#" onclick="openChatBox(this.value, ' . $data["ID"] . ');"
                                       class="btn btn-info"    style="background-color: #6699ff; color:white;" id="chats" ><i class="bi bi-chat-square-quote"></i></a>

                                      <a href="ConductCounsel.php?id=' . $_SESSION['success'] . '&LCUploadForms=' . $data['Request_KEY'] . '" class="btn btn-info"  style="background-color: #ccffff;" ><i class="bi bi-card-image" style="color:black;"></i></a>';

                if (isset($data["Request_KEY"])) {
                  require_once 'Config.php';
                  $valRefs = $db->query('SELECT * FROM counseledlist WHERE Request_Key=? AND Counsel_Forms IS NOT NULL',  $data["Request_KEY"]);

                  if ($valRefs->numRows() == 1) {
                    echo ' <a href="ConductCounsel.php?id=' . $_SESSION['success'] . '&CAEndSession=' . $data['ID'] . '"  class="btn btn-success"  style="background-color: #99ffbb; " ><i class="bi bi-person-check-fill" style="color:black;"></i></a>';
                  } else {
                    echo ' <a href="javascript:void(0)" disabled="disabled" class="btn btn-disabled "       data-toggle="tooltip" data-placement="left" title="Upload counseling form"  style="background-color: #99ffbb;" ><i class="bi bi-person-check-fill" style="color:black;"></i></a>';
                  }
                }
                echo ' </td></tr>';
              endforeach;
              ?>


          </table>
        </div>
      </div>
      <div class="tab-pane fade " id="counseling" role="tabpanel" aria-labelledby="profile-tab">
        <div class="card p-3">
          <table class="table table-hover" style="width:100%;  text-align:center; font-size: 14px" id="StudentINFO">
            <?php

            echo '<thead style="background: rgba(161, 213, 255, 0.1);">
                              <tr>
                                  <th>Student Name</th>
                                  <th>Year Level</th>
                                  <th>Test Status</th>
                                  <th>Action </th>
                              </tr>
                          </thead>
                          <tbody >';

            require_once 'Config.php';
            $studentData = $db->query('
                                                  SELECT  CR.Student_Name AS CRSN, CR.Student_yrlvl AS CRSY, CR.ID AS CRID, CL.Testing_Status AS CLTS, CL.ID AS CLID, CL.Request_KEY AS CLRK
                                                  FROM counselrequest AS CR
                                                  INNER JOIN counseledlist CL
                                                  ON CR.Request_KEY = CL.Request_Key WHERE CR.Status = "Referral"')->fetchAll();

            foreach ($studentData as $data) :
              echo '<tr>
                                      <td>' . $data['CRSN'] . '</td>
                                      <td>' . $data['CRSY'] . '</td>';

              if (isset($data['CLTS'])) {
                echo '<td>' . $data['CLTS'] . '</td>';
              } else {
                echo '<td>No test</td>';
              }

              echo '<td style="" id="TDbutton">
                                          <a href="ConductCounsel.php?id=' . $_SESSION['success'] . '&CAChats=' . $data['CLRK'] . '"  class="btn btn-info"    style="background-color: #6699ff" id="chats" data-toggle="tooltip" data-placement="top" title="Chat with Student"><i class="bi bi-chat-square-quote"></i></a>
                                          <a href="ConductCounsel.php?id=' . $_SESSION['success'] . '&CCAddscore=' . $data['CLRK'] . '" class="btn btn-info"  style="background-color: #b3ecff;"         data-toggle="tooltip" data-placement="top" title="Insert Score made by testing"><i class="bi bi-plus-lg" style="color: black;"></i></a>';

              require_once 'Config.php';


              $valRef = $db->query('SELECT * FROM counseledlist WHERE Request_Key =? AND Testing_Status IS NOT NULL', $data["CLRK"])->fetchArray();
              if (isset($valRef["Testing_Status"])) {
                echo ' <a href="ConductCounsel.php?id=' . $_SESSION['success'] . '&CAEndSession=' . $data['CRID'] . '" class="btn btn-success"  style="background-color: #99ffbb;"><i class="bi bi-person-check-fill" style="color:black;"></i></a>';
              } else {
                echo ' <a href="javascript:void(0)" disabled="disabled" class="btn btn-disabled "       data-toggle="tooltip" data-placement="left" title="Set Student Testing Score +"  style="background-color: #99ffbb; "><i class="bi bi-person-check-fill" style="color:black;"></i></a>';
              }
              echo '  </td>
                                </tr>';
            endforeach;
            ?>
          </table>
        </div>
      </div>
    </div>

    <script>
    $(document).ready(function() {
      $('#StudentINFO').DataTable();
    });

    $(document).ready(function() {
      $('#Counseling').DataTable();
    });
    </script>
    <?php


    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['CAChats']) && isset($_SESSION['success'])) {

      require_once 'Config.php';
      $Studentdata = $db->query('SELECT * FROM counselrequest WHERE Request_KEY = ?', $_GET['CAChats'])->fetchArray();
      $_SESSION["KEY"] = $_GET['CAChats'];
      if (isset($Studentdata["Student_ID"]) && $Studentdata["Student_Name"] && isset($Studentdata["Request_KEY"])) {
        $_SESSION["Student_ID" . $_SESSION['success'] . ""]     = $Studentdata["Student_ID"];
        $_SESSION["Student_Name" . $_SESSION['success'] . ""]   = $Studentdata["Student_Name"];
        $_SESSION["Request_KEY" . $_SESSION['success'] . ""]    = $Studentdata["Request_KEY"];
      }

      echo '<script>
                                $(document).ready(function(){
                                 $("#Convowithstudent").modal("show");
                                });
                             </script>';
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['CCAddscore']) && isset($_SESSION['success'])) {
      require_once 'Config.php';
      $StudentSched = $db->query('SELECT * FROM counseledlist WHERE Request_KEY = ?', $_GET['CCAddscore'])->fetchArray();
      if (isset($StudentSched["Student_ID"]) && $StudentSched["Student_Name"]) {
        $_SESSION["Student_ID" . $_SESSION['success'] . ""]     = $StudentSched["Student_ID"];
        $_SESSION["Student_Name" . $_SESSION['success'] . ""]   = $StudentSched["Student_Name"];
        $_SESSION["Request_KEY" . $_SESSION['success'] . ""]    = $StudentSched["Request_Key"];
      }
      echo  '<script>
                                    $(document).ready(function(){
                                     $("#AddScore").modal("show");});
                                   </script>';
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['LCUploadForms']) && isset($_SESSION['success'])) {
      require_once 'Config.php';
      $StudentSched = $db->query('SELECT * FROM counselrequest WHERE Request_KEY = ?', $_GET['LCUploadForms'])->fetchArray();
      if (isset($StudentSched["Student_ID"]) && $StudentSched["Student_Name"]) {
        $_SESSION["Student_ID" . $_SESSION['success'] . ""]     = $StudentSched["Student_ID"];
        $_SESSION["Student_Name" . $_SESSION['success'] . ""]   = $StudentSched["Student_Name"];
        $_SESSION["Request_KEY" . $_SESSION['success'] . ""]    = $StudentSched["Request_KEY"];

        include 'fetchStdInfo.php';
      }
      echo '<script>
                                    $(document).ready(function(){
                                     $("#InsertForms").modal("show");});
                                 </script>';
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['CAEndSession']) && isset($_SESSION['success'])) {

      require_once 'Config.php';
      $StudentSched = $db->query('SELECT * FROM counselrequest WHERE ID = ?', $_GET['CAEndSession'])->fetchArray();
      if (isset($StudentSched["Student_ID"]) && $StudentSched["Student_Name"]) {
        $_SESSION["Student_ID" . $_SESSION['success'] . ""]     = $StudentSched["Student_ID"];
        $_SESSION["Student_Name" . $_SESSION['success'] . ""]   = $StudentSched["Student_Name"];
        $_SESSION["Description" . $_SESSION['success'] . ""]    = $StudentSched["Description"];
        $_SESSION["Request_KEY" . $_SESSION['success'] . ""]    = $StudentSched["Request_KEY"];
      }
      $_SESSION['Complete']       = "Complete";

    ?>
    <script>
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to end this session?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Complete'
    }).then((result) => {
      if (result.isConfirmed) {
        location.href =
          'ConductCounsel.php?id=<?php echo $_SESSION['success'] . "&Complete=" . $_GET['CAEndSession']; ?>';
      }
    });
    </script>
    <?php



    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      if (isset($_GET['Complete']) && isset($_SESSION['Complete'])) :
        unset($_SESSION['Complete']);
        include 'SForms/timezone.php';
        require_once 'Config.php';
        $Complete = $db->query('UPDATE counselrequest SET Status=?, update_at=? WHERE ID=?', "Complete", $time, $_GET['Complete']);


        require_once  'Config.php';
        $DeleteConvo    = $db->query('DELETE FROM conversation WHERE Request_KEY=? AND Employee_ID=?', $_SESSION["Request_KEY" . $_SESSION["success"] . ""], $_SESSION["User_ID" . $_SESSION["success"] . ""]);

        require_once  'Config.php';
        $DeleteMess     = $db->query('DELETE FROM notification WHERE Request_KEY=? AND User_ID=?', $_SESSION["Request_KEY" . $_SESSION["success"] . ""], $_SESSION["User_ID" . $_SESSION["success"] . ""]);

        echo "<script>
                                         location.href = 'ConductCounsel.php?id=" . $_SESSION['success'] . "&Completes=KEY';
                                    </script>";
      endif;
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $_SESSION['Completes'] = "Success";
      if (isset($_GET['Completes']) && isset($_SESSION['Completes'])) :
        unset($_SESSION['Completes']);
        echo "<script>
                                        Swal.fire(
                                            'Sesson complete',
                                            'Student can make a feedback!.',
                                            'success' )
                                      </script>";
      endif;
    }
    ?>

    <!-- Insert Forms -->
    <div class="modal fade" id="InsertForms" tabindex="-1" role="dialog" aria-labelledby="InsertForms"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="CCmodalcontent">
          <div class="modal-header" id="modalTitle">
<<<<<<< Updated upstream
        <h5 class="modal-title animate__animated animate__zoomInDown" id="FormTitle">Upload Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick=" HideForm();" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >

          <form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">

                        <div class="form-row" >
                          <div class="form-group col-md-4">
                              <input type="text" id="CSID" name="StudentID" required disabled class="form-control animate__animated animate__bounceInLeft"  value="<?php if(isset($_SESSION["Student_ID".$_SESSION['success'].""])) { echo $_SESSION["Student_ID".$_SESSION['success'].""]; } ?>">
                          </div>
                          <div class="form-group col-md-8" >
                              <input  type="text" id="CSname" name="StudentName" required  disabled class="form-control animate__animated animate__bounceInRight"  value="<?php if(isset($_SESSION["Student_Name".$_SESSION['success'].""])) { echo $_SESSION["Student_Name".$_SESSION['success'].""]; }   ?>">
                          </div>
                      </div>

                      <div class="form-row" >
                          <div class="form-group col-md-12" >
                              <input  type="text" id="CName" name="CounselorName" required   placeholder="Enter counselor name" class="form-control animate__animated animate__bounceInLeft" >
                          </div>
                      </div>


              <div class="form-row" >
                           <div class="form-group col-md-12" >
                              <label for ="CounselorForm" ><span style="font-style: italic;">Insert Counseling Form (GF-5)</span></label>
                              <input id="CForm" type="file" name="CounselorForm" required   class="form-control animate__animated animate__bounceInRight" >
                          </div>
=======
            <h5 class="modal-title animate__animated animate__zoomInDown" id="FormTitle">Upload Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick=" HideForm();">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">

              <div class="form-row">
                <div class="form-group col-md-4">
                  <input type="text" id="CSID" name="StudentID" required disabled
                    class="form-control animate__animated animate__bounceInLeft"
                    value="<?php if (isset($_SESSION["Student_ID" . $_SESSION['success'] . ""])) {
                                                                                                                                                        echo $_SESSION["Student_ID" . $_SESSION['success'] . ""];
                                                                                                                                                      } ?>">
                </div>
                <div class="form-group col-md-8">
                  <input type="text" id="CSname" name="StudentName" required disabled
                    class="form-control animate__animated animate__bounceInRight"
                    value="<?php if (isset($_SESSION["Student_Name" . $_SESSION['success'] . ""])) {
                                                                                                                                                              echo $_SESSION["Student_Name" . $_SESSION['success'] . ""];
                                                                                                                                                            }   ?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <input type="text" id="CName" name="CounselorName" required placeholder="Enter counselor name"
                    class="form-control animate__animated animate__bounceInLeft">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="CounselorForm"><span style="font-style: italic;">Insert Counseling Form
                      (GF-5)</span></label>
                  <input id="CForm" type="file" name="CounselorForm" required
                    class="form-control animate__animated animate__bounceInRight">
>>>>>>> Stashed changes
                </div>
              </div>


          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-info" name="InsertForm">Insert Form</button></form>
          </div>
        </div>
      </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["InsertForm"])) {
      require_once 'Config.php';
      include 'SForms/timezone.php';
      $getRkey = $db->query('SELECT count(request_Key) as RKey FROM counseledlist WHERE request_Key = ?', $_SESSION["Request_KEY" . $_SESSION['success'] . ""])->fetchArray();
      if ($getRkey['RKey'] == 0) {
        if (count($_FILES) > 0) {
          if (is_uploaded_file($_FILES['CounselorForm']['tmp_name'])) {
            require_once "dbImage/Imagedb.php";
            $imgData = addslashes(file_get_contents($_FILES['CounselorForm']['tmp_name']));
            $imageProperties = getimageSize($_FILES['CounselorForm']['tmp_name']);

            $sql = "INSERT INTO counseledlist(imageType ,	Counsel_Forms	, request_Key)
                        VALUES('{$imageProperties['mime']}', '{$imgData}' , '{$_SESSION["Request_KEY" .$_SESSION["success"] . ""]}')";
            $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
            if (isset($current_id)) {
              // header("Location: listImages.php");
            }
          }
        }
      } else {
        if (count($_FILES) > 0) {
          if (is_uploaded_file($_FILES['CounselorForm']['tmp_name'])) {
            require_once "dbImage/Imagedb.php";
            $imgData = addslashes(file_get_contents($_FILES['CounselorForm']['tmp_name']));
            $imageProperties = getimageSize($_FILES['CounselorForm']['tmp_name']);
            $sql = "UPDATE counseledlist SET imageType='{$imageProperties['mime']}' ,Counsel_Forms='{$imgData}' WHERE request_Key= '{$_SESSION["Request_KEY" .$_SESSION["success"] . ""]}'";
            $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
            if (isset($current_id)) {
              // header("Location: listImages.php");
            }
          }
        }
        // require_once 'Config.php';
        // $udpatePic = $db->query('UPDATE counseledlist SET Counsel_Forms=? WHERE Request_Key=?',$image ,$_SESSION["Request_KEY".$_SESSION['success'].""]);
      }
      require_once 'Config.php';
      $insertform = $db->query(
        'UPDATE counseledlist SET Student_ID=? , Student_Name=?, Student_yrlvl=?, Student_Course=?, Couselor_Name=?, created_at=?, updated_at=?  WHERE Request_Key=?',
        $_SESSION["Student_ID" . $_SESSION['success'] . ""],
        $_SESSION["Student_Name" . $_SESSION['success'] . ""],
        $_SESSION["Student_yrlvl" . $_SESSION['success'] . ""],
        $_SESSION["Student_Course" . $_SESSION['success'] . ""],
        $_POST["CounselorName"],
        $time,
        $time,
        $_SESSION["Request_KEY" . $_SESSION['success'] . ""]
      );

      if ($insertform->affectedRows() == 1) {
        $_SESSION["InsertSuccess"] = "Success";
        echo "<script>
                                 location.href = 'ConductCounsel.php?id=" . $_SESSION['success'] . "&Inserted=TRUE';
                            </script>";
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      if (isset($_SESSION["InsertSuccess"]) && $_GET["Inserted"]) {
        unset($_SESSION["InsertSuccess"]);
        echo "
                <script>
                        Swal.fire(
                        'Success!',
                        'Form has been uploaded!',
                        'success'
                      )
                </script>";
      }
    }
    ?>



    <script>
    HideForm

    function Dismiss() {
      $("#Convowithstudent").modal('hide');
    }

    function Edit() {
      $("#ViewRequest").modal('hide');
    }

    function HideForm() {
      $("#InsertForms").modal('hide');
    }
    </script>



    <!--   //add student appointment
   <div class="form-row fixed-bottom " >
        <div class="form-group col-md-11"></div>
        <div class="form-group  col-md-1 ">
            <button type="button" name="SearchStudent" class="btn btn-info  form-control animate__animated animate__slideInRight " data-toggle="modal" data-target="#AddAppointment"
                    style="background-image: linear-gradient(to right,  #6666ff ,  #4d88ff);
                           box-shadow: 5px 7px 17px grey;
                           border-radius: 50px;
                           width: 60px;
                           height: 60px;
                           position: relative;
                           top: -75px;

                    ">
                <i class="bi bi-calendar-plus" style="font-size: 25px; color: white; "></i>
            </button></div>
    </div>  -->
    <!--//Chat support by student-->
    <div class="form-row fixed-bottom ">
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
                           width: 50px;
                           height: 50px;

                    ">';
        ?>





        <i class="bi bi-chat-square-quote" style="font-size: 20px; color: white; "></i>
        </button>
      </div>
    </div>






    <!--Modal appointment-->
    <div class="modal fade" id="AddAppointment" tabindex="-1" role="dialog" aria-labelledby="AddAppointment"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title animate__animated animate__zoomInDown" id="exampleModalLongTitle">Create a student
              request for counseling</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">

              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" disabled name="StudentName" placeholder="Student name"
                    class="form-control animate__animated animate__bounceInRight"
                    value="<?php if (isset($_SESSION["Student_Name" . $_SESSION['success'] . ""])) {
                                                                                                                                                                    echo $_SESSION["Student_Name" . $_SESSION['success'] . ""];
                                                                                                                                                                  }   ?>">
                </div>
                <div class="form-group col-md-6">
                  <input type="text" disabled name="StudentID" placeholder="Student ID"
                    class="form-control animate__animated animate__bounceInLeft"
                    value="<?php if (isset($_SESSION["Student_ID" . $_SESSION['success'] . ""])) {
                                                                                                                                                              echo $_SESSION["Student_ID" . $_SESSION['success'] . ""];
                                                                                                                                                            } ?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <textarea name="DescRequest" required class="form-control animate__animated animate__zoomInUp"
                    rows="5"></textarea>
                </div>
              </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="AddRequesting">Submit</button></form>
          </div>
        </div>
      </div>
    </div>



    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["AddRequesting"])) {
      require_once 'Config.php';
      include 'SForms/timezone.php';
      $decsReq = $_POST["DescRequest"];
      $created = $dt->format('Y-m-d H:i:s');

      $numLenth = 15;
      $SerialKEY = "";

      list($usec, $sec) = explode(' ', microtime());
      $takedata = (float) $sec + ((float) $usec * 100000);

      srand($takedata);
      $numSeed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

      for ($i = 0; $i < $numLenth; $i++) :  $SerialKEY .= $numSeed[rand(0, strlen($numSeed) - 1)];
      endfor;




      $insertRequest = $db->query('INSERT INTO counselrequest ( Student_ID, Student_Name, Description, StudentIssue, Schedule, Status ,Request_KEY, create_at)'
        . ' VALUES (?,?,?, ?,?,?,?,?)', $_SESSION["Student_ID" . $_SESSION['success'] . ""], $_SESSION["Student_Name" . $_SESSION['success'] . ""], $decsReq, 'Defining', 'Not Set', 'Pending', $SerialKEY, $created);

      if ($insertRequest->affectedRows() == 1) {
        $_SESSION["InsertSuccess"] = "Success";
        echo "<script>
                         location.href = 'ConandAss.php?id=" . $_SESSION['success'] . "&ReqRemove=1';
                    </script>";
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      if (isset($_SESSION["InsertSuccess"]) && $_GET["ReqRemove"]) {
        unset($_SESSION["InsertSuccess"]);
        echo "
                <script>
                        Swal.fire(
                        'Your Request is on process!',
                        'You request a student for counseling!',
                        'success'
                      )
                </script>";
      }
    }
    ?>





    <?php include 'ChatBox.php'; ?>

    <?php
    //    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["SendConvo"]))
    //    {
    //        require_once 'Config.php';
    //        include 'SForms/timezone.php';
    //        $timeData =  $dt->format('Y-m-d H:i:s');
    //        $insertConvo = $db->query('INSERT INTO conversation (
    //                    Employee_ID,
    //                    Employee_Name,
    //                    Student_ID,
    //                    Student_Name,
    //                    User,
    //                    Chat_Info,
    //                    created_at,
    //                    update_at ) VALUES (?,?,?,? ,?,?,?,?)' ,
    //                    'GA18012935',
    //                    'Counselor Kim',
    //                    $_SESSION["Student_ID"],
    //                    $_SESSION["Student_Name"],
    //                    'Assistant Counselor',
    //                    $_POST["Chatinfo"],
    //                    $timeData,
    //                    $timeData);
    //    }
    ?>



    <!-- Modal -->
    <div class="modal fade" id="AddScore" tabindex="-1" role="dialog" aria-labelledby="AddScore" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="modalcontentTheme">
          <div class="modal-header" id="modalTitle">
            <h5 class="modal-title animate__animated animate__zoomInDown" id="exampleModalLongTitle">Result of testing
              (findings)</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick=" Testing();">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">

              <div class="form-row">
                <div class="form-group col-md-12">
                  <select class="form-select animate__animated animate__bounceInLeft" required name="TestingResults"
                    id="selectTheme">
                    <option selected value="" disabled>Select testing result</option>
                    <option value="Passed">Passed</option>
                    <option value="Failed">Failed</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <input type="text" required name="CounselorName" placeholder="Counseled by?"
                    class="form-control animate__animated animate__bounceInRight" id="textTheme">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <div class="form-group">
                    <label for="textareaTheme"><span style="font-style: italic;">Insert remarks (Testing)</span></label>
                    <textarea name="StudentRemarks" required
                      class="form-control animate__animated animate__bounceInLeft" id="textareaTheme" rows="3"
                      placeholder="Your remarks for this student"></textarea>
                  </div>
                </div>
              </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-info" name="REMARKS">Add Remarks</button></form>
          </div>
        </div>
      </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["REMARKS"])) {
      require_once 'Config.php';
      include 'SForms/timezone.php';

      $Remarks = $_POST["StudentRemarks"] . "$" . $time . "$" . "Counseled by: " . $_POST["CounselorName"];

      $Test_Status = $_POST["TestingResults"];
      $SetScore = $db->query(
        'UPDATE counseledlist SET  Testing_Status=?, Remarks=?, updated_at=? WHERE Request_Key=?',
        $Test_Status,
        $Remarks,
        $time,
        $_SESSION["Request_KEY" . $_SESSION['success'] . ""]
      );



      if ($SetScore->affectedRows() == 1) {
        $_SESSION["setScore"] = "Success";
        echo '<script type="text/javascript">location.href = "ConductCounsel.php?id=' . $_SESSION['success'] . '&setScore=' . $_SESSION['setScore'] . '"</script>';
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      if (isset($_SESSION["setScore"]) && isset($_GET["setScore"])) :

        unset($_SESSION['setScore']);
        require_once  'Config.php';

        echo "<script>
                                        Swal.fire(
                                            'Success!',
                                            'Student Counseled',
                                            'success' )
                                      </script>";
      endif;
    }
    ?>








    <?php include 'include/footer.php'; ?>
  </main>
  <!-- ======= Footer ======= -->



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
