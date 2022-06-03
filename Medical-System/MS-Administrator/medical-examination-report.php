<?php
include_once 'security/newsource.php';
?>
<!DOCTYPE html>
<html lang="en">
<title>Annual Medical Reports</title>

<head>
  <?php include('includes/head_ext.php') ?>
  </script>

  <script>
  function viewContent(viewID, viewresult) {

    $.ajax({
      url: 'resources/ajax/Msview.php?viewID=' + viewID,
      success: function(html) {
        var ajaxDisplay = document.getElementById(viewresult);
        ajaxDisplay.innerHTML = html;
        $("#viewModal").modal("show");

      }
    });

  }

  function editContent(editresult) {
    var editID = document.getElementById("id").value;
    $.ajax({
      url: 'resources/ajax/Msedit.php?editID=' + editID,
      success: function(html) {
        var ajaxDisplay = document.getElementById(editresult);
        ajaxDisplay.innerHTML = html;
        $("#viewModal").modal("hide");
        $("#editModal").modal("show");

      }
    });
  }

  function addRecord() {
    $("#addModal").modal("show");
  }
  </script>

  <!-- <script>
  $(document).ready(function(){
    $("button").click (function(){
       $ ("#ShowTableResult").load("labtest-table.php");
    });
});
</script> -->
</head>

<body>
  <?php $page = 'daily-logs';
  $nav = "manage" ?>
  <?php include 'includes/header.php'; ?>
  <?php include 'includes/sidebar.php'; ?>
  <main id="main" class="main">
    <!-- Page Title -->
    <div class="pagetitle">
      <h1>Annual Medical Reports</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a>
          </li>
          <li class="breadcrumb-item active">Annual Medical Reports</li>
        </ol>
      </nav>
    </div>

    <section class="section2">
      <div class="row">
        <div class="col-lg-12">
          <?php if (isset($_SESSION['alert'])) { ?>
          <div class="alert alert-info" role="alert"><strong><?php echo $_SESSION['alert'] ?></strong></div>
          <?php } else if (isset($_SESSION['alert2'])) { ?>
          <div class="alert alert-danger " role="alert"><strong><?php echo $_SESSION['alert2'] ?></strong></div>
          <?php } ?>
          <div class="card border border-primary">
            <div class="card-body">
              <div class="d-flex bd-highlight mb-3">
                <h1 class="card-title me-auto me-auto p-2 bd-highlight">Recent</h1>
                <!-- <div class="btn btn-primary p-2 bd-highlight" onclick="addRecord()">Add Record</div> -->
              </div>
              <?php require_once "timezone.php";
              $sql = $db->query('SELECT * FROM ms_labtest')->fetchAll();
              ?>
              <div class="table-responsive">
                <table class="display table" id="medtable" cellspacing="0">
                  <thead>
                    <tr>
                      <th scope="col">ID Number</th>
                      <th scope="col">Full Name</th>
                      <th scope="col">Program</th>
                      <th scope="col">Section</th>
                      <th scope="col">Year Level</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <?php foreach ($sql as $data) { ?>
                  <tbody>

                    <tr>
                      <td><?php echo $data['id_number']; ?></td>
                      <td><?php echo $data['full_n']; ?></td>
                      <td><?php echo $data['course']; ?></td>
                      <td><?php echo $data['section']; ?></td>
                      <td><?php echo $data['yr_lvl']; ?></td>
                      <td>
                        <a href="#" id="manage" onclick="manage('<?php echo $data['id']; ?>', 'manageField');"
                          class="btn btn-outline-primary text-dark"><i class="bi bi-box"></i>&nbspUpload Result</a>
                        <!-- <a href="resources/viewPDF.php?id=<?php echo $data['id'] ?>"
                          class="btn btn-outline-success text-dark"><i class="bi bi-file-pdf"></i>&nbspView
                          Recommendation</a> -->
                        <a href="resources/viewPDF2.php?id=<?php echo $data['id'] ?>"
                          class="btn btn-outline-info text-dark"><i class="bi bi-file-pdf"></i>&nbspView
                          Result</a>
                      </td>
                    </tr>
                  </tbody>
                  <?php } ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="viewModal" data-bs-backdrop="static" aria-hidden="true"
        aria-labelledby="viewModalLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="viewModalLabel">Student Information</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div id="viewresult"></div>
            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-danger btn-sm" onclick="editContent('editresult');" title="Edit"><i
                  class="bx bxs-pencil"></i>Edit</a>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="editModal" data-bs-backdrop="static" aria-hidden="true"
        aria-labelledby="editModalLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel2">Modal 2</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div id="editresult"></div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" data-bs-target="#viewModal" data-bs-toggle="modal"
                data-bs-dismiss="modal">Cancel Editing</button>
              <button class="btn btn-danger" onclick="saveChanges()" data-bs-dismiss="modal">Save Changes</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="addModal" data-bs-backdrop="static" aria-hidden="true"
        aria-labelledby="addModalLabel2" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-primary text-light">
              <h5 class="modal-title" id="addModalLabel2">Add Record</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row g-4">
                <div class="col p-3">
                  <div class="input-group">
                    <input type="text" placeholder="Search Student Number" id="quickSearch" class="form-control"
                      name="search" onchange="searchInfo('showStudentResult');">
                    <label for="sub"><i class="btn btn-primary ri-search-eye-line"
                        style="cursor: pointer;">&nbspSearch</i></label>
                    <a href="#" id="sub" onclick="searchInfo('showStudentResult');" name="submit"
                      style="display: none; visibility: none;"></a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="container">
                  <div id="showStudentResult"></div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" data-bs-toggle="close" data-bs-dismiss="modal">Cancel</button>
              <button class="btn btn-danger" onclick="addNow();">Add Now</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="manageModal" data-bs-backdrop="static" aria-hidden="true"
        aria-labelledby="addModalLabel2" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-primary text-light">
              <h5 class="modal-title" id="addModalLabel2">Add Record</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="container">
                  <form action="resources/meduploads.php" method="POST" enctype="multipart/form-data">
                    <div id="manageField"></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 border p-4">
                      <div class="row">
                        <div class="card-title">Upload Files</div>
                        <!-- <label for="" class="p-2">Recommendation Letter</label>
                        <input type="file" name="file1" id="file1" accept="application/pdf, application/msword"
                          class="form-control"> -->
                        <label for="" class="p-2">Annual Medical Examination Result</label>
                        <input type="file" name="file2" id="file2" accept="application/pdf" class="form-control">
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" data-bs-toggle="close" data-bs-dismiss="modal">Cancel</button>
              <button class="btn btn-primary" type="submit" name="submit">Add Now</button></form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>



  <?php
  include 'includes/footer.php';
  ?>
  <!-- Dynamic Table Function -->
  <!-- <script>
  function loadXMLDoc(){
  var xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200){
      document.getElementById("ShowTableResult").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","labtest-table.php", true);
  xhttp.send();
}
setInterval(function(){
    loadXMLDoc();
},100)

window.onload = loadXMLDoc;
</script> -->

  <script>
  function manage(manage, manageField) {
    $.ajax({
      url: 'resources/ajax/manageame.php?id=' + manage,
      success: function(html) {
        var ajaxDisplay = document.getElementById(manageField);
        ajaxDisplay.innerHTML = html;
        $("#manageModal").modal("show");
      }
    });
  }
  </script>


  <script>
  $(document).ready(function() {
    $('#medtable').DataTable();
  });
  </script>
  <script>
  function addNow() {
    var id_number = document.getElementById("id_number").value;
    var course = document.getElementById("course").value;
    var name = document.getElementById("name").value;
    var yr_lvl = document.getElementById("yr_lvl").value;
    var takeDataintoArray =
      'id_number=' + id_number + '&course=' + course + '&name=' + name + '&table=' + table;
  }
  </script>

  <script>
  function myFunction() {
    window.print();
  }
  </script>
  <!-- crud function -->
  <script>
  function deleteID() {
    var deleteID = document.getElementById(deleteID).value;
    var table = "ms_labtest";
    var takeDataintoArray =
      'deleteID=' + deleteID + '&table=' + table;
    Swal.fire({
      toast: true,
      allowOutsideClick: false,
      icon: 'question',
      title: 'Do you want to Delete Schedule?',
      text: 'Note: You cannot undo this action',
      confirmButtonText: 'Delete',
      confirmButtonColor: '#f93154',
      cancelButtonColor: '#B23CFD',
      showCancelButton: true,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        Swal.fire({
          icon: 'success',
          title: 'You Have Deleted a Record',
          text: 'Please be careful to delete next time',
          timer: 4000,
          timerProgressBar: true,
        }).then(() => {
          location.href = 'resources/trash.php?id=' + deleteID + '&table=' + table;
        })
      }
    })

  }


  function edit() {
    var editID = document.getElementById("deleteID").value;
    var takeDataintoArray =
      'editID=' + editID;
    Swal.fire({
      toast: true,
      allowOutsideClick: false,
      icon: 'question',
      title: 'Do you want to Edit ?',
      confirmButtonText: 'Edit yes',
      confirmButtonColor: '#f93154',
      cancelButtonColor: '#B23CFD',
      showCancelButton: true,
    }).then((result) => {
      if (result.isConfirmed) {
        swal.fire({
          title: 'Course',
          input: 'text',
          inputPlaceholder: 'Enter your name or nickname',
          showCancelButton: true,
          inputValidator: function(value) {
            return new Promise(function(resolve, reject) {
              if (value) {
                resolve()
              } else {
                reject('You need to write something!')
              }
            })
          }
        })
      }
    })
  }

  function saveChanges() {
    Swal.fire({
      allowOutsideClick: true,
      icon: 'question',
      title: 'Do you want to Save Changes ?',
      showConfirmButton: true,
      showCancelButton: true,
    }).then((result) => {
      if (result.isConfirmed) {

        var id_number = document.getElementById("id_number").value;
        var full_name = document.getElementById("full_name").value;
        var start = document.getElementById("start").value;
        var end = document.getElementById("end").value;

        var takeDataintoArray =
          'course=' + course +
          '&yr_lvl=' + yr_lvl +
          '&start=' + start +
          '&end=' + end;
      }
    })

  }
  </script>

  <script>
  function insertSched() {
    var course = document.getElementById("course").value;
    var yr_lvl = document.getElementById("yr_lvl").value;
    var start = document.getElementById("start").value;
    var end = document.getElementById("end").value;

    var takeDataintoArray =
      'course=' + course +
      '&yr_lvl=' + yr_lvl +
      '&start=' + start +
      '&end=' + end;

    if (course != '' && yr_lvl != '' && start != '' && end != '') {

      if (start > end) {

        Swal.fire({
          allowOutsideClick: true,
          toast: true,
          icon: 'error',
          title: 'Please specify the date properly',
          showConfirmButton: true,
        })

      } else {

        Swal.fire({
          icon: 'question',
          title: 'Create a Schedule ?',
          showCancelButton: true,
          showConfirmButton: true,
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire({
              icon: 'success',
              title: 'You Have Created A Schedule',
              text: 'Wait for a Bit',
              timer: 4000,
              timerProgressBar: true,
              backdrop: `rgba(255,0,0,0.3) left top no-repeat`
            }).then(() => {
              $.ajax({
                type: "POST",
                url: 'resources/ajax/MSscheduler.php',
                data: takeDataintoArray,
                cache: false,
                success: function(html) {
                  location.reload();
                }
              });
            })
          }
        })
      }
    } else {
      Swal.fire({
        allowOutsideClick: true,
        toast: true,
        icon: 'error',
        title: 'Please Complete the following Form',
        showConfirmButton: true,

      })
    }
  }


  function searchInfo(showStudentResult) {
    var quickSearch = document.getElementById("quickSearch").value;
    var takeDataintoArray =
      'quickSearch=' + quickSearch;
    if (quickSearch != '') {
      $.ajax({
        type: "GET",
        url: 'resources/ajax/MSrecord.php',
        data: takeDataintoArray,
        cache: false,
        success: function(html) {
          var ajaxDisplay = document.getElementById(showStudentResult);
          ajaxDisplay.innerHTML = html;
        }
      });
    } else {
      alert('Asd')
    }
  }
  </script>

</body>

</html>