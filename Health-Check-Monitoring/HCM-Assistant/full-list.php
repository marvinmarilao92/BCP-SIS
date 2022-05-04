<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>HCM | Dashboard</title>
<head>
<?php include ('includes/head_ext.php');?>
</head>

<body>
<?php include ('includes/header.php');?>
<?php include ('includes/sidebar.php');?>
<!-- Main -->
<main id="main" class="main">

<!-- Page Title -->
  <div class="pagetitle">
    <h1>Validation</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Validate-Records</li>
      </ol>
    </nav>
  </div>
  
<section class="section2">
  <div class="row">
    <div class="col-lg-12">
      <?php
      if(isset($_SESSION['status'])) 
      {
        ?>
            <div class="alert border-info alert-dismissible fade show" role="alert">
                <strong><?php echo $_SESSION['status'];?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        <?php

        unset($_SESSION['status']);
      }
      ?>
      <div class="card">
        <div class="card-body">
          <h1 class="card-title">List of Records</h1>

            <!-- Table Starts --> 
          <div class="table-responsive">
            <table class="table datatable table-hover">
              <?php
                $query = "SELECT * FROM hcms_med ORDER BY id ASC";
                $query_run = mysqli_query($conn, $query);
              ?>
                    <!-- Table Head -->
                <thead class = "table-info">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student Number</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Course</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Submission Date</th>
                        <!-- <th scope="col">file</th> -->
                        <th scope="col">Approved Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                  if(mysqli_num_rows($query_run) > 0 )
                  {
                    while($row = mysqli_fetch_assoc($query_run))
                    {
                ?>
                  <tr>
                    <td>#<?php echo $row['id'];?></td>
                    <td><?php echo $row['id_number'];?></td>
                    <td><?php echo $row['fname'];?> <?php echo $row['mname'];?> <?php echo $row['lname'];?></td>
                    <td><?php echo $row['course'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['uploaded_on'];?></td>
                    <td><?php echo $row['appr_on'];?></td>
                    <td>
                      <div class="input-group">
                        <a class= "btn btn-info btn-rounded btn-sm float-right bi bi-eye" href="view-records-list.php?id=<?= $row['id']?>"></a>
                        <a class= "btn btn-info btn-rounded btn-sm float-right bi bi-download" href="../php/uploads/<?php echo $row['file']?>" download></a>
                        <a class= "btn btn-info btn-rounded btn-sm float-right bi bi-trash" id ="btn-del" href="functions/delete.php?rmv_id=<?= $row['id']?>"></a>
                      </div>
                    </td>
                  </tr>
                <?php } 
                  }
                ?>
                </tbody>
            </table>
            <?php if(isset($_GET['dlt'])): ?>
              <div class = "flash-data" data-flashdata="<?= $_GET['dlt']; ?>"></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> <!-- End -->


</main>


<?php
include('includes/footer.php');
?> 

  </body>
</html>