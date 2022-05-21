<?php

include "includes/session.php";

?>
  <!DOCTYPE html>
   <html lang="en">
   <title>Search result</title>
   <head>
   <?php $page = 'faqs'; include ('includes/head.php');//css connection?>
   </head>
   
   <body>
       


<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="#" class="logo d-flex align-items-center">
    <img src="../assets/img/BCPlogo.png" alt="">
    <span class="d-none d-lg-block">Student Module</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->


<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="../assets/img/BCPlogo.png" alt="Profile" class="rounded-circle">
        <!-- <i class="rounded-circle bi bi-person-circle"></i> -->
        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $verified_session_lastname . ", " . $verified_session_firstname ?></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><?php echo $verified_session_lastname . ", " . $verified_session_firstname ?></h6>
          <span><?php echo $_SESSION['session_department'] ?></span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="student-profile.php">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-gear"></i>
            <span>Account Settings</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li> 
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-question-circle"></i>
            <span>Need Help?</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="includes/logout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->
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
<a href="new_ticket.php?id=<?php echo $_SESSION["login_key"];?>" class="<?php if($page=='ticket'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
    <i class="bi bi-envelope"></i>
      <span>Contact Us</span>
 </a>

  </li>
  <li class="nav-item">
<a data-bs-toggle="modal" data-bs-target="#verticalycentered" class="<?php if($page=='ticket'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
    <i class="bi bi-envelope"></i>
      <span>Inbox</span>
 </a>

  </li>


 

</ul>





</aside><!-- End Sidebar-->
  

  <main id="main" class="main">
  <div class="pagetitle">
      <h1>Search results</h1>
      
    </div>
    <?php
    
   
    
      //check if any input 
    if( isset($_GET['k']) && $_GET['k'] != '' ) {
      
     
      $k = trim($_GET['k']);

        $k = mysqli_real_escape_string($link, $_GET['k']);
        $sql = "SELECT * FROM hd_department WHERE title LIKE '%$k%' OR shortDesc LIKE '%$k%'
         OR longDesc LIKE '%$k%'";
         
         $result = mysqli_query($link, $sql);
         $queryResult = mysqli_num_rows($result);
     

         echo "There are " .$queryResult. " result! <br><br>";
      
         if ($queryResult >0) {
            while($row = mysqli_fetch_assoc($result)) {
                $title = $row['title'];
                $longDesc = $row['longDesc'];
                $shortDesc = $row['shortDesc'];
                echo "
                <a href = 'article.php?title=".$row['title']."&shortDesc=".$row['shortDesc']."'>
                <div class='style'>
                <h2>".$row['title']."</h2>
                <h6>Read More <span class='text-danger'>&rarr;</span></h6>
                </div>";
                ?>

<style>
 .style{
   
    margin-bottom: 1rem;
    padding: 1.5rem 1rem;
    color: #555;
   
   
  }
  h2 {
    font-size: 30px;
    font-weight: 500;
  }
  h3 {
    font-size: 17px;
    margin-bottom: 1rem;
    margin-top: 1rem;
  }
  p {
    font-size: 20px;
  }
  

     </style>
 
                    <?php
            }
         }else {
             echo "<section class='section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center'>
             <h2>Opps we can't find your search!<br>try searching common question. </h2>
             <img src='../assets/img/not-found.svg' class='img-fluid py-5' alt='Page Not Found'></section> ";
            
             
         }
         
    }
    ?>
     <p> <a href="pages-faq.php?id=<?php echo $_SESSION["login_key"];?>"><span class="badge bg-primary"><i class="ri-reply-all-fill"></i>Back</span></a></p>
    

    
    
    

  </main><!-- End #main -->

  
 <!-- ======= Footer ======= -->

 <?php include 'includes/footer.php'?>


  </body>
</html>