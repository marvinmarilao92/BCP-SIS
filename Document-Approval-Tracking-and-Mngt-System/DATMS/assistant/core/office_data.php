<!-- Table for Office records -->
<table class="table table-hover datatable">
                <thead>
                  <tr>
                  <th style="visibility: collapse;" WIDTH="1%"></th>
                    <th scope="col" WIDTH="85%">Office</th>
                    <th scope="col">Action</th>
                  <th style="visibility: collapse;" WIDTH="1%"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    require_once("include/conn.php");
                    $query="SELECT * FROM datms_office ORDER BY off_date DESC ";
                    $result=mysqli_query($conn,$query);
                    while($rs=mysqli_fetch_array($result)){
                      $offid =$rs['off_id'];
                      $offName = $rs['off_name'];
                  ?>
                  <tr>
                   <td style="visibility: collapse;" WIDTH="1%"><?php echo $offid; ?></td>
                    <td WIDTH="85%"><?php echo $offName; ?></td>
                    <td>
                      <button class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
                      <button class="btn btn-primary"><i class="bi bi-eye"></i></button>
                      <button class="btn btn-danger" id="delete"><i class="bi bi-trash" ></i></button>
                    </td>
                  
                  </tr>

                  <?php }
                  
                  ?>
                  
                </tbody>
              </table>
              <!-- End of office table record -->
              <?php include ('js.php');//css connection?>