<?php
include('includes/session.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
include ("includes/head.php");
?>

<body>

<?php
include ("includes/nav.php");
include ("includes/sidebar.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Clearance Departments</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Clearance Departments</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Departments</h5>
              <?php
                    // Attempt select query execution
                    $sql = "SELECT * FROM roles where department_id = 4 and role != 'Clearance Administrator' ORDER BY role ASC";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="example" class="table datatable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>Department Name</th>";
                                        echo "<th scope='col'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['role'] . "</td>";
                                        echo "<td>";
                                            $sql1 = "SELECT * FROM clearance_department_students WHERE department_name = '" . $row['role'] . "'";
                                            if($result1 = mysqli_query($link, $sql1)){
                                              if(mysqli_num_rows($result1) > 0){
                                                while($row1 = mysqli_fetch_array($result1)){
                                                  if($row['role'] == $row1['department_name']){
                                                    echo '<a href="remove-to-student.php?name='. $row['role'] .'" class="p-1 bg-danger text-white" style="border-radius:5px;">Remove to Students</a>';
                                                  }
                                                }
                                              }else{
                                                echo '<a href="connect-to-student.php?name='. $row['role'] .'" class="p-1 bg-success text-white" style="border-radius:5px;">Connect to Students</a>';
                                              }
                                            }

                                            $sql2 = "SELECT * FROM clearance_department_teachers WHERE department_name = '" . $row['role'] . "'";
                                            if($result2 = mysqli_query($link, $sql2)){
                                              if(mysqli_num_rows($result2) > 0){
                                                while($row2 = mysqli_fetch_array($result2)){
                                                  if($row['role'] == $row2['department_name']){
                                                    echo '&nbsp;&nbsp;<a href="remove-to-teachers.php?name='. $row['role'] .'" class="p-1 bg-danger text-white" style="border-radius:5px;">Remove to Teachers</a>';
                                                  }
                                                }
                                              }else{
                                                echo '&nbsp;&nbsp;<a href="connect-to-teachers.php?name='. $row['role'] .'" class="p-1 bg-success text-white" style="border-radius:5px;">Connect to Teachers</a>';
                                              }
                                            }
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