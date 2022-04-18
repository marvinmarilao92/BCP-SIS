<?php
include('includes/session.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
include ("includes/head.php");
?>

<body>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/js/dataTables.checkboxes.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script>
<?php
include ("includes/nav.php");
$page = 'SCS' ; $col = 'clr'; include ("includes/sidebar.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Clearance Status of Students</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Clearance Status of Students</li>
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
                    $requirements_completed = 0;
                    // Attempt select query execution
                    $sql = "SELECT * FROM student_information where account_status = 'Official' ORDER BY id_number";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="example" class="table datatable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>Student Number</th>";
                                        echo "<th scope='col'>First Name</th>";
                                        echo "<th scope='col'>Last Name</th>";
                                        echo "<th scope='col'>Course</th>";
                                        echo "<th scope='col'>Pending/Under Review</th>";
                                        echo "<th scope='col'>Completed</th>";
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
                                        $requirements_completed = 0;
                                        $student_id = $row['id_number'];
                                        $dept_id = 0;
                                        $sql2 = "SELECT * FROM clearance_department_students where department_name = '$verified_session_role'";
                                        if($result2 = mysqli_query($link, $sql2)){
                                          if(mysqli_num_rows($result2) > 0){
                                            while($row2 = mysqli_fetch_array($result2)){
                                              $dept_id = $row2['id'];
                                            }
                                          }
                                        }
                                        $sql1 = "SELECT * FROM clearance_student_status where student_id = $student_id and clearance_department_id = $dept_id";
                                        if($result1 = mysqli_query($link, $sql1)){
                                          if(mysqli_num_rows($result1) > 0){
                                            while($row1 = mysqli_fetch_array($result1)){
                                              if($row1['status'] == "Completed"){
                                                $requirements_completed++;
                                              }
                                            }
                                          }
                                        }
                                        $sql1 = "SELECT * FROM clearance_requirements_students where department = '$verified_session_role' and status = 'Active'";
                                        if($result1 = mysqli_query($link, $sql1)){
                                          $requirements_total = mysqli_num_rows($result1);
                                        }
                                        $pending = $requirements_total - $requirements_completed;
                                        echo "<td>$pending</td>";
                                        echo "<td>$requirements_completed</td>";
                                        echo "<td>";
                                            echo '<a href="student-clearance-view.php?id='. $row['id_number'] .'&name='. $row['firstname'] .' '.$row['lastname'] .'" class="m-1 btn btn-info" title="View Record" data-toggle="tooltip"><span class="bi bi-eye-fill"></span></a>';
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