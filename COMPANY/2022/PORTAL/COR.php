<!DOCTYPE html>
<html lang="en">
<?php require 'control/check-session-login.php';
if ($user_online == "true") {
if ($role == "coordinator") {
}else{
header("location:../");   
}
}else{
header("location:../"); 
}   
?>
<head>
  <title>BCP | Certificate of Registration Form</title>
  <?php require 'drawer/header.php'?>
</head>

<body>
    <?php require 'drawer/modal.php' ?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <?php require'drawer/navbar.php' ?><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <?php require 'drawer/sidebar.php'?>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="page-title" >
      <aria-label class="display-5" style="font-size: 2rem";><b>Bestlink College of the Philippines</b></aria-label>
    </div><!-- End Page Title -->
    <hr class="my-4">
    <!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <br>
          <div class="card">
            <div class="card-body">
              <br>
              <div class="row justify-content-center" >
              <img src="../assets/img/BCPlogo.png" style="width: 20%;
                                                          height: auto;">
         
             </div>
             <br>
   
                <label class="row justify-content-center" style="font-size: 1.8rem;
                font-family: monospace;" >
                 Certificate of Registration
                </label>

                <br>
                <br>
                
                <form class="row g-3 needs-validation" action="includes/applyy.php" method="POST" enctype="multipart/form-data">

                        <div class="col-lg-6">
                            <div class="form-floating">
                              <select type="text" class="form-select" name="co_id" id="co_id" placeholder="Trainee_ID" required autofocus readonly>
                              </select>
                              <label for="floatingName">Trainee ID</label>
                            </div>
                            
                          </div>

                          <div class="col-lg-6">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="co_id" id="co_id" placeholder="Trainee_ID" required autofocus readonly>
                              
                              <label for="floatingName">Name of Trainee</label>
                            </div>
                              
                          </div>
                          <div class="col-lg-12 ">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="co_id" id="co_id" placeholder="Trainee_ID" required autofocus>
                              
                              <label for="floatingName">Department</label>
                            </div>
                           
                          </div>
                          <div class="col-lg-12 ">
                            <div class="form-floating">
                              <select type="text" class="form-select" name="s_course" aria-label="State" id="lvl" onchange="oncollapse()" required autofocus>
                              <option value="" style="color:black" select ed="selected" disabled>Shift</option>
                              <option>Morning</option>
                              <option>Night</option>
                              </select>
                              
                              <label for="floatingName">Shift</label>
                            </div>
                          <br>  
                          </div>
                          <hr>

                          <br>
                          <div class="col-lg-12"style="font-size: 1.5rem;
                font-family: monospace;">
                            <div class="form-floating">
                              
                              
                              <center><label for="floatingName">Working days</label></center>
                            </div>
                          <br>  
                             
                          </div>
                           
                          
                          <div class="col-lg-5">

                            <div class="form-floating">
                              <select type="text" class="form-select" name="s_course" aria-label="State" id="lvl" onchange="oncollapse()" required autofocus>
                              <option value="" style="color:black" select ed="selected" disabled>Select a Day</option>
                              <option>Monday</option>
                              <option>Tuesday</option>
                              <option>Wednesday</option>
                              <option>Thurssday</option>
                              <option>Friday</option>
                              <option>Saturday</option>
                              <option>Sunday</option>
                              </select>
                              <label for="floatingName">Day</label>
                            </div>  

                          </div>
                          <div class="col-lg-2">

                           
                              <center><label for="floatingName">To</label></center>
                            
                              
                          </div>
                          <div class="col-lg-5">

                            <div class="form-floating">
                              <select type="text" class="form-select" name="s_course" aria-label="State" id="lvl" onchange="oncollapse()" required autofocus>
                              <option value="" style="color:black" select ed="selected" disabled>Select a Day</option>
                              <option>Sunday</option>
                              <option>Monday</option>
                              <option>Tuesday</option>
                              <option>Wednesday</option>
                              <option>Thursday</option>
                              <option>Friday</option>
                              <option>Saturday</option>
                              </select>
                              <label for="floatingName">Day</label>
                              
                            </div>
                            <br>
                          </div>
                          <hr>
                          <br>
                          <div class="col-lg-12 " style="font-size: 1.5rem;
                font-family: monospace;">
                            <div class="form-floating">
                              
                              
                              <center><label for="floatingName">Working Time</label></center>
                            </div>
                          <br>  
                             
                          </div>
                           
                          
                          <div class="col-lg-5">

                            <div class="form-floating">
                             <input type="time" class="form-control" name="co_id" id="co_id" placeholder="Trainee_ID" required autofocus>
                             
                              
                          
                              <label for="floatingName">Starting Time</label>
                            </div>  

                          </div>
                          <div class="col-lg-2">

                           
                              <center><label>To</label></center>
                            
                              
                          </div>
                          <div class="col-lg-5">

                            <div class="form-floating">
                              <input type="time" class="form-control" name="co_id" id="co_id" placeholder="Trainee_ID" required autofocus >
                              
                              <label for="floatingName">End Time</label>
                              
                            </div>
                            <br>
                          </div>

                           
                                    <button type ="submit"   name ="submit" class="btn btn-primary btn-lg rounded-pill" >Submit</button>
                                    

                                  </form>

                                
              <br>


              
              
              
     
            </div>
          </div>
          </div>
          </div>


          



        </div>

        
      </div>
    </section>




  </main><!-- End #main -->
  <br>
  <br>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    
    <?php require 'drawer/footer.php'?> 
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php  require 'drawer/js.php' ?>

</body>

</html>