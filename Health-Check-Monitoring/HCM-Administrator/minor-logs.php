<?php
include_once('security/newsource.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>HCM | Dashboard</title>
<head>
<?php include ('includes/head_ext.php');?>
<script>

  function AJAXshowModal(showID, catchField)
    {
      
        $.ajax({
        url: 'resources/ajax/STresult.php?showID='+showID,
        success: function(html) {
            var ajaxDisplay = document.getElementById(catchField);
            ajaxDisplay.innerHTML = html;
            $("#STmodal").modal("show");
            
        }
    });

    }
    
</script>
<script>

  function AJAXshowModal2(showID2, catchField2)
    {
      
        $.ajax({
        url: 'resources/ajax/FTresult.php?showID='+showID2,
        success: function(html) {
            var ajaxDisplay = document.getElementById(catchField2);
            ajaxDisplay.innerHTML = html;
            $("#FTmodal").modal("show");
            
        }
    });

    }
    
</script>

</head>

<body>
<?php $page = "minor"; $nav ="incident-logs";?>
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
          <div class="d-flex justify-content-between">
            <h1 class="card-title">Medical Records</h1>
          </div>
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
                      $classified = "Minor";
                      $query = "SELECT * FROM ms_incidents_logs WHERE personnel = '$deptStudent' AND classified = '$classified' ORDER BY id ASC";
                      $query_run = mysqli_query($conn, $query);
            
                    ?>
                          <!-- Table Head -->
                      <thead style="background-color:whitesmoke;">
                          <tr>
                              <th scope="col">ID Number</th>
                              <th scope="col">Full Name</th>
                              <th scope="col">Title</th>
                              <th scope="col">Date</th>
                              <th scope="col">Medicines & Aid</th>
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
                          <td><?php echo $row['title'];?></td>
                          <td><?php echo $row['cons_date'];?></td>
                          <td><?php echo $row['prod_name'];?>&nbsp;<strong><sup>x<?php echo $row['prod_quantity']?></sup></strong></td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example"> 
                              <a  class="btn btn-secondary" id ="showID" title="View" onclick="AJAXshowModal('<?php echo $row['id']?>', 'catchField')"><i class="ri-eye-2-line"></i></a>  
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
                      $query = "SELECT * FROM ms_incidents_logs WHERE personnel = '$deptFaculty' AND classified = '$classified' ORDER BY id ASC";
                      $query_run = mysqli_query($conn, $query);
                    ?>
                          <!-- Table Head -->
                          <thead style="background-color:whitesmoke;">
                          <tr>
                              <th scope="col">ID Number</th>
                              <th scope="col">Full Name</th>
                              <th scope="col">Title</th>
                              <th scope="col">Date</th>
                              <th scope="col">Medicines & Aid</th>
                              <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                        if(mysqli_num_rows($query_run) > 0 )
                        {
                          while($row2 = mysqli_fetch_assoc($query_run))
                          {
                      ?>
                        <tr>
                          <td><?php echo $row2['id_number'];?></td>
                          <td><?php echo $row2['fullname'];?></td>
                          <td><?php echo $row2['title'];?></td>
                          <td><?php echo $row2['cons_date'];?></td>
                          <td><?php echo $row2['prod_name'];?>&nbsp;<strong><sup>x<?php echo $row2['prod_quantity']?></sup></strong></td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">   
                              <a  class="btn btn-secondary" id ="showID2" title="View" onclick="AJAXshowModal2('<?php echo $row2['id']?>', 'catchField2')"><i class="ri-eye-2-line"></i></a>  
                              <a  class="btn btn-warning" title="Edit"><i class="ri-edit-2-fill"></i></a>                                          
                              <a class= "btn btn-danger" href="resources/delete.php?req_id=<?= $row2['id']?>"><i class="ri-delete-bin-6-fill"></i></a>
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
                      $query = "SELECT * FROM ms_incidents_logs WHERE personnel = '$deptNT' AND classified = '$classified' ORDER BY id ASC";
                      $query_run = mysqli_query($conn, $query);
                    ?>
                          <!-- Table Head -->
                          <thead style="background-color:whitesmoke;">
                          <tr>
                              <th scope="col">ID Number</th>
                              <th scope="col">Full Name</th>
                              <th scope="col">Title</th>
                              <th scope="col">Date</th>
                              <th scope="col">Medicines & Aid</th>
                              <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                        if(mysqli_num_rows($query_run) > 0 )
                        {
                          while($row3 = mysqli_fetch_assoc($query_run))
                          {
                      ?>
                        <tr>
                          <td><?php echo $row3['id_number'];?></td>
                          <td><?php echo $row3['fullname'];?></td>
                          <td><?php echo $row3['title'];?></td>
                          <td><?php echo $row3['cons_date'];?></td>
                          <td><?php echo $row3['prod_name'];?>&nbsp;<strong><sup>x<?php echo $row3['prod_quantity']?></sup></strong></td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">   
                              <a  class="btn btn-secondary" id ="showID3" title="View" onclick="AJAXshowModal3('<?php echo $row3['id']?>', 'catchField3')"><i class="ri-eye-2-line"></i></a>  
                              <a  class="btn btn-warning" title="Edit"><i class="ri-edit-2-fill"></i></a>                                          
                              <a class= "btn btn-danger" href="resources/delete.php?req_id=<?= $row3['id']?>"><i class="ri-delete-bin-6-fill"></i></a>
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
<!-- Modal -->
<div class="modal fade" id="STmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="STmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light" id="STmodalLabel">E M E R G E N C Y - M I N O R</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div class="row">
          <div id="catchField"></div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
</section> 

<div class="modal fade" id="FTmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="FTmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light" id="FTmodalLabel">E M E R G E N C Y - M I N O R</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div class="row">
          <div id="catchField2"></div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
</section><!-- End -->


</main>
<?php include('includes/footer.php'); ?>
</body>
</html>