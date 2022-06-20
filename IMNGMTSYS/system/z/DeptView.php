<!DOCTYPE html>
<html lang="en">
<?php require 'control/check-session-login.php';
if ($user_online == "true") {
if ($ad_rolee == "Internship Admin" || $ad_rolee == "SuperAdmin") {
}else{
header("location:../");   
}
}else{
header("location:../"); 
}   
?>
<head>
  <?php require 'drawer/header.php' ?> 
  <style>
      

      .dark-mode {
        background-color: black;
        color: white;
      }
  </style>
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
    
     
    <div class="page-title" >
      <aria-label class="display-5" style="font-size: 1.5rem;
                                           font-family: monokai;"><b>Bestlink College of the Philippines</b></aria-label>
    </div><!-- End Page Title -->
    <hr class="my-4">
    <!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <br>
              
          <div class="card">
            <div class="card-body">
              <br>

              <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="bi bi-people"></i>&nbsp; Internship Coordinator</button>
                </li>
                
                
              </ul>
              <br>


              <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">

                 <div class="card">
                    <div class="card-body">
                  
                  <br>

              
              <div class="table-responsive-lg">
               <?php
                    // Include config file
                    require '../dbCon/config.php';

                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM user_information
                            Where role = 'Internship Coordinator'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
              
                echo '<table class="table datatable" style=" font-size: 0.7em;
                                                          ">';
                echo "<thead>";
                echo "<tr>";
                
                echo'<th>ID</th>';
                     echo'<th>Name</th>';
                     echo'<th>Office</th>';
                    echo'<th>Department</th>';
                    echo'<th>Role</th>';
                    echo'<th>Status</th>';
                    echo'<th>Action</th>';
                    
                 echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                  while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        
                                        echo "<td>" . $row['id_number'] . "</td>";
                                        echo "<td>" . $row['firstname'] ." ". $row['lastname']. "</td>";
                                        echo "<td>" . $row['office'] . "</td>";
                                        echo "<td>" . $row['department'] . "</td>";
                                        echo "<td>" . $row['role'] . "</td>";
                                        echo "<td>" . $row['account_status'] . "</td>";
                                        echo "<td>";
                                        
                                       
                                        echo "<a data-id={$row['id_number']} type='button' class='btn btn-primary see' data-bs-toggle='modal' data-bs-target='#verticalycentereddd'><i class='bi bi-eye'></i>
                                         
                                      </a>";
            
                                
                                        echo "</td>";
                                    echo "</tr>";
                  }
                  echo"</tbody>";
                  echo"</table>";
                  }
                  else{

                    echo  "<div class='alert alert-danger' role='alert' >
                                <center>
                                           No Data Found !
                                </center>
                          </div>";


                  }
                }
                else{
                    
                    echo  "<div class='alert alert-danger' role='alert' >
                                <center>
                                           Ops Something went wrong !
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
              

              
              
              
     
            </div>
          </div>
          </div>
          </div>
          <br>
           


          



        </div>

        
      </div>
    </section>




  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <?php require 'drawer/footer.php' ?>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php require 'drawer/js.php' ?> 
  

</body>

</html>