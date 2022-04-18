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
$page = 'SCR' ; $col = 'clr'; include ("includes/sidebar.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Clearance Requirements for Students</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Clearance Requirements for Students</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="col-lg-12">
              <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                  <h4><?php echo $verified_session_role; ?>'s Requirements</h4>
              </div>
              <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                  <a type="button" href="student-requirement-add.php" class="btn btn-primary form-control" data-toggle="modal" data-target="#AddModal" >
                  Add New Requirement
                  </a>
              </div> 
            </div>
            <div class="card-body">
              <?php
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM clearance_requirements_students where department = '$verified_session_role'";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="example" class="table datatable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>Clearance Name</th>";
                                        echo "<th scope='col'>Clearance Type</th>";
                                        echo "<th scope='col'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['clearance_name'] . "</td>";
                                        echo "<td>" . $row['clearance_type'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="student-requirement-update.php?id='. $row['id'] .'" class="m-1 btn btn-warning" title="Update Record" data-toggle="tooltip"><span class="bi bi-pencil-fill"></span></a>';
                                            echo '<a href="student-requirement-archive.php?id='. $row['id'] .'" class="m-1 btn btn-danger" title="Archive Record" data-toggle="tooltip"><span class="bi bi-archive-fill"></span></a>';
                                        echo "</td>";
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

<?php
include ("includes/footer.php");
?>

</body>

</html>