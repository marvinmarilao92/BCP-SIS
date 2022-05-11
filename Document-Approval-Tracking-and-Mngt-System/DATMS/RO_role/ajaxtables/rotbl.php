<!-- Table for Role records -->
<table class="table table-bordered" id="ROTable" style="display: none;">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Username</th>
      <th scope="col">Lastname</th>
      <th scope="col">Firstname</th>
      <th scope="col">Middlename</th>
      <th scope="col">Email</th>
      <th scope="col" >Contact</th>
      <th scope="col">Complete Address</th>    
      <th scope="col">Department</th>
      <th scope="col">Subsystem</th>
      <th scope="col">Role</th>
      <th scope="col" >Account Status</th>
      <th scope="col" >Last Access</th>
                  
    </tr>
  </thead>
  <tbody>
    <?php
      require_once("include/conn.php");
      $query="SELECT *, LEFT(middlename,1) as MI FROM user_information WHERE `admin` NOT IN ('1') AND `role` = 'DATMS Approver'";
      $result=mysqli_query($conn,$query);
      while($rs=mysqli_fetch_array($result)){
        $uid =$rs['id']; 
        $uname = $rs['id_number']; 
        $fname = $rs['firstname'];      
        $lname =$rs['lastname'];
        $mname = $rs['middlename']; 
        $email = $rs['email'];                       
        $con =$rs['contact'];
        $add =$rs['address']; 
        $off = $rs['office']; 
        $dept = $rs['department'];      
        $role =$rs['role'];
        $as = $rs['account_status']; 

        $sql1 = "SELECT * FROM users WHERE id_number = '$uname' ORDER BY last_access DESC ";
            if($result1 = mysqli_query($link, $sql1)){
              if(mysqli_num_rows($result1) > 0){
                while($row1 = mysqli_fetch_array($result1)){
                  $LA = $row1['last_access'];                                          
                }
                // Free result set
                mysqli_free_result($result1);
              }
            }
    ?>
    <tr>
      <td><?php echo $uid; ?></td>
      <td><?php echo $uname; ?></td>
      <td><?php echo $lname; ?></td>
      <td><?php echo $fname; ?></td>
      <td><?php echo $mname?></td>                                          
      <td><?php echo $email; ?></td>
      <td><?php echo $con; ?></td>
      <td><?php echo $add; ?></td>
      <td><?php echo $off; ?></td>
      <td><?php echo $dept?></td>             
      <td><?php echo $role; ?></td>
      <td><?php echo $as; ?></td>
      <td><?php echo $LA; ?></td>     
    </tr>

    <?php 
    } ?>
    
  </tbody>
</table>
<!-- End of Table -->