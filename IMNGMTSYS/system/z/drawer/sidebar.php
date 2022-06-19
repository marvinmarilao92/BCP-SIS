<ul class="sidebar-nav" id="sidebar-nav">
<?php 
          $output = '';
          $key = $_SESSION["login_key"];
          if(isset($verified_session_department) && ($verified_session_username)){
            switch($ad_rolee){
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
      <li class="nav-item">
        <a class="nav-link " <?php echo 'href=index.php?'.$url;
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
        >
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-toggle="modal" data-bs-target="#verticalycentered">
          <i class="bi bi-envelope"></i>
          <span>Create Post</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->
      
        <hr>
        <li class="nav-heading">Credentials</li>
        <li class="nav-item">

        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" >
          <i class="bi bi-person"></i><span>Company</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          
            
          <li>
            <a <?php echo 'href=prev?'.$url;
        ?>>
              <i class="bi bi-circle"></i><span>Preview</span>
            </a>  
          </li>
          
        </ul>
        
      </li>
      <!-- End Components Nav -->
      

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Intern | Trainee</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a <?php echo 'href=view?'.$url;
        ?>>
              <i class="bi bi-circle"></i><span>Preview</span>
            </a>
          </li>
          
        </ul>
      </li>
    
      <hr>
    
      <li class="nav-heading">Audit Logs Reports</li>
        
        <li class="nav-item">

        <a class="nav-link collapsed" data-bs-target="#ccomponents-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Audit Trail Logs</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="ccomponents-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li class="nav-heading">Overall</li>
            
          <li>
            <a href="logs.php">
              <i class="bi bi-person"></i><span>Logs Report</span>
            </a>
          </li>
        </ul>
        
      </li>


        
        <li class="nav-item">

        <a class="nav-link collapsed" data-bs-target="#man" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Manage Accounts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="man" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li>
            <a href="mng.php">
              <i class="bi bi-person"></i><span>Preview</span>
            </a>
          </li>
        </ul>
        
      </li>

      <li class="nav-item">

        <a class="nav-link collapsed" data-bs-target="#trainee" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Trainee</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="trainee" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li>
            <a href="tskills.php">
              <i class="bi bi-person"></i><span>Skills & Qualification</span>
            </a>
          </li>
          <li>
            <a href="placement.php">
              <i class="bi bi-person"></i><span>Trainee Area</span>
            </a>
          </li>
        </ul>
        <br>
      </li>
      <li class="nav-item">

        <a class="nav-link collapsed" data-bs-target="#repo" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="repo" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li>
            <a href="turnover.php">
              <i class="bi bi-card-text"></i><span>Preview</span>
            </a>
          </li>
        </ul>
        <br>
      </li>
      <br>
      <!-- -->
      
      <!-- End Profile Page Nav -->

     
      <!-- End Tables Nav -->

      <!-- End Charts Nav -->

      <!-- End Icons Nav -->

      

    </ul>
    <br>
    <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="bi bi-exclamation-circle-fill" style="width:10px;"></i>&nbsp;Fair Warning</h5>
              <div class="no-overflow"><p><b>PROSECUTION</b>: Under Philippine law (Republic Act No. 8293), copyright infringement is punishable by the following: Imprisonment of between 1 to 3 years and a fine of between 50,000 to 150,000 pesos for the first offense. Imprisonment of 3 years and 1 day to six years plus a fine of between 150,000 to 500,000 pesos for the second offense.</p><p><b>COURSE OF ACTION</b>: Whoever has maliciously uploaded these concerned materials are hereby given an ultimatum to take it down within 24-hours. Beyond the 24-hour grace period, our Legal Department shall initiate the proceedings in coordination with the National Bureau of Investigation for IP Address tracking, account owner identification, and filing of cases for prosecution.</p></div>
            <div class="footer"></div>
            </div>
          </div>