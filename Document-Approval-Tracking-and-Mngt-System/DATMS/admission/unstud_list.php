<?php
include('session.php');
?>
<!Student html>
<html lang="en">
<title>ADMISSION | Temporarily Enrolled</title>
<head>
<?php include ('core/css-links.php');//css connection?>
<style>
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
            border-radius: 7%;
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
<?php $page = 'unlist' ; $col = 'reports'; include ('core/side-nav.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Temporarily Enrolled List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Settings</li>
          <li class="breadcrumb-item active">Temporarily Enrolled List</li>
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
                  <h4>Temporarily Enrolled Students</h4>
              </div> 
            </div>
            <div class="card-body" >           
              <!-- Table for Student records -->
              <table class="row-border hover datatable table" id="StudentTable">
                <thead>
                  <tr>
                    <th WIDTH="10%">Student No.</th>
                    <th >Name</th>
                    <th scope="col">Program</th>                    
                    <th >Status</th>
                    <th scope="col" WIDTH="7%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    require_once("include/conn.php");
                    $query="SELECT *, LEFT(middlename,1) FROM student_information WHERE account_status = 'Temporarily Enrolled' ORDER BY stud_date DESC ";
                    $result=mysqli_query($conn,$query);
                    while($rs=mysqli_fetch_array($result)){
                      $adm_id = $rs['id'];
                      $adm_no =$rs['id_number'];
                      $adm_fname = $rs['firstname'];
                      $adm_lname = $rs['lastname'];        
                      $adm_mname = $rs['LEFT(middlename,1)'];
                      $adm_program = $rs['course'];
                      $date = $rs['stud_date'];
                      $adm_as = $rs['account_status'];
                  ?>
                  <tr>
                    <td data-label="Student No."><?php echo $adm_no; ?></td>
                    <td data-label="Name" WIDTH="50%"><?php echo $adm_fname.' '.$adm_mname.'.'.' '.$adm_lname; ?></td>
                    <td data-label="Program"><?php echo $adm_program; ?></td>
                    <td data-label="Status"><?php echo $adm_as?></td>
                    <td style="display: none;"><?php echo $date?></td>
                    <td WIDTH="7%">      
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">                
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ViewModal<?php echo $adm_id;?>" title="View"><i class="bi bi-eye"></i></button>      
                        <button class="btn btn-success updatebtn" title="Update Offically"><i class="bi bi-check-lg"></i></button>                  
                      </div>
                    </td>
                  </tr>

                  <?php 
                  include 'modals/stud_modals.php';
                  } ?>
                  
                </tbody>
              
              </table>
              <!-- End of Student table record -->

            </div>
          </div>

        </div>
      </div>
      
    </section>

  </main><!-- End #main -->

  <!-- Student Modals -->
      <!-- Edit Students Modal -->
      <div class="modal fade" id="UpdateModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">UPDATE STUDENT STATUS</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                      <div method="POST" class="card" style="margin: 10px;">
                        <div class="card-body">
                          <h2 class="card-title">Update Student status as Officially Enrolled</h2>
                          <h5 id="stud_num" style="text-align: end; color:black"></h5> 
                            <!-- Fill out Form -->
                            <div class="row g-3" >                                
                              <input type="hidden" class="form-control" id="dt_idE" readonly>                              
                            </div>                      
                        </div>
                      </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button class="btn btn-primary" name="save" id="save" >Save Changes</button>
                        </div>
                    <!-- End Form -->
                </div>
            </div>
          </div>
          <!-- End Edit Students Modal-->

  <!-- End of Office Modals -->
  <!-- End of Student Modals -->

  <!-- ======= Footer ======= -->
    <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <!-- Back to top Button -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
    <?php include ('core/js.php');//css connection?>
  <!-- JS Scripts -->
    <script>        
        // this script will execute as soon a the website runs
        $(document).ready(function () {

              // Enroll modal calling
           $('#StudentTable').on('click','.updatebtn', function () {

                 $('#UpdateModal').modal('show');

                 $tr = $(this).closest('tr');

                 var data = $tr.children("td").map(function () {
                     return $(this).text();
                 }).get();

                 console.log(data);     
                 $('#stud_num').text(data[1]);   
                     $('#dt_idE').val(data[0]);
               });
           // End of Enroll modal calling 

           // Enroll function
           $('#save').click(function(d){ 
                 d.preventDefault();
                   if($('#dt_idE').val()!=""&&$('#dt_stud').val()!=""){
                     $.post("function/stud_update.php", {
                       dtid:$('#dt_idE').val()
                      //  dtstat:$('#dt_stud').val()
                       },function(data){
                         if (data.trim() == "failed"){
                         $('#UpdateModal').modal('hide');
                         Swal.fire("No Student Detected","","error");//response message
                         // Empty test field                      
                       }else if(data.trim() == "success"){
                         $('#UpdateModal').modal('hide');
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
                                 title:'Student status successfully submitted'
                                 }).then(function(){
                                   document.location.reload(true)//refresh pages
                                 }); 
                         }else{
                           Swal.fire("There is somthing wrong","","error");
                       }
                     })
                   }else{
                     Swal.fire("You must fill out every field","","warning");
                   }
               })
           // End Enroll function

          });

    </script>
  
</body>

</html>