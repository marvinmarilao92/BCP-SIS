<?php session_start();

require_once 'Config.php';
require_once 'timezone.php';
$updateReg = $db->query('UPDATE gac_datarequest SET Request_Status=? , Request_Remarks=?, updated_at=? WHERE ID=?',
"Declined", "Request has been declined due to bad request or student Information
isn't available", $time, $_SESSION["current_Request"]);


echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">

        <strong>Declined!</strong> Request has been declined!

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
 ?>
