<table  class="table table-hover" style="width:100%; font-size: 14px; text-align:center;" id="showNOF">
  <thead style="background: rgba(161, 213, 255, 0.1);">
    <tr style="">
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
