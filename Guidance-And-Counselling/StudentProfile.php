<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'include/external.php';
  include 'include/header.php'; ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="mdb5-free-standard/css/mdb.min.css">
  <!-- <script src="mdb5-free-standard/js/mdb.min.js"></script> -->
  <style>


  </style>
</head>

<!-- ======= Sidebar ======= -->
<?php include 'include/asideSidebar.php'; ?>

<style>
#StudentSubmit {
  background-color: transparent;
  color: black;
  border: 1px solid black;
}

/*      tr:nth-child(even) {background: transparent}
        tr:nth-child(odd) {background: transparent;}
        td:nth-child(even) {background: transparent}
        td:nth-child(odd) {background: transparent;}*/
#TDbutton a {
  text-decoration: none;
}
</style>

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<script type="text/javascript">
function getData(empid, divid) {

  $.ajax({
    url: 'Ajax/SetStundentSession.php?empid=' + empid,
    success: function(html) {
      var ajaxDisplay = document.getElementById(divid);
      ajaxDisplay.innerHTML = html;
    }
  });

}
</script>


<!-- ======= Header ======= -->


</head>

<body>


  <!-- ======= Sidebar ======= -->
  <?php include 'include/asideSidebar.php'; ?>

  <main id="main" class="main" style="background-color: rgba(245, 254, 255, 1)">
    <div class="pagetitle">
      <h1 class="layout">Profiling</h1>
      <nav>
        <ol class="breadcrumb" style="background-color: transparent;">
          <li class="breadcrumb-item"><a href="index.php?id=<?php echo $_SESSION['success']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Profiling</li>
          <li class="breadcrumb-item active">Individual inventory</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <!--OLD PROCESS, should be hide-->
    <!--    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddRecord" >
        <i class="bi bi-person-plus-fill"></i><span style="padding-left: 5px;">Add</span>
    </button><br><br>





                                if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id']))
                            {
                                if (!isset($_SESSION['success']) && !isset($_SESSION['Fname']) && !isset($_SESSION['Lname']))
                                {
                                    if(!isset($_SESSION['success'])) :
                                      echo '<script type="text/javascript">location.href = "modules.php"</script>';
                                      die(); endif;
                                }
                            }


    <table id="StudentINFO" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Full name</th>
                <th>Year/Section</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Action </th>
            </tr>
        </thead>
        <tbody>

                <?php
                //                    require_once 'Config.php';
                //                    $studentData = $db->query('SELECT * FROM studentinfo')->fetchAll();
                //
                //                    foreach ($studentData as $data) :
                //                    echo '<tr>
                //                                <td>'.$data['Student_ID'].'</td>
                //                                <td>'.$data['Student_Lname'].', '.$data['Student_Fname'].'</td>
                //                                <td>'.$data['Student_Yrlvl'].' - '.$data['Student_Section'].'</td>
                //                                <td>'.$data['Student_Gender'].'</td>
                //                                <td>'.$data['Student_Status'].'</td>
                //                                <td style="" id="TDbutton">
                //                                    <a href="StudentProfile.php?id='.$_SESSION['success'].'&SView='.$data['ID'].'" class="btn btn-info"><i class="bi bi-eye-fill"></i></a>
                //                                    <a href="StudentProfile.php?id='.$_SESSION['success'].'&SUpdate='.$data['ID'].'" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                //                                    <a href="StudentProfile.php?id='.$_SESSION['success'].'&SDelete='.$data['ID'].'" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                //                                </td>
                //                          </tr>';
                //                    endforeach;
                ?>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['SView']) && isset($_SESSION['success'])) {
                  echo '<script>alert("Im view");</script>';
                }
                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['SUpdate']) && isset($_SESSION['success'])) {
                  echo '<script>alert("Im Update");</script>';
                }
                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['SDelete']) && isset($_SESSION['success'])) {
                ?>
                            <script>
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: "You won't be able to revert this!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, delete it!'
                                  }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.href = 'RemoveStudent.php?id=<?php echo $_SESSION["success"] . "&DeleteKey=" . $_GET['SDelete']; ?>';
                                    }
                                  })
                            </script>
                         <?php

                        }
                        if ($_SERVER["REQUEST_METHOD"] == "GET") {
                          if (isset($_SESSION['RemoveSucess']) && isset($_GET['Success'])) :
                            unset($_SESSION['RemoveSucess']);
                            echo "<script>
                                        Swal.fire(
                                            'Deleted!',
                                            'Student data has been deleted.',
                                            'success' )
                                      </script>";
                          endif;
                        }
                          ?>

                <script>
                    $(document).ready(function(){
                        $("#test").click(function(){
                            alert("hello");
                         });
                     });
               </script>

        </tbody>
        <tfoot>
            <tr>
                <th>Student ID</th>
                <th>Full name</th>
                <th>Year/Section</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Action </th>
            </tr>
        </tfoot>
    </table>

    <script>
        $(document).ready(function() {
            $('#StudentINFO').DataTable();
        } );
    </script>

 Modal
<div class="modal fade" id="AddRecord" tabindex="-1" role="dialog" aria-labelledby="AddRecord" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body" >
            <form method="POST" action="StudentProfile.php?id='<?php echo $_SESSION['success']; ?>'">
                <div class="form-row">
                  <div class="form-group col-md-4">
                      <label for="Stid">Student ID:</label>
                      <input type="text" class="form-control" id="Stid"  name="StudentID" placeholder="Enter student id" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="sec">Section:</label>
                    <input type="text" class="form-control" id="sec" name="StudentSec" placeholder="Enter section" required>
                  </div>
                    <div class="form-group col-md-4">
                    <label for="Year">Year Level:</label>
                    <input type="text" class="form-control" id="Year" name="StudentYrlvl" placeholder="Enter year level"required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="Lname">Lastname:</label>
                    <input type="text" class="form-control" id="Lname" name="StudentLname" placeholder="Enter lastname" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Fname">Firstname:</label>
                    <input type="text" class="form-control" id="Fname" name="StudentFname" placeholder="Enter firstname" required>
                  </div>
                    <div class="form-group col-md-4">
                    <label for="Mname">Middlename:</label>
                    <input type="text" class="form-control" id="Mname" name="StudentMname" placeholder="Enter middlename" required>
                  </div>
                </div>


                 <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="Email">Email Address:</label>
                      <input type="email" class="form-control" id="Email" name="Studentemail" placeholder="Enter email" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="num">Contact Number:</label>
                      <input type="number" class="form-control" id="num" name="StudentCon" placeholder="Enter number" required>
                    </div>

                     <div class="form-group col-md-4">
                         <label for="Bday">Birthday:</label>
                         <input type="date" class="form-control" id="Bday" name="StudentBday" required>
                    </div>
                 </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                      <label for="course">Student Course:</label>
                      <select class="form-select" name="Scourse"" required id="course">
                        <option value="" disabled selected hidden>Choose course</option>
                        <option value="Bachelor of Science in Information and Technology">BSIT</option>
                        <option value="Bachelor of Arts in History">AB History</option>
                        <option value="Bachelor of Arts in Philosophy">AB Philosophy</option>
                        <option value="Bachelor of Fine Arts Major in Industrial Design">BFA</option>
                        <option value="Bachelor of Fine Arts Major in Painting">BFA</option>
                    </select>
                  </div>

                    <div class="form-group col-md-4">
                      <label for="Sgen">Student Gender:</label>
                      <select class="form-select" name="Sgender" required id="Sgen">
                        <option value="" disabled selected hidden>Choose gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                  </div>

                    <div class="form-group col-md-4" >
                        <label for="Sstatus">Student Status:</label>
                        <select class="form-select" name="Sstatus" required id="Sstatus">
                        <option value="" disabled selected hidden>Choose student status</option>
                        <option value="Regular">Regular</option>
                        <option value="Iregular">Iregular</option>
                    </select>
                  </div>
                </div>
            <div class="form-row">
                <div class="form-group col-md-12" >
                    <label for="Sadd">Student Address:</label>
                    <input type="text" class="form-control" id="Sadd" name="StudentAdd" required placeholder="Enter student address">
                </div>
           </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="StudentSubmit" name="StudentData">Create Data</button></form>
      </div>
    </div>
  </div>
</div>-->


    <br>

    <div class="form-row ">

      <div class="form-group col-sm-12">

        <div
          style="background-color: white;  border-radius: 6px; border: 5px solid whitesmoke; box-shadow: 2px 10px 5px 5px #77aac9;">
          <div style="padding: 10px;">
            <br>

            <form method="POST" action="">
              <div class="form-row">
                <div class="form-group col-md-8"></div>

                <div class="form-group  col-md-1 ">
                  <button type="submit" style="visibility: hidden" name="SearchStudent"
                    class="btn btn-info form-control animate__animated animate__zoomInDown "><i
                      class="bi bi-search "></i></button>
                </div>

                <div class="form-group col-md-3">
                  <input type="text" autofocus required class="form-control animate__animated animate__zoomInDown"
                    id="search" name="StudentKey"
                    placeholder="<?php if (isset($_SESSION["Student_ID" . $_SESSION['success'] . ""])) {
                                                                                                                                                                echo $_SESSION["Student_ID" . $_SESSION['success'] . ""];
                                                                                                                                                              } else {
                                                                                                                                                                echo "Search ID or Name";
                                                                                                                                                              } ?>"
                    onchange="getData(this.value, 'displaydata')">
                </div>
              </div>
            </form>


            <div class="container" id="displaydata">
              <!--id="StudentData"-->



              <h5>Student Personal Information</h5><br>

              <div class="form-row">
                <div class="form-group  col-md-4">
                  <input type="text" class="form-control animate__animated animate__bounceInRight" value="<?php if (isset($_SESSION["Student_Name" . $_SESSION['success'] . ""])) {
                                                                                                            echo $_SESSION["Student_Name" . $_SESSION['success'] . ""];
                                                                                                          }   ?>">
                </div>
                <div class="form-group col-md-8">
                  <input type="text" class="form-control animate__animated animate__bounceInLeft" value="<?php if (isset($_SESSION["Student_Course" . $_SESSION['success'] . ""])) {
                                                                                                            echo $_SESSION["Student_Course" . $_SESSION['success'] . ""];
                                                                                                          } ?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <input type="text" class="form-control animate__animated animate__bounceInLeft" value="<?php if (isset($_SESSION["Student_Section" . $_SESSION['success'] . ""])) {
                                                                                                            echo $_SESSION["Student_Section" . $_SESSION['success'] . ""];
                                                                                                          }  ?>">
                </div>
                <div class="form-group col-md-3">
                  <input type="text" class="form-control animate__animated animate__bounce" value="<?php if (isset($_SESSION["Student_yrlvl" . $_SESSION['success'] . ""])) {
                                                                                                      echo $_SESSION["Student_yrlvl" . $_SESSION['success'] . ""];
                                                                                                    }    ?>">
                </div>
                <div class="form-group col-md-3">
                  <input type="text" class="form-control animate__animated animate__bounce" value="<?php if (isset($_SESSION["Student_Gender" . $_SESSION['success'] . ""])) {
                                                                                                      echo $_SESSION["Student_Gender" . $_SESSION['success'] . ""];
                                                                                                    }     ?>">
                </div>
                <div class="form-group col-md-3">
                  <input type="date" class="form-control animate__animated animate__bounceInRight" value="<?php if (isset($_SESSION["Student_Bdate" . $_SESSION['success'] . ""])) {
                                                                                                            echo $_SESSION["Student_Bdate" . $_SESSION['success'] . ""];
                                                                                                          }   ?>">
                </div>
              </div>


              <div class="form-row">
                <div class="form-group col-md-4">
                  <input type="text" class="form-control animate__animated animate__bounceInRight" value="<?php if (isset($_SESSION["Student_Religion" . $_SESSION['success'] . ""])) {
                                                                                                            echo $_SESSION["Student_Religion" . $_SESSION['success'] . ""];
                                                                                                          }  ?>">
                </div>
                <div class="form-group col-md-4">
                  <input type="text" class="form-control animate__animated animate__fadeInUpBig" value="<?php if (isset($_SESSION["Student_Nationality" . $_SESSION['success'] . ""])) {
                                                                                                          echo $_SESSION["Student_Nationality" . $_SESSION['success'] . ""];
                                                                                                        }    ?>">
                </div>
                <div class="form-group col-md-4">
                  <input type="text" class="form-control animate__animated animate__bounceInLeft" value="<?php if (isset($_SESSION["Student_Status" . $_SESSION['success'] . ""])) {
                                                                                                            echo $_SESSION["Student_Status" . $_SESSION['success'] . ""];
                                                                                                          }     ?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <input type="text" class="form-control animate__animated animate__zoomInUp" value="<?php if (isset($_SESSION["Student_Address" . $_SESSION['success'] . ""])) {
                                                                                                        echo $_SESSION["Student_Address" . $_SESSION['success'] . ""];
                                                                                                      }  ?>">
                </div>
              </div>

              <br><br><br>

              <h5>Other Information</h5><br>


              <ul class="sidebar-nav">



                <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#studenthinfo" data-bs-toggle="collapse" href="#">
                    <span>Student requirement</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="studenthinfo" class="nav-content collapse ">
                    <?php
                    require_once 'gac_Notif/documentTrackingConfigConnetion.php';
                    $verifyreQDOcs = $dtmsDB->query('SELECT * FROM datms_studreq WHERE id_number=?', $_SESSION["Student_ID" . $_SESSION['success'] . ""]);
                    if ($verifyreQDOcs->numRows() >= 1) {
                      $stdRequirement = $dtmsDB->query('SELECT * FROM datms_studreq WHERE id_number=?', $_SESSION["Student_ID" . $_SESSION['success'] . ""])->fetchAll();

                      foreach ($stdRequirement as $docs) {
                        echo '<li style="margin-left: 20px;"><i class="bi bi-arrow-right"> </i>' . $docs["req"] . '</li>';
                      }
                    } else {
                      echo '<li style="margin-left: 20px;"> <H6><i class="bi bi-exclamation-circle" style="color:red;"></i> Student information isnt available!</H6></li>';
                    }
                    ?>
                  </ul>
                </li>


                <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#Healthinfo" data-bs-toggle="collapse" href="#">
                    <span>Health Information</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="Healthinfo" class="nav-content collapse ">
                    <h4>Sample Content</h4>
                  </ul>
                </li>

                <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#Sanction" data-bs-toggle="collapse" href="#">
                    <span>Sanction Information</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="Sanction" class="nav-content collapse ">
                    <h4>Sample Content</h4>
                  </ul>
                </li>

                <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#councel" data-bs-toggle="collapse" href="#">
                    <span>Counsel Information</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="councel" class="nav-content collapse ">
                    <h4>Sample Content</h4>
                  </ul>
                </li>
              </ul>






              <script>
              $("input").keydown(function(event) {
                if (event.keyCode == 13) {
                  event.preventDefault();
                }
              });
              </script>

            </div>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["SearchStudent"])) {
              echo " <script>
                    getData(" . $_POST["SearchStudent"] . ", 'displaydata');
                 </script>";
            }
            ?>



            <!--<script type="text/javascript">
  $(document).ready(function(){
    $("#search").keypress(function(){
      $.ajax({
        type:'POST',
        url:'search.php',
        data:{
          name:$("#search").val(),
        },
        success:function(data){
          $("#StudentData").html(data);
        }
      });
    });
  });
</script>-->


            <!--POST DATA-->
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['StudentData'])) :

              require_once 'SForms/timezone.php';
              $id      = Validation($_POST['StudentID']);
              $section = Validation($_POST['StudentSec']);
              $yrlvl   = Validation($_POST['StudentYrlvl']);
              $Lname   = Validation($_POST['StudentLname']);
              $Fname   = Validation($_POST['StudentFname']);
              $Mname   = Validation($_POST['StudentMname']);
              $email   = Validation($_POST['Studentemail']);
              $Contact = Validation($_POST['StudentCon']);
              $Bday    = Validation($_POST['StudentBday']);
              $course  = Validation($_POST['Scourse']);
              $Gender  = Validation($_POST['Sgender']);
              $Status  = Validation($_POST['Sstatus']);
              $Address = Validation($_POST['StudentAdd']);

              require_once 'Config.php';
              $insert = $db->query(
                'INSERT INTO StudentInfo (Student_ID, Student_Section,
        Student_Yrlvl, Student_Lname, Student_Fname, StudentMname, Student_Email,
        Student_Contact, Student_Bday, Stundet_Course, Student_Gender, Student_Status,
        Student_Address, created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
                $id,
                $section,
                $yrlvl,
                $Lname,
                $Fname,
                $Mname,
                $email,
                $Contact,
                $Bday,
                $course,
                $Gender,
                $Status,
                $Address,
                $dt->format('Y-m-d H:i:s')
              );

              if ($insert->affectedRows() === 1) {
                echo " <script>let timerInterval
                    Swal.fire({
                      title: 'Adding Student Data!',
                      html: 'Please wait.. <b></b> milliseconds.',
                      timer: 1500,
                      timerProgressBar: true,
                      didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                          b.textContent = Swal.getTimerLeft()
                        }, 100)
                      },
                      willClose: () => {
                        clearInterval(timerInterval)
                      }
                    }).then((result) => {
                      /* Read more about handling dismissals below */
                      if (result.dismiss === Swal.DismissReason.timer) {
                        location.href = 'StudentProfile.php?id=" . $_SESSION["success"] . "'
                      }
                    })</script>";
              }
            endif;

            function Validation($validate)
            {
              $validate = trim($validate);
              $validate = stripslashes($validate);
              $validate = htmlspecialchars($validate);
              return $validate;
            }
            ?>



            <!--Chat support content-->
            <div class="form-row fixed-bottom ">
              <div class="form-group col-md-11"></div>
              <div class="form-group  col-md-1">

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
