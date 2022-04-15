<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | User Reports</title>
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
              <!-- Registrar Admin Reports -->
              <section class="section">
                <div class="row">        
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="col-lg-12">
                        <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                            <h4>Registrar Admin Reports</h4>
                        </div>
                        <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                          <button class="btn btn-outline-dark " onclick="AdExportToExcel('xlsx')">Excel</button>
                          <button class="btn btn-outline-dark " id="adm_print" type="button"><i class='bi bi-printer'></i></button>
                        </div> 
                      </div>
                      <div class="card-body" >           
                        <!-- Table for Role records -->
                        <table class="table table-hover datatable" id="AdminTbl">
                          <thead>
                            <tr>
                              <th scope="col">Username</th>
                              <th scope="col">Full Name</th>
                              <th scope="col" >Department</th>
                              <th scope="col">Account Status</th>    
                              <th scope="col">Last Access</th>
                                          
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              require_once("include/conn.php");
                              $query="SELECT *, LEFT(middlename,1) as MI FROM user_information WHERE `admin` NOT IN ('1') AND `role` = 'DATMS Administrator'";
                              $result=mysqli_query($conn,$query);
                              while($rs=mysqli_fetch_array($result)){
                                $uid =$rs['id']; 
                                $uname = $rs['id_number']; 
                                $fname = $rs['firstname'];      
                                $lname =$rs['lastname'];
                                $mname = $rs['MI']; 
                                $dept = $rs['office'];                       
                                $status =$rs['account_status'];

                                $sql1 = "SELECT * FROM users WHERE id_number = '$uname' ORDER BY last_access DESC ";
                                    if($result1 = mysqli_query($link, $sql1)){
                                      if(mysqli_num_rows($result1) > 0){
                                        while($row1 = mysqli_fetch_array($result1)){
                                          $LA = $row1['last_access'];                                          
                                        }
                                        // Free result set
                                        mysqli_free_result($result1);
                                      }
                                    }
                            ?>
                            <tr>
                              <td style="display:none"><?php echo $uid?></td>
                              <td data-label="Username:"><?php echo $uname; ?></td>
                              <td data-label="Full Name:" WIDTH="40%"><?php echo $fname.' '.$mname.' '.$lname; ?></td>
                              <td data-label="Dept:"><?php echo $dept; ?></td>
                              <td data-label="Status:"><?php echo $status; ?></td>
                              <td data-label="Date:"><?php echo $LA?></td>                                          
                            </tr>

                            <?php 
                            } ?>
                            
                          </tbody>
                        </table>
                        <!-- End of Table -->
                        <?php include "ajaxtables/admintbl.php"?>
                      </div>
                    </div>

                  </div>
                </div>
                
              </section>
              <!-- End reports-->
            </div>

            <div class="tab-pane fade" id="ReceivedDocs" role="tabpanel" aria-labelledby="received-tab">
              <!-- Document Approve Reports -->
              <section class="section">
                <div class="row">        
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="col-lg-12">
                        <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                            <h4>Document Approver Reports</h4>
                        </div>
                        <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                          <button class="btn btn-outline-dark " onclick="AppExportToExcel('xlsx')">Excel</button>
                          <button class="btn btn-outline-dark " id="copyapp_btn" type="button"><i class='bi bi-printer'></i></button>
                        </div> 
                      </div>
                      <div class="card-body" >           
                        <!-- Table for Role records -->
                        <table class="table table-hover datatable" id="AppTbl">
                          <thead>
                            <tr>
                              <th scope="col">Username</th>
                              <th scope="col">Full Name</th>
                              <th scope="col" >Department</th>
                              <th scope="col">Account Status</th>    
                              <th scope="col">Last Access</th>                                    
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              require_once("include/conn.php");
                              $query1="SELECT *, LEFT(middlename,1) as MI FROM user_information WHERE `admin` NOT IN ('1') AND `role` = 'DATMS Approver'";
                              $result1=mysqli_query($conn,$query1);
                              while($rs1=mysqli_fetch_array($result1)){
                                $uid1 =$rs1['id']; 
                                $uname1 = $rs1['id_number']; 
                                $fname1 = $rs1['firstname'];      
                                $lname1 =$rs1['lastname'];
                                $mname1 = $rs1['MI']; 
                                $dept1 = $rs1['office'];                       
                                $status1 =$rs1['account_status'];

                                $sql11 = "SELECT * FROM users WHERE id_number = '$uname' ORDER BY last_access DESC ";
                                    if($result11 = mysqli_query($link, $sql11)){
                                      if(mysqli_num_rows($result11) > 0){
                                        while($row11 = mysqli_fetch_array($result11)){
                                          $LA1 = $row11['last_access'];                                          
                                        }
                                        // Free result set
                                        mysqli_free_result($result11);
                                      }
                                    }
                            ?>
                            <tr>
                              <td style="display:none"><?php echo $uid1?></td>
                              <td data-label="Username:"><?php echo $uname1; ?></td>
                              <td data-label="Full Name:" WIDTH="40%"><?php echo $fname1.' '.$mname1.' '.$lname1; ?></td>
                              <td data-label="Dept:"><?php echo $dept1; ?></td>
                              <td data-label="Status:"><?php echo $status1; ?></td>
                              <td data-label="Date:"><?php echo $LA1?></td>    
                            </tr>

                            <?php } ?>
                            
                          </tbody>
                        </table>
                        <!-- End of Table -->
                        <?php include "ajaxtables/apptbl.php"?>
                      </div>
                    </div>

                  </div>
                </div>
                
              </section>
              <!-- End reports -->
            </div>
            
            <div class="tab-pane fade" id="ApprovedDocs" role="tabpanel" aria-labelledby="approved-tab">              
                <!-- Assistant Registrar Repoorts -->
              <section class="section">
                <div class="row">        
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="col-lg-12">
                        <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                            <h4>Assistant Registrar Reports</h4>
                        </div>
                        <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                          <button class="btn btn-outline-dark " onclick="AssExportToExcel('xlsx')">Excel</button>
                          <button class="btn btn-outline-dark " id="copyass_btn" type="button"><i class='bi bi-printer'></i></button>
                        </div> 
                      </div>
                      <div class="card-body" >           
                        <!-- Table for Role records -->
                        <table class="table table-hover datatable" id="AssTbl">
                          <thead>
                            <tr>
                              <th scope="col">Username</th>
                              <th scope="col">Full Name</th>
                              <th scope="col" >Department</th>
                              <th scope="col">Account Status</th>    
                              <th scope="col">Last Access</th> 
                                          
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              require_once("include/conn.php");
                              $query="SELECT *, LEFT(middlename,1) as MI FROM user_information WHERE `admin` NOT IN ('1') AND `role` = 'DATMS Assistant'";
                              $result=mysqli_query($conn,$query);
                              while($rs=mysqli_fetch_array($result)){
                                $uid =$rs['id']; 
                                $uname = $rs['id_number']; 
                                $fname = $rs['firstname'];      
                                $lname =$rs['lastname'];
                                $mname = $rs['MI']; 
                                $dept = $rs['office'];                       
                                $status =$rs['account_status'];

                                $sql1 = "SELECT * FROM users WHERE id_number = '$uname' ORDER BY last_access DESC ";
                                    if($result1 = mysqli_query($link, $sql1)){
                                      if(mysqli_num_rows($result1) > 0){
                                        while($row1 = mysqli_fetch_array($result1)){
                                          $LA = $row1['last_access'];                                          
                                        }
                                        // Free result set
                                        mysqli_free_result($result1);
                                      }
                                    }
                            ?>
                            <tr>
                              <td style="display:none"><?php echo $uid?></td>
                              <td data-label="Username:"><?php echo $uname; ?></td>
                              <td data-label="Full Name:" WIDTH="40%"><?php echo $fname.' '.$mname.' '.$lname; ?></td>
                              <td data-label="Dept:"><?php echo $dept; ?></td>
                              <td data-label="Status:"><?php echo $status; ?></td>
                              <td data-label="Date:"><?php echo $LA?></td>                                                  
                            </tr>

                            <?php 
                            } ?>
                            
                          </tbody>
                        </table>
                        <!-- End of Table -->
                        <?php include "ajaxtables/assistanttbl.php"?>
                      </div>
                    </div>

                  </div>
                </div>
                
              </section>
              <!-- End reports -->
            </div>

            <div class="tab-pane fade" id="OutgoingDocs" role="tabpanel" aria-labelledby="outgoing-tab">              
              <!-- Admission Reports -->
              <section class="section">
                <div class="row">        
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="col-lg-12">
                        <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                            <h4>Admission Reports</h4>
                        </div>
                        <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                          <button class="btn btn-outline-dark " onclick="AdmExportToExcel('xlsx')">Excel</button>
                          <button class="btn btn-outline-dark " id="copyadm_btn" type="button"><i class='bi bi-printer'></i></button>
                        </div> 
                      </div>
                      <div class="card-body" >           
                        <!-- Table for Role records -->
                        <table class="table table-hover datatable" id="AdmTbl">
                          <thead>
                            <tr>
                              <th scope="col">Username</th>
                              <th scope="col">Full Name</th>
                              <th scope="col" >Department</th>
                              <th scope="col">Account Status</th>    
                              <th scope="col">Last Access</th> 
                                          
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              require_once("include/conn.php");
                              $query="SELECT *, LEFT(middlename,1) as MI FROM user_information WHERE `admin` NOT IN ('1') AND `role` = 'Admission'";
                              $result=mysqli_query($conn,$query);
                              while($rs=mysqli_fetch_array($result)){
                                $uid =$rs['id']; 
                                $uname = $rs['id_number']; 
                                $fname = $rs['firstname'];      
                                $lname =$rs['lastname'];
                                $mname = $rs['MI']; 
                                $dept = $rs['office'];                       
                                $status =$rs['account_status'];

                                $sql1 = "SELECT * FROM users WHERE id_number = '$uname' ORDER BY last_access DESC ";
                                    if($result1 = mysqli_query($link, $sql1)){
                                      if(mysqli_num_rows($result1) > 0){
                                        while($row1 = mysqli_fetch_array($result1)){
                                          $LA = $row1['last_access'];                                          
                                        }
                                        // Free result set
                                        mysqli_free_result($result1);
                                      }
                                    }
                            ?>
                            <tr>
                              <td style="display:none"><?php echo $uid?></td>
                              <td data-label="Username:"><?php echo $uname; ?></td>
                              <td data-label="Full Name:" WIDTH="40%"><?php echo $fname.' '.$mname.' '.$lname; ?></td>
                              <td data-label="Dept:"><?php echo $dept; ?></td>
                              <td data-label="Status:"><?php echo $status; ?></td>
                              <td data-label="Date:"><?php echo $LA?></td>                                                
                            </tr>

                            <?php 
                            } ?>
                            
                          </tbody>
                        </table>
                        <!-- End of Table -->
                        <?php include "ajaxtables/admissiontbl.php"?>
                      </div>
                    </div>

                  </div>
                </div>
                
              </section>
              <!-- End reports -->
            </div>
            
            <div class="tab-pane fade" id="HoldDocs" role="tabpanel" aria-labelledby="hold-tab">             
              <!-- Registrar Officer Reports -->
              <section class="section">
                <div class="row">        
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="col-lg-12">
                        <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                            <h4>Registrar Officer Reports</h4>
                        </div>
                        <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                          <button class="btn btn-outline-dark " onclick="ROExportToExcel('xlsx')">Excel</button>
                          <button class="btn btn-outline-dark " id="copyadm_btn" type="button"><i class='bi bi-printer'></i></button>
                        </div> 
                      </div>
                      <div class="card-body" >           
                        <!-- Table for Role records -->
                        <table class="table table-hover datatable" id="ROTbl">
                          <thead>
                            <tr>
                              <th scope="col">Username</th>
                              <th scope="col">Full Name</th>
                              <th scope="col" >Department</th>
                              <th scope="col">Account Status</th>    
                              <th scope="col">Last Access</th> 
                                          
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              require_once("include/conn.php");
                              $query="SELECT *, LEFT(middlename,1) as MI FROM user_information WHERE `admin` NOT IN ('1') AND `role` = 'DATMS Officer'";
                              $result=mysqli_query($conn,$query);
                              while($rs=mysqli_fetch_array($result)){
                                $uid =$rs['id']; 
                                $uname = $rs['id_number']; 
                                $fname = $rs['firstname'];      
                                $lname =$rs['lastname'];
                                $mname = $rs['MI']; 
                                $dept = $rs['office'];                       
                                $status =$rs['account_status'];

                                $sql1 = "SELECT * FROM users WHERE id_number = '$uname' ORDER BY last_access DESC ";
                                    if($result1 = mysqli_query($link, $sql1)){
                                      if(mysqli_num_rows($result1) > 0){
                                        while($row1 = mysqli_fetch_array($result1)){
                                          $LA = $row1['last_access'];                                          
                                        }
                                        // Free result set
                                        mysqli_free_result($result1);
                                      }
                                    }
                            ?>
                            <tr>
                              <td style="display:none"><?php echo $uid?></td>
                              <td data-label="Username:"><?php echo $uname; ?></td>
                              <td data-label="Full Name:" WIDTH="40%"><?php echo $fname.' '.$mname.' '.$lname; ?></td>
                              <td data-label="Dept:"><?php echo $dept; ?></td>
                              <td data-label="Status:"><?php echo $status; ?></td>
                              <td data-label="Date:"><?php echo $LA?></td>                                            
                            </tr>

                            <?php 
                            } ?>
                            
                          </tbody>
                        </table>
                        <!-- End of Table -->
                        <?php include "ajaxtables/rotbl.php"?>
                      </div>
                    </div>

                  </div>
                </div>
                
              </section>
              <!-- End reports -->
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

  <script>
    //export functions
        //excel admin
        function AdExportToExcel(type, fn, dl) {
        var elt = document.getElementById('AdminTable');
        var wb = XLSX.utils.table_to_book(elt, { sheet: "Registrar Admin Report" });
        return dl ?
            XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
            XLSX.writeFile(wb, fn || ('Admin Report.' + (type || 'xlsx')));
        }
        //excel approver
        function AppExportToExcel(type, fn, dl) {
        var elt = document.getElementById('ApproverTable');
        var wb = XLSX.utils.table_to_book(elt, { sheet: "Approvers Report" });
        return dl ?
            XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
            XLSX.writeFile(wb, fn || ('Approver Report.' + (type || 'xlsx')));
        }
        //excel assistant
        function AssExportToExcel(type, fn, dl) {
        var elt = document.getElementById('AssisantTable');
        var wb = XLSX.utils.table_to_book(elt, { sheet: "Assistant Registrar Repors" });
        return dl ?
            XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
            XLSX.writeFile(wb, fn || ('Assistant report.' + (type || 'xlsx')));
        }
        //excel admission
        function AdmExportToExcel(type, fn, dl) {
        var elt = document.getElementById('AdmissionTable');
        var wb = XLSX.utils.table_to_book(elt, { sheet: "Admission Repors" });
        return dl ?
            XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
            XLSX.writeFile(wb, fn || ('Admission report.' + (type || 'xlsx')));
        }
        //excel admin
        function ROExportToExcel(type, fn, dl) {
        var elt = document.getElementById('ROTable');
        var wb = XLSX.utils.table_to_book(elt, { sheet: "Registrar Officer Repors" });
        return dl ?
            XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
            XLSX.writeFile(wb, fn || ('Officer report.' + (type || 'xlsx')));
        }
        //print function
        // document.getElementById("adm_print").onclick = function () {
        //     printElement(document.getElementById("AdminTableDiv"));
        //   }

        // function printElement(elem) {
        //     var domClone = elem.cloneNode(true);
            
        //     var $printSection = document.getElementById("printSection");
            
        //     if (!$printSection) {
        //         var $printSection = document.createElement("div");
        //         $printSection.id = "printSection";
        //         document.body.appendChild($printSection);
        //     }                  
        //     $printSection.innerHTML = "";
        //     $printSection.appendChild(domClone);
        //     window.print();
        // }            
        //printer admin
          // var copyBtn = document.querySelector('#copyadm_btn');
          //   copyBtn.addEventListener('click', function () {
          //     var urlField = document.querySelector('#AdminTbl');
              
          //     // create a Range object
          //     var range = document.createRange();  
          //     // set the Node to select the "range"
          //     range.selectNode(urlField);
          //     // add the Range to the set of window selections
          //     window.getSelection().addRange(range);
              
          //     // execute 'copy', can't 'cut' in this case
          //     document.execCommand('copy');
          //   }, false);
        
      // end of export
  </script>
</body>

</html>