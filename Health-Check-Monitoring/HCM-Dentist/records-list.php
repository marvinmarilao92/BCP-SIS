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
<?php $page = "Records-list"?>
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
              <button class="nav-link w-100" id="faculty-tab" data-bs-toggle="tab" data-bs-target="#faculty-justified" type="button" role="tab" aria-controls="faculty" aria-selected="false">faculty</button>
            </li>
          </ul> 
          <div class="tab-content pt-2" id="myTabjustifiedContent">
            <div class="tab-pane fade show active" id="student-justified" role="tabpanel" aria-labelledby="student-tab">
              <div class="card p-4">
                <!-- Table Starts --> 
                <div class="table-responsive">
                  <table class="table table-hover datatable">
                    <?php
                      $isApproved = "Approved";
                      $query = "SELECT * FROM hcms_student_records WHERE `status` = '$isApproved' ORDER BY id ASC";
                      $query_run = mysqli_query($conn, $query);
                    ?>
                          <!-- Table Head -->
                      <thead style="background-color:whitesmoke;">
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Student Number</th>
                              <th scope="col">Remarks</th>
                              <th scope="col">Date Approved</th>
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
                          <td>#<?php echo $row['id'];?></td>
                          <td><?php echo $row['stud_id'];?></td>
                          <td><?php echo $row['remarks'];?></td>
                          <td><?php echo $row['assess_date'];?></td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">   
                            <?php $table_name = "hcms_medical_records";?>
                              <a  class="btn btn-secondary" title="View"><i class="ri-eye-2-line"></i></a>              
                              <a class= "btn btn-primary" href="resources/req_approved.php?req_id=<?= $row['id']?>&tablename=<?= $table_name?>"><i class="ri-edit-2-fill"></i></a>                               
                              <a class= "btn btn-danger" href="resources/req_reject.php?req_id=<?= $row['id']?>&tablename=<?= $table_name?>"><i class="ri-delete-bin-6-fill"></i></a>
                            </div>
                          </td>
                        </tr>
                      <?php } 
                        }
                      ?>
                      </tbody>
                  </table>
                  <?php if(isset($_GET['dlt'])): ?>
                    <div class = "flash-data" data-flashdata="<?= $_GET['dlt']; ?>"></div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="tab-pane fade " id="faculty-justified" role="tabpanel" aria-labelledby="faculty-tab">
              <div class="card p-4">
              <!-- Table Starts --> 
                <div class="table-responsive">
                <div class="table-responsive">
                  <table class="table table-hover datatable">
                    <?php
                      $isApproved = "Approved";
                      $query = "SELECT * FROM hcms_faculty_records WHERE `status` = '$isApproved' ORDER BY id ASC";
                      $query_run = mysqli_query($conn, $query);
                    ?>
                          <!-- Table Head -->
                      <thead style="background-color:whitesmoke;">
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Student Number</th>
                              <th scope="col">Remarks</th>
                              <th scope="col">Date Approved</th>
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
                          <td>#<?php echo $row['id'];?></td>
                          <td><?php echo $row['stud_id'];?></td>
                          <td><?php echo $row['remarks'];?></td>
                          <td><?php echo $row['assess_date'];?></td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">   
                            <?php $table_name = "hcms_medical_records";?>
                              <a  class="btn btn-secondary" title="View"><i class="ri-eye-2-line"></i></a>              
                              <a class= "btn btn-primary" href="resources/req_approved.php?req_id=<?= $row['id']?>&tablename=<?= $table_name?>"><i class="ri-edit-2-fill"></i></a>                               
                              <a class= "btn btn-danger" href="resources/req_reject.php?req_id=<?= $row['id']?>&tablename=<?= $table_name?>"><i class="ri-delete-bin-6-fill"></i></a>
                            </div>
                          </td>
                        </tr>
                      <?php } 
                        }
                      ?>
                      </tbody>
                  </table>
                  <?php if(isset($_GET['dlt'])): ?>
                    <div class = "flash-data" data-flashdata="<?= $_GET['dlt']; ?>"></div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>   
      </div>
    </div>
  </div>
</section> <!-- End -->


</main>
<?php include('includes/footer.php'); ?>
</body>
</html>