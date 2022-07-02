<!DOCTYPE html>
<html lang="en">
<?php require 'control/check-session-login.php';
if ($user_online == "true") {
if ($role == "Company Coordinator") {
}else{
header("location:../");   
}
}else{
header("location:../"); 
}   
?>
<head>
  <title>BCP | Evaluation Form</title>
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
   
                <label class="row justify-content-center">
                  ON-THE-JOB TRAINING PERFORMANCE
                  EVALUATION SHEETS
                </label>

                <br>
                <br>
                <div class="table-responsive-lg">
                <form class="row g-3 needs-validation" action="includes/applyy.php" method="POST" enctype="multipart/form-data">

                        <div class="col-lg-12">
                            <div class="form-floating">
                              <select type="text" class="form-select" name="co_id" id="co_id" placeholder="Trainee_ID" required autofocus readonly>
                              </select>
                              <label for="floatingName">Trainee ID</label>
                            </div>
                            <br>
                          <br>
                          </div>


                           <div class="col-lg-9">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="sname" id="co_id" placeholder="surname" required autofocus >
                              <label for="floatingName">Name</label>
                            </div>
                          </div>
                          <br>

                          <div class="col-lg-3">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="fname" id="fname" placeholder="middlename" required autofocus>
                              <label for="floatingName">AGE</label>
                            </div>
                          </div>
                          <br>

                          <div class="col-lg-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="mname"  id="mname" placeholder="middlename" required autofocus >
                              <label for="floatingName">Courses</label>
                            </div>
                          </div>
                          <br>

                          <div class="col-lg-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="address"  value="1071 Brgy. Kaligayahan Quirino Highway, Novaliches Quezon City"id="address" placeholder="address" required autofocus readonly>
                              <label for="floatingName"style="font-size: 0.8rem;">City Address</label>
                            </div>
                          </div>
                          <br>
                          <div class="col-lg-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="address"  id="address" placeholder="address" required autofocus readonly>
                              <label for="floatingName">Permanent Address</label>
                            </div>
                          </div>
                          <br>
                          <div class="col-lg-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="zipcode"  id="zipcode" placeholder="zipcode" required autofocus readonly>
                              <label for="floatingName" style="font-size: 0.8rem;">NO. OF TRAINING HOURS REQUIRED: MINIMUM OF 486 HRS </label>
                            </div>
                            <br>
                          <br>
                         
                          </div>

                          <hr class="my-4">
                        

                          <br>

                          <div class="col-lg-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="zipcode"  id="zipcode" placeholder="zipcode" required autofocus >
                              <label for="floatingName">DIVISION ASSIGNED: </label>
                            </div>
                            
                          </div>
                          <div class="col-lg-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="zipcode"  id="zipcode" placeholder="zipcode" required autofocus >
                              <label for="floatingName">FIELD TRAINING GIVEN: </label>
                            </div>
                          
                          </div>
                          <div class="col-lg-6">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="zipcode"  id="zipcode" placeholder="zipcode" required autofocus readonly>
                              <label for="floatingName">INCLUSIVE OF TRAINING DATE </label>
                            </div>
                            
                          </div>
                          <div class="col-lg-3">
                            <div class="form-floating">
                              <input type="date" class="form-control" name="zipcode"  id="zipcode" placeholder="zipcode" required autofocus >
                              <label for="floatingName">FROM:  </label>
                            </div>
                            
                          </div>
                          <div class="col-lg-3">
                            <div class="form-floating">
                              <input type="date" class="form-control" name="zipcode"  id="zipcode" placeholder="zipcode" required autofocus >
                              <label for="floatingName">TO: </label>
                            </div>
                            
                          </div>
                          <div class="col-lg-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="zipcode"  id="zipcode" placeholder="zipcode" required autofocus >
                              <label for="floatingName">TOTAL NO. OF HOURS RENDERED BY TRAINEE:</label>
                            </div>
                             <br>
                            <br>
                          </div>

                           <div class="col-lg-12">

                <table class=".table-borderless" style="font-size: 0.8rem;">
                <thead>
                  <tr>
                   
                    
                    <th scope="col" class="row justify-content-center">Job Factors&nbsp;</th>
                    <th scope="col" >Max Rating to be Given</th>
                    <th scope="col"class="row justify-content-center">Rating</th>
                   

                  </tr>
                </thead>

                

                <tbody>
                  <tr>
                    <th scope="row">1.  Quality of Work
(throughness, accuracy,
neatness & effectiveness)
                    </th>
        
                    <td>
                      20%
                    </td>
                    <td>
                        <div class="form-floating">
                              <input type="text" class="form-control" name="zipcode"  id="zipcode" placeholder="zipcode" required autofocus >
                              <label for="floatingName">Rating</label>
                            </div>
                            <br>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2.  Quantity of Work
                    (able to complete work in
                    allotted time)
                    </th>
        
                    <td>
                      20%
                    </td>
                    <td>
                        <div class="form-floating">
                              <input type="text" class="form-control" name="zipcode"  id="zipcode" placeholder="zipcode" required autofocus >
                              <label for="floatingName">Rating</label>
                            </div>
                            <br>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      3.  Dependability, Reliability
                          & Resourcefulness
                        (ability to work with
                        minimum amount of
                          supervision)  

                    </th>
                    <td>
                      15%
                    </td>
                    <td>
                      <div class="form-floating">
                              <input type="text" class="form-control" name="zipcode"  id="zipcode" placeholder="zipcode" required autofocus >
                              <label for="floatingName">Rating</label>
                            </div>
                            <br>
                    </td>
                    
                  </tr>
                  <tr>
                    <th scope="row">
                      4.  Attendance
(punctuality in office
attendance and proper
observation of break time
periods)

                    </th>
                    <td>15%</td>
                    <td>
                      <div class="form-floating">
                              <input type="text" class="form-control" name="zipcode"  id="zipcode" placeholder="zipcode" required autofocus >
                              <label for="floatingName">Rating</label>
                            </div>
                            <br>
                    </td>
                    
                  </tr>
                  <tr>
                    <th scope="row">
                      5.  Cooperation
(works well with
everyone; good team
player) 

                    </th>
                    <td>10%</td>
                    <td>
                      <div class="form-floating">
                              <input type="text" class="form-control" name="zipcode"  id="zipcode" placeholder="zipcode" required autofocus >
                              <label for="floatingName">Rating</label>
                            </div>
                            <br>
                    </td>
                    
                  </tr>
                  <tr>
                    <th scope="row">
                      6.  Judgment
(sound decisions)

                    </th>
                    <td>10%</td>
                    <td>
                      <div class="form-floating">
                              <input type="text" class="form-control" name="zipcode"  id="zipcode" placeholder="zipcode" required autofocus >
                              <label for="floatingName">Rating</label>
                            </div>
                            <br>
                    </td>
                    
                  </tr>
                  <tr>
                    <th scope="row">
                      7.  Personality
(personal grooming and
Pleasant disposition)
    
                    </th>
                    <td>10%</td>
                    <td><div class="form-floating">
                              <input type="text" class="form-control" name="zipcode"  id="zipcode" placeholder="zipcode" required autofocus >
                              <label for="floatingName">Rating</label>
                            </div>
                            <br>
                    </td>
                    
                  </tr>
                </tbody>
              </table>
                </div>

                <div class="col-lg-6">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="zipcode"  id="zipcode" placeholder="zipcode" required autofocus >
                              <label for="floatingName">Total Rating: </label>
                            </div>
                          
                          </div>
                          <div class="col-lg-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="zipcode"  id="zipcode" placeholder="zipcode" required autofocus >
                              <label for="floatingName">Recommendation for the trainee’s future growth: </label>
                            </div>
                          <br>
                          <br>
                          </div>
                                    <button type ="submit"   name ="submit" class="btn btn-primary btn-lg rounded-pill" >Submit</button>


                                  </form>

                                </div>
              

              
              
              
     
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