<?php
include_once '../include/config.php';

if($_POST['off_id']){
  
  // Attempt select query execution
              $sql2 = "SELECT * FROM user_information where id_number = " . $_POST['off_id'] . "";
              if($result2 = mysqli_query($link, $sql2)){
                if(mysqli_num_rows($result2) > 0){
                  // echo '<option value="" selected="selected" disabled="disabled">Select Office</option>';
                  while($row2 = mysqli_fetch_array($result2)){
                    ?>
                    <option value="<?php echo $row2['office'] ?>"><?php echo $row2['office'] ?></option>
                    <?php
                  }
                  // Free result set
                  mysqli_free_result($result2);
                }
              }
}
?>