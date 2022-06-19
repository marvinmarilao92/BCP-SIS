<ul class="sidebar-nav" id="sidebar-nav">
  <!-- Adding return nav item for super admin -->
  <?php 
          $output = '';
          $key = $_SESSION["login_key"];
          if(isset($verified_session_department) && ($verified_session_username)){
            switch($rolee){
              case "SuperAdmin":
                //statement
                ?>
                 <li class="nav-item">
                  <a href="../../../super_admin/index?id=<?php echo $_SESSION["login_key"];?>" class="<?php echo 'nav-link collapsed';?>" >
                    <i class="bi bi-arrow-return-left"></i>
                    <span>Return to SuperUser</span>
                  </a>
                </li><!-- End Return Nav -->        
            
                <?php
                break;  
            } 
        }else{

        }
        ?>


    
    
      <li class="nav-item"data-bs-toggle="modal" data-bs-target="#Extra" >
        <a class="nav-link" style="font-size: 0.8rem;">
          <i class="bi bi-question-circle"></i>
          <span >Update Info
          </span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " style="font-size: 0.8rem;" <?php echo 'href=index.php?'.$url;
          ?>
          >
          <i class="bi bi-house"></i>
          <span>Home
          </span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" <?php echo 'href=dashboard?'.$url;
        ?>
        style="font-size: 0.8rem;">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-toggle="modal" data-bs-target="#verticalycentered" style="font-size: 0.8rem;">
          <i class="bi bi-envelope"></i>
          <span>Create Post</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->
      <li class="nav-heading" >Company Accounts</li>
        
        <li class="nav-item">

        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" style="font-size: 0.8rem;">
          <i class="bi bi-person"></i><span>Accounts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li class="nav-heading">Manage Accounts</li>
            
          <li>
            <a <?php echo 'href=registered-accounts?id='.$url;
        ?>>
              <i class="bi bi-person"></i><span>Registered Accounts</span>
            </a>
          </li>
          <li class="nav-heading" >Account Status</li>
          <li>
            <a <?php echo 'href=approved-accounts?id='.$url;
        ?>>
              <i class="bi bi-circle"></i><span>Approved Accounts</span>
            </a>
          </li>
          <li>
            <a  <?php echo 'href=rejected?id='.$url;
        ?>>
              <i class="bi bi-circle"></i><span>Rejected Accounts</span>
            </a>
          </li>
        </ul>
        
      </li>
      <!-- End Components Nav -->
      <li class="nav-heading">Master List</li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse"style="font-size: 0.8rem;">
          <i class="bi bi-journal-text"></i><span>College</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <li class="nav-heading">Enrolled Students</li>
            <a <?php echo 'href=college-data?id='.$url;
        ?>>
              <i class="bi bi-circle"></i><span>Students</span>
            </a>
          </li>
          <li>
            <li class="nav-heading">Qualified Students Status</li>
            <a  <?php echo 'href=qualified?'.$url;
        ?>>
              <i class="bi bi-circle"></i><span>Qualified</span>
            </a>
          </li>
          <li>
            <a <?php echo 'href=pending?'.$url;
        ?>>
              <i class="bi bi-circle"></i><span>Pending</span>
            </a>
          </li>
          <li class="nav-heading">Screening</li>
          <li>
            <a <?php echo 'href=screening?'.$url;
        ?>>
              <i class="bi bi-circle"></i><span>Set A Plan By Department Coordinator</span>
            </a>
          </li>
           <li>
            <a <?php echo 'href=screening?'.$url;
        ?>>
              <i class="bi bi-circle"></i><span>Re - Screeening</span>
            </a>
          </li>
          <li class="nav-heading">Students Screening Status</li>
          <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Passed</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Failed</span>
            </a>
          </li>
          <li class="nav-heading">Intern Grade</li>
          <li>
            <a href="intern_eva.php">
              <i class="bi bi-circle"></i><span>Evaluation</span>
            </a>
          </li>


        </ul>
      </li>
      
      <!-- -->
      <!-- End Forms Nav -->
      
      <!-- End Profile Page Nav -->

        <li class="nav-item">
        <a class="nav-link collapsed" style="font-size: 0.8rem;" <?php echo 'href=addOns.php?'.$url;
          ?>>
          <i class="bi bi-archive"></i>
          <span>Additional Requirements</span>
        </a>
      </li>

        <li class="nav-item">
        <a class="nav-link collapsed" style="font-size: 0.8rem;" <?php echo 'href=studDTR.php?'.$url;
          ?>>
          <i class="bi bi-people"></i>
          <span>Student DTR</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" style="font-size: 0.8rem;" <?php echo 'href=mWFH.php?'.$url;
          ?>>
          <i class="bi bi-people"></i>
          <span>Student | Work from Home</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" style="font-size: 0.8rem;" <?php echo 'href=ooo.php?'.$url;
          ?>>
          <i class="bi bi-people"></i>
          <span>Student OnSite</span>
        </a>
      </li>
      


       <li class="nav-item">
        <a class="nav-link collapsed" style="font-size: 0.8rem;" <?php echo 'href=bya.php?'.$url;
          ?>>
          <i class="bi bi-people"></i>
          <span>Student Status</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" style="font-size: 0.8rem;" <?php echo 'href=p-dat.php?'.$url;
          ?>>
          <i class="bi bi-building"></i>
          <span>Student Area</span>
        </a>
      </li>
        
        <li class="nav-item">

        <a class="nav-link collapsed"  data-bs-target="#SReport" data-bs-toggle="collapse" style="font-size: 0.8rem;">
          <i class="bi bi-people"></i><span>Student Task Report</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="SReport" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          
            
          <li>
            <a <?php echo 'href=SWTR.php?id='.$url;
        ?>>
              <i class="bi bi-circle"></i><span>Weekly Report</span>
            </a>
          </li>
          <li>
            <a <?php echo 'href=SDR.php?id='.$url;
        ?>>
              <i class="bi bi-circle"></i><span>Daily Report</span>
            </a>
          </li>
        </ul>
        </li>

         <li class="nav-item">

        <a class="nav-link collapsed" data-bs-target="#docu" data-bs-toggle="collapse" style="font-size: 0.8rem;">
          <i class="bi bi-file-earmark-pdf"></i><span>Document</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="docu" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          
            
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Company Document</span>
            </a>
          </li>
          <li>
            <a <?php echo 'href=sdocument.php?id='.$url;
        ?>>
              <i class="bi bi-circle"></i><span>Student Document</span>
            </a>
          </li>
        </ul>
        </li>
      <!-- End Tables Nav -->
       

      

       

       <li class="nav-item">
        <a class="nav-link collapsed" style="font-size: 0.8rem;">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li>


        <li class="nav-heading">Concerns</li>

        <li class="nav-item">
        <a class="nav-link collapsed" style="font-size: 0.8rem;" <?php echo 'href=concern.php?'.$url;
          ?>>
          <i class="bi bi-envelope"></i>
          <span>Reports</span>
        </a>
      </li>
      <!-- End Charts Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" style="font-size: 0.8rem;" <?php echo 'href=restore.php?'.$url;
          ?>>
          <i class="bi bi-recycle"></i>
          <span>Recycle Bin</span>
        </a>
      </li>
      <!-- End Icons Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" style="font-size: 0.8rem;" <?php echo 'href=restore.php?'.$url;
          ?>>
          <i class="bi bi-sd-card"></i>
          <span>Backup Data</span>
        </a>
      </li>


      

    </ul>
    <br>
    <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="bi bi-exclamation-circle-fill" style="width:10px;"></i>&nbsp;Fair Warning</h5>
              <div class="no-overflow"><p><b>PROSECUTION</b>: Under Philippine law (Republic Act No. 8293), copyright infringement is punishable by the following: Imprisonment of between 1 to 3 years and a fine of between 50,000 to 150,000 pesos for the first offense. Imprisonment of 3 years and 1 day to six years plus a fine of between 150,000 to 500,000 pesos for the second offense.</p><p><b>COURSE OF ACTION</b>: Whoever has maliciously uploaded these concerned materials are hereby given an ultimatum to take it down within 24-hours. Beyond the 24-hour grace period, our Legal Department shall initiate the proceedings in coordination with the National Bureau of Investigation for IP Address tracking, account owner identification, and filing of cases for prosecution.</p></div>
            <div class="footer"></div>
            </div>
          </div>