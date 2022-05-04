<?php
  include_once('security/newsource.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Annual Medical Reports</title>
<head>
<?php include ('includes/head_ext.php');?>
<script>
  $(document).ready(function(){
    $("button").click (function(){
       $ ("#ShowTableResult").load("labtest-table.php");
    });
});
</script>
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
  <div class="row">
    <div class="col-lg-12">
      <div class="card border border-danger">
        <div class="card-body" >
          <h1 class="card-title">Result</h1>
          <!-- <div id="ShowTableResult"></div> -->
          <div class="table-responsive">
            <table class="table table-hover datatable">
              <?php
              require_once "security/newsource.php";
                $query = "SELECT * FROM ms_labtest ORDER BY id ASC";
                $query_run = mysqli_query($conn, $query);
                date_default_timezone_set("asia/manila");
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
                    <td>
                        <button class= "btn btn-warning btn-sm" name ="id_view" onclick="view()" title="View" href="#" id ="veiw" value ="<?php echo $row['id']; ?>"><i class="bx bxs-bullseye"></i></button>
                        <a class= "btn btn-secondary btn-sm " title="Download" href="../assets/img/BCPlogo.png" id ="download"  download><i class="bx bxs-download"></i></a>
                        <button class= "btn btn-danger btn-sm" name ="id_trash" onclick="deleteID()" title="Delete" href="#" id ="deleteID" value ="<?php echo $row['id']; ?>"><i class="bx bxs-trash-alt"></i></button>
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


</section>
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
<!-- crud function -->
<script>
function deleteID(){
  var deleteID  = document.getElementById("deleteID").value;
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

</script>
</main>
<?php 
include('includes/footer.php'); 
?>
</body>
</html>