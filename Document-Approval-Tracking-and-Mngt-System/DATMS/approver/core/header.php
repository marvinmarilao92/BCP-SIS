
<!-- ======= Header ======= -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<header id="header" class="header fixed-top d-flex align-items-center">
  <?php 
  // include "key_checker.php";
  ?>
<div class="d-flex align-items-center justify-content-between">
  <a href="index.php?id=<?php echo $_SESSION["login_key"];?>" class="logo d-flex align-items-center">
    <img src="../assets/img/DATMS_logo.png" alt="">
    <span class="d-none d-lg-block">Document Tracking</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">
   
    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" id="viewnotif" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
        <span class="badge bg-primary badge-number count"></span>
      </a><!-- End Notification Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">
          You have <span class="notif"></span> new notifications
          <a data-bs-toggle="modal" data-bs-target="#modalDialogScrollable"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
          <span class="status actiuve"></span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <div style="overflow-y: scroll; height:370px;">
          <li class="notification">
          </li>
        </div>
        
        
        <li class="dropdown-footer">
          <a data-bs-toggle="modal" data-bs-target="#modalDialogScrollable">Show all notifications</a>
        </li>

      </ul>
    </li>
    <!-- End Notification Nav -->

    <!-- <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-chat-left-text"></i>
        <span class="badge bg-success badge-number">3</span>
      </a>

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
        <li class="dropdown-header">
          You have 3 new messages
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="../assets/img/messages-1.jpg" alt="" class="rounded-circle">
            <div>
              <h4>Maria Hudson</h4>
              <p>Message Content Must Be Placed Here...</p>
              <p>4 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="../assets/img/messages-2.jpg" alt="" class="rounded-circle">
            <div>
              <h4>Anna Nelson</h4>
              <p>Message Content Must Be Placed Here...</p>
              <p>6 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="../assets/img/messages-3.jpg" alt="" class="rounded-circle">
            <div>
              <h4>David Muldon</h4>
              <p>Message Content Must Be Placed Here...</p>
              <p>8 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="dropdown-footer">
          <a href="#">Show all messages</a>
        </li>

      </ul>

    </li> -->
    <!-- End Messages Nav -->

    <li class="nav-item dropdown pe-3">
   
      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="../assets/img/BCPlogo.png" alt="Profile" class="rounded-circle">
        <!-- class="rounded-circle" -->
        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $verified_session_firstname . " " . $verified_session_lastname ?></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><?php echo $verified_session_firstname . " " . $verified_session_lastname ?></h6>
          <span><?php echo $verified_session_role?></span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.php?id=<?php echo $_SESSION["login_key"];?>">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li>
          <a class="dropdown-item d-flex align-items-center" href="logs_approver?id=<?php echo $_SESSION["login_key"];?>">
            <i class="bi bi-gear"></i>
            <span>Audit Trail</span>
          </a>
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="pages-faq.php?id=<?php echo $_SESSION["login_key"];?>">
            <i class="bi bi-question-circle"></i>
            <span>Need Help?</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <!-- Adding return nav item for super admin -->
          <?php 
            $output = '';
            $key = $_SESSION["login_key"];
            if(isset($verified_session_department) && ($verified_session_username)){
              switch($verified_session_role){
                case "SuperAdmin":
                    //statement
                    $output .= '
                    <li>
                      <a class="dropdown-item d-flex align-items-center" href="../../../super_admin/index.php?id='.$key.'">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                      </a>
                    </li>    
                  ';
                break;  

                default:
                //statement
                  $output .= '
                    <li>
                      <a class="dropdown-item d-flex align-items-center" href="function/logout.php">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                      </a>
                    </li>    
                  ';
              }
              echo $output;
          }else{
              // header("location:index.php");
          }
          ?>

        

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->
  <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Notifications</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">        
            <div class="card-body">        
              <?php
                require_once("./include/conn.php");
                $query="SELECT * FROM datms_notification WHERE act1 = '$verified_session_firstname $verified_session_lastname' ORDER BY date DESC";
                $result=mysqli_query($conn,$query);
                while($rs=mysqli_fetch_array($result)){
                  date_default_timezone_set("asia/manila");
                  $date = date("Y-m-d H:i:s",strtotime("+0 HOURS"));
                  $d1 = $rs["date"];
                  $doc_status = $rs["subject"];
                  $today = date("Y-m-d",strtotime("+0 HOURS"));
                  $d2 = $date;
                  // Declare and define two dates
                  $date1 = strtotime("$d1");
                  $date2 = strtotime("$d2");

                  // Formulate the Difference between two dates
                  $diff = abs($date2 - $date1);
                
                  // To get the year divide the resultant date into
                  // total seconds in a year (365*60*60*24)
                  $years = floor($diff / (365*60*60*24));
                
                  // To get the month, subtract it with years and
                  // divide the resultant date into
                  // total seconds in a month (30*60*60*24)
                  $months = floor(($diff - $years * 365*60*60*24)
                                                / (30*60*60*24));
                
                  // To get the day, subtract it with years and
                  // months and divide the resultant date into
                  // total seconds in a days (60*60*24)
                  $days = floor(($diff - $years * 365*60*60*24 -
                              $months*30*60*60*24)/ (60*60*24));
                
                  // To get the hour, subtract it with years,
                  // months & seconds and divide the resultant
                  // date into total seconds in a hours (60*60)
                  $hours = floor(($diff - $years * 365*60*60*24
                        - $months*30*60*60*24 - $days*60*60*24)
                                                    / (60*60));
                
                  // To get the minutes, subtract it with years,
                  // months, seconds and hours and divide the
                  // resultant date into total seconds i.e. 60
                  $minutes = floor(($diff - $years * 365*60*60*24
                          - $months*30*60*60*24 - $days*60*60*24
                                            - $hours*60*60)/ 60);
                
                  // To get the minutes, subtract it with years,
                  // months, seconds, hours and minutes
                  $seconds = floor(($diff - $years * 365*60*60*24
                          - $months*30*60*60*24 - $days*60*60*24
                                  - $hours*60*60 - $minutes*60));
                        
                  if($years !=0 ){
                    // Print the result
                    $duration = "$years"." yr,";
                  }else if($months != 0 ){
                    $duration = "$months"." mos";
                  }else if($days > 1 ){
                    $duration = "$days"." days";
                  }else if($days == 1 ){
                    $duration = "$days"." day";
                  }else if($hours > 1){
                    $duration = "$hours"." hrs";
                  }else if($hours == 1){
                    $duration = "$hours"." hr";
                  }else if($minutes != 0 ){
                    $duration = "$minutes"." min";
                  }else if($seconds != 0 ){
                    $duration = "$seconds"." sec";
                  }else if($seconds == 0 ){
                    $duration = "1"." sec";
                  }else{
                    $duration = "2";
                  }

                  if ($doc_status =='Approved Document'){
                    $idenifier='<i class="bi bi-check-circle text-success"></i>';
                  }else if($doc_status =='Rejected Document'){
                    $idenifier=' <i class="bi bi-x-circle text-danger"></i>';
                  }else if($doc_status =='Received Document'){
                    $idenifier=' <i class="bi bi-arrow-down-circle text-primary"></i>';
                  }else if($doc_status =='Submitted Document'){
                    $idenifier=' <i class="bi bi-arrow-right-circle text-warning"></i>';       
                  }else if($doc_status =='Created Document'){
                    $idenifier=' <i class="bi bi-plus-circle text-primary"></i>';       
                  }else{
                    $idenifier=' <i class="bi bi-info-circle text-primary"></i>';
                  }
                  
                  $query_2 = "SELECT * FROM datms_notification WHERE date = '$d1' AND date LIKE '%$today%'";
                  $result_2 = mysqli_query($conn, $query_2);
                  $count1 = mysqli_num_rows($result_2);

                  if($count1!=0){
                    $badge='<span style=" color: green;">●</span>';
                  }else{
                    $badge='<span style=" color: gray;">●</span>';
                  }

                  if ($doc_status =='Approved Document' || $doc_status =='Created Document'){
                    $links='documents_list?id='.$_SESSION["login_key"].'';
                  }else if($doc_status =='Rejected Document'){
                    $links='reject_docs?id='.$_SESSION["login_key"].'';
                  }else if($doc_status =='Received Document'){
                    $links='received_docs?id='.$_SESSION["login_key"].'';
                  }else if($doc_status =='Submitted Document'){
                    $links='incoming_docs?id='.$_SESSION["login_key"].'';       
                  }else{
                    $links='index?id='.$_SESSION["login_key"].'';
                  }
              ?>                       
              <div class="card" style="padding:20px" >
                <h6 style="font-weight: bold;"><a href="<?php echo $links;?>" style="color: black;"><?php echo $rs["subject"]; ?></a></h6>
                <h8><?php echo $rs["notif"]; ?></h8>
                <small><?php echo $duration.' ago '.$badge; ?></small>
              </div>                     
              <?php } ?>
            </div><!-- End sidebar recent posts-->                   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div><!-- End Modal Dialog Scrollable-->
  <!-- for notification -->
  <script>
    $(document).ready(function(){
    
    function load_unseen_notification(view = '')
    {
      $.ajax({
      url:"notif/fetch.php",
      method:"POST",
      data:{view:view},
      dataType:"json",
      success:function(data)
      {
        $('.notification').html(data.notification);
        if(data.unseen_notification > 0)
        {
        $('.count').html(data.unseen_notification);
        }else{
          $('.notif').html('0');
        }
      }
      });
    }
    
    load_unseen_notification();
    
    $(document).on('click', '#viewnotif', function(){
      $('.count').html('');
      load_unseen_notification('yes');
    });
    
    setInterval(function(){ 
      load_unseen_notification();
    }, 5000);
    
    });
  </script>