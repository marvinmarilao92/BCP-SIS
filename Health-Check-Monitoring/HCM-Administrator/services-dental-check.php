<?php
include_once('security/newsource.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>HCM | Dashboard</title>
<head>
<?php include ('includes/head_ext.php');?>

</head>

<body>
<?php $page = "dental-services";?>
<?php include ('includes/header.php');?>
<?php include ('includes/sidebar.php');?>
<main id="main" class="main">

<!-- Page Title -->
  <div class="pagetitle">
    <h1>List of Records</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a></li>
        <li class="breadcrumb-item active">Records List</li>
      </ol>
    </nav>
  </div>
  
<section class="section2">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body" >
          <h1 class="card-title">Medical Records</h1>
          <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100 active" id="student-tab" data-bs-toggle="tab" data-bs-target="#student-justified" type="button" role="tab" aria-controls="student" aria-selected="true">student</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100 " id="faculty-tab" data-bs-toggle="tab" data-bs-target="#faculty-justified" type="button" role="tab" aria-controls="faculty" aria-selected="false">faculty</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="Non-Teaching-tab" data-bs-toggle="tab" data-bs-target="#Non-Teaching-justified" type="button" role="tab" aria-controls="Non-Teaching" aria-selected="true">Non-Teaching</button>
            </li>
          </ul> 
          <div class="tab-content pt-2" id="myTabjustifiedContent">
            <div class="tab-pane fade show active" id="student-justified" role="tabpanel" aria-labelledby="student-tab">
              <div class="card p-4">
                <!-- Table Starts --> 
                <div class="table-responsive">
                  <table class="table table-hover datatable" id="table">
                    <?php
                      $deptStudent = "Student";
                      $serv = "Dental Services";
                      $query = "SELECT * FROM ms_services WHERE dept = '$deptStudent' AND `service` = '$serv' ORDER BY id ASC";
                      $query_run = mysqli_query($conn, $query);
                    ?>
                          <!-- Table Head -->
                      <thead style="background-color:whitesmoke;">
                          <tr>
                              <th scope="col">ID Number</th>
                              <th scope="col">Full Name</th>
                              <th scope="col">Description</th>
                              <th scope="col">Services</th>
                              <th scope="col">Date</th>
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
                          <td><?php echo $row['id_number'];?></td>
                          <td><?php echo $row['full_n'];?></td>
                          <td><?php echo $row['descr'];?></td>
                          <td><?php echo $row['service'];?></td>
                          <td><?php echo $row['date'];?></td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">   
                              <a  class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#checkModal" title="View"><i class="ri-eye-2-line"></i></a>  
                              <a  class="btn btn-warning" title="Edit"><i class="ri-edit-2-fill"></i></a>                                          
                              <a class= "btn btn-danger" href="resources/delete.php?req_id=<?= $row['id']?>"><i class="ri-delete-bin-6-fill"></i></a>
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
            </div>
            <div class="tab-pane fade " id="faculty-justified" role="tabpanel" aria-labelledby="faculty-tab">
              <div class="card p-4">
                <div class="table-responsive">
                  <table class="table table-hover datatable" id="table">
                    <?php
                      $deptFaculty = "Faculty";
                      $query = "SELECT * FROM ms_services WHERE dept = '$deptFaculty' AND `service` = '$serv' ORDER BY id ASC";
                      $query_run = mysqli_query($conn, $query);
                    ?>
                          <!-- Table Head -->
                      <thead style="background-color:whitesmoke;">
                          <tr>
                              <th scope="col">ID Number</th>
                              <th scope="col">Full Name</th>
                              <th scope="col">Description</th>
                              <th scope="col">Service</th>
                              <th scope="col">Date</th>
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
                          <td><?php echo $row['id_number'];?></td>
                          <td><?php echo $row['fullname'];?></td>
                          <td><?php echo $row['descr'];?></td>
                          <td><?php echo $row['service'];?></td>
                          <td><?php echo $row['date'];?></td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">   
                              <a  class="btn btn-secondary" title="View"><i class="ri-eye-2-line"></i></a>  
                              <a  class="btn btn-warning" title="Edit"><i class="ri-edit-2-fill"></i></a>                                          
                              <a class= "btn btn-danger" href="resources/delete.php?req_id=<?= $row['id']?>"><i class="ri-delete-bin-6-fill"></i></a>
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
            </div>
            <div class="tab-pane fade " id="Non-Teaching-justified" role="tabpanel" aria-labelledby="Non-Teaching-tab">
              <div class="card p-4">
                <div class="table-responsive"> 
                  <table class="table table-hover datatable" id="table">
                    <?php
                      $deptNT = "Non-Teaching";
                      $query = "SELECT * FROM ms_services WHERE dept = '$deptNT' AND `service` = '$serv' ORDER BY id ASC";
                      $query_run = mysqli_query($conn, $query);
                    ?>
                          <!-- Table Head -->
                      <thead style="background-color:whitesmoke;">
                          <tr>
                              <th scope="col">ID Number</th>
                              <th scope="col">Full Name</th>
                              <th scope="col">Description</th>
                              <th scope="col">Service</th>
                              <th scope="col">Date</th>
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
                          <td><?php echo $row['id_number'];?></td>
                          <td><?php echo $row['fullname'];?></td>
                          <td><?php echo $row['descr'];?></td>
                          <td><?php echo $row['service'];?></td>
                          <td><?php echo $row['date'];?></td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">   
                              <a  class="btn btn-secondary" title="View"><i class="ri-eye-2-line"></i></a>  
                              <a  class="btn btn-warning" title="Edit"><i class="ri-edit-2-fill"></i></a>                                          
                              <a class= "btn btn-danger" href="resources/delete.php?req_id=<?= $row['id']?>"><i class="ri-delete-bin-6-fill"></i></a>
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
            </div>
          </div>
        </div>   
      </div>
    </div>
  </div>
</section> <!-- End -->
<div class="modal fade" id="checkModal" tabindex="-1" role="dialog" aria-labelledby="checkModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="checkModal">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</main>
<?php include('includes/footer.php'); ?>
</body>
</html>