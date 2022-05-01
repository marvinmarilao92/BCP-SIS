<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Received Tickets</title>
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
<?php $page = 'recieved'; include ('core/sidebar.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Received Ticket</h1>
     
    </div><!-- End Page Title -->

   

    <section class="section">
      <div class="row">        
        <div class="col-lg-12">
          <div class="card">

            <div class="col-lg-12">
              <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                  <h4>List</h4>
              </div>
              <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
              </div> 
            </div>

            <div class="card-body" >           
              <!-- Table for Office records -->
              <table class="table table-hover datatable" id="receivedTable">
                <thead>
                  <tr>
                    <th scope="col">Subject</th>

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
                    $query="SELECT * FROM hdms_ticket_department WHERE (`status` = '1') AND `t_act`='$verified_session_firstname $verified_session_lastname'
                    ORDER BY date DESC ";
                    $result=mysqli_query($conn,$query);
                    while($rs=mysqli_fetch_array($result)){
                      $id =$rs['id']; $subject = $rs['subject'];      
                      $status = $rs['status']; $message = $rs['message'];   
                      $t_act =$rs['t_act']; $date = $rs['date'];    
                      $remarks = $rs['remarks'];   
  
  
                  ?>
                  <tr>
                    <td style="display:none"><?php echo $id?></td>
                    <td data-label="Subject:"><?php echo $subject; ?></td>
      
                    <td data-label="Actor:"><?php echo $t_act; ?></td>
                  
                    <td data-label="Date&T:"><?php echo $date; ?></td>
                    <td data-label="Status:"><?php echo $status; ?></td>
                  
                    <td style="display:none"><?php echo $message?></td>                    
                 
              
                    <td style="display:none"><?php echo $remarks?></td>

                  
                    <td WIDTH="13%">                    
                      <a class="btn btn-success approvedbtn" title="Approve"><i class="bi bi-check-lg"></i></a>
                      <a class="btn btn-danger rejectbtn" title="Reject"><i class="bi bi-x-lg" ></i></a>      
                      <a class="btn btn-primary " href='function/view_docu.php?ID=<?php echo $docId; ?>' target="_blank" title="View"><i class="bi bi-eye-fill"></i></a>                
                      <a class="btn btn-secondary sendbtn" title="Send"><i class="bi bi-cursor-fill"></i></a>
                      <a class="btn btn-dark holdbtn" title="Hold"><i class="bi bi-question-lg" ></i></a>                   
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

    <!-- Modals -->
        

        <!-- Approved Docs Modal -->
        <div class="modal fade" id="ApprovedModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Document Approved</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                      <div class="card" style="margin: 10px;">
                        <div class="card-body">
                          <h2 class="card-title">Are you sure you signed this document?</h2>
                            <!-- Fill out Form -->
                            <div class="row g-3" >
                                  <input type="hidden" class="form-control" id="signed_id" readonly>
                                  <input type="hidden" class="form-control" id="signed_code" readonly>                  
                                  <input type="hidden" class="form-control" id="signed_act2" value="<?php echo $verified_session_firstname . " " . $verified_session_lastname ?>" readonly>
                                  <input type="hidden" class="form-control" id="signed_off2" value="<?php echo $verified_session_office?>" readonly> 
                                  <h5 id="signed_fileN" style="text-align: end; color:black"></h5>  
                                  <div class="col-12">
                                      <textarea class="form-control" style="height: 80px" placeholder="Remarks" name="docremarks" id="signed_remarks" required></textarea>
                                  </div>  
                            </div>
                          
                        </div>
                      </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button class="btn btn-success" name="save" id="approved" >Approve</button>
                        </div>
                    <!-- End Form -->
                </div>
            </div>
        </div>
        <!-- End Approved Docs Modal-->

        <!-- Rejected Docs Modal -->
        <div class="modal fade" id="RejectedModal" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Document Reject</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                        <div class="card" style="margin: 10px;">
                          <div class="card-body">
                            <h2 class="card-title">Reject this document?</h2>
                              <!-- Fill out Form -->
                              <div class="row g-3" >
                                    <input type="hidden" class="form-control" id="reject_id" readonly>
                                    <input type="hidden" class="form-control" id="reject_code" readonly>                  
                                    <input type="hidden" class="form-control" id="reject_act2" value="<?php echo $verified_session_firstname . " " . $verified_session_lastname ?>" readonly>
                                    <input type="hidden" class="form-control" id="reject_off2" value="<?php echo $verified_session_office?>" readonly> 
                                    <h5 id="reject_fileN" style="text-align: end; color:black"></h5>   
                                    <div class="col-12">
                                        <textarea class="form-control" style="height: 80px" placeholder="Remarks" name="docremarks" id="reject_remarks" required></textarea>
                                    </div>                                     
                              </div>
                            
                          </div>
                        </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-danger" name="save" id="reject" >Reject</button>
                          </div>
                      <!-- End Form -->
                  </div>
              </div>
        </div>
        <!-- End Rejected Docs Modal-->

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
                                <input type="hidden" class="form-control" id="doc_id" readonly>
                                <input type="hidden" class="form-control" id="doc_code" readonly>                  
                                <input type="hidden" class="form-control" id="doc_act2" value="<?php echo $verified_session_firstname . " " . $verified_session_lastname ?>" readonly>
                                <input type="hidden" class="form-control" id="doc_off2" value="<?php echo $verified_session_office?>" readonly> 
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
        <div div class="modal fade" id="SendModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Document Submission</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                      <div class="card" style="margin: 10px;">
                        <div class="card-body">
                          <h2 class="card-title">Submit this document?<h5 id="doc_fileN1" style="text-align: end; color:black;"></h5></h2>
                          
                            <!-- Fill out Form -->
                            <div class="row g-3" style="margin-top: 10px;">
                                  <input type="hidden" class="form-control" id="send_id" readonly>
                                  <input type="hidden" class="form-control" id="send_code" readonly>   
                                  <input type="hidden" class="form-control" id="send_act1" readonly>   
                                  <input type="hidden" class="form-control" id="send_off1" readonly>   
                                  <input type="hidden" class="form-control" id="send_date1" readonly>                  
                                  <div class="col-md-12">
                                    <select class="form-select select send_act2" id="send_act2" name="send_act2" onChange="fetchOffice(this.value);">
                                      <option value="" selected="selected" disabled="disabled">Select Receiver</option>
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
                                    <select class="form-select" id="send_off2" name="send_off2" >
                                      <option selected="selected" disabled="disabled">Select Office</option>
                                    </select>
                                  </div>
                                  <div class="col-12">
                                      <textarea class="form-control" style="height: 80px" placeholder="Remarks" name="docremarks" id="docremarks" id="docdesc" required></textarea>
                                  </div> 
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


    <!-- End of Modals -->

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
          

            // Approved modal calling
              $('#receivedTable').on('click','.approvedbtn', function () {

                $('#ApprovedModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);      
                    $('#signed_fileN').text(data[9]);  
                    $('#signed_id').val(data[0]);
                    $('#signed_code').val(data[1]); 
              });
            // End of Approved modal calling

            // Approved function
              $('#approved').click(function(d){ 
                d.preventDefault();
                  if($('#signed_id').val()!="" && $('#signed_code').val()!="" && $('#signed_act2').val()!="" && $('#signed_off2').val()!=""&& $('#signed_remarks').val()!="" ){
                    $.post("function/approved_func.php", {
                      docs_id:$('#signed_id').val(), docs_code:$('#signed_code').val(),
                      docs_act2:$('#signed_act2').val(), docs_off2:$('#signed_off2').val(),
                      docs_remarks:$('#signed_remarks').val()
                      },function(data){
                        if (data.trim() == "Val30"){
                        $('#ApprovedModal').modal('hide');
                        Swal.fire("No data stored in our database","","error");//response message
                        // Empty test field
                      }else if(data.trim() == "success"){
                        $('#ReceivedModal').modal('hide');
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
                              title:"You Successfully Approved this Document"
                              }).then(function(){
                                window.location = "received_docs.php?id=<?php echo $_SESSION["login_key"];?>";//refresh pages
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
            // End Approved function

            // Reject modal calling
              $('#receivedTable').on('click','.rejectbtn',  function () {

                $('#RejectedModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);      
                    $('#reject_fileN').text(data[9]);  
                    $('#reject_id').val(data[0]);
                    $('#reject_code').val(data[1]); 
              });
            // End of Reject modal calling 

            // Reject function
              $('#reject').click(function(d){ 
                d.preventDefault();
                  if($('#reject_id').val()!="" && $('#reject_code').val()!="" && $('#reject_act2').val()!="" && $('#reject_off2').val()!=""&& $('#reject_remarks').val()!="" ){
                    $.post("function/reject_func.php", {
                      docs_id:$('#reject_id').val(), docs_code:$('#reject_code').val(),
                      docs_act2:$('#reject_act2').val(), docs_off2:$('#reject_off2').val(),
                      docs_remarks:$('#reject_remarks').val()
                      },function(data){
                        if (data.trim() == "Val30"){
                        $('#RejectedModal').modal('hide');
                        Swal.fire("No data stored in our database","","error");//response message
                        // Empty test field
                      }else if(data.trim() == "success"){
                        $('#RejectedModal').modal('hide');
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
                              title:"You Successfully Approved this Document"
                              }).then(function(){
                                window.location = "received_docs.php?id=<?php echo $_SESSION["login_key"];?>";//refresh pages
                              });
                                $('#reject_code').val("")
                                $('#rejec_act2').val("")
                                $('#rejec_off2').val("")
                        }else{
                          Swal.fire("There is somthing wrong","","error");
                          // Swal.fire(data);
                      }
                    })
                  }else{
                    Swal.fire("You must fill out every field","","warning");
                  }
              })
            // End Reject function

            // Hold modal calling
              $('#receivedTable').on('click','.holdbtn', function () {

                $('#HoldModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);      
                    $('#doc_fileN').text(data[9]);  
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
                              title:"Document is now on hold",
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
                  Swal.fire(data);
              })
            // End Hold function

            // Send modal calling
              $('#receivedTable').on('click','.sendbtn', function () {

                $('#SendModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);      
                    $('#send_act1').val(data[3]);  
                    $('#send_off1').val(data[4]);
                    $('#send_date1').val(data[5]); 

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
                      docs_date1:$('#send_date1').val(), docs_remarks:$('#docremarks').val()
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
                              title:"Document to track Successfully Submitted"
                              }).then(function(){
                                document.location.reload(true)//refresh pages
                              });                       
                                $('#doc_code').val("")
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
            // End Send function

        });

    </script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->

    <script type="text/javascript">ss
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