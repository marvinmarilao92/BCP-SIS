<!DOCTYPE html>

<?php require 'session.php'; ?>
<html lang="en" >

<head>
  
  <title>Bestlink College of the Philippines  </title>
  <?php require 'header.php'; ?>

</head>

<body >

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
      <h1>Logs Report</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin/..">Home</a></li>
          <li class="breadcrumb-item">Reports</li>
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
              <p> <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank"></a>  <code></code> </p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Action</th>
                    <th scope="col">IP Address</th>
                    <th scope="col">Host</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                                  require_once("constant/config.php");
                                  $query="SELECT * FROM audit_logs WHERE `action_name` = 'Internship Administrator' ORDER BY login_time DESC ";
                                  $result=mysqli_query($conn,$query);
                                  while($rs=mysqli_fetch_array($result)){
                                    $id = $rs['account_no']; 
                                    $host = $rs['host']; 
                                    $action = $rs['action'];                        
                                    $ip =$rs['ip'];                                         
                                    $date =$rs['login_time'];
                                                               

                                    $sql1 = "SELECT *, LEFT(middlename,1) as MI FROM user_information WHERE `id_number` = '$id'";
                                        if($result1 = mysqli_query($conn, $sql1)){
                                          if(mysqli_num_rows($result1) > 0){
                                            while($row1 = mysqli_fetch_array($result1)){
                                              $fname = $row1['firstname'];      
                                              $lname =$row1['lastname']; 
                                              $mname = $row1['MI']; 
                                            }
                                            // Free result set
                                            mysqli_free_result($result1);
                                          }
                                        }
                                ?>
                                <tr>                     
                                  <td data-label="Username:"><?php echo $id; ?></td>
                                  <td data-label="Full Name:"><?php echo $fname.' '.$mname.' '.$lname; ?></td>
                                  <td data-label="Dept:"><?php echo $action; ?></td>
                                  <td data-label="Status:"><?php echo $ip; ?></td>
                                  <td data-label="Date:"><?php echo $host?></td> 
                                  <td data-label="Date:"><?php echo $date?></td>                                         
                                </tr>

                                <?php 
                                } ?>
                </tbody>
              </table>
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
<!-- End #main -->