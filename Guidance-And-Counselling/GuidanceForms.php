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
  </style>

</head>

<body>
  <?php

  include 'filesLogic.php'; ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1 class="layout">Files and Documents</h1>
      <nav>
        <ol class="breadcrumb" style="background-color: transparent;">
          <li class="breadcrumb-item"><a href="index.php?id=<?php echo $_SESSION['success']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Files and Documents</li>
          <li class="breadcrumb-item active">Guidance Forms</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->



    <div class="form-row fixed-bottom ">
      <div class="form-group col-md-11"></div>
      <div class="form-group  col-md-1 ">
        <button type="button" id="Eguls" name="SearchStudent"
          class="btn btn-info  form-control animate__animated animate__slideInRight " data-toggle="modal"
          data-target="#AddAppointment" style="
                            box-shadow: 5px 7px 17px grey;
                            position: relative;
                            border-left: 3px solid black;
                            border-radius: 50px;


                     ">
          <i class="bi bi-file-earmark" style=" color: white; "></i>
        </button>
      </div>
    </div>



    <br>
    <table class="table table-hover" style="width:100%; font-size: 14px;" id="StudentINFO">
      <thead>
        <tr style="background: rgba(161, 213, 255, 0.1);">

          <th>Document Code</th>
          <th>Document Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

        <?php
        require_once 'Config.php';
        $Guidance_Documents = $db->query('SELECT * FROM gac_files ORDER BY ID ASC ')->fetchAll();

        foreach ($Guidance_Documents as $data) :
          echo '<tr>
                                        <td>' . $data['Document_Code'] . '</td>
                                        <td>' . $data['name'] . '</td>
                                        <td style="" id="TDbutton">
                                            <a href="downloads.php?id=' . $_SESSION['success'] . '&file_id=' . $data['ID'] . '" class="btn btn-info"  style="background-color: #80bfff; " ><i class="bi bi-download" ></i></a>
                                            <a href="GuidanceForms.php?id=' . $_SESSION['success'] . '&CADelete=' . $data['ID'] . '" class="btn btn-danger"  style="background-color: #ff6666; " ><i class="bi bi-trash"></i></a>
                                        </td>
                                  </tr>';
        endforeach;
        ?>

      </tbody>

    </table>

    <script>
    $(document).ready(function() {
      $('#StudentINFO').DataTable();
    });
    </script>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['CAChats']) && isset($_SESSION['success'])) {

      require_once 'Config.php';
      $Studentdata = $db->query('SELECT * FROM counselrequest WHERE ID = ?', $_GET['CAChats'])->fetchArray();
      $_SESSION["KEY"] = $_GET['CAChats'];
      if (isset($Studentdata["Student_ID"]) && $Studentdata["Student_Name"] && isset($Studentdata["Request_KEY"])) {
        $_SESSION["Student_ID"]     = $Studentdata["Student_ID"];
        $_SESSION["Student_Name"]   = $Studentdata["Student_Name"];
        $_SESSION["Request_KEY"]    = $Studentdata["Request_KEY"];
      }

      echo '<script>
                                $(document).ready(function(){
                                 $("#Convowithstudent").modal("show");
                                });
                             </script>';
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['CAUpdate']) && isset($_SESSION['success'])) {
      require_once 'Config.php';
      $StudentSched = $db->query('SELECT * FROM counselrequest WHERE ID = ?', $_GET['CAUpdate'])->fetchArray();
      if (isset($StudentSched["Student_ID"]) && $StudentSched["Student_Name"]) {
        $_SESSION["Student_ID"]     = $StudentSched["Student_ID"];
        $_SESSION["Student_Name"]   = $StudentSched["Student_Name"];
        $_SESSION["Description"]    = $StudentSched["Description"];
        $_SESSION["Request_KEY"]    = $StudentSched["Request_KEY"];
        $_SESSION["Referral_KEY"]   = $StudentSched["Referral_KEY"];
      }
      echo  '<script>
                                    $(document).ready(function(){
                                     $("#ViewRequest").modal("show");});
                                 </script>';
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['CADelete']) && isset($_SESSION['success'])) {

      require_once 'Config.php';
      $StudentSched = $db->query('SELECT * FROM counselrequest WHERE ID = ?', $_GET['CADelete'])->fetchArray();
      if (isset($StudentSched["Student_ID"]) && $StudentSched["Student_Name"]) {
        $_SESSION["Student_ID"]     = $StudentSched["Student_ID"];
        $_SESSION["Student_Name"]   = $StudentSched["Student_Name"];
        $_SESSION["Description"]    = $StudentSched["Description"];
        $_SESSION["Request_KEY"]    = $StudentSched["Request_KEY"];
      }

    ?>
    <script>
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this Documents!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        location.href =
          'RemoveStudent.php?id=<?php echo $_SESSION['success'] . "&DocsDelete=" . $_GET['CADelete']; ?>';
      }
    });
    </script>
    <?php

    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      if (isset($_SESSION['RemoveSucess']) && isset($_GET['RemoveReq'])) :
        unset($_SESSION['RemoveSucess']);

        echo "<script>
                                        Swal.fire(
                                            'Document Deleted!',
                                            'You can upload again.',
                                            'success' )
                                      </script>";
      endif;
    }
    ?>








    <!--//add student appointment-->











    <!--Modal appointment-->
    <div class="modal fade" id="AddAppointment" tabindex="-1" role="dialog" aria-labelledby="AddAppointment"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title animate__animated animate__zoomInDown" id="exampleModalLongTitle">Upload
              File/Documents Here!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="" enctype="multipart/form-data">

              <div class="form-row">
                <div class="form-group col-md-12">
                  <input type="file" name="myfile" class="form-control animate__animated animate__bounceInRight">
                </div>
              </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="save">Upload Files</button></form>
          </div>
        </div>
      </div>
    </div>



    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["asds"])) {
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
        . ' VALUES (?,?,?, ?,?,?,?,?)', $_SESSION["Student_ID"], $_SESSION["Student_Name"], $decsReq, 'Defining', 'Not Set', 'Pending', $SerialKEY, $created);

      if ($insertRequest->affectedRows() == 1) {
        $_SESSION["InsertSuccess"] = "Success";
        echo "<script>
                         location.href = 'GuidanceForms.php?id=" . $_SESSION['success'] . "&ReqRemove=1';
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
                        'You request appointment for student!',
                        'success'
                      )
                </script>";
      }
    }
    ?>





    <!-- Modal chat -->
    <div class="modal fade" id="Convowithstudent" tabindex="-1" role="dialog" aria-labelledby="Convowithstudent"
      aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="border: none; border-radius: 50px;
                border-bottom: 3px solid black;
                border-top: 3px solid black;">

          <div class="modal-header">
            <h5 class="modal-title" id=""> Chat with student</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Dismiss();">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <script>
          function Dismiss() {
            $("#Convowithstudent").modal('hide');
          }

          function Edit() {
            $("#ViewRequest").modal('hide');
          }
          </script>

          <div class="modal-body" id="FetchConvo" style="height: 350px;
    overflow-x: hidden;
    overflow-y: auto;

                        div.scroll:-webkit-scrollbar {
          display: none;
      }
                ">

            <!--Fetch conversation here-->

          </div>
          <div class="modal-footer" style="margin-bottom: -30px; position: relative;">
            <form method="POST" action="#" id="form1">
              <div class="form-row">
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-1">
                  <button type="button" id="sync" class="btn btn-info form-group animate__animated animate__zoomInUp"><i
                      class="bi bi-arrow-clockwise "></i></button>
                </div>
                <div class="form-group col-md-8">
                  <textarea name="Chatinfo" id="Chats"
                    placeholder="<?php echo 'Say Somthing about ' . $_SESSION['Student_Name']; ?>" required
                    class="form-control animate__animated animate__zoomInUp" rows="1" cols="80"></textarea>
                </div>
                <div class="form-group col-md-1">
                  <button type="submit" id="convo"
                    class="btn btn-success form-group animate__animated animate__zoomInUp"><i
                      class="bi bi-arrow-right-square"></i></button>
                </div>
                <div class="form-group col-md-1"></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>





    <script>
    function ClearFields() {
      document.getElementById("Chats").value = "";
    }
    </script>


    <script type="text/javascript">
    $(document).ready(function() {
      $("#convo").click(function() {
        event.preventDefault();
        var Chats = $('#Chats').val();
        $.ajax({
          type: "POST",
          url: "Conversation.php",
          data: {
            Chats: Chats
          },
          dataType: "json",
          success: function(result) {

          }
        });
      });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
      $("#convo").click(function() {
        $.ajax({
          type: 'POST',
          url: 'FetchConvo.php',
          data: {
            name: $("#Chats").val(),
          },
          success: function(data) {
            $("#FetchConvo").html(data);
          }
        });
      });
    });
    </script>


    <script type="text/javascript">
    $(document).ready(function() {
      $("#sync").click(function() {
        $.ajax({
          type: 'POST',
          url: 'FetchConvo.php',
          data: {
            name: $("#Chats").val(),
          },
          success: function(data) {
            $("#FetchConvo").html(data);
          }
        });
      });
    });
    </script>











    <!-- Modal -->
    <div class="modal fade" id="ViewRequest" tabindex="-1" role="dialog" aria-labelledby="ViewRequest"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title animate__animated animate__zoomInDown" id="exampleModalLongTitle">Set student issue
              and appointment's</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick=" Edit()();">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">

              <?php
              if (isset($_SESSION["Referral_KEY"]) && !empty($_SESSION["Referral_KEY"])) {
                echo ' <select class="form-select" aria-label="Default select example" required name="Psychometrician">
                            <option disabled selected  value="">Select Psychometrician</option>';

                $Psychometrician = $db->query('SELECT * FROM departmental_user WHERE Role ="Psychometrician"')->fetchAll();
                foreach ($Psychometrician as $Data) {
                  echo '<option value="' . $Data["User_ID"] . '">' . $Data["last_name"] . ', ' . $Data["first_name"] . '</option>';
                }

                echo '  </select>';
              } else {

                echo ' <select class="form-select" aria-label="Default select example" required name="StudentCounselor">
                            <option disabled selected  value="">Select Student Counselor</option>';

                $Student_Counselor = $db->query('SELECT * FROM departmental_user WHERE Role ="Student Counselor"')->fetchAll();
                foreach ($Student_Counselor as $Data) {
                  echo '<option value="' . $Data["User_ID"] . '">' . $Data["last_name"] . ', ' . $Data["first_name"] . '</option>';
                }

                echo '  </select>';
              } ?>


              <br>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="des">Student problem :</label>
                  <textarea name="DescUpdate" id="des" required class="form-control animate__animated animate__zoomInUp"
                    rows="5"><?php if (isset($_SESSION["Description"])) {
                                                                                                                                    echo $_SESSION["Description"];
                                                                                                                                  } ?></textarea>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="issue">Set Student issue :</label>
                  <input type="text" id="issue" required name="StudentIssue"
                    class="form-control animate__animated animate__bounceInLeft" placeholder="Enter student issue">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="appoint">Set Appointment :</label>
                  <input type="datetime-local" required id="appoint" name="Appointment"
                    class="form-control animate__animated animate__bounceInRight">
                </div>
              </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="Approval">Approve</button></form>
          </div>
        </div>
      </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Approval"])) {



      if (isset($_SESSION["Referral_KEY"]) && !empty($_SESSION["Referral_KEY"])) {
        require_once 'Config.php';

        $SetAppointment = $db->query(
          'UPDATE counselrequest SET Employee_ID=?, Description=?, StudentIssue=?, Schedule=?, Status=?, update_at=? WHERE ID=?',
          $_POST['Psychometrician'],
          $_POST["DescUpdate"],
          $_POST["StudentIssue"],
          $_POST["Appointment"],
          "Approved (Referral)",
          $_POST["Appointment"],
          $_GET['CAUpdate']
        );
      } else {
        require_once 'Config.php';

        $SetAppointment = $db->query(
          'UPDATE counselrequest SET Employee_ID=?, Description=?, StudentIssue=?, Schedule=?, Status=?, update_at=? WHERE ID=?',
          $_POST["StudentCounselor"],
          $_POST["DescUpdate"],
          $_POST["StudentIssue"],
          $_POST["Appointment"],
          "Approved",
          $_POST["Appointment"],
          $_GET['CAUpdate']
        );
      }


      if ($SetAppointment->affectedRows() == 1) {
        $_SESSION["setAppointment"] = "Success";
        echo '<script type="text/javascript">location.href = "ConandAss.php?id=' . $_SESSION['success'] . '&setAppointment=' . $_SESSION['setAppointment'] . '"</script>';
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      if (isset($_SESSION["setAppointment"]) && isset($_GET["setAppointment"])) :

        unset($_SESSION['setAppointment']);
        require_once  'Config.php';

        $Imginsert =  $db->query('INSERT INTO notification (User_Img)
                                    SELECT User_img FROM departmental_user WHERE User_ID =?', $_SESSION['User_ID']);

        require_once  'Config.php';
        include 'SForms/timezone.php';
        $DataUpdate = $db->query(
          'UPDATE notification SET User_ID=?, User_Name=?, Student_ID=?, Message_Title=?, Message=?, Read_Status=?, Notif_Messages=? ,created_at=? ORDER BY ID DESC LIMIT 1',
          $_SESSION['User_ID'],
          $_SESSION['Fname'],
          $_SESSION["Student_ID"],
          "Appointment Approved!",
          "Please be on time of your schedule.",
          "Unread",
          "Notification",
          $dt->format('Y-m-d H:i:s')
        );
        //
        require_once  'Config.php';
        $DeleteMessageKEY  = $db->query('DELETE FROM notification WHERE Notif_Messages=? AND Request_KEY=?', "Messages", $_SESSION["Request_KEY"]);

        require_once  'Config.php';
        $DeleteConvo    = $db->query('DELETE FROM conversation WHERE Request_KEY=? AND Employee_ID=?', $_SESSION["Request_KEY"], $_SESSION["User_ID"]);


        echo "<script>
                                        Swal.fire(
                                            'Request Approved!',
                                            'Student counselor can make action',
                                            'success' )
                                      </script>";
      endif;
    }
    ?>








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