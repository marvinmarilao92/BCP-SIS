<!DOCTYPE html>
<html lang="en">
<?php require 'control/check-session-login.php';


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
  <title>BCP - Pending</title>
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
            <div class="card-body" style="font-size: 0.8em;">
              <br>
                <div class="card">  
                  <div class="card-body">
                     
              <h5 class="card-title"></h5>
              <p>List of Students that Status is Pending.</p>
              
               <?php
                    // Include config file
                    require '../dbCon/config.php';

                    $f = 'Pending';
                    // Attempt select query execution
                      $sql = "SELECT * FROM `ims_apply_info`
                      INNER JOIN user_information
                      ON
                      user_information.office = ims_apply_info.s_course
                      INNER JOIN ims_stud_files
                      ON 
                      ims_stud_files.id = ims_apply_info.i_id
                      WHERE
                      user_information.department  = '$verified_session_department'
                      AND
                      ims_apply_info.s_course = '$course'
                      AND
                      ims_apply_info.status = 'Pending'
                    ORDER BY `id_number` ASC";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                
             echo '<table class="table datatable" style=" font-size: 0.7em;
                                                          ">';
                echo "<thead style='background-color: skyblue;'>";
                  echo "<tr>";
                    echo '<th hidden>ID</th>';
                    echo'<th>Student_ID</th>';
                   echo'<th>Fullname</th>';
                   echo'<th>Courses</th>';
                    echo'<th>Status</th>';

                    echo'<th>Action</th>';
                    
                 echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                  while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td hidden>" .$row['id']. "</td>";
                                        echo "<td>" . $row['s_number'] . "</td>";
                                        echo "<td>" . $row['fname'] ." ".$row['mname']." ". $row['sname']. "</td>";
                                        echo "<td>" . $row['office'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo "<td>";
                                        
                                         
                                       echo '<button type="button" class="btn btn-primary tud" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil"></i></button>&nbsp;';

                                         echo "<a type='button' class='btn btn-secondary' href='constant/get_file_stud.php?id={$row['id']}'><i class='bi bi-download'></i></a>&nbsp;";  

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

            $('.tud').on('click', function () {

                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#update_id').val(data[0]);
                $('#number').val(data[1]);
                $('#name').val(data[2]);
                $('#course').val(data[3])
                $('#status').val(data[4]);
              
            });
        });

    </script>
     

    <?php require 'drawer/copy.php' ?>
</body>
</html>
