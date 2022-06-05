<!DOCTYPE html>
<html lang="en">
<?php require 'control/check-session-login.php' ?>
<head>
</head>
  <title>BCP - Officially Enrolled</title>
  <?php require 'drawer/header.php' ?>
</head>

<body>
    <?php require 'drawer/modal.php'?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

   <?php require 'drawer/navbar.php' ?>

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <?php require 'drawer/sidebar.php' ?>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>College Students</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?php echo 'index.php?'.$url;
          ?>>Home</a></li>
          <li class="breadcrumb-item">College</li>
          <li class="breadcrumb-item active">Students</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <p>List of College Students that are Officially Enrolled.</p>
               <?php
                    // Include config file
                    require '../dbCon/config.php';

                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM student_information 
                            WHERE account_status = 'Official' 
                            AND course = 'BSIT'
                            ORDER BY id_number ASC";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
              
             echo '<table class="table datatable">';
                echo "<thead>";
                  echo "<tr>";
                    echo'<th>Student_ID</th>';
                   echo'<th>Name</th>';
                    echo'<th>Program</th>';
                    echo'<th>level</th>';
                    echo'<th>Status</th>';
                    echo'<th>Action</th>';
                    
                 echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                  while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id_number'] . "</td>";
                                        echo "<td>" . $row['firstname'] ." ". $row['lastname']. "</td>";
                                        echo "<td>" . $row['course'] . "</td>";
                                        echo "<td>" . $row['year_level'] . "</td>";
                                        echo "<td>" . $row['account_status'] . "</td>";
                                        echo "<td>";
                                        
                                       
                                        echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ViewModal4"><i class="bi bi-eye"></i>';
                                                                          
                                        
                                        
                                        
                                    
                                    
                                   
                                    
                                
                echo "</td>";
              echo "</tr>";
            }
                echo"</tbody>";
              echo"</table>";
               }
        }
        else{
           echo 'Something Went Wrong !';
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
  <?php require 'drawer/copy.php' ?>

</body>

</html>