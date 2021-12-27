<!DOCTYPE html>
<html lang="en">

<head>
<?php include ('core/css-links.php');//css connection?>
</head>
<body>

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'office'; include ('core/side-nav.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Office List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Settings</li>
          <li class="breadcrumb-item active">Office List</li>
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
                  <h2>Records</h2>
              </div>
              <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                  <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#AddModal" >
                   Add Office
                  </button>
              </div> 
            </div>
            <div class="card-body" >           
              <!-- Table for Office records -->
              <table class="table table-hover datatable" >
                <thead>
                  <tr>
                    <th style="display:none"></th>
                    <th style="display:none"></th>
                    <th scope="col" WIDTH="85%">Office</th>                    
                    <th style="display:none"></th>
                    <th style="display:none"></th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    require_once("include/conn.php");
                    $query="SELECT * FROM datms_office ORDER BY off_date DESC ";
                    $result=mysqli_query($conn,$query);
                    while($rs=mysqli_fetch_array($result)){
                      $offid =$rs['off_id'];
                      $offCode = $rs['off_code'];
                      $offName = $rs['off_name'];        
                      $offLoc = $rs['off_location'];
                      $offDate = $rs['off_date'];
                  ?>
                  <tr>
                    <td style="display:none"><?php echo $offid; ?></td>
                    <td style="display:none"><?php echo $offCode; ?></td>
                    <td><?php echo $offName; ?>
                    <td style="display:none"><?php echo $offLoc?></td>
                    <td style="display:none"><?php echo $offDate?></td>
                  </td>
                    <td>                      
                      <button class="btn btn-primary viewbtn"><i class="bi bi-eye"></i></button>
                      <button class="btn btn-success editbtn"><i class="bi bi-pencil-square"></i></button>
                      <button class="btn btn-danger deletebtn" ><i class="bi bi-trash" ></i></button>
                    </td>
                  </tr>

                  <?php } ?>
                  
                </tbody>
              </table>
              <!-- End of office table record -->

            </div>
          </div>

        </div>
      </div>
      
    </section>

  </main><!-- End #main -->

   <!-- Create Office Modal -->
   <div class="modal fade" id="AddModal" tabindex="-1">
             <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">OFFICE CREDENTIALS</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                      <div class="card" style="margin: 10px;">
                        <div class="card-body">
                          <h2 class="card-title">Fill all neccessary info</h2>
                            <!-- Fill out Form -->
                            <div class="row g-3" >
                              <div class="col-md-4">
                                  <input type="text" class="form-control" placeholder="Office Code" id="offcode" required>
                               </div>
                               <br>
                               <div class="col-md-8">
                                  <input type="text" class="form-control" placeholder="Name" id="offtitle" required>
                               </div>
                               <br>
                               <div class="col-12">
                                  <textarea class="form-control" style="height: 80px" placeholder="Location" id="offloc" required></textarea>
                               </div>        
                            </div>
                                        
                        </div>
                      </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button class="btn btn-primary" name="save" id="save" >Save changes</button>
                        </div>
                    <!-- End Form -->
                </div>
            </div>     
     </div>
     
     <!-- End Create Office Modal-->

     <!-- View Office modal -->
     <div class="modal fade" id="ViewModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-l">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Office Information</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="card" style="margin: 10px;">
                          <div class="card-body">
                            <h5 class="card-title">Office Details</h5>
                              Office Code: <h6 id="view_code" style="margin-left: 60px;"></h6>
                              Office Name: <h6 id="view_name" style="margin-left: 60px;"></h6>
                              Location: <h6 id="view_loc" style="margin-left: 60px;"></h6>
                              Date Created: <h6 id="view_date" style="margin-left: 60px;"></h6>                
                          </div>
                        </div>   
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
       </div>
     <!-- End View office Modal-->

     <!-- Edit Office Modal -->
      <div class="modal fade" id="EditModal" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">EDIT OFFICE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                        <div class="card" style="margin: 10px;">
                          <div class="card-body">
                            <h2 class="card-title">Change information</h2>
                              <!-- Fill out Form -->
                              <div class="row g-3" >
                                <input type="hidden" class="form-control" id="off_idE" readonly>
                                <div class="col-md-4">
                                    Code: <input type="text" class="form-control" id="off_codeE" readonly>
                                </div>
                                <br>
                                <div class="col-md-8">
                                    Name: <input type="text" class="form-control" id="off_nameE">
                                </div>
                                <br>
                                <div class="col-12">
                                    Location: <textarea  style="height: 80px" class="form-control" id="off_locE"></textarea>
                                </div>        
                              </div>
                            
                          </div>
                        </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary" name="save" id="edit" >Save changes</button>
                          </div>
                      <!-- End Form -->
                  </div>
              </div>
      </div>
    <!-- End Edit Office Modal-->

     <!-- Delete Office Modal -->
     <div class="modal fade" id="DeleteModal" tabindex="-1">
             <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">DELETE OFFICE</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                      <div class="card" style="margin: 10px;">
                        <div class="card-body">                
                          <br>
                          <input type="hidden"  name="delete_id" id="delete_id" readonly>
                          <center>
                            <h5>Are you sure you want to delete these Office?</h5>
						                <h5 class="text-danger">This action cannot be undone.</h5>   
                          </center>                
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="deletedata" id="offdel" >Delete Office</button>
                      </div>
                    <!-- End Form -->
                </div>
            </div>
     </div>
     <!-- End delete Office Modal -->

  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>

  <!-- JS Script -->
    <script>
        $(document).ready(function () {
          // Opening modal for delete
              $('.deletebtn').on('click', function () {
 
                  $('#DeleteModal').modal('show');

                  $tr = $(this).closest('tr');

                  var data = $tr.children("td").map(function () {
                      return $(this).text();
                  }).get();

                  console.log(data);

                $('#delete_id').val(data[0]);
              });
            // end of function
            
            // Delete Office function
              $("#offdel").click(function(b){
                b.preventDefault();
                $.post("delete_office.php",{
                    offid:$('#delete_id').val()
                  },function(response){
                    // alert ("deleted");
                    if(response.trim() == "OfficeDeleted"){
                      Swal.fire ("Office Successfully Deleted","","success");
                      $('#DeleteModal').modal('hide');
                      document.location.reload(true)//refresh pages
                    }else{
                      $('#DeleteModal').modal('hide');
                      Swal.fire (response);
                    }
                  })
                })
              // End Delete Office function
                
              // Save Office function
                $('#save').click(function(a){ 
                  a.preventDefault();
                    if($('#offcode').val()!="" && $('#offtitle').val()!="" && $('#offloc').val()!=""){
                      $.post("add_office.php", {
                        offcode:$('#offcode').val(),
                        offname:$('#offtitle').val(),
                        offloc:$('#offloc').val()
                        },function(data){
                        if (data.trim() == "failed"){
                          $('#AddModal').modal('hide');
                          Swal.fire("Office is already in server","","error");//response message
                          // Empty test field
                          $('#offcode').val("")
                          $('#offtitle').val("")
                          $('#offloc').val("")
                        }else if(data.trim() == "success"){
                          $('#AddModal').modal('hide');
                                //success message
                                const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProsressBar: true,
                                didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                document.location.reload(true)//refresh pages
                                }
                                })
                              Toast.fire({
                              icon: 'success',
                              title:'Office successfully Saved'
                              })
                                $('#offcode').val("")
                                $('#offtitle').val("")
                                $('#offloc').val("")
                          }else{
                            Swal.fire(data);
                        }
                      })
                    }else{
                      Swal.fire("You must fill out every field","","warning");
                    }
                })
              // End Save Office function

            // Edit Office modal calling
              $('.editbtn').on('click', function () {

                  $('#EditModal').modal('show');

                  $tr = $(this).closest('tr');

                  var data = $tr.children("td").map(function () {
                      return $(this).text();
                  }).get();

                  console.log(data);        
                      $('#off_idE').val(data[0]);
                      $('#off_codeE').val(data[1]);
                      document.getElementById("off_nameE").placeholder = data[2];
                      document.getElementById("off_locE").placeholder = data[3];  
              });
            // End of edit modal calling 

            // Edit Office function
            $('#edit').click(function(d){ 
                  d.preventDefault();
                    if($('#off_idE').val()!="" && $('#off_codeE').val()!="" && $('#off_nameE').val()!="" && $('#off_locE').val()!=""){
                      $.post("update_office.php", {
                        offid:$('#off_idE').val(),
                        offcode:$('#off_codeE').val(),
                        offname:$('#off_nameE').val(),
                        offloc:$('#off_locE').val()
                        },function(data){
                          if (data.trim() == "failed"){
                          $('#EditModal').modal('hide');
                          Swal.fire("Office Title is currently in use","","error");//response message
                          // Empty test field
                          $('#off_codeE').val("")
                          $('#off_nameE').val("")
                          $('#off_locE').val("")
                        }else if(data.trim() == "success"){
                          $('#EditModal').modal('hide');
                                //success message
                                  const Toast = Swal.mixin({
                                  toast: true,
                                  position: 'top-end',
                                  showConfirmButton: false,
                                  timer: 3000,
                                  timerProsressBar: true,
                                  didOpen: (toast) => {
                                  toast.addEventListener('mouseenter', Swal.stopTimer)
                                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                                  document.location.reload(true)//refresh pages
                                }
                                })
                                  Toast.fire({
                                  icon: 'Success',
                                  title:'Changes Successfully Saved'
                              })
                                  $('#off_codeE').val("")
                                  $('#off_nameE').val("")
                                  $('#off_locE').val("")
                          }else{
                            Swal.fire("There is somthing wrong","","error");
                        }
                      })
                    }else{
                      Swal.fire("You must fill out every field","","warning");
                    }
                })
              // End Edit Office function

            // View Office Function
              $('.viewbtn').on('click', function () {

                  $('#ViewModal').modal('show');

                  $tr = $(this).closest('tr');

                  var data = $tr.children("td").map(function () {
                      return $(this).text();
                  }).get();

                  console.log(data);        
                  $('#view_code').text(data[1]);
                  $('#view_name').text(data[2]);
                  $('#view_loc').text(data[3]);
                  $('#view_date').text(data[4]);
              });
            // End of View function 
           });

    </script>
  
</body>

</html>