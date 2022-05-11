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
                  <a type="button" class="btn btn-primary form-control" href="request_record?id=<?php echo $_SESSION["login_key"];?>" >
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
                    <th WIDTH="9%">Duration</th>
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
                      $req_date =$rs['date']; $fname = $rs['file_name'];$docCode =$rs['req_code'];
                  ?>
                  <tr>
                    <td style="display:none"><?php echo $docId?></td>
                    <td ><?php
                    date_default_timezone_set("asia/manila");
                    $today = date("Y-m-d",strtotime("+0 HOURS"));
                    $query_2 = "SELECT * FROM datms_tempreq WHERE date = '$req_date' AND date LIKE '%$today%'";
                    $result_2 = mysqli_query($conn, $query_2);
                    $count1 = mysqli_num_rows($result_2);

                    $date = date("Y-m-d H:i:s",strtotime("+0 HOURS"));
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
                    <td data-label="No:" ><?php echo $stud_no; ?></td>
                    <td data-label="Prog:"><?php echo $prog; ?></td>                    
                    <td data-label="Docu:"><?php echo $doctype?></td>                        
                    <td data-label="Date:"><?php echo $req_date; ?></td>
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
                      <button class="btn btn-primary" name="">Create Document</button>
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
                      <button class="btn btn-success" name="" id="approved_btn" >Approve Request</button>
                    </div>
                <!-- End Form -->
            </div>
        </div>
      </div>
      <!-- End Received Office Modal-->
      
      <!-- Received Office Modal -->
      <div class="modal fade" id="ApproveModal1" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <form method="post" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Approve Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>                
                <div class="card" style="margin: 10px;">
                  <div class="card-body">
                      <!-- Fill out Form -->
                      <div class="row g-3" >
                            <input type="hidden" class="form-control" id="req_docuB" name="req_docuB" readonly> 
                            <input type="hidden" class="form-control" id="req_studidB" name="req_studidB" readonly> 
                            <input type="hidden" class="form-control" id="req_codeB" name="req_codeB" readonly>                  
                            <input type="hidden" class="form-control" id="req_actB" value="<?php echo $verified_session_firstname . " " . $verified_session_lastname ?>" name="req_actB" readonly>                            
                            <h6 id="req_reasonB" style="margin-top: 30px; color:black"></h6>  
                            <div class="col-md-12">
                              <input class="form-control"  type="file" id="docfile" name="docfile" accept="application/pdf" >  
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" style="height: 80px" placeholder="Remarks" name="remarksB" id="remarksB" required></textarea>
                            </div>   
                      </div>
                    
                  </div>
                </div>                
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-success" name="approved" id="approved" >Approve Request</button>
              </div>
              <!-- End Form -->
            </div>
          </form>
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
                      <button class="btn btn-danger" id="decline_btn" >Reject Request</button>
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

  <!-- Create Document to Track -->
    <?php
        
        // Uploads files
        if (isset($_POST['approved'])) { // if save button on the form is clicked
              // name of the uploaded file
              $key = $_SESSION["login_key"];
              date_default_timezone_set("asia/manila");
              $date = date("Y-m-d H:i:s",strtotime("+0 HOURS"));
              $date1 = date("Y-m-d H:i:s",strtotime("+0 HOURS"));          
              $R_remarks = mysqli_real_escape_string($conn,$_POST['remarksB']);
              $R_code = mysqli_real_escape_string($conn,$_POST['req_codeB']);
              $R_docu = mysqli_real_escape_string($conn,$_POST['req_docuB']);
              $R_studid = mysqli_real_escape_string($conn,$_POST['req_studidB']);
              $R_actor = mysqli_real_escape_string($conn,$_POST['req_actB']);
              
              $filename = $_FILES['docfile']['name'];

              // $Admin = $_FILES['admin']['name'];
              // destination of the file on the server
              $destination = '../../../assets/request/' . $filename;

              // get the file extension
              $extension = pathinfo($filename, PATHINFO_EXTENSION);

              // the physical file on a temporary uploads directory on the server
              $file = $_FILES['docfile']['tmp_name'];
              $size = $_FILES['docfile']['size'];

              $isExist = true;
              //checking if there's a duplicate number because we use random number for id numbers to prevent errors (NOTE PARTILLY TESTED)
              date_default_timezone_set("asia/manila");
              $year = date("y",strtotime("+0 HOURS"));
              $random_num= rand(1000,9999);
              $doc_code =  "req".$year.$random_num;

            if (!in_array($extension, ['pdf'])) {
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
                          title:"File extension must be: .pdf"
                          }).then(function(){
                            window.location = "request?id='.$key.'";//refresh pages
                          });
                      </script>
                  ';
                                  
            } elseif ($_FILES['docfile']['size'] > 5000000) { // file shouldn't be larger than 5 Megabyte
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
                  title:"File too large! file size must be 5mb below"
                  }).then(function(){
                    window.location = "request?id='.$key.'";//refresh pages
                  });
                </script>
              ';
            } else{
              $query=mysqli_query($conn,"SELECT * FROM `datms_tempreq` WHERE `file_name` = '$filename'")or die(mysqli_error($conn));
              $counter=mysqli_num_rows($query);
              
              if ($counter == 1) 
                { 

                  //create audit trail record            
                    $fname=$verified_session_role; 
                    if (!empty($_SERVER["HTTP_CLIENT_IP"])){
                      $ip = $_SERVER["HTTP_CLIENT_IP"];
                    }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
                      $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                    }else{
                      $ip = $_SERVER["REMOTE_ADDR"];
                      $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                      $remarks="Request for $R_docu has been approved";  
                      //save to the audit trail table
                      mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$R_studid','$ip','$host','$date')")or die(mysqli_error($link));
              
                      //save doctype to the database
                      $conn->query("UPDATE datms_tempreq SET status='Approved', remarks='$R_remarks', actor='$R_actor',file_name='$filename', date='$date' WHERE req_code='$R_code'") or die(mysqli_error($conn));
              
                      $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                      VALUES ('$verified_session_firstname $verified_session_lastname', '0' ,'','0','Request Approved','You approved request for $R_docu','$verified_session_office','Active','$date')") or die(mysqli_error($conn));
              
                      //notif of students              
                      $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                      VALUES ('', '0' ,'$R_studid','0','Request Approved','Your $R_docu is Approved by $verified_session_firstname $verified_session_lastname','$verified_session_office','Active','$date')") or die(mysqli_error($conn)); 

                      //messasge
                      echo'<script type = "text/javascript">
                          //success message
                          const Toast = Swal.mixin({
                          toast: true,
                          position: "top-end",
                          showConfirmButton: false,
                          timer: 3000,
                          timerProsressBar: true,
                          didOpen: (toast) => {
                          toast.addEventListener("mouseenter", Swal.stopTimer)
                          toast.addEventListener("mouseleave", Swal.resumeTimer)                  
                          }
                          })
                          Toast.fire({
                          icon: "success",
                          title:"Document Request is Successfully Approved"
                          }).then(function(){
                            window.location = "request?id='.$key.'";//refresh pages
                          });
                      </script>
                      ';  
              }
 
                  
                }else{
              // move the uploaded (temporary) file to the specified destination
                if (move_uploaded_file($file, $destination)) {
                    $sql = "UPDATE datms_tempreq SET status='Approved', remarks='$R_remarks', actor='$R_actor',file_name='$filename', date='$date' WHERE req_code='$R_code'";
                  
                    if (mysqli_query($conn, $sql)) {

                      $sql1 = "INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                      VALUES ('$verified_session_firstname $verified_session_lastname', '0' ,'','0','Request Approved','You approved request for $R_docu','$verified_session_office','Active','$date')";

                      if (mysqli_query($conn, $sql1)) {
                        //notif of students              
                        $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                        VALUES ('', '0' ,'$R_studid','0','Request Approved','Your $R_docu is Approved by $verified_session_firstname $verified_session_lastname','$verified_session_office','Active','$date')") or die(mysqli_error($conn)); 
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
                          title:"Document Request is Successfully Approved"
                          }).then(function(){
                            window.location = "request?id='.$key.'";//refresh pages
                          });
                      </script>';
                      
                      }else{
                        echo "Failed Upload files!"; 
                      }                       
                    }
                } else {
                    echo "Failed Upload files!";
                }
                }         
          }
      //file uploading
        }
    ?>

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
                                title:"Document is Successfully Rejected"
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
                $('#approved_btn').click(function(d){ 
                  d.preventDefault();
                    if($('#approve_remarksA').val()!="" && $('#req_codeA').val()!="" && $('#req_actA').val()!=""&& $('#req_docuA').val()!="" && $('#req_studidA').val()!=""){
                      $.post("function/req_approve_func.php", {
                        remarksA:$('#approve_remarksA').val(), req_codeA:$('#req_codeA').val(),
                        docuA:$('#req_docuA').val(), studidA:$('#req_studidA').val(),
                        req_actA:$('#req_actA').val()
                        },function(data){
                          if (data.trim() == "failed"){
                          $('#ApproveModal').modal('hide');
                          Swal.fire("No data stored in our database","","error");//response message
                            $('#req_studidA').val("")
                            $('#req_docuA').val("")
                            $('#req_codeA').val("")
                            $('#req_actA').val("")
                            $('#approve_remarksA').val("")
                          // Empty test field
                        }else if(data.trim() == "success"){
                          $('#ApproveModal').modal('hide');
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
                                title:"Document Request is Successfully Approved"
                                }).then(function(){
                                  document.location.reload(true)//refresh pages
                                });              
                                  $('#req_studidA').val("")
                                  $('#req_docuA').val("")
                                  $('#req_codeA').val("")
                                  $('#req_actA').val("")
                                  $('#approve_remarksA').val("")
                          }else{
                            Swal.fire("There is somthing wrong1","","error");
                            Swal.fire(data);
                        }
                      })
                    }else{
                      Swal.fire("You must fill out every field2","","warning");
                    }
                })
              // End Received function

              // Softcopy modal calling
                $('#ReqTable').on('click','.softcopy_file', function () {

                  $('#ApproveModal1').modal('show');

                  $tr = $(this).closest('tr');

                  var data = $tr.children("td").map(function () {
                      return $(this).text();
                  }).get();

                  console.log(data);      
                      $('#req_reasonB').text('Reason for request: '+data[9]);  
                      $('#req_studidB').val(data[3]); 
                      $('#req_docuB').val(data[5]); 
                      $('#req_codeB').val(data[2]); 
                });
              // End of Decline modal calling 

          });

    </script>
  
</body>

</html>