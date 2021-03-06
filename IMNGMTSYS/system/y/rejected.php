<!DOCTYPE html>
<html lang="en">
<?php 
require 'control/check-session-login.php';
  if ($user_online == "true") {
    if ($rolee == "Internship Coordinator" || $rolee == "SuperAdmin") {
    }else{
   header("location:../");   
    }
   }else{
  header("location:../"); 
  }  
 
  ?>
<head>
  

  <title> BCP - Rejected Accounts </title>

  <?php require 'drawer/header.php' ?>

</head>

<body>
    <?php require 'drawer/modal.php' ?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">


    <?php require 'drawer/navbar.php' ?>
    <!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <?php require 'drawer/sidebar.php' ?>

  </aside><!-- End Sidebar-->

 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Rejected Accounts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?php echo'index.php?'.$url;
          ?>>Home</a></li>
          <li class="breadcrumb-item">Rejected</li>
          <li class="breadcrumb-item active">Accounts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
             
              <br>
              <br>
              <div class="table-responsive-lg">
               <?php
                    // Include config file
                    require '../dbCon/config.php';

                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM `ims_company_regis`
                    INNER JOIN ims_department_information
                    ON
                    ims_department_information.id = ims_company_regis.id
                    INNER JOIN ims_files
                    ON 
                    ims_files.uid = ims_company_regis.id
                    WHERE
                    ims_company_regis.c_status = 'Rejected'
                    ORDER BY `datee` desc";
                    
                    if($result = mysqli_query($conn, $sql)){
                                               
                      if(mysqli_num_rows($result) > 0){
                        
             echo '<table class="table datatable" style=" font-size: 0.7em;
                                                         " >';
                echo "<thead style='background-color: skyblue;'>";
                  echo "<tr>";
                  echo'<th hidden>ID</th>'; 
                    echo'<th>Company_ID</th>';
                    echo'<th>Company</th>';
                   echo'<th colspan=2>Representative Name</th>';
                   echo'<th>Company Address</th>';
                   echo'<th>Contact</th>';
                   
                   echo'<th>Date Registered</th>';
                   
                   
                    echo'<th>Status</th>';  
                    echo'<th>Reason</th>';
                    echo'<th>Action</th>';

                    
                 echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                  while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td hidden>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['id_number'] . "</td>";
                                        echo "<td>" . $row['c_name'] . "</td>";
                                        echo "<td colspan = 2 >" . $row['repre_name'] ."</td>";
                                        echo "<td>" .$row['c_email'] . "</td>";
                                        echo "<td>" .$row['contact'] . "</td>";;
                                        echo "<td>" . $row['datee']  . "</td>";
                                         
                                          
                                        echo "<td>" . $row['c_status']  . "</td>";
                                        echo "<td>" . $row['reason']  . "</td>";
                                        echo "<td>";
                                        
                                       
                                        echo '<button type="button" class="btn btn-primary editt" data-bs-toggle="modal" data-bs-target="#edit"><i class="bi bi-pencil"></i></button>&nbsp;';

                                         echo "<a type='button' class='btn btn-secondary' href='constant/get_file.php?id={$row['id']}'><i class='bi bi-download'></i></a>&nbsp;";  

                                          
             
                echo "</td>";
              echo "</tr>";
            }
                echo"</tbody>";
              echo"</table>";
               }
        }
       else{
           echo  "<div class='alert alert-danger' role='alert' >
                                <center>
                                           No Data Found !
                                </center>
                          </div>";

        }
            ?>
              <!-- End Table with stripped rows -->
            </div>
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
  <?php require'drawer/js.php' ?>
  <?php require 'drawer/copy.php' ?>
  
  
</body>

</html> 





