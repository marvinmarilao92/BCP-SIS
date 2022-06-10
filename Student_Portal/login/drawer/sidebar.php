<ul class="sidebar-nav" id="sidebar-nav">
    <?php $key = $_SESSION["login_key"];?>
      <li class="nav-item">
        <a class="nav-link " <?php echo 'href=index?'.$key;?>>
          <i class="bi bi-house"></i>
          <span>Home
          </span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" <?php echo 'href=dashboard?'.$key;?>>
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>MyTask</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li class="nav-heading">Upload Files and Documents</li>
            
          <li>
            <a href="components-tooltips.html">
              <i class="bi bi-person"></i><span>Upload</span>
            </a>
          </li>
            
          <li>
            <a href="components-tooltips.html">
              <i class="bi bi-person"></i><span>Manage Task</span>
            </a>
           </li>
          <li class="nav-heading" >Optional ( Offsite )</li>
          <li>
            <a href="components-tooltips.html">
              <i class="bi bi-circle"></i><span>WorkFromHome</span>
            </a>
          </li>
        </ul>
        <br>
      </li>
      <!-- End Components Nav -->
          
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