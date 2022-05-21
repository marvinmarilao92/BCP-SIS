<!-- logout modal -->
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

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1"  aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title">Payment</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="text-align: justify; text-justify: inter-word; overflow-y: scroll;  height:420px; ">
                    
                    <form class="row g-3 needs-validation" action="constrait/ToPay.php" method="POST">
                    
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
                              <input type="number" class="form-control" name="amount" id="amount"  pattern="[a-zA-Z0-9]+" placeholder="Amount" required autofocus>
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

              