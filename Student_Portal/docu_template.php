<?php
include('includes/session.php');
?>
<!DOCTYPE html>
  <html lang="en">
    <title>DATMS | Request Document</title>
      <head>
      <?php include ('includes/head.php');//css connection?>
        <style>
          /* Print ccs */
            @media screen {
                #printSection {
                    display: none;
                }
              }
              @media print {
                body * {
                  visibility:hidden;
                }
                #printSection, #printSection * {
                  visibility:visible;
                }
                #printSection {
                  position:absolute;
                  left:0;
                  top:0;
                }
              }
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

      <!-- ======= Header ======= -->
      <?php include ('includes/nav.php');//Design for  Header?>
      <?php $page = 'req'; include ('includes/sidebar.php');//Design for sidebar?>

      <!-- Start #main -->
      <main id="main" class="main">

        <div class="pagetitle">
          <h1>Document Request</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Module</li>
              <li class="breadcrumb-item active">Document Request</li>
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
                      <h4>Requested List</h4>
                  </div>
                  <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#SendModal" style="float: right; padding:20px;">
                      <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#SendModal" >
                      Request Document
                      </button>
                  </div> 
                </div>
                <div class="card-body" >           
                  <!-- Table for Document List records -->
                  <form method="POST">
                    
                    <table class="table table-hover datatable" id="ReqTable">
                      <thead>
                        <tr>
                          <th WIDTH="9%">Duration</th>
                          <th scope="col" WIDTH="12%">Code</th>
                          <th scope="col" style="display:none" WIDTH="12%">Student No.</th>
                          <th scope="col" style="display:none" >Porgram</th>  
                          <th scope="col">Document</th>   
                          <th scope="col">Date</th>    
                          <th scope="col">Status</th>                    
                          <th scope="col" WIDTH="8%">Action</th>          
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require_once("includes/conn.php");
                          $query="SELECT * FROM datms_tempreq WHERE `id_number`='$verified_session_username' ORDER BY date DESC ";
                          $result=mysqli_query($conn,$query);
                          while($rs=mysqli_fetch_array($result)){
                            $docId =$rs['id']; $stud_no = $rs['id_number']; $prog = $rs['program'];      
                            $doctype =$rs['docu']; $stat = $rs['status']; $remarks = $rs['remarks']; 
                            $req_date =$rs['date']; $fname = $rs['file_name'];$docCode =$rs['req_code'];
                            $filename =$rs['file_name'];
                        ?>
                        <tr>
                          <td style="display:none"><?php echo $docId?></td>
                          <td ><?php
                          date_default_timezone_set("asia/manila");
                          $today = date("Y-m-d",strtotime("+0 HOURS"));
                          $query_2 = "SELECT * FROM datms_tempreq WHERE date = '$req_date' AND date LIKE '%$today%'";
                          $result_2 = mysqli_query($conn, $query_2);
                          $count1 = mysqli_num_rows($result_2);

                          $date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
                          $d1 = $req_date;
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
                          <td data-label="No:" style="display:none"><?php echo $stud_no; ?></td>
                          <td data-label="Prog:" style="display:none"><?php echo $prog; ?></td>                    
                          <td data-label="Docu:"><?php echo $doctype?></td>                        
                          <td data-label="Date:"><?php echo $req_date; ?></td>
                          <td data-label="Status:">
                          <?php 
                          if($stat=='Approved'){
                            echo '<span class="badge bg-success">'.$stat.'</span>';
                          }else if($stat=='Rejected'){
                            echo '<span class="badge bg-danger">'.$stat.'</span>';
                          }else if($stat=='Downloaded'){
                            echo '<span class="badge bg-dark">'.$stat.'</span>';
                          }else{
                            echo '<span class="badge bg-primary">'.$stat.'</span>';
                          }                 
                          ?>  
                          <a class="fw-bold remarksbtn">&nbsp;&nbsp;<i class="bi bi-info-circle"></i></a></td>   
                          <td style="display:none"><?php echo $fname; ?></td>               
                          <td style="display:none"><?php echo $remarks; ?></td>             
                          <td WIDTH="8%">
                                             
                          <?php 
                          if($filename!='' && $stat=='Approved'){
                            ?>
                            <a class="btn btn-primary " href='function/view_template?id=<?php echo $docId; ?>' target="_blank" title="View"><i class="ri-eye"></i></a> 
                            <?php
                          }                
                          ?>  
                            <a  class="btn btn-secondary viewbtn"><i class="ri ri-barcode-line"></i></a>                      
                          </td>
                        </tr>

                        <?php } ?>
                        
                      </tbody>
                    </table>
                  
                  </form>
                  <!-- End of Document table record -->
                </div>
              </div>

            </div>
          </div>
          
        </section>

      </main>
      <!-- End #main -->

        
          <!-- Document List Modals -->

            <!-- Create Document Modal -->
            <div class="modal fade" id="SendModal" tabindex="-1">
                <div class="modal-dialog  modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">REQUEST FOR TEMPLATE</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                          <div class="card" style="margin: 10px;">
                            <div class="card-body">
                              <h2 class="card-title">Fill all neccessary info</h2>
                                <!-- Fill out Form -->
                                
                                <div class="row g-3" >                              
                                <input type="hidden" id="reqprog" name="reqprog" class="form-control"  value="<?php echo $verified_session_course?>" readonly>        
                                                        
                                    <div class="col-md-12" style="display: none;">
                                      <div class="form-floating">
                                        <input type="text" class="form-control" id="acc_no" name="acc_no" value="<?php echo $verified_session_username ?>" onChange="fetchTracking(this.value);" placeholder="Your Name">
                                        <label for="floatingName">Account No.</label>
                                      </div>
                                    </div>                                
                                  <div class="col-md-12">
                                    <div class="form-floating">
                                      <select class="form-select" name="document" id="document" aria-label="State" Required onchange="oncollapse()">
                                        <option value="" selected="selected" disabled="disabled">Select Document</option>
                                        <?php
                                            require_once("includes/conn.php");
                                            $query="SELECT * FROM datms_doctype WHERE dt_desc = 'Students' ORDER BY dt_date DESC ";
                                            $result=mysqli_query($conn,$query);
                                            while($rs=mysqli_fetch_array($result)){
                                              $dtid =$rs['dt_id'];                                    
                                              $dtName = $rs['dt_name'];       
                                          ?>
                                            <option><?php echo $dtName;?></option>
                                        <?php }?>
                                      </select>
                                      <label for="floatingSelect">Document</label>
                                    </div>
                                  </div>  
                                  <div class="col-12">
                                      <textarea class="form-control" style="height: 80px" placeholder="Reason of request" name="reason" id="reason" required autofocus></textarea>
                                  </div>        
                                </div>
                                            
                            </div>
                          </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button class="btn btn-primary" name="send" id="send">Send Request</button>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>     
            </div>
            <!-- End Create Document Modal-->

            <!-- Desc Document modal -->
            <div class="modal fade" id="RemarksModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-l">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">REMARKS</h5>
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

            
            <!-- View Document modal -->
            <div class="modal fade" id="ViewModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-l">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">TEMPLATE REQUESTED</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" >
                      <div class="card" style="margin: 10px;">
                        <form method="post">
                          <div class="card-body" id="printcode">
                              <h5 class="card-title">Request Information</h5>
                              Requested File: <h5 id="view_filename" style="margin-left: 60px;"></h5>
                              Reason for request: <h5 id="view_creator" style="margin-left: 60px;"></h5>
                              Date Requested: <h5 id="view_date" style="margin-left: 60px;"></h5>                
                              <input type="hidden" id="view_code" name="view_code" class="form-control" placeholder="Title" readonly>
                              <input type="hidden" id="view_title" name="view_title" class="form-control" placeholder="Title" readonly>
                              <input type="hidden" id="view_filename" name="view_filename" class="form-control" placeholder="Title" readonly>
                              <!-- Barcode -->
                              <div class="col-12" style="text-align: center;">
                                <svg id="barcode"></svg>
                              </div>
                          </div>
                          </form>
                        </div>   
                    </div>
                    <div class="modal-footer">
                      <!-- <button class="btn btn-primary" name="print" id="print" >Print</button> -->
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
            </div>
            <!-- End View office Modal-->

          <!-- End of Document List Modals -->
          
         <!-- Vendor JS Files/ Template main js file -->
           <?php include ('includes/footer.php');//css connection?>
          <!-- End Footer -->

          <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
          <!-- JS Scripts -->
          <script type="text/javascript">
            
              // this script will execute as soon a the website runs
              $(document).ready(function () {    
                // View Function
                $('#ReqTable').on('click','.viewbtn', function () {

                    $('#ViewModal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data); 
                    document.getElementById("view_code").placeholder = data[1];      
                    document.getElementById("view_title").placeholder = data[8];   
                    document.getElementById("view_filename").placeholder = data[9];   
                    $('#view_filename').text(data[5]);
                    $('#view_creator').text(data[9]);
                    $('#view_date').text(data[6]);
                    // JsBarcode("#barcode", data[1]);
                    JsBarcode("#barcode", data[2], {
                      format: "CODE128",
                      lineColor: "#000",
                      width: 3,
                      height: 150,
                      textAlign: "center",
                      displayValue: true
                    });
                  });
                // Remarks Function
                $('#ReqTable').on('click','.remarksbtn', function () {

                      $('#RemarksModal').modal('show');

                      $tr = $(this).closest('tr');

                      var data = $tr.children("td").map(function () {
                          return $(this).text();
                      }).get();

                      console.log(data); 
                      $('#remarks').text(data[9]);                     
                      
                    });            

                    // Request Document function
                    $('#send').click(function(a){ 
                      a.preventDefault();
                      if($('#acc_no').val()!="" && $('#reqprog').val()!=""&& $('#document').val()!=""&& $('#reason').val()!=""){
                        $.post("function/send_req.php", {
                          id_no:$('#acc_no').val(),
                          prog:$('#reqprog').val(),
                          reason:$('#reason').val(),
                          docs:$('#document').val()
                          },function(data){
                          if (data.trim() == "failed"){
                            $('#SendModal').modal('hide');
                            Swal.fire("Request this document is already submitted","","error");//response message
                            // Empty test field
                            $('#document').val("")
                            $('#reason').val("")
                          }else if(data.trim() == "success"){
                            $('#SendModal').modal('hide');
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
                                title:'You successfully sent your request'
                                }).then(function(){
                                  document.location.reload(true)//refresh pages
                                });
                                $('#document').val("")
                                $('#reason').val("")
                            }else{
                              Swal.fire(data);
                          }
                        })
                      }else{
                        Swal.fire("You must fill out every field","","warning");
                      }
                    })
                    // End Request Document function
                
              });

          </script>
        </body>
  </html>