<?php
  include_once('security/newsource.php');


?>
<!DOCTYPE html>
<html lang="en">
<title>Programs</title>
<head>
<?php include ('includes/head_ext.php');?>
<style>
  .form-group{
    margin: 10px;
  }
</style>
</head>

<body>
<?php $page = "medicines"; $nav="inventory";?>
<?php include ('includes/header.php');?>
<?php include ('includes/sidebar.php');?>
<main id="main" class="main">


<!-- Page Title -->
  <div class="pagetitle">
    <h1 class= "d-flex justify-content-between">List of Medicines <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#medForm"><i class="ri-add-circle-line">&nbsp Add Medicine</i></button></h1> 
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a></li>
        <li class="breadcrumb-item active">Medicine List</li>
      </ol>
    </nav>
  </div>
  <section class="section2" style="max-height: auto; min-width: 80vw">
    <div id="medicine-info-wrapper" class="max-width: 100%;">
      <?php
        $query = "SELECT * FROM ms_items";
        $query_run = mysqli_query($conn, $query);
      ?>
      <?php 
        if(mysqli_num_rows($query_run) > 0) {
          while($row = mysqli_fetch_assoc($query_run)) {
            $img = $row['img']; 
            $med_name = $row['med_name'];
            $scientific_name = $row['med_sci'];
            $manufactured = $row['manifactured'];
            $expiration = $row['exp_date'];
            $quantity = $row['quantity'];
      ?> 
        <div class="container">
          <div class="card">   
            <div class="row ">
              <div class="col ">
                <h2 class="mt-2 p-2"><?php echo $med_name ?></h2>
                <img class= "mx-5" src= "../assets/inv-img/<?php echo $img ?>" width="400px"></img>
              </div>
              <div class="col">
                <div class="mb-2 d-flex flex-grow-* align-items-start justify-content-center flex-column m-2" style="max-width: 764px;">
                  <h4>Drug name:</h4>
                  <input type="text" class= "mb-1 form-control h5 border-2 rounded" value="<?php echo $med_name?>" disabled>
                  <h4 >Scientific name:</h4>
                  <textarea type="text" row="2" class= "mb-1 form-control h5 border-2 rounded" value="<?php echo $scientific_name?>" disabled><?php echo $scientific_name?></textarea>
                  <h4>Manufactured:</h4>
                  <input type="text" class= "mb-1 form-control h5 border-2 rounded" value="<?php echo $manufactured?>" disabled>
                  <h4>Expiry date:</h4>
                  <input type="text" class= "mb-1 form-control h5 border-2 rounded" value="<?php echo $expiration?>" disabled>
                  <h4>Quantity:</h4>
                  <input type="text" class= "mb-1 form-control h5 border-2 rounded" value="<?php echo $quantity?>" disabled>
                </div>
              </div>  
            </div> 
          </div>
          </div>
  
      <?php 
          } 
        }
      ?>
    </div>

<div class="modal fade" id="medForm" tabindex="-1" aria-labelledby="myModallabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Medicine</h5>
        <a type="button" class="close text-light" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col"> 
            <label class="p-2">Drug Name</label> 
            <input type="text" class="form-control" name="drug_name" id="drug_name" style="text-transform:capitalize;" required>        
          </div>
          <div class="col"> 
            <label class="p-2">Scientific Name</label>  
            <input type="text" class="form-control" name="sci_name" id="sci_name" style="text-transform:capitalize;" required>
          </div>
        </div>
        <div class="col">
          <label class="p-2">Description</label>
          <textarea rows="4" class="form-control" style="text-transform:capitalize;" name="descr" required></textarea>
        </div>
        <div class="row">
          <div class="col py-3">
            <div class="form-floating">
              <input type="date" class="form-control" name="startDate" id="startDate" required>
              <label for="floatingName">Manufactured</label>
            </div>
          </div>
          <div class="col py-3">
            <div class="form-floating">
              <input type="date" class="form-control" name="startDate" id="startDate" required>
              <label for="floatingName">Expiration Date</label>
            </div>
          </div>
          <div class="col py-3">
            <label>Quantity</label>
              <input type="number" class="form-control" name="quantity" id="quantity" required>
          </div>
        </div>
      <div class="modal-footer">
        <div class="text-end">
          <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
          <button type="close" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">close</button>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
  </section>

  <?php include('includes/footer.php'); ?>
</body>
</html>