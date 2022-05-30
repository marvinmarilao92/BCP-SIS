<!DOCTYPE html>
<html lang="en">
<?php require 'control/check-session-login.php' ?>
<head>
</head>
  <title>BCP - Officially Qualified</title>
  <?php require 'drawer/header.php' ?>
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
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Pending Students</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?php echo 'href=index.php?'.$url;
          ?>>Home</a></li>
          <li class="breadcrumb-item">Pending</li>
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
              <p>List of IT Students that Status are Pending.</p>
              
               <?php
                    // Include config file
                    require '../dbCon/config.php';

                    
                    // Attempt select query execution
                    $sql = "SELECT
                    *FROM student_information
                                                        INNER JOIN ims_studcreen_status
                                                        ON 
                                                        ims_studcreen_status.sid = student_information.id
                                                        WHERE 
                                                        student_information.course = 'BSIT'
                                                        AND
                                                        ims_studcreen_status.s_status ='Pending'
                                                        ORDER BY `id_number` ASC";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
              
             echo '<table class="table datatable">';
                echo "<thead>";
                  echo "<tr>";
                  echo'<th>ID</th>'; 
                    echo'<th>Student_ID</th>';
                   echo'<th>Name</th>';
                    echo'<th>Status</th>';
                    echo'<th>Action</th>';
                    
                 echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                  while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['s_number'] . "</td>";
                                        echo "<td>" . $row['firstname'] ." ". $row['lastname']. "</td>";

                                        echo "<td>" . $row['s_status'] . "</td>";
                                        echo "<td>";
                                        
                                       
                                        echo '<button type="button" class="btn btn-primary edit" data-bs-toggle="modal" data-bs-target="#edit"><i class="bi bi-pencil"></i>';
                                                                          
                                        
                                        
                                        
                                    
                                    
                                   
                                    
                                
                echo "</td>";
              echo "</tr>";
            }
                echo"</tbody>";
              echo"</table>";
               }
        }
        else{
           echo 'No Data Found !';
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
        $(document).ready(function () {

            $('.edit').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#update_id').val(data[0]);
                $('#number').val(data[1]);
                $('#name').val(data[2]);
                $('#status').val(data[3 ]);
                

            });
        });
    </script>
</body>

</html>
