<?php
  include_once('security/newsource.php');


?>
<!DOCTYPE html>
<html lang="en">
<title>Programs</title>
<head>
<?php include ('includes/head_ext.php');?>
<script>
  function updateClose(closeStatus){
    var status = document.getElementById('close').value;
    if(status != ''){
      $.ajax({
          type: "POST",
          url: 'resources/searchStdID.php',
          data: takeDataintoArray,
          cache: false,
          success: function(data)
          {
            var ajaxDisplay = document.getElementById(showStudentInformation);
            ajaxDisplay.innerHTML = data;
          }});
    }else{
      alert("ASd2");
    }
  }

</script>
</head>

<body>
<?php $page = "progs"; $nav="Programs";?>
<?php include ('includes/header.php');?>
<?php include ('includes/sidebar.php');?>
<main id="main" class="main">

<!-- Page Title -->
  <div class="pagetitle">
    <h1>List of Programs</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a></li>
        <li class="breadcrumb-item active">List of Programs</li>
      </ol>
    </nav>
  </div>
<section class="section2">
  <div class="card">
    <div class="p-2 mx-4 d-flex justify-content-center" style="border-bottom: solid 2px whitesmoke;">
      <h3 style ="color:#012970; padding-top: 2rem; margin-bottom: 2rem; margin-left: auto; margin-right: auto;">Program Logs</h3>
    </div>
    <div class="mx-4" style="border-bottom: solid px gray; display: flex; flex-direction: row-reverse;"> 
       <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#progForm"><i class="ri-add-circle-line"></i>&nbspAdd Program</button>
    </div>
        <!-- Table Starts --> 
        <div class="table-responsive p-4">
          <table class="table table-hover datatable">
            <?php
              $query = "SELECT * FROM clinic_program ORDER BY prog_id ASC";
              $query_run = mysqli_query($conn, $query);
              
            ?>
                  <!-- Table Head -->
              <thead style="background-color:whitesmoke;" >
                  <tr>
                      <th scope="col">Programs</th>
                      <th scope="col">Description</th>
                      <th scope="col">Start Date</th>
                      <th scope="col">Authorized</th>
                      <th scope="col">status</th>
                      <th scope="col">Action</th>
                  </tr>
              </thead>
              <tbody>
              <?php
                if(mysqli_num_rows($query_run) > 0 )
                {
                  while($row = mysqli_fetch_assoc($query_run))
                  {
              ?>
                <tr>
                  <td><?php echo $row['program'];?></td>
                  <td><?php echo $row['descr'];?></td>
                  <td><?php echo $row['date_start'];?></td>
                  <td><?php echo $row['authority'];?></td>
                  <?php 
                  $prog_id = $row['prog_id'];
                  $status = $row['status'];
                  if ($status == "Closed") { ?> 
                  <td class ="text-danger"><?php echo $row['status'];?></td>
                  <?php } elseif ($status == "Open") { ?>
                  <td class ="text-success"><?php echo $row['status'];?></td>
                  <?php } ?>
                  <td class="text-center">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">   
                      <a class= "btn btn-success" title="Edit" href="#"><i class="ri-edit-2-fill"></i></a>  
                      <?php if ($status == "Open"){ ?>
                      <button class="btn btn-primary" title="Open" disabled><i class="ri-check-line" ></i></button>
                      <a  class="btn btn-danger" title="Close" href="#" id="close" value="<?php $prog_id ?>" onclick="updateClose('closeStatus');"><i class="ri-close-line"></i></a>   
                      <?php } elseif ($status == "Closed"){ ?>
                      <a  class="btn btn-primary" title="Open" href="resources/program_open.php?id=<?= $row['prog_id']?>"><i class="ri-check-line"></i></a>   
                      <button class="btn btn-danger" title="Closed" disabled><i class="ri-close-line" ></i></button>
                      <?php } ?>                     
                    </div>
                  </td>
                </tr>
              <?php } 
                }
              ?>
              </tbody>
          </table>
        </div>
      </div>
<form action="resources/add_program.php" method="POST" enctype="multipart/form-data">
<div class="modal fade" id="progForm" tabindex="-1" aria-labelledby="myModallabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title text-light" id="exampleModalLongTitle">Add Program</h5>
        <a type="button" class="close text-light" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col">  
            <div class="form-floating">
              <input type="text" class="form-control" name="program_name" id="program_name" placeholder="program_name" style="text-transform:capitalize;" required>
              <label for="floatingName">Program</label>
            </div>
          </div>
        </div>
        <div class="col">
          <label class="p-2">Description</label>
          <textarea rows="4" class="form-control" style="text-transform:capitalize;" name="descr" required></textarea>
        </div>
        <div class="row">
          <div class="col-sm-12 pt-4">
            <div class="form-floating">
              <select id="authorized" name="authorized" class="form-select">
              <option value="" selected="selected" disabled="disabled">Select Role</option>
              <option value="Nurse">Nurse</option>
              <option value="Dentist">Dentist</option>
              <option value="School Physician">School Physician</option>
              </select>
              <label for="floatingSelect">Authorized</label>
            </div>
          </div>
          <div class="col-sm-12 py-4">
            <div class="form-floating">
              <input type="date" class="form-control" name="startDate" id="startDate" required>
              <label for="floatingName">Start Date</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="text-end">
          <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
          <button type="close" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">close</button>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
</section> <!-- End -->


</main>
<?php include('includes/footer.php'); ?>
</body>
</html>