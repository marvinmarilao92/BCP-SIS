<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Rejected Documents</title>
<head>
  <?php include ('core/css-links.php');//css connection?>
  <?php  include "core/key_checker.php"; ?>
  <style>
      /*responsive*/
      @media(max-width: 500px){
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
          /* max-width: 20px; */
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
  </head>
<body>

  <?php include ('core/header.php');//Design for  Header?>
  <?php $page = 'reject';  include ('core/side-nav.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Rejected Documents</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Module</li>
          <li class="breadcrumb-item active">Rejected Documents</li>
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
              <table class="table table-hover datatable" id="rejectTable">
                <thead>
                  <tr>
                    <th scope="col">DocCode</th>
                    <th scope="col" >Filename</th>
                    <!-- <th scope="col">Filesize</th>    -->
                    <th scope="col">Actor</th>   
                    <th scope="col">Date&Time</th>       
                    <th scope="col">Status</th>  
                    <!-- <th scope="col">Downloads</th>    -->
                    <th scope="col">Action</th>          
                  </tr>
                </thead>
                <tbody>
                  <?php
                    require_once("include/conn.php");
                    $query="SELECT * FROM datms_documents WHERE `doc_status` = 'Rejected'  AND (`doc_actor3`='$verified_session_firstname $verified_session_lastname ') ORDER BY doc_date2 DESC ";
                    $result=mysqli_query($conn,$query);
                    while($rs=mysqli_fetch_array($result)){
                      $docId =$rs['doc_id']; $docCode = $rs['doc_code']; $docTitle = $rs['doc_title'];      
                      $docName =$rs['doc_name']; $docSize = $rs['doc_size']; $docDl = $rs['doc_dl']; 
                      $docType =$rs['doc_type']; $docStat = $rs['doc_status']; $docDesc = $rs['doc_desc'];   
                      $docAct1 =$rs['doc_actor1']; $docOff1 = $rs['doc_off1']; $docDate1 = $rs['doc_date1']; 
                      $docAct2 =$rs['doc_actor2']; $docOff2 = $rs['doc_off2']; $docDate2 = $rs['doc_date2']; 
                      $docAct3 =$rs['doc_actor3']; $docOff3 = $rs['doc_off3']; $docDate3 = $rs['doc_date3'];   
                      $docRemarks = $rs['doc_remarks'];   
  
                  ?>
                  <tr>
                    <td style="display:none"><?php echo $docId?></td>
                    <td data-label="Code:"><?php echo $docCode; ?>
                    <td data-label="Filename:"><?php echo $docTitle; ?>
                    <td data-label="Actor:"><?php echo $docAct2; ?>
                    <td data-label="Date&T:"><?php echo $docDate2; ?>
                    <td data-label="Status:"><?php echo $docStat; ?><a class="fw-bold remarksbtn">&nbsp;&nbsp;<i class="bi bi-info-circle"></i></a></td>
                    <td style="display:none"><?php echo floor($docSize / 1000) . ' KB'; ?>
                    <td style="display:none"><?php echo $docDl; ?>
                    <td style="display:none"><?php echo $docName?></td>
                    <td style="display:none"><?php echo $docType?></td>
                    <td style="display:none"><?php echo $docDesc?></td>
                    <td style="display:none"><?php echo $docOff1?></td>
                    <td style="display:none"><?php echo $docAct1?></td>
                    <td style="display:none"><?php echo $docOff2?></td>
                    <td style="display:none"><?php echo $docDate1?></td>
                    <td style="display:none"><?php echo $docAct3?></td>
                    <td style="display:none"><?php echo $docOff3?></td>
                    <td style="display:none"><?php echo $docDate3?></td>
                    <td style="display:none"><?php echo $docRemarks?></td>

                  </td>
                    <td>       
                      <!-- <div class="dropdown">
                        <button class="dropbtn">Dropdown</button>
                        <div class="dropdown-content">
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                      </div>                -->
                      <a class="btn btn-success sendbtn" title="Send"><i class="bi bi-cursor-fill"></i></a>
                      <a class="btn btn-danger deletebtn" title="Archive"><i class="bi bi-trash"></i></a>
                      <a class="btn btn-primary " href='function/view_docu?ID=<?php echo $docId; ?>' target="_blank" title="View"><i class="bi bi-eye-fill"></i></a>
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

   <!-- Desc Document modal -->
       <div class="modal fade" id="RemarksModal" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered modal-l">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">DOCUMENT DESCRIPTION</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="card" style="margin: 10px;">
                          <form method="post">
                            <div class="card-body">
                               <h5 id="remarks" style="margin-top: 10px;"></h5>                                          
                                <div class="col-12" style="text-align: center;">
                                </div>
                            </div>
                            </form>
                          </div>   
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
        </div>
      <!-- End Desc office Modal-->
     <!-- Send Docs Modal -->
     <div class="modal fade" id="SendModal" tabindex="-1">
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
                                      <input type="hidden" class="form-control" id="send_id" readonly>
                                      <input type="hidden" class="form-control" id="send_code" readonly>   
                                      <input type="hidden" class="form-control" id="send_act1" readonly>   
                                      <input type="hidden" class="form-control" id="send_off1" readonly>   
                                      <input type="hidden" class="form-control" id="send_date1" readonly>                  
                                      <div class="col-md-12">
                                        <select class="form-select" id="send_act2" name="send_act2" onChange="fetchOffice(this.value);">
                                        <option selected="selected" disabled="disabled">Recipient</option>
                                          <?php
                                            require_once("include/conn.php");
                                            $query="SELECT * FROM user_information WHERE (department = 'DATMS' OR  department = 'SuperUser') AND `id_number` NOT IN ('$verified_session_username') AND role NOT LIKE '%Cashier%' AND role NOT LIKE '%Admission%' ORDER BY firstname DESC ";
                                            $result=mysqli_query($conn,$query);
                                            while($rs=mysqli_fetch_array($result)){
                                              $dtid =$rs['id'];    
                                              $dtno =$rs['id_number'];                                  
                                              $dtFName = $rs['firstname'];    
                                              $dtLName = $rs['lastname'];    
                                            
                                              echo '<option value = "' . $dtid . '">' . $rs["firstname"] . " " . $rs["lastname"] .'</option>';
                                            }
                                        ?>
                                        </select>
                                      </div>
                                      <div class="col-md-12">
                                        <select class="form-select" id="send_off2" name="send_off2">
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

   
    <!-- End of Docs Modal -->

     <!-- Delete Docs Modal -->
     <div class="modal fade" id="DeleteModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Document Delete</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <div class="card" style="margin: 10px;">
                            <div class="card-body">
                              <h2 class="card-title">Delete this document?</h2>
                                <!-- Fill out Form -->
                                <div class="row g-3" >
                                      <input type="hidden" class="form-control" id="delete_id" readonly>
                                      <input type="hidden" class="form-control" id="delete_code" readonly>                  
                                      <h5 id="delete_fileN" style="text-align: end; color:black"></h5>   
                                </div>
                              
                            </div>
                          </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              <button class="btn btn-success" name="save" id="delete" >Delete</button>
                            </div>
                        <!-- End Form -->
                    </div>
                </div>
          </div>
      <!-- End Delete Docs Modal-->

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

            // View Function
                  $('#rejectTable').on('click','.remarksbtn', function () {

                      $('#RemarksModal').modal('show');

                      $tr = $(this).closest('tr');

                      var data = $tr.children("td").map(function () {
                          return $(this).text();
                      }).get();

                      console.log(data); 
                      $('#remarks').text(data[18]);
                    });
              // End of View function 
           
               // Send modal calling
              $('.sendbtn').on('click', function () {

                  $('#SendModal').modal('show');

                  $tr = $(this).closest('tr');

                  var data = $tr.children("td").map(function () {
                      return $(this).text();
                  }).get();

                  console.log(data);      
                      $('#send_act1').val(data[15]);  
                      $('#send_off1').val(data[16]);
                      $('#send_date1').val(data[17]); 

                      $('#doc_fileN1').text(data[9]);  
                      $('#send_id').val(data[0]);
                      $('#send_code').val(data[1]); 
                });
              // End of Send modal calling 

              // Send function
              $('#send').click(function(d){ 
                    d.preventDefault();
                      if($('#send_id').val()!="" && $('#send_code').val()!="" && $('#send_act2').val()!="" && $('#send_off2').val()!=""
                      && $('#send_act1').val()!="" && $('#send_off1').val()!="" && $('#send_date1').val()!="" ){
                        $.post("function/send_func.php", {
                          docs_id:$('#send_id').val(), docs_code:$('#send_code').val(),
                          docs_act2:$('#send_act2').val(), docs_off2:$('#send_off2').val(),
                          docs_act1:$('#send_act1').val(), docs_off1:$('#send_off1').val(),
                          docs_date1:$('#send_date1').val()
                          },function(data){
                            if (data.trim() == "Val30"){
                            $('#SendModal').modal('hide');
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
                                    title:'Document is Successfully Submitted'
                                }).then(function(){
                                  document.location.reload(true)//refresh pages
                                });
                                    $('#delete_code').val("")
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
              // End Send function


                 // Delete modal calling
                 $('#rejectTable').on('click','.deletebtn', function () {

                  $('#DeleteModal').modal('show');

                  $tr = $(this).closest('tr');

                  var data = $tr.children("td").map(function () {
                      return $(this).text();
                  }).get();

                  console.log(data);      
                      $('#delete_fileN').text(data[9]);  
                      $('#delete_id').val(data[0]);
                      $('#delete_code').val(data[1]); 
                });
              // End of Delete modal calling 

              // Delete function
              $('#delete').click(function(d){ 
                    d.preventDefault();
                      if($('#delete_id').val()!="" && $('#delete_code').val()!="" ){
                        $.post("function/delete_func.php", {
                          docs_id:$('#delete_id').val(), docs_code:$('#delete_code').val()
                         
                          },function(data){
                            if (data.trim() == "Val30"){
                            $('#DeleteModal').modal('hide');
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
                                    title:'Document Successfully Deleted'
                                }).then(function(){
                                  document.location.reload(true)//refresh pages
                                });
                                    $('#delete_code').val("")
                                    $('#doc_act2').val("")
                                    $('#doc_off2').val("")
                            }else{
                              // Swal.fire("There is somthing wrong","","error");
                              Swal.fire(data);
                          }
                        })
                      }else{
                        Swal.fire("You must fill out every field","","warning");
                      }
                  })
              // End Delete function
          });

    </script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript">
        // Ajax for office picker
        function fetchOffice(id){
                $('#send_off2').html('');
                $.ajax({
                  type:'post',
                  url:'function/ajaxdata.php',
                  data : 'off_id='+id,
                  success: function(data){
                    $('#send_off2').html(data);
                    // console.log("success");
                  }
                })
              }
              // End of Ajax for office picker
    </script>
</body>

</html>