<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Received Documents</title>
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
              <table class="table table-hover datatable" id="receivedTable">
                <thead>
                  <tr>
                    <th WIDTH="9%">Duration</th>
                    <th scope="col">DocCode</th>
                    <th scope="col" >Requested By</th>
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
                    $query="SELECT * FROM datms_documents WHERE (`doc_status` = 'Created' OR `doc_status` = 'Pending') AND `doc_actor1`='$verified_session_firstname $verified_session_lastname'
                    ORDER BY doc_date2 DESC ";
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
                    <td data-label="Duration:"><?php
                    date_default_timezone_set("asia/manila");
                    $today = date("Y-m-d",strtotime("+0 HOURS"));
                    $query_2 = "SELECT * FROM datms_documents WHERE doc_date1 = '$docDate1' AND doc_date1 LIKE '%$today%'";
                    $result_2 = mysqli_query($conn, $query_2);
                    $count1 = mysqli_num_rows($result_2);

                    $date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
                    $d1 = $docDate1;
                    $today = date("Y-m-d",strtotime("+0 HOURS"));
                    $d2 = $date;
                    // Declare and define two dates
                    $date1 = strtotime("$d1");
                    $date2 = strtotime("$d2");

                    // Formulate the Difference between two dates
                    $diff = abs($date2 - $date1);
                  
                    // To get the year divide the resultant date into
                    // total seconds in a year (365*60*60*24)
                    $years = floor($diff / (365*60*60*24));
                  
                    // To get the month, subtract it with years and
                    // divide the resultant date into
                    // total seconds in a month (30*60*60*24)
                    $months = floor(($diff - $years * 365*60*60*24)
                                                  / (30*60*60*24));
                  
                    // To get the day, subtract it with years and
                    // months and divide the resultant date into
                    // total seconds in a days (60*60*24)
                    $days = floor(($diff - $years * 365*60*60*24 -
                                $months*30*60*60*24)/ (60*60*24));
                  
                    // To get the hour, subtract it with years,
                    // months & seconds and divide the resultant
                    // date into total seconds in a hours (60*60)
                    $hours = floor(($diff - $years * 365*60*60*24
                          - $months*30*60*60*24 - $days*60*60*24)
                                                      / (60*60));
                  
                    // To get the minutes, subtract it with years,
                    // months, seconds and hours and divide the
                    // resultant date into total seconds i.e. 60
                    $minutes = floor(($diff - $years * 365*60*60*24
                            - $months*30*60*60*24 - $days*60*60*24
                                              - $hours*60*60)/ 60);
                  
                    // To get the minutes, subtract it with years,
                    // months, seconds, hours and minutes
                    $seconds = floor(($diff - $years * 365*60*60*24
                            - $months*30*60*60*24 - $days*60*60*24
                                    - $hours*60*60 - $minutes*60));
                          
                    if($years !=0 ){
                      // Print the result
                      $duration = "$years"." yr,";
                    }else if($months != 0 ){
                      $duration = "$months"." mos";
                    }else if($days > 1 ){
                      $duration = "$days"." days";
                    }else if($days == 1 ){
                      $duration = "$days"." day";
                    }else if($hours > 1){
                      $duration = "$hours"." hrs";
                    }else if($hours == 1){
                      $duration = "$hours"." hr";
                    }else if($minutes != 0 ){
                      $duration = "$minutes"." min";
                    }else if($seconds != 0 ){
                      $duration = "$seconds"." sec";
                    }else if($seconds == 0 ){
                      $duration = "1"." sec";
                    }else{
                      $duration = "2";
                    }

                    if($count1!=0){
                      $badge='<span style=" color: green;">●</span>';
                    }else{
                      $badge='<span style=" color: gray;">●</span>';
                    }
                    echo $duration.' ago '.$badge?></td>
                    <td data-label="Code:"><?php echo $docCode;?></td>
                    <td data-label="Requested By:"><?php echo $docTitle; ?></td>
                    <td data-label="Actor:"><?php echo $docAct1; ?></td>
                    <td style="display:none"><?php echo $docOff1?></td>
                    <td data-label="Date&T:"><?php echo $docDate1; ?></td>
                    <td data-label="Status:"><?php echo $docStat; ?></td>
                    <td style="display:none"><?php echo floor($docSize / 1000) . ' KB'; ?></td>
                    <td style="display:none"><?php echo $docDl; ?></td>
                    <td style="display:none"><?php echo $docName?></td>
                    <td style="display:none"><?php echo $docType?></td>
                    <td style="display:none"><?php echo $docDesc?></td>                    
                    <td style="display:none"><?php echo $docAct2?></td>
                    <td style="display:none"><?php echo $docOff2?></td>
                    <td style="display:none"><?php echo $docDate2?></td>
                    <td style="display:none"><?php echo $docAct3?></td>
                    <td style="display:none"><?php echo $docOff3?></td>
                    <td style="display:none"><?php echo $docDate3?></td>
                    <td style="display:none"><?php echo $docRemarks?></td>

                  
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
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center" style="background-color: rgb(13, 110, 253);"><i class="bi bi-arrow-up-short"></i></a>

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
                    $('#signed_fileN').text(data[10]);  
                    $('#signed_id').val(data[0]);
                    $('#signed_code').val(data[2]); 
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
                          // Swal.fire("There is somthing wrong","","error");
                          Swal.fire(data);
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
                    $('#reject_fileN').text(data[10]);  
                    $('#reject_id').val(data[0]);
                    $('#reject_code').val(data[2]); 
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
                    $('#doc_fileN').text(data[10]);  
                    $('#doc_id').val(data[0]);
                    $('#doc_code').val(data[2]); 
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
                    $('#send_act1').val(data[4]);  
                    $('#send_off1').val(data[5]);
                    $('#send_date1').val(data[6]); 

                    $('#doc_fileN1').text(data[10]);  
                    $('#send_id').val(data[0]);
                    $('#send_code').val(data[2]); 
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