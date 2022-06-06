<?php

include_once '../control/check-session-login.php';
 
$userid = $_POST['userid'];
 
$sqls = "SELECT * FROM `ims_apply_info`
                    INNER JOIN user_information
                    ON
                    user_information.office = ims_apply_info.s_course
                    INNER JOIN ims_stud_files
                    ON 
                    ims_stud_files.id = ims_apply_info.i_id
                    WHERE
                    user_information.department  = '$verified_session_department'
                    AND
                    ims_apply_info.s_course = '$course'
                    AND
                    ims_apply_info.s_number='$userid'";
                    

$result = mysqli_query($link,$sqls);
while( $row = mysqli_fetch_array($result) ){
?>



<div class="container-fluid" style="text-align:center">

    <br>

    <br><br>
    <td width="200" height="400"><img src="../assets/img/profile-img.jpg" alt="profile" class="rounded-circle">
    <br><br>
    <p>Student ID : <?php echo $row['s_number']; ?></p>
    <p>Name : <?php echo $row['sname'].", ".$row['fname']." ".$row['mname']; ?></p>
    <p>Course: <?php echo $row['s_course'];?></p>
    <p>Phone: <?php echo $row['contact'];?></p>
    <p>Email: <?php echo $row['email'];?></p>
    </td>

    
    
    
    
    
    <br><br>


    
</div>    
 
<?php }  ?>