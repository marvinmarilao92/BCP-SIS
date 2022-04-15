<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Department</title>
<head>
<?php  include "core/key_checker.php"; ?>
<style>
         /*responsive*/
        @media(max-width: 550px){
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
  <?php include ('core/css-links.php');//css connection?>
</head>
<body>

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'department'; include ('core/side-nav.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Department List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Settings</li>
          <li class="breadcrumb-item active">Department List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <!-- Disclamer -->
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
              <div class="form-group col-md-2 btn-lg"  style="float: left; padding:20px;">
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
                   Add Department
                  </button>
              </div> 
            </div>
            <div class="card-body" >               
                <!-- Table for Document List records -->
                <table class="table table-hover datatable" id="DepartmentTable">
                  <thead>
                    <tr>
                      <th style="display:none"></th>
                      <th style="display:none"></th>
                      <th scope="col">Department</th>                    
                      <th style="display:none"></th>
                      <th >Date Created</th>
                      <th scope="col" WIDTH="10%">Action</th>      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      require_once("include/conn.php");
                      $query="SELECT * FROM datms_dept ORDER BY off_date asc ";
                      $result=mysqli_query($conn,$query);
                      while($rs=mysqli_fetch_array($result)){
                        $offid =$rs['off_id'];
                        $offCode = $rs['off_code'];
                        $offName = $rs['off_name'];        
                        $offLoc = $rs['off_location'];
                        $offDate = $rs['off_date'];
                    ?>
                    <tr>
                      <td style="display:none" ><?php echo $offid; ?></td>
                      <td style="display:none"><?php echo $offCode; ?></td>
                      <td data-label="Department"><?php echo $offName; ?></td>
                      <td style="display:none"><?php echo $offLoc?></td>
                      <td data-label="Date"><?php echo $offDate?></td>
                      <td data-label="">
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
                <!-- End of Document table record -->
            </div>
          </div>

        </div>
      </div>
      
    </section>

  </main><!-- End #main -->

  <!-- Department Modals -->
      <!-- Create Department Modal -->
      <div class="modal fade" id="AddModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">DEPARTMENT CREDENTIALS</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <div class="card" style="margin: 10px;">
                            <div class="card-body">
                              <h2 class="card-title">Fill all neccessary info</h2>
                                <!-- Fill out Form -->
                                <div class="row g-3" >
                                  <div class="col-md-4">
                                      <!-- <input type="text" class="form-control" placeholder="Department Code" id="offcode" required> -->
                                  </div>
                                  <br>
                                  <div class="col-md-12">
                                      <input type="text" class="form-control" placeholder="Name" id="offtitle" required>
                                  </div>
                                  <br>
                                  <div class="col-12">
                                      <textarea class="form-control" style="height: 80px" placeholder="Details" id="offloc" required></textarea>
                                  </div>        
                                </div>
                                            
                            </div>
                          </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button class="btn btn-primary" name="save" id="save" >Save Department</button>
                            </div>
                        <!-- End Form -->
                    </div>
                </div>     
        </div>
      <!-- End Create Department Modal-->

      <!-- View Department modal -->
      <div class="modal fade" id="ViewModal" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered modal-l">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">DEPARTMENT INFORMATION</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <div class="card" style="margin: 10px;">
                            <div class="card-body">
                              <h5 class="card-title">Department Details</h5>
                                Department Code: <h6 id="view_code" style="margin-left: 60px;"></h6>
                                Department Name: <h6 id="view_name" style="margin-left: 60px;"></h6>
                                Details: <h6 id="view_loc" style="margin-left: 60px;"></h6>
                                Date Created: <h6 id="view_date" style="margin-left: 60px;"></h6>                
                            </div>
                          </div>   
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
        </div>
      <!-- End View department Modal-->

      <!-- Edit Department Modal -->
      <div class="modal fade" id="EditModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">EDIT DEPARTMENT</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <div class="card" style="margin: 10px;">
                            <div class="card-body">
                              <h2 class="card-title">Change information</h2>
                                <!-- Fill out Form -->
                                <div class="row g-3" >
                                  <input type="hidden" class="form-control" id="off_idE" readonly>
                                  <div class="col-md-4">
                                      <input type="hidden" class="form-control" id="off_codeE" readonly>
                                  </div>
                                  <br>
                                  <div class="col-md-12">
                                      Name: <input type="text" class="form-control" id="off_nameE">
                                  </div>
                                  <br>
                                  <div class="col-12">
                                      Details: <textarea  style="height: 80px" class="form-control" id="off_locE"></textarea>
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
      <!-- End Edit Department Modal-->

      <!-- Delete Department Modal -->
      <div class="modal fade" id="DeleteModal" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">DELETE DEPARTMENT</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                        <div class="card" style="margin: 10px;">
                          <div class="card-body">                
                            <br>
                            <input type="hidden"  name="delete_id" id="delete_id" readonly>
                            <input type="hidden"  name="delete_code" id="delete_code" readonly>
                            <center>
                              <h5>Are you sure you want to delete these Department?</h5>
                              <h5 class="text-danger">This action cannot be undone.</h5>   
                            </center>                
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary" name="deletedata" id="offdel" >Delete Department</button>
                        </div>
                      <!-- End Form -->
                  </div>
              </div>
        </div>
      <!-- End delete Department Modal -->
  <!-- End of Department Modals -->

  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>

  <!-- JS Scripts -->
    <script>
      //export functions
        //excel
        function ExportToExcel(type, fn, dl) {
        var elt = document.getElementById('DepartmentTable');
        var wb = XLSX.utils.table_to_book(elt, { sheet: "Department" });
        return dl ?
            XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
            XLSX.writeFile(wb, fn || ('Department_records.' + (type || 'xlsx')));
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

      // modal JS and ajax function
          $(document).ready(function () {

              // Opening modal for delete
              $('#DepartmentTable').on('click','.deletebtn', function () {
  
                    $('#DeleteModal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);

                  $('#delete_id').val(data[0]);
                  $('#delete_code').val(data[2]);
                  
                  });
              // end of function
            
              // Delete Department function
              $("#offdel").click(function(b){
                b.preventDefault();
                $.post("function/delete_dept.php",{
                    offid:$('#delete_id').val(),
                    offcode:$('#delete_code').val()
                  },function(response){
                    // alert ("deleted");
                    if(response.trim() == "DepartmentDeleted"){
                      $('#DeleteModal').modal('hide');
                      Swal.fire ("Department Successfully Deleted","","success").then(function(){
                                document.location.reload(true)//refresh pages
                              });                      
                    }else{
                      $('#DeleteModal').modal('hide');
                      Swal.fire (response);
                    }
                  })
                })
              // End Delete Department function
                
              // Save Department function
              $('#save').click(function(a){ 
                  a.preventDefault();
                    if($('#offtitle').val()!="" && $('#offloc').val()!=""){
                      $.post("function/add_dept.php", {
                        offname:$('#offtitle').val(),
                        offloc:$('#offloc').val()
                        },function(data){
                        if (data.trim() == "failed"){
                          $('#AddModal').modal('hide');
                          Swal.fire("Department is already in server","","error");//response message
                          // Empty test field
                          $('#offtitle').val("")
                          $('#offloc').val("")
                        }else if(data.trim() == "success"){
                          $('#AddModal').modal('hide');
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
                              title:'Department successfully Saved'
                              }).then(function(){
                                document.location.reload(true)//refresh pages
                              });
                                $('#offtitle').val("")
                                $('#offloc').val("")
                          }else{
                            Swal.fire(data);
                        }
                      })
                    }else{
                      Swal.fire("You must fill out every field","","warning");
                    }
                  })
              // End Save Department function

              // Edit Department modal calling
              $('#DepartmentTable').on('click','.editbtn',function () {

                    $('#EditModal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);        
                        $('#off_idE').val(data[0]);
                        $('#off_codeE').val(data[1]);
                        document.getElementById("off_nameE").placeholder = data[2];
                        document.getElementById("off_locE").placeholder = data[3];  
                  });
              // End of edit modal calling 
              // $.extend( $.fn.dataTable.defaults, {
              //     searching: false,
              //     ordering:  false
              // } );
              // Edit Department function
              $('#edit').click(function(d){ 
                    d.preventDefault();
                      if($('#off_idE').val()!="" && $('#off_codeE').val()!="" && $('#off_nameE').val()!="" && $('#off_locE').val()!=""){
                        $.post("function/update_dept.php", {
                          offid:$('#off_idE').val(),
                          offcode:$('#off_codeE').val(),
                          offname:$('#off_nameE').val(),
                          offloc:$('#off_locE').val()
                          },function(data){
                            if (data.trim() == "failed"){
                            Swal.fire("Department Title is currently in use","","error");//response message
                            // Empty test field
                            $('#off_nameE').val("")
                          }else if(data.trim() == "success"){
                            $('#EditModal').modal('hide');
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
                                    icon: 'Success',
                                    title:'Changes Successfully Saved'
                                }).then(function(){
                                  document.location.reload(true)//refresh pages
                                });
                                    $('#off_codeE').val("")
                                    $('#off_nameE').val("")
                                    $('#off_locE').val("")
                            }else{
                              Swal.fire("There is somthing wrong","","error");
                          }
                        })
                      }else{
                        Swal.fire("You must fill out every field","","warning");
                      }
                  })
              // End Edit Department function

              // View Department Function
              $('#DepartmentTable').on('click','.viewbtn',function () {

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