<?php
include('security/session.php');

?>
<!DOCTYPE html>
<html lang="en">
<title>HCM | Dashboard</title>
<head>
<?php include ('includes/head_ext.php');?>

</head>

<body>
<?php $page = "Records-Validation";?> 
<?php include ('includes/header.php');?>
<?php include ('includes/sidebar.php');?>
<main id="main" class="main">

<!-- Page Title -->
  <div class="pagetitle">
    <h1>Validate Records</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a></li>
        <li class="breadcrumb-item active">Validate Record</li>
      </ol>
    </nav>
  </div>
  
<section class="section2">
  <div class="row">
    <div class="col-lg-12">
      <?php
      if(isset($_SESSION['status'])) 
      {
        ?>
          <div class="alert border-info alert-dismissible fade show" role="alert">
            <strong><?php echo $_SESSION['status'];?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php

        unset($_SESSION['status']);
      }
      ?>
  
      <div class="card">
        <div class="card-body">
          <h1 class="card-title">List of Records</h1>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="home" aria-selected="true">Pending
              <span class="badge bg-success badge-number">
                <?php 
                  require_once("security/sec-conn.php");
                  $query="SELECT * FROM hcms_student_records WHERE `status` = 'Pending'";
                  $result=mysqli_query($conn2,$query);
                  if($result){
                    echo mysqli_num_rows($result);
                    }
                ?> 
              </span>   
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="approved-tab" data-bs-toggle="tab" data-bs-target="#approved" type="button" role="tab" aria-controls="profile" aria-selected="false">Approved</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected" type="button" role="tab" aria-controls="profile" aria-selected="false">Rejected</button>
            </li>
          </ul>
          <div class="tab-content pt-2" id="myTabContent">
            <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
              <div class="card p-4">
              <!-- Table Starts --> 
                <div class="table-responsive">
                  <table class="table table-hover datatable">
                    <?php
                      $isPending = "Pending";
                      $query = "SELECT * FROM hcms_student_records WHERE `status` = '$isPending' ORDER BY id ASC";
                      $query_run = mysqli_query($conn, $query);
                    ?>
                          <!-- Table Head -->
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Student Number</th>
                              <th scope="col">Remarks</th>
                              <th scope="col">Record</th>
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
                          <td><?php echo $row['file_name'];?></td>
                          <td>
                            <div class="input-group">
                              <?php $table_name = "hcms_student_records";?>
                              <a class= "btn btn-primary btn-sm float-right bi bi-check" href="resources/req_approved.php?req_id=<?= $row['id']?>&tablename=<?= $table_name?>">Approve</a>                               
                              <a class= "btn btn-danger btn-sm float-right bi bi-x" href="resources/req_reject.php?req_id=<?= $row['id']?>&tablename=<?= $table_name?>">Reject</a>
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
            <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
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
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Student Number</th>
                              <th scope="col">Remarks</th>
                              <th scope="col">Assessed Date</th>
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
            <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
              <div class="card p-4">
                <!-- Table Starts --> 
                <div class="table-responsive">
                  <table class="table table-hover datatable">
                    <?php
                      $isRejected = "Rejected";
                      $query = "SELECT * FROM hcms_student_records WHERE `status` = '$isRejected' ORDER BY id ASC";
                      $query_run = mysqli_query($conn, $query);
                    ?>
                          <!-- Table Head -->
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Student Number</th>
                              <th scope="col">Remarks</th>
                              <th scope="col">Assessed Date</th>
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
  </div>
</section> <!-- End -->


</main>
<?php include('includes/footer.php'); ?>
<?php include('includes/scripts.php'); ?>
</body>
</html>