

<div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Professional Qualifications</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    
                    
                    <form class="row g-3">
                    <div class="col-12">
                    <label for="inputNanme4" class="form-label">Course Title</label>
                    <select id="inputState" class="form-select">
                    <option selected>BSIT</option>
                    <option>BSHRM</option>
                    <option>BSCRIM</option>
                    <option>BSEDUC</option>
                    <option>BSPSY</option>
                  </select>
                </div>
                
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Skills</label>
                  <input type="text" class="form-control" id="inputPassword4">
                </div>
                <hr>
                <div class="form-group"> 
                    
								    <h4>Attach your certificate ( Optional )</h4> <br>
								    <input class="form-control" accept="application/pdf/docx" type="file" name="certificate" required=""> 
							  </div>
  

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="<?php if($page=='dash'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" href="index.php">
      <i class="bi bi-grid"></i>
      <span>News Feed</span>
    </a>
  </li><!-- End Dashboard Nav -->

<li class="nav-heading">Clearance</li>

    <!-- Audit Trail -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-people"></i><span>Clearance For Students</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="<?php if($col=='Clearance'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
      <li>
          <a href="clearance-status.php" class="<?php if($page=='clr'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Clearance Status</span>
          </a>
        </li>
      </ul>
    </li><!-- End Account Management Nav -->

<li class="nav-heading">Document Tracking</li>

  <li class="nav-item">
    <a class="<?php if($page=='docs'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" href="docu_req.php">
      <i class="bi bi-file-earmark-text"></i>
      <span>Documents Requested </span>
    </a>
  </li><!-- End Dashboard Nav -->



  <!-- <li class="nav-item">
    <a class="<?php if($page=='track'){echo 'nav-link';}else{echo 'nav-link collapsed show';}?>" data-bs-target="#clearance-students-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person-lines-fill"></i><span>Clearance For Students</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="clearance-students-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="clearance-status.php">
          <i class="bi bi-circle"></i><span>Clearance Status</span>
        </a>
      </li>
    </ul>
  </li> -->
  <!-- End clearance-students Nav -->

  <li class="nav-item">
      <a href="tracking_docs.php" class="<?php if($page=='track'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
        <i class="bi bi-geo"></i>
        <span>Track Douments</span>
      </a>
    </li><!-- tracking item Nav -->


    <li class="nav-heading">Help Desk</li>

    <li class="nav-item">
  <a href="pages-faq.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='faqs'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
    <i class="bi bi-question-circle"></i>
      <span>F.A.Q.S</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->
  <li class="nav-item">
<a data-bs-toggle="modal" data-bs-target="#verticalycentered" class="<?php if($page=='ticket'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
    <i class="bi bi-envelope"></i>
      <span>Inbox</span>
 </a>

  </li>
  <li class="nav-heading">Internship</li>

    
  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-bookmark-fill"></i><span>My Task</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#task">
              <i class="bi bi-journal-bookmark-fill"></i><span>Tasks</span>
            </a>
          </li>
          
          <li>
            <a href="announcement.php">
              <i class="bi bi-calendar-event-fill"></i><span> My Calendar</span>
            </a>
          </li>
        </ul>
      </li>
    
<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-bookmark-fill"></i><span>Site pages</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">  
  <li>
      <a href="announcement.php">
        <i class="bi bi-circle"></i><span> Site Announcement</span>
      </a>
    </li>

  </ul>
</li>
<li class="nav-item">
  <a class="nav-link collapsed" href="pages-contact.html">
    <i class="bi bi-chat-right-text-fill"></i>
    <span>Contact</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link collapsed">
    <i class="bi bi-chat-right-text-fill"></i>
    <span data-bs-toggle="modal" data-bs-target="#basicModal">Professional Qualifications</Q></span>
  </a>
</li>



<li class="nav-item">
  <a class="nav-link collapsed" href="forums.php">
    <i class="bi bi-bookmarks-fill"></i>
    <span>Forums</span>
  </a>
</li>


 

</ul>





</aside><!-- End Sidebar-->