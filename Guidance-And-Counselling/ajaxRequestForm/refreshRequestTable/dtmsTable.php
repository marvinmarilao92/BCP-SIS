<table  class="table table-hover" style="width:100%; font-size: 14px; text-align:center;" id="DATMSINFO">
  <thead style="background: rgba(161, 213, 255, 0.1);">
    <tr style="">
      <th>Department</th>
      <th>Status</th>
      <th>Classification</th>
      <th>Course</th>
      <th>School year</th>
      <th>Year Level</th>
      <th>Remarks</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody >
      <?php
      require_once '../../Config.php';
      $dtmsRequest = $db->query('SELECT * FROM gac_datarequest ORDER By created_at DESC')->fetchAll();
      foreach ($dtmsRequest as $request)
      {
        if ($request["Request_Status"] == "Pending")
        {
          echo
              '<tr>
                <td>'.$request["Department"].'</td>
                <td>'.$request["Request_Status"].'</td>
                <td>'.$request["Student_Classification"].'</td>
                <td>'.$request["Student_Course"].'</td>
                <td>'.$request["Student_School_year"].'</td>
                <td>'.$request["Student_Year_Level"].'</td>';
                if ($request["Request_Remarks"] != null) echo '  <td>'.$request["Request_Remarks"].'</td>'; else echo '<td> - </td>';
           echo
               '<td>

                  <button type="button" onclick="deleteRequestDTMS('.$request["ID"].');" class="btn btn-danger"><i class="bi bi-trash"></i></button>
               </td>
            </tr>';
        }
        else
        {
          echo
              '<tr>
                <td>'.$request["Department"].'</td>
                <td>'.$request["Request_Status"].'</td>
                <td>'.$request["Student_Classification"].'</td>
                <td>'.$request["Student_Course"].'</td>
                <td>'.$request["Student_School_year"].'</td>
                <td>'.$request["Student_Year_Level"].'</td>';
                if ($request["Request_Remarks"] != null) echo '  <td>'.$request["Request_Remarks"].'</td>'; else echo '<td> - </td>';
           echo
               '<td>

                  <button type="button"  disabled class="btn btn-danger"><i class="bi bi-trash"></i></button>
               </td>
            </tr>';
        }
      }
       ?>
  </tbody>
</table>
