<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'include/external.php';
  include 'include/header.php'; ?>
  <link rel="stylesheet" href="mdb5-free-standard/css/mdb.min.css">
  <script src="mdb5-free-standard/js/mdb.min.js"></script>
</head>

<body>
  <!-- ======= Sidebar ======= -->
  <?php include 'include/asideSidebar.php'; ?>
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->

  <style>
  #ModalBody::-webkit-scrollbar {
    display: none;
  }

  #StudentINFO {
    font-size: 14px;
  }
  </style>



  </head>

  <body style="background-color: white;">
    <?php include 'include/header.php'; ?>
    <?php include 'include/asideSidebar.php'; ?>

    <main id="main" class="main">
      <div class="pagetitle">
        <h1 class="layout">Student Approval</h1>
        <nav>
          <ol class="breadcrumb" style="background-color: transparent;">
            <li class="breadcrumb-item"><a href="index.php?id=<?php echo $_SESSION['success']; ?>">Home</a></li>
            <li class="breadcrumb-item active">Student Approval</li>
            <li class="breadcrumb-item active">Rejected List</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->


      <br>
      <table class="table table-hover" style="width:100%; " id="StudentINFO">
        <thead style="text-align:center; background: rgba(161, 213, 255, 0.1);">
          <tr>
            <th>Employee ID</th>
            <th>Student name</th>
            <th>Remarks</th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody style="text-align:center;" id="lodaNewData">

          <?php
          require_once 'Config.php';
          $studentData = $db->query('SELECT * FROM rejectappointment ')->fetchAll();

          foreach ($studentData as $data) :
            echo '<tr style="">
                                <td>' . $data['Employee_ID'] . '</td>
                                <td>' . $data['Student_Name'] . '</td>
                                <td>' . $data['Remarks'] . '</td>


                                <td style="" id="TDbutton">

                                    <a href="#" onclick="putSomeRemarks(' . $data["ID"] . ',';
            echo "'modalRemarks'";
            echo ' );" class="btn btn-warning" style="background-color: #ffc266"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="Rejectedlist.php?id=' . $_SESSION['success'] . '&DRDelete=' . $data['ID'] . '" class="btn btn-danger"  style="background-color: #ff6666" ><i class="bi bi-trash"></i></a>
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



      <script>
      function putSomeRemarks(id, modalRemarks) {
        $.ajax({
          url: 'ajaxForm/rejectedListRemarks.php?URUpdate=' + id,
          success: function(html) {
            var modalContent = document.getElementById(modalRemarks);
            modalContent.innerHTML = html;

            $(document).ready(function() {
              $("#ViewRequest").modal("show");
            });
          }
        });
      }
      </script>

      <script>
      function submitRemarks(id, lodaNewData) {
        var Remarkss = document.getElementById("Remarkss").value;
        $.ajax({
          url: 'ajaxForm/rejectedListRemarksOnsubmit.php?id=' + id + '&Remarkss=' + Remarkss,
          success: function(html) {
            var loadTable = document.getElementById(lodaNewData);
            loadTable.innerHTML = html;
            Swal.fire(
              'Success',
              'You already put some remarks!',
              'success');
            $("#ViewRequest").modal('hide');
          }
        });
      }
      </script>


      <?php

      if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['DRDelete']) && isset($_SESSION['success'])) {

      ?>
      <script>
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this request!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          location.href =
            'RemoveStudent.php?id=<?php echo $_SESSION['success'] . "&DRLDelete=" . $_GET['DRDelete']; ?>';
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
                                            'Deleted',
                                            'Reject appointment deleted!',
                                            'success' )
                                      </script>";
        endif;
      }
      ?>









      <!--    //Chat support by student
    <div class="form-row fixed-bottom " >
        <div class="form-group col-md-11"></div>
        <div class="form-group  col-md-1 ">
            <button type="button" name="SearchStudent" class="btn btn-info  form-control animate__animated animate__slideInRight " data-toggle="modal" data-target="#Convowithstudent"
                    style="background-image: linear-gradient(to right,  #6699ff ,  #4d88ff);
                           box-shadow: 5px 7px 17px grey;
                           border-radius: 50px;
                           width: 60px;
                           height: 60px;


                    ">
                <i class="bi bi-chat-square-quote" style="font-size: 25px; color: white; "></i>
            </button></div>
    </div>      -->










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
            </script>

            <div class="modal-body" id="FetchConvo" style="height: 350px;
		overflow-x: hidden;
		overflow-y: auto;

                        div.scroll::-webkit-scrollbar {
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
                    <button type="button" id="sync"
                      class="btn btn-info form-group animate__animated animate__zoomInUp"><i
                        class="bi bi-arrow-clockwise "></i></button>
                  </div>
                  <div class="form-group col-md-8">
                    <textarea name="Chatinfo" placeholder="Say something about Marin Kim Julius" id="Chats" required
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
      <div class="modal fade" id="ViewRequest" tabindex="-1" role="dialog" aria-labelledby="ViewRequest"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content" style="border-left: 3px solid #5e5e5e;
                                                            border-right: 3px solid #5e5e5e;
                                                            border-radius: 30px;">
            <div class="modal-header" style=" background-color: #c7efff;
                                        border-top-left-radius: 30px;
                                        border-top-right-radius: 30px;">
              <h5 class="modal-title animate__animated animate__zoomInDown" id="exampleModalLongTitle">Make Remarks</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeRemarks();">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body" id="modalRemarks"></div>
          </div>
        </div>
      </div>



      <script>
      function closeRemarks() {
        $("#ViewRequest").modal('hide');
      }
      </script>


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