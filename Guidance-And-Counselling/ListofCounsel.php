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


<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->

<style>
#ModalBody::-webkit-scrollbar {
  display: none;
}
</style>



</head>

<body style="background-color: white;">
  <?php include 'include/header.php' ?>
  <?php include 'include/asideSidebar.php'; ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1 class="layout">Counseling Services</h1>
      <nav>
        <ol class="breadcrumb" style="background-color: transparent;">
          <li class="breadcrumb-item"><a href="index.php?id=<?php echo $_SESSION['success']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Counseling Services</li>
          <li class="breadcrumb-item active">List of Counseled</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <br> <br>



    <table class="table table-hover" style="
            width:100%; text-align: center;
            font-size: 15px;
            " id="StudentINFO">
      <thead style="background: rgba(161, 213, 255, 0.1);">
        <tr>
          <th>Student Name</th>
          <th>Issue</th>
          <th>Status</th>
          <th>Action </th>
        </tr>
      </thead>
      <tbody>

        <?php

        require_once 'Config.php';
        $studentData = $db->query('SELECT * FROM counselrequest WHERE Status = "Complete"')->fetchAll();

        foreach ($studentData as $data) :

          if (isset($data["Referral_KEY"])) {
            echo '<tr style="backgroud-color: white;">
                                <td>' . $data['Student_Name'] . '</td>
                                <td>' . $data['StudentIssue'] . '</td>
                                <td ><i class="bi bi-circle-fill" style="color: #41e094;"></i> ' . $data['Status'] . '</td>
                                <td style="" id="TDbutton">
                                    <a href="ListofCounsel.php?id=' . $_SESSION['success'] . '&LCReferral=' . $data['ID'] . '" class="btn btn-outline-danger"  style=" pointer-events: none" ><i class="bi bi-arrow-left-right" style="color:black;"></i></a>
                                    <a href="#" class="btn btn-info"  style="background-color: #a8f3ff;" ><i class="bi bi-envelope-open" style="color:black;"></i></a>

                                </td>
                            </tr>';
          } else {
            echo '<tr style=" background-color: white;">
                                <td>' . $data['Student_Name'] . '</td>
                                <td>' . $data['StudentIssue'] . '</td>
                                <td><i class="bi bi-circle" style="color: #41e094;"></i> ' . $data['Status'] . '</td>
                                <td style="" id="TDbutton">
                                    <a href="ListofCounsel.php?id=' . $_SESSION['success'] . '&LCReferral=' . $data['ID'] . '" class="btn btn-danger"  style="background-color: #ff8566;" ><i class="bi bi-arrow-left-right" style="color:black;"></i></a>
                                    <a href="#" class="btn btn-info"  style="background-color: #a8f3ff;" ><i class="bi bi-envelope-open" style="color:black;"></i></i></a>
                                </td>
                            </tr>';
          }

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
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['LCUploadForms']) && isset($_SESSION['success'])) {
      require_once 'Config.php';
      $StudentSched = $db->query('SELECT * FROM counselrequest WHERE ID = ?', $_GET['LCUploadForms'])->fetchArray();
      if (isset($StudentSched["Student_ID"]) && $StudentSched["Student_Name"]) {
        $_SESSION["Student_ID" . $_SESSION['success'] . ""]     = $StudentSched["Student_ID"];
        $_SESSION["Student_Name" . $_SESSION['success'] . ""]   = $StudentSched["Student_Name"];
        $_SESSION["Request_KEY" . $_SESSION['success'] . ""]    = $StudentSched["Request_KEY"];
      }
      echo  '<script>
                                    $(document).ready(function(){
                                     $("#InsertForms").modal("show");});
                                 </script>';
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['LCReferral']) && isset($_SESSION['success'])) {

      require_once 'Config.php';
      $StudentSched = $db->query('SELECT * FROM counselrequest WHERE ID = ?', $_GET['LCReferral'])->fetchArray();
      if (isset($StudentSched["Student_ID"]) && $StudentSched["Student_Name"]) {
        $_SESSION["Student_ID" . $_SESSION['success'] . ""]     = $StudentSched["Student_ID"];
        $_SESSION["Student_Name" . $_SESSION['success'] . ""]   = $StudentSched["Student_Name"];
        $_SESSION["Description" . $_SESSION['success'] . ""]    = $StudentSched["Description"];
        $_SESSION["Request_KEY" . $_SESSION['success'] . ""]    = $StudentSched["Request_KEY"];
      }

    ?>
    <script>
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to refer this student?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Referral'
    }).then((result) => {
      if (result.isConfirmed) {
        location.href =
          'ListofCounsel.php?id=<?php echo $_SESSION['success'] . "&Referral=" . $_GET['LCReferral']; ?>';
      }
    });
    </script>
    <?php



    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $_SESSION['Complete'] = "Referral";
      if (isset($_GET['Referral']) && isset($_SESSION['Complete'])) :
        unset($_SESSION['Complete']);
        include 'SForms/timezone.php';
        require_once 'Config.php';

        $numLenth = 15;
        $SerialKEY = "";

        list($usec, $sec) = explode(' ', microtime());
        $takedata = (float) $sec + ((float) $usec * 100000);

        srand($takedata);
        $numSeed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        for ($i = 0; $i < $numLenth; $i++) :  $SerialKEY .= $numSeed[rand(0, strlen($numSeed) - 1)];
        endfor;

        $Complete = $db->query('UPDATE counselrequest SET Status=?, Referral_KEY=?,  update_at=? WHERE ID=?', "Referral", $SerialKEY, $time, $_GET['Referral']);
        $_SESSION["Referred"] = "OKAY";
        echo "<script>
                                        location.href = 'ListofCounsel.php?id=" . $_SESSION['success'] . "&Referred=Success';
                                    </script>";
      endif;

      if (isset($_GET['Referred']) && isset($_SESSION['Complete'])) {
        unset($_SESSION["Referred"]);
        echo "<script>
                                        Swal.fire(
                                            'Student referred!',
                                            'Psychometrician will handle it!',
                                            'success' )
                                      </script>";
      }
    }
    ?>








    <!--//add student appointment-->
    <!--   <div class="form-row fixed-bottom " >
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
        //                if (isset($_GET["CAChats"]))
        //                {
        //                    echo '<button type="button" name="Convo" class="btn btn-info  form-control animate__animated animate__slideInRight " data-toggle="modal" data-target="#Convowithstudent" ';
        //                }
        //                else
        //                {
        //                    echo '<button type="button" name="Convo" disabled class="btn btn-info  form-control animate__animated animate__slideInRight " data-toggle="modal" data-target="#Convowithstudent" ';
        //                }
        //
        //
        //                echo 'style="background-image: linear-gradient(to right,  #6699ff ,  #4d88ff);
        //                           box-shadow: 5px 7px 17px grey;
        //                           border-radius: 50px;
        //                           width: 60px;
        //                           height: 60px;
        //
        //                    ">';
        ?>





        <i class="bi bi-chat-square-quote" style="font-size: 25px; color: white; "></i>
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
        . ' VALUES (?,?,?, ?,?,?,?,?)', $_SESSION["Student_ID"], $_SESSION["Student_Name"], $decsReq, 'Defining', 'Not Set', 'Pending', $SerialKEY, $created);

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