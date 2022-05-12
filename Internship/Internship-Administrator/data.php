<!DOCTYPE html>

<?php require 'session.php'; ?>
<html lang="en" >

<head>
  
  <title>Bestlink College of the Philippines  </title>
  <?php require 'header.php'; ?>

</head>

<body >
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Account </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="include/update-account.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        
                        <div class="form-group">
                            <label> Status </label>
                            <input type="text" name="status" id="status" class="form-control"
                                placeholder="Status">
                        </div>
                       


                    </div>
                    <div class="modal-footer">
                        
                        <button type="submit" name="update" class="btn btn-primary">GET STUDENT</button>
                    </div>
                
                  </form>
            </div>
          
          </div>
    </div>
  <!-- ======= Header ======= -->
  <?php require 'nav.php'; ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar" >

    <?php require 'sidebar.php'; ?>


    <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="bi bi-exclamation-circle-fill" style="width:10px;"></i>Fair Warning</h5>
              <div class="no-overflow"><p><b>PROSECUTION</b>: Under Philippine law (Republic Act No. 8293), copyright infringement is punishable by the following: Imprisonment of between 1 to 3 years and a fine of between 50,000 to 150,000 pesos for the first offense. Imprisonment of 3 years and 1 day to six years plus a fine of between 150,000 to 500,000 pesos for the second offense.</p><p><b>COURSE OF ACTION</b>: Whoever has maliciously uploaded these concerned materials are hereby given an ultimatum to take it down within 24-hours. Beyond the 24-hour grace period, our Legal Department shall initiate the proceedings in coordination with the National Bureau of Investigation for IP Address tracking, account owner identification, and filing of cases for prosecution.</p></div>
            <div class="footer"></div>
            </div>
          </div>
  </aside>
  <main id="main" class="main">

<div class="pagetitle">
  <h1>Account Approval</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/..">Home</a></li>
      <li class="breadcrumb-item">Account</li>
      <li class="breadcrumb-item active">list</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <p> <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank"></a>  <code></code> </p>

          <!-- Table with stripped rows -->
          <?php
                // Include config file
                include_once 'constant/config.php';
                
                // Attempt select query execution
                $sql = "SELECT *from ims_user_accounts";
                if($result = mysqli_query($conn, $sql)){
                    if(mysqli_num_rows($result) > 0){
                      
        echo'<table class="table datatable">';
            echo"<thead>";
              echo"<tr>";
                
                echo "<th>Email</th>";
                echo "<th>Username</th>";
                echo "<th>Password</th>";
                echo "<th>Status</th>";
                echo "<th style>Action</th>";
              echo "</tr>";
          echo "</thead>";
            echo "<tbody>";
            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                   
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['username'] . "</td>";
                                    echo "<td>" . $row['password'] . "</td>";
                                    echo "<td>" . $row['u_status'] . "</td>";
                                    echo "<td>";
                                    echo'<button class="btn btn-info " data-bs-toggle="modal" data-bs-target="#ExtralargeModal"><i class="bi bi-person" style=""></i></button>';
                                    echo '<button class="btn btn-danger dropbtn" title="Drop Student"><i class="bi bi-trash-fill"></i></button>';    
                                
                              
            echo "</td>";
          echo "</tr>";
        }
        echo "</tbody>";                            
        echo "</table>";
      }
      }
        ?>

          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>

</main>



  <?php require 'footer.php'; ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php require 'js.php'; ?>

</body>
  

</html>