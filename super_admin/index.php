<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Super Admin</title>
<head>
<?php include ('core/css-links.php');//css connection?>
</head>

<body>
<?php include ('core/header.php');//Design for  Header?>

  <main style="padding: 20px;">
    
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <br>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="pagetitle">
      <h1>School Information System</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">School Information System</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row align-items-top">
        <!-- Card with an image on top -->
        <div class="col-lg-3">
          <div class="card">
            <a data-bs-toggle="modal" data-bs-target="#HDSModal"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title">Help Desk System</h5>
              <p class="card-text">Subsystem Description insert here...</p>
            </div>
          </div>
        </div>
        <!-- End Card with an image on top -->
        <!-- Card with an image on top -->
        <div class="col-lg-3">
          <div class="card">
            <a href="#"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title">Internship System</h5>
              <p class="card-text">Subsystem Description insert here...</p>
            </div>
          </div>
        </div>
        <!-- End Card with an image on top -->
        <!-- Card with an image on top -->
        <div class="col-lg-3">
          <div class="card">
            <a href="#"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title">Clearance Management System</h5>
              <p class="card-text">Subsystem Description insert here...</p>
            </div>
          </div>
        </div>
        <!-- End Card with an image on top -->
        <!-- Card with an image on top -->
        <div class="col-lg-3">
          <div class="card">
            <a href="#"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title">Guidance and Counselling</h5>
              <p class="card-text">Subsystem Description insert here...</p>
            </div>
          </div>
        </div>
        <!-- End Card with an image on top -->
        <!-- Card with an image on top -->
        <div class="col-lg-3">
          <div class="card">
            <a data-bs-toggle="modal" data-bs-target="#DATMSModal"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title">Document Approval, Tracking and Management System</h5>
              <p class="card-text">Subsystem Description insert here...</p>
            </div>
          </div>
        </div>
        <!-- End Card with an image on top -->
        <!-- Card with an image on top -->
        <div class="col-lg-3">
          <div class="card">
            <a href="#"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title">Student Services (Grievances/Discipline)</h5>
              <p class="card-text">Subsystem Description insert here...</p>
            </div>
          </div>
        </div>
        <!-- End Card with an image on top -->

          <!-- Card with an image on top -->
          <div class="col-lg-3">
            <div class="card">
              <a href="#"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <h5 class="card-title">Health Check Monitoring</h5>
                <p class="card-text">Subsystem Description insert here...</p>
              </div>
            </div>
          </div>
          <!-- End Card with an image on top -->
          <!-- Card with an image on top -->
          <div class="col-lg-3">
            <div class="card">
              <a href="#"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <h5 class="card-title">LMS MOODLE</h5>
                <p class="card-text">Subsystem Description insert here...</p>
              </div>
            </div>
          </div>
          <!-- End Card with an image on top -->
          <!-- Card with an image on top -->
          <div class="col-lg-3">
            <div class="card">
              <a href="#"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <h5 class="card-title">LMS EDMODO</h5>
                <p class="card-text">Subsystem Description insert here...</p>
              </div>
            </div>
          </div>
          <!-- End Card with an image on top -->
          <!-- Card with an image on top -->
          <div class="col-lg-3">
            <div class="card">
              <a href="#"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <h5 class="card-title">Medical System</h5>
                <p class="card-text">Subsystem Description insert here...</p>
              </div>
            </div>
          </div>
          <!-- End Card with an image on top -->
          <!-- Card with an image on top -->
          <div class="col-lg-3">
            <div class="card">
              <a href="#"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <h5 class="card-title">Scholarship System</h5>
                <p class="card-text">Subsystem Description insert here...</p>
              </div>
            </div>
          </div>
          <!-- End Card with an image on top -->
          <!-- Card with an image on top -->
          <div class="col-lg-3">
            <div class="card">
              <a href="UserManagement/index.php"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <h5 class="card-title">User Management</h5>
                <p class="card-text">Subsystem Description insert here...</p>
              </div>
            </div>
          </div>
          <!-- End Card with an image on top -->
      </div>
    </section>

  </main><!-- End #main -->
  <hr>
    <!-- ======= Footer ======= -->
    <footer class="footer">
      <div class="copyright" style="margin-bottom: 30px;">
        <center>
          &copy;Copyright <a href="https://bcp.edu.ph/home" target="_blank " data-bs-toggle="tooltip" data-bs-placement="top" 
          title="Access BCP Website">Bestlink College of the Philippines</a> All Rights Reserved
        </center>                 
      </div>
    </footer>
    <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>
<!-- Charts -->
</body>
    <!-- Help Desk System Modal-->
      <div class="modal fade" id="HDSModal" tabindex="-1" >
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Help Desk System Modules</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                  <div class="row align-items-top">
                  <!-- Card with an image on top -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">User Management</h5>
                          <p class="card-text">Click here to access module</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Card with an image on top -->
                    <!-- Card with an image on top -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Card with an image on top</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Card with an image on top -->
                    <!-- Card with an image on top -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Card with an image on top</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Card with an image on top -->
                    <!-- Card with an image on top -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">User Management</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Card with an image on top -->
                    <!-- Card with an image on top -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Card with an image on top</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Card with an image on top -->
                    <!-- Card with an image on top -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Card with an image on top</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Card with an image on top -->
                  </div>
                </div>
              <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    <!-- End H Modal-->

    <!-- DATMS Modal-->
      <div class="modal fade" id="DATMSModal" tabindex="-1" >
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">DATMS Modules</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                  <div class="row align-items-top" >
                  <!-- Card with an image on top -->
                    <div class="col-lg-4">
                      <div class="card">
                       
                        <div class="card-body">
                          <a href="DATMS/admin/index.php"> <h5 class="card-title">REGISTRAR ADMIN</h5></a>
                          <p class="card-text">Click here to access module</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Card with an image on top -->
                    <!-- Card with an image on top -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <a href="DATMS/approver/index.php"> <h5 class="card-title">DOCUMENT APPROVER</h5></a>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Card with an image on top -->
                    <!-- Card with an image on top -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                           <a href="DATMS/admission/index.php"> <h5 class="card-title">ADMISSION</h5></a>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Card with an image on top -->
                    <!-- Card with an image on top -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <a href="DATMS/cashier/index.php"> <h5 class="card-title">CASHIER</h5></a>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Card with an image on top -->
                    <!-- Card with an image on top -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <a href="#"> <h5 class="card-title">REGISTRAR OFFICER</h5></a>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Card with an image on top -->
                  </div>
                </div>
              <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    <!-- End H Modal-->
</html>