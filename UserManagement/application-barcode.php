<?php
    session_start();
    include 'includes/config.php';
    if(isset($_SESSION['session_code'])){
      $user_id_checker = $_SESSION['session_code'];
  
      $sql5 = "SELECT *,LEFT(middlename,1) as MI FROM student_application where id_number = '$user_id_checker'";
              if($result5 = mysqli_query($link, $sql5)){
                if(mysqli_num_rows($result5) > 0){
                  while($row5 = mysqli_fetch_array($result5)){
                    $verified_session_code = $row5['id_number'];
                    $verified_session_firstname = $row5['firstname'];
                    $verified_session_lastname = $row5['lastname'];
                    $verified_session_mname = $row5['MI'];
                    $verified_session_contact = $row5['contact'];
                    $verified_session_date = $row5['stud_date'];
                  }
                  // Free result set
                  mysqli_free_result($result5);
                }
              }
      
      if(($verified_session_code == $_SESSION['session_code'])){

      }else{
        header("location:pages-error-404.php");
          die();
      }
    }else{
      header("location:pages-error-404.php");
      die();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script type="text/javascript">
    // window.history.forward();
    // function noBack() { window.history.forward(); }
  </script>
  <!-- header -->
  <?php include ("includes/head.php");?>
</head>

<body>

  <main>
    <section class="section" style="padding:10px">
      <div class="row">
        <!-- List of requirements -->
        <div class="col-lg-3">
          <!-- Card with header and footer -->
            <div class="card">
              <div class="card-header"> 
                </div>
              <div class="card-body" style="color: black;">
              <br>
              <h5 style="margin-top: 10px; color:black;"><solid style="font-weight: bolder;">BCP Admission</solid> confirms that the student data below applied through online admission.
              </h5>
                <p style="margin-left: 30px;">Application Details: <br>
                      <l>
                        <ol style="margin-left: 20px;">Student Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $verified_session_firstname . " " . $verified_session_mname . "." ." " . $verified_session_lastname ?> </ol>
                        <ol style="margin-left: 20px;">Date of Application :&nbsp;<?php echo $verified_session_date?></ol>
                        <ol style="margin-left: 20px;">Contact Number &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $verified_session_contact?></ol>
                      </l>  
                    </p>
                    <div class="col-12" style="text-align: center;">
                      <svg id="barcode"></svg>
                    </div>
                    <p>Take a screenshot of this Confirmation slip. Show this to the admission and submit your requirements to proceed to the next step.</p>
              </div>
              <div class="card-footer">
                <nav class="justify-content-center d-flex">
                  <a href="logout.php" class="btn btn-secondary">Close</a>   
                </nav>
              </div>
            </div>
          <!-- End Card with header and footer -->
        </div>
    </section>

  </main><!-- End #main -->

    <!-- Vendor JS Files -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/chart.js/chart.min.js"></script>
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/sweetalert2.min.js"></script>

     <!-- For barcode -->
     <!-- <script src="JsBarcode.all.min.js"></script> -->
     <script src="assets/vendor/bootstrap/js/JsBarcode.all.min.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script >
        JsBarcode("#barcode", "<?php echo $verified_session_code?>", {
          format: "CODE128",
          lineColor: "#000",
          width: 4,
          height: 120,
          textAlign: "center",
          displayValue: true
        });

    </script>

</body>

</html>