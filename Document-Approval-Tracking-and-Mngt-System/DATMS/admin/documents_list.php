<?php include('session.php');?>
<!DOCTYPE html>
  <html lang="en">
    <title>DATMS | Document List</title>
      <head>
        <?php include ('core/css-links.php');//css connection?>
        <?php  include "core/key_checker.php"; ?>
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

          <?php include ('core/header.php');//Design for  Header?>
          <?php $page = 'docs'; include ('core/side-nav.php');//Design for sidebar?>

          <main id="main" class="main">

              <div class="pagetitle">
                <h1>Documents</h1>
                <nav>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Module</li>
                    <li class="breadcrumb-item active">Documents</li>
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
                      <div class="card-body">

                        <!-- Report Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="myTabjustified" role="tablist" style="margin-top: 10px;">
                          <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100 active" id=" incoming-tab" data-bs-toggle="tab" data-bs-target="#IncomingDocs" type="button" role="tab" aria-controls="incoming" aria-selected="true">Personal Files</button>
                          </li>
                          <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="received-tab" data-bs-toggle="tab" data-bs-target="#ReceivedDocs" type="button" role="tab" aria-controls="profile" aria-selected="false">Departmental Files</button>
                          </li>
                        </ul>
                        <div class="tab-content pt-2" id="myTabjustifiedContent">
                          <div class="tab-pane fade show active" id="IncomingDocs" role="tabpanel" aria-labelledby=" incoming-tab">
                            <!-- Personal Docs -->
                            <section class="section">
                              <div class="row">        
                                <div class="col-lg-12">
                                  <div class="card">
                                    <div class="col-lg-12">
                                      <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                                          <h4>Personal Document List</h4>
                                      </div>
                                      <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                                          <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#AddModal" >
                                          Create Tracking
                                          </button>
                                      </div> 
                                    </div>
                                    <div class="card-body" >           
                                      <!-- Table for Document List records -->
                                      <form method="POST">
                                        <table class="table table-hover datatable" id="DocuTable">
                                        <thead>
                                          <tr>
                                            <th WIDTH="9%">Duration</th>
                                            <th >DocCode</th>
                                            <th  >Requested By</th>
                                            <!-- <th >Filesize</th>    -->
                                            <th >Tracker</th>   
                                            <th >Tracking Date</th>    
                                            <th >Current Actor</th>    
                                            <th >Current Status</th>  
                                            <!-- <th >Downloads</th>    -->
                                            <th  WIDTH="8%">Action</th>          
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            require_once("include/conn.php");                                            
                                            $query="SELECT * FROM datms_documents WHERE (`doc_actor3`='$verified_session_firstname $verified_session_lastname' OR  `doc_off3` = '$verified_session_office') AND `doc_status` NOT IN ('Deleted') ORDER BY doc_date1 DESC ";
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
                                            <td data-label="Tracker:"><?php echo $docAct3; ?></td>
                                            <td data-label="Date:"><?php echo $docDate1; ?></td>
                                            <td data-label="Current Actor:"><?php echo $docAct2?></td>
                                            <td data-label="Status:"><?php echo $docStat; ?><a class="fw-bold remarksbtn">&nbsp;&nbsp;<i class="bi bi-info-circle"></i></a></td>
                                            <td style="display:none"><?php echo floor($docSize / 1000) . ' KB'; ?></td>
                                            <td style="display:none"><?php echo $docDl; ?></td>
                                            <td style="display:none"><?php echo $docName?></td>
                                            <td style="display:none"><?php echo $docType?></td>
                                            <td style="display:none"><?php echo $docDesc?></td>
                                            <td style="display:none"><?php echo $docOff1?></td>
                                            <td style="display:none"><?php echo $docAct1?></td>
                                            <td style="display:none"><?php echo $docOff1?></td>
                                            <td style="display:none"><?php echo $docDate2?></td>                    
                                            <td style="display:none"><?php echo $docOff3?></td>
                                            <td style="display:none"><?php echo $docDate1?></td>
                                            <td style="display:none"><?php echo $docRemarks?></td>

                                            <td>
                                              <div class="btn-group" role="group" aria-label="Basic mixed styles example">                            
                                                <a  class="btn btn-secondary viewbtn" title="Barcode"><i class="ri ri-barcode-line"></i></a>
                                                <a class="btn btn-primary " href='function/view_docu?ID=<?php echo $docId; ?>' target="_blank" title="View"><i class="ri ri-eye-line"></i></a>
                                                <a class="btn btn-warning " href='function/downloads?file_id=<?php echo $docId; ?>' title="Download"><i class="ri ri-download-2-fill" ></i></a>
                                                <!-- <a class="btn btn-dark historybtn"><i class="ri ri-history-line" ></i></a> -->
                                              </div>
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
                            <!-- End Table with stripped rows -->
                          </div>
                          <div class="tab-pane fade" id="ReceivedDocs" role="tabpanel" aria-labelledby="received-tab">
                            <!-- Departmental Docs -->
                            <section class="section">
                              <div class="row">        
                                <div class="col-lg-12">
                                  <div class="card">
                                    <div class="col-lg-12">
                                      <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                                          <h4>Departmental Document List</h4>
                                      </div>
                                    </div>
                                    <div class="card-body" >           
                                      <!-- Table for Document List records -->
                                      <form method="POST">
                                        <table class="table table-hover datatable" id="deptTbl">
                                        <thead>
                                          <tr>
                                            <th >DocCode</th>
                                            <th  >Requested By</th>
                                            <!-- <th >Filesize</th>    -->
                                            <th >Tracker</th>   
                                            <th >Department</th>  
                                            <th >Tracking Date</th>    
                                            <th >Current Actor</th>    
                                            <th >Current Status</th>  
                                            <!-- <th >Downloads</th>    -->
                                            <th  WIDTH="8%">Action</th>          
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            require_once("include/conn.php");
                                            $query="SELECT * FROM datms_documents ORDER BY doc_date1 DESC ";
                                            $result=mysqli_query($conn,$query);
                                            while($rs=mysqli_fetch_array($result)){
                                              $docId1 =$rs['doc_id']; $docCode = $rs['doc_code']; $docTitle = $rs['doc_title'];      
                                              $docName =$rs['doc_name']; $docSize = $rs['doc_size']; $docDl = $rs['doc_dl']; 
                                              $docType =$rs['doc_type']; $docStat = $rs['doc_status']; $docDesc = $rs['doc_desc'];   
                                              $docAct1 =$rs['doc_actor1']; $docOff1 = $rs['doc_off1']; $docDate1 = $rs['doc_date1']; 
                                              $docAct2 =$rs['doc_actor2']; $docOff2 = $rs['doc_off2']; $docDate2 = $rs['doc_date2']; 
                                              $docAct3 =$rs['doc_actor3']; $docOff3 = $rs['doc_off3']; $docDate3 = $rs['doc_date3'];  
                                              $docRemarks = $rs['doc_remarks'];  
                                          ?>
                                          <tr>
                                            <td style="display:none"><?php echo $docId1?></td>
                                            <td data-label="Code:"><?php echo $docCode; ?></td>
                                            <td data-label="Requested By:" ><?php echo $docTitle; ?></td>
                                            <td data-label="Tracker:"><?php echo $docAct3; ?></td>
                                            <td data-label="Department:"WIDTH="10%"><?php echo $docOff3; ?></td>
                                            <td data-label="Date:"WIDTH="10%"><?php echo $docDate3; ?></td>
                                            <td data-label="Current Actor:"><?php echo $docAct2?></td>
                                            <td data-label="Status:"><?php echo $docStat; ?><a class="fw-bold remarksbtn">&nbsp;&nbsp;<i class="bi bi-info-circle"></i></a></td>
                                            <td style="display:none"><?php echo floor($docSize / 1000) . ' KB'; ?></td>
                                            <td style="display:none"><?php echo $docDl; ?></td>
                                            <td style="display:none"><?php echo $docName?></td>
                                            <td style="display:none"><?php echo $docType?></td>
                                            <td style="display:none"><?php echo $docDesc?></td>
                                            <td style="display:none"><?php echo $docOff1?></td>
                                            <td style="display:none"><?php echo $docAct1?></td>
                                            <td style="display:none"><?php echo $docOff1?></td>
                                            <td style="display:none"><?php echo $docDate2?></td>                    
                                            <td style="display:none"><?php echo $docOff3?></td>
                                            <td style="display:none"><?php echo $docDate3?></td>
                                            <td style="display:none"><?php echo $docRemarks?></td>

                                            <td WIDTH="8%">
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">                            
                                              <a  class="btn btn-secondary viewbtn"><i class="ri ri-barcode-line" title="Barcode"></i></a>
                                              <a class="btn btn-primary " href='function/view_docu?ID=<?php echo $docId1; ?>' target="_blank" title="View"><i class="ri ri-eye-line"></i></a>
                                              <!-- <a class="btn btn-warning " href='function/downloads?file_id=<?php echo $docId; ?>' ><i class="ri ri-download-2-fill" ></i></a>
                                              <a class="btn btn-dark historybtn"><i class="ri ri-history-line" ></i></a> -->
                                            </div>
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
                            <!-- End Table with stripped rows -->
                          </div>
                        </div><!-- End Default Tabs -->

                      </div>
                    </div>

                  </div>
                </div>
              </section>

          </main><!-- End #main -->

          <!-- Document List Modals -->

            <!-- Create Document Modal -->
            <div class="modal fade" id="AddModal" tabindex="-1">
                <div class="modal-dialog  modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">CREATE TRACKING DOCUMENT</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                          <div class="card" style="margin: 10px;">
                            <div class="card-body">
                              <h2 class="card-title">Fill all neccessary info</h2>
                                <!-- Fill out Form -->
                                
                                <div class="row g-3" >
                                <input type="hidden" id="doccreator" name="doccreator" class="form-control"  value="<?php echo $verified_session_firstname . " " . $verified_session_lastname ?>" readonly>
                                <input type="hidden" id="docoffice" name="docoffice" class="form-control"  value="<?php echo $verified_session_office?>" readonly>        
                                                        
                                    <div class="col-md-12" >
                                      <div class="form-floating">
                                        <input type="text" class="form-control" id="docname" name="docname" onChange="fetchDoctype(this.value);" placeholder="Your Name" autofocus>
                                        <label for="floatingName">Student No.</label>
                                      </div>
                                    </div>                                  
                                  <!-- Account Information -->
                                    <div class="activity">                                         
                                    </div>
                                  <!-- End Account Information --> 

                                  <div class="col-md-12">
                                    <div class="form-floating">
                                      <select class="form-select" name="doctype" id="doctype" aria-label="State" Required onchange="oncollapse()">
                                        <option value="" selected="selected" disabled="disabled">Select DocType</option>
                                       
                                      </select>
                                      <label for="floatingSelect">DocType</label>
                                    </div>
                                  </div>  

                                  <div class="col-md-12">                                    
                                    <input class="form-control"  type="file" id="docfile" name="docfile" accept="application/pdf" >                                    
                                  </div>

                                  <div class="col-12">
                                      <textarea class="form-control" style="height: 80px" placeholder="Description" name="docdesc" id="docdesc" required></textarea>
                                  </div>        
                                </div>
                                            
                            </div>
                          </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button class="btn btn-primary" name="save">Create Tracking</button>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>     
            </div>
            <!-- End Create Document Modal-->

            <!-- View Document modal -->
            <div class="modal fade" id="ViewModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-l">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Document to Track</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" >
                      <div class="card" style="margin: 10px;">
                        <form method="post">
                          <div class="card-body" id="printcode">
                              <h5 class="card-title">Document Information</h5>
                              Filename: <h5 id="view_filename" style="margin-left: 60px;"></h5>
                              Creator: <h5 id="view_creator" style="margin-left: 60px;"></h5>
                              Date Created: <h5 id="view_date" style="margin-left: 60px;"></h5>                
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
                      <button class="btn btn-primary" name="print" id="print" >Print</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
            </div>
            <!-- End View office Modal-->

            <!-- History Document modal -->
            <div class="modal fade" id="HistoryModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tracking History &nbsp; <i class="bi bi-clock-history text-primary"></i></h5>

                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="card" style="margin: 5px;">
                          <div class="card-body">
                              <input type="text" id="search_text" name="search_text" class="form-control" placeholder="Title" onfocus="docHistory(this.value);" autofocus>
                          </div>
                            <!-- Tracking Activity module -->
                            
                              <div class="card-body">
                                <!-- History tables -->
                                  <div class="activity">
                                  </div>
                                <!-- End History tables -->
                    
                            </div>
                            <!-- End Tracking Activity module -->
                        </div>   
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
            </div>
            <!-- End History office Modal-->

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

          <!-- End of Document List Modals -->
          
          <!-- ======= Footer ======= -->
          <?php include ('core/footer.php');//css connection?>
          <!-- End Footer -->

          <a href="#" class="back-to-top d-flex align-items-center justify-content-center" style="background-color: rgb(13, 110, 253);"><i class="bi bi-arrow-up-short"></i></a>

          <!-- Vendor JS Files/ Template main js file -->
          <?php include ('core/js.php');//css connection?>

          <!-- Create Document to Track -->
          <?php
              // connect to the database
              require_once("include/conn.php");
              
              // Uploads files
              if (isset($_POST['save'])) { // if save button on the form is clicked
                    // name of the uploaded file
                    date_default_timezone_set("asia/manila");
                    $key = $_SESSION["login_key"];
                    $date = date("Y-m-d H:i:s",strtotime("+0 HOURS"));
                    // $date1 = date("Y-m-d H:i:s",strtotime("+0 HOURS"));
                    // $doc_user = $_POST['doccreator'];
                    // $doc_office = $_POST['docoffice'];
                    // $doc_title = $_POST['docname'];
                    // $doc_type = $_POST['doctype'];
                    // $doc_desc = $_POST['docdesc'];
                    $doc_user = mysqli_real_escape_string($conn,$_POST['doccreator']);
                    $doc_office = mysqli_real_escape_string($conn,$_POST['docoffice']);
                    $doc_title = mysqli_real_escape_string($conn,$_POST['docname']);
                    $doc_type = mysqli_real_escape_string($conn,$_POST['doctype']);
                    $doc_desc = mysqli_real_escape_string($conn,$_POST['docdesc']);
                    
                    $filename = $_FILES['docfile']['name'];

                    // $Admin = $_FILES['admin']['name'];
                    // destination of the file on the server
                    $destination = '../../../assets/uploads/' . $filename;

                    // get the file extension
                    $extension = pathinfo($filename, PATHINFO_EXTENSION);

                    // the physical file on a temporary uploads directory on the server
                    $file = $_FILES['docfile']['tmp_name'];
                    $size = $_FILES['docfile']['size'];

                    $isExist = true;
                    //checking if there's a duplicate number because we use random number for id numbers to prevent errors (NOTE PARTILLY TESTED)
                    date_default_timezone_set("asia/manila");
                    $year = date("Y",strtotime("+0 HOURS"));
                    $random_num= rand(1000,9999);
                    $doc_code =  "doc".$year.$random_num;

                    $query  = "SELECT *,LEFT(middlename,1) as MI FROM student_information WHERE id_number = '".$doc_title."'";
                    $result = mysqli_query($conn, $query);
                    if(mysqli_num_rows($result) > 0){
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
                                    window.location = "documents_list?id='.$key.'";//refresh pages
                                  });
                              </script>
                          ';
                                      
                        } elseif ($_FILES['docfile']['size'] > 3000000) { // file shouldn't be larger than 3 Megabyte
                                    echo "File too large!";
                        }else{
                          $query=mysqli_query($conn,"SELECT * FROM `datms_documents` WHERE `doc_name` = '$filename'")or die(mysqli_error($conn));
                          $counter=mysqli_num_rows($query);
                          
                          if ($counter == 1) 
                            { 
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
                                      icon: "warning",
                                      title:"File name already taken<br>You have to change the name of file"
                                      }).then(function(){
                                        window.location = "documents_list?id='.$key.'";//refresh pages
                                      });
                                  </script>
                            ';
                            }else{
                            // move the uploaded (temporary) file to the specified destination
                              if (move_uploaded_file($file, $destination)) {
                                $sql = "INSERT INTO datms_documents (doc_code, doc_title, doc_name, doc_size, doc_dl, doc_type, doc_status, doc_desc, doc_actor1, doc_off1, doc_date1, doc_actor2, doc_off2, doc_date2,doc_actor3,doc_off3,doc_date3,doc_remarks)
                                VALUES ('$doc_code', '$doc_title' ,'$filename','$size',0,'$doc_type', 'Created', '$doc_desc','$doc_user','$doc_office','$date','$doc_user','','','$doc_user','$doc_office','$date','')";
                                
                                  if (mysqli_query($conn, $sql)) {

                                    $sql1 = "INSERT INTO datms_tracking (doc_code, doc_title, doc_name, doc_size, doc_type, doc_status, doc_desc, doc_actor1, doc_off1, doc_date1,doc_actor2,doc_off2, doc_date2,doc_remarks)
                                    VALUES ('$doc_code', '$doc_title' ,'$filename','$size','$doc_type', 'Created','$doc_desc','$doc_user','$doc_office','$date','','','$date','Tracking Document is Created by')";

                                    if (mysqli_query($conn, $sql1)) {
                                      
                                      // $notif_sql = "INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                                      // VALUES ('$verified_session_firstname $verified_session_lastname', '0' ,'','0','Created Document','You successfully created tracking document','$verified_session_office','Active','$date')";
                                      // if(mysqli_query($conn, $notif_sql)){                                 
                                        //create audit trail record                                               
                                        $fname=$verified_session_role; 
                                        if (!empty($_SERVER["HTTP_CLIENT_IP"])){
                                          $ip = $_SERVER["HTTP_CLIENT_IP"];
                                        }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
                                          $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                                        }else{
                                          $ip = $_SERVER["REMOTE_ADDR"];
                                          $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                                          $remarks="Tracking document is successfully created";  
                                          //save to the audit trail table
                                          mysqli_query($conn,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$doc_code','$ip','$host','$date')")or die(mysqli_error($conn)); 
                                          //notif of students              
                                          $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date,affected)
                                          VALUES ('', '0' ,'$doc_title','0','Created Document','Your Tracking for $doc_type is successfully created by $verified_session_firstname $verified_session_lastname','$verified_session_office','Active','$date','$doc_code')") or die(mysqli_error($conn));       
                                          // message 
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
                                              title:"Document to track Successfully Created"
                                              }).then(function(){
                                                window.location = "documents_list?id='.$key.'";//refresh pages
                                              });
                                          </script>';
                                        }
                                      //end of audit trail                                        
                                      // }else{
                                      //   echo '<script type = "text/javascript">Swal.fire(data);</script>'; 
                                      // }                                  
                                    
                                    }else{
                                      echo '<script type = "text/javascript">Swal.fire(data);</script>'; 
                                    }                       
                                  }
                              } else {
                                  echo "Failed Upload files!";
                              }
                              }         
                        }
                      }else{
                      $query  = "SELECT *,LEFT(middlename,1) as MI FROM teacher_information WHERE `account_status` NOT IN ('Inactive') AND id_number = '".$doc_title."'";
                      $result = mysqli_query($conn, $query);
                      if(mysqli_num_rows($result) > 0){
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
                                      window.location = "documents_list?id='.$key.'";//refresh pages
                                    });
                                </script>
                            ';
                                        
                          } elseif ($_FILES['docfile']['size'] > 3000000) { // file shouldn't be larger than 3 Megabyte
                                      echo "File too large!";
                          }else{
                            $query=mysqli_query($conn,"SELECT * FROM `datms_documents` WHERE `doc_name` = '$filename'")or die(mysqli_error($conn));
                            $counter=mysqli_num_rows($query);
                            
                            if ($counter == 1) 
                              { 
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
                                        icon: "warning",
                                        title:"File name already taken<br>You have to change the name of file"
                                        }).then(function(){
                                          window.location = "documents_list?id='.$key.'";//refresh pages
                                        });
                                    </script>
                              ';
                              }else{
                              // move the uploaded (temporary) file to the specified destination
                                if (move_uploaded_file($file, $destination)) {
                                    $sql = "INSERT INTO datms_documents (doc_code, doc_title, doc_name, doc_size, doc_dl, doc_type, doc_status, doc_desc, doc_actor1, doc_off1, doc_date1, doc_actor2, doc_off2, doc_date2,doc_actor3,doc_off3,doc_date3,doc_remarks)
                                    VALUES ('$doc_code', '$doc_title' ,'$filename','$size',0,'$doc_type', 'Created', '$doc_desc','$doc_user','$doc_office','$date','$doc_user','','','$doc_user','$doc_office','$date','')";
                                  
                                    if (mysqli_query($conn, $sql)) {

                                      $sql1 = "INSERT INTO datms_tracking (doc_code, doc_title, doc_name, doc_size, doc_type, doc_status, doc_desc, doc_actor1, doc_off1, doc_date1,doc_actor2,doc_off2, doc_date2,doc_remarks)
                                      VALUES ('$doc_code', '$doc_title' ,'$filename','$size','$doc_type', 'Created','$doc_desc','$doc_user','$doc_office','$date','','','$date','Tracking Document is Created by')";

                                      if (mysqli_query($conn, $sql1)) {

                                        // $notif_sql = "INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                                        // VALUES ('$verified_session_firstname $verified_session_lastname', '0' ,'','0','Created Document','You successfully created tracking document','$verified_session_office','Active','$date')";
                                        // if(mysqli_query($conn, $notif_sql)){                                 
                                          //create audit trail record                                               
                                          $fname=$verified_session_role; 
                                          if (!empty($_SERVER["HTTP_CLIENT_IP"])){
                                            $ip = $_SERVER["HTTP_CLIENT_IP"];
                                          }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
                                            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                                          }else{
                                            $ip = $_SERVER["REMOTE_ADDR"];
                                            $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                                            $remarks="Tracking document is successfully created";  
                                            //save to the audit trail table
                                            mysqli_query($conn,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$doc_code','$ip','$host','$date')")or die(mysqli_error($conn)); 
                                            //notif of students              
                                            $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date,affected)
                                            VALUES ('', '0' ,'$doc_title','0','Created Document','Your Tracking for $doc_type is successfully created by $verified_session_firstname $verified_session_lastname','$verified_session_office','Active','$date','$doc_code')") or die(mysqli_error($conn));      
                                            // message 
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
                                                title:"Document to track Successfully Created"
                                                }).then(function(){
                                                  window.location = "documents_list?id='.$key.'";//refresh pages
                                                });
                                            </script>';
                                          }
                                        //end of audit trail                                        
                                        // }else{
                                        //   echo '<script type = "text/javascript">Swal.fire(data);</script>'; 
                                        // }      

                                      }else{
                                        echo "Failed Upload files!"; 
                                      }                       
                                    }
                                } else {
                                    echo "Failed Upload files!";
                                }
                                }         
                          }
                        }else{                          
                          $query  = "SELECT *,LEFT(middlename,1) as MI FROM user_information WHERE `account_status` NOT IN ('Inactive') AND id_number = '".$doc_title."'";
                          $result = mysqli_query($conn, $query);
                          if(mysqli_num_rows($result) > 0){
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
                                          window.location = "documents_list?id='.$key.'";//refresh pages
                                        });
                                    </script>
                                ';
                                            
                              } elseif ($_FILES['docfile']['size'] > 3000000) { // file shouldn't be larger than 3 Megabyte
                                          echo "File too large!";
                              }else{
                                $query=mysqli_query($conn,"SELECT * FROM `datms_documents` WHERE `doc_name` = '$filename'")or die(mysqli_error($conn));
                                $counter=mysqli_num_rows($query);
                                
                                if ($counter == 1) 
                                  { 
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
                                            icon: "warning",
                                            title:"File name already taken<br>You have to change the name of file"
                                            }).then(function(){
                                              window.location = "documents_list?id='.$key.'";//refresh pages
                                            });
                                        </script>
                                  ';
                                  }else{
                                  // move the uploaded (temporary) file to the specified destination
                                    if (move_uploaded_file($file, $destination)) {
                                        $sql = "INSERT INTO datms_documents (doc_code, doc_title, doc_name, doc_size, doc_dl, doc_type, doc_status, doc_desc, doc_actor1, doc_off1, doc_date1, doc_actor2, doc_off2, doc_date2,doc_actor3,doc_off3,doc_date3,doc_remarks)
                                        VALUES ('$doc_code', '$doc_title' ,'$filename','$size',0,'$doc_type', 'Created', '$doc_desc','$doc_user','$doc_office','$date','$doc_user','','','$doc_user','$doc_office','$date','')";
                                      
                                        if (mysqli_query($conn, $sql)) {
    
                                          $sql1 = "INSERT INTO datms_tracking (doc_code, doc_title, doc_name, doc_size, doc_type, doc_status, doc_desc, doc_actor1, doc_off1, doc_date1,doc_actor2,doc_off2, doc_date2,doc_remarks)
                                          VALUES ('$doc_code', '$doc_title' ,'$filename','$size','$doc_type', 'Created','$doc_desc','$doc_user','$doc_office','$date','','','$date','Tracking Document is Created by')";
    
                                          if (mysqli_query($conn, $sql1)) {
                                            
                                              // $notif_sql = "INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date)
                                              // VALUES ('$verified_session_firstname $verified_session_lastname', '0' ,'','0','Created Document','You successfully created tracking document','$verified_session_office','Active','$date')";
                                              // if(mysqli_query($conn, $notif_sql)){                                 
                                                //create audit trail record                                               
                                                $fname=$verified_session_role; 
                                                if (!empty($_SERVER["HTTP_CLIENT_IP"])){
                                                  $ip = $_SERVER["HTTP_CLIENT_IP"];
                                                }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
                                                  $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                                                }else{
                                                  $ip = $_SERVER["REMOTE_ADDR"];
                                                  $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                                                  $remarks="Tracking document is successfully created";  
                                                  //save to the audit trail table
                                                  mysqli_query($conn,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$doc_code','$ip','$host','$date')")or die(mysqli_error($conn)); 
                                                  //notif of students              
                                                  $conn->query("INSERT INTO datms_notification (act1, stat1, act2, stat2, subject, notif, dept, status, date,affected)
                                                  VALUES ('', '0' ,'$doc_title','0','Created Document','Your Tracking for $doc_type is successfully created by $verified_session_firstname $verified_session_lastname','$verified_session_office','Active','$date','$doc_code')") or die(mysqli_error($conn));          
                                                  // message 
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
                                                      title:"Document to track Successfully Created"
                                                      }).then(function(){
                                                        window.location = "documents_list?id='.$key.'";//refresh pages
                                                      });
                                                  </script>';
                                                }
                                              //end of audit trail                                        
                                              // }else{
                                              //   echo '<script type = "text/javascript">Swal.fire(data);</script>'; 
                                              // } 
                                          
                                          }else{
                                            echo "Failed Upload files!"; 
                                          }                       
                                        }
                                    } else {
                                        echo "Failed Upload files!";
                                    }
                                    }         
                              }
                            }else{
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
                                    icon: "warning",
                                    title:"No account registered to account number"
                                    }).then(function(){
                                      window.location = "documents_list?id='.$key.'";//refresh pages
                                    });
                                </script>
                            ';
                            }
                        }
                      }
                  
            //file uploading
              }
          ?>
          <!-- JS Scripts -->
          <script type="text/javascript">
              
              // used to show doctype for specific account
              function fetchDoctype(id){
                  $('#doctype').html('');
                  $.ajax({
                    type:'post',
                    url:'function/fetchDoctype.php',
                    data : 'acc_id='+id,
                    success: function(data){
                      $('#doctype').html(data);
                    }
                  })
                }
                // this script will execute as soon a the website runs
              $(document).ready(function () {                
                //print function
                document.getElementById("print").onclick = function () {
                    printElement(document.getElementById("printcode"));
                  }
                  //used for print function
                function printElement(elem) {
                    var domClone = elem.cloneNode(true);
                    
                    var $printSection = document.getElementById("printSection");
                    
                    if (!$printSection) {
                        var $printSection = document.createElement("div");
                        $printSection.id = "printSection";
                        document.body.appendChild($printSection);
                    }                  
                    $printSection.innerHTML = "";
                    $printSection.appendChild(domClone);
                    window.print();
                }            
                    // View barcode Function
                    $('#DocuTable').on('click','.viewbtn', function () {

                          $('#ViewModal').modal('show');

                          $tr = $(this).closest('tr');

                          var data = $tr.children("td").map(function () {
                              return $(this).text();
                          }).get();

                          console.log(data); 
                          document.getElementById("view_code").placeholder = data[1];      
                          document.getElementById("view_title").placeholder = data[8];   
                          document.getElementById("view_filename").placeholder = data[9];   
                          $('#view_filename').text(data[10]);
                          $('#view_creator').text(data[4]);
                          $('#view_date').text(data[5]);
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

                  // Remarks view personal
                      $('#DocuTable').on('click','.remarksbtn', function () {

                          $('#RemarksModal').modal('show');

                          $tr = $(this).closest('tr');

                          var data = $tr.children("td").map(function () {
                              return $(this).text();
                          }).get();

                          console.log(data); 
                          if(data[19] ==""){
                            $('#remarks').text(data[12]);
                          }else{
                            $('#remarks').text(data[19]);
                          }
                        
                        });
                  // End of Remarks View function 
                  // Remarks view personal
                      $('#deptTbl').on('click','.remarksbtn', function () {

                          $('#RemarksModal').modal('show');

                          $tr = $(this).closest('tr');

                          var data = $tr.children("td").map(function () {
                              return $(this).text();
                          }).get();

                          console.log(data); 
                          if(data[19] ==""){
                            $('#remarks').text(data[12]);
                          }else{
                            $('#remarks').text(data[19]);
                          }
                        
                        });
                  // End of Remarks View function                 
                  function load_data(query)
                    {
                      $.ajax({
                      url:"function/view_studinfo.php",
                      method:"POST",
                      data:{query:query},
                      success:function(data)
                      {
                        $('.activity').html(data);
                      }
                      });
                    }
                    $('#docname').keyup(function(){
                      var search = $(this).val();
                      if(search != '')
                      {
                      load_data(search);
                      }
                      else
                      {
                        $('.activity').html('');
                      }
                    });

                });
             

          </script>

        </body>
  </html>