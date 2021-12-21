<!DOCTYPE html>
<html lang="en">

<head>
<?php include ('core/css-links.php');//css connection?>
</head>
<body>

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'office'; include ('core/side-nav.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Office List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Settings</li>
          <li class="breadcrumb-item active">Office List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="">
  
    <section class="section">
      <div class="row">        
        <div class="col-lg-12">
          <div class="card">
            <div class="col-lg-12">
              <div class="form-group col-md-2 btn-lg"  style="float: left; padding:20px;">
                  <h2>Records</h2>
              </div>
              <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#addoffice"style="float: right; padding:20px;">
                  <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#Department" >
                   Add Office
                  </button>
              </div> 
            </div>
            <div class="card-body">           
              <!-- Table for Office records -->
              <table class="table table-hover datatable">
                <thead>
                  <tr>
                    <th scope="col" WIDTH="85%">OFFICE</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    require_once("include/conn.php");
                    $query="SELECT * FROM datms_office ORDER BY off_date DESC ";
                    $result=mysqli_query($conn,$query);
                    while($rs=mysqli_fetch_array($result)){
                      $offName=$rs['off_name'];
                  ?>
                  <tr>
                    <td WIDTH="85%"><?php echo $offName; ?></td>
                    <td><button type="button" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
                      <button type="button" class="btn btn-primary"><i class="bi bi-eye"></i></button>
                      <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                  </tr>

                  <?php }?>
                  
                </tbody>
              </table>
              <!-- End of office table record -->

            </div>
          </div>

        </div>
      </div>
      
    </section>

  </main><!-- End #main -->

   <!-- Create Office Modal -->
   <div class="modal fade" id="addoffice" tabindex="-1">
        <div>
             <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">OFFICE CREDENTIALS</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                      <div class="card" style="margin: 10px;">
                        <div class="card-body">
                          <h2 class="card-title">Fill all neccessary info</h2>
                            <!-- Fill out Form -->
                            <div class="row g-3" >
                              <div class="col-md-4">
                                  <input type="text" class="form-control" placeholder="Office Code" id="offcode" required>
                               </div>
                               <br>
                               <div class="col-md-8">
                                  <input type="text" class="form-control" placeholder="Name" id="offtitle" required>
                               </div>
                               <br>
                               <div class="col-12">
                                  <textarea class="form-control" style="height: 80px" placeholder="Location" id="offloc" required></textarea>
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
     </div>
     <!-- End Create Office Modal-->

  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>

  <!-- modal office save ajax -->
  <script>
        $('#save').click(function(e){ 
          e.preventDefault();
            if($('#offcode').val()!="" && $('#offtitle').val()!="" && $('#offloc').val()!=""){
              $.post("add_office.php", {
                offcode:$('#offcode').val(),
                offname:$('#offtitle').val(),
                offloc:$('#offloc').val()
                },function(data){
                if (data.trim() == "failed"){
                  $('#addoffice').modal('hide');
                  Swal.fire("Office is already in server","","error");//response message
                  // Empty test field
                  $('#offcode').val("")
                  $('#offtitle').val("")
                  $('#offloc').val("")
                }else if(data.trim() == "success"){
                  $('#addoffice').modal('hide');
                  //success message
                  const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                  document.location.reload(true)//refresh pages
                  }
                  })
                  Toast.fire({
                  icon: 'success',
                  title: 'Office successfully Saved'
                  })
                  $('#offcode').val("")
                  $('#offtitle').val("")
                  $('#offloc').val("")
                   }else{
                  console.log(data);
                }
              })
            }else{
              Swal.fire("You must fill out every field","","warning");
            }
        })
    </script>
    
</body>

</html>