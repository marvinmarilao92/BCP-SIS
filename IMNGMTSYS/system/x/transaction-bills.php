<!DOCTYPE html>
<html lang="en">
<?php require 'control/check-session-login.php';
    if ($user_online == "true") {
if ($role == "Student") {
}else{
header("location:../");   
}
}else{
header("location:../"); 
}   

?>
<head>
    <?php require 'drawer/header.php' ?>
    <title>BCP - Homepage</title>
</head>

<body>
  <?php require 'drawer/modal.php' ?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <!-- End Icons Navigation -->
    <?php require'drawer/navbar.php' ?>

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

   <?php require 'drawer/sidebar.php' ?>

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
                    require '../dbCon/config.php';
                  
                    // Attempt select query execution
                    $sql = "SELECT * FROM `ims_dummy_cashier_transc`
                    where s_id = '$num'
                    ORDER BY p_date DESC ";


                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                        echo'<table class="table datatable">';
                        echo"<thead>";
                       echo"<tr>";
                    echo "<th>Ref NO.</th>";
                    echo "<th>Payee</th>";
                    echo "<th>Payment For</th>";
                    echo "<th>Amount</th>";
                    echo "<th>Date | Time</th>";
                   
                    echo "<th colspan='3'><center>Remarks</center></th>";
                  echo "</tr>";
                 echo "</thead>";
                echo "<tbody>";
                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['py_ref_no'] . "</td>";

                                        echo "<td>" . $row['py_payee'] . "</td>";
                                        echo "<td>" . $row['p_desc'] . "</td>";
                                        echo "<td>" . $row['p_amount'] . "</td>";
                                        echo "<td>" . $row['p_date'] . "</td>";
                                        echo "<td>" . $row['p_remarks'] . "</td>";
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


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
   <?php require 'drawer/footer.php' ?>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  
   <?php require 'drawer/js.php' ?>

   <?php require 'drawer/jss.php' ?>
</body>

</html>