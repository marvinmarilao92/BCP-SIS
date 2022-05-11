<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
include ("includes/head.php");
?>

<style>
    /*responsive*/
  @media(max-width: 550px){
    .table thead{
      display: none;
    }

    .table, .table tbody, .table tr, .table td{
      display: block;
      width: 100%;
    }
    .table tr{
      background: #ffffff;
      box-shadow: 0 8px 8px -4px lightblue;
      border-radius: 5%;
      margin-bottom:13px;
      margin-top: 13px;
    }
    .table td{
      text-align: right;
      padding-left: 50%;
      text-align: right;
      position: relative;
    }
    .table td::before{      
      margin-top: 10px;      
      content: attr(data-label);
      position: absolute;
      left:0;
      width: 50%;
      padding-left:15px;
      font-size:15px;
      font-weight: bold;
      text-align: left;
    }
  }
</style>

<body>
<?php
include ("includes/nav.php");
include ("includes/sidebar.php");
?>
<?php $page = 'AR'; include ('includes/sidebar.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Subsystem Roles</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Settings</li>
          <li class="breadcrumb-item active">Subsystem Roles</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="">
    <section class="section">
      <div class="row">        
        <div class="col-lg-12">
          <div class="card">
            <div class="col-lg-12">
              <div class="form-group col-md-2 btn-lg"  style="float: left; padding:20px;">
                  <h4>List of System Role</h4>
              </div>
              <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                  <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#AddModal" >
                   Add New Role
                  </button>
              </div> 
            </div>
            <div class="card-body" >               
                <!-- Table for Document List records -->
                <table class="table table-hover datatable" id="ProgramTable">
                  <thead>
                    <tr>
                      <th style="display:none"></th>
                      <th style="display:none"></th>
                      <th scope="col">Department</th>                    
                      <th scope="col">Role</th>
                      <th scope="col" WIDTH="7%">Action</th>      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      require_once("includes/conn.php");
                      $query="SELECT * FROM roles ORDER BY id DESC ";
                      $result=mysqli_query($conn,$query);
                      while($rs=mysqli_fetch_array($result)){
                        $role_id =$rs['id'];
                        $dept_id = $rs['department_id'];
                        $role = $rs['role'];                         
                    ?>
                    <tr>
                      <td style="display:none" ><?php echo $role_id; ?></td>
                      <td data-label="Dept:">
                      <?php                     
                      
                      $query1="SELECT * FROM department WHERE `id`=$dept_id";
                      $result1=mysqli_query($conn,$query1);
                      while($rs1=mysqli_fetch_array($result1)){
                      $dept = $rs1['department'];
                      if ($dept == 'DATMS'){
                      echo "Document Tracking";
                      }else{
                      echo $dept;
                      }
                      
                      ?></td>
                      <td data-label="Role:"><?php echo $role; ?></td>
                      <td data-label="">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">                     
                          <?php
                          	
                              if ($dept == 'DATMS' && $role !='Registrar Administrator' && $role !='Registrar Approver' 
                              && $role !='Assistant Registrar' && $role !='Cashier' && $role !='Admission' && $role !='Registrar Officer'){
                                $q_checkcode = $conn->query("SELECT * FROM `role_config` WHERE `role` = '$role'") or die(mysqli_error($conn));
                                $v_checkcode = $q_checkcode->num_rows;
                                if($v_checkcode > 1){
                                  
                                }else{
                                  ?>
                                  <a class="btn btn-success" href="assign_modules?id=<?php echo trim($role_id); ?>&name=<?php echo trim($role); ?>"><i class="bi bi-pencil-square"></i></a>
                                  <?php
                                }
                              }else{
                              
                            }
                            
                          ?>
                          
                        </div>
                      </td>
                    </tr>
                    <?php 
                  } }?>
                  </tbody>
                </table>
                <!-- End of Document table record -->
            </div>
          </div>

        </div>
      </div>
      
    </section>

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
                                <option selected="selected" disabled="disabled">Subsystem</option>
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

<script>

   // Save Program function
    $('#save').click(function(a){ 
      a.preventDefault();
      if($('#roletitle').val()!="" && $('#roledept').val()!=""){
        $.post("function/add_role.php", {
          roletitle:$('#roletitle').val(),
          roledept:$('#roledept').val()
          },function(data){
          if (data.trim() == "failed"){
            $('#AddModal').modal('hide');
            Swal.fire("Role is already in server","","error");//response message
            // Empty test field
            $('#roletitle').val("")
            $('#roledept').val("")
          }else if(data.trim() == "success"){
            $('#AddModal').modal('hide');
                  //success message
                  const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 1100,
                  timerProsressBar: true,
                  didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                  
                  }
                  })
                Toast.fire({
                icon: 'success',
                title:'Role is successfully Saved'
                }).then(function(){
                  document.location.reload(true)//refresh pages
                });
                  $('#roletitle').val("")
                  $('#roledept').val("")
            }else{
              Swal.fire(data);
          }
        })
      }else{
        Swal.fire("You must fill out every field","","warning");
      }
    })
    // End Save Program function
</script>
</body>

</html>