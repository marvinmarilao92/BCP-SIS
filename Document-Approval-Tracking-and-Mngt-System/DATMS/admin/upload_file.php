<!DOCTYPE html>
<html lang="en">

<head>
  <?php include ('core/css-links.php');//css connection?>
</head>

<body>
<!-- Header -->
<?php include ('core/header.php');//Design for  Header?>
<!-- end of header -->

<!-- Side navbar -->
<?php $page = 'UT'; include ('core/side-nav.php');//Design for sidebar?>
<!-- end of side navbar -->

<!-- Main -->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Upload Template</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">File Template</li>
          <li class="breadcrumb-item active">Upload Template</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

      <div class="col-lg-12">

       <div class="card">
       <!-- <div class="" style="margin-top: 20px; margin-left: 20px;">
        <a href="add_document.php"><button type="button" class="btn btn-info btn-lg "><i class="bi bi-arrow-left-circle-fill"></i>  Document</button></a>
       </div> -->
       <center style="margin: 30px;">
       <form action="fileprocess.php" method="post" enctype="multipart/form-data" >
        <div class="col-lg-6" >

          <div class="card" style="padding: 20px; margin: 20px; border: 1px solid blue;  border-radius: 10px;">
            <div class="card-body">
  
              <h5 class="card-title">Template Form</h5>
              <br>
               <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Your Name" disabled>
                    <label for="floatingName">Uploader Role</label>
                  </div>
                </div>
               <br>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>
                <br>
                <div class="d-grid gap-2 mt-3" style="margin: 20px;">
                  <button class="btn btn-primary btn-lg rounded-pill" type="button">Upload Template</button>
                  <button class="btn btn-danger btn-lg rounded-pill" type="button">Cancel</button>
                </div>
            </div>
          </div>
        </div>
        </form>
       </center> 
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