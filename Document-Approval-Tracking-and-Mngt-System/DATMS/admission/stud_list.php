<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Student List</title>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
<?php include ('core/css-links.php');//css connection?>
<?php  include "core/key_checker.php"; ?>
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
        .table > :not(:first-child) {
            border-top: 0;
        }
      </style>
</head>
<body>

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'SL' ; $col = 'list'; include ('core/side-nav.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Student List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Module</li>
          <li class="breadcrumb-item active">Student List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="">
    <section class="section">
      <div class="row">        
        <div class="col-lg-12">
          <div class="card">
            <div class="col-lg-12 row justify-content-center" style="padding:10px ;">
            <div class="col-md-1">
              <a type="button" class="btn btn-success" href="stud_list?id=<?php echo $_SESSION["login_key"];?>">
                Referesh
              </a>
            </div>
            <div class="col-md-2">
               <input type="text" name="From" id="From" class="form-control" placeholder="From Date (Start)"/>
            </div>
            <div class="col-md-2">
              <input type="text" name="to" id="to" class="form-control" placeholder="To Date (End)" onChange="fetchRole(this.value);"/>
            </div>
            <div class="col-md-1">
              <button type="button" class="btn btn-primary form-control" onclick="ExportToExcel('xlsx')" >
                Export
              </button>
            </div>
            </div>
            <div class="card-body" id="student_table">           
               <!-- Table for Students records -->
               <table class="table table-bordered" id="StudentsTable">
                <thead>
                  <tr>
                    <th WIDTH="10%">Student No.</th>
                    <th WIDTH="20%">Name</th>
                    <th scope="col">Program</th>                    
                    <th >Status</th>
                    <th scope="col">Phone No.</th>
                    <th scope="col">Email</th>
                    <th scope="col" WIDTH="15%">Date Enrolled</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    require_once("include/conn.php");
                    $query="SELECT *,LEFT(middlename,1) FROM student_information ORDER BY stud_date DESC ";
                    $result=mysqli_query($conn,$query);
                    while($rs=mysqli_fetch_array($result)){
                      $adm_id = $rs['id'];
                      $adm_no =$rs['id_number'];
                      $adm_fname = $rs['firstname'];
                      $adm_lname = $rs['lastname'];        
                      $adm_mname = $rs['LEFT(middlename,1)'];
                      $adm_program = $rs['course'];
                      $adm_contact = $rs['contact'];
                      $adm_email = $rs['email'];
                      $date = $rs['stud_date'];
                      $adm_as = $rs['account_status'];

                  ?>
                  <tr>
                    <td data-label="Student No."><?php echo $adm_no; ?></td>
                    <td data-label="Name" WIDTH="20%"><?php echo $adm_lname.', '.$adm_fname.' '.$adm_mname.'.'; ?></td>
                    <td data-label="Program"><?php echo $adm_program; ?></td>
                    <td data-label="Status"><?php echo $adm_as?></td>
                    <td data-label="No."><?php echo $adm_contact; ?></td>
                    <td data-label="Email"><?php echo $adm_email?></td>
                    <td data-label="Date:"><?php echo $date?></td>
                  </tr>

                  <?php 
                  // include 'modals/stud_modals.php';
                  } ?>
                  
                </tbody>
              
              </table>
              <!-- End of Students table record -->

            </div>
          </div>

        </div>
      </div>
      
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
    <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <!-- Back to top Button -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
   <!-- JS Scripts -->
   <script> 
     //excel
     var utc = new Date().toJSON().slice(0,10).replace(/-/g,'-');
     function ExportToExcel(type, fn, dl) {
        var elt = document.getElementById('StudentsTable');
        var wb = XLSX.utils.table_to_book(elt, { sheet: "Students Info" });
        return dl ?
            XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
            XLSX.writeFile(wb, fn || ('Student_Reports('+utc+').'+ (type || 'xlsx')));
        }
     // this script will execute as soon a the website runs
     $(document).ready(function () {
     
          $.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd'
            });
            $(function(){
                $("#From").datepicker();
                $("#to").datepicker();
            });
           // Enroll modal calling
           $('#StudentsTable').on('click','.updatebtn', function () {

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

           // Drop modal calling
           $('#StudentsTable').on('click','.dropbtn', function () {

                 $('#DropModal').modal('show');

                 $tr = $(this).closest('tr');

                 var data = $tr.children("td").map(function () {
                     return $(this).text();
                 }).get();

                 console.log(data);     
                 $('#stud_num1').text(data[1]);   
                     $('#dt_idE1').val(data[0]);
               });
           // End of Drop modal calling 

           // Drop function
           $('#drop').click(function(d){ 
                 d.preventDefault();
                   if($('#dt_idE1').val()!=""&&$('#dt_stud1').val()!=""){
                     $.post("function/stud_drop.php", {
                       dropid:$('#dt_idE1').val()
                      //  dtstat:$('#dt_stud').val()
                       },function(data){
                         if (data.trim() == "failed"){
                         $('#DropModal').modal('hide');
                         Swal.fire("No Student Detected","","error");//response message
                         // Empty test field                      
                       }else if(data.trim() == "success"){
                         $('#DropModal').modal('hide');
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
                                 title:'This student is successfully dropped'
                                 }).then(function(){
                                   document.location.reload(true)//refresh pages
                                 }); 
                         }else{
                          //  Swal.fire("There is somthing wrong","","error");
                          Swal.fire(data);
                       }
                     })
                   }else{
                     Swal.fire("You must fill out every field","","warning");
                   }
               })
           // End Drop function

            // Enroll modal calling
           $('#StudentsTable').on('click','.deactbtn', function () {

                 $('#StopModal').modal('show');

                 $tr = $(this).closest('tr');

                 var data = $tr.children("td").map(function () {
                     return $(this).text();
                 }).get();

                 console.log(data);     
                 $('#stud_num2').text(data[1]);   
                     $('#dt_idE2').val(data[0]);
               });
           // End of Enroll modal calling 

           // Enroll function
           $('#deact').click(function(d){ 
                 d.preventDefault();
                   if($('#dt_idE2').val()!=""&&$('#dt_stud2').val()!=""){
                     $.post("function/stud_deact.php", {
                       deactid:$('#dt_idE2').val()
                      //  dtstat:$('#dt_stud').val()
                       },function(data){
                         if (data.trim() == "failed"){
                         $('#StopModal').modal('hide');
                         Swal.fire("No Student Detected","","error");//response message
                         // Empty test field                      
                       }else if(data.trim() == "success"){
                         $('#StopModal').modal('hide');
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
                                 title:'You successfully deactivate the account'
                                 }).then(function(){
                                   document.location.reload(true)//refresh pages
                                 }); 
                         }else{
                           Swal.fire(data);
                       }
                     })
                   }else{
                     Swal.fire("You must fill out every field","","warning");
                   }
               })
           // End Enroll function


       });

       function fetchRole(id){
        var From = $('#From').val();
            // var to = $('#to').val();
            if(From != '' && to != '')
            {
                $.ajax({
                    url:"function/fetch_stud.php",
                    method:"POST",
                    data:{From:From, to:id},
                    success:function(data)
                    {
                        $('#student_table').html(data);
                        $('#student_table').append(data.htmlresponse);
                    }
                });
            }
            else
            {
                alert("Please Select the Date");
            }
        }

 </script>

  
</body>

</html>