
<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'include/external.php';
      include 'include/header.php';?>
</head>

    <!-- ======= Sidebar ======= -->
<?php include 'include/asideSidebar.php'; ?>
        
        
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
        
        <style>
            #ModalBody::-webkit-scrollbar
            {
               display: none;
            }
            #StudentINFO
            {
                font-size: 14px;
            }
            
        </style>
       
        
            
    </head>
    <body style="background-color: white;">
       <?php include 'include/header.php'; ?>
        
        <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link " id="sideButton" href="index.php?id=<?php echo $_SESSION['success'];?>">
                        <i class="bi bi-grid"></i>
                        <span >Dashboard</span>
                    </a>
                </li><!-- End Dashboard Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#Profiling" data-bs-toggle="collapse" href="#" id="sideButton">
                        <i class="bi bi-card-checklist"></i><span>Profiling</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="Profiling" class="nav-content collapse  " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="StudentProfile.php?id=<?php echo $_SESSION['success'];?>">
                                <i class="bi bi-caret-right" style="font-size: 14px;"></i><span>Student Profile</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Components Nav >> Profiling-->
                
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#StudentApproval" data-bs-toggle="collapse" href="#" id="sideButton">
                        <i class="bi bi-folder-check"></i><span>Student Approval</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="StudentApproval" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="ConandAss.php?id=<?php echo $_SESSION['success'];?>">
                                <i class="bi bi-caret-right" style="font-size: 14px;"></i><span>Consultation and Assessment</span>
                            </a>
                        </li>
                       
                        <li>
                            <a href="Rejectedlist.php?id=<?php echo $_SESSION['success'];?>">
                                <i class="bi bi-caret-right" style="font-size: 14px;"></i><span >Rejected List</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Forms Nav >> Counseling Services-->
                
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#CounselingServices" data-bs-toggle="collapse" href="#" id="sideButton">
                        <i class="bi bi-collection"></i><span>Counseling Services</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="CounselingServices" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="ConductCounsel.php?id=<?php echo $_SESSION['success'];?>">
                                <i class="bi bi-caret-right" style="font-size: 14px;"></i><span>Conduct Counsel</span>
                            </a>
                        </li>
                        <li>
                            <a href="ListofCounsel.php?id=<?php echo $_SESSION['success'];?>" >
                                <i class="bi bi-caret-right" style="font-size: 14px;"></i><span>List of Counseled</span>
                            </a>
                        </li>
                        
                    </ul>
                </li><!-- End Forms Nav >> Counseling Services-->
                
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#LogBooks" data-bs-toggle="collapse" href="#" id="sideButton">
                        <i class="bi bi-file-earmark-text"></i><span>Log Books</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="LogBooks" class="nav-content collapse show " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="LogGoodmoral.php?id=<?php echo $_SESSION['success'];?>">
                                <i class="bi bi-caret-right" style="font-size: 14px;"></i><span>Good moral</span>
                            </a>
                        </li>
                        <li>
                            <a href="LogAlumni.php?id=<?php echo $_SESSION['success'];?>" >
                                <i class="bi bi-caret-right" style="font-size: 14px;"></i><span>Alumni</span>
                            </a>
                        </li>
                        <li>
                            <a href="LogSeniorHigh.php?id=<?php echo $_SESSION['success'];?>">
                                <i class="bi bi-caret-right-fill" style="font-size: 14px;"></i><span id="page">Senior High Shool</span>
                            </a>
                        </li>
                        <li>
                            <a href="LogINOutDocuments.php?id=<?php echo $_SESSION['success'];?>" >
                                <i class="bi bi-caret-right" style="font-size: 14px;"></i><span>Incoming and Outgoing Documents</span>
                            </a>
                        </li>
                        <li>
                            <a href="LogConcerns.php?id=<?php echo $_SESSION['success'];?>">
                                <i class="bi bi-caret-right" style="font-size: 14px;"></i><span>Concerns</span>
                            </a>
                        </li>
                        
                        
                    </ul>
                </li><!-- End Forms Nav >> Counseling Services-->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#FilesandDocuments" data-bs-toggle="collapse" href="#" id="sideButton">
                        <i class="bi bi-file-earmark"></i><span>Files and Documents</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="FilesandDocuments" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="GuidanceForms.php?id=<?php echo $_SESSION['success'];?>">
                                <i class="bi bi-caret-right" style="font-size: 14px;""></i><span>Guidance Forms</span>
                            </a>
                        </li>
                        <li>
                            <a href="AddUploadFiles.php?id=<?php echo $_SESSION['success'];?>">
                                <i class="bi bi-caret-right" style="font-size: 14px;""></i><span>Add/Upload Files</span>
                            </a>
                        </li>
                        <li>
                            <a href="DownloadFiles.php?id=<?php echo $_SESSION['success'];?>">
                                <i class="bi bi-caret-right" style="font-size: 14px;""></i><span>Download File</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Charts Nav >> Files and Documents-->
                
               

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#Reports" data-bs-toggle="collapse" href="#" id="sideButton">
                        <i class="bi bi-flag"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="Reports" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="GuidanceReport.php?id=<?php echo $_SESSION['success'];?>">
                                <i class="bi bi-caret-right" style="font-size: 14px;""></i><span>Guidance Report</span>
                            </a>
                        </li>
                        <li>
                            <a href="CounselingReport.php?id=<?php echo $_SESSION['success'];?>">
                                <i class="bi bi-caret-right" style="font-size: 14px;""></i><span>Counseling Report</span>
                            </a>
                        </li>
                         <li>
                             <a href="VisitLogs.php?id=<?php echo $_SESSION['success'];?>">
                                <i class="bi bi-caret-right" style="font-size: 14px;""></i><span>Visit Logs</span>
                            </a>
                        </li>
                        <li>
                            <a href="VIsitPurpose.php?id=<?php echo $_SESSION['success'];?>">
                                <i class="bi bi-caret-right" style="font-size: 14px;""></i><span>Visit Purpose</span>
                            </a>
                        </li>
                        <li>
                            <a href="PrintingofReports.php?id=<?php echo $_SESSION['success'];?>">
                                <i class="bi bi-caret-right" style="font-size: 14px;""></i><span>Printing of Report</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Icons Nav >> REPORTS-->

                <li class="nav-heading">Pages</li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="users-profile.html">
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                </li><!-- End Profile Page Nav -->

              

                <li class="nav-item">
                    <a class="nav-link collapsed" href="pages-contact.html">
                        <i class="bi bi-envelope"></i>
                        <span>Contact</span>
                    </a>
                </li><!-- End Contact Page Nav -->


                <li class="nav-item">
                    <a class="nav-link collapsed" href="Logout.php">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <span>Sign out</span>
                    </a>
                </li><!-- End Login Page Nav -->

            </ul>

        </aside><!-- End Sidebar-->
        
        <main id="main" class="main">
            <div class="pagetitle">
                <h1 class="layout">Log Books</h1>
                    <nav>
                        <ol class="breadcrumb" style="background-color: transparent;">
                            <li class="breadcrumb-item"><a href="index.php?id=<?php echo $_SESSION['success'];?>">Home</a></li>
                            <li class="breadcrumb-item active">Log Books</li>
                            <li class="breadcrumb-item active">Senior high school</li>
                        </ol>
                    </nav>
            </div><!-- End Page Title -->
        </main>
          <!-- ======= Footer ======= -->
  <?php include 'include/footer.php';?>
  

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

    </body>
</html>
