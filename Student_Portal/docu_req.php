<?php
include('includes/session.php');
?>
<!DOCTYPE html>
  <html lang="en">
    <title>DATMS | Document List</title>
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
      <?php $page = 'docs'; include ('includes/sidebar.php');//Design for sidebar?>

      <!-- Start #main -->
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
        <div class="">
        <section class="section">
          <div class="row">        
            <div class="col-lg-12">
              <div class="card">
                <div class="col-lg-12">
                  <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                      <h4>Document List</h4>
                  </div>
                </div>
                <div class="card-body">           
                  <!-- Table for Document List records -->
                  <form method="POST">
                    <table class="table table-hover datatable" id="DocuTable">
                    <thead>
                      <tr>
                        <th WIDTH="8%">Duration</th>
                        <th scope="col">DocCode</th>
                        <th scope="col" >Requested By</th>
                        <!-- <th scope="col">Filesize</th>    -->
                        <th scope="col">Document</th>   
                        <th scope="col">Tracking Date</th>    
                        <th scope="col">Current Actor</th>    
                        <th scope="col">Current Status</th>  
                        <!-- <th scope="col">Downloads</th>    -->
                        <th scope="col" WIDTH="5%">Action</th>          
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        require_once("includes/conn.php");
                        $query="SELECT * FROM datms_documents WHERE `doc_title`='$verified_session_username' ORDER BY doc_date1 DESC ";
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
                        <td ><?php
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
                        <td data-label="Req By:" ><?php echo $docTitle; ?></td>
                        <td data-label="Document:"><?php echo $docType; ?></td>
                        <td data-label="Date:"><?php echo $docDate1; ?></td>
                        <td data-label="Actor:"><?php echo $docAct2?></td>
                        <td data-label="Status:"><?php echo $docStat; ?><a class="fw-bold remarksbtn">&nbsp;&nbsp;<i class="bi bi-info-circle"></i></a></td>
                        <td style="display:none"><?php echo floor($docSize / 1000) . ' KB'; ?></td>
                        <td style="display:none"><?php echo $docDl; ?></td>
                        <td style="display:none"><?php echo $docName?></td>
                        <td style="display:none"><?php echo $docAct3?></td>
                        <td style="display:none"><?php echo $docDesc?></td>
                        <td style="display:none"><?php echo $docOff1?></td>
                        <td style="display:none"><?php echo $docAct1?></td>
                        <td style="display:none"><?php echo $docOff1?></td>
                        <td style="display:none"><?php echo $docDate2?></td>                    
                        <td style="display:none"><?php echo $docOff3?></td>
                        <td style="display:none"><?php echo $docDate3?></td>
                        <td style="display:none"><?php echo $docRemarks?></td>

                        <td WIDTH="5%">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">                            
                          <a  class="btn btn-secondary viewbtn"><i class="ri ri-barcode-line"></i></a>                         
                          <!-- <a class="btn btn-dark " ><i class="ri ri-history-line" ></i></a> -->
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
                  // Remarks Function
            $('#DocuTable').on('click','.remarksbtn', function () {

                    $('#RemarksModal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data); 
                    if(data[19]==""){
                      $('#remarks').text(data[12]);
                    }else{
                        $('#remarks').text(data[19]);
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