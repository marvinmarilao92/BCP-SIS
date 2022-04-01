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
        <!-- Insert your Module here -->
        <div class="col-lg-3">
          <div class="card">
            <a data-bs-toggle="modal" data-bs-target="#HDSModal"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title">Help Desk System</h5>
              <p class="card-text">Subsystem Description insert here...</p>
            </div>
          </div>
        </div>
        <!-- End Insert your Module here -->
        <!-- Insert your Module here -->
        <div class="col-lg-3">
          <div class="card">
            <a data-bs-toggle="modal" data-bs-target="#IntModal"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title">Internship System</h5>
              <p class="card-text">Subsystem Description insert here...</p>
            </div>
          </div>
        </div>
        <!-- End Insert your Module here -->
        <!-- Insert your Module here -->
        <div class="col-lg-3">
          <div class="card">
            <a data-bs-toggle="modal" data-bs-target="#ClrModal"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title">Clearance Management System</h5>
              <p class="card-text">Subsystem Description insert here...</p>
            </div>
          </div>
        </div>
        <!-- End Insert your Module here -->
        <!-- Insert your Module here -->
        <div class="col-lg-3">
          <div class="card">
            <a data-bs-toggle="modal" data-bs-target="#GaCModal"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title">Guidance and Counselling</h5>
              <p class="card-text">Subsystem Description insert here...</p>
            </div>
          </div>
        </div>
        <!-- End Insert your Module here -->
        <!-- Insert your Module here -->
        <div class="col-lg-3">
          <div class="card">
            <a data-bs-toggle="modal" data-bs-target="#DATMSModal"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title">Document Approval, Tracking and Management System</h5>
              <p class="card-text">Subsystem Description insert here...</p>
            </div>
          </div>
        </div>
        <!-- End Insert your Module here -->
        <!-- Insert your Module here -->
        <div class="col-lg-3">
          <div class="card">
            <a data-bs-toggle="modal" data-bs-target="#SSGDModal"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title">Student Services (Grievances/Discipline)</h5>
              <p class="card-text">Subsystem Description insert here...</p>
            </div>
          </div>
        </div>
        <!-- End Insert your Module here -->

          <!-- Insert your Module here -->
          <div class="col-lg-3">
            <div class="card">
              <a data-bs-toggle="modal" data-bs-target="#HCMModal"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <h5 class="card-title">Health Check Monitoring</h5>
                <p class="card-text">Subsystem Description insert here...</p>
              </div>
            </div>
          </div>
          <!-- End Insert your Module here -->
          <!-- Insert your Module here -->
          <div class="col-lg-3">
            <div class="card">
              <a data-bs-toggle="modal" data-bs-target="#LMSMModal"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <h5 class="card-title">LMS MOODLE</h5>
                <p class="card-text">Subsystem Description insert here...</p>
              </div>
            </div>
          </div>
          <!-- End Insert your Module here -->
          <!-- Insert your Module here -->
          <div class="col-lg-3">
            <div class="card">
              <a data-bs-toggle="modal" data-bs-target="#LMSEModal"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <h5 class="card-title">LMS EDMODO</h5>
                <p class="card-text">Subsystem Description insert here...</p>
              </div>
            </div>
          </div>
          <!-- End Insert your Module here -->
          <!-- Insert your Module here -->
          <div class="col-lg-3">
            <div class="card">
              <a data-bs-toggle="modal" data-bs-target="#MSModal"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <h5 class="card-title">Medical System</h5>
                <p class="card-text">Subsystem Description insert here...</p>
              </div>
            </div>
          </div>
          <!-- End Insert your Module here -->
          <!-- Insert your Module here -->
          <div class="col-lg-3">
            <div class="card">
              <a data-bs-toggle="modal" data-bs-target="#SchModal"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <h5 class="card-title">Scholarship System</h5>
                <p class="card-text">Subsystem Description insert here...</p>
              </div>
            </div>
          </div>
          <!-- End Insert your Module here -->
          <!-- Insert your Module here -->
          <div class="col-lg-3">
            <div class="card">
              <a href="UserManagement/index.php"><img src="../assets/img/mvcampus.jpg" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <h5 class="card-title">User Management</h5>
                <p class="card-text">Subsystem Description insert here...</p>
              </div>
            </div>
          </div>
          <!-- End Insert your Module here -->
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
<!-- List of Modals -->

    <!-- Helpdesk System Modal-->
      <div class="modal fade" id="HDSModal" tabindex="-1" >
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Helpdesk System Modules</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                  <div class="row align-items-top">
                  <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                  </div>
                </div>
              <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    <!-- End Helpdesk Modal-->

    <!-- Internship System Modal-->
      <div class="modal fade" id="IntModal" tabindex="-1" >
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Internship System Modules</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                  <div class="row align-items-top">
                  <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                  </div>
                </div>
              <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    <!-- End Internship System Modal-->

    <!-- Clearance Management System Modal-->
      <div div class="modal fade" id="ClrModal" tabindex="-1" >
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Clearance Management Modules</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                  <div class="row align-items-top">
                  <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                  </div>
                </div>
              <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    <!-- End Clearance Management System Modal-->

    <!-- Guidance and Counselling Modal-->
      <div div class="modal fade" id="GaCModal" tabindex="-1" >
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Guidance and Counselling Modules</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                  <div class="row align-items-top">
                  <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                  </div>
                </div>
              <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    <!-- End Guidance and Counselling Modal-->
    
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
                  <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                       
                        <div class="card-body">
                          <a href="../Document-Approval-Tracking-and-Mngt-System/DATMS/admin/index.php"> <h5 class="card-title">REGISTRAR ADMIN</h5></a>
                          <p class="card-text">Click here to access module</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <a href="../Document-Approval-Tracking-and-Mngt-System/DATMS/approver/index.php"> <h5 class="card-title">DOCUMENT APPROVER</h5></a>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                           <a href="../Document-Approval-Tracking-and-Mngt-System/DATMS/admission/index.php"> <h5 class="card-title">ADMISSION</h5></a>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <a href="../Document-Approval-Tracking-and-Mngt-System/DATMS/cashier/index.php"> <h5 class="card-title">CASHIER</h5></a>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <a href="#"> <h5 class="card-title">REGISTRAR OFFICER</h5></a>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                  </div>
                </div>
              <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    <!-- End DATMS Modal-->

    <!-- Student Services (Grievances/Discipline) Modal-->
      <div div class="modal fade" id="SSGDModal" tabindex="-1" >
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Student Services (Grievances/Discipline) Modules</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                  <div class="row align-items-top">
                  <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                  </div>
                </div>
              <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    <!-- End Student Services (Grievances/Discipline) Modal-->

    <!-- Health Check Monitoring Modal-->
      <div div class="modal fade" id="HCMModal" tabindex="-1" >
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Health Check Monitoring Modules</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                  <div class="row align-items-top">
                  <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                  </div>
                </div>
              <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    <!-- End Health Check Monitoring Modal-->

    <!-- LMS MOODLE Modal-->
      <div div class="modal fade" id="LMSMModal" tabindex="-1" >
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">LMS MOODLE Modules</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                  <div class="row align-items-top">
                  <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                  </div>
                </div>
              <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    <!-- End LMS MOODLE Modal-->

    <!-- LMS EDMODO Modal-->
      <div div class="modal fade" id="LMSEModal" tabindex="-1" >
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">LMS EDMODO Modules</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                  <div class="row align-items-top">
                  <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                  </div>
                </div>
              <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    <!-- End LMS EDMODO Modal--> 

    <!-- Medical System Modal-->
      <div div class="modal fade" id="MSModal" tabindex="-1" >
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Medical System Modules</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                  <div class="row align-items-top">
                  <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                  </div>
                </div>
              <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    <!-- End Medical System Modal--> 

    <!-- Scholarship System Modal-->
      <div div class="modal fade" id="SchModal" tabindex="-1" >
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Scholarship System Modules</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                  <div class="row align-items-top">
                  <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                    <!-- Insert your Module here -->
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Insert your Module here</h5>
                          <p class="card-text">Subsystem Description insert here...</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Insert your Module here -->
                  </div>
                </div>
              <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    <!-- End Scholarship System Modal--> 


<!-- End of Modals -->
</html>