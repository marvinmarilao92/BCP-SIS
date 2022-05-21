<!DOCTYPE html>
<html lang="en">
<?php require 'control/check-login-session.php' ?>
<head>
 

  <title> BCP - Approved Data </title>
    

  <?php require 'drawer/header.php'  ?>


</head>

<body>
    <?php require 'drawer/modal.php' ?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <?php require 'drawer/navbar.php' ?>

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <?php require 'drawer/sidebar.php' ?>
    <div class="card">

            <div class="card-body">
              <h5 class="card-title"><i class="bi bi-exclamation-circle-fill" style="width:10px;"></i>&nbsp;Fair Warning</h5>
              <div class="no-overflow"><p><b>PROSECUTION</b>: Under Philippine law (Republic Act No. 8293), copyright infringement is punishable by the following: Imprisonment of between 1 to 3 years and a fine of between 50,000 to 150,000 pesos for the first offense. Imprisonment of 3 years and 1 day to six years plus a fine of between 150,000 to 500,000 pesos for the second offense.</p><p><b>COURSE OF ACTION</b>: Whoever has maliciously uploaded these concerned materials are hereby given an ultimatum to take it down within 24-hours. Beyond the 24-hour grace period, our Legal Department shall initiate the proceedings in coordination with the National Bureau of Investigation for IP Address tracking, account owner identification, and filing of cases for prosecution.</p></div>
            <div class="footer"></div>
            </div>
          </div>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Transaction History</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="DEPARTMENT-COORDINATOR-PANEL/..">Home</a></li>
          <li class="breadcrumb-item">Approved</li>
          <li class="breadcrumb-item active">Accounts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
        
          
            <div class="card-body">
              
              <p></p>

              <!-- Table with stripped rows -->
              <?php
                    // Include config file
                    include_once 'auth/config.php';
                    $s = 'Approved';
                    // Attempt select query execution
                    $sql = "SELECT * FROM ims_company_account
                            where status = 's' ";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                echo'<table class="table datatable">';
                echo"<thead>";
                  echo"<tr>";
                    echo "<th>Company Name</th>";
                    echo "<th>Email</th>";
                    echo "<th>Status</th>";
                    echo "<th>Reason</th>";
                  echo "</tr>";
                 echo "</thead>";
                echo "<tbody>";
                while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['company'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['reason'] . "</td>";                       
                echo "<td>";
                                        
                                    
                                    
                                    
                                    
                                
                                
                                    
                echo "</td>";
              echo "</tr>";}
               echo "</tbody>";                            
            echo "</table>";
          }
        }else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close connection
        mysqli_close($conn);






            ?>
              <!-- End Table with stripped rows -->

            </div>
          

        </div>
      </div>
    </section>

  </main>
  <!-- ======= Footer ======= -->
  
    <?php require 'drawer/footer.php'  ?>
  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
   <?php require 'drawer/js.php' ?>
   
        
</body>

</html>