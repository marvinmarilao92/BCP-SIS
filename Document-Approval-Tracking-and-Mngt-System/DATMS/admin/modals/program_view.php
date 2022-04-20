 
  <!-- Student Modals -->

      <!-- View Student modal -->
      <div class="modal fade" id="ViewModal<?php echo $progid;?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-l">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">PROGRAM INFORMATION</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">          
                <div class="card-body">                              
                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        
                        <h5 class="card-title">Department Details</h5>
                        <div class="row">
                          <h6>Code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $progCode; ?></h6>                              
                        </div>

                        <div class="row">
                          <h6>Program&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $progName;?></h6>                              
                        </div>
                        
                        <div class="row">
                          <h6>Date Created:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?php echo $date;?></h6>                                 
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
  <!-- End of Student Modals -->
