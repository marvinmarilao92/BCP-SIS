<?php
  //include the new connection
include "includes/new_db.php";

$success=false;
$error=false;


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['id'])){
    $db=new DB();
    $ticket_q=$db->conn->query("SELECT * FROM hdms_tickets WHERE ticket_id='".$_POST['id']."'");
    if($ticket_q->num_rows > 0){
        while ($row  = $ticket_q->fetch_assoc()) {
            header("Location: ticket_list.php?id=".$row['id']);
        }
       
    }else {
      exit("invalid ticket id");
    }
}



     ?>
   
        <!-- Vertically centered Modal -->
      
        <div class="modal fade" id="verticalycentered" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Welcome to view your ticket</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="POST" action = "view_ticket.php">
                    <div class="card-header">Check your email for ticket ID</div>
                       <p>Type your ticket id to track your concern and make an update</p>
                       <div class="card-body">
                            <?php 
                                if(isset($error) && $error != false){
                                    echo '<div class="alert alert-danger">'.$error.'</div>';
                                }
                            ?>
                                <?php 
                                if(isset($success) && $success != false){
                                    echo '<div class="alert alert-success">'.$success.'</div>';
                                }
                            ?>
                           <div class="form-group">
                               <label>Enter Your Ticket ID:</label>
                               <input type="text" name="id" id="id" autocomplete = "off" required class="form-control">
                           </div>
                           <div class="form-group">
                               <button class="btn btn-primary btn">Submit</button>
      
                           </div>
                           </form>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     
                    </div>
                  </div>
                </div>
              </div><!-- End Vertically centered Modal-->
              