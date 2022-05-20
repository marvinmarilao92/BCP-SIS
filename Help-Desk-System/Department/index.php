<?php
include('session.php');
?>
<!faqs html>
<html lang="en">
<title>Department Library</title>
<head>
<?php include ('core/css-links.php');//css connection?>
<?php  include "core/key_checker.php"; ?>

</head>
<body>

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'manage'; include ('core/sidebar.php');//Design for sidebar?>



  <main id="main" class="main">

   
   
    <div class="">
    <section class="section">
      <div class="row">        
        <div class="col-lg-12">
          <div class="card">
            <div class="col-lg-12">
            <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                  <h5>
                     <!-- extract Buttons -->
                      <div style="align-self: center;" class="btn-group" role="group" aria-label="Basic mixed styles example" style=" padding:20px;"> 
                      <h3>Department Record</h2>
                      
                      </div>
                  </h5>  
              </div>
              <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                  <button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#AddModal" >
                   Add New
                  </button>
              </div> 
            </div>
            <div class="card-body" >           
              <!-- Table for faqs records -->
              <table class="table table-hover datatable" id="faqsTable">
                <thead>
                  <tr>
                    <th style="display:none"></th>
                    <th style="display:none"></th>
                    <th scope="col" WIDTH="40%">Question</th>                    
                    <th style="display:none"></th>
                    <th scope="col" WIDTH="20%">Department</th>
                    <th scope="col" WIDTH="20%">Date Created</th>
                    <th scope="col" WIDTH="10%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    require_once("include/conn.php");
                    $query="SELECT * FROM hd_department WHERE shortDesc = 'Accounting' ORDER BY date DESC";
                    $result=mysqli_query($conn,$query);
                    while($rs=mysqli_fetch_array($result)){
                      $id =$rs['id'];
                      $title = $rs['title'];
                      $shortDesc = $rs['shortDesc'];        
                      $longDesc = $rs['longDesc'];
                      $Date = $rs['date'];
                  ?>
                  <tr>
                    <td style="display:none"><?php echo $id;?></td>
                    <td data-label="Title"><?php echo $title;?></td>
                    <td data-label="Department"><?php echo $shortDesc;?></td>
                    <td style="display:none"><?php echo $longDesc?></td>
                    <td data-label="Date"><?php echo $Date?></td>
                  
                    <td>      
                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">                
                        <input type="button" class="btn btn-outline-primary viewbtn" value="View">&nbsp; 
                        <input type="button" class="btn btn-outline-warning editbtn" value="Edit">&nbsp;
                        <input type="button" class="btn btn-outline-danger deletebtn" value="Delete">
                      </div>
                    </td>
                  </tr>

                  <?php } ?>
                  
                </tbody>
              </table>
              <!-- End of faqs table record -->

            </div>
          </div>

        </div>
      </div>
      
    </section>

  </main><!-- End #main -->

  <!-- faqs Modals -->
      <!-- Create faqs Modal -->
      <div class="modal fade" id="AddModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Add Information</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <div class="card" style="margin: 10px;">
                            <div class="card-body">
                            
                                <!-- Fill out Form -->
                                <div class="row g-3" >
                                  <div class="col-md-4">
                                    
                                  </div>
                                  <br>
                                  <div class="col-md-12">
                                      <input type="text" class="form-control" placeholder="Question" id="title" required>
                                  </div>
                                  <div class="col-md-12">
                                      <input type="hidden" class="form-control" placeholder="Department" id="shortDesc" value = "<?php echo $shortDesc;?>" required>
                                  </div>
                                  <br>
                                  <div class="col-12">
                                      <textarea class="form-control" style="height: 80px" placeholder="Answer/Instruction" id="longDesc" required></textarea>
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
      <!-- End Create faqs Modal-->

      <!-- View faqs modal -->
      <div class="modal fade" id="ViewModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Faqs Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <div class="card" style="margin: 10px;">
                            <div class="card-body">
                              <h5 class="card-title">FAQs Details</h5>
                               <!--Title: <h5 id="view" style="margin-left: 60px;"></h5>
                               Department: <h5 id="view" style="margin-left: 60px;"></h5-->
                               Answer/Instruction: <h5 id="view_desc" style="margin-left: 60px;"></h5>
                               <!--Date Created: <h5 id="view" style="margin-left: 60px;"></h5-->                
                            </div>
                          </div>   
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
        </div>
      <!-- End View faqs Modal-->

      <!-- Edit faqs Modal -->
      <div class="modal fade" id="EditModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">EDIT FAQs</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <div class="card" style="margin: 10px;">
                            <div class="card-body">
                              <h2 class="card-title">Update information</h2>
                                <!-- Fill out Form -->
                                <div class="row g-3" >
                                  <input type="hidden" class="form-control" id="idE" readonly>
                                  <div class="col-md-12">
                                  Title: <input type="text" class="form-control" id="titleE">
                                  </div>
                                  <br>
                                  <div class="col-md-12">
                                    <input type="hidden" class="form-control" id="shortDescE">
                                  </div>
                                  <br>
                                  <div class="col-12">
                                      Answer/Instruction: <textarea  style="height: 80px" class="form-control" id="longDescE"></textarea>
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
      <!-- End Edit faqs Modal-->

      <!-- Delete faqs Modal -->
      <div class="modal fade" id="DeleteModal" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">DELETE FAQS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                        <div class="card" style="margin: 10px;">
                          <div class="card-body">                
                            <br>
                            <input type="hidden"  name="delete_id" id="delete_id" readonly>
                            <center>
                              <h5 class="text-danger">Are you sure you want to delete faqs?</h5>
                            
                            </center>                
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary" name="deletedata" id="dtdel" >Delete</button>
                        </div>
                      <!-- End Form -->
                  </div>
              </div>
        </div>
      <!-- End delete faqs Modal -->
  <!-- End of faqs Modals -->

  <!-- ======= Footer ======= -->
    <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <!-- Back to top Button -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
    <?php include ('core/js.php');//css connection?>

  <!-- JS Scripts -->
    <script> 
   
        // this script will execute as soon a the website runs
        $(document).ready(function () {

              // Delete modal calling
              $('#faqsTable').on('click','.deletebtn', function () {

                    $('#DeleteModal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);

                  $('#delete_id').val(data[0]);
                  });
              // end of function
            
              // Delete function
              $("#dtdel").click(function(b){
                b.preventDefault();
                $.post("function/delete_faqs.php",{
                    dtid:$('#delete_id').val()
                  },function(response){
                    // alert ("deleted");
                    if(response.trim() == "Faqs Deleted"){
                      $('#DeleteModal').modal('hide');
                      Swal.fire ("FAQS Successfully Deleted","","success").then(function(){
                      document.location.reload(true)//refresh pages
                      });
                    }else{
                      $('#DeleteModal').modal('hide');
                      Swal.fire (response);
                    }
                  })
                })
              // End Delete function
                
              // Save function
                $('#save').click(function(a){ 
                  a.preventDefault();
                    if($('#title').val()!="" && $('#shortDesc').val()!="" && $('#longDesc').val()!=""){
                      $.post("function/add_faqs.php", {
                        title:$('#title').val(),
                        shortDesc:$('#shortDesc').val(),
                        longDesc:$('#longDesc').val()
                        },function(data){
                        if (data.trim() == "failed"){
                          $('#AddModal').modal('hide');
                          //response message
                          Swal.fire("faqs already in exist","","error");
                          
                          // Empty test field
                          $('#title').val("")
                          $('#shortDesc').val("")
                          $('#longDesc').val("")

                        }else if(data.trim() == "success"){
                          $('#AddModal').modal('hide');
                                //success message
                                const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProsressBar: true,
                                didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)                  
                                }
                                })
                              Toast.fire({
                              icon: 'success',
                              title:'Faqs successfully Added'
                              }).then(function(){
                                document.location.reload(true)//refresh pages
                              });
                               
                                $('#title').val("")
                                $('#shortDesc').val("")
                                $('#longDesc').val("")
                          }else{
                            Swal.fire(data);
                        }
                      })
                    }else{
                      Swal.fire("You must fill out every field","","warning");
                    }
                  })
              // End Save function

              // Edit modal calling
              $('#faqsTable').on('click','.editbtn', function () {

                    $('#EditModal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);        
                        $('#idE').val(data[0]);
                        $('#titleE').val(data[1]);
                        $('#shortDescE').val(data[2]);
                        $('#longDescE').val(data[3]);
                       
                  });
              // End of edit modal calling 

              // Edit function
              $('#edit').click(function(d){ 
                    d.preventDefault();
                      if($('#idE').val()!="" && $('#titleE').val()!="" && $('#shortDescE').val()!="" && $('#longDescE').val()!=""){
                        $.post("function/update_faqs.php", {
                          id:$('#idE').val(),
                          title:$('#titleE').val(),
                          shortDesc:$('#shortDescE').val(),
                          longDesc:$('#longDescE').val()
                          },function(data){
                            if (data.trim() == "failed"){
                            $('#EditModal').modal('hide');
                            Swal.fire("faqs Title is currently in use","","error");//response message
                            // Empty test field
                            $('#titleE').val("")
                            $('#shortDescE').val("")
                            $('#longDescE').val("")
                          }else if(data.trim() == "success"){
                            $('#EditModal').modal('hide');
                                  //success message                                    
                                      const Toast = Swal.mixin({
                                      toast: true,
                                      position: 'top-end',
                                      showConfirmButton: false,
                                      timer: 1500,
                                      timerProsressBar: true,
                                      didOpen: (toast) => {
                                      toast.addEventListener('mouseenter', Swal.stopTimer)
                                      toast.addEventListener('mouseleave', Swal.resumeTimer)                  
                                      }
                                      })
                                    Toast.fire({
                                    icon: 'success',
                                    title:'FAQs updated successfully'
                                    }).then(function(){
                                      document.location.reload(true)//refresh pages
                                    }); 
                                    $('#titleE').val("")
                                    $('#shortDescE').val("")
                                    $('#longDescE').val("")
                            }else{
                              Swal.fire("There is somthing wrong","","error");
                          }
                        })
                      }else{
                        Swal.fire("You must fill out every field","","warning");
                      }
                  })
              // End Edit function

              // View Function
              $('#faqsTable').on('click','.viewbtn', function () {

                    $('#ViewModal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);        
                    //$('#view').text(data[1]);
                    //$('#view').text(data[2]);
                    $('#view_desc').text(data[3]);
                   // $('#view').text(data[4]);
                  });
              // End of View function 

          });

    </script>
  
</body>

</html>