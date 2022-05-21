
<!--professional Qualification-->
<div class="modal fade" id="pq" tabindex="-1"  aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title">Student Form</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="text-align: justify; text-justify: inter-word; overflow-y: scroll;  height:420px; ">
                    
                    <form class="row g-3 needs-validation" action="constrait/addProf.php" method="POST">
                          
                    <div class="col-12">
                    <select id="inputState" name="stud_cat" class="form-select" Required autofocus>
                    <option value="" selected="selected" disabled="disabled">Select Category</option>
                    
										 <?php
										 require 'configInt.php';
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

											<?php echo $row['category']; ?></option>
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
                              <input type="text" class="form-control" name="studnum" id="studnum"  pattern="[a-zA-Z0-9]+" placeholder="Student Number" required autofocus>
                              <label for="floatingName">Skills</label>
                            </div>
                          </div>
                          <br>
                          <div class="col-12">
                            <div class="form-floating">
                            <input type="text" class="form-control" name="pyf" id="pyf"   placeholder="Payment For" style="height: 90px;" required autofocus>
                              <label for="floatingName">Course</label>
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
                                <input type="file" id="file" class="text-dark" name="doc" required><br>
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
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                    
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
                    
                    <form class="row g-3 needs-validation" action="function/ToPay.php" method="POST">
                    
                          <div class="col-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="studname" id="studname" value="<?php echo $verified_session_firstname." ". $verified_session_lastname?>"  placeholder="Student Name" required readonly>
                              <label for="floatingName">Student Name</label>
                            </div>
                          </div>
                          <br>
                          <div class="col-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="studnum" id="studnum"  pattern="[a-zA-Z0-9]+" placeholder="Student Number" value="<?php echo $verified_session_username?>" required readonly>
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
                              <input type="number" class="form-control" name="amount" id="amount"  pattern="[a-zA-Z0-9]+" placeholder="Amount" required >
                              <label for="floatingName">Amount</label>
                            </div>
                          </div>
                          <br>
                          <div class="col-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="remarks" id="remarks"   placeholder="Remarks" style="height: 90px;" required >
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

              