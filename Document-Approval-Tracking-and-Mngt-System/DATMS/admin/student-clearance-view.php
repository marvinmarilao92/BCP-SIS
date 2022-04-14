<?php
include('session.php');

    // Downloads files
    if (isset($_GET['student_id'])&&isset($_GET['req_id'])) {
        $student_id = $_GET['student_id'];
        $req_id = $_GET['req_id'];

        // // fetch file to download from database
        // $sql = "SELECT * FROM clearance_student_status WHERE student_id=$student_id and clearance_requirement_id=$req_id";
        // $result = mysqli_query($link, $sql);
        // $file = mysqli_fetch_assoc($result);
        // $filepath = '../../../Student_Portal/uploads/' . $file['file_link'];

        // if (file_exists($filepath)) {
        //     header('Content-Description: File Transfer');
        //     header('Content-Type: application/octet-stream');
        //     header('Content-Disposition: attachment; filename=' . basename($filepath));
        //     header('Expires: 0');
        //     header('Cache-Control: must-revalidate');
        //     header('Pragma: public');
        //     header('Content-Length: ' . filesize('../../../Student_Portal/uploads/' . $file['file_link']));
        //     readfile('../../../Student_Portal/uploads/' . $file['file_link']);
        //     exit;
        // }


         // fetch file to download from database
         $sql = "SELECT * FROM clearance_student_status WHERE student_id=$student_id and clearance_requirement_id=$req_id";
         $result = mysqli_query($link, $sql);
         $file = mysqli_fetch_assoc($result);
         $filepath = '../../../Student_Portal/uploads/' . $file['file_link'];
    
        if (file_exists($filepath)) {
            header('Content-Type: application/pdf');
            readfile('../../../Student_Portal/uploads/' . $file['file_link']);
    
            mysqli_query($link, $updateQuery);
            exit;
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Clearance View</title>

<?php include ('core/css-links.php');//css connection?>

<body>

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'SCS' ; $col = 'clr'; include ('core/side-nav.php');//Design for sidebar?>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Clearance Status of <?php echo trim($_GET["name"]); ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="student-clearance-status.php">Clearance Status of Students</a></li>
          <li class="breadcrumb-item">Clearance Status of <?php echo trim($_GET["name"]); ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
          <div class="col-lg-12">
              <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                  <h4>Requirements To Submit</h4>
              </div>
              <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                  <a type="button" href="student-clearance-status.php" class="btn btn-primary form-control" data-toggle="modal" data-target="#AddModal" >
                  Return
                  </a>
              </div> 
            </div>
            <div class="card-body">
              <?php
                    $count = 0;
                    // Attempt select query execution
                    $sql = "SELECT * FROM clearance_requirements_students where department = 'Registrar Coordinator'";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="example" class="table datatable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>Clearance Name</th>";
                                        echo "<th scope='col'>Clearance Type</th>";
                                        echo "<th scope='col'>Status</th>";
                                        echo "<th scope='col'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['clearance_name'] . "</td>";
                                        echo "<td>" . $row['clearance_type'] . "</td>";
                                        $temp_id = $row['id'];
                                        $status = "";
                                        $location = "";
                                        $clearance_department_id = "";
                                        $student_username = trim($_GET["id"]);
                                        $sql1 = "SELECT * FROM clearance_student_status where clearance_requirement_id = '$temp_id' and student_id = '$student_username' LIMIT 1";
                                        if($result1 = mysqli_query($link, $sql1)){
                                          if(mysqli_num_rows($result1) > 0){
                                            while($row1 = mysqli_fetch_array($result1)){
                                              $status = $row1['status'];
                                              $location = $row1['location'];
                                              $clearance_department_id = $row1['clearance_department_id'];
                                              echo "<td>" . $row1['status'] . "</td>";
                                            }
                                          } else{
                                              $status = 'Pending';
                                              $clr_name = $row['department'];
                                              $sql2 = "SELECT * FROM clearance_department_students where department_name = '$clr_name' LIMIT 1";
                                              if($result2 = mysqli_query($link, $sql2)){
                                                if(mysqli_num_rows($result2) > 0){
                                                  while($row2 = mysqli_fetch_array($result2)){
                                                    $clearance_department_id = $row2['id'];
                                                  }
                                                }
                                              } else{
                                                  echo "Oops! Something went wrong. Please try again later.";
                                              }
                                              echo "<td>$status</td>";
                                          }
                                        } else{
                                            echo "Oops! Something went wrong. Please try again later.";
                                        }
                                        echo "<td>";
                                          echo '<a href="student-clearance-status-view.php?req_id='. $row['id'] .'&req_name='. $row['clearance_name'] .'&id='. trim($_GET["id"]) .'&name='. trim($_GET["name"]) .'&dept_id='. $clearance_department_id .'" class="m-1 btn btn-info" data-toggle="tooltip" title="View details"><span class="bi bi-info-lg"></span></a>';
                                          if($status == "Declined"){
                                            echo '<a href="student-clearance-confirm.php?req_id='. $row['id'] .'&req_name='. $row['clearance_name'] .'&id='. trim($_GET["id"]) .'&name='. trim($_GET["name"]) .'&dept_id='. $clearance_department_id .'&loc='. $location.'&status=Declined" target="" class="m-1 btn btn-success" title="Confirm Clearance" data-toggle="tooltip"><span class="bi bi-check-lg"></span></a>';
                                          }else if($status != "Declined" && $status == "Completed"){
                                          }else{
                                            echo '<a href="student-clearance-confirm.php?req_id='. $row['id'] .'&req_name='. $row['clearance_name'] .'&id='. trim($_GET["id"]) .'&name='. trim($_GET["name"]) .'&dept_id='. $clearance_department_id .'&loc='. $location.'&status='. $status .'" target="" class="m-1 btn btn-success" title="Confirm Clearance" data-toggle="tooltip"><span class="bi bi-check-lg"></span></a>';
                                          }
                                          if($status == "Under Review"){
                                            echo '<a href="student-clearance-decline.php?req_id='. $row['id'] .'&req_name='. $row['clearance_name'] .'&id='. trim($_GET["id"]) .'&name='. trim($_GET["name"]) .'&dept_id='. $clearance_department_id .'&loc='. $location.'" target="_blank" class="m-1 btn btn-danger" title="Decline Clearance" data-toggle="tooltip"><span class="bi bi-x-lg"></span></a>';
                                            echo '<a href="?student_id='. trim($_GET["id"]).'&req_id='. $row['id'].'" target="" class="m-1 btn btn-primary" title="Download File" data-toggle="tooltip"><span class="bi bi-eye"></span></a>';
                                          }
                                          if($status == "Completed" && $location == "Database"){
                                            echo '<a href="?student_id='. trim($_GET["id"]).'&req_id='. $row['id'].'" target="_blank" class="m-1 btn btn-primary" title="Download File" data-toggle="tooltip"><span class="bi bi-eye"></span></a>';
                                          }
                                          if($status == "Pending" && $row['clearance_type'] == "Clearance Record (Pending Record)"){
                                            echo '<a href="student-clearance-decline.php?req_id='. $row['id'] .'&req_name='. $row['clearance_name'] .'&id='. trim($_GET["id"]) .'&name='. trim($_GET["name"]) .'&dept_id='. $clearance_department_id .'&loc='. $location.'" target="" class="m-1 btn btn-danger" title="Decline Clearance" data-toggle="tooltip"><span class="bi bi-x-lg"></span></a>';
                                          }
                                          echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-warning"><em>No Clearance Requirements Added Yet.</em></div>';
                            $count = 1;
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