<!-- Modal -->
<div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog add-category-modal">
    
      <!-- Modal content-->
      <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Assign Ticket to Other User</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    
                        <div class="row">
                            <div class="col-md-12">
                            <form role="form" action="" method="post" autocomplete="off">
                               
                                <div class="form-group">
                                    <label class="control-label col-sm-5">Task Subject</label>
                                    <div class="col-sm-7">
                                    <input type="text" class="form-control" placeholder="Task Title" id="task_title" name="task_title"  id="default" required>
                                    </div>
                             <br>
                                <div class="col-12">
                                      <textarea class="form-control" style="height: 80px" placeholder="Task Message" name="docremarks" id="task" id="docdesc" required></textarea>
                                  </div> 
                                  <br>
                                <div class="col-md-12">
                                    <select class="form-select select send_act2" id="send_act2" name="send_act2" onChange="fetchOffice(this.value);">
                                      <option value="" selected="selected" disabled="disabled">Select Receiver</option>
                                          <?php
                                            require_once("include/conn.php");
                                            $query="SELECT * FROM user_information WHERE (department = 'Help Desk System') AND `id_number` NOT IN ('$verified_session_username') AND role NOT LIKE '%Help Desk Administrator%' AND role NOT LIKE '%Staff%' ORDER BY firstname DESC ";
                                            $result=mysqli_query($conn,$query);
                                            while($rs=mysqli_fetch_array($result)){
                                              $dtid =$rs['id'];    
                                              $dtno =$rs['id_number'];                                  
                                              $dtFName = $rs['firstname'];    
                                              $dtLName = $rs['lastname'];    
                                            
                                              echo '<option value = "' . $dtid . '">' . $rs["firstname"] . " " . $rs["lastname"] .'</option>';
                                            }
                                        ?>
                       
                       </select>
                                  </div>
                                
                                  <br>
                                  <div class="col-12">
                                      <textarea class="form-control" style="height: 80px" placeholder="message" name="docremarks" id="docremarks" id="docdesc" required></textarea>
                                  </div> 
                            </div>
                        </div>
                      </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button class="btn btn-success" name="send" id="send" >Submit</button>
                        </div>
                  </div>
                </div>
              </form> 
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>



        

