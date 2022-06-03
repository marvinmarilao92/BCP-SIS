<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
      <!-- Adding return nav item for super admin -->
      <?php
          $output = '';
          $key = $_SESSION["login_key"];
          if(isset($verified_session_department) && ($verified_session_username)){
            switch($verified_session_year_level){
              case "4th Year":
                //statement
                ?>
                 <li class="nav-item">
                  <a class="btn btn-primary form-control" data-toggle="modal" data-target="#ApplyModal">
                    <i class="bi bi-arrow-return-left"></i>
                    <span>Apply for OJT</span>
                  </a>
                </li><!-- End Return Nav -->

                <?php
                break;
                case "3rd Year":
                  //statement
                  ?>
                   <li class="nav-item">
                    <a class="btn btn-primary form-control" data-toggle="modal" data-target="#ApplyModal" >
                      <i class="bi bi-arrow-return-left"></i>
                      <span>Apply for OJT</span>
                    </a>
                  </li><!-- End Return Nav -->

                  <?php
                  break;
            }
        }else{

        }
        ?>
    <li class="nav-item">
      <a class="<?php if ($page == 'dash') {
                  echo 'nav-link';
                } else {
                  echo 'nav-link collapsed';
                } ?>" href="index">
        <i class="bi bi-grid"></i>
        <span>News Feed</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-heading">Clearance</li>

      <li class="nav-item">
        <a class="nav-link <?php if($collapsed != 'semestral-clearance'){echo 'collapsed';} ?>" href="semestral-clearance.php">
          <i class="bi bi-list-check"></i>
          <span>Semestral Clearance</span>
        </a>
      </li><!-- End Semestral Clearance Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if($collapsed != 'clearance-appointment'){echo 'collapsed';} ?>" href="clearance-appointment.php">
          <i class="bi bi-calendar-check"></i>
          <span>Clearance Appointment</span>
        </a>
      </li><!-- End Semestral Clearance Nav -->

    <li class="nav-heading">Document Tracking</li>

    <li class="nav-item">
      <a class="<?php if ($page == 'docs') {
                  echo 'nav-link';
                } else {
                  echo 'nav-link collapsed';
                } ?>" href="docu_req">
        <i class="bi bi-folder"></i>
        <span>Tracked Files</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="<?php if ($page == 'req') {
                  echo 'nav-link';
                } else {
                  echo 'nav-link collapsed';
                } ?>" href="docu_template">
        <i class="bi bi-file-earmark-text"></i>
        <span>Request Document</span>
      </a>
    </li><!-- End Dashboard Nav -->


    <!-- <li class="nav-item">
    <a class="<?php if ($page == 'track') {
                echo 'nav-link';
              } else {
                echo 'nav-link collapsed show';
              } ?>" data-bs-target="#clearance-students-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person-lines-fill"></i><span>Clearance For Students</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="clearance-students-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="clearance-status">
          <i class="bi bi-circle"></i><span>Clearance Status</span>
        </a>
      </li>
    </ul>
  </li> -->
    <!-- End clearance-students Nav -->

    <li class="nav-item">
      <a href="tracking_docs" class="<?php if ($page == 'track') {
                                        echo 'nav-link';
                                      } else {
                                        echo 'nav-link collapsed';
                                      } ?>">
        <i class="bi bi-geo"></i>
        <span>Track Douments</span>
      </a>
    </li><!-- tracking item Nav -->








    <li class="nav-heading">Guidance</li>

    <li class="nav-item">
      <a href="guidance_Counseling_Request?id=<?php echo $_SESSION["login_key"]; ?>" class="<?php if ($page == 'cnslngRqst') { echo 'nav-link';} else {echo 'nav-link collapsed';} ?>">
        <i class="bi bi-clipboard-plus"></i>
        <span>Counseling Request</span>
      </a>
    </li><!-- End Counseling Request Page Nav -->

    <li class="nav-item">
      <a href="guidance_Student_Logs.php?id=<?php echo $_SESSION["login_key"]; ?>" class="<?php if ($page == 'stdLgs') { echo 'nav-link';} else {echo 'nav-link collapsed';} ?>">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Student Logs</span>
      </a>
    </li><!-- End Student Logs Page Nav -->










    <li class="nav-heading">Help Desk</li>

    <li class="nav-item">
      <a href="pages-faq?id=<?php echo $_SESSION["login_key"]; ?>" class="<?php if ($page == 'faqs') {
                                                                            echo 'nav-link';
                                                                          } else {
                                                                            echo 'nav-link collapsed';
                                                                          } ?>">
        <i class="bi bi-question-circle"></i>
        <span>F.A.Q.S</span>
      </a>
    </li><!-- End F.A.Q Page Nav -->
    <li class="nav-item">
      <a href="new_ticket.php?id=<?php echo $_SESSION["login_key"]; ?>" class="<?php if ($page == 'contact') {
                                                                                  echo 'nav-link';
                                                                                } else {
                                                                                  echo 'nav-link collapsed';
                                                                                } ?>">
        <i class="bi bi-chat-right-dots"></i>
        <span>Contact Us</span>
      </a>
    </li>
    <li class="nav-item">
      <a data-bs-toggle="modal" data-bs-target="#verticalycentered" class="<?php if ($page == 'ticket') {
                                                                              echo 'nav-link';
                                                                            } else {
                                                                              echo 'nav-link collapsed';
                                                                            } ?>">
        <i class="bi bi-envelope"></i>
        <span>Inbox</span>
      </a>
    </li>

    <li class="nav-heading">Internship</li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person"></i><span>Task</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="components-tooltips.html">
            <i class="bi bi-person"></i><span>--/--/--</span>
          </a>
        </li>
        <li>
          <a href="components-tooltips.html">
            <i class="bi bi-circle"></i><span>--/--/--</span>
          </a>
        </li>
      </ul>

    </li>
    <!-- End Components Nav -->
    <!-- <li class="nav-heading">Fill Up Form</li></li> -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-toggle="modal" data-bs-target="#pq">
        <i class="bi bi-person"></i>
        <span>Professional Qualification</span>
      </a>
    </li>

    <li class="nav-heading">Medical System</li>

    <li class="nav-item">
      <a class="<?php if ($page == 'medexam') {
                  echo 'nav-link';
                } else {
                  echo 'nav-link collapsed';
                } ?>" href="medexam.php">
        <i class="bi bi-folder"></i>
        <span>Annual Medical Examination</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="<?php if ($page == 'medres') {
                  echo 'nav-link';
                } else {
                  echo 'nav-link collapsed';
                } ?>" href="med-request.php">
        <i class="bi bi-folder"></i>
        <span>Medical Examination Result</span>
      </a>
    </li>

    <li class="nav-heading">Health Check Monitoring</li>

    <li class="nav-item">
      <a class="<?php if ($page == 'qr') {
                  echo 'nav-link';
                } else {
                  echo 'nav-link collapsed';
                } ?>" href="qr-code.php">
        <i class="bx bx-qr"></i>
        <span>QR Code</span>
      </a>
    </li>


    <!-- End Forms Nav -->
    <li class="nav-heading">Bills</li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-toggle="modal" data-bs-target="#paymentModal">
        <i class="bi bi-cash-coin"></i>
        <span>Payment</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="transac-details.php">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Transaction History</span>
      </a>
    </li>


  </ul>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"><i class="bi bi-exclamation-circle-fill" style="width:10px;"></i>&nbsp;&nbsp;Fair Warning
      </h5>
      <div class="no-overflow">
        <p><b>PROSECUTION</b>: Under Philippine law (Republic Act No. 8293), copyright infringement is punishable by the
          following: Imprisonment of between 1 to 3 years and a fine of between 50,000 to 150,000 pesos for the first
          offense. Imprisonment of 3 years and 1 day to six years plus a fine of between 150,000 to 500,000 pesos for
          the second offense.</p>
        <p><b>COURSE OF ACTION</b>: Whoever has maliciously uploaded these concerned materials are hereby given an
          ultimatum to take it down within 24-hours. Beyond the 24-hour grace period, our Legal Department shall
          initiate the proceedings in coordination with the National Bureau of Investigation for IP Address tracking,
          account owner identification, and filing of cases for prosecution.</p>
      </div>
      <div class="footer"></div>
    </div>
  </div>




</aside><!-- End Sidebar-->
  <!-- Create Document Modal -->
  <div class="modal fade" id="ApplyModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">APPLY OF INTERNSHIP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="post" enctype="multipart/form-data">
                <div class="card" style="margin: 10px;">
                  <div class="card-body">
                    <h2 class="card-title">Provide all information</h2>
                      <!-- Fill out Form -->

                      <div class="row g-3" >
                      <input type="text" id="fname" name="fname" class="form-control"  value="<?php echo $verified_session_firstname . " " . $verified_session_lastname ?>" readonly>
                      <input type="text" id="course" name="course" class="form-control"  value="<?php echo $verified_session_course?>" readonly>
                      <input type="text" id="yearlvl" name="yearlvl" class="form-control"  value="<?php echo $verified_session_year_level?>" readonly>
                        <br>

                        <div class="col-md-12">
                          <input class="form-control"  type="file" id="resume" name="resume" accept="application/pdf" >
                          <label for="resume" style="float: right; margin-right:10px"></label>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" style="height: 80px" placeholder="Reason" name="reason" id="reason" required></textarea>
                        </div>
                      </div>

                  </div>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" name="save">Apply</button>
                  </div>
              </form>
              <!-- End Form -->
          </div>
      </div>
  </div>
  <!-- End Create Document Modal-->
<?php require 'modal.php' ?>
