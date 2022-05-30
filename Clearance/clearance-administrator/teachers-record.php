<?php
include('includes/session.php');
$collapsed = "teachers-record";
$show_modal = false;
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && trim($_POST["action"])=="view" && isset($_POST["department_name"])){
  $department_name = trim($_POST["department_name"]);
  $show_modal = true;
}
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
if($show_modal == true){
?>
<script type="text/javascript">
  window.onload = function () {
    OpenBootstrapPopup();
  };
  function OpenBootstrapPopup() {
    $("#teachers-record-modal-view").modal('show');
  }
</script>
<?php
}
?>
<?php
include ("includes/nav.php");
include ("includes/sidebar.php");
?>


  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Teachers Record</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Teachers Record</li>
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
                // Attempt select query execution
                $sql = "SELECT * FROM clearance_department_teachers";
                if($result = mysqli_query($link, $sql)){
                  if(mysqli_num_rows($result) > 0){
                    echo '<table id="example" class="table datatable">';
                      echo "<thead>";
                        echo "<tr>";
                          echo "<th scope='col'>Department Name</th>";
                          echo "<th scope='col'>Pending Records</th>";
                          echo "<th scope='col'>Action</th>";
                        echo "</tr>";
                      echo "</thead>";
                      echo "<tbody>";
                        while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                            echo "<td>" . str_replace("Coordinator", "", $row['department_name']) . "</td>";
                            $sql = "SELECT * FROM clearance_teachers_record where department_name = '".$row['department_name']."'";
                            if($result1 = mysqli_query($link, $sql)){
                              echo "<td>".mysqli_num_rows($result1)."</td>"; 
                            } else{
                              echo "Oops! Something went wrong. Please try again later.";
                            }
                            echo "<td>";
                              // echo '<button id="'.$row['department_name'].'" type="button" class="btn btn-primary" title="View Records" data-toggle="tooltip" onclick="viewFunction(this.id)"><span class="bi bi-eye"></span></button>';
                              echo '
                                <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
                                  <input type="hidden" name="action" value="view">
                                  <input type="hidden" name="department_name" value="'. $row['department_name'] .'">
                                  <input type="submit" class="btn btn-primary btn-sm" value="View Records">
                                </form>';
                              echo "</td>";
                          echo "</tr>";
                        }
                      echo "</tbody>";                            
                    echo "</table>";
                  } else{
                    echo '<div class="alert alert-warning"><em>No records were found.</em></div>';
                  }
                } else{
                  echo "Oops! Something went wrong. Please try again later.";
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  
  <!-- teachers Record Modal -->
  <div class="modal fade" id="teachers-record-modal-view" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">List of Teachers Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php
          // Attempt select query execution
          $sql = "SELECT * FROM clearance_teachers_record where department_name = '".$department_name."'";
          if($result = mysqli_query($link, $sql)){
              if(mysqli_num_rows($result) > 0){
                  echo '<table id="example" class="table datatable">';
                      echo "<thead>";
                          echo "<tr>";
                              echo "<th scope='col'>teacher Number</th>";
                              echo "<th scope='col'>First Name</th>";
                              echo "<th scope='col'>Last Name</th>";
                              echo "<th scope='col'>Course</th>";
                              echo "<th scope='col'>Description</th>";
                          echo "</tr>";
                      echo "</thead>";
                      echo "<tbody>";
                      while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                              echo "<td>" . $row['teacher_id'] . "</td>";
                              echo "<td>" . $row['firstname'] . "</td>";
                              echo "<td>" . $row['lastname'] . "</td>";
                              echo "<td>" . $row['course'] . "</td>";
                              echo "<td>" . $row['description'] . "</td>";
                          echo "</tr>";
                      }
                      echo "</tbody>";                            
                  echo "</table>";
              } else{
                  echo '<div class="alert alert-warning"><em>No Teachers Record Added Yet.</em></div>';
              }
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }
          ?>
        </div>
      </div>
    </div>
  </div><!-- End Teachers Record Modal-->


<?php
include ("includes/footer.php");
?>
<script>
  // function deleteFunction(id_number) {
  //   var expires;
  //   var name="id_number";
  //   var date = new Date();
  //   date.setTime(date.getTime() + (1 * 24 * 60 * 60 * 1000));
  //   expires = "; expires=" + date.toGMTString();
  //   document.cookie = escape(name) + "=" + escape(id_number) + expires + ";";
  //   document.getElementById('delete-div').innerHTML = 'Delete teacher Record of teacher ID: ' + escape(getCookie("id_number"));
  //   var Myelement = document.getElementById("delete-id");
  //   Myelement.value = escape(getCookie("id_number"));
  //   $("#teachers-record-modal-delete").modal('show');
  // }
  // function updateFunction(id_number) {
  //   var expires;
  //   var name="id_number";
  //   var date = new Date();
  //   date.setTime(date.getTime() + (1 * 24 * 60 * 60 * 1000));
  //   expires = "; expires=" + date.toGMTString();
  //   document.cookie = escape(name) + "=" + escape(id_number) + expires + ";";
  //   document.getElementById('update-div').innerHTML = 'Update teacher Record of teacher ID: ' + escape(getCookie("id_number"));
  //   var Myelement = document.getElementById("update-id");
  //   Myelement.value = escape(getCookie("id_number"));
  //   $("#teachers-record-modal-update").modal('show');
  // }

  function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
  }
</script>
</body>

</html>