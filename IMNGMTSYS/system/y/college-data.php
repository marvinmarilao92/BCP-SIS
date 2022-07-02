<!DOCTYPE html>
<html lang="en">
<?php require 'control/check-session-login.php' ;



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
            <div class="card-body" style="font-size: 0.8em;">
              <br>
              <br>
              <div class="card">
                

                <div class="card-body" style="font-size: 0.8em;">
              <h5 class="card-title"></h5>
              
              <p>List of College Students that are Officially Enrolled.</p>
               <?php
                    // Include config file
                    require '../dbCon/config.php';

                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM student_information
                            WHERE 
                            course = '$course'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
              
                echo '<table class=" table table-striped datatable">';
                echo "<thead style='background-color: skyblue'>";
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
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <?php require 'drawer/footer.php' ?>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php require 'drawer/js.php' ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <?php require 'drawer/copy.php' ?>


 <script>
      $(document).ready(function(){
                $('.see').click(function(){
                  var userid = $(this).data('id');  
                   console.log(userid);
                     $.ajax({
                        url: 'constant/sss.php',
                        type: 'POST',
                        data: {userid: userid},
                        success: function(response){ 
                            
                            $('.viedd').html(response); 
                            $('#verticalycentereddd').modal('show'); 
                        }
                    });
                }); 
            });

    </script>




</body>

</html>