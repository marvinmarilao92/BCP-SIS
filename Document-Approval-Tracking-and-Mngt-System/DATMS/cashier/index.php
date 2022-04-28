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
                  <span class="d-none d-lg-block">PAYMENT STATUS UPDATE</span>
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
                        <label for="floatingName">Admission Code</label>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="or_number" id="or_number" placeholder="First Name" style="text-transform:capitalize;" required>
                        <label for="floatingName">OR Number</label>
                      </div>
                    </div>
                   
                    <div class="col-12 text-center">
                      <button class="btn btn-primary " id="btnpaid">Paid</button>
                      <button type="reset" class="btn btn-secondary">Reset</button>
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
<script>
    // Prevent you from turning back or using back button
      (function (global) {

        if(typeof (global) === "undefined") {
            throw new Error("window is undefined");
        }

        var _hash = "!";
        var noBackPlease = function () {
            global.location.href += "#";

            // Making sure we prevent user to use any form of return function 
            global.setTimeout(function () {
                global.location.href += "!";
            }, 50);
        };

        global.onhashchange = function () {
            if (global.location.hash !== _hash) {
                global.location.hash = _hash;
            }
        };

        global.onload = function () {
            noBackPlease();

            // Disables backspace on page except on input fields and textarea..
            document.body.onkeydown = function (e) {
                var elm = e.target.nodeName.toLowerCase();
                if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                    e.preventDefault();
                }
                // Stopping the event bubbling up the DOM tree...
                e.stopPropagation();
            };
        }
      })(window);
    // modal JS and ajax function
      $(document).ready(function () {

          // update payment function
          $('#btnpaid').click(function(a){ 
              a.preventDefault();
                if($('#adm_code').val()!="" && $('#or_number').val()!=""){
                  $.post("function/payment.php", {
                    admcode:$('#adm_code').val(),
                    ornumber:$('#or_number').val()
                    },function(data){
                    if (data.trim() == "failed"){                          
                      Swal.fire("No application registered to that code","","error");//response message
                      // Empty test field
                      $('#adm_code').val("")
                      $('#or_number').val("")
                    }else if(data.trim() == "success"){                          
                            //success message
                            const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1100,
                            timerProsressBar: true,
                            didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                            
                            }
                            })
                          Toast.fire({
                          icon: 'success',
                          title:'You successfully updated payment status'
                          }).then(function(){
                            document.location.reload(true)//refresh pages
                          });
                            $('#adm_code').val("")
                            $('#or_number').val("")
                      }else{
                        Swal.fire(data);
                    }
                  })
                }else{
                  Swal.fire("You must fill out every field","","warning");
                }
              })
          // End Save Department function

      });
    // input numbers only
      function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)){
          return false;
        }else{
            return true;
        }
      }
  </script>
</body>

</html>