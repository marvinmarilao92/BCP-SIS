<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
include ("includes/head.php");
?>

<body>
<?php
include ("includes/nav.php");
include ("includes/sidebar.php");
?>
<?php $page = 'AR'; include ('includes/sidebar.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Assign Roles</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a>Module</a></li>
          <li class="breadcrumb-item">Assign Roles</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <form class="card col-md-12" method="POST">
      <div class="card-body">
        
          <div class="row mb-12" aria-required="true">
            <div class="col-md-4 pt-1">
            <input type="text" style="display:none;" name="Role_title" id="Role_title" maxlength="1" value="<?php echo trim($_GET["name"]);?>" Required readonly>
            <br>
            <div class="col-md-12" >         
                  <h4>Set Configuration for <solid style="font-weight:700 ;"><?php echo trim($_GET["name"]); ?></solid> Role</h4>                    
            </div>                                 
            <!-- Account Information -->
            <div class="activity">                                         
                </div>
              <!-- End Account Information --> 
          <h5 class="card-title">New Role Modules:</h5>
          
            <?php
            $requirments ='';          
                // Attempt select query execution
                $sql = "SELECT * FROM role_side_nav ORDER BY id asc ";
                if($result = mysqli_query($link, $sql)){
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                      $requirments .='                      
                      <div class="form-check">                      
                        <input class="form-check-input " type="checkbox" id="sidenav_item" name="sidenav_item[]" value="'.$row["id"].'">
                        <label class="form-check-label" for="gridCheck1">
                        '.$row["module_title"].'
                        </label>
                      </div>
                      ';
            
                    }
                    echo $requirments;
                    // Free result set
                    mysqli_free_result($result);
                  }
                }
            ?>        
            </div>

          </div> 
          <button type="submit" class="btn btn-primary" name="submit_req" id="checkBtn" style="float: right;">Save Configuration</button>
      </div>
    </form>


  </main><!-- End #main -->

    <!-- Create Department Modal -->
    <div class="modal fade" id="AddModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">SUBSYSTEM ROLES</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                  <div class="card" style="margin: 10px;">
                    <div class="card-body">
                      <h2 class="card-title">Fill all neccessary info</h2>
                        <!-- Fill out Form -->
                        <div class="row g-3" >
                          <div class="col-md-12" >
                            <div class="form-floating">
                              <input type="text" class="form-control" id="roletitle" name="roletitle" placeholder="Role title" required autofocus>
                              <label for="floatingName">Role title</label>
                            </div>
                          </div>  
                          <div class="col-md-12">
                                <select class="form-select" id="roledept" name="roledept">
                                <option selected="selected" disabled="disabled">Document Type</option>
                                  <?php
                                    require_once("includes/conn.php");
                                    $query="SELECT * FROM department ORDER BY id DESC ";
                                    $result=mysqli_query($conn,$query);
                                    while($rs=mysqli_fetch_array($result)){
                                      $dtid =$rs['id'];                                    
                                      $dtName = $rs['department'];       
                                  ?>
                                    <option value="<?php echo $dtid;?>"><?php echo $dtName;?></option>
                                <?php }?>
                                </select>
                              </div>
                        </div>
                                    
                    </div>
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button class="btn btn-primary" name="save" id="save" >Save Role</button>
                    </div>
                <!-- End Form -->
            </div>
        </div>     
    </div>
    <!-- End Create Department Modal-->
<?php
include ("includes/footer.php");
?>
<?php

  // agon date
  $current_year = date("y");
  $key = $_SESSION["login_key"];
  if(isset($_POST['submit_req'])&&$_POST['Role_title'])
  {
    $Role = mysqli_real_escape_string($conn,$_POST['Role_title']);
      $reqItem = $_POST['sidenav_item'];
      // echo $reqItem;

        //Check if the config is already in the database
        $sql = "SELECT role FROM role_config WHERE role = '$Role'";
        $result1 = mysqli_query($link,$sql);
        $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);

      foreach($reqItem as $item)
        {
          //Check if the config is already in the database
            $sql1 = "SELECT role FROM role_config WHERE role = '$Role' AND `role` LIKE ('%$item%')";
            $result = mysqli_query($link,$sql1);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

        }
      
      if($count!=0){
          echo'<script type = "text/javascript">
                //success message
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 2000,
                timerProsressBar: true,
                didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer)
                toast.addEventListener("mouseleave", Swal.resumeTimer)                  
                }
                })
                Toast.fire({
                icon: "error",
                title:"Some of the Module is already on your account"
                }).then(function(){
                  window.location = "roles?id='.$key.'";//refresh pages
                });
            </script>';
      }else{
        foreach($reqItem as $item)
        {
            // echo $item . "<br>";
            $query = "INSERT INTO role_config(role_type,role,side_nav_id) VALUES('RO','$Role','$item')";
            $query_run = mysqli_query($link, $query);
        }
    
        if($query_run)
        {
            // $_SESSION['status'] = "Success";
            
            // echo '<script>alert("Submitted")</script>';
            // header("Location: ../roles?id='.$key.'");
            echo'<script type = "text/javascript">
                //success message
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 2000,
                timerProsressBar: true,
                didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer)
                toast.addEventListener("mouseleave", Swal.resumeTimer)                  
                }
                })
                Toast.fire({
                icon: "success",
                title:"Module successfully Saved"
                }).then(function(){
                  
                  window.location = "roles?id='.$key.'";//refresh pages
                });
            </script>';
            unset($_SESSION["status"]);
            unset($_SESSION["studnum"]);
        }
        else
        {
            // $_SESSION['status'] = "Data Not Inserted";
            // echo '<script>alert("Failed")</script>';
            // $_SESSION['status'] = "Failed";
            echo'<script type = "text/javascript">
            //success message
            const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            timerProsressBar: true,
            didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer)
            toast.addEventListener("mouseleave", Swal.resumeTimer)                  
            }
            })
            Toast.fire({
            icon: "error",
            title:"Module failed to submit"
            }).then(function(){
              window.location = "roles?id='.$key.'";//refresh pages
            });
        </script>';
            // header("Location: ../roles?id='.$key.'");
          
        }
      }
      
  }
?>
</body>

</html>