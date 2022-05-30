<?php
include('includes/session.php');
$collapsed = "clearance-audit-trail";
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
      <h1>Clearance Audit Trail</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Clearance Audit Trail</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Audits</h5>
              <?php
                    // Attempt select query execution
                    $sql = "SELECT * FROM audit_trail where account_no = '$verified_session_username' and actor = 'Clearance Administrator' order by id DESC";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="example" class="table datatable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>Date</th>";
                                        echo "<th scope='col'>Action Made</th>";
                                        echo "<th scope='col'>IP Address</th>";
                                        echo "<th scope='col'>Host</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td>" . $row['action'] . "</td>";
                                        echo "<td>" . $row['ip'] . "</td>";
                                        echo "<td>" . $row['host'] . "</td>";
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