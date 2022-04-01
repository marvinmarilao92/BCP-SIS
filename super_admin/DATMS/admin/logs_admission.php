<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Admin Logs</title>
<head>
<?php include ('core/css-links.php');//css connection?>
</head>
<body>

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'AdmL' ; $col = 'logs'; include ('core/side-nav.php');//Design for sidebar?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Admission Logs</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Module</li>
      <li class="breadcrumb-item">Audit Trail</li>
      <li class="breadcrumb-item active">Admission Logs</li>
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
              <button class="nav-link w-100 active" id=" incoming-tab" data-bs-toggle="tab" data-bs-target="#IncomingDocs" type="button" role="tab" aria-controls="incoming" aria-selected="true">User Logs</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="received-tab" data-bs-toggle="tab" data-bs-target="#ReceivedDocs" type="button" role="tab" aria-controls="profile" aria-selected="false">Activity Logs</button>
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
                                <h4>Admin User Logs</h4>
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
                                <h4>Activity logs</h4>
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