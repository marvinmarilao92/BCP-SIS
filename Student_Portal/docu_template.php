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
                  <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                      <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#AddModal" >
                      Request Document
                      </button>
                  </div> 
                </div>
                <div class="card-body" >           
                  <!-- Table for Document List records -->
                  <form method="POST">
                    <table class="table table-hover datatable" id="DocuTable">
                    <thead>
                      <tr>
                        <th scope="col" WIDTH="12%">Student No.</th>
                        <th scope="col" >Porgram</th>  
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
                          $date =$rs['date']; $fname = $rs['file_name'];
                      ?>
                      <tr>
                        <td style="display:none"><?php echo $docId?></td> 
                        <td data-label="No:"><?php echo $stud_no; ?></td>
                        <td data-label="Prog:" ><?php echo $prog; ?></td>                    
                        <td data-label="Docu:"><?php echo $doctype?></td>                        
                        <td data-label="Date:"><?php echo $date; ?></td>
                        <td data-label="Status:">
                        <?php 
                        if($adm_as=='Approved'){
                          echo '<span class="badge bg-success">'.$stat.'</span>';
                        }else{
                          echo '<span class="badge bg-danger">'.$stat.'</span>';
                        }                  
                        ?>  
                        <a class="fw-bold remarksbtn">&nbsp;&nbsp;<i class="bi bi-info-circle"></i></a></td>   
                        <td style="display:none"><?php echo $fname; ?></td>               
                        <td style="display:none"><?php echo $remarks; ?></td>             
                        <td WIDTH="8%">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">                            
                          <a  class="btn btn-secondary viewbtn"><i class="ri ri-barcode-line"></i></a>                      
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

      </main>
      <!-- End #main -->

        
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
                                        <input type="text" class="form-control" id="docname" name="docname" onChange="fetchTracking(this.value);" placeholder="Your Name" autofocus>
                                        <label for="floatingName">Account No.</label>
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
                                        <?php
                                            require_once("includes/conn.php");
                                            $query="SELECT * FROM datms_doctype ORDER BY dt_date DESC ";
                                            $result=mysqli_query($conn,$query);
                                            while($rs=mysqli_fetch_array($result)){
                                              $dtid =$rs['dt_id'];                                    
                                              $dtName = $rs['dt_name'];       
                                          ?>
                                            <option><?php echo $dtName;?></option>
                                        <?php }?>
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
                              <button class="btn btn-primary" name="save">Create Document</button>
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
                      <!-- <button class="btn btn-primary" name="print" id="print" >Print</button> -->
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
            </div>
            <!-- End View office Modal-->

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
          
         <!-- Vendor JS Files/ Template main js file -->
           <?php include ('includes/footer.php');//css connection?>
          <!-- End Footer -->

          <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
          <!-- JS Scripts -->
          <script type="text/javascript">
            
              // this script will execute as soon a the website runs
              $(document).ready(function () {    
                   // View Function
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
                          $('#view_filename').text(data[9]);
                          $('#view_creator').text(data[3]);
                          $('#view_date').text(data[4]);
                          // JsBarcode("#barcode", data[1]);
                          JsBarcode("#barcode", data[1], {
                            format: "CODE128",
                            lineColor: "#000",
                            width: 3,
                            height: 150,
                            textAlign: "center",
                            displayValue: true
                          });
                        });
                  // Remarks Function
            $('#DocuTable').on('click','.remarksbtn', function () {

                    $('#RemarksModal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data); 
                    if(data[18]==""){
                      $('#remarks').text(data[11]);
                    }else{
                        $('#remarks').text(data[18]);
                    }
                    
                  });
            // End of View function 

                  // Providing Overall tracking history
                    // load_data();
                    // function load_data(query)
                    // {
                    //   $.ajax({
                    //   url:"function/history.php",
                    //   method:"POST",
                    //   data:{query:query},
                    //   success:function(data)
                    //   {
                    //     $('.activity').html(data);
                    //   }
                    //   });
                    // }
                    // $('#search_text').keyup(function(){
                    //   var search = $(this).val();
                    //   if(search != '')
                    //   {
                    //   load_data(search);
                    //   }
                    //   else
                    //   {
                    //     $('.activity').html('');
                    //   }
                    // });
                  //end of tracking history

                //
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