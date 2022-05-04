



<?php
include_once('security/newsource.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>HCM | Dashboard</title>
<head>
<?php include ('includes/head_ext.php');?>

</head>

<body>
<?php $page = "log"; $nav ="incident-logs";?>
<?php include ('includes/header.php');?>
<?php include ('includes/sidebar.php');?>
<main id="main" class="main">

<!-- Page Title -->
  <div class="pagetitle">
    <h1>Daily Log</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a></li>
        <li class="breadcrumb-item active">Daily Log</li>
      </ol>
    </nav>
  </div>

  <div class="card">
    <div class="card-body">
        <div class="row p-3">
            <div class="col-md-8">
                <h5 class="card-title">Form</h5>
            </div>
 
        </div>
      <!-- No Labels Form -->
      <form action="resources/add_incident_reports.php" method="post" class="row g-3">
          <div class="col-md-3">
            <div class="form-floating">
              <input type="text" class="form-control" name="id_number" id="id_number" placeholder="ID Number" style="text-transform:capitalize;" required>
              <label for="floatingName">ID Number</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full Name" style="text-transform:capitalize;" required>
              <label for="floatingName">Full Name</label>
            </div>
          </div>   
          <div class="col-md-3">
            <div class="form-floating">
              <select type="text" class="form-select" name="personnel" id="personnel">
                <option value="" selected="selected" disabled="disabled">Select personnel</option>
                <option value="Student" >Student</option>
                <option value="Faculty" >Faculty</option>
                <option value="Non Teaching Staff" >Non Teaching Staff</option>
              </select>
              <label for="floatingName">personnel</label>
            </div>
          </div>  
          <div class="col-md-3">
            <div class="form-floating">
                <select id="prod_name" name="prod_name" class="form-select">
                    <option value="" selected="selected" disabled="disabled">Choose Product</option>
                    <?php
                    // Include config file
                    // Attempt select query execution
                    $sql2 = "SELECT * FROM ms_items ORDER BY prod_id";
                    $result2 = mysqli_query($conn, $sql2);
                        if(mysqli_num_rows($result2) > 0){
                        while($row2 = mysqli_fetch_array($result2)){
                            echo '<option value = "' . $row2["med_name"] . '">' . $row2["med_name"] . '</option>';
                        }
                        // Free result set
                        mysqli_free_result($result2);
                        }
                    ?>
                </select>
              <label for="floatingName">Product</label>
            </div>
          </div> 
          <div class="col-md-3">
            <div class="form-floating">
                <input type="number" min = "1"  class="form-control" name="prod_quantity" id="prod_quantity" placeholder="prod_quantity" style="text-transform:capitalize;" required>
                <label for="floatingName">Quantity</label>
            </div>
          </div>
          <div class="col-md-3">
            <label class= "p-1" >Upload PDF Report</label>
            <input type="file"  class="form-control" name="file" placeholder="File" required>
        </div>
        <div class="col-9">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Action</label>
                <textarea class="form-control" name = "aid" id="aid" rows="3"></textarea>
            </div>
        </div>
        <div class="col-3 p-4">
                <div class="form-floating">
                    <select class="form-select" name="classified" id="classified">
                        <option value="" selected="selected" disabled="disabled">Select Minor/Major Incident</option>
                        <option value="Minor" >Minor</option>
                        <option value="Major" >Major</option>
                    </select>
                    <label for="floatingName">Classified</label>
                </div>
            </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End No Labels Form -->
    </div>
  </div>
</main>
  