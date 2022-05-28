<?php  ?>
<!-- Modal of all notif -->
<div class="modal fade" id="showallNotification" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" >All Notification</h5>
      <button type="button" onclick="closeAllNotif();" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body" id="notifTable">
      <table  class="table table-hover" style="width:100%; font-size: 14px; text-align:center;" id="showNOF">
        <thead style="background: rgba(161, 213, 255, 0.1);">
          <tr>
            <th>Status</th>
            <th>Request</th>
            <th>Course</th>
            <th>School Year</th>
            <th>Year Level</th>
          </tr>
        </thead>


        <tbody id="notificationTable">
          <?php
            require_once 'Config.php';

            $dtmsRequest = $db->query('SELECT * FROM gac_datarequest WHERE Department=?
              ORDER BY created_at desc', "Document Approval Tranking And Mngt")->fetchAll();
            foreach ($dtmsRequest as $req) :

              if ($req["Request_Status"] == "Pending")
              {
                if ($req["Notification_Status"] == "Unread")
                {
                  echo '
                        <tr style="background-color:#f2f7f7;" onclick="showCurrentNofif('.$req["ID"].','; echo "'notifInfo'"; echo ');">
                                  <td><i class="bi bi-exclamation-circle text-primary"></i></td>
                                  <td>Requesting student information</td>
                                  <td><b>'.$req["Student_Course"].'</b></td>
                                  <td><b>'.$req["Student_School_year"].'</b></td>
                                  <td><b>'.$req["Student_Year_Level"].'</b></td>
                            </tr>';
                }
                else
                {
                  echo '  <tr>
                            <td><i class="bi bi-exclamation-circle text-primary"></i></td>
                            <td>Requesting student information</td>
                            <td><b>'.$req["Student_Course"].'</b></td>
                            <td><b>'.$req["Student_School_year"].'</b></td>
                            <td><b>'.$req["Student_Year_Level"].'</b></td>
                          </tr>';
                }
              }
              if ($req["Request_Status"] == "Approved")
              {
                echo '  <tr>
                          <td><i class="bi bi-exclamation-circle text-success"></i></td>
                          <td>Requesting student information</td>
                          <td><b>'.$req["Student_Course"].'</b></td>
                          <td><b>'.$req["Student_School_year"].'</b></td>
                          <td><b>'.$req["Student_Year_Level"].'</b></td>
                        </tr>';
              }
              if ($req["Request_Status"] == "Declined")
              {
                echo '  <tr>
                          <td><i class="bi bi-exclamation-circle text-danger"></i></td>
                          <td>Requesting student information</td>
                          <td><b>'.$req["Student_Course"].'</b></td>
                          <td><b>'.$req["Student_School_year"].'</b></td>
                          <td><b>'.$req["Student_Year_Level"].'</b></td>
                        </tr>';
              }

            endforeach;


           ?>
        </tbody>
      </table>

    </div>

  </div>
</div>
</div>


<div class="modal fade" id="showEachNotific" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content"  style="Background-color: transparent; border-color: transparent;">

    <div class="modal-body" >
      <div id="notifInfo"></div>
    </div>

  </div>
</div>
</div>


<script>

    $(document).ready(function() {
        $('#showNOF').DataTable();
    } );
</script>
