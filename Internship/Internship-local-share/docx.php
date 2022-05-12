<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bestlink College Of the Philippines - Search</title>
  <?php include ('header.php'); ?>
</head>

<body onload="myFunction()">

  <!-- ======= Header ======= -->
  <?php include ('nav.php'); ?>
  <!-- #header -->
  <div id="loader">


</div>
  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container" >

        <div class="d-flex justify-content-between align-items-center">
        
         <h2 ><p><b>Note:</b> Magandang Buhay ! <br>Before you proceed in registration , Please Download the requirements below thank you . </p></h2>
            
        </div>

      </div>
     </section><!-- End Breadcrumbs Section -->

    <section class="inner-page pt-4" style="display:none;" id="myDiv" class="animate-bottom">
      <div class = "container" >
      <br>
      <br>
      <?php include 'constant/show.php' ?>
      <br>
      <br>
      <h2><a href="register-account.php"><button type="button" class="btn btn-primary" style="float: left;"> Proceed to Registration  </button></a></h2>
      <br>
      <br>
    </div> 

      
      
    </section>
    <div class = "cre">

    </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
     <?php include('footer.php'); ?>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php include('js.php'); ?>
 
</body>

</html>