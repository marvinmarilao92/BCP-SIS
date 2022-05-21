<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="<?php if($page=='dash'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" href="index">
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
          <a href="clearance-status" class="<?php if($page=='clr'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Clearance Status</span>
          </a>
        </li>
      </ul>
    </li><!-- End Account Management Nav -->

<li class="nav-heading">Document Tracking</li>

  <li class="nav-item">
    <a class="<?php if($page=='docs'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" href="docu_req">
      <i class="bi bi-folder"></i>
      <span>Tracked Files</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="<?php if($page=='req'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" href="docu_template">
      <i class="bi bi-file-earmark-text"></i>
      <span>Request Document</span>
    </a>
  </li><!-- End Dashboard Nav -->


  <!-- <li class="nav-item">
    <a class="<?php if($page=='track'){echo 'nav-link';}else{echo 'nav-link collapsed show';}?>" data-bs-target="#clearance-students-nav" data-bs-toggle="collapse" href="#">
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
      <a href="tracking_docs" class="<?php if($page=='track'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
        <i class="bi bi-geo"></i>
        <span>Track Douments</span>
      </a>
    </li><!-- tracking item Nav -->


    <li class="nav-heading">Help Desk</li>

    <li class="nav-item">
      <a href="pages-faq?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='faqs'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
        <i class="bi bi-question-circle"></i>
        <span>F.A.Q.S</span>
      </a>
    </li><!-- End F.A.Q Page Nav -->
    <li class="nav-item">
      <a href="new_ticket.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='contact'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
        <i class="bi bi-chat-right-dots"></i>
        <span>Contact Us</span>
      </a>
    </li>
    <li class="nav-item">
      <a data-bs-toggle="modal" data-bs-target="#verticalycentered" class="<?php if($page=='ticket'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
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
      <h5 class="card-title"><i class="bi bi-exclamation-circle-fill" style="width:10px;"></i>&nbsp;&nbsp;Fair Warning</h5>
      <div class="no-overflow"><p><b>PROSECUTION</b>: Under Philippine law (Republic Act No. 8293), copyright infringement is punishable by the following: Imprisonment of between 1 to 3 years and a fine of between 50,000 to 150,000 pesos for the first offense. Imprisonment of 3 years and 1 day to six years plus a fine of between 150,000 to 500,000 pesos for the second offense.</p><p><b>COURSE OF ACTION</b>: Whoever has maliciously uploaded these concerned materials are hereby given an ultimatum to take it down within 24-hours. Beyond the 24-hour grace period, our Legal Department shall initiate the proceedings in coordination with the National Bureau of Investigation for IP Address tracking, account owner identification, and filing of cases for prosecution.</p></div>
    <div class="footer"></div>
    </div>
  </div>




</aside><!-- End Sidebar-->
<?php require 'modal.php' ?>