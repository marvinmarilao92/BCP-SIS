<!--LOGOUT MODAL-->
        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
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

<!-- Create post --> 


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