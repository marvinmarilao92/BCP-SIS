<?php include('session.php');?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Clearance Requirements</title>
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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/js/dataTables.checkboxes.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script> -->

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'TCR' ; $col = 'clr'; include ('core/side-nav.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Clearance Requirements for Teachers</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Clearance Requirements for Teachers</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="col-lg-12">
              <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                  <h5 style="color: rgb(1, 41, 112); font-weight:610; ">Teachers Requirements</h5>
              </div>
              <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                  <a type="button" href="teacher-requirement-add.php" class="btn btn-primary form-control" data-toggle="modal" data-target="#AddModal" >
                  Add New Requirement
                  </a>
              </div> 
            </div>
            <div class="card-body">              
              <?php
                  // Attempt select query execution
                  $sql = "SELECT * FROM clearance_requirements_teachers where department = 'Registrar Coordinator'";
                  if($result = mysqli_query($link, $sql)){
                      if(mysqli_num_rows($result) > 0){
                          echo '<table id="example" class="table datatable">';
                              echo "<thead>";
                                  echo "<tr>";
                                      echo "<th scope='col'>Clearance Name</th>";
                                      echo "<th scope='col'>Clearance Type</th>";
                                      // echo "<th scope='col'>Action</th>";
                                  echo "</tr>";
                              echo "</thead>";
                              echo "<tbody>";
                              while($row = mysqli_fetch_array($result)){
                                  echo "<tr>";
                                      echo "<td data-label=''>" . $row['clearance_name'] . "</td>";
                                      echo "<td data-label=''>" . $row['clearance_type'] . "</td>";
                                      // echo "<td>";
                                      //     echo '<a href="student-requirement-update?id='. $row['id'] .'" class="m-1 btn btn-warning" title="Update Record" data-toggle="tooltip"><span class="bi bi-pencil-fill"></span></a>';
                                      //     echo '<a href="student-requirement-archive?id='. $row['id'] .'" class="m-1 btn btn-danger" title="Archive Record" data-toggle="tooltip"><span class="bi bi-archive-fill"></span></a>';
                                      // echo "</td>";
                                  echo "</tr>";
                              }
                              echo "</tbody>";                            
                          echo "</table>";
                          // Free result set
                          mysqli_free_result($result);
                      } else{
                          echo '<div class="alert alert-warning"><em>No Clearance Requirements Added Yet.</em></div>';
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