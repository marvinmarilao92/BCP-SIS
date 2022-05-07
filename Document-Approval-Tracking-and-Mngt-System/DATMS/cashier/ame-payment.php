<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Payment Update</title>
<head>
<?php include ('core/css-links.php');//css connection?>
</head>

<body>
<?php include ('core/header.php');//Design for  Header?>

  <main style="padding: 20px;">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <br>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 d-flex flex-column align-items-center justify-content-center">          
              <div class="d-flex justify-content-center py-4">               
                <a href="dynamic-login.php" class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block"></span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">
                <div class="card-body" style="padding: 20px;">          
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Update Student Application Status</h5>
                    <p class="text-center small">Please enter the application code or scan barcode and also enter the offical </p>
                  </div>

                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-4">

                    <div class="col-md-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="adm_code" id="adm_code" placeholder="Code" style="text-transform:capitalize;" onkeypress="return isNumberKey(event)"  required autofocus>
                        <label for="floatingName">ID Number</label>
                      </div>
                    </div>

                    <div class="col-12 text-center">
                      <button class="btn btn-success " id="btnpaid">Confirm</button>
                    </div>
                  </form>


                </div>
              </div>

            </div>
          </div>
        </div>
    </section>

  </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <footer class="footer">
      <div class="copyright" style="margin-bottom: 30px;">
        <center>
          &copy;Copyright <a href="https://bcp.edu.ph/home" target="_blank " data-bs-toggle="tooltip" data-bs-placement="top" 
          title="Access BCP Website">Bestlink College of the Philippines</a> All Rights Reserved
        </center>                 
      </div>
    </footer>
    <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>
<!-- Charts -->
</body>

</html>