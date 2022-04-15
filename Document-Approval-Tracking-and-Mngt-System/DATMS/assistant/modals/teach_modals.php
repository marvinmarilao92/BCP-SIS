  <!-- Student Modals -->
      <!-- View Student modal -->
      <div class="modal fade" id="ViewModal<?php echo $adm_id;?>" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered modal-l">

                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">TEACHERS INFORMATION</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                            <div class="card-body">
                              
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                  
                                  <h5 class="card-title">Profile Details</h5>
                                  <div class="row">
                                    <h6>Fullname&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $rs['firstname'].' '.$adm_mname.' '.$rs['lastname']; ?></h6>                              
                                  </div>

                                  <div class="row">
                                    <h6>Program&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $rs['course'];?></h6>                              
                                  </div>
                                  
                                  <div class="row">
                                    <h6>Birthday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?php echo $rs['birthday'];?></h6>                                 
                                  </div>

                                  <div class="row">
                                    <h6>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $rs['gender'];?></h6>                              
                                  </div>

                              
                                  <div class="row">
                                    <h6>Country of Origin&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $rs['nationality'];?></h6> 
                                  </div>

                                  <div class="row">
                                    <h6>Civil Status&nbsp;&nbsp;&nbsp;: <?php echo $rs['civil_status'];?></h6>
                                  </div>

                                  <div class="row">
                                    <h6>Phone No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?php echo $rs['contact'];?></h6>
                                  </div>                                  
                              
                                  <div class="row">
                                    <h6>Email&nbsp;&nbsp;&nbsp;:<?php echo $rs['email'];?></h6>
                                  </div>
                                  
                                  <div class="row">
                                    <h6>Address&nbsp;&nbsp;&nbsp;:<?php echo $rs['address'];?></h6>
                                  </div>                          
                                
                                  <div class="row">
                                    <h6>Date Created&nbsp;&nbsp;&nbsp;:<?php echo $rs['date'];?></h6>
                                  </div>
                                </div> 

                          </div>   
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
        </div>
      <!-- End View department Modal-->

      <!-- Delete Student Modal -->

      <!-- End delete Student Modal -->
  <!-- End of Student Modals -->

