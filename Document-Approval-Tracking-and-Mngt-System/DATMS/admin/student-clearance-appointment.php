<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Registrar Appointment</title>
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

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'SCA' ; $col = 'clr'; include ('core/side-nav.php');//Design for sidebar?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Registrar Appointments for Students</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Registrar Appointments for Students</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Students' Registrar Appointments </h5>
              <?php
                    $temp_name = "";
                    // Attempt select query execution
                    $sql = "SELECT * FROM clearance_student_appointment where department = 'Registrar Coordinator'";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="example" class="table datatable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>Student ID</th>";
                                        echo "<th scope='col'>Name</th>";
                                        echo "<th scope='col'>Program</th>";
                                        echo "<th scope='col'>Year Level</th>";
                                        echo "<th scope='col'>Appointment Date</th>";
                                        echo "<th scope='col'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    $sql1 = "SELECT *,LEFT(middlename,1) AS MI FROM student_information where id_number = '" . $row['student_id'] ."'";
                                    if($result1 = mysqli_query($link, $sql1)){
                                      if(mysqli_num_rows($result1) > 0){
                                        while($row1 = mysqli_fetch_array($result1)){
                                          $temp_name = $row1['firstname'] . " " . $row1['lastname'];
                                          echo "<td data-label='Stud No.:'>" . $row1['id_number'] . "</td>";
                                          echo "<td data-label='Name:'>" . $row1['lastname'] . ", " . $row1['firstname'] .' '. $row1['MI'] .'.'."</td>";
                                          echo "<td data-label='Program:'>" . $row1['course'] . "</td>";
                                          echo "<td>" . $row1['year_level'] . "</td>";
                                        }
                                      } else{
                                          echo '<div class="alert alert-warning"><em>No Clearance Appointments for today.</em></div>';
                                      }
                                    } else{
                                        echo "Oops! Something went wrong. Please try again later.";
                                      }
                                        echo "<td>" . $row['appointment_date'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="student-clearance-view.php?id='. $row['student_id'] .'&name='. $temp_name .'" class="m-1 btn btn-primary" title="View Clearance" data-toggle="tooltip"><span class="bi bi-eye"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-warning"><em>No Clearance Appointments for today.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    // Close connection
                    mysqli_close($link);
                    ?>

            </div>
            <!-- <div class="container-fluid">
              <div class="float-end mb-4">
                  <a href="" class="btn btn-success pull-right">View Appointments Calendar</a>
              </div>
            </div> -->
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