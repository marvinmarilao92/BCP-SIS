
  
                  <?php
                    require_once("include/conn.php");
                    $query="SELECT * FROM datms_office ORDER BY off_name ASC ";
                    $result=mysqli_query($conn,$query);
                    while($rs=mysqli_fetch_array($result)){
                      $offid =$rs['off_id'];
                      $offCode = $rs['off_code'];
                      $offName = $rs['off_name'];        
                      $offLoc = $rs['off_location'];
                      $offDate = $rs['off_date'];
                  ?>
                  <tr>
                    <td style="display:none"><?=$rs['off_id'];?></td>
                    <td style="display:none"><?=$rs['off_code'];?></td>
                    <td><?=$rs['off_name'];?></td>
                    <td style="display:none"><?=$rs['off_location'];?></td>
                    <td><?=$rs['off_date'];?></td>
                    
                    <td style="align-self: center;">  
                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">                     
                        <button class="btn btn-primary viewbtn"><i class="bi bi-eye"></i></button>
                        <button class="btn btn-success editbtn"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-danger deletebtn" ><i class="bi bi-trash" ></i></button>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
        