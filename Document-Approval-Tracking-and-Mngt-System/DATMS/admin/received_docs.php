<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include ('core/css-links.php');//css connection?>
</head>
<body>

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'recieved'; include ('core/side-nav.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Received Documents</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Module</li>
          <li class="breadcrumb-item active">Received Documents</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
      <h4 class="alert-heading">READ CAREFULLY</h4>
      <p>
        You may use the service and the contents contained in the Services solely for your own individual non-commercial and informational purpose
        only. Any other use, including for any commercial purposes, is strictly prohibited without our express prior witten or verbal consent.
      </p>
      <hr>
      <p class="mb-0">© Copyright Bestlink College of the Philippines. All Rights Reserved.</p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="">
    <section class="section">
      <div class="row">        
        <div class="col-lg-12">
          <div class="card">
            <div class="col-lg-12">
              <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                  <h4>Document List</h4>
              </div>
              <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
              </div> 
            </div>
            <div class="card-body" >           
              <!-- Table for Office records -->
              <table class="table table-hover datatable" >
                <thead>
                  <tr>
                    <th scope="col">DocCode</th>
                    <th scope="col" >Filename</th>
                    <!-- <th scope="col">Filesize</th>    -->
                    <th scope="col">Actor</th>   
                    <th scope="col">Date/Time</th>       
                    <th scope="col">Status</th>  
                    <!-- <th scope="col">Downloads</th>    -->
                    <th scope="col">Action</th>          
                  </tr>
                </thead>
                <tbody>
                  <?php
                    require_once("include/conn.php");
                    $query="SELECT * FROM datms_documents WHERE (`doc_status` = 'Created' OR `doc_status` = 'Received') AND (`doc_actor2`='$verified_session_firstname' ' $verified_session_lastname ' OR  `doc_off2` = '$verified_session_office')
                    ORDER BY doc_date2 DESC ";
                    $result=mysqli_query($conn,$query);
                    while($rs=mysqli_fetch_array($result)){
                      $docId =$rs['doc_id']; $docCode = $rs['doc_code']; $docTitle = $rs['doc_title'];      
                      $docName =$rs['doc_name']; $docSize = $rs['doc_size']; $docDl = $rs['doc_dl']; 
                      $docType =$rs['doc_type']; $docStat = $rs['doc_status']; $docDesc = $rs['doc_desc'];   
                      $docAct1 =$rs['doc_actor1']; $docOff1 = $rs['doc_off1']; $docDate1 = $rs['doc_date1']; 
                      $docAct2 =$rs['doc_actor2']; $docOff2 = $rs['doc_off2']; $docDate2 = $rs['doc_off2'];  
  
                  ?>
                  <tr>
                    <td style="display:none"><?php echo $docId?></td>
                    <td><?php echo $docCode; ?>
                    <td><?php echo $docName; ?>
                    <td><?php echo $docAct1; ?>
                    <td><?php echo $docDate1; ?>
                    <td><?php echo $docStat; ?>
                    <td style="display:none"><?php echo floor($docSize / 1000) . ' KB'; ?>
                    <td style="display:none"><?php echo $docDl; ?>
                    <td style="display:none"><?php echo $docTitle?></td>
                    <td style="display:none"><?php echo $docType?></td>
                    <td style="display:none"><?php echo $docDesc?></td>
                    <td style="display:none"><?php echo $docOff1?></td>
                    <td style="display:none"><?php echo $docAct2?></td>
                    <td style="display:none"><?php echo $docOff2?></td>
                    <td style="display:none"><?php echo $docDate2?></td>

                  </td>
                    <td>                      
                      <a class="btn btn-success sendbtn"><i class="bi bi-cursor-fill"></i></a>
                      <a class="btn btn-danger holdbtn" ><i class="bi bi-question-lg" ></i></a>
                      <a class="btn btn-primary " href='function/view_docu.php?ID=<?php echo $docId; ?>' target="_blank"><i class="bi bi-eye-fill"></i></a>                
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
      <!-- View Document modal -->
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
                                Office Code: <h5 id="view_code" style="margin-left: 60px;"></h5>
                                Office Name: <h5 id="view_name" style="margin-left: 60px;"></h5>
                                Location: <h5 id="view_loc" style="margin-left: 60px;"></h5>
                                Date Created: <h5 id="view_date" style="margin-left: 60px;"></h5>                
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

      <!-- Hold Docs Modal -->
      <div class="modal fade" id="HoldModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Document Hold</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <div class="card" style="margin: 10px;">
                            <div class="card-body">
                              <h2 class="card-title">Hold this document?</h2>
                                <!-- Fill out Form -->
                                <div class="row g-3" >
                                      <input type="text" class="form-control" id="doc_id" readonly>
                                      <input type="text" class="form-control" id="doc_code" readonly>                  
                                      <input type="text" class="form-control" id="doc_act2" value="<?php echo $verified_session_firstname . " " . $verified_session_lastname ?>" readonly>
                                      <input type="text" class="form-control" id="doc_off2" value="<?php echo $verified_session_office?>" readonly> 
                                      <h5 id="doc_fileN" style="text-align: end; color:black"></h5>   
                                </div>
                              
                            </div>
                          </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              <button class="btn btn-success" name="save" id="hold" >Hold</button>
                            </div>
                        <!-- End Form -->
                    </div>
                </div>
          </div>
      <!-- End Hold Docs Modal-->

       <!-- Send Docs Modal -->
       <div class="modal fade" id="SendModal1" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Document Submission</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <div class="card" style="margin: 10px;">
                            <div class="card-body">
                              <h2 class="card-title">Submit Document</h2>
                                <!-- Fill out Form -->
                                <div class="row g-3" >
                                      <input type="text" class="form-control" id="doc_id1" readonly>
                                      <input type="text" class="form-control" id="doc_code1" readonly>                  
                                      <div class="col-md-12">
                                        <select class="form-select" id="doc_act2" name="doc_act2" onChange="fetchOffice(this.value);">
                                        <option selected="selected" disabled="disabled">Recipient</option>
                                          <?php
                                            require_once("include/conn.php");
                                            $query="SELECT * FROM user_information WHERE department = 'DATMS' ORDER BY firstname DESC ";
                                            $result=mysqli_query($conn,$query);
                                            while($rs=mysqli_fetch_array($result)){
                                              $dtid =$rs['id'];    
                                              $dtno =$rs['id_number'];                                  
                                              $dtFName = $rs['firstname'];    
                                              $dtLName = $rs['lastname'];    
                                            
                                              echo '<option value = "' . $dtno . '">' . $rs["firstname"] . " " . $rs["lastname"] .'</option>';
                                            }
                                        ?>
                                        </select>
                                      </div>
                                      <div class="col-md-12">
                                        <select class="form-select" id="doc_off2" name="doc_off2">
                                          <option selected="selected" disabled="disabled">Select Office</option>
                                        </select>
                                      </div>
                                      <h5 id="doc_fileN1" style="text-align: end; color:black"></h5>   
                                </div>
                              
                            </div>
                          </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              <button class="btn btn-success" name="send" id="send" >Submit</button>
                            </div>
                        <!-- End Form -->
                    </div>
                </div>
          </div>
      <!-- End Send Docs Modal-->

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
                          <button type="submit" class="btn btn-primary" name="deletedata" id="dtdel" >Delete Office</button>
                        </div>
                      <!-- End Form -->
                  </div>
              </div>
        </div>
      <!-- End delete Office Modal -->
  <!-- End of Office Modals -->

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

          
            // Hold modal calling
              $('.holdbtn').on('click', function () {

                  $('#HoldModal').modal('show');

                  $tr = $(this).closest('tr');

                  var data = $tr.children("td").map(function () {
                      return $(this).text();
                  }).get();

                  console.log(data);      
                      $('#doc_fileN').text(data[2]);  
                      $('#doc_id').val(data[0]);
                      $('#doc_code').val(data[1]); 
                });
              // End of Hold modal calling 

              // Hold function
              $('#hold').click(function(d){ 
                    d.preventDefault();
                      if($('#doc_id').val()!="" && $('#doc_code').val()!="" && $('#doc_act2').val()!="" && $('#doc_off2').val()!="" ){
                        $.post("function/hold_func.php", {
                          docs_id:$('#doc_id').val(), docs_code:$('#doc_code').val(),
                          docs_act2:$('#doc_act2').val(), docs_off2:$('#doc_off2').val()
                          },function(data){
                            if (data.trim() == "Val30"){
                            $('#EditModal').modal('hide');
                            Swal.fire("No data stored in our database","","error");//response message
                            // Empty test field
                          }else if(data.trim() == "success"){
                            $('#ReceivedModal').modal('hide');
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
                                    icon: 'Success',
                                    title:'Document is now on hold'
                                }).then(function(){
                                  document.location.reload(true)//refresh pages
                                });
                                    $('#doc_code').val("")
                                    $('#doc_act2').val("")
                                    $('#doc_off2').val("")
                            }else{
                              Swal.fire("There is somthing wrong","","error");
                              // Swal.fire(data);
                          }
                        })
                      }else{
                        Swal.fire("You must fill out every field","","warning");
                      }
                  })
              // End Hold function

               // Hold modal calling
              $('.sendbtn').on('click', function () {

                  $('#SendModal1').modal('show');

                  $tr = $(this).closest('tr');

                  var data = $tr.children("td").map(function () {
                      return $(this).text();
                  }).get();

                  console.log(data);      
                      $('#doc_fileN1').text(data[2]);  
                      $('#doc_id1').val(data[0]);
                      $('#doc_code1').val(data[1]); 
                });
              // End of Hold modal calling 

              // Hold function
              $('#send').click(function(d){ 
                    d.preventDefault();
                      if($('#doc_id').val()!="" && $('#doc_code').val()!="" && $('#doc_act2').val()!="" && $('#doc_off2').val()!="" ){
                        $.post("function/send_func.php", {
                          docs_id:$('#doc_id').val(), docs_code:$('#doc_code').val(),
                          docs_act2:$('#doc_act2').val(), docs_off2:$('#doc_off2').val()
                          },function(data){
                            if (data.trim() == "Val30"){
                            $('#EditModal').modal('hide');
                            Swal.fire("No data stored in our database","","error");//response message
                            // Empty test field
                          }else if(data.trim() == "success"){
                            $('#ReceivedModal').modal('hide');
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
                                    icon: 'Success',
                                    title:'Document is now on hold'
                                }).then(function(){
                                  document.location.reload(true)//refresh pages
                                });
                                    $('#doc_code').val("")
                                    $('#doc_act2').val("")
                                    $('#doc_off2').val("")
                            }else{
                              Swal.fire("There is somthing wrong","","error");
                              // Swal.fire(data);
                          }
                        })
                      }else{
                        Swal.fire("You must fill out every field","","warning");
                      }
                  })
              // End Hold function

          });

    </script>
    <script type="text/javascript">
        // Ajax for office picker
        function fetchOffice(id){
                $('#doc_off2').html('');
                $.ajax({
                  type:'post',
                  url:'function/ajaxdata.php',
                  data : 'off_id='+id,
                  success: function(data){
                    $('#doc_off2').html(data);
                    // console.log("success");
                  }
                })
              }
        // End of Ajax for office picker
    </script>
  
</body>

</html>