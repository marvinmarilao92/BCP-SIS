<!DOCTYPE html>
<html lang="en">
<?php require 'control/check-session-login.php';
if ($user_online == "true") {
if ($ad_rolee == "Admin") {
}else{
header("location:../");   
}
}else{
header("location:../"); 
}   
?>
<head>
  <?php require 'drawer/header.php' ?>
</head>

<body>
  <?php require 'drawer/modal.php'  ?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">


    <?php require 'drawer/navbar.php'?>
    <!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <?php require 'drawer/sidebar.php' ?>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Audit Trail Logs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Audit Trail</li>
          <li class="breadcrumb-item active">logs</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>
              <?php
                    // Include config file
                    require '../dbCon/config.php';
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM internship_audit_trail ORDER BY date DESC";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
              
             echo '<table class="table datatable">';
                echo "<thead>";
                  echo "<tr>";
                    echo'<th scope="col">Users_id</th>';
                   echo'<th scope="col">Affected Users</th>';
                    echo'<th scope="col">Role</th>';
                    echo'<th scope="col">Action</th>';
                    echo'<th scope="col">Date</th>';
                 echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                  while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['user'] . "</td>";
                                        echo "<td>" . $row['role'] . "</td>";
                                        echo "<td>" . $row['action'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td>";
                                        
                                    
                                    
                                   
                                    
                                
                echo "</td>";
              echo "</tr>";
            }
                echo"</tbody>";
              echo"</table>";
               }
        }
            ?>
              <!-- End Table with stripped rows -->

            </div>
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

</body>

</html>