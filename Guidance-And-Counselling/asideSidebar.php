<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " id="sideButton" href="index.php?id=<?php echo $_SESSION['success'] . "&dshbrd=1"; ?>">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->


    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#Placement" data-bs-toggle="collapse" href="#" id="sideButton">
        <i class="bi bi-stickies"></i><span>Posting</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="Placement" class="nav-content collapse
              <?php
              if (
                $_SERVER["REQUEST_METHOD"] == "GET" &&
                isset($_GET["jpnf"]) || isset($_GET["pstNF"]) || isset($_GET["Rntn"]) || isset($_GET["MngPst"])
              ) {
                echo "show";
              } else {
                echo "";
              }
              ?>
            " data-bs-parent="#sidebar-nav">
        <li>
          <a href="jobPosting.php?id=<?php echo $_SESSION['success'] . "&jpnf=1"; ?>">
            <i class="
                          <?php
                          if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["jpnf"])) {
                            echo "bi bi-caret-right-fill";
                          } else {
                            echo "bi bi-caret-right";
                          }
                          ?>
                    " style="font-size: 14px;"></i><span id="Page">Job Posting</span>
          </a>
        </li>
        <!-- <li>
                  <a href="postInfo.php?id=<?php echo $_SESSION['success'] . "&pstNF=1"; ?>">
                      <i class="
                          <?php
                          if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["pstNF"])) {
                            echo "bi bi-caret-right-fill";
                          } else {
                            echo "bi bi-caret-right";
                          }
                          ?>
                      " style="font-size: 14px;"></i><span id="Page">Information</span>
                  </a>
              </li>
              <li>
                  <a href="Orientation.php?id=<?php echo $_SESSION['success'] . "&Rntn=1"; ?>">
                      <i class="
                          <?php
                          if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["Rntn"])) {
                            echo "bi bi-caret-right-fill";
                          } else {
                            echo "bi bi-caret-right";
                          }
                          ?>
                      " style="font-size: 14px;"></i><span id="Page">Orientation</span>
                  </a>
              </li> -->
        <li>
          <a href="managePost.php?id=<?php echo $_SESSION['success'] . "&MngPst=1"; ?>">
            <i class="
                          <?php
                          if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["MngPst"])) {
                            echo "bi bi-caret-right-fill";
                          } else {
                            echo "bi bi-caret-right";
                          }
                          ?>
                      " style="font-size: 14px;"></i><span id="Page">Manage Post</span>
          </a>
        </li>
      </ul>
    </li><!-- End Components Nav >> Profiling-->




    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#Profiling" data-bs-toggle="collapse" href="#" id="sideButton">
        <i class="bi bi-card-checklist"></i><span>Profiling</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="Profiling" class="nav-content collapse
              <?php
              if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["stdpfl"]) || isset($_GET["stdlg"])) {
                echo "show";
              } else {
                echo "";
              }
              ?>
            " data-bs-parent="#sidebar-nav">
        <li>
          <a href="StudentProfile.php?id=<?php echo $_SESSION['success'] . "&stdpfl=1"; ?>">
            <i class="
                          <?php
                          if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["stdpfl"])) {
                            echo "bi bi-caret-right-fill";
                          } else {
                            echo "bi bi-caret-right";
                          }
                          ?>
                    " style="font-size: 14px;"></i><span id="Page">Individual inventory</span>
          </a>
        </li>
        <li>
          <a href="StudentLogs.php?id=<?php echo $_SESSION['success'] . "&stdlg=1"; ?>">
            <i class="
                          <?php
                          if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["stdlg"])) {
                            echo "bi bi-caret-right-fill";
                          } else {
                            echo "bi bi-caret-right";
                          }
                          ?>
                      " style="font-size: 14px;"></i><span id="Page">Student Logs</span>
          </a>
        </li>
      </ul>
    </li><!-- End Components Nav >> Profiling-->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#StudentApproval" data-bs-toggle="collapse" href="#"
        id="sideButton">
        <i class="bi bi-folder-check"></i><span>Student Appointment</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="StudentApproval" class="nav-content collapse
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["cnslng"]) || isset($_GET["lstcnl"])) {
              echo "show";
            } else {
              echo "";
            }
            ?>
          " data-bs-parent="#sidebar-nav">
        <li>
          <a href="ConandAss.php?id=<?php echo $_SESSION['success'] . "&cnslng=1"; ?>">
            <i class="
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["cnslng"])) {
                          echo "bi bi-caret-right-fill";
                        } else {
                          echo "bi bi-caret-right";
                        }
                        ?>
                      " style="font-size: 14px;"></i><span>Consultation and Assessment</span>
          </a>
        </li <li>
        <a href="Rejectedlist.php?id=<?php echo $_SESSION['success'] . "&lstcnl=1"; ?>">
          <i class="
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["lstcnl"])) {
                          echo "bi bi-caret-right-fill";
                        } else {
                          echo "bi bi-caret-right";
                        }
                        ?>
                      " style="font-size: 14px;"></i><span>Rejected List</span>
        </a>
    </li>
  </ul>
  </li><!-- End Forms Nav >> Counseling Services-->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#CounselingServices" data-bs-toggle="collapse" href="#"
      id="sideButton">
      <i class="bi bi-collection"></i><span>Counseling Services</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="CounselingServices" class="nav-content collapse
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["cndcnl"]) || isset($_GET["lsfcnsld"])) {
              echo "show";
            } else {
              echo "";
            }
            ?>
          " data-bs-parent="#sidebar-nav">
      <li>
        <a href="ConductCounsel.php?id=<?php echo $_SESSION['success'] . "&cndcnl=1"; ?>">
          <i class="
                      <?php
                      if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["cndcnl"])) {
                        echo "bi bi-caret-right-fill";
                      } else {
                        echo "bi bi-caret-right";
                      }
                      ?>  " style="font-size: 14px;"></i><span>Conduct Counsel</span>
        </a>
      </li>
      <li>
        <a href="ListofCounsel.php?id=<?php echo $_SESSION['success'] . "&lsfcnsld=1"; ?>">
          <i class="
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["lsfcnsld"])) {
                          echo "bi bi-caret-right-fill";
                        } else {
                          echo "bi bi-caret-right";
                        }
                        ?>  " style="font-size: 14px;"></i><span>List of Counseled</span>
        </a>
      </li>

    </ul>
  </li><!-- End Forms Nav >> Counseling Services-->


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#requestData" data-bs-toggle="collapse" href="#" id="sideButton">
      <i class="bi bi-mailbox"></i><span>Request/Approval Section</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="requestData" class="nav-content collapse
          <?php
          if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["rqstdt"])) {
            echo "show";
          } else {
            echo "";
          }
          ?>
          " data-bs-parent="#sidebar-nav">
      <li>
        <a href="requestData.php?id=<?php echo $_SESSION['success'] . "&rqstdt=1"; ?>">
          <i class="<?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["rqstdt"])) {
                      echo "bi bi-caret-right-fill";
                    } else {
                      echo "bi bi-caret-right";
                    }
                    ?>  " style="font-size: 14px;"></i><span>Request Status</span>
        </a>
      </li>

    </ul>
  </li><!-- End Charts Nav >> Files and Documents-->


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#Research_Survey" data-bs-toggle="collapse" href="#" id="sideButton">
      <i class="bi bi-stickies"></i><span>Research/Survey Evaluation</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="Research_Survey" class="nav-content collapse
              <?php
              if (
                $_SERVER["REQUEST_METHOD"] == "GET" &&
                isset($_GET["tchrvl"]) || isset($_GET["stdprsrvc"]) || isset($_GET["vltnfrm"])
              ) {
                echo "show";
              } else {
                echo "";
              }
              ?>
            " data-bs-parent="#sidebar-nav">
      <li>
        <a href="teacherEval.php?id=<?php echo $_SESSION['success'] . "&tchrvl=1"; ?>">
          <i class="
                          <?php
                          if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["tchrvl"])) {
                            echo "bi bi-caret-right-fill";
                          } else {
                            echo "bi bi-caret-right";
                          }
                          ?>
                    " style="font-size: 14px;"></i><span id="Page">Teacher's Evaluation</span>
        </a>
      </li>

      <li>
        <a href="StudentPersonelService.php?id=<?php echo $_SESSION['success'] . "&stdprsrvc=1"; ?>">
          <i class="
                          <?php
                          if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["stdprsrvc"])) {
                            echo "bi bi-caret-right-fill";
                          } else {
                            echo "bi bi-caret-right";
                          }
                          ?>
                    " style="font-size: 14px;"></i><span id="Page">Student Perosonnel Services</span>
        </a>
      </li>

      <li>
        <a href="evaluationForm.php?id=<?php echo $_SESSION['success'] . "&vltnfrm=1"; ?>">
          <i class="
                          <?php
                          if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["vltnfrm"])) {
                            echo "bi bi-caret-right-fill";
                          } else {
                            echo "bi bi-caret-right";
                          }
                          ?>
                    " style="font-size: 14px;"></i><span id="Page">Evaluation Form</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav >> Profiling-->




  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#FilesandDocuments" data-bs-toggle="collapse" href="#"
      id="sideButton">
      <i class="bi bi-file-earmark"></i><span>Files and Documents</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="FilesandDocuments" class="nav-content collapse
          <?php
          if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["flsadc"])) {
            echo "show";
          } else {
            echo "";
          }
          ?>
          " data-bs-parent="#sidebar-nav">
      <li>
        <a href="GuidanceForms.php?id=<?php echo $_SESSION['success'] . "&flsadc=1"; ?>">
          <i class="<?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["flsadc"])) {
                      echo "bi bi-caret-right-fill";
                    } else {
                      echo "bi bi-caret-right";
                    }
                    ?>  " style="font-size: 14px;"></i><span>File and Documents</span>
        </a>
      </li>

    </ul>
  </li>


  <!-- End Charts Nav >> Files and Documents-->



  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#Reports" data-bs-toggle="collapse" href="#" id="sideButton">
      <i class="bi bi-flag"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="Reports" class="nav-content collapse
          <?php
          if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["vstlgs"]) || isset($_GET["cnslr"])) {
            echo "show";
          } else {
            echo "";
          }
          ?>
          " data-bs-parent="#sidebar-nav">
      <li>
        <a href="GuidanceReport.php?id=<?php echo $_SESSION['success']; ?>">
          <i class="bi bi-caret-right" style="font-size: 14px;"></i><span>Guidance Report</span>
        </a>
      </li>
      <li>
        <a href="CounselingReport.php?id=<?php echo $_SESSION['success'] . "&cnslr=1"; ?>">
          <i class="<?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["cnslr"])) {
                      echo "bi bi-caret-right-fill";
                    } else {
                      echo "bi bi-caret-right";
                    }
                    ?>  " style="font-size: 14px;"></i><span>Counseling Report</span>
        </a>
      </li>
      <li>
        <a href="visitLogs.php?id=<?php echo $_SESSION['success'] . "&vstlgs=1"; ?>">
          <i class="<?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["vstlgs"])) {
                      echo "bi bi-caret-right-fill";
                    } else {
                      echo "bi bi-caret-right";
                    }
                    ?>  " style="font-size: 14px;"></i><span>Visit Logs</span>
        </a>
      </li>
      <li>
        <a href="PrintingofReports.php?id=<?php echo $_SESSION['success']; ?>">
          <i class="bi bi-caret-right" style="font-size: 14px;"></i><span>Printing of Report</span>
        </a>
      </li>
    </ul>
  </li><!-- End Icons Nav >> REPORTS-->

  <li class="nav-heading">Pages</li>
  <li class="nav-item">
    <a href="users-profile.php?id=<?php echo $_SESSION['success']; ?>">
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
  </li>
  <!-- End Lo
           gin Page Nav -->

  </ul>



</aside><!-- End Sidebar-->


<script>
document.onkeydown = function(e) {
  if (event.keyCode == 123) {
    return false;
  }
  if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
    return false;
  }
  if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
    return false;
  }
  if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
    return false;
  }
}



const body = document.getElementsByTagName('body');
// stop keyboard shortcuts
window.addEventListener("keydown", (event) => {
  if (event.ctrlKey && (event.key === "S" || event.key === "s")) {
    event.preventDefault();

  }

  if (event.ctrlKey && (event.key === "C")) {
    event.preventDefault();

  }
  if (event.ctrlKey && (event.key === "E" || event.key === "e")) {
    event.preventDefault();

  }
  if (event.ctrlKey && (event.key === "I" || event.key === "i")) {
    event.preventDefault();

  }
  if (event.ctrlKey && (event.key === "K" || event.key === "k")) {
    event.preventDefault();

  }
  if (event.ctrlKey && (event.key === "U" || event.key === "u")) {
    event.preventDefault();

  }
});
// stop right click
document.addEventListener('contextmenu', function(e) {
  e.preventDefault();
});
</script>