 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">
    <!-- Adding return nav item for super admin -->
    <?php 
          $output = '';
          $key = $_SESSION["login_key"];
          if(isset($verified_session_department) && ($verified_session_username)){
            switch($verified_session_role){
              case "SuperAdmin":
                //statement
                ?>
                 <li class="nav-item">
                  <a href="../../../super_admin/index.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php echo 'nav-link collapsed';?>" >
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
<li class="nav-heading">Module</li>

  <li class="nav-item">
  <a href="index.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='docs'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="ri-book-2-line"></i>
      <span>Documents &nbsp;&nbsp;&nbsp;</span>
      <span class="badge bg-secondary">
         <?php 
            require_once("include/conn.php");
            $query="SELECT * FROM datms_documents WHERE (`doc_actor3`='$verified_session_firstname $verified_session_lastname')";
            $result=mysqli_query($conn,$query);
            if($result){
               echo mysqli_num_rows($result);
              }
        ?> 
      </span>
    </a>
  </li><!-- All docs Nav -->

  <li class="nav-item">
    <a href="incoming_docs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='incoming'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="ri-file-download-line"></i>
      <span>Incoming &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <span class="badge bg-warning text-dark">
      <?php 
            require_once("include/conn.php");
            $query="SELECT * FROM datms_documents WHERE `doc_status` = 'Outgoing' AND (`doc_actor1`='$verified_session_firstname $verified_session_lastname ');";
            $result=mysqli_query($conn,$query);
            if($result){
               echo mysqli_num_rows($result);
              }
        ?> 
      </span>
    </a>
  </li><!-- Incoming item Nav -->

  <li class="nav-item">
    <a href="received_docs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='recieved'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="ri-mail-check-line"></i>
      <span>Received &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <span class="badge bg-success">
                <?php 
            require_once("include/conn.php");
            $query="SELECT * FROM datms_documents WHERE (`doc_status` = 'Created' OR `doc_status` = 'Pending') AND (`doc_actor1`='$verified_session_firstname $verified_session_lastname ');";
            $result=mysqli_query($conn,$query);
            if($result){
               echo mysqli_num_rows($result);
              }
        ?> 
      </span>
    </a>
  </li><!-- recieved item Nav -->

  <li class="nav-item">
    <a href="outgoing_docs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='outgoing'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="ri-send-plane-line"></i>
      <span>Outgoing &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <span class="badge bg-danger">
      <?php 
            require_once("include/conn.php");
            $query="SELECT * FROM datms_documents WHERE `doc_status` = 'Outgoing'  AND (`doc_actor2`='$verified_session_firstname $verified_session_lastname ');";
            $result=mysqli_query($conn,$query);
            if($result){
               echo mysqli_num_rows($result);
              }
        ?> 
      </span>
    </a>
  </li><!-- outgoing item Nav -->

  <li class="nav-item">
    <a href="hold_docs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='hold'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="ri-question-mark"></i>
      <span>Hold &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <span class="badge bg-primary"> <?php 
            require_once("include/conn.php");
            $query="SELECT * FROM datms_documents WHERE `doc_status` = 'Hold'  AND (`doc_actor1`='$verified_session_firstname $verified_session_lastname ')";
            $result=mysqli_query($conn,$query);
            if($result){
               echo mysqli_num_rows($result);
              }
        ?> </span>
    </a>
  </li> <!-- hold item Nav -->

  <li class="nav-item">
    <a href="tracking_docs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='track'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-geo"></i>
      <span>Track Douments</span>
    </a>
  </li><!-- tracking item Nav -->


  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Document Records</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="<?php if($col=='records'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
          <li>
          <a href="approved_docs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='approved'){echo 'active';}?>">
            <i class="bi bi-circle"></i>
            <span>Approved &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
              <span class="badge bg-info">
                <?php 
                    require_once("include/conn.php");
                    $query="SELECT * FROM datms_documents WHERE `doc_status` = 'Approved' AND (`doc_actor2`='$verified_session_firstname $verified_session_lastname ');";
                    $result=mysqli_query($conn,$query);
                    if($result){
                      echo mysqli_num_rows($result);
                      }
                ?> 
              </span>
            </a>
          </li>
          <li>
          <a href="reject_docs.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='reject'){echo 'active';}?>">
            <i class="bi bi-circle"></i>
            <span>Rejected &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
             <span class="badge bg-dark"> <?php 
                  require_once("include/conn.php");
                  $query="SELECT * FROM datms_documents WHERE `doc_status` = 'Rejected' OR `doc_status` = 'Deleted'  AND (`doc_actor2`='$verified_session_firstname $verified_session_lastname ')";
                  $result=mysqli_query($conn,$query);
                  if($result){
                    echo mysqli_num_rows($result);
                    }
              ?> 
              </span>
            </a>
          </li>
        </ul>
      </li><!-- End Reports Nav -->

      <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#list-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person-lines-fill"></i><span>Over All Records</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="list-nav" class="<?php if($col=='list'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
            <li>
            <a href="stud_list.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='SL'){echo 'active';}?>">
              <i class="bi bi-circle"></i><span>Students List</span>
              </a>
            </li>
            <li>
            <a href="teacher_list.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='TL'){echo 'active';}?>">
              <i class="bi bi-circle"></i><span>Teachers List</span>
              </a>
            </li>
          </ul>
        </li><!-- End Reports Nav -->

  <li class="nav-heading">Settings</li>

  <li class="nav-item">
  <a href="users-profile.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='PRO'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a href="FAQ.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='FAQ'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-question-circle"></i>
      <span>F.A.Q</span>
    </a>
  </li><!-- End Contact Page Nav -->

  
  <li class="nav-item">
  <a href="pages-contact.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='contact'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-envelope"></i>
      <span>Contact</span>
    </a>
  </li><!-- End Contact Page Nav -->

</ul>

</aside><!-- End Sidebar-->