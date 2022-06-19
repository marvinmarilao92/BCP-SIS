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
  <title>BCP | Preview</title>
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
                  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="bi bi-people"></i>&nbsp; Enrolled Students</button>
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
                    $sql = "SELECT * FROM student_information
                            ";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
              
                echo '<table class="table datatable" style=" font-size: 0.7em;
                                                          ">';
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
           <div class="card" >
            <div class="card-body">
              <br>

          <div class="card">
            <div class="card-body">
              <br>

              <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-homeE" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="bi bi-people"></i>&nbsp;Registered</button>
                </li>
                
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><i class="bi bi-person"></i>&nbsp;Approved</button>
                </li>

                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-em" type="button" role="tab" aria-controls="contact" aria-selected="false"><i class="bi bi-trash"></i>&nbsp;Rejected</button>
                </li>
              </ul>
              <br>


              <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                <div class="tab-pane fade show active" id="bordered-justified-homeE" role="tabpanel" aria-labelledby="home-tab">

                 <div class="card">
                    <div class="card-body">
             
              <br>
              
              <div class="table-responsive-lg">
              <table class="table datatable" style="font-size: 0.7em;
                                                          ">
                <thead>
                  <tr>
                   
                    <th scope="col">Representative | Trainor</th>
                    <th scope="col">Company</th>
                    <th scope="col">Department</th>
                    <th scope="col">Location</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                  <!--<tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>-->
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>








            </div>
          </div>

                </div>
                




                <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="card">
                    <div class="card-body">
             
              <br>
              
              <div class="table-responsive-lg">
              <table class="table datatable" style="font-size: 0.7em;
                                                          ">
                <thead>
                  <tr>
                   
                    <th scope="col">Fullname |Trainee</th>
                    <th scope="col">Course</th>
                    <th scope="col">Department</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                  <!--<tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>-->
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>








            </div>
          </div>
                </div>


                      <div class="tab-pane fade" id="bordered-justified-em" role="tabpanel" aria-labelledby="contact-tab">


                          <div class="card">
                    <div class="card-body">
             
              <br>
              
              <div class="table-responsive-lg">
              <table class="table datatable" style="font-size: 0.7em;
                                                          ">
                <thead>
                  <tr>
                   
                    <th scope="col">Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Position</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                  <!--<tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>-->
                </tbody>
              </table>
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