<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Document Reports</title>
<head>
<?php include ('core/css-links.php');//css connection?>
</head>
<body>

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'DR' ; $col = 'reports'; include ('core/side-nav.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Document Reports</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Module</li>
          <li class="breadcrumb-item">Reports</li>
          <li class="breadcrumb-item active">Document Reports</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: left; padding: 10px">
                </div>                   
              <!-- Report Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="myTabjustified" role="tablist" style="margin-top: 10px;">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id=" incoming-tab" data-bs-toggle="tab" data-bs-target="#IncomingDocs" type="button" role="tab" aria-controls="incoming" aria-selected="true">Incoming</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="received-tab" data-bs-toggle="tab" data-bs-target="#ReceivedDocs" type="button" role="tab" aria-controls="profile" aria-selected="false">Received</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="approved-tab" data-bs-toggle="tab" data-bs-target="#ApprovedDocs" type="button" role="tab" aria-controls="approved" aria-selected="false">Approved</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="outgoing-tab" data-bs-toggle="tab" data-bs-target="#OutgoingDocs" type="button" role="tab" aria-controls="outgoing" aria-selected="false">Rejected</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="hold-tab" data-bs-toggle="tab" data-bs-target="#HoldDocs" type="button" role="tab" aria-controls="hold" aria-selected="false">Hold</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="myTabjustifiedContent">
                <div class="tab-pane fade show active" id="IncomingDocs" role="tabpanel" aria-labelledby=" incoming-tab">

                  <!-- IncomingDocs Docs -->
                  <section class="section">
                        <div class="row">        
                          <div class="col-lg-12">
                            <div class="card">
                              <div class="col-lg-12">
                                <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                                    <h4>Incoming Document Reports</h4>
                                </div>
                                <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                                    <a type="button" href="archive_docs.php?id=<?php echo $_SESSION["login_key"];?>" class="btn btn-primary form-control">
                                        Archive &nbsp;
                                      <i class="bi bi-archive me-1"></i>
                                    </a>
                                </div> 
                              </div>
                              <div class="card-body" >           
                                <!-- Table for Office records -->
                                <table class="table table-hover datatable" >
                                  <thead>
                                    <tr>
                                      <th scope="col">DocCode</th>
                                      <th scope="col" >Filename</th>
                                      <!-- <th scope="col">Filesize</th>    -->
                                      <th scope="col">Actor</th>  
                                      <th scope="col">Department</th>  
                                      <th scope="col">Date&Time</th>     
                                      <!-- <th scope="col">Downloads</th>    -->
                                      <!-- <th scope="col">Action</th>           -->
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      require_once("include/conn.php");
                                      $query="SELECT * FROM datms_tracking WHERE `doc_status` = 'Outgoing' ORDER BY doc_date1 DESC ";
                                      $result=mysqli_query($conn,$query);
                                      while($rs=mysqli_fetch_array($result)){
                                        $uid =$rs['doc_id']; 
                                        $dcode = $rs['doc_code']; 
                                        $filename = $rs['doc_name'];      
                                        $actor =$rs['doc_actor2'];
                                        $department = $rs['doc_off2']; 
                                        $date = $rs['doc_date2'];                   
                                    ?>
                                    <tr>
                                      <td style="display:none"><?php echo $uid?></td>
                                      <td data-label="Username:"><?php echo $dcode; ?></td>
                                      <td data-label="Username:"><?php echo $filename; ?></td>
                                      <td data-label="Dept:"><?php echo $actor; ?></td>
                                      <td data-label="Date:"><?php echo $department?></td>     
                                      <td data-label="Date:"><?php echo $date?></td>                                        
                                    </tr>

                                    <?php 
                                    } ?>
                                    
                                  </tbody>
                                </table>
                                <!-- End of Table -->

                              </div>
                            </div>

                          </div>
                        </div>
                        
                      </section>
                  <!-- End Table with stripped rows -->

                </div>
                <div class="tab-pane fade" id="ReceivedDocs" role="tabpanel" aria-labelledby="received-tab">
                  <!-- ReceivedDocs Docs -->
                  <!-- IncomingDocs Docs -->
                  <section class="section">
                        <div class="row">        
                          <div class="col-lg-12">
                            <div class="card">
                              <div class="col-lg-12">
                                <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                                    <h4>Received Document Reports</h4>
                                </div>
                                <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                                    <a type="button" href="archive_docs.php?id=<?php echo $_SESSION["login_key"];?>" class="btn btn-primary form-control">
                                        Archive &nbsp;
                                      <i class="bi bi-archive me-1"></i>
                                    </a>
                                </div> 
                              </div>
                              <div class="card-body" >           
                                <!-- Table for Office records -->
                                <table class="table table-hover datatable" >
                                  <thead>
                                    <tr>
                                      <th scope="col">DocCode</th>
                                      <th scope="col" >Filename</th>
                                      <!-- <th scope="col">Filesize</th>    -->
                                      <th scope="col">Actor</th>  
                                      <th scope="col">Department</th>  
                                      <th scope="col">Status</th>  
                                      <th scope="col">Date&Time</th>     
                                      <!-- <th scope="col">Downloads</th>    -->
                                      <!-- <th scope="col">Action</th>           -->
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                      require_once("include/conn.php");
                                      $query="SELECT * FROM datms_tracking WHERE (`doc_status` = 'Received' OR `doc_status` = 'Pending') ORDER BY doc_date1 DESC ";
                                      $result=mysqli_query($conn,$query);
                                      while($rs=mysqli_fetch_array($result)){
                                        $uid =$rs['doc_id']; 
                                        $dcode = $rs['doc_code']; 
                                        $filename = $rs['doc_name'];      
                                        $actor =$rs['doc_actor2'];
                                        $department = $rs['doc_off2']; 
                                        $status = $rs['doc_status'];
                                        $date = $rs['doc_date2'];                   
                                    ?>
                                    <tr>
                                      <td style="display:none"><?php echo $uid?></td>
                                      <td data-label="Username:"><?php echo $dcode; ?></td>
                                      <td data-label="Username:"><?php echo $filename; ?></td>
                                      <td data-label="Dept:"><?php echo $actor; ?></td>
                                      <td data-label="Date:"><?php echo $department?></td>    
                                      <td data-label="Date:"><?php echo $status?></td>   
                                      <td data-label="Date:"><?php echo $date?></td>                                        
                                    </tr>

                                    <?php 
                                    } ?>
                                  </tbody>
                                </table>
                                <!-- End of Table -->

                              </div>
                            </div>

                          </div>
                        </div>
                        
                      </section>
                  <!-- End Table with stripped rows -->
                </div>
                <div class="tab-pane fade" id="ApprovedDocs" role="tabpanel" aria-labelledby="approved-tab">
                  <!-- ApprovedDocs Docs -->
                    <!-- IncomingDocs Docs -->
                  <section class="section">
                        <div class="row">        
                          <div class="col-lg-12">
                            <div class="card">
                              <div class="col-lg-12">
                                <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                                    <h4>Approved Document Reports</h4>
                                </div>
                                <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                                    <a type="button" href="archive_docs.php?id=<?php echo $_SESSION["login_key"];?>" class="btn btn-primary form-control">
                                        Archive &nbsp;
                                      <i class="bi bi-archive me-1"></i>
                                    </a>
                                </div> 
                              </div>
                              <div class="card-body" >           
                                <!-- Table for Office records -->
                                <table class="table table-hover datatable" >
                                  <thead>
                                    <tr>
                                      <th scope="col">DocCode</th>
                                      <th scope="col" >Filename</th>
                                      <!-- <th scope="col">Filesize</th>    -->
                                      <th scope="col">Actor</th>  
                                      <th scope="col">Department</th>  
                                      <th scope="col">Date&Time</th>     
                                      <!-- <th scope="col">Downloads</th>    -->
                                      <!-- <th scope="col">Action</th>           -->        
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      require_once("include/conn.php");
                                      $query="SELECT * FROM datms_tracking WHERE (`doc_status` = 'Approved') ORDER BY doc_date1 DESC ";
                                      $result=mysqli_query($conn,$query);
                                      while($rs=mysqli_fetch_array($result)){
                                        $uid =$rs['doc_id']; 
                                        $dcode = $rs['doc_code']; 
                                        $filename = $rs['doc_name'];      
                                        $actor =$rs['doc_actor2'];
                                        $department = $rs['doc_off2']; 
                                        $date = $rs['doc_date2'];                   
                                    ?>
                                    <tr>
                                      <td style="display:none"><?php echo $uid?></td>
                                      <td data-label="Username:"><?php echo $dcode; ?></td>
                                      <td data-label="Username:"><?php echo $filename; ?></td>
                                      <td data-label="Dept:"><?php echo $actor; ?></td>
                                      <td data-label="Date:"><?php echo $department?></td>     
                                      <td data-label="Date:"><?php echo $date?></td>                                        
                                    </tr>

                                    <?php 
                                    } ?>
                                  </tbody>
                                </table>
                                <!-- End of Table -->

                              </div>
                            </div>

                          </div>
                        </div>
                        
                      </section>
                  <!-- End Table with stripped rows -->

                </div>
                <div class="tab-pane fade" id="OutgoingDocs" role="tabpanel" aria-labelledby="outgoing-tab">
                   <!-- OutgoingDocs Docs -->
                 <!-- IncomingDocs Docs -->
                 <section class="section">
                        <div class="row">        
                          <div class="col-lg-12">
                            <div class="card">
                              <div class="col-lg-12">
                                <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                                    <h4>Rejected Document Reports</h4>
                                </div>
                                <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                                    <a type="button" href="archive_docs.php?id=<?php echo $_SESSION["login_key"];?>" class="btn btn-primary form-control">
                                        Archive &nbsp;
                                      <i class="bi bi-archive me-1"></i>
                                    </a>
                                </div> 
                              </div>
                              <div class="card-body" >           
                                <!-- Table for Office records -->
                                <table class="table table-hover datatable" >
                                  <thead>
                                    <tr>
                                      <th scope="col">DocCode</th>
                                      <th scope="col" >Filename</th>
                                      <!-- <th scope="col">Filesize</th>    -->
                                      <th scope="col">Actor</th>  
                                      <th scope="col">Department</th>  
                                      <th scope="col">Date&Time</th>     
                                      <!-- <th scope="col">Downloads</th>    -->
                                      <!-- <th scope="col">Action</th>           -->
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                      require_once("include/conn.php");
                                      $query="SELECT * FROM datms_tracking WHERE `doc_status` = 'Rejected' ORDER BY doc_date1 DESC ";
                                      $result=mysqli_query($conn,$query);
                                      while($rs=mysqli_fetch_array($result)){
                                        $uid =$rs['doc_id']; 
                                        $dcode = $rs['doc_code']; 
                                        $filename = $rs['doc_name'];      
                                        $actor =$rs['doc_actor2'];
                                        $department = $rs['doc_off2']; 
                                        $date = $rs['doc_date2'];                   
                                    ?>
                                    <tr>
                                      <td style="display:none"><?php echo $uid?></td>
                                      <td data-label="Username:"><?php echo $dcode; ?></td>
                                      <td data-label="Username:"><?php echo $filename; ?></td>
                                      <td data-label="Dept:"><?php echo $actor; ?></td>
                                      <td data-label="Date:"><?php echo $department?></td>     
                                      <td data-label="Date:"><?php echo $date?></td>                                        
                                    </tr>

                                    <?php 
                                    } ?>
                                  </tbody>
                                </table>
                                <!-- End of Table -->

                              </div>
                            </div>

                          </div>
                        </div>
                        
                      </section>
                  <!-- End Table with stripped rows -->

                </div>
                <div class="tab-pane fade" id="HoldDocs" role="tabpanel" aria-labelledby="hold-tab">
                  <!-- HoldDocs Docs -->
                  <!-- IncomingDocs Docs -->
                  <section class="section">
                        <div class="row">        
                          <div class="col-lg-12">
                            <div class="card">
                              <div class="col-lg-12">
                                <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                                    <h4>Hold Document Reports</h4>
                                </div>
                                <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                                    <a type="button" href="archive_docs.php?id=<?php echo $_SESSION["login_key"];?>" class="btn btn-primary form-control">
                                        Archive &nbsp;
                                      <i class="bi bi-archive me-1"></i>
                                    </a>
                                </div> 
                              </div>
                              <div class="card-body" >           
                                <!-- Table for Office records -->
                                <table class="table table-hover datatable" >
                                  <thead>
                                   <tr>
                                      <th scope="col">DocCode</th>
                                      <th scope="col" >Filename</th>
                                      <!-- <th scope="col">Filesize</th>    -->
                                      <th scope="col">Actor</th>  
                                      <th scope="col">Department</th>  
                                      <th scope="col">Date&Time</th>     
                                      <!-- <th scope="col">Downloads</th>    -->
                                      <!-- <th scope="col">Action</th>           -->       
                                    </tr>
                                  </thead>
                                  <tbody>
                                     <?php
                                        require_once("include/conn.php");
                                        $query="SELECT * FROM datms_tracking WHERE (`doc_status` = 'Approved') ORDER BY doc_date1 DESC ";
                                        $result=mysqli_query($conn,$query);
                                        while($rs=mysqli_fetch_array($result)){
                                          $uid =$rs['doc_id']; 
                                          $dcode = $rs['doc_code']; 
                                          $filename = $rs['doc_name'];      
                                          $actor =$rs['doc_actor2'];
                                          $department = $rs['doc_off2']; 
                                          $date = $rs['doc_date2'];                   
                                      ?>
                                      <tr>
                                        <td style="display:none"><?php echo $uid?></td>
                                        <td data-label="Username:"><?php echo $dcode; ?></td>
                                        <td data-label="Username:"><?php echo $filename; ?></td>
                                        <td data-label="Dept:"><?php echo $actor; ?></td>
                                        <td data-label="Date:"><?php echo $department?></td>     
                                        <td data-label="Date:"><?php echo $date?></td>                                        
                                      </tr>

                                      <?php 
                                      } ?>
                                  </tbody>
                                </table>
                                <!-- End of Table -->

                              </div>
                            </div>

                          </div>
                        </div>
                        
                      </section>
                  <!-- End Table with stripped rows -->
                </div>
                    
              </div><!-- End Default Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

 
  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>

</body>

</html>