<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$new_status=0;
$waiting_reply_status=1;
$closed_status=2;

$new_count=0;
$reply_count=0;
$closed_count=0;

$db=new DB();

$latest=[];
$recodes=$db->conn->query("SELECT * FROM hdms_tickets WHERE status=2 ORDER BY 'date' DESC ");
if($recodes->num_rows >0){
    while ($row = $recodes->fetch_assoc()) {
        $latest[]=$row;
    }
}

?>


        <!-- Vertically centered Modal -->
      
        <div class="modal fade" id="largeModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Done Tickets</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="card">
                <div class="card-header">
                   
                </div>
                <div class="card-body">
                    <?php if(count($latest) > 0){?>
                        <table class="table table-hover datatable">
                        <thead>
                            <tr>
                               
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                              
                              
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($latest as $k => $v) {
                                    echo '
                                    <tr>
                                       
                                        <td>'.decryptthis($v['email'], $key).'</td>
                                        <td>'.$v['category'].'</td>
                                        <td>'.decryptthis($v['message'], $key).'</td> ';?>
                                        
                                        <td data-title = "Department ">
                                        <?php if($v['ticket_department'] == "hdms Accounting"): ?>
                                          <span class="badge bg-primary">Accounting</span>
                                        <?php elseif($v['ticket_department'] == "hdms Registrar"): ?>
                                          <span class="badge bg-warning text-dark">Registrar</span>
                                          <?php elseif($v['ticket_department'] == "hdms Admission"): ?>
                                          <span class="badge bg-secondary">Admission</span>
                                          <?php elseif($v['ticket_department'] == "hdms Cashier"): ?>
                                          <span class="badge bg-info">Cashier</span>
                                        <?php elseif($v['ticket_department'] == ""): ?>
                                          <span class="badge bg-success">Staff</span>
                                        <?php else: ?>
                                          <span class="badge badge-secondary">Closed</span>
                                        <?php endif; ?>
                                      </td>
                                        <td data-title = "Status ">
                                        <?php if($v['status'] == 0): ?>
                                          <span class="badge bg-primary">New</span>
                                        <?php elseif($v['status'] == 1): ?>
                                          <span class="badge bg-warning text-dark">Pending</span>
                                        <?php elseif($v['status'] == 2): ?>
                                          <span class="badge bg-success">Done</span>
                                        <?php else: ?>
                                          <span class="badge badge-secondary">Closed</span>
                                        <?php endif; ?>
                                      </td>
                                      <?php   
                                      echo ' 
                                        <td>'.$v['date'].'</td>
                                        <td><a class="btn btn-primary " href="view_ticket.php?id='.$v['id'].'" title="View"><i class="bi bi-eye-fill"></i></a></td>
                                       
                                    </tr>
                                    ';
                                }
                                ?>
                            </tbody>
                    </table>
                    <?php }else{
                        echo '<div class="alert alert-info">All of the done ticket will show here</div>';
                    } ?>
                </div>
            </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     
                    </div>
                  </div>
                </div>
              </div><!-- End Vertically centered Modal-->