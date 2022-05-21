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
          <h1>Transaction History</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="CASHIER/..">Home</a></li>
              <li class="breadcrumb-item">Transaction</li>
              <li class="breadcrumb-item active">History</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->

        <section class="section">
          <div class="row">
            <div class="col-lg-12">
            
        
                <div class="card-body">
                  
                  <p></p>

                  <!-- Table with stripped rows -->
                  
                  <!-- End Table with stripped rows -->

                </div>
              

            </div>
          </div>
        </section>
        <section class="section">
          <div class="row">        
            <div class="col-lg-12">
              <div class="card">
                <div class="col-lg-12">
                  <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                      <h4>Personal Payment</h4>
                  </div>
                </div>
                <div class="card-body">           
                  <!-- Table for Document List records -->
                  <?php
                        // Attempt select query execution
                        $sql = "SELECT * FROM `ims_dummy_cashier_transc` 
                        where s_id = '$verified_session_username'ORDER BY p_date DESC";
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                            echo'<table class="table datatable">';
                            echo"<thead>";
                              echo"<tr>";
                                echo "<th>Ref NO.</th>";
                                echo "<th>Payee</th>";
                                echo "<th>Payment For</th>";
                                echo "<th>Amount</th>";
                                echo "<th>Date | Time</th>";
                              
                                echo "<th colspan='3'><center>Action</center></th>";
                              echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while($row = mysqli_fetch_array($result)){
                              echo "<tr>";
                                  echo "<td>" . $row['py_ref_no'] . "</td>";

                                  echo "<td>" . $row['py_payee'] . "</td>";
                                  echo "<td>" . $row['p_desc'] . "</td>";
                                  echo "<td>" . $row['p_amount'] . "</td>";
                                  echo "<td>" . $row['p_date'] . "</td>";
                                  
                                  echo "<td>";
                                
                              echo '<i type = button class="ri-user-fill viewbtn" data-bs-toggle="modal" data-bs-target="#paymentModal"> </i>';
                                echo "<td>";                 
                              echo "</td>";
                              echo "</tr>";}
                              echo "</tbody>";                            
                              echo "</table>";
                            }
                            }else{
                                echo "Oops! Something went wrong. Please try again later.";
                            }
                          // Close connection
                          mysqli_close($link);
                  ?>
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
        <?php require 'includes/jss.php' ?>
        </body>
  </html>