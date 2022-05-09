<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Direct Email</title>
<head>
  <?php include ('core/css-links.php');//css connection?>
  <?php  include "core/key_checker.php"; ?>
</head>

<body>
<div id="loader" class="center"></div>
 <!-- Header -->
<?php include ('core/header.php');//Design for  Header?>
<!-- end of header -->

<!-- Side navbar -->
<?php $page = 'contact'; include ('core/side-nav.php');//Design for sidebar?>
<!-- end of side navbar -->

<!-- Main Class -->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Direct Email</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Setting</li>
          <li class="breadcrumb-item active">Direct Email</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section contact">

      <div class="row gy-4">

        <div class="col-xl-6">

          <div class="row">
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-geo-alt"></i>
                <h3>Address</h3>
                <p>#1071 Brgy. Kaligayahan, Quirino Highway<br>Novaliches Quezon City, Philippines 1123</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p>(02) 417-4355<br>(02) 799-6617</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p>bcp.edu.ph<br><a href="https://www.facebook.com/bcpofficialpage/" target="_blank">Bestlink College of the Philippines</a></p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-clock"></i>
                <h3>Office Hours</h3>
                <p>Monday - Friday<br>9:00AM - 05:00PM</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-6">
          <div class="card p-4">
            <form action="" method="post" >
              <div class="row gy-4">

                <div class="col-md-12">
                    <div class="form-floating">
                    <input type="text" class="form-control" name="acc_no" id="acc_no" placeholder="Account No." required>
                      <label for="floatingName">Account No.</label>
                    </div>
                </div>                 

                <div class="col-md-12">
                    <div class="form-floating">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                      <label for="floatingName">Subject</label>
                    </div>
                </div>                                  

                <div class="col-12" >
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="message" name="message" id="message" style="height: 200px;"></textarea>
                    <label for="message">Message</label>
                  </div>
                </div>

                <div class="col-md-12 text-center">                
                  <button class="btn btn-primary btn-lg"  id="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div>

        </div>

      </div>

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center" style="background-color: rgb(13, 110, 253);"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>
 
</body>
  <script type="text/javascript">
    // modal JS and ajax function
    $(document).ready(function () {
      $('#submit').click(function(a){ 
        a.preventDefault();
        if($('#acc_no').val()!="" && $('#subject').val()!=""&& $('#message').val()!=""){
          $.post("email/direct_email.php", {
            accNumber:$('#acc_no').val(),
            emailSubject:$('#subject').val(),
            emailMessage:$('#message').val()
            },function(data){
            if (data.trim() == "failed"){
              Swal.fire("Failed to submit your email","","error");//response message
              // Empty test field
              $('#acc_no').val("")
              $('#subject').val("")
              $('#message').val("")
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
                  title:'Direct email is successfully submitted'
                  }).then(function(){
                    // document.location.reload(true)//refresh pages
                  
                  });
                  $('#acc_no').val("")
                  $('#subject').val("")
                  $('#message').val("")
              }else{
                Swal.fire(data);
            }
          })
        }else{
          Swal.fire("You must fill out every field","","warning");
        }
      })
      
    });
    //loding effect
    document.onreadystatechange = function() {
      if (document.readyState !== "complete") {
          document.querySelector(
            "body").style.visibility = "hidden";
          document.querySelector(
            "#loader").style.visibility = "visible";
      } else {
          document.querySelector(
            "#loader").style.display = "none";
          document.querySelector(
            "body").style.visibility = "visible";
      }
    };
    // End ajax function
  </script>
</html>