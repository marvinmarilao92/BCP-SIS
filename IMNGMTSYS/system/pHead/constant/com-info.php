<?php
include_once '../control/check-session-login.php';

 
$userid = $_POST['userid'];
 
$sql = "SELECT * FROM ims_company_regis
                    INNER JOIN ims_department_information
                    ON
                    ims_department_information.id = ims_company_regis.id
                    INNER JOIN ims_files
                    ON 
                    ims_files.uid = ims_company_regis.id
                    WHERE
                    ims_company_regis.username= '$userid'";
$result = mysqli_query($link,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
<div class="container-fluid" style="text-align: center; background-color:whitesmoke;">


    <br><br>
    <td width="200" height="400"><img src="../assets/img/profile-img.jpg" alt="profile" class="rounded-circle">
    <br><br>
    <p>Company : <?php echo $row['c_name']; ?></p>
    <p>Company Address : <?php echo $row['c_address']; ?></p>
    <p>Representative Name : <?php echo $row['repre_name']; ?></p>
    <p>Present Address : <?php echo $row['address']; ?></p>
    <p>Email : <?php echo $row['email']; ?></p>
    <p>Relation to Company : <?php echo $row['position']; ?></p>
    <p>Contact : <?php echo $row['contact']; ?></p>
    <p>Gender : <?php echo $row['gender'] ?></p>
    <p>Account Status : <?php echo $row['c_status']; ?></p>
    <p>Reason : <?php echo "Request an Intern"; ?></p>
    
    </td>
    <br><br>

</tr>
   
 
<?php }  ?>