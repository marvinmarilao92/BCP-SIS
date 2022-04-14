<?php
include('session.php');
?>
<!DOCTYPE html>
    <html lang="en">
      <!-- Link conncetions -->
      <?php include ("includes/head.php");?> 
  <body>
    <!-- Tooltip Script -->
      <script>
          $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip();   
          });
      </script>
    <!-- Top and side navigation menu -->
    <?php include ("includes/nav.php"); include ("includes/sidebar.php");?>
    <?php $page = 'EI'; include ('includes/sidebar.php');//Design for sidebar?>

    <main id="main" class="main">
            <div class="pagetitle">
              <h1>Employee</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item">Employee</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->
          <section class="section">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="col-lg-12">
                      <div class="form-group col-md-2 btn-lg"  style="float: left; padding:20px;">
                          <h4>List of Employee</h4>
                      </div>
                      <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                        <a href="admin-create.php?id=<?php echo $_SESSION["login_key"];?>" class="btn btn-primary pull-right">Add New User</a>
                      </div> 
                    </div>
                  <div class="card-body">
                    <?php
                          // Include config file
                          require_once "config.php";
                          // Attempt select query execution
                          $sql = "SELECT *, LEFT(middlename,1) as MI FROM user_information WHERE `admin` NOT IN ('1') ORDER BY id_number asc ";
                          if($result = mysqli_query($link, $sql)){
                              if(mysqli_num_rows($result) > 0){
                                  echo '<table class="table datatable">';
                                      echo "<thead>";
                                          echo "<tr>";
                                              echo "<th scope='col'>Employee No.</th>";
                                              echo "<th scope='col'>Full Name</th>";
                                              echo "<th scope='col'>Subsystem</th>";
                                              echo "<th scope='col'>Position</th>";  
                                              echo "<th scope='col'>Department</th>";                     
                                              // echo "<th scope='col'>Action</th>";
                                          echo "</tr>";
                                      echo "</thead>";
                                      echo "<tbody>";
                                      while($row = mysqli_fetch_array($result)){
                                          echo "<tr>";
                                              echo "<td>" . $row['id_number'] . "</td>";
                                              echo "<td WIDTH='40%'>" . $row['firstname'] .' '.$row['MI'].' '. $row['lastname']. "</td>";
                                              echo "<td>" . $row['department'] . "</td>";
                                              echo "<td>" . $row['role'] . "</td>";
                                              echo "<td>" . $row['office'] . "</td>";
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
                                              // echo "<td WIDTH='13%'>";
                                                  // echo '<button class="btn btn-primary viewbtn"><i class="bi bi-eye"></i></button> ';
                                                  // echo '<button class="btn btn-success editbtn"><i class="bi bi-pencil-square"></i></button> ';
                                                  // echo '<button class="btn btn-danger deletebtn" ><i class="bi bi-trash" ></i></button>';
                                              // echo "</td>";
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
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </section>

    </main><!-- End #main -->
    <!-- Footer -->
      <?php include ("includes/footer.php");?>

  </body>

</html>