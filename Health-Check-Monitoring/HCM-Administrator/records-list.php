<?php
include('security/session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>HCM | Dashboard</title>
<head>
<?php include ('includes/head_ext.php');?>
<style>
    @media(max-width: 500px){
            .table thead{
              display: none;
            }

            .table, .table tbody, .table tr, .table td{
              display: block;
              width: 100%;
            }
            .table tr{
              background: #ffffff;
              box-shadow: 0 8px 8px -4px lightblue;
              border-radius: 5%;
              margin-bottom:13px;
              margin-top: 13px;
            }
            .table td{
              /* max-width: 20px; */
              padding-left: 50%;
              text-align: right;
              position: relative;
            }
            .table td::before{      
              margin-top: 10px;      
              content: attr(data-label);
              position: absolute;
              left:0;
              width: 50%;
              padding-left:15px;
              font-size:15px;
              font-weight: bold;
              text-align: left;
            }
          }
</style>
</head>

<body>
<?php $page = "Records-list"?>
<?php include ('includes/header.php');?>
<?php include ('includes/sidebar.php');?>
<main id="main" class="main">

<!-- Page Title -->
  <div class="pagetitle">
    <h1>Records List</h1>
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
 
            <div class="alert border-info alert-dismissible fade show" role="alert">
                <strong>SPECIFICATION : LIST OF APPROVED AND OFFICIAL, LIST OF APPROVED BUT UNOFFICIAL</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        
  
      <div class="card">
        <div class="card-body" >
          <h1 class="card-title">Medical Records</h1>
          <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100 active" id="official-tab" data-bs-toggle="tab" data-bs-target="#official-justified" type="button" role="tab" aria-controls="official" aria-selected="true">Official</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="unofficial-tab" data-bs-toggle="tab" data-bs-target="#unofficial-justified" type="button" role="tab" aria-controls="unofficial" aria-selected="false">Unofficial</button>
            </li>
          </ul> 
          <div class="tab-content pt-2" id="myTabjustifiedContent">
            <div class="tab-pane fade show active" id="official-justified" role="tabpanel" aria-labelledby="official-tab">
              <div class="card p-4">
                <!-- Table Starts --> 
                <div class="table-responsive">
                  <table class="table table-hover datatable">
                    <?php
                      $isApproved = "Approved";
                      $isOfficial = "Official";
                      $query = "SELECT * FROM hcms_student_records WHERE `status` = '$isApproved' AND `status2` = '$isOfficial'  ORDER BY id ASC";
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
            <div class="tab-pane fade " id="unofficial-justified" role="tabpanel" aria-labelledby="unofficial-tab">
              <div class="card p-4">
              <!-- Table Starts --> 
                <div class="table-responsive">
                <div class="table-responsive">
                  <table class="table table-hover datatable">
                    <?php
                      $isApproved = "Approved";
                      $isUnofficial = "Unofficial";
                      $query = "SELECT * FROM hcms_student_records WHERE `status` = '$isApproved' AND `status2` = '$isUnofficial'  ORDER BY id ASC";
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
<?php include('includes/scripts.php'); ?>
</body>
</html>