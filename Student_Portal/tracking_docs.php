<?php
include('includes/session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Tracking Documents</title>
<head>
<?php
include ("includes/head.php");
?>

</head>
<body>

<?php 
$page = 'track'; 
include ("includes/nav.php");
include ("includes/sidebar.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      
      <h1>Track Documents</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Module</li>
          <li class="breadcrumb-item active">Track Document</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
   
        <!-- Left side columns -->
          <div class="row">

            <!-- Reports -->
          
              <div class="card">
                <!-- Activity Body -->
                <div class="card-body">
                  <!-- Search Bar -->

                    <div class="col-md-12" style="margin-top: 30px; margin-bottom: 10px;">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="search_text" name="search_text" placeholder="Your Name" autofocus>
                        <label for="floatingName">Enter Code</label>
                      </div>
                    </div>  

                  <!-- End of search Bar -->
                    <!-- Tracking Activity module -->
                    <div class="activity">

                    </div>
                    <!-- End Tracking Activity module -->
                </div>
              <!-- End Activity Body -->
              </div>
            </div>
      
    </section>
  </main><!-- End #main -->

  
  <!-- ======= Footer ======= -->
  <?php include ("includes/footer.php"); ?>
  <?php include ("view_ticket.php"); ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

  <script type="text/javascript">
      $(document).ready(function(){
      // Providing Overall tracking history
      // load_data();
      function load_data(query)
      {
        $.ajax({
        url:"function/tracking_docx.php",
        method:"POST",
        data:{query:query},
        success:function(data)
        {
          $('.activity').html(data);
        }
        });
      }
      $('#search_text').keyup(function(){
        var search = $(this).val();
        if(search != '')
        {
        load_data(search);
        }
        else
        {
          $('.activity').html('');
        }
      });
      //end of tracking history
      });
      
  </script>

</html>