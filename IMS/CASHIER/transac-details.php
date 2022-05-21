<!DOCTYPE html>
<html lang="en">
<?php require 'control/check-login-session.php' ?>
<head>
 

  <title> BCP - Transaction </title>
    

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
              <h5 class="card-title"><i class="bi bi-exclamation-circle-fill" style="width:10px;"></i>Fair Warning</h5>
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
          <li class="breadcrumb-item"><a href="CASHIER/..">Home</a></li>
          <li class="breadcrumb-item">Transaction</li>
          <li class="breadcrumb-item active">History</li>
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
                    include_once 'constrait/config.php';
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM ims_dummy_cashier_transc";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                echo'<table class="table datatable">';
                echo"<thead>";
                  echo"<tr>";
                    echo "<th>Ref NO.</th>";
                    echo "<th>PayID</th>";
                    echo "<th>Pay</th>";
                    echo "<th>Description</th>";
                    echo "<th>Amount</th>";
                    echo "<th>Date | Time</th>";
                    echo "<th>Remarks</th>";
                    echo "<th colspan='3'><center>Action</center></th>";
                  echo "</tr>";
                 echo "</thead>";
                echo "<tbody>";
                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['py_ref_no'] . "</td>";

                                        echo "<td>" . $row['s_id'] . "</td>";
                                        echo "<td>" . $row['s_name'] . "</td>";
                                        echo "<td>" . $row['p_desc'] . "</td>";
                                        echo "<td>" . $row['p_amount'] . "</td>";
                                        echo "<td>" . $row['p_date'] . "</td>";
                                        echo "<td>" . $row['p_remarks'] . "</td>";
                                        echo "<td>";
                                        
                                    
                                    echo '<i type = button class="ri-user-fill viewbtn" data-bs-toggle="modal" data-bs-target="#paymentModal"> </i>';
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
  <footer id="footer" class="footer">
    <?php require 'drawer/footer.php'  ?>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
   <?php require 'drawer/js.php' ?>
   
   <?php require 'drawer/jss.php' ?>
</body>

</html>