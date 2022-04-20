<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Registrar Status</title>
<?php include ('core/css-links.php');//css connection?>
<style>
  /*responsive*/
  @media(max-width: 500px){
    .table thead{
      display: none;
    }

    .table, .table tbody, .table tr, .table td{
      display: block;
      width: 100%;
    }
    .table tr{
      background: #ffffff;
      box-shadow: 0 8px 8px -4px lightblue;
      border-radius: 5%;
      margin-bottom:13px;
      margin-top: 13px;
    }
    .table td{
      /* max-width: 20px; */
      padding-left: 50%;
      text-align: right;
      position: relative;
    }
    .table td::before{      
      margin-top: 10px;      
      content: attr(data-label);
      position: absolute;
      left:0;
      width: 50%;
      padding-left:15px;
      font-size:15px;
      font-weight: bold;
      text-align: left;
    }
  }
</style>
<body>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/js/dataTables.checkboxes.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script> -->
  <?php include ('core/header.php');//Design for  Header?>
  <?php $page = 'TCS' ; $col = 'clr'; include ('core/side-nav.php');//Design for sidebar?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Clearance Status of Teachers</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Clearance Status of Teachers</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Teachers</h5>
              <?php
                    $requirements_completed = 0;
                    // Attempt select query execution
                    $sql = "SELECT * FROM teacher_information where account_status = 'Active' ORDER BY id_number";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="example" class="table datatable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>ID Number</th>";
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
                                        $teacher_id = $row['id_number'];
                                        $dept_id = 0;
                                        $sql2 = "SELECT * FROM clearance_department_teachers where department_name = 'Registrar Coordinator'";
                                        if($result2 = mysqli_query($link, $sql2)){
                                          if(mysqli_num_rows($result2) > 0){
                                            while($row2 = mysqli_fetch_array($result2)){
                                              $dept_id = $row2['id'];
                                            }
                                          }
                                        }
                                        $sql1 = "SELECT * FROM clearance_teacher_status where teacher_id = '$teacher_id' and clearance_department_id = $dept_id";
                                        if($result1 = mysqli_query($link, $sql1)){
                                          if(mysqli_num_rows($result1) > 0){
                                            while($row1 = mysqli_fetch_array($result1)){
                                              if($row1['status'] == "Completed"){
                                                $requirements_completed++;
                                              }
                                            }
                                          }
                                        }
                                        $sql1 = "SELECT * FROM clearance_requirements_teachers where department = 'Registrar Coordinator' and status = 'Active'";
                                        if($result1 = mysqli_query($link, $sql1)){
                                          $requirements_total = mysqli_num_rows($result1);
                                        }
                                        $pending = $requirements_total - $requirements_completed;
                                        echo "<td>$pending</td>";
                                        echo "<td>$requirements_completed</td>";
                                        echo "<td>";
                                            echo '<a href="teacher-clearance-view.php?id='. $row['id_number'] .'&name='. $row['firstname'] .' '.$row['lastname'] .'" class="m-1 btn btn-info" title="View Record" data-toggle="tooltip"><span class="bi bi-eye-fill"></span></a>';
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

  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>

</body>

</html>