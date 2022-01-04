<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include ('core/css-links.php');//css connection?>
</head>
<body>

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'UR' ; $col = 'reports'; include ('core/side-nav.php');//Design for sidebar?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>User Reports</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Module</li>
      <li class="breadcrumb-item">Reports</li>
      <li class="breadcrumb-item active">User Reports</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">

          <!-- Report Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="myTabjustified" role="tablist" style="margin-top: 10px;">
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100 active" id=" incoming-tab" data-bs-toggle="tab" data-bs-target="#IncomingDocs" type="button" role="tab" aria-controls="incoming" aria-selected="true">System Admin</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="received-tab" data-bs-toggle="tab" data-bs-target="#ReceivedDocs" type="button" role="tab" aria-controls="profile" aria-selected="false">Approver</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="approved-tab" data-bs-toggle="tab" data-bs-target="#ApprovedDocs" type="button" role="tab" aria-controls="approved" aria-selected="false">Department Admin</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="outgoing-tab" data-bs-toggle="tab" data-bs-target="#OutgoingDocs" type="button" role="tab" aria-controls="outgoing" aria-selected="false">Department Secretary</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="hold-tab" data-bs-toggle="tab" data-bs-target="#HoldDocs" type="button" role="tab" aria-controls="hold" aria-selected="false">Faculty</button>
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
                                <h4>System Admin Reports</h4>
                            </div>
                            <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                                <button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#AddModal">
                                Print&nbsp;
                                <i class="bi bi-printer me-1"></i>
                                </button>
                            </div> 
                          </div>
                          <div class="card-body" >           
                            <!-- Table for Role records -->
                            <table class="table table-hover datatable" >
                              <thead>
                                <tr>
                                  <th scope="col">Full Name</th>
                                  <th scope="col" >Department</th>
                                  <!-- <th scope="col">Filesize</th>    -->
                                  <th scope="col">Role</th>   
                                  <th scope="col">Office</th>       
                                  <th scope="col">Contact</th>  
                                  <!-- <th scope="col">Downloads</th>    -->
                                  <th scope="col">Account Status</th>          
                                </tr>
                              </thead>
                              <tbody>
                                
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
                                <h4>Approver Reports</h4>
                            </div>
                            <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                                <button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#AddModal">
                                Print&nbsp;
                                <i class="bi bi-printer me-1"></i>
                                </button>
                            </div> 
                          </div>
                          <div class="card-body" >           
                            <!-- Table for Role records -->
                            <table class="table table-hover datatable" >
                              <thead>
                                <tr>
                                  <th scope="col">Full Name</th>
                                  <th scope="col" >Department</th>
                                  <!-- <th scope="col">Filesize</th>    -->
                                  <th scope="col">Role</th>   
                                  <th scope="col">Office</th>       
                                  <th scope="col">Contact</th>  
                                  <!-- <th scope="col">Downloads</th>    -->
                                  <th scope="col">Account Status</th>          
                                </tr>
                              </thead>
                              <tbody>
                                
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
                                <h4>Department Admin Reports</h4>
                            </div>
                            <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                                <button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#AddModal">
                                Print&nbsp;
                                <i class="bi bi-printer me-1"></i>
                                </button>
                            </div> 
                          </div>
                          <div class="card-body" >           
                            <!-- Table for Role records -->
                            <table class="table table-hover datatable" >
                              <thead>
                                <tr>
                                  <th scope="col">Full Name</th>
                                  <th scope="col" >Department</th>
                                  <!-- <th scope="col">Filesize</th>    -->
                                  <th scope="col">Role</th>   
                                  <th scope="col">Office</th>       
                                  <th scope="col">Contact</th>  
                                  <!-- <th scope="col">Downloads</th>    -->
                                  <th scope="col">Account Status</th>          
                                </tr>
                              </thead>
                              <tbody>
                                
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
                                <h4>Department Secretary Reports</h4>
                            </div>
                            <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                                <button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#AddModal">
                                Print&nbsp;
                                <i class="bi bi-printer me-1"></i>
                                </button>
                            </div> 
                          </div>
                          <div class="card-body" >           
                            <!-- Table for Role records -->
                            <table class="table table-hover datatable" >
                              <thead>
                                <tr>
                                  <th scope="col">Full Name</th>
                                  <th scope="col" >Department</th>
                                  <!-- <th scope="col">Filesize</th>    -->
                                  <th scope="col">Role</th>   
                                  <th scope="col">Office</th>       
                                  <th scope="col">Contact</th>  
                                  <!-- <th scope="col">Downloads</th>    -->
                                  <th scope="col">Account Status</th>          
                                </tr>
                              </thead>
                              <tbody>
                                
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
                                <h4>Faculty Reports</h4>
                            </div>
                            <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                                <button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#AddModal">
                                Print&nbsp;
                                <i class="bi bi-printer me-1"></i>
                                </button>
                            </div> 
                          </div>
                          <div class="card-body" >           
                            <!-- Table for Role records -->
                            <table class="table table-hover datatable" >
                              <thead>
                                <tr>
                                  <th scope="col">Full Name</th>
                                  <th scope="col" >Department</th>
                                  <!-- <th scope="col">Filesize</th>    -->
                                  <th scope="col">Role</th>   
                                  <th scope="col">Office</th>       
                                  <th scope="col">Contact</th>  
                                  <!-- <th scope="col">Downloads</th>    -->
                                  <th scope="col">Account Status</th>          
                                </tr>
                              </thead>
                              <tbody>
                                
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