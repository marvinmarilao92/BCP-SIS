<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Program</title>
<head>
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
<?php $page = 'prog'; include ('core/side-nav.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Program List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Settings</li>
          <li class="breadcrumb-item active">Program List</li>
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
                   Add Program
                  </button>
              </div> 
            </div>
            <div class="card-body" >               
                <!-- Table for Document List records -->
                <table class="table table-hover" id="ProgramTable">
                  <thead>
                    <tr>
                      <th style="display:none"></th>
                      <th style="display:none"></th>
                      <th scope="col">Code</th>                    
                      <th scope="col">Program</th>
                      <th >Date Created</th>
                      <th scope="col" WIDTH="10%">Action</th>      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      require_once("include/conn.php");
                      $query="SELECT * FROM datms_program ORDER BY date desc ";
                      $result=mysqli_query($conn,$query);
                      while($rs=mysqli_fetch_array($result)){
                        $progid =$rs['id'];
                        $progCode = $rs['p_code'];
                        $progName = $rs['p_name'];        
                        $date = $rs['date'];                    
                    ?>
                    <tr>
                      <td style="display:none" ><?php echo $progid; ?></td>
                      <td data-label="Code"><?php echo $progCode; ?></td>
                      <td data-label="Program"><?php echo $progName; ?></td>
                      <td data-label="Date"><?php echo $date?></td>
                      <td data-label="">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">                     
                          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ViewModal<?php echo $progid;?>"><i class="bi bi-eye"></i></button> 
                          <!-- <button class="btn btn-primary viewbtn"><i class="bi bi-eye"></i></button> -->
                          <button class="btn btn-success editbtn"><i class="bi bi-pencil-square"></i></button>
                          <button class="btn btn-danger deletebtn" ><i class="bi bi-trash" ></i></button>
                        </div>
                      </td>
                    </tr>
                    <?php 
                  include 'modals/program_modals.php';
                  } ?>
                  </tbody>
                </table>
                <!-- End of Document table record -->
            </div>
          </div>

        </div>
      </div>
      
    </section>

  </main><!-- End #main -->

  <!-- Program Modals -->
      <!-- Create Program Modal -->
      <div class="modal fade" id="AddModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">PROGRAM CREDENTIALS</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                      <div class="card" style="margin: 10px;">
                        <div class="card-body">
                          <h2 class="card-title">Fill all neccessary info</h2>
                            <!-- Fill out Form -->
                            <div class="row g-3" >
                              <div class="col-md-4">
                                  <!-- <input type="text" class="form-control" placeholder="Program Code" id="offcode" required> -->
                              </div>
                              <br>
                              <div class="col-md-12">
                                  <input type="text" class="form-control" placeholder="Code" id="progcode" required>
                              </div>
                              <br>
                              <div class="col-12">
                                  <textarea class="form-control" style="height: 80px" placeholder="Program" id="progname" required></textarea>
                              </div>        
                            </div>
                                        
                        </div>
                      </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button class="btn btn-primary" name="save" id="save" >Save Program</button>
                        </div>
                    <!-- End Form -->
                </div>
            </div>     
        </div>
      <!-- End Create Program Modal-->

      <!-- View Program modal -->
      <div class="modal fade" id="ViewModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-l">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">PROGRAM INFORMATION</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="card" style="margin: 10px;">
                      <div class="card-body">
                        <h5 class="card-title">Program Details</h5>
                          Program Code: <h6 id="view_code" style="margin-left: 60px;"></h6>
                          Program Name: <h6 id="view_name" style="margin-left: 60px;"></h6>                                
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

      <!-- Edit Program Modal -->
      <div class="modal fade" id="EditModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">EDIT PROGRAM</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                      <div class="card" style="margin: 10px;">
                        <div class="card-body">
                          <h2 class="card-title">Change information</h2>
                            <!-- Fill out Form -->
                            <div class="row g-3" >
                              <input type="hidden" class="form-control" id="prog_idE" readonly>                                
                              <br>
                              <div class="col-md-12">
                                  Code: <input type="text" class="form-control" id="prog_codeE">
                              </div>
                              <br>
                              <div class="col-12">
                                  Program: <textarea  style="height: 80px" class="form-control" id="prog_nameE"></textarea>
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
      <!-- End Edit Program Modal-->

      <!-- Delete Program Modal -->
      <div class="modal fade" id="DeleteModal" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">DELETE PROGRAM</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                        <div class="card" style="margin: 10px;">
                          <div class="card-body">                
                            <br>
                            <input type="hidden"  name="delete_id" id="delete_id" readonly>
                            <input type="hidden"  name="delete_code" id="delete_code" readonly>
                            <center>
                              <h5>Are you sure you want to delete these Program?</h5>
                              <h5 class="text-danger">This action cannot be undone.</h5>   
                            </center>                
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary" name="deletedata" id="progdel" >Delete Program</button>
                        </div>
                      <!-- End Form -->
                  </div>
              </div>
        </div>
      <!-- End delete Program Modal -->
  <!-- End of Program Modals -->

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
        var elt = document.getElementById('ProgramTable');
        var wb = XLSX.utils.table_to_book(elt, { sheet: "Program" });
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
              $('.deletebtn').on('click', function () {
  
                    $('#DeleteModal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);

                  $('#delete_id').val(data[0]);
                  $('#delete_code').val(data[1]);
                  
                  });
              // end of function
            
              // Delete Program function
              $("#progdel").click(function(b){
                b.preventDefault();
                $.post("function/delete_program.php",{
                    progid:$('#delete_id').val(),
                    progcode:$('#delete_code').val()
                  },function(response){
                    // alert ("deleted");
                    if(response.trim() == "ProgramDeleted"){
                      $('#DeleteModal').modal('hide');
                      Swal.fire ("Program Successfully Deleted","","success").then(function(){
                                document.location.reload(true)//refresh pages
                              });                      
                    }else{
                      $('#DeleteModal').modal('hide');
                      Swal.fire (response);
                    }
                  })
                })
              // End Delete Program function
                
              // Save Program function
              $('#save').click(function(a){ 
                  a.preventDefault();
                    if($('#progcode').val()!="" && $('#progname').val()!=""){
                      $.post("function/add_program.php", {
                        progcode:$('#progcode').val(),
                        progname:$('#progname').val()
                        },function(data){
                        if (data.trim() == "failed"){
                          $('#AddModal').modal('hide');
                          Swal.fire("Program is already in server","","error");//response message
                          // Empty test field
                          $('#progcode').val("")
                          $('#progname').val("")
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
                              title:'Program successfully Saved'
                              }).then(function(){
                                document.location.reload(true)//refresh pages
                              });
                                $('#progcode').val("")
                                $('#progname').val("")
                          }else{
                            Swal.fire(data);
                        }
                      })
                    }else{
                      Swal.fire("You must fill out every field","","warning");
                    }
                  })
              // End Save Program function

              // Edit Program modal calling
              $('.editbtn').on('click', function () {

                    $('#EditModal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);        
                        $('#prog_idE').val(data[0]);
                        $('#prog_codeE').val(data[1]);
                        document.getElementById("prog_nameE").placeholder = data[2]; 
                  });
              // End Edit Program modal calling

              // Edit Program function
              $('#edit').click(function(d){ 
                    d.preventDefault();
                      if($('#prog_idE').val()!="" && $('#prog_codeE').val()!="" && $('#prog_nameE').val()!=""){
                        $.post("function/update_program.php", {
                          progid:$('#prog_idE').val(),
                          progcode:$('#prog_codeE').val(),
                          progname:$('#prog_nameE').val(),
                        
                          },function(data){
                            if (data.trim() == "failed"){
                            Swal.fire("Program Code is currently in use","","error");//response message
                            // Empty test field
                            $('#prog_nameE').val("")
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
                              icon: 'success',
                              title:'Program successfully edited'
                              }).then(function(){
                                document.location.reload(true)//refresh pages
                              });
                                $('#progcode').val("")
                                $('#progname').val("")
                            }else{
                              Swal.fire("There is somthing wrong","","error");
                          }
                        })
                      }else{
                        Swal.fire("You must fill out every field","","warning");
                      }
                  })
              // End Edit Program function

              // View Program Function
              $('.viewbtn').on('click', function () {

                    $('#ViewModal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);        
                    $('#view_code').text(data[1]);
                    $('#view_name').text(data[2]);
                    $('#view_date').text(data[3]);
                  });
              // End of View function 

          });

    </script>
      

  </body>
</html>