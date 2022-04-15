<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Document Type</title>
<head>
<?php include ('core/css-links.php');//css connection?>
<style>
  <?php  include "core/key_checker.php"; ?>
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
            text-align: right;
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
<?php $page = 'doctT'; include ('core/side-nav.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Document Type</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Settings</li>
          <li class="breadcrumb-item active">Document Type</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!-- End Disclamer -->
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
    <!-- End Disclamer -->
    <div class="">
    <section class="section">
      <div class="row">        
        <div class="col-lg-12">
          <div class="card">
            <div class="col-lg-12">
              <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                  <h5>
                     <!-- extract Buttons -->
                      <div style="align-self: center;" class="btn-group" role="group" aria-label="Basic mixed styles example" style=" padding:20px;"> 
                        <button class="btn btn-outline-dark " onclick="ExportToExcel('xlsx')">Excel</button>
                        <input class="btn btn-outline-dark " id="copy_btn" type="button" value="copy">
                      </div>
                  </h5>  
              </div>
              <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                  <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#AddModal" >
                   Add DocType
                  </button>
              </div> 
            </div>
            <div class="card-body" >           
              <!-- Table for DocType records -->
              <table class="table table-hover datatable" id="DocTypeTable">
                <thead>
                  <tr>
                    <th style="display:none"></th>
                    <th style="display:none"></th>
                    <th scope="col" WIDTH="70%">Document Type</th>                    
                    <th style="display:none"></th>
                    <th scope="col">Date Created</th>
                    <th scope="col" WIDTH="10%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    require_once("include/conn.php");
                    $query="SELECT * FROM datms_doctype ORDER BY dt_date ASC";
                    $result=mysqli_query($conn,$query);
                    while($rs=mysqli_fetch_array($result)){
                      $dtid =$rs['dt_id'];
                      $dtCode = $rs['dt_code'];
                      $dtName = $rs['dt_name'];        
                      $dtDesc = $rs['dt_desc'];
                      $dtDate = $rs['dt_date'];
                  ?>
                  <tr>
                    <td style="display:none"><?php echo $dtid; ?></td>
                    <td style="display:none"><?php echo $dtCode; ?></td>
                    <td data-label="DocType"><?php echo $dtName; ?></td>
                    <td style="display:none"><?php echo $dtDesc?></td>
                    <td data-label="Date"><?php echo $dtDate?></td>
                  
                    <td>      
                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">                
                        <button class="btn btn-primary viewbtn"><i class="bi bi-eye"></i></button>
                        <button class="btn btn-success editbtn"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-danger deletebtn" ><i class="bi bi-trash" ></i></button>
                      </div>
                    </td>
                  </tr>

                  <?php } ?>
                  
                </tbody>
              </table>
              <!-- End of DocType table record -->

            </div>
          </div>

        </div>
      </div>
      
    </section>

  </main><!-- End #main -->

  <!-- DocType Modals -->
      <!-- Create DocType Modal -->
      <div class="modal fade" id="AddModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">DOCTYPE CREDENTIALS</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <div class="card" style="margin: 10px;">
                            <div class="card-body">
                              <h2 class="card-title">Fill all neccessary info</h2>
                                <!-- Fill out Form -->
                                <div class="row g-3" >
                                  <div class="col-md-4">
                                      <!-- <input type="text" class="form-control" placeholder="DocType Code" id="dtcode" required> -->
                                  </div>
                                  <br>
                                  <div class="col-md-12">
                                      <input type="text" class="form-control" placeholder="Name" id="dtname" required>
                                  </div>
                                  <br>
                                  <div class="col-12">
                                      <textarea class="form-control" style="height: 80px" placeholder="Description" id="dtdesc" required></textarea>
                                  </div>        
                                </div>
                                            
                            </div>
                          </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button class="btn btn-primary" name="save" id="save" >Save changes</button>
                            </div>
                        <!-- End Form -->
                    </div>
                </div>     
        </div>
      <!-- End Create DocType Modal-->

      <!-- View DocType modal -->
      <div class="modal fade" id="ViewModal" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered modal-l">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">DOCTYPE INFORMATION</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <div class="card" style="margin: 10px;">
                            <div class="card-body">
                              <h5 class="card-title">DocType Details</h5>
                                DocType Code: <h5 id="view_code" style="margin-left: 60px;"></h5>
                                DocType Name: <h5 id="view_name" style="margin-left: 60px;"></h5>
                                Description: <h5 id="view_loc" style="margin-left: 60px;"></h5>
                                Date Created: <h5 id="view_date" style="margin-left: 60px;"></h5>                
                            </div>
                          </div>   
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
        </div>
      <!-- End View DocType Modal-->

      <!-- Edit DocType Modal -->
      <div class="modal fade" id="EditModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">EDIT DOCTYPE</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <div class="card" style="margin: 10px;">
                            <div class="card-body">
                              <h2 class="card-title">Change information</h2>
                                <!-- Fill out Form -->
                                <div class="row g-3" >
                                  <input type="hidden" class="form-control" id="dt_idE" readonly>
                                  <div class="col-md-4">
                                       <input type="hidden" class="form-control" id="dt_codeE" readonly>
                                  </div>
                                  <br>
                                  <div class="col-md-12">
                                      Name: <input type="text" class="form-control" id="dt_nameE">
                                  </div>
                                  <br>
                                  <div class="col-12">
                                      Location: <textarea  style="height: 80px" class="form-control" id="dt_descE"></textarea>
                                  </div>        
                                </div>
                              
                            </div>
                          </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button class="btn btn-primary" name="save" id="edit" >Save changes</button>
                            </div>
                        <!-- End Form -->
                    </div>
                </div>
        </div>
      <!-- End Edit DocType Modal-->

      <!-- Delete DocType Modal -->
      <div class="modal fade" id="DeleteModal" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">DELETE DOCTYPE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                        <div class="card" style="margin: 10px;">
                          <div class="card-body">                
                            <br>
                            <input type="hidden"  name="delete_id" id="delete_id" readonly>
                            <center>
                              <h5>Are you sure you want to delete these DocType?</h5>
                              <h5 class="text-danger">This action cannot be undone.</h5>   
                            </center>                
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary" name="deletedata" id="dtdel" >Delete DocType</button>
                        </div>
                      <!-- End Form -->
                  </div>
              </div>
        </div>
      <!-- End delete DocType Modal -->
  <!-- End of DocType Modals -->

  <!-- ======= Footer ======= -->
    <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <!-- Back to top Button -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
    <?php include ('core/js.php');//css connection?>

  <!-- JS Scripts -->
    <script> 
     //export functions
        //excel
        function ExportToExcel(type, fn, dl) {
        var elt = document.getElementById('DocTypeTable');
        var wb = XLSX.utils.table_to_book(elt, { sheet: "DocTypes" });
        return dl ?
            XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
            XLSX.writeFile(wb, fn || ('DocType_Records.' + (type || 'xlsx')));
        }
        //clipboard
          var copyBtn = document.querySelector('#copy_btn');
            copyBtn.addEventListener('click', function () {
              var urlField = document.querySelector('table');
              
              // create a Range object
              var range = document.createRange();  
              // set the Node to select the "range"
              range.selectNode(urlField);
              // add the Range to the set of window selections
              window.getSelection().addRange(range);
              
              // execute 'copy', can't 'cut' in this case
              document.execCommand('copy');
            }, false);
      // end of export
        // this script will execute as soon a the website runs
        $(document).ready(function () {

              // Delete modal calling
              $('#DocTypeTable').on('click','.deletebtn', function () {

                    $('#DeleteModal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);

                  $('#delete_id').val(data[0]);
                  });
              // end of function
            
              // Delete function
              $("#dtdel").click(function(b){
                b.preventDefault();
                $.post("function/delete_doctype.php",{
                    dtid:$('#delete_id').val()
                  },function(response){
                    // alert ("deleted");
                    if(response.trim() == "DoctypeDeleted"){
                      $('#DeleteModal').modal('hide');
                      Swal.fire ("DocType Successfully Deleted","","success").then(function(){
                      document.location.reload(true)//refresh pages
                      });
                    }else{
                      $('#DeleteModal').modal('hide');
                      Swal.fire (response);
                    }
                  })
                })
              // End Delete function
                
              // Save function
                $('#save').click(function(a){ 
                  a.preventDefault();
                    if($('#dtname').val()!="" && $('#dtdesc').val()!=""){
                      $.post("function/add_doctype.php", {
                        dtname:$('#dtname').val(),
                        dtdesc:$('#dtdesc').val()
                        },function(data){
                        if (data.trim() == "failed"){
                          $('#AddModal').modal('hide');
                          //response message
                          Swal.fire("DocType is already in server","","error");
                          
                          // Empty test field
                          $('#dtcode').val("")
                          $('#dtname').val("")
                          $('#dtdesc').val("")
                        }else if(data.trim() == "success"){
                          $('#AddModal').modal('hide');
                                //success message
                                const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProsressBar: true,
                                didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)                  
                                }
                                })
                              Toast.fire({
                              icon: 'success',
                              title:'DocType successfully Saved'
                              }).then(function(){
                                document.location.reload(true)//refresh pages
                              });
                                $('#dtcode').val("")
                                $('#dtname').val("")
                                $('#dtdesc').val("")
                          }else{
                            Swal.fire(data);
                        }
                      })
                    }else{
                      Swal.fire("You must fill out every field","","warning");
                    }
                  })
              // End Save function

              // Edit modal calling
              $('#DocTypeTable').on('click','.editbtn', function () {

                    $('#EditModal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);        
                        $('#dt_idE').val(data[0]);
                        $('#dt_codeE').val(data[1]);
                        document.getElementById("dt_nameE").placeholder = data[2];
                        document.getElementById("dt_descE").placeholder = data[3];  
                  });
              // End of edit modal calling 

              // Edit function
              $('#edit').click(function(d){ 
                    d.preventDefault();
                      if($('#dt_idE').val()!="" && $('#dt_codeE').val()!="" && $('#dt_nameE').val()!="" && $('#dt_descE').val()!=""){
                        $.post("function/update_doctype.php", {
                          dtid:$('#dt_idE').val(),
                          dtcode:$('#dt_codeE').val(),
                          dtname:$('#dt_nameE').val(),
                          dtdesc:$('#dt_descE').val()
                          },function(data){
                            if (data.trim() == "failed"){
                            $('#EditModal').modal('hide');
                            Swal.fire("DocType Title is currently in use","","error");//response message
                            // Empty test field
                            $('#dt_codeE').val("")
                            $('#dt_nameE').val("")
                            $('#dt_descE').val("")
                          }else if(data.trim() == "success"){
                            $('#EditModal').modal('hide');
                                  //success message                                    
                                      const Toast = Swal.mixin({
                                      toast: true,
                                      position: 'top-end',
                                      showConfirmButton: false,
                                      timer: 1500,
                                      timerProsressBar: true,
                                      didOpen: (toast) => {
                                      toast.addEventListener('mouseenter', Swal.stopTimer)
                                      toast.addEventListener('mouseleave', Swal.resumeTimer)                  
                                      }
                                      })
                                    Toast.fire({
                                    icon: 'success',
                                    title:'Changes Save Successfully'
                                    }).then(function(){
                                      document.location.reload(true)//refresh pages
                                    }); 
                                    $('#dt_codeE').val("")
                                    $('#dt_nameE').val("")
                                    $('#dt_descE').val("")
                            }else{
                              Swal.fire("There is somthing wrong","","error");
                          }
                        })
                      }else{
                        Swal.fire("You must fill out every field","","warning");
                      }
                  })
              // End Edit function

              // View Function
              $('#DocTypeTable').on('click','.viewbtn', function () {

                    $('#ViewModal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);        
                    $('#view_code').text(data[1]);
                    $('#view_name').text(data[2]);
                    $('#view_loc').text(data[3]);
                    $('#view_date').text(data[4]);
                  });
              // End of View function 

          });

    </script>
  
</body>

</html>