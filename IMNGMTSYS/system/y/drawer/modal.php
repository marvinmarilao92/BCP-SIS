<!--Update Config-->
              <div class="modal fade" id="Extra" tabindex="-1">
                <div class="modal-dialog modal-lg" style="background-color: lightblue;" >
                  <div class="modal-content"style="background-color: whitesmoke;">
                    <div class="modal-header"style="background-color: lightblue;
                                                    height: 13vh;
                                                    ">
                      <img src="../assets/img/BCPlogo.png" alt="profile" class="rounded-circle">&nbsp;&nbsp;&nbsp;
                      <h3 class="modal-title" style="font-size: 2.5em;
                                                     font-style: italic;">Update Information</h3>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <br>
                      <br>
                    <form class="row g-3 needs-validation" action="constant/add_info.php" method="POST">

                        <div class="col-4">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="co_id" <?php echo 'value='.$verified_session_username;?> id="co_id" placeholder="Coordinator_ID" required autofocus readonly>
                              <label for="floatingName">Coordinator ID</label>
                            </div>
                          </div>
                          <br>


                      <div class="col-8">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="co_name" id="co_name" placeholder="Coordinator_Name"    required autofocus>
                              <label for="floatingName">Coordinator Name / Fullname</label>
                            </div>
                          </div>
                          <br>


                       <div class="col-6">
                            <div class="form-floating">
                              <select type="text" class="form-select" name="c_deptt" id="c_deptt" Required autofocus>
                               <option value="" style="color:black" selected="selected" disabled>Select a Department</option>
                               <option>CCS Department</option>
                               <option>BSBA Department</option>  
                              </select>
                              <label for="floatingName">Department</label>
                            </div>
                          </div>
                          <br>

                      <div class="col-3">
                            <div class="form-floating">
                              <select type="text" class="form-select" name="courses" id="courses" Required autofocus>
                               <option value="" style="color:black" selected="selected" disabled>Select a Course</option>
                               <option>BSIT</option>
                               <option>BSBA</option>  
                              </select>
                              <label for="floatingName">Course</label>
                            </div>
                          </div>
                          <br>

                      <div class="col-3">
                            <div class="form-floating">
                              <select type="text" class="form-select" name="level" id="lvl" required autofocus>
                              <option value="" style="color:black" selected="selected" disabled>Select a year level</option>
                              <option>4th Year</option>
                              <option>3rd Year</option>
                              </select>
                              <label for="floatingName">Level</label>
                            </div>
                          </div>
                          <br>

                      <div class="col-8">
                            <div class="form-floating">
                              <select type="text" class="form-select" name="position" aria-label="State" id="lvl" onchange="oncollapse()" required autofocus>
                              <option value="" style="color:black" selected="selected" disabled>Position</option>
                              <option>Coordinator</option>
                              <option>--/--/--</option>
                              </select>
                              <label for="floatingName">Position At Work</label>
                            </div>
                          </div>
                          <br>

                        
                        <div class="col-4">
                            <div class="form-floating">
                              <input type="date" class="form-control" name="dosw" id="dosw"  required autofocus>
                              <label for="floatingName">Date of Started Work</label>
                            </div>
                          </div>
                          <br>
                          <br>
                          <br>
                          <br>
                          <h3 class="modal-title" style="font-size: 2.5em;
                                                     font-style: italic;">Basic Information</h3>
                          <hr>
                          <br>
                          <br>
                            
                          

                            <div class="col-8">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="POB" id="POB" placeholder="POB"    required autofocus>
                              <label for="floatingName">Place of Birth</label>
                            </div>
                          </div>
                          <br>
                          <div class="col-4">
                            <div class="form-floating">
                              <input type="date" class="form-control" name="DOB" id="DOB" placeholder="DOB"    required autofocus>
                              <label for="floatingName">Date of Birth</label>
                            </div>
                          </div>
                          <br>
                          <div class="col-9">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="nationality" id="n" placeholder="n"    required autofocus>
                              <label for="floatingName">Nationality</label>
                            </div>
                          </div>
                          <br>

                      <div class="col-3">
                            <div class="form-floating">
                              <select type="text" class="form-select" name="gender" aria-label="State" id="lvl" onchange="oncollapse()" required autofocus>
                              <option value="" style="color:black" selected="selected" disabled>Gender</option>
                              <option>Male</option>
                              <option>Female</option>
                              </select>
                              <label for="floatingName">Gender</label>
                            </div>
                          </div>
                          <br>
                          <div class="col-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="pre_address" id="n" placeholder="n"    required autofocus>
                              <label for="floatingName">Present Address</label>
                            </div>
                          </div>
                          <br>




                                   
                    </div>
                    <div class="modal-footer"style="background-color: whitesmoke;">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                    </div>
                  </form> 
                  </div>
                </div>
              </div>  




<!-- Viewing STUDENT-->
    <div class="modal fade" id="verticalycentereddd" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="background-color: lightblue;" >
                  <div class="modal-content"style="background-color: whitesmoke;">
                    <div class="modal-header"style="background-color: lightblue;
                                                    height: 15vh;
                                                    ">
                      <img src="../assets/img/BCPlogo.png" alt="profile" class="rounded-circle">&nbsp;&nbsp;&nbsp;
                      <h3 class="modal-title" style="font-size: 2.5em;
                                                     font-family: monospace;">Student Profile</h3>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="viedd">
                    <br>
                    <br>
                    </div>
                    
                  </div>
                </div>
              </div>
            

<!-- Modal -->



<!-- viewing companyside -->
<div class="modal fade" id="empModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="background-color: lightblue;" >
                  <div class="modal-content"style="background-color: whitesmoke;">
                    <div class="modal-header"style="background-color: lightblue;
                                                    height: 13vh;
                                                    ">
                      <img src="../assets/img/BCPlogo.png" alt="profile" class="rounded-circle">&nbsp;&nbsp;&nbsp;
                      <h3 class="modal-title" style="font-size: 2.5em;
                                                     font-style: monospace;">Representative Profile</h3>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="view">
                    <br>
                    <br>
                    </div>
         
                  </div>
                </div>
              </div>


<!-- edit button for companyside-->
<div class="modal fade" id="editcompany" tabindex="-1">
                <div class="modal-dialog modal-lg"style="background-color: lightblue;">
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: lightblue;">
                      <h5 class="modal-title">Change Status</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     
                    <form class="row g-3 needs-validation" action = "constant/com_stats.php" method="POST">
                     <div class="col-12">

                     <input type="hidden" name="com_id" id="updatee_id">
                     <input type="hidden" name="companyid" id="companyid">
                     <label>Company Name</label>
                            <input type="text" name="company" id="company" class="form-control"
                                      placeholder="number" readonly>
                                      <br>
                     <label> Representative Name </label>
                            <input type="text" name="rname" id="rname" class="form-control"
                                      placeholder="name" readonly>
                                      <br>
                                      

                                <select id="inputState" name="reason" id="reason" class="form-select" Required autofocus>
                            <option value="" style="color:black" selected="selected" >Reason</option>
                            <option>This account is legit.</option>
                              <option>Fake</option>
                              <option>%^E#@#.</option>
                                </select>
                                <br>



                            <select id="inputState" name="cstatus" id="cstatus" class="form-select" Required autofocus>
                                          <option value="" style="color:black" selected="selected" >Change Status</option>
                                          <option>Approved</option>
                                          <option>Pending</option>
                                          <option>Rejected</option>   
                                      </select>
                            </div>
                 
                    </div>
                    
                      <div class="d-grid gap-2 mt-3">
               
                      <button type="companyedit" class="btn btn-primary btn-lg " name="companyedit" >CHANGE</button>
                    </div>
                    
                    </form>
                  </div>
                
                </div>
              </div>




<!-- edit button -->

<div class="modal fade" id="editModal" tabindex="-1">
                <div class="modal-dialog modal-lg"style="background-color: lightblue;">
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: lightblue;">
                      <h5 class="modal-title">Change Status</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="row g-3 needs-validation" action="constant/change.php" method="POST">
                     <div class="col-12">

                     <input type="hidden" name="update_id" id="update_id">
                   
                     <label> Student Number</label>
                            <input type="text" name="number" id="number" class="form-control"
                                      placeholder="number" readonly>
                                      <br>
                     <label> Student Name </label>
                            <input type="text" name="name" id="name" class="form-control"
                                      placeholder="name" readonly>
                                      <br>
                                       <label> Course </label>
                            <input type="text" name="course" id="course" class="form-control"
                                      placeholder="name" readonly>
                                      <br>
                                      <select type="text" name="rname" id="rname" class="form-control"
                                      placeholder="Reason" >
                                      <option value="" style="color:black" selected="selected" disabled>Reason for</option>
                                      <option>Undergoing Screening</option>
                                          
                                      </select>
                                      <br>
                                      
                                      <select id="inputState" name="status" class="form-select" Required autofocus>
                                          <option value="" style="color:black" selected="selected" disabled>Change Status</option>
                                          <option>Qualified</option>
                                          <option>Pending</option>   
                                      </select>
                            </div>
                 
                    </div>
                    
                      <div class="d-grid gap-2 mt-3">
               
                      <button type="updateid" class="btn btn-primary btn-lg " name="updateid" >CHANGE</button>
                    </div>
                    
                    </form>
                  </div>
                
                </div>
              </div>


<!-- Create Post -->

              <div class="modal fade" id="verticalycentered" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Create a Post</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="row g-3 needs-validation" action="constant/addPost.php" method="POST">
                     <div class="col-12">
                            <div class="form-floating">
                            <textarea type="text" class="form-control" name="posting" id="posting"   placeholder="myf" style="height: 90px;" required autofocus></textarea>
                              <label for="floatingName">Write a something</label>
                            </div>
                          </div>  
                    </div>
                    
                      <div class="d-grid gap-2 mt-3">
               
                      <button type="post" class="btn btn-primary btn-lg " name="post" >POST</button>
                    </div>
                    
                    </form>
                  </div>
                
                </div>
              </div>






<!--professional Qualification-->
<div class="modal fade" id="pq" tabindex="-1"  aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title">Student Form</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="text-align: justify; text-justify: inter-word; overflow-y: scroll;  height:420px; ">
                    
                    <form class="row g-3 needs-validation" action="contraits/addProf.php" method="POST">
                          
                    <div class="col-12">
                    <select id="inputState" name="stud_cat" class="form-select" Required autofocus>
                    <option value="" style="color:black" selected="selected" disabled="disabled">Select Category</option>
                      
                    <?php
                     require '../dbCon/config.php';
                       try {
                                             $conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_user, $db_pass);
                                             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      
                                             $stmt = $conn->prepare("SELECT * FROM ims_student_category");
                                             $stmt->execute();
                                             $result = $stmt->fetchAll();

                                             foreach($result as $row)
                                             {
                                            ?>
                      
                      <option style="color:black" value="<?php echo $row['category']; ?>">

                      <?php echo $row['category']; ?>
                        
                      </option>
                      
                      <?php
                                       }
                                         $stmt->execute();
            
                                       }catch(PDOException $e)
                                         {
        
                                         }
  
                      ?>

										
										

                    </select>
                    </div>
                          <br>
                          <div class="col-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="studnum" id="studnum"   placeholder="Student Number" required autofocus>
                              <label for="floatingName">Skills</label>
                            </div>
                          </div>
                          <br>
                          <div class="col-12">
                            <div class="form-floating">
                            <input type="text" class="form-control" name="pyf" id="pyf"   placeholder="course" style="" required autofocus>
                              <label for="floatingName">Course</label>
                            </div>
                          </div>
                          <br>
                          <div class="col-12">
                            <div class="form-floating">
                            <textarea type="text" class="form-control" name="pyf" id="pyf"   placeholder="myf" style="height: 90px;" required autofocus></textarea>
                              <label for="floatingName">Make your word ( Optional )</label>
                            </div>
                          </div>
                          <br>

                          <hr>
                          <h5>ADD other files ( Optional )</h5>
                          <div class="col-12">
                          <div class="container">
                                <center>
                                <span><i class="fa fa-cloud-upload text-dark fa-5x" aria-hidden="true"></i></span>
                                <p class="text-dark">Choose your file to Upload</label><br><br>
                                <input type="file" id="file" class="text-dark" accept="application/pdf" name="doc" required><br>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Accept Docx, PDF , limit 5mb only.
                                </small>
                            </center>
                          </div>
                          </div>
                          <br>
                         
                          
                    </div>
                    <div class="modal-footer">
                     
                      <button type="submit" class="btn btn-primary btn-lg  rounded-pill" name="submit">Continue</button>
                     
                    </div>
                    </form>
                  </div>
                </div>
              </div>

<!--LOGOUT MODAL-->
        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" > 
                  <div class="modal-content">
                    <div class="modal-header"style="background-color: #ff7070">
                    
                      <h3 class="modal-title"> Log out ?</h3>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    Are you sure you want to log out?
                    </div>
                    <div class="modal-footer">
                      <a type="button" class="btn btn-primary" href = "control/logout.php">Yes</a>
                      <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">No</button>
                    </div>
                  </div>
                </div>
              </div>


<!--Payment Modal-->

<div class="modal fade" id="paymentModal" tabindex="-1"  aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title">Payment</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="text-align: justify; text-justify: inter-word; overflow-y: scroll;  height:420px; ">
                    
                    <form class="row g-3 needs-validation" action="../x/contraits/ToPay.php" method="POST">
                    
                          <div class="col-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="studname" id="studname"  placeholder="Student Name" required autofocus>
                              <label for="floatingName">Student Name</label>
                            </div>
                          </div>
                          <br>
                          <div class="col-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="studnum" id="studnum"  pattern="[a-zA-Z0-9]+" placeholder="Student Number" required autofocus>
                              <label for="floatingName">Student Number</label>
                            </div>
                          </div>
                          <br>
                          <div class="col-12">
                            <div class="form-floating">
                            <input type="text" class="form-control" name="pyf" id="pyf"   placeholder="Payment For" style="height: 90px;" required autofocus>
                              <label for="floatingName">Payment For</label>
                            </div>
                          </div>
                          <br>
                          <div class="col-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="amount" id="amount"  pattern="[a-zA-Z0-9]+" placeholder="Amount" required autofocus>
                              <label for="floatingName">Amount</label>
                            </div>
                          </div>
                          <br>
                          <div class="col-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="remarks" id="remarks"   placeholder="Remarks" style="height: 90px;" required autofocus>
                              <label for="floatingName">Remarks ( Optional ) </label>
                            </div>
                          </div>
                          
                    </div>
                    <div class="modal-footer">
                     
                      <button type="submit" class="btn btn-primary btn-lg  rounded-pill" name="submit">Continue</button>
                     
                    </div>
                    </form>
                  </div>
                </div>
              </div>

              