<!-- ======= Sidebar ======= -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <aside id="sidebar" class="sidebar">
  <!-- Side Nav -->
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-heading">Module</li>
          <li class="nav-item">
            <a href="index?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='temp'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
              <i class="ri-file-edit-line"></i>
              <span>Form Requests &nbsp;</span>
            </a>
          </li><!-- All docs Nav -->
        <?php
            require_once("include/conn.php");
            $query="SELECT * FROM role_config WHERE `role`='$verified_session_role' ORDER BY side_nav_id ASC ";
            $result=mysqli_query($conn,$query);
            while($rs=mysqli_fetch_array($result)){
              $sidenav_id = $rs['side_nav_id'];

              $query1="SELECT * FROM role_side_nav WHERE `id`='$sidenav_id' ";
              $result1=mysqli_query($conn,$query1);
              while($rs1=mysqli_fetch_array($result1)){
                $Mtitle = $rs1['module_title'];
                $Mlink = $rs1['module_link'];
                $Mpage = $rs1['module_page'];
                $Micon = $rs1['module_icon'];
                if($Mtitle!="Document Tracking" && $Mtitle!="Registrar Clearance" && $Mtitle!="Overall Records" && $Mtitle!="Reports" && $Mtitle!="Audit Trail" && $Mtitle!="Settings"){
                  ?>
                  <li class="nav-item">
                    <a href="<?php echo $Mlink;?>?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page==$Mpage){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                      <i class="<?php echo $Micon;?>"></i>
                      <span><?php echo $Mtitle;?></span>
                    </a>
                  </li><!-- End Dashboard Nav -->
                  <?php  
                }
                if($Mtitle=="Document Tracking"){
                ?>                  
                  <li class="nav-item">
                    <a href="incoming_docs?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='incoming'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                      <i class="ri-download-fill"></i>
                      <span>Incoming &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <span class="badge bg-warning badge-number text-dark incoming_count"></span>
                    </a>
                  </li><!-- Incoming item Nav -->
    
                  <li class="nav-item">
                    <a href="received_docs?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='recieved'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                      <i class="ri-mail-check-line"></i>
                      <span>Received &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <span class="badge bg-success badge-number received_count"></span>
                    </a>
                  </li><!-- recieved item Nav -->
    
                  <li class="nav-item">
                    <a href="outgoing_docs?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='outgoing'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                      <i class="ri-send-plane-line"></i>
                      <span>Outgoing &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <span class="badge bg-danger badge-number outgoing_count"></span>
                    </a>
                  </li><!-- outgoing item Nav -->
    
                  <li class="nav-item">
                    <a href="hold_docs?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='hold'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                      <i class="ri-question-mark"></i>
                      <span>Hold &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <span class="badge bg-primary badge-number hold_count"></span>
                    </a>
                  </li> <!-- hold item Nav -->
    
                  <li class="nav-item">
                    <a href="reject_docs?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='reject'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                      <i class="ri-delete-bin-2-line"></i>
                      <span>Rejected &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <span class="badge bg-dark badge-number reject_count"></span>
                    </a>
                  </li> <!-- hold item Nav -->
    
                  <li class="nav-item">
                    <a href="tracking_docs?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='track'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                      <i class="bi bi-geo"></i>
                      <span>Track Douments</span>
                    </a>
                  </li><!-- tracking item Nav -->
                <?php
                }
                if($Mtitle=="Registrar Clearance"){
                  ?>
                  <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#clearance-students-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-card-checklist"></i><span>Registrar Clearance</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="clearance-students-nav" class="<?php if($col=="clr"){echo "nav-content collapse show";}else{echo "nav-content collapse";}?>
                    " data-bs-parent="#sidebar-nav">
    
                    <li class="nav-heading">Students Clearance</li>
                      <li>
                        <a href="student-clearance-requirements?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='SCR'){echo 'active';}?>">
                          <i class="bi bi-circle"></i><span>Students Requirements</span>
                        </a>
                      </li>
                      <li>
                        <a href="student-clearance-status?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='SCS'){echo 'active';}?>">
                          <i class="bi bi-circle"></i><span>Students Status List</span>
                        </a>
                      </li>
                      <li>
                        <a href="student-clearance-appointment?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='SCA'){echo 'active';}?>">
                          <i class="bi bi-circle"></i><span>Students Appointments</span>
                        </a>
                      </li>
    
                      <li class="nav-heading">Teachers Clearance</li>
                      <li>
                        <a href="teacher-clearance-requirements?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='TCR'){echo 'active';}?>">
                          <i class="bi bi-circle"></i><span>Teachers Requirements</span>
                        </a>
                      </li>
                      <li>
                        <a href="teacher-clearance-status?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='TCS'){echo 'active';}?>">
                          <i class="bi bi-circle"></i><span>Teachers Status List</span>
                        </a>
                      </li>
                      <li>
                        <a href="teacher-clearance-appointment?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='TCA'){echo 'active';}?>">
                          <i class="bi bi-circle"></i><span>Teachers Appointments</span>
                        </a>
                      </li>
                      
                    </ul>
                  </li>
                  <?php
                }
                
                if($Mtitle=="Overall Records"){
                  ?>
                  <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#list-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-person-lines-fill"></i><span>Over All Records</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="list-nav" class="<?php if($col=='list'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
                      <li>
                      <a href="stud_list?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='SL'){echo 'active';}?>">
                        <i class="bi bi-circle"></i><span>Students List</span>
                        </a>
                      </li>
                      <li>
                      <a href="teacher_list?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='TL'){echo 'active';}?>">
                        <i class="bi bi-circle"></i><span>Teachers List</span>
                        </a>
                      </li>
                    </ul>
                  </li><!-- End Reports Nav -->
                  <?php
                }
                
                if($Mtitle=="Reports"){
                  ?>
                  <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-layout-text-window-reverse"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="reports-nav" class="<?php if($col=='reports'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
                      <li>
                      <a href="reports_user?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='UR'){echo 'active';}?>">
                        <i class="bi bi-circle"></i><span>User Reports</span>
                        </a>
                      </li>
                      <li>
                      <a href="reports_docs?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='DR'){echo 'active';}?>">
                        <i class="bi bi-circle"></i><span>Document Reports</span>
                        </a>
                      </li>
                    </ul>
                  </li><!-- End Reports Nav -->
                  <?php
                }
                
                if($Mtitle=="Audit Trail"){
                  ?>
                  <!-- Audit Trail -->
                  <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#audit-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-people"></i><span>Audit Trail</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="audit-nav" class="<?php if($col=='logs'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="logs_admin?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='AdL'){echo 'active';}?>">
                          <i class="bi bi-circle"></i><span>Registrar Admin Logs</span>
                        </a>
                      </li>
                      <li>
                        <a href="logs_approver?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='ApL'){echo 'active';}?>">
                          <i class="bi bi-circle"></i><span>Approver Logs</span>
                        </a>
                      </li>
                      <li>
                        <a href="logs_assistant?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='AL'){echo 'active';}?>">
                          <i class="bi bi-circle"></i><span>Assistant Registrar Logs</span>
                        </a>
                      </li>
                      <li>
                        <a href="logs_admission?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='AdmL'){echo 'active';}?>">
                          <i class="bi bi-circle"></i><span>Admission Logs</span>
                        </a>
                      </li>
                      <li>
                        <a href="logs_ro?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='ROL'){echo 'active';}?>">
                          <i class="bi bi-circle"></i><span>Registrar Officer Logs</span>
                        </a>
                      </li>
                    </ul>
                  </li><!-- End Account Management Nav -->
                  <?php
                }
                
                if($Mtitle=="Settings"){
                  ?>
                  <li class="nav-heading">Settings</li>
    
                    <li class="nav-item">
                      <a href="create_program?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='prog'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                        <i class="bi bi-book"></i>
                        <span>Program</span>
                      </a>
                    </li><!-- End Profile Page Nav -->
    
                    <li class="nav-item">
                      <a href="create_doctype?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='doctT'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                        <i class="bi bi-file-earmark-text"></i>
                        <span>Doc Type</span>
                      </a>
                    </li><!-- End Profile Page Nav -->
    
                    <li class="nav-item">
                      <a href="create_dept?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='department'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                        <i class="bi bi-building"></i>
                        <span>Department</span>
                      </a>
                    </li><!-- End Add office Page Nav -->
    
                    <li class="nav-item">
                      <a href="users-profile?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='PRO'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                      </a>
                    </li><!-- End Profile Page Nav -->
    
                    <li class="nav-item">
                      <a href="FAQ?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='FAQ'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                        <i class="bi bi-question-circle"></i>
                        <span>F.A.Q</span>
                      </a>
                    </li><!-- End Contact Page Nav -->
    
                    <li class="nav-item">
                      <a href="pages-contact?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='contact'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
                        <i class="bi bi-envelope"></i>
                        <span>Direct Email</span>
                      </a>
                    </li><!-- End Contact Page Nav -->
                  <?php
                }   
                    
            }     
              
          }       
                                                   
            ?>     
    </ul>

  </aside>
<!-- End Sidebar-->
<script>
  $(document).ready(function(){
  // feching personal count
  function load_personal(view = '')
  {
    $.ajax({
    url:"badge/personal.php",
    method:"POST",
    data:{view:view},
    dataType:"json",
    success:function(data)
    {
      if(data.unseen_notification > 0)
      {
      $('.personal_count').html(data.unseen_notification);
      }else{
        $('.personal_count').html('0');
      }
    }
    });
  }
  load_personal();
  setInterval(function(){ 
    load_personal();
  }, 5000);

  // feching incoming count
  function load_incoming(view = '')
  {
    $.ajax({
    url:"badge/incoming.php",
    method:"POST",
    data:{view:view},
    dataType:"json",
    success:function(data)
    {
      if(data.unseen_notification > 0)
      {
      $('.incoming_count').html(data.unseen_notification);
      }else{
        $('.incoming_count').html('0');
      }
    }
    });
  }
  load_incoming();
  setInterval(function(){ 
    load_incoming();
  }, 5000);

  // feching Received count
  function load_received(view = '')
  {
    $.ajax({
    url:"badge/received.php",
    method:"POST",
    data:{view:view},
    dataType:"json",
    success:function(data)
    {
      if(data.unseen_notification > 0)
      {
      $('.received_count').html(data.unseen_notification);
      }else{
        $('.received_count').html('0');
      }
    }
    });
  }
  load_received();
  setInterval(function(){ 
    load_received();
  }, 5000);

  // feching Outgoing count
  function load_outgoing(view = '')
  {
    $.ajax({
    url:"badge/outgoing.php",
    method:"POST",
    data:{view:view},
    dataType:"json",
    success:function(data)
    {
      if(data.unseen_notification > 0)
      {
      $('.outgoing_count').html(data.unseen_notification);
      }else{
        $('.outgoing_count').html('0');
      }
    }
    });
  }
  load_outgoing();
  setInterval(function(){ 
    load_outgoing();
  }, 5000);

  // feching Hold count
  function load_hold(view = '')
  {
    $.ajax({
    url:"badge/hold.php",
    method:"POST",
    data:{view:view},
    dataType:"json",
    success:function(data)
    {
      if(data.unseen_notification > 0)
      {
      $('.hold_count').html(data.unseen_notification);
      }else{
        $('.hold_count').html('0');
      }
    }
    });
  }
  load_hold();
  setInterval(function(){ 
    load_hold();
  }, 5000);

  // feching Reject count
  function load_reject(view = '')
  {
    $.ajax({
    url:"badge/reject.php",
    method:"POST",
    data:{view:view},
    dataType:"json",
    success:function(data)
    {
      if(data.unseen_notification > 0)
      {
      $('.reject_count').html(data.unseen_notification);
      }else{
        $('.reject_count').html('0');
      }
    }
    });
  }
  load_reject();
  setInterval(function(){ 
    load_reject();
  }, 5000);
  
  
  });
</script>