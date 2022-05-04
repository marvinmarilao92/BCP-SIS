<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Template Requests</title>
<head>
<?php  include "core/key_checker.php"; ?>
<?php include ('core/css-links.php');//css connection?>
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
<?php $page = 'temp'; include ('core/side-nav.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Template Requests</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Module</li>
          <li class="breadcrumb-item active">Template Requests</li>
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
                  <h4>Requests List</h4>
              </div>
              <div class="form-group col-md-1.5 btn-lg" style="float: right; padding:20px;">
                  <a type="button" class="btn btn-primary form-control" href="request_req?id=<?php echo $_SESSION["login_key"];?>" >
                  Status Records
                  </a>
              </div> 
              <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
              </div> 
            </div>
            <div class="card-body" >           
              <!-- Table for Request records -->
              <table class="table table-hover datatable" id="ReqTable">
                <thead>
                  <tr>
                    <th WIDTH="1%"></th>
                    <th scope="col" WIDTH="12%">Code</th>
                    <th scope="col" WIDTH="12%">Student No.</th>
                    <th scope="col" >Porgram</th>  
                    <th scope="col">Document</th>   
                    <th scope="col">Date</th>    
                    <th scope="col">Status</th>                    
                    <th scope="col" WIDTH="10%">Action</th>          
                  </tr>
                </thead>
                <tbody>
                  <?php
                    require_once("include/conn.php");
                    $query="SELECT * FROM datms_tempreq WHERE status='Sent'  ORDER BY date DESC ";
                    $result=mysqli_query($conn,$query);
                    while($rs=mysqli_fetch_array($result)){
                      $docId =$rs['id']; $stud_no = $rs['id_number']; $prog = $rs['program'];      
                      $doctype =$rs['docu']; $stat = $rs['status']; $remarks = $rs['remarks']; 
                      $date =$rs['date']; $fname = $rs['file_name'];$docCode =$rs['req_code'];
                  ?>
                  <tr>
                    <td style="display:none"><?php echo $docId?></td>
                    <td ><?php
                    date_default_timezone_set("asia/manila");
                    $today = date("Y-m-d",strtotime("+0 HOURS"));
                    $query_2 = "SELECT * FROM datms_tempreq WHERE date = '$date' AND date LIKE '%$today%'";
                    $result_2 = mysqli_query($conn, $query_2);
                    $count1 = mysqli_num_rows($result_2);

                    if($count1!=0){
                      $badge='<span style=" color: green;">●</span>';
                    }else{
                      $badge='<span style=" color: gray;">●</span>';
                    }
                    echo $badge?></td>
                    <td data-label="Code:"><?php echo $docCode;?></td>
                    <td data-label="No:" ><?php echo $stud_no; ?></td>
                    <td data-label="Prog:"><?php echo $prog; ?></td>                    
                    <td data-label="Docu:"><?php echo $doctype?></td>                        
                    <td data-label="Date:"><?php echo $date; ?></td>
                    <td data-label="Status:">
                    <?php 
                    if($stat=='Approved'){
                      echo '<span class="badge bg-success">'.$stat.'</span>';
                    }else if($stat=='Rejected'){
                      echo '<span class="badge bg-danger">'.$stat.'</span>';
                    }else{
                      echo '<span class="badge bg-primary">'.$stat.'</span>';
                    }                 
                    ?>  
                    <a class="fw-bold remarksbtn">&nbsp;&nbsp;</a></td>   
                    <td style="display:none"><?php echo $fname; ?></td>               
                    <td style="display:none"><?php echo $remarks; ?></td>             
                    <td WIDTH="10%">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">      
                      <?php 
                      $check_iden= "SELECT * FROM datms_doctype WHERE dt_name = '$doctype' AND dt_kind = 'Softcopy'";
                      $result_2 = mysqli_query($conn, $check_iden);
                      $count1 = mysqli_num_rows($result_2);
                      if($count1!=0){
                        ?>
                        <a  class="btn btn-success softcopy_file"><i class="bi bi-check-lg"></i></a>   
                        <?php
                      }else{
                        ?>
                        <a  class="btn btn-success hardcopy_file"><i class="bi bi-check-lg"></i></a>   
                        <?php
                      }
                      ?>                     
                      <a  class="btn btn-danger decline"><i class="bi bi-x-lg"></i></a>                      
                    </div>
                    </td>
                  </tr>

                  <?php } ?>
                  
                </tbody>
              </table>
              <!-- End of Request table record -->

            </div>
          </div>

        </div>
      </div>
      
    </section>

  </main><!-- End #main -->

  <!-- Office Modals -->

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
      <!-- Create Document Modal -->
      <div class="modal fade" id="AddModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">CREATE DOCUMENT</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data" >
                  <div class="card" style="margin: 10px;">
                    <div class="card-body">
                      <h2 class="card-title">Fill all neccessary info</h2>
                        <!-- Fill out Form -->
                        
                        <div class="row g-3" >
                        <input type="hidden" id="doccreator" name="doccreator" class="form-control"  value="<?php echo $verified_session_firstname . " " . $verified_session_lastname ?>" readonly>
                        <input type="hidden" id="docoffice" name="docoffice" class="form-control"  value="<?php echo $verified_session_office?>" readonly>
                          <div class="col-md-6">
                              <input type="text" id="docname" name="docname" class="form-control" placeholder="Title" required>
                          </div>
                          <br>
                          <div class="col-md-6">
                            <select class="form-select" id="doctype" name="doctype">
                            <option selected="selected" disabled="disabled">Document Type</option>
                              <?php
                                require_once("include/conn.php");
                                $query="SELECT * FROM datms_doctype ORDER BY dt_date DESC ";
                                $result=mysqli_query($conn,$query);
                                while($rs=mysqli_fetch_array($result)){
                                  $dtid =$rs['dt_id'];                                    
                                  $dtName = $rs['dt_name'];       
                              ?>
                                <option><?php echo $dtName;?></option>
                            <?php }?>
                            </select>
                          </div>
                          <div class="col-md-12">
                            <input class="form-control" type="file" id="docfile" name="docfile">
                          </div>
                          <br>
                          <div class="col-12">
                              <textarea class="form-control" style="height: 80px" placeholder="Description" name="docdesc" id="docdesc" required></textarea>
                          </div>        
                        </div>
                                    
                    </div>
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button class="btn btn-primary" name="save">Create Document</button>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>     
      </div>
      <!-- End Create Document Modal-->

      <!-- Received Office Modal -->
      <div class="modal fade" id="ApproveModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Approve Request</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                  <div class="card" style="margin: 10px;">
                    <div class="card-body">
                        <!-- Fill out Form -->
                        <div class="row g-3" >
                              <input type="hidden" class="form-control" id="req_docuA" readonly> 
                              <input type="hidden" class="form-control" id="req_studidA" readonly> 
                              <input type="hidden" class="form-control" id="req_codeA" readonly>                  
                              <input type="hidden" class="form-control" id="req_actA" value="<?php echo $verified_session_firstname . " " . $verified_session_lastname ?>" readonly>                            
                              <h6 id="req_reasonA" style="margin-top: 30px; color:black"></h6>  
                              <div class="col-12">
                                  <textarea class="form-control" style="height: 80px" placeholder="Remarks" name="docremarks" id="approve_remarksA" required></textarea>
                              </div>   
                        </div>
                      
                    </div>
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button class="btn btn-success" name="save" id="decline_btn" >Approve Request</button>
                    </div>
                <!-- End Form -->
            </div>
        </div>
      </div>
      <!-- End Received Office Modal-->

      <!-- Received Office Modal -->
      <div class="modal fade" id="DeclineModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Reject Request</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                  <div class="card" style="margin: 10px;">
                    <div class="card-body">
                        <!-- Fill out Form -->
                        <div class="row g-3" >
                              <input type="hidden" class="form-control" id="req_docu" readonly> 
                              <input type="hidden" class="form-control" id="req_studid" readonly> 
                              <input type="hidden" class="form-control" id="req_code" readonly>                  
                              <input type="hidden" class="form-control" id="req_act" value="<?php echo $verified_session_firstname . " " . $verified_session_lastname ?>" readonly>                            
                              <h6 id="req_reason" style="margin-top: 30px; color:black"></h6>  
                              <div class="col-12">
                                  <textarea class="form-control" style="height: 80px" placeholder="Remarks" name="docremarks" id="reject_remarks" required></textarea>
                              </div>   
                        </div>
                      
                    </div>
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button class="btn btn-danger" name="save" id="decline_btn" >Reject Request</button>
                    </div>
                <!-- End Form -->
            </div>
        </div>
      </div>
      <!-- End Received Office Modal-->

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
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center" style="background-color: rgb(13, 110, 253);"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>

  <!-- JS Scripts -->
    <script>
        // this script will execute as soon a the website runs
        $(document).ready(function () {

              // View Function
                $('#ReqTable').on('click','.remarksbtn', function () {

                  $('#RemarksModal').modal('show');

                  $tr = $(this).closest('tr');

                  var data = $tr.children("td").map(function () {
                      return $(this).text();
                  }).get();

                  console.log(data); 
                  $('#remarks').text(data[18]);
                });
              // End of View function 

              // Decline modal calling
                $('#ReqTable').on('click','.decline', function () {

                  $('#DeclineModal').modal('show');

                  $tr = $(this).closest('tr');

                  var data = $tr.children("td").map(function () {
                      return $(this).text();
                  }).get();

                  console.log(data);      
                      $('#req_reason').text('Reason for request: '+data[9]);  
                      $('#req_studid').val(data[3]); 
                      $('#req_docu').val(data[5]); 
                      $('#req_code').val(data[2]); 
                });
              // End of Decline modal calling 

              // Received function
                $('#decline_btn').click(function(d){ 
                  d.preventDefault();
                    if($('#reject_remarks').val()!="" && $('#req_code').val()!="" && $('#req_act').val()!=""&& $('#req_docu').val()!="" && $('#req_studid').val()!=""){
                      $.post("function/req_reject_func.php", {
                        remarks:$('#reject_remarks').val(), req_code:$('#req_code').val(),
                        docu:$('#req_docu').val(), studid:$('#req_studid').val(),
                        req_act:$('#req_act').val()
                        },function(data){
                          if (data.trim() == "failed"){
                          $('#DeclineModal').modal('hide');
                          Swal.fire("No data stored in our database","","error");//response message
                            $('#req_studid').val("")
                            $('#req_docu').val("")
                            $('#req_code').val("")
                            $('#req_act').val("")
                            $('#reject_remarks').val("")
                          // Empty test field
                        }else if(data.trim() == "success"){
                          $('#DeclineModal').modal('hide');
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
                                title:"Document is Successfully Received"
                                }).then(function(){
                                  document.location.reload(true)//refresh pages
                                });              
                                  $('#req_studid').val("")
                                  $('#req_docu').val("")
                                  $('#req_code').val("")
                                  $('#req_act').val("")
                                  $('#reject_remarks').val("")
                          }else{
                            Swal.fire("There is somthing wrong","","error");
                            // Swal.fire(data);
                        }
                      })
                    }else{
                      Swal.fire("You must fill out every field","","warning");
                    }
                })
              // End Received function


              // Decline modal calling
                $('#ReqTable').on('click','.hardcopy_file', function () {

                  $('#ApproveModal').modal('show');

                  $tr = $(this).closest('tr');

                  var data = $tr.children("td").map(function () {
                      return $(this).text();
                  }).get();

                  console.log(data);      
                      $('#req_reasonA').text('Reason for request: '+data[9]);  
                      $('#req_studidA').val(data[3]); 
                      $('#req_docuA').val(data[5]); 
                      $('#req_codeA').val(data[2]); 
                });
              // End of Decline modal calling 

              // Received function
                $('#decline_btn').click(function(d){ 
                  d.preventDefault();
                    if($('#approve_remarksA').val()!="" && $('#req_codeA').val()!="" && $('#req_actA').val()!=""&& $('#req_docuA').val()!="" && $('#req_studidA').val()!=""){
                      $.post("function/req_approve_func.php", {
                        remarksA:$('#approve_remarksA').val(), req_codeA:$('#req_codeA').val(),
                        docuA:$('#req_docuA').val(), studidA:$('#req_studidA').val(),
                        req_actA:$('#req_actA').val()
                        },function(data){
                          if (data.trim() == "failed"){
                          $('#DeclineModal').modal('hide');
                          Swal.fire("No data stored in our database","","error");//response message
                            $('#req_studidA').val("")
                            $('#req_docuA').val("")
                            $('#req_codeA').val("")
                            $('#req_actA').val("")
                            $('#approve_remarksA').val("")
                          // Empty test field
                        }else if(data.trim() == "success"){
                          $('#DeclineModal').modal('hide');
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
                                title:"Document is Successfully Received"
                                }).then(function(){
                                  document.location.reload(true)//refresh pages
                                });              
                                  $('#req_studidA').val("")
                                  $('#req_docuA').val("")
                                  $('#req_codeA').val("")
                                  $('#req_actA').val("")
                                  $('#approve_remarksA').val("")
                          }else{
                            Swal.fire("There is somthing wrong","","error");
                            // Swal.fire(data);
                        }
                      })
                    }else{
                      Swal.fire("You must fill out every field","","warning");
                    }
                })
              // End Received function

          });

    </script>
  
</body>

</html>