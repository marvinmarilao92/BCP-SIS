<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include ('core/css-links.php');//css connection?>
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
    <div class="">
    <section class="section">
      <div class="row">        
        <div class="col-lg-12">
          <div class="card">
            <div class="col-lg-12">
              <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                  <h4>Document List</h4>
              </div>
              <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                  <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#AddModal" >
                   Create Document
                  </button>
              </div> 
            </div>
            <div class="card-body" >           
              <!-- Table for Office records -->
              <form method="POST">
                 <table class="table table-hover datatable" >
                <thead>
                  <tr>
                    <th scope="col">DocCode</th>
                    <th scope="col" >Filename</th>
                    <!-- <th scope="col">Filesize</th>    -->
                    <th scope="col">Actor</th>   
                    <th scope="col">Date/Time</th>       
                    <th scope="col">Status</th>  
                    <!-- <th scope="col">Downloads</th>    -->
                    <th scope="col">Action</th>          
                  </tr>
                </thead>
                <tbody>
                  <?php
                    require_once("include/conn.php");
                    $query="SELECT * FROM datms_documents WHERE (`doc_actor1`='$verified_session_firstname $verified_session_lastname' OR  `doc_off1` = '$verified_session_office') AND `doc_status` NOT IN ('Deleted') ORDER BY doc_date1 DESC ";
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
                    <td><?php echo $docCode; ?></td>
                    <td><?php echo $docName; ?></td>
                    <td><?php echo $docAct2; ?></td>
                    <td><?php echo $docDate2; ?></td>
                    <td><a class="fw-bold text-dark remarksbtn"><?php echo $docStat; ?></a></td>
                    <td style="display:none"><?php echo floor($docSize / 1000) . ' KB'; ?></td>
                    <td style="display:none"><?php echo $docDl; ?></td>
                    <td style="display:none"><?php echo $docTitle?></td>
                    <td style="display:none"><?php echo $docType?></td>
                    <td style="display:none"><?php echo $docDesc?></td>
                    <td style="display:none"><?php echo $docOff1?></td>
                    <td style="display:none"><?php echo $docAct1?></td>
                    <td style="display:none"><?php echo $docOff1?></td>
                    <td style="display:none"><?php echo $docDate2?></td>
                    <td style="display:none"><?php echo $docAct3?></td>
                    <td style="display:none"><?php echo $docOff3?></td>
                    <td style="display:none"><?php echo $docDate3?></td>
                    <td style="display:none"><?php echo $docRemarks?></td>

                    <td>                      
                      <a  class="btn btn-secondary viewbtn"><i class="ri ri-barcode-line"></i></a>
                      <a class="btn btn-primary " href='function/view_docu.php?ID=<?php echo $docId; ?>' target="_blank"><i class="bi bi-eye"></i></a>
                      <a class="btn btn-warning " href='function/downloads.php?file_id=<?php echo $docId; ?>' ><i class="bi bi-download" ></i></a>
                      <a class="btn btn-dark " ><i class="bi bi-clock-history" ></i></a>
                    </td>
                  </tr>

                  <?php } ?>
                  
                </tbody>
              </table>
              <!-- End of office table record -->
              </form>
            </div>
          </div>

        </div>
      </div>
      
    </section>

  </main><!-- End #main -->

  <!-- Office Modals -->
      <!-- Create Document Modal -->
      <div class="modal fade" id="AddModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
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
                                    <input class="form-control"  type="file" id="docfile" name="docfile" accept="application/pdf" >
                                    <label for="docfile" style="float: right; margin-right:10px">(Optional)</label>
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
                      <div class="modal-body">
                        <div class="card" style="margin: 10px;">
                          <form method="post">
                            <div class="card-body">
                                <h5 class="card-title">Document Information</h5>
                                Filename: <h5 id="view_filename" style="margin-left: 60px;"></h5>
                                Creator: <h5 id="view_creator" style="margin-left: 60px;"></h5>
                                Date Created: <h5 id="view_date" style="margin-left: 60px;"></h5>                
                                <input type="hidden" id="view_code" name="view_code" class="form-control" placeholder="Title" readonly>
                                <input type="hidden" id="view_title" name="view_title" class="form-control" placeholder="Title" readonly>
                                <input type="hidden" id="view_filename" name="view_filename" class="form-control" placeholder="Title" readonly>
                                
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

      <!-- Edit Office Modal -->
      <div class="modal fade" id="EditModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">EDIT OFFICE</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <div class="card" style="margin: 10px;">
                            <div class="card-body">
                              <h2 class="card-title">Change information</h2>
                                <!-- Fill out Form -->
                                <div class="row g-3" >
                                  <input type="hidden" class="form-control" id="dt_idE" readonly>
                                  <div class="col-md-4">
                                      Code: <input type="text" class="form-control" id="dt_codeE" readonly>
                                  </div>
                                  <br>
                                  <div class="col-md-8">
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
      <!-- End Edit Office Modal-->

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
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
            $time = date("M-d-Y h:i A",strtotime("+0 HOURS"));
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
            $destination = '../uploads/' . $filename;

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
                          window.location = "index.php";//refresh pages
                        });
                     </script>
                ';
                                
          } elseif ($_FILES['docfile']['size'] > 3000000) { // file shouldn't be larger than 3 Megabyte
                      echo "File too large!";
          } else{
            $query=mysqli_query($conn,"SELECT * FROM `datms_documents` WHERE `doc_title` = '$filename'")or die(mysqli_error($conn));
            $counter=mysqli_num_rows($query);
            
            if ($counter == 1) 
              { 
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
                        title:"Files already taken"
                        }).then(function(){
                          window.location = "index.php";//refresh pages
                        });
                    </script>
               ';
              }else{
            // move the uploaded (temporary) file to the specified destination
              if (move_uploaded_file($file, $destination)) {
                  $sql = "INSERT INTO datms_documents (doc_code, doc_title, doc_name, doc_size, doc_dl, doc_type, doc_status, doc_desc, doc_actor1, doc_off1, doc_date1, doc_actor2, doc_off2, doc_date2,doc_actor3,doc_off3,doc_date3,doc_remarks)
                  VALUES ('$doc_code', '$doc_title' ,'$filename','$size',0,'$doc_type', 'Created', '$doc_desc','$doc_user','$doc_office','$time','$doc_user','$doc_office','$time','','','','')";
                  if (mysqli_query($conn, $sql)) {
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
                          window.location = "index.php";//refresh pages
                        });
                    </script>
               ';
                       
                  }
              } else {
                  echo "Failed Upload files!";
              }
              }         
        }
      }
  ?>
  <!-- JS Scripts -->
    <script>
        // this script will execute as soon a the website runs
        $(document).ready(function () {

            // // Delete modal calling
              // $('.deletebtn').on('click', function () {

              //       $('#DeleteModal').modal('show');

              //       $tr = $(this).closest('tr');

              //       var data = $tr.children("td").map(function () {
              //           return $(this).text();
              //       }).get();

              //       console.log(data);

              //     $('#delete_id').val(data[0]);
              //     });
              // // end of function
            
              // // Delete function
              // $("#dtdel").click(function(b){
              //   b.preventDefault();
              //   $.post("delete_doctype.php",{
              //       dtid:$('#delete_id').val()
              //     },function(response){
              //       // alert ("deleted");
              //       if(response.trim() == "DoctypeDeleted"){
              //         $('#DeleteModal').modal('hide');
              //         Swal.fire ("DocType Successfully Deleted","","success").then(function(){
              //         document.location.reload(true)//refresh pages
              //         });
              //       }else{
              //         $('#DeleteModal').modal('hide');
              //         Swal.fire (response);
              //       }
              //     })
              //   })
              // // End Delete function
                
              // Save function
              //   $('#save').click(function(a){ 
              //     a.preventDefault();
              //       if($('#doccreator').val()!="" && $('#docoffice').val()!="" && $('#doctitle').val()!=""
              //       &&$('#doctype').val()!="" && $('#docfile').val()!="" && $('#docdesc').val()!=""){
              //         $.post("fileprocess.php", {
              //           doccreator:$('#doccreator').val(),
              //           docoffice:$('#docoffice').val(),
              //           doctitle:$('#doctitle').val(),
              //           doctype:$('#doctype').val(),
              //           docfile:$('#docfile').val(),
              //           docdesc:$('#docdesc').val()
              //           },function(data){
              //           if (data.trim() == "failed"){

              //             //response message
              //             Swal.fire("Document is already in server","","error");
              //             // Empty test field
              //              $('#docfile').val("")
                         
              //           }else if(data.trim() == "success"){
              //             $('#AddModal').modal('hide');
              //                   //success message
              //                   const Toast = Swal.mixin({
              //                   toast: true,
              //                   position: 'top-end',
              //                   showConfirmButton: false,
              //                   timer: 1100,
              //                   timerProsressBar: true,
              //                   didOpen: (toast) => {
              //                   toast.addEventListener('mouseenter', Swal.stopTimer)
              //                   toast.addEventListener('mouseleave', Swal.resumeTimer)                  
              //                   }
              //                   })
              //                 Toast.fire({
              //                 icon: 'success',
              //                 title:'Office successfully Saved'
              //                 }).then(function(){
              //                   document.location.reload(true)//refresh pages
              //                 });
              //                   // $('#dtcode').val("")
              //                   // $('#dtname').val("")
              //                   // $('#dtdesc').val("")
              //             }else{
              //               Swal.fire("there is something wrong");
                            
              //           }
              //         })
              //       }else{
              //         Swal.fire("You must fill out every field","","warning");
              //       }
              //     })
              // End Save function

              // // Edit modal calling
              //   $('.editbtn').on('click', function () {

              //       $('#EditModal').modal('show');

              //       $tr = $(this).closest('tr');

              //       var data = $tr.children("td").map(function () {
              //           return $(this).text();
              //       }).get();

              //       console.log(data);        
              //           $('#dt_idE').val(data[0]);
              //           $('#dt_codeE').val(data[1]);
              //           document.getElementById("dt_nameE").placeholder = data[2];
              //           document.getElementById("dt_descE").placeholder = data[3];  
              //     });
              // // End of edit modal calling 

              // // Edit function
              // $('#edit').click(function(d){ 
              //       d.preventDefault();
              //         if($('#dt_idE').val()!="" && $('#dt_codeE').val()!="" && $('#dt_nameE').val()!="" && $('#dt_descE').val()!=""){
              //           $.post("update_doctype.php", {
              //             dtid:$('#dt_idE').val(),
              //             dtcode:$('#dt_codeE').val(),
              //             dtname:$('#dt_nameE').val(),
              //             dtdesc:$('#dt_descE').val()
              //             },function(data){
              //               if (data.trim() == "failed"){
              //               $('#EditModal').modal('hide');
              //               Swal.fire("Office Title is currently in use","","error");//response message
              //               // Empty test field
              //               $('#dt_codeE').val("")
              //               $('#dt_nameE').val("")
              //               $('#dt_descE').val("")
              //             }else if(data.trim() == "success"){
              //               $('#EditModal').modal('hide');
              //                     //success message
              //                       const Toast = Swal.mixin({
              //                       toast: true,
              //                       position: 'top-end',
              //                       showConfirmButton: false,
              //                       timer: 1100,
              //                       timerProsressBar: true,
              //                       didOpen: (toast) => {
              //                       toast.addEventListener('mouseenter', Swal.stopTimer)
              //                       toast.addEventListener('mouseleave', Swal.resumeTimer)                                   
              //                     }
              //                     })
              //                       Toast.fire({
              //                       icon: 'Success',
              //                       title:'Changes Successfully Saved'
              //                   }).then(function(){
              //                     document.location.reload(true)//refresh pages
              //                   });
              //                       $('#dt_codeE').val("")
              //                       $('#dt_nameE').val("")
              //                       $('#dt_descE').val("")
              //               }else{
              //                 Swal.fire("There is somthing wrong","","error");
              //             }
              //           })
              //         }else{
              //           Swal.fire("You must fill out every field","","warning");
              //         }
              //     })
            // // End Edit function

              // View Function
                $('.viewbtn').on('click', function () {

                    $('#ViewModal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data); 
                    document.getElementById("view_code").placeholder = data[1];      
                    document.getElementById("view_title").placeholder = data[8];   
                    document.getElementById("view_filename").placeholder = data[2];   
                    $('#view_filename').text(data[2]);
                    $('#view_creator').text(data[3]);
                    $('#view_date').text(data[4]);
                    // JsBarcode("#barcode", data[1]);
                    JsBarcode("#barcode", data[1], {
                      format: "CODE128",
                      lineColor: "#000",
                      width: 3,
                      height: 120,
                      textAlign: "center",
                      displayValue: true
                    });
                  });
            // End of View function 

             // View Function
                $('.remarksbtn').on('click', function () {

                    $('#RemarksModal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data); 
                    if(data[18] ==""){
                      $('#remarks').text(data[10]);
                    }else{
                       $('#remarks').text(data[18]);
                    }
                  });
            // End of View function 

          });

    </script>
  
</body>

</html>