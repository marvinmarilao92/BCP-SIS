 <!-- ======= Sidebar ======= -->

 <aside id="sidebar" class="sidebar">
   <ul class="sidebar-nav" id="sidebar-nav">

     <?php $output = '';
      $key = $_SESSION['login_key'];
      if (isset($verified_session_department) && ($verified_session_username)) {
        switch ($verified_session_role) {
          case 'SuperAdmin':
            $output = '
              <li class="nav-item" >
                <a href="../../super_admin/index.php?id=' . $key . '"style="color: rgb(83, 107, 148);font-weight:600;">
                  <i class="bi bi-arrow-return-left"></i>
                  <span>Return to SuperUser</span>
                </a>
              </li><!-- End Return Nav -->    
            ';
            break;
        }
        echo $output;
      }
      ?>

     <li class="nav-item">
       <a href="index.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('Dashboard' == $page) {
                                                                              echo 'nav-link';
                                                                            } else {
                                                                              echo 'nav-link collapsed';
                                                                            } ?>">
         <i class="bi bi-graph-up"></i>
         <span>Dashboard</span>
       </a>
     </li>

     <li class="nav-item">
       <a href="post.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('post' == $page) {
                                                                            echo 'nav-link';
                                                                          } else {
                                                                            echo 'nav-link collapsed';
                                                                          } ?>">
         <i class="bi bi-globe2"></i>
         <span>Posting</span>
       </a>
     </li>

     <!-- End Dashboard Nav -->

     <li class="nav-heading text-primary">Module</li>

     <li class="nav-item">
       <a onclick="Annual()" href="#" class="nav-link collapsed">
         <i class="bi bi-journal-medical"></i>
         <span>Stub Completion</span>
       </a>
     </li>

     <li class="nav-item">
       <a href="request_list.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('Request' == $page) {
                                                                                    echo 'nav-link';
                                                                                  } else {
                                                                                    echo 'nav-link collapsed';
                                                                                  } ?>">
         <i class="bi bi-clipboard-check"></i>
         <span>Student Stub Completion Record</span>
         <span class="badge bg-danger badge-number">
           <?php require_once 'security/sec-conn.php';
            $query = "SELECT * FROM hcms_request WHERE `status` = 'Pending'";
            $result = mysqli_query($conn2, $query);
            if ($result) {
              echo mysqli_num_rows($result);
            }
            ?>
         </span>
       </a>
     </li>


     <li class="nav-item">
       <a class="nav-link collapsed" data-bs-target="#manage-nav" data-bs-toggle="collapse" href="#">
         <i class="bi bi-person-lines-fill"></i><span>(AME) Management&nbsp;</span><i
           class="bi bi-chevron-down ms-auto"></i>
       </a>
       <ul id="manage-nav" class="<?php if ('manage' == $nav) {
                                    echo 'nav-content collapse show';
                                  } else {
                                    echo 'nav-content collapse';
                                  } ?> " data-bs-parent="#sidebar-nav">
         <li>
           <a href="schedule-management.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('schedule' == $page) {
                                                                                                echo 'active';
                                                                                              } ?>">
             <i class="bi bi-circle"></i><span>Schedule</span>
           </a>
         </li>
         <li>
           <a href="medical-examination-report.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('daily-logs' == $page) {
                                                                                                      echo 'active';
                                                                                                    } ?>">
             <i class="bi bi-circle"></i><span>Manage (AME) Result</span>
           </a>
         </li>
       </ul>
     </li>


     <li class="nav-heading text-primary">Monitor</li>


     <li class="nav-item">
       <a class="nav-link collapsed" data-bs-target="#logs-nav" data-bs-toggle="collapse" href="#">
         <i class="bi bi-person-lines-fill"></i><span>Employee Logs</span><i class="bi bi-chevron-down ms-auto"></i>
       </a>
       <ul id="logs-nav" class="<?php if ('logs' == $nav) {
                                  echo 'nav-content collapse show';
                                } else {
                                  echo 'nav-content collapse';
                                } ?> " data-bs-parent="#sidebar-nav">
         <li>
           <a href="logs-admin.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('logs-admin' == $page) {
                                                                                      echo 'active';
                                                                                    } ?>">
             <i class="bi bi-circle"></i><span>Admin-Logs</span>
           </a>
         </li>
         <li>
           <a href="logs-staff.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('logs-staffs' == $page) {
                                                                                      echo 'active';
                                                                                    } ?>">
             <i class="bi bi-circle"></i><span>Staff-Logs</span>
           </a>
         </li>
         <li>
           <a href="activities.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('activities' == $page) {
                                                                                      echo 'active';
                                                                                    } ?>">
             <i class="bi bi-circle"></i><span>Activities</span>
           </a>
         </li>
       </ul>
     </li>

     <li class="nav-heading text-primary">Settings</li>

     <li class="nav-item">
       <a href="users-profile.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('Profile' == $page) {
                                                                                      echo 'nav-link';
                                                                                    } else {
                                                                                      echo 'nav-link collapsed';
                                                                                    } ?>">
         <i class="bi bi-person"></i>
         <span>Profile</span>
       </a>
     </li><!-- End Profile Page Nav -->

     <li class="nav-item">
       <a href="FAQ.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('FAQ' == $page) {
                                                                            echo 'nav-link';
                                                                          } else {
                                                                            echo 'nav-link collapsed';
                                                                          } ?>">
         <i class="bi bi-question-circle"></i>
         <span>F.A.Q</span>
       </a>
     </li><!-- End Contact Page Nav -->

     <li class="nav-item">
       <a href="pages-contact.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('contact' == $page) {
                                                                                      echo 'nav-link';
                                                                                    } else {
                                                                                      echo 'nav-link collapsed';
                                                                                    } ?>">
         <i class="bi bi-person"></i>
         <span>Contact</span>
       </a>
     </li>

     <li class="nav-item">
       <a href="users-profile.php?id=<?php echo $_SESSION['login_key']; ?>" class="<?php if ('Profile' == $page) {
                                                                                      echo 'nav-link';
                                                                                    } else {
                                                                                      echo 'nav-link collapsed';
                                                                                    } ?>">
         <i class="bi bi-box-arrow-in-right"></i>
         <span>Log-Out</span>
       </a>
     </li><!-- End Contact Page Nav -->
   </ul>
 </aside><!-- End Sidebar-->



 <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
   aria-labelledby="exampleModalToggleLabel" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered modal-lg">
     <div class="modal-content">
       <div class="modal-header bg-primary">
         <h5 class="modal-title text-light" id="exampleModalToggleLabel">Stub Completion Form</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <div class="row g-4">
           <div class="col p-3">
             <div class="input-group">
               <input type="text" placeholder="Search Student Number" id="searchID" class="form-control" name="search"
                 onchange="searchstdID('showStudentInformation');">
               <label for="sub"><i class="btn btn-danger ri-search-eye-line"
                   style="cursor: pointer;">&nbspSearch</i></label>
               <a href="#" id="sub" onclick="searchstdID('showStudentInformation');" name="submit"
                 style="display: none; visibility: none;"></a>
             </div>
           </div>
         </div>
         <div class="row">
           <div id="showStudentInformation"></div>
         </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button class="btn btn-danger" onclick="validate();" name="confirm">confirm</button>
       </div>
     </div>
   </div>
 </div>

 <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
   <div class="offcanvas-header">
     <h5 id="offcanvasRightLabel">Offcanvas right</h5>
     <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
   </div>
   <div class="offcanvas-body">...</div>
 </div>

 <?php require_once 'security/newsource.php'; ?>

 <script>
function Annual() {
  $('#myModal').modal('show')
}
 </script>

 <script>
function searchstdID(showStudentInformation) {
  var searchID = document.getElementById("searchID").value;
  var takeDataintoArray =
    'searchID=' + searchID;
  if (searchID != '') {
    $.ajax({
      type: "GET",
      url: 'resources/ajax/MScashier.php',
      data: takeDataintoArray,
      cache: false,
      success: function(html) {
        var ajaxDisplay = document.getElementById(showStudentInformation);
        ajaxDisplay.innerHTML = html;
      }
    });
  } else if (searchID == '') {
    Swal.fire({
      allowOutsideClick: false,
      icon: 'info',
      title: 'Please Enter (AME) Reference Number',
      text: 'important!',
      confirmButtonText: 'Okay',
      confirmButtonColor: '#f93154',
    })
  }
}
 </script>
 <script type="text/javascript">
function validate() {
  var status = document.getElementById("status").value;
  if (status == "Nval") {
    // cashier
    var pay_date = document.getElementById("pay_date").value;
    // student information
    var id_number = document.getElementById("id_number").value;
    var name = document.getElementById("name").value;
    var course = document.getElementById("course").value;
    var yr_lvl = document.getElementById("yr_lvl").value;
    var section = document.getElementById("section").value;
    var sy = document.getElementById("sy").value;
    // med
    var urin = document.getElementById("urin")
    var cbc = document.getElementById("cbc")
    var c_xray = document.getElementById("c_xray")

    if (urin.checked) {
      var urin = "1";
    } else {
      var urin = "0";
    }

    if (cbc.checked) {
      var cbc = "1";
    } else {
      var cbc = "0";
    }

    if (c_xray.checked) {
      var c_xray = "1";
    } else {
      var c_xray = "0";
    }

    var power = document.getElementById("power").value;

    var takeDataintoArray = 'pay_date=' + pay_date + '&id_number=' + id_number + '&name=' + name + '&course=' +
      course + '&yr_lvl=' + yr_lvl + '&section=' + section + '&sy=' + sy + '&urin=' + urin + '&cbc=' + cbc +
      '&c_xray=' + c_xray;

    if (pay_date != "" || id_number != "" || name != "" || course != "" ||
      yr_lvl != "" || sy != "") {

      if (power == "unable") {

        Swal.fire({
          allowOutsideClick: false,
          icon: 'question',
          title: 'Do you want to Assess this even if Not in Schedule?',
          text: 'Note: This wiil write the record in advance',
          confirmButtonText: 'Overwrite',
          confirmButtonColor: '#f93154',
          cancelButtonColor: '#B23CFD',
          showCancelButton: true,
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            Swal.fire({
              icon: 'success',
              title: 'Inserting Record',
              text: 'You have overwrite record',
              showConfirmButton: false,
              timer: 4000,
              timerProgressBar: true,
            }).then(() => {
              $.ajax({
                type: "POST",
                url: 'resources/ajax/MSvalid.php',
                data: takeDataintoArray,
                cache: false,
                success: function(result) {
                  Swal.fire({
                    allowOutsideClick: true,
                    icon: 'success',
                    title: 'Successfully Inserted',
                    showConfirmButton: true,
                  })

                }
              });
            })
          }
        })

      } else if (power == "able") {
        {
          $.ajax({
            type: "POST",
            url: 'resources/ajax/MSvalid.php',
            data: takeDataintoArray,
            cache: false,
            success: function(result) {
              Swal.fire({
                allowOutsideClick: true,
                icon: 'success',
                title: 'Successfully Inserted',
                showConfirmButton: true,
              })

            }
          });
        }
      }
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Please Complete',
        text: "Sorry cannot validate this record",
      })
    }
  } else {
    Swal.fire({
      icon: 'error',
      title: 'Already Done with the Process',
      text: "Sorry cannot insert Record",
    })
  }

}
 </script>