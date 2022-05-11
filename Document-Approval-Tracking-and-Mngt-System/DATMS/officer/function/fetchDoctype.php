<?php
include_once '../include/config.php';

if($_POST['acc_id']){

  $id = mysqli_real_escape_string($link,trim($_POST["acc_id"]));
  // Fetching Students Documents
  $sql = "SELECT *,LEFT(middlename,1) as MI FROM student_information WHERE `account_status` NOT IN ('Unofficial') AND id_number = '".$id."'";
  $result = mysqli_query($link, $sql);
    if(mysqli_num_rows($result) > 0)
      {
        // Attempt select query execution
        $query = "SELECT * FROM datms_doctype where dt_desc = 'Students'";
        if($fetch = mysqli_query($link, $query)){
          if(mysqli_num_rows($fetch) > 0){
            echo '<option value="" selected="selected" disabled="disabled">Select DocType</option>';
            while($row = mysqli_fetch_array($fetch)){
              ?>
              <option value="<?php echo $row['dt_name'] ?>"><?php echo $row['dt_name'] ?></option>
              <?php
            }
            // Free result set
            mysqli_free_result($fetch);
          }
        }
      }else{
        // Fetching Teachers Documents
        $sql1 = "SELECT *,LEFT(middlename,1) as MI FROM teacher_information WHERE `account_status` NOT IN ('Deactivated') AND id_number = '".$id."'";
        $result1 = mysqli_query($link, $sql1);
          if(mysqli_num_rows($result1) > 0)
            {
              // Attempt select query execution
              $query1 = "SELECT * FROM datms_doctype where dt_desc = 'Teachers'";
              if($fetch1 = mysqli_query($link, $query1)){
                if(mysqli_num_rows($fetch1) > 0){
                  echo '<option value="" selected="selected" disabled="disabled">Select DocType</option>';
                  while($row1 = mysqli_fetch_array($fetch1)){
                    ?>
                    <option value="<?php echo $row1['dt_name'] ?>"><?php echo $row1['dt_name'] ?></option>
                    <?php
                  }
                  // Free result set
                  mysqli_free_result($fetch1);
                }
              }
            }else{
              // Fetching Teachers Documents
              $sql1 = "SELECT *,LEFT(middlename,1) as MI FROM user_information WHERE `account_status` NOT IN ('Deactivated') AND id_number = '".$id."'";
              $result1 = mysqli_query($link, $sql1);
              if(mysqli_num_rows($result1) > 0)
              {
                // Attempt select query execution
                $query1 = "SELECT * FROM datms_doctype where dt_desc = 'Employee'";
                if($fetch1 = mysqli_query($link, $query1)){
                  if(mysqli_num_rows($fetch1) > 0){
                    echo '<option value="" selected="selected" disabled="disabled">Select DocType</option>';
                    while($row1 = mysqli_fetch_array($fetch1)){
                      ?>
                      <option value="<?php echo $row1['dt_name'] ?>"><?php echo $row1['dt_name'] ?></option>
                      <?php
                    }
                    // Free result set
                    mysqli_free_result($fetch1);
                  }
                }
              }else{
                echo '<option value="" selected="selected" disabled="disabled">No Document Available for this account</option>';
              }
            }
      }

    
}
?>