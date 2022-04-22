<?php
  include_once('security/newsource.php');


?>
<!DOCTYPE html>
<html lang="en">
<title>Programs</title>
<head>
<?php include ('includes/head_ext.php');?>

</head>

<body>
<?php $page = "prog-logs"; $nav="Programs";?>
<?php include ('includes/header.php');?>
<?php include ('includes/sidebar.php');?>
<main id="main" class="main">


<!-- Page Title -->
  <div class="pagetitle">
    <h1>List of Records</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a></li>
        <li class="breadcrumb-item active">Records List</li>
      </ol>
    </nav>
  </div>
  
<section class="section2">
<div class="card">
  <div class=" d-flex justify-content-center mx-4" style="border-bottom: solid 1px gray;">
    <h3 style ="color:#012970; padding-top: 2rem; margin-bottom: 2rem;">Program Logs</h3>
  </div>
  <div class="card-body">
    <form method="POST">
                <!-- Table Starts --> 
                <div class="table-responsive">
                  <table class="table table-hover datatable">
                    <?php
                      $isApproved = "Approved";
                      $query = "SELECT * FROM ms_program_logs ORDER BY prog_id ASC LIMIT 10";
                      $query_run = mysqli_query($conn, $query);
                    ?>
                          <!-- Table Head -->
                      <thead style="background-color:whitesmoke;">
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Full Name</th>
                              <th scope="col">Program</th>
                              <th scope="col">ID Number</th>
                              <th scope="col">Description</th>
                              <th scope="col">Consultant Name</th>
                              <th scope="col">Consultant Role</th>
                              <th scope="col">Date</th>
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
                          <td><?php echo $row['full_name'];?></td>
                          <td><?php echo $row['progs_name'];?></td>
                          <td><?php echo $row['id_number'];?></td>
                          <td><?php echo $row['descr'];?></td>
                          <td><?php echo $row['cons_name'];?></td>
                          <td><?php echo $row['cons_role'];?></td>
                          <td><?php echo $row['date'];?></td>
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
      </div>
    </div>
  </div>
</div>
</section> <!-- End -->


</main>
<?php include('includes/footer.php'); ?>
</body>
</html>