<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Add Post</title>
<head>


  <?php include ('core/css-links.php');//css connection?>
</head>
<body>

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'com'; $col = 'posting';include ('core/sidebar.php');//Design for sidebar?>

  <main id="main" class="main">

   
  

    <div class="">
    <section class="section">
      <div class="row">        
        <div class="col-lg-12">
          <div class="card">
            <div class="col-lg-12">
            <div class="card-header">
                  <h5>Comment List<h5>
                </div>
           
            </div>
            <div class="card-body" >               
                <!-- Table for Document List records -->
                <table class="table table-hover datatable" id="categoryTable">
                  <thead>
                    <tr>
                      <th style="display:none"></th>
                      <th style="display:none"></th>
                      <th scope="col">Name</th>
                      <th scope="col" WIDTH="50%">Comment</th>         
                      <th style="display:none"></th>
                      <th >Date Created</th>
                      <th scope="col" WIDTH="10%">Action</th>      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      require_once("include/conn.php");
                      $query="SELECT * FROM hdms_comments ORDER BY date DESC ";
                      $result=mysqli_query($conn,$query);
                      while($rs=mysqli_fetch_array($result)){
                        $id =$rs['id'];
                        $Name = $rs['name'];
                        $Desc = $rs['comment'];
                        $Date = $rs['date'];        
                     
                        
                    ?>
                    <tr>
                      <td style="display:none" ><?php echo $id; ?></td>
                    
                      <td data-label="Category"><?php echo $Name; ?></td>
                      <td data-label="Description"><?php echo $Desc; ?></td>
                      <td data-label="Date"><?php echo $Date?></td>
                      <td data-label="">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">                     
                          <button class="btn btn-primary viewbtn"><i class="bi bi-eye"></i></button>
                          <button class="btn btn-success editbtn"><i class="bi bi-pencil-square"></i></button>
                          <button class="btn btn-danger deletebtn" ><i class="bi bi-trash" ></i></button>
                        </div>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <!-- End of Document table record -->
            </div>
          </div>

        </div>
      </div>
      
    </section>

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
    <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <!-- Back to top Button -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
    <?php include ('core/js.php');//css connection?>

  
</body>

</html>