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
      <h1>Clearance of <?php echo trim($_GET["name"]); ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="teacher-clearance-status.php">Teachers Clearance Status</a></li>
          <li class="breadcrumb-item">Clearance of <?php echo trim($_GET["name"]); ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <?php 
      $sql = "SELECT * FROM clearance_department_teachers";
      if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_array($result)){
            ?>
            <section class="section">
            <div class="row">
              <div class="col-lg-12">

                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Clearance for <?php echo $row['department_name'] ?></h5>
                    <?php
                      // Attempt select query execution
                      $sql1 = "SELECT * FROM clearance_requirements_teachers where department = '".$row['department_name']."'";
                      if($result1 = mysqli_query($link, $sql1)){
                          if(mysqli_num_rows($result1) > 0){
                            echo '<table id="example" class="table">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>Requirements Name</th>";
                                        echo "<th scope='col'>Status</th>";
                                        echo "<th scope='col'>Date Completed</th>";
                                        echo "<th scope='col'>Remarks</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                            while($row1 = mysqli_fetch_array($result1)){
                              echo "<tr>";
                              echo "<td>" . $row1['clearance_name'] . "</td>";
                              $status = "";
                              $temp_id = $row1['id'];
                              $temp_teacher_id = trim($_GET["id"]);
                              $sql2 = "SELECT * FROM clearance_teacher_status where clearance_requirement_id = '$temp_id' and teacher_id = '$temp_teacher_id' Limit 1";
                              if($result2 = mysqli_query($link, $sql2)){
                                if(mysqli_num_rows($result2) > 0){
                                  while($row2 = mysqli_fetch_array($result2)){
                                    $status = $row2['status'];
                                    $location = $row2['location'];
                                    echo "<td>" . $row2['status'] . "</td>";
                                    echo "<td>" . $row2['date'] . "</td>";
                                    echo "<td>" . $row2['remarks'] . "</td>";
                                  }
                                } else{
                                  $status = 'Pending';
                                  $location = "";
                                    echo "<td>$status</td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                }
                              } else{
                                  echo "Oops! Something went wrong. Please try again later.";
                              }
                              
                              echo "</tr>";
                            }
                                echo "</tbody>";                            
                              echo "</table>";
                          }else{
                              echo '<div class="alert alert-warning"><em>No Clearance Record Added Yet.</em></div>';
                          }
                        }else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <?php

          }
        }else{
        }
      } else{
      }
      // Close connection
      mysqli_close($link);
    ?>

  </main><!-- End #main -->

<?php
include ("includes/footer.php");
?>

</body>

</html>