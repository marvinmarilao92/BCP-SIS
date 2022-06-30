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
        <a class="nav-link collapsed" <?php echo 'href=announcement?'.$url;
        ?>
        style="font-size: 0.8rem;">
         <i class="bi bi-flag"></i>
          <span>Announcements</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" <?php echo 'href=event?'.$url;
        ?>
        style="font-size: 0.8rem;">
         
          <i class="bi bi-calendar-event"></i>
          <span>Events</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" <?php echo 'href=feedback?'.$url;
        ?>
        style="font-size: 0.8rem;">
          <i class="bi bi-envelope"></i>
          <span>Feedback</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-toggle="modal" data-bs-target="#verticalycentered" style="font-size: 0.8rem;">
          <i class="bi bi-chat-right-text"></i>
          <span>Post</span>
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
        ?> style="font-size: 0.7rem;">
              <i class="bi bi-circle"></i><span>Registered Accounts</span>
            </a>
          </li>
          <li class="nav-heading" >Account Status</li>
          <li>
            <a <?php echo 'href=approved-accounts?id='.$url;
        ?> style="font-size: 0.7rem;">
              <i class="bi bi-circle"></i><span>Approved Accounts</span>
            </a>
          </li>
          <li>
            <a  <?php echo 'href=rejected?id='.$url;
        ?> style="font-size: 0.7rem;">
              <i class="bi bi-circle"></i><span>Rejected Accounts</span>
            </a>
          </li>
        </ul>
        
      </li>
      <!-- End Components Nav -->
      
      
      <!-- -->
      <!-- End Forms Nav -->
      
      <!-- End Profile Page Nav -->

        
      <!-- End Tables Nav -->
       

      

       

       


      <!-- End Icons Nav -->

      

      

    </ul>
    <br>
    <div class="card" style="font-size: 0.8rem;">
            <div class="card-body">
              <h5 class="card-title"><i class="bi bi-exclamation-circle-fill" style="width:10px;"></i>&nbsp;Fair Warning</h5>
              <div class="no-overflow"><p><b>PROSECUTION</b>: Under Philippine law (Republic Act No. 8293), copyright infringement is punishable by the following: Imprisonment of between 1 to 3 years and a fine of between 50,000 to 150,000 pesos for the first offense. Imprisonment of 3 years and 1 day to six years plus a fine of between 150,000 to 500,000 pesos for the second offense.</p><p><b>COURSE OF ACTION</b>: Whoever has maliciously uploaded these concerned materials are hereby given an ultimatum to take it down within 24-hours. Beyond the 24-hour grace period, our Legal Department shall initiate the proceedings in coordination with the National Bureau of Investigation for IP Address tracking, account owner identification, and filing of cases for prosecution.</p></div>
            <div class="footer"></div>
            </div>
          </div>