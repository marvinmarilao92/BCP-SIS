<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>MED SYSTEM | Payment Update</title>

<head>
  <?php include('core/css-links.php'); //css connection
  ?>
</head>

<body>
  <?php include('core/header.php'); //Design for  Header
  ?>

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
                  <h5 class="card-title text-center pb-0 fs-4">Annual Medical Examination Payment</h5>
                </div>


                <div class="col-md-12">
                  <div class="input-group">
                    <input type="text" class="form-control" name="id_number" id="checkNum" placeholder="ID Number"
                      style="text-transform:capitalize;" onchange="checkId('showStudentInformation')"
                      onkeypress="return isNumberKey(event)" required autofocus>
                    <a class="btn btn-primary btn-lg" onclick="checkId('showStudentInformation')"><i
                        class="bi bi-search"></i></a>
                  </div>
                </div>

                <div class="col-12 text-center">
                  <button class="btn btn-success mt-2" id="btnpaid">Confirm</button>
                </div>

                <div class="col-12 text-center mt-2">
                  <div id="showStudentInformation"></div>
                </div>
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
        &copy;Copyright <a href="https://bcp.edu.ph/home" target="_blank " data-bs-toggle="tooltip"
          data-bs-placement="top" title="Access BCP Website">Bestlink College of the Philippines</a> All Rights Reserved
      </center>
    </div>
  </footer>
  <!-- End Footer -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <script>
  function checkId(showStudentInformation) {
    var checkNum = document.getElementById("checkNum").value;
    var data =
      'checkNum=' + checkNum;
    if (checkNum != '') {
      $.ajax({
        type: "GET",
        url: 'function/ajax-check.php',
        data: data,
        cache: false,
        success: function(html) {
          var ajaxDisplay = document.getElementById(showStudentInformation);
          ajaxDisplay.innerHTML = html;
        }
      });
    } else {
      alert("Error")
    }
  }
  </script>
  <!-- Vendor JS Files/ Template main js file -->
  <?php include('core/js.php'); //css connection
  ?>
  <!-- Charts -->
</body>

</html>