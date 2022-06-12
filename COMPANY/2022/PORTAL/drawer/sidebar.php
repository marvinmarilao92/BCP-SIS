<ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " <?php echo 'href=login?'.$url
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
        <a class="nav-link collapsed" <?php echo 'href=overview?'.$url;
        ?>
        >
          <i class="bi bi-person"></i>
          <span>Request</span>
        </a>
      </li>       
      
      <!-- End Dashboard Nav -->

      
        <li class="nav-item">

        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Online Screening</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>


        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li class="nav-heading">Schedule</li>
            
          <li>
            <a <?php echo 'href=registered-accounts?id='.$url;
        ?>>
              <i class="bi bi-person"></i><span>Preview</span>
            </a>
          </li>
          <li>
            <a <?php echo 'href=company-screening?id='.$url;
        ?>>
              <i class="bi bi-person"></i><span>Set a Plan</span>
            </a>
          </li>
          <li class="nav-heading" >Optional "Physical"</li>
          <li>
            <a <?php echo 'href=approved-accounts?id='.$url;
        ?>>
              <i class="bi bi-envelope"></i><span>Create a POST</span>
            </a>
          </li>
          <li class="nav-heading">Screening Result</li>
          <li>
            <a <?php echo 'href=result?id='.$url;
        ?>>
              <i class="bi bi-envelope"></i><span>Record</span>
            </a>
          </li>


        </ul>

          
      </li>      
      <!-- End Components Nav -->
      <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#trainee" data-bs-toggle="collapse" href="#">
              <i class="bi bi-person"></i><span>Trainee Performance</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="trainee" class="nav-content collapse " data-bs-parent="#sidebar-nav">
               <li class="nav-heading"></li>
               <li> 
                <a <?php echo 'href=concern?id='.$url;?>>
                  <i class="bi bi-circle"></i><span>Evaluation / Grades</span>
                </a>
               </li>
               <li>
                <a <?php echo 'href=result?id='.$url;?>>
                  <i class="bi bi-circle"></i><span>Certificate</span>
                </a>
               </li>
               
               
            </ul>
        </li>
      <!--Trainee Sched-->
         <li class="nav-item">

        <a class="nav-link collapsed" data-bs-target="#sched" data-bs-toggle="collapse" href="#">
          <i class="bi bi-calendar-check"></i><span>Schedule</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="sched" class="nav-content collapse " data-bs-parent="#sidebar-nav">

             <li class="nav-heading">Schedule of Trainee</li>
             <li>
                <a <?php echo 'href=DTR?id='.$url;?>>
                  <i class="bi bi-circle"></i><span>Record</span>
                </a>
             </li>
             <li class="nav-heading" >DTR Record of Trainee</li>
             <li>
                <a <?php echo 'href=attendance-report?id='.$url;?>>
                  <i class="bi bi-envelope"></i><span>Daily Time Record</span>
                </a>
            </li>


        </ul>

      </li>
      
      <!--END OF SCHED -->
      
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#reports" data-bs-toggle="collapse" href="#">
              <i class="bi bi-flag"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="reports" class="nav-content collapse " data-bs-parent="#sidebar-nav">
               <li class="nav-heading">Concern</li>
               <li>
                <a <?php echo 'href=concern?id='.$url;?>>
                  <i class="bi bi-circle"></i><span>Trainee</span>
                </a>
               </li>
               <li class="nav-heading">Trainee</li>
               <li>
                <a <?php echo 'href=result?id='.$url;?>>
                  <i class="bi bi-circle"></i><span>Response</span>
                </a>
               </li>
               
               
            </ul>
        </li>
      <!-- End of REPORTS -->

        
     
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