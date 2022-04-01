<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | User Reports</title>
<head>
<?php include ('core/css-links.php');//css connection?>
</head>
<body>

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'UR' ; $col = 'reports'; include ('core/side-nav.php');//Design for sidebar?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>User Reports</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Module</li>
      <li class="breadcrumb-item">Reports</li>
      <li class="breadcrumb-item active">User Reports</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">

          <!-- Report Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="myTabjustified" role="tablist" style="margin-top: 10px;">
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100 active" id=" incoming-tab" data-bs-toggle="tab" data-bs-target="#IncomingDocs" type="button" role="tab" aria-controls="incoming" aria-selected="true">Registrar Admin</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="received-tab" data-bs-toggle="tab" data-bs-target="#ReceivedDocs" type="button" role="tab" aria-controls="profile" aria-selected="false">Document Approver</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="approved-tab" data-bs-toggle="tab" data-bs-target="#ApprovedDocs" type="button" role="tab" aria-controls="approved" aria-selected="false">Assistant Registrar</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="outgoing-tab" data-bs-toggle="tab" data-bs-target="#OutgoingDocs" type="button" role="tab" aria-controls="outgoing" aria-selected="false">Admission Accounts</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="hold-tab" data-bs-toggle="tab" data-bs-target="#HoldDocs" type="button" role="tab" aria-controls="hold" aria-selected="false">Registrar Officer</button>
            </li>
          </ul>
          <div class="tab-content pt-2" id="myTabjustifiedContent">
            <div class="tab-pane fade show active" id="IncomingDocs" role="tabpanel" aria-labelledby=" incoming-tab">

              <!-- IncomingDocs Docs -->
              <section class="section">
                    <div class="row">        
                      <div class="col-lg-12">
                        <div class="card">
                          <div class="col-lg-12">
                            <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                                <h4>Registrar Admin Reports</h4>
                            </div>
                          </div>
                          <div class="card-body" >           
                            <!-- Table for Role records -->
                            <table class="table table-hover datatable" >
                              <thead>
                                <tr>
                                  <th scope="col">Full Name</th>
                                  <th scope="col" >Department</th>
                                  <!-- <th scope="col">Filesize</th>    -->
                                  <th scope="col">Role</th>   
                                  <th scope="col">Office</th>       
                                  <th scope="col">Contact</th>  
                                  <!-- <th scope="col">Downloads</th>    -->
                                  <th scope="col">Account Status</th>          
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
                                  <td data-label="Code:"><?php echo $docCode; ?></td>
                                  <td data-label="File Name:" ><?php echo $docName; ?></td>
                                  <td data-label="Tracker:"><?php echo $docAct3; ?></td>
                                  <td data-label="Date:"><?php echo $docDate3; ?></td>
                                  <td data-label="Current Actor:"><?php echo $docAct2?></td>
                                  <td data-label="Status:"><a class="fw-bold text-dark remarksbtn"><?php echo $docStat; ?></a></td>
                                  <td style="display:none"><?php echo floor($docSize / 1000) . ' KB'; ?></td>
                                  <td style="display:none"><?php echo $docDl; ?></td>
                                  <td style="display:none"><?php echo $docTitle?></td>
                                  <td style="display:none"><?php echo $docType?></td>
                                  <td style="display:none"><?php echo $docDesc?></td>
                                  <td style="display:none"><?php echo $docOff1?></td>
                                  <td style="display:none"><?php echo $docAct1?></td>
                                  <td style="display:none"><?php echo $docOff1?></td>
                                  <td style="display:none"><?php echo $docDate2?></td>                    
                                  <td style="display:none"><?php echo $docOff3?></td>
                                  <td style="display:none"><?php echo $docDate3?></td>
                                  <td style="display:none"><?php echo $docRemarks?></td>

                                </tr>

                                <?php } ?>
                                
                              </tbody>
                            </table>
                            <!-- End of Table -->

                          </div>
                        </div>

                      </div>
                    </div>
                    
                  </section>
              <!-- End Table with stripped rows -->

            </div>
            <div class="tab-pane fade" id="ReceivedDocs" role="tabpanel" aria-labelledby="received-tab">
              <!-- ReceivedDocs Docs -->
              <!-- IncomingDocs Docs -->
              <section class="section">
                    <div class="row">        
                      <div class="col-lg-12">
                        <div class="card">
                          <div class="col-lg-12">
                            <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                                <h4>Document Approver Reports</h4>
                            </div>
                          </div>
                          <div class="card-body" >           
                            <!-- Table for Role records -->
                            <table class="table table-hover datatable" >
                              <thead>
                                <tr>
                                  <th scope="col">Full Name</th>
                                  <th scope="col" >Department</th>
                                  <!-- <th scope="col">Filesize</th>    -->
                                  <th scope="col">Role</th>   
                                  <th scope="col">Office</th>       
                                  <th scope="col">Contact</th>  
                                  <!-- <th scope="col">Downloads</th>    -->
                                  <th scope="col">Account Status</th>          
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
                                  <td data-label="Code:"><?php echo $docCode; ?></td>
                                  <td data-label="File Name:" ><?php echo $docName; ?></td>
                                  <td data-label="Tracker:"><?php echo $docAct3; ?></td>
                                  <td data-label="Date:"><?php echo $docDate3; ?></td>
                                  <td data-label="Current Actor:"><?php echo $docAct2?></td>
                                  <td data-label="Status:"><a class="fw-bold text-dark remarksbtn"><?php echo $docStat; ?></a></td>
                                  <td style="display:none"><?php echo floor($docSize / 1000) . ' KB'; ?></td>
                                  <td style="display:none"><?php echo $docDl; ?></td>
                                  <td style="display:none"><?php echo $docTitle?></td>
                                  <td style="display:none"><?php echo $docType?></td>
                                  <td style="display:none"><?php echo $docDesc?></td>
                                  <td style="display:none"><?php echo $docOff1?></td>
                                  <td style="display:none"><?php echo $docAct1?></td>
                                  <td style="display:none"><?php echo $docOff1?></td>
                                  <td style="display:none"><?php echo $docDate2?></td>                    
                                  <td style="display:none"><?php echo $docOff3?></td>
                                  <td style="display:none"><?php echo $docDate3?></td>
                                  <td style="display:none"><?php echo $docRemarks?></td>

                                </tr>

                                <?php } ?>
                                
                              </tbody>
                            </table>
                            <!-- End of Table -->

                          </div>
                        </div>

                      </div>
                    </div>
                    
                  </section>
              <!-- End Table with stripped rows -->
            </div>
            <div class="tab-pane fade" id="ApprovedDocs" role="tabpanel" aria-labelledby="approved-tab">
              <!-- ApprovedDocs Docs -->
                <!-- IncomingDocs Docs -->
              <section class="section">
                    <div class="row">        
                      <div class="col-lg-12">
                        <div class="card">
                          <div class="col-lg-12">
                            <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                                <h4>Assistant Registrar Reports</h4>
                            </div>
                          </div>
                          <div class="card-body" >           
                            <!-- Table for Role records -->
                            <table class="table table-hover datatable" >
                              <thead>
                                <tr>
                                  <th scope="col">Full Name</th>
                                  <th scope="col" >Department</th>
                                  <!-- <th scope="col">Filesize</th>    -->
                                  <th scope="col">Role</th>   
                                  <th scope="col">Office</th>       
                                  <th scope="col">Contact</th>  
                                  <!-- <th scope="col">Downloads</th>    -->
                                  <th scope="col">Account Status</th>          
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
                                  <td data-label="Code:"><?php echo $docCode; ?></td>
                                  <td data-label="File Name:" ><?php echo $docName; ?></td>
                                  <td data-label="Tracker:"><?php echo $docAct3; ?></td>
                                  <td data-label="Date:"><?php echo $docDate3; ?></td>
                                  <td data-label="Current Actor:"><?php echo $docAct2?></td>
                                  <td data-label="Status:"><a class="fw-bold text-dark remarksbtn"><?php echo $docStat; ?></a></td>
                                  <td style="display:none"><?php echo floor($docSize / 1000) . ' KB'; ?></td>
                                  <td style="display:none"><?php echo $docDl; ?></td>
                                  <td style="display:none"><?php echo $docTitle?></td>
                                  <td style="display:none"><?php echo $docType?></td>
                                  <td style="display:none"><?php echo $docDesc?></td>
                                  <td style="display:none"><?php echo $docOff1?></td>
                                  <td style="display:none"><?php echo $docAct1?></td>
                                  <td style="display:none"><?php echo $docOff1?></td>
                                  <td style="display:none"><?php echo $docDate2?></td>                    
                                  <td style="display:none"><?php echo $docOff3?></td>
                                  <td style="display:none"><?php echo $docDate3?></td>
                                  <td style="display:none"><?php echo $docRemarks?></td>

                                </tr>

                                <?php } ?>
                                
                              </tbody>
                            </table>
                            <!-- End of Table -->

                          </div>
                        </div>

                      </div>
                    </div>
                    
                  </section>
              <!-- End Table with stripped rows -->

            </div>
            <div class="tab-pane fade" id="OutgoingDocs" role="tabpanel" aria-labelledby="outgoing-tab">
               <!-- OutgoingDocs Docs -->
             <!-- IncomingDocs Docs -->
             <section class="section">
                    <div class="row">        
                      <div class="col-lg-12">
                        <div class="card">
                          <div class="col-lg-12">
                            <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                                <h4>Admission Reports</h4>
                            </div>
                          </div>
                          <div class="card-body" >           
                            <!-- Table for Role records -->
                            <table class="table table-hover datatable" >
                              <thead>
                                <tr>
                                  <th scope="col">Full Name</th>
                                  <th scope="col" >Department</th>
                                  <!-- <th scope="col">Filesize</th>    -->
                                  <th scope="col">Role</th>   
                                  <th scope="col">Office</th>       
                                  <th scope="col">Contact</th>  
                                  <!-- <th scope="col">Downloads</th>    -->
                                  <th scope="col">Account Status</th>          
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
                                  <td data-label="Code:"><?php echo $docCode; ?></td>
                                  <td data-label="File Name:" ><?php echo $docName; ?></td>
                                  <td data-label="Tracker:"><?php echo $docAct3; ?></td>
                                  <td data-label="Date:"><?php echo $docDate3; ?></td>
                                  <td data-label="Current Actor:"><?php echo $docAct2?></td>
                                  <td data-label="Status:"><a class="fw-bold text-dark remarksbtn"><?php echo $docStat; ?></a></td>
                                  <td style="display:none"><?php echo floor($docSize / 1000) . ' KB'; ?></td>
                                  <td style="display:none"><?php echo $docDl; ?></td>
                                  <td style="display:none"><?php echo $docTitle?></td>
                                  <td style="display:none"><?php echo $docType?></td>
                                  <td style="display:none"><?php echo $docDesc?></td>
                                  <td style="display:none"><?php echo $docOff1?></td>
                                  <td style="display:none"><?php echo $docAct1?></td>
                                  <td style="display:none"><?php echo $docOff1?></td>
                                  <td style="display:none"><?php echo $docDate2?></td>                    
                                  <td style="display:none"><?php echo $docOff3?></td>
                                  <td style="display:none"><?php echo $docDate3?></td>
                                  <td style="display:none"><?php echo $docRemarks?></td>

                                </tr>

                                <?php } ?>
                                
                              </tbody>
                            </table>
                            <!-- End of Table -->

                          </div>
                        </div>

                      </div>
                    </div>
                    
                  </section>
              <!-- End Table with stripped rows -->

            </div>
            <div class="tab-pane fade" id="HoldDocs" role="tabpanel" aria-labelledby="hold-tab">
              <!-- HoldDocs Docs -->
              <!-- IncomingDocs Docs -->
              <section class="section">
                    <div class="row">        
                      <div class="col-lg-12">
                        <div class="card">
                          <div class="col-lg-12">
                            <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                                <h4>Registrar Officer Reports</h4>
                            </div>
                          </div>
                          <div class="card-body" >           
                            <!-- Table for Role records -->
                            <table class="table table-hover datatable" >
                              <thead>
                                <tr>
                                  <th scope="col">Full Name</th>
                                  <th scope="col" >Department</th>
                                  <!-- <th scope="col">Filesize</th>    -->
                                  <th scope="col">Role</th>   
                                  <th scope="col">Office</th>       
                                  <th scope="col">Contact</th>  
                                  <!-- <th scope="col">Downloads</th>    -->
                                  <th scope="col">Account Status</th>          
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
                                  <td data-label="Code:"><?php echo $docCode; ?></td>
                                  <td data-label="File Name:" ><?php echo $docName; ?></td>
                                  <td data-label="Tracker:"><?php echo $docAct3; ?></td>
                                  <td data-label="Date:"><?php echo $docDate3; ?></td>
                                  <td data-label="Current Actor:"><?php echo $docAct2?></td>
                                  <td data-label="Status:"><a class="fw-bold text-dark remarksbtn"><?php echo $docStat; ?></a></td>
                                  <td style="display:none"><?php echo floor($docSize / 1000) . ' KB'; ?></td>
                                  <td style="display:none"><?php echo $docDl; ?></td>
                                  <td style="display:none"><?php echo $docTitle?></td>
                                  <td style="display:none"><?php echo $docType?></td>
                                  <td style="display:none"><?php echo $docDesc?></td>
                                  <td style="display:none"><?php echo $docOff1?></td>
                                  <td style="display:none"><?php echo $docAct1?></td>
                                  <td style="display:none"><?php echo $docOff1?></td>
                                  <td style="display:none"><?php echo $docDate2?></td>                    
                                  <td style="display:none"><?php echo $docOff3?></td>
                                  <td style="display:none"><?php echo $docDate3?></td>
                                  <td style="display:none"><?php echo $docRemarks?></td>

                                </tr>

                                <?php } ?>
                                
                              </tbody>
                            </table>
                            <!-- End of Table -->

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


 
  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>

</body>

</html>