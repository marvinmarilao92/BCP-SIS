<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
include ("includes/head.php");
?>

<body>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script>

<?php
include ("includes/nav.php");
include ("includes/sidebar.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Students</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Students</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Students</h5>
              <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM student_information where account_status = 'Active' ORDER BY id_number";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table datatable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>Student Number</th>";
                                        echo "<th scope='col'>First Name</th>";
                                        echo "<th scope='col'>Last Name</th>";
                                        echo "<th scope='col'>Course</th>";
                                        echo "<th scope='col'>Year Level</th>";
                                        echo "<th scope='col'>Section</th>";
                                        echo "<th scope='col'>Last Access</th>";
                                        echo "<th scope='col'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id_number'] . "</td>";
                                        echo "<td>" . $row['firstname'] . "</td>";
                                        echo "<td>" . $row['lastname'] . "</td>";
                                        echo "<td>" . $row['course'] . "</td>";
                                        echo "<td>" . $row['year_level'] . "</td>";
                                        echo "<td>" . $row['section'] . "</td>";
                                        $sql1 = "SELECT * FROM users WHERE id_number = " . $row['id_number'] . " ";
                                        if($result1 = mysqli_query($link, $sql1)){
                                          if(mysqli_num_rows($result1) > 0){
                                            while($row1 = mysqli_fetch_array($result1)){
                                              echo "<td>" . $row1['last_access'] . "</td>";
                                            }
                                            // Free result set
                                            mysqli_free_result($result1);
                                          }
                                        }
                                        echo "<td>";
                                            echo '<a href="student/read.php?id='. $row['id_number'] .'" class="m-1 btn btn-info" title="View Record" data-toggle="tooltip"><span class="bi bi-eye-fill"></span></a>';
                                            echo '<a href="student/update.php?id='. $row['id_number'] .'" class="m-1 btn btn-warning" title="Update Record" data-toggle="tooltip"><span class="bi bi-pencil-fill"></span></a>';
                                            echo '<a href="student/archive.php?id='. $row['id_number'] .'" class="m-1 btn btn-danger" title="Archive Record" data-toggle="tooltip"><span class="bi bi-archive-fill"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-warning"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    // Close connection
                    mysqli_close($link);
                    ?>

            </div>
            <div class="container-fluid">
              <div class="row mb-4">
                <div class="col-md-10">
                </div>
                <div class="col-md-2">
                  <a href="student-create.php" class="btn btn-success pull-right">Add New Student</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>


  </main><!-- End #main -->

<?php
include ("includes/footer.php");
?>

</body>

</html>