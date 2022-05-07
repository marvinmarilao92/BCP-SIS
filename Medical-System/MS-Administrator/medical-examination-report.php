<?php
  include_once('security/newsource.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Annual Medical Reports</title>
<head>
<?php include ('includes/head_ext.php');?>
<script>
  
  function viewContent(viewID, viewresult) {

    $.ajax({
    url: 'resources/ajax/Msview.php?viewID='+viewID,
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
    url: 'resources/ajax/Msedit.php?editID='+editID,
    success: function(html) {
        var ajaxDisplay = document.getElementById(editresult);
        ajaxDisplay.innerHTML = html;
        $("#viewModal").modal("hide");
        $("#editModal").modal("show");
        
      }
    });
}

function addRecord(){
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
<?php $page = "daily-logs"?>
<?php include ('includes/header.php');?>
<?php include ('includes/sidebar.php');?>
<main id="main" class="main">
<!-- Page Title -->
  <div class="pagetitle">
    <h1>Annual Medical Reports</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a></li>
        <li class="breadcrumb-item active">Annual Medical Reports</li>
      </ol>
    </nav>
  </div>


<section class="section2">
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="card border border-danger">
        <div class="card-body" >
          <div class="d-flex bd-highlight mb-3">
            <h1 class="card-title me-auto me-auto p-2 bd-highlight">Result</h1>
            <div class="btn btn-danger p-2 bd-highlight" onclick="addRecord()" >Add Record</div>
          </div>
          <!-- <div id="ShowTableResult"></div> -->
          <div class="table-responsive">
            <table class="table table-hover datatable">
              <?php
              require_once "security/newsource.php";
                $query = "SELECT ms_labtest.*, student_information.email FROM ms_labtest LEFT JOIN student_information ON ms_labtest.id_number = student_information.id_number ORDER BY id ASC";
                $query_run = mysqli_query($conn, $query);
                date_default_timezone_set("asia/manila");
                $tablename = "ms_labtest";
              ?>
                    <!-- Table Head -->
                <thead style="background-color:whitesmoke;">
                    <tr>
                        <th scope="col">ID Number</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Course</th>
                        <th scope="col">Year Level</th>
                        <th scope="col">Phone #</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                  if(mysqli_num_rows($query_run) > 0 )
                  {
                    while($row = mysqli_fetch_assoc($query_run))
                    {
                      // $date1 = $row['sched_from'];
                      // $date2 = $row['sched_to'];
                      // $newDate1 = date("F j, Y", strtotime($date1));
                      // $newDate2 = date("F j, Y", strtotime($date2));
                ?>
                  <tr>
                    <td onclick = "edit();" id="editID" title = "edit" style = "cursor:pointer;" value="<?php echo $row['id']?>"><?php echo $row['id_number'];?></td>
                    <td onclick = "edit();" id="editID" title = "edit" style = "cursor:pointer;" value="<?php echo $row['id']?>"><?php echo $row['full_n'];?></td>
                    <td onclick = "edit();" id="editID" title = "edit" style = "cursor:pointer;" value="<?php echo $row['id']?>"><?php echo $row['datetime'];?></td>
                    <td onclick = "edit();" id="editID" title = "edit" style = "cursor:pointer;" value="<?php echo $row['id']?>"><?php echo $row['course'];?></td>
                    <td onclick = "edit();" id="editID" title = "edit" style = "cursor:pointer;" value="<?php echo $row['id']?>"><?php echo $row['yr_lvl'];?></td>
                    <td onclick = "edit();" id="editID" title = "edit" style = "cursor:pointer;" value="<?php echo $row['id']?>"><?php echo $row['contact'];?></td>
                    <td id="Send" title = "edit" style = "cursor:pointer;" value="<?php echo $row['id']?>"><?php echo $row['email'];?><a title = "send" class="btn btn-secondary btn-sm" href ="#"><i class="bx bx-send"></i></a></td>
                    <td>
                        <a href="#" class= "btn btn-warning btn-sm" onclick="viewContent(<?php echo $row['id'];?>, 'viewresult');" title="View" href="#" id ="veiwID" ><i class="bx bxs-bullseye"></i>View</a>
                        <a title = "view" class="btn btn-secondary btn-sm" href ="resources/viewPDF.php?file=<?= $row['file_name'];?>&tablename=<?= $tablename ?>"><i class="bx bxs-file-pdf"></i>PDF</a>
                        <a class= "btn btn-danger btn-sm" name ="id_trash" onclick="deleteID()" title="Delete" href="#" id ="deleteID" value ="<?php echo $row['id']; ?>"><i class="bx bxs-trash-alt"></i>Delete</a>
                    </td>
                  </tr>
                <?php } 
                  }
                ?>  
                </tbody>
            </table>
          </div>
        </div>  
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="viewModal" aria-hidden="true" aria-labelledby="viewModalLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel">Student Information</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="viewresult"></div>
      </div>
      <div class="modal-footer">
        <a href="#" class= "btn btn-danger btn-sm" onclick="editContent('editresult');" title="Edit" ><i class="bx bxs-pencil"></i>Edit</a>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editModal" aria-hidden="true" aria-labelledby="editModalLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel2">Modal 2</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="editresult"></div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" data-mdb-target="#viewModal" data-mdb-toggle="modal" data-mdb-dismiss="modal">Cancel Editing</button>
        <button class="btn btn-danger" onclick="saveChanges()" data-mdb-dismiss="modal">Save Changes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="addModal" aria-hidden="true" aria-labelledby="addModalLabel2" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-light">
        <h5 class="modal-title" id="addModalLabel2">Add Record</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row g-4">
          <div class="col p-3">
            <div class="input-group">
              <input type="text" placeholder="Search Student Number" id="quickSearch" class="form-control" name="search" onchange="searchInfo('showStudentResult');">
              <label for="sub"><i class="btn btn-danger ri-search-eye-line" style="cursor: pointer;">&nbspSearch</i></label> 
              <a href="#" id ="sub" onclick="searchInfo('showStudentResult');" name="submit" style="display: none; visibility: none;"></a>
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
        <button class="btn btn-secondary" data-mdb-toggle="close" data-mdb-dismiss="modal">Cancel</button>
        <button class="btn btn-danger" onclick="addNow()">Add Now</button>
      </div>
    </div>
  </div>
</div>
</section>
</main>



<?php   
include('includes/footer.php'); 
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
  function addNow(){
    var id_number  = document.getElementById("id_number").value;
    var course  = document.getElementById("course").value;
    var name  = document.getElementById("name").value;
    var id_number  = document.getElementById("id_number").value;
    alert(id_number)
  }
</script>

<script>
  function myFunction() {
    window.print();
}  
</script>
<!-- crud function -->
<script>
function deleteID(){
  var deleteID  = document.getElementById(deleteID).value;
  var table = "ms_labtest";
  var takeDataintoArray =
    'deleteID='     + deleteID + '&table=' + table ;
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
          location.href = 'resources/trash.php?id='+deleteID+'&table='+table;
        })
  }
})

}


function edit(){
  var editID  = document.getElementById("deleteID").value;
  var takeDataintoArray =
    'editID='     + editID;
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
        inputValidator: function (value) {
          return new Promise(function (resolve, reject) {
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

function saveChanges(){
  Swal.fire({
          allowOutsideClick: true,
          icon: 'question',
          title: 'Do you want to Save Changes ?',
          showConfirmButton: true,
          showCancelButton: true,
        }).then((result) => {
          if (result.isConfirmed) { 

            var id_number  = document.getElementById("id_number").value;
            var full_name  = document.getElementById("full_name").value;
            var start  = document.getElementById("start").value;
            var end  = document.getElementById("end").value;

            var takeDataintoArray = 
              'course='  + course + 
              '&yr_lvl=' + yr_lvl + 
              '&start=' + start + 
              '&end=' + end ;
          }
        })

}

</script>

<script>
  
function insertSched(){
  var course  = document.getElementById("course").value;
  var yr_lvl  = document.getElementById("yr_lvl").value;
  var start  = document.getElementById("start").value;
  var end  = document.getElementById("end").value;

  var takeDataintoArray = 
  'course='  + course + 
  '&yr_lvl=' + yr_lvl + 
  '&start=' + start + 
  '&end=' + end ;

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
              success: function(html)
              {
                location.reload();
              }});
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


  function searchInfo(showStudentResult)
  {
    var quickSearch  = document.getElementById("quickSearch").value;
    var takeDataintoArray =
    'quickSearch='     + quickSearch;
    if (quickSearch != '')
    {
      $.ajax({
          type: "GET",
          url: 'resources/ajax/MSrecord.php',
          data: takeDataintoArray,
          cache: false,
          success: function(html)
          {
            var ajaxDisplay = document.getElementById(showStudentResult);
            ajaxDisplay.innerHTML = html;
          }});
    }
    else
    {
     alert('Asd')
    }
  }


</script>

</body>
</html>