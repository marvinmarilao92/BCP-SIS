<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Admission | Enroll New Student</title>
<head>
<?php include ('core/css-links.php');//css connection?>
</head>

<body>
<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'reqsub'; include ('core/side-nav.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Submit Requirments</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a>Module</a></li>
          <li class="breadcrumb-item">Submit Requirments</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <form class="card col-md-12" method="POST">
      <div class="card-body">
        
          <div class="row mb-12" aria-required="true">
            <div class="col-md-4 pt-1">
            <!-- <input type="text" style="display:none;" name="stud_id" id="stud_id" maxlength="1" value="'.$_SESSION['studnum'].'" Required readonly> -->
            <br>
            <div class="col-md-12" >
              <div class="form-floating">
                <input type="text" class="form-control" id="stud_id" name="stud_id" onChange="fetchTracking(this.value);" onkeypress="return isNumberKey(event)" maxlength="8" placeholder="Your Name" autofocus>
                <label for="floatingName" >Application Code</label>
              </div>
              
            </div>                                 
            <!-- Account Information -->
            <div class="activity">                                         
                </div>
              <!-- End Account Information --> 
          <h5 class="card-title">New Student Requirements:</h5>
            <?php
            $requirments ='';
                // Include config file
                require_once "include/config.php";
                // Attempt select query execution
                $sql = "SELECT * FROM datms_req ORDER BY id asc ";
                if($result = mysqli_query($link, $sql)){
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                      $requirments .='
                      
                      <div class="form-check">                      
                        <input class="form-check-input" type="checkbox" id="req_item" name="req_item[]" value="'.$row["req_name"].'">
                        <label class="form-check-label" for="gridCheck1">
                        '.$row["req_name"].'
                        </label>
                      </div>
                      ';
            
                    }
                    echo $requirments;
                    // Free result set
                    mysqli_free_result($result);
                  }
                }
            ?>        
            </div>

          </div>
          <button type="submit" class="btn btn-primary btn-lg" name="submit_req" style="float: right;">Submit</button>
      </div>
    </form>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>
</body>
<?php
  require_once("include/config.php");
  // agon date
  $current_year = date("y");
  $key = $_SESSION["login_key"];
  if(isset($_POST['submit_req'])&&$_POST['stud_id'])
  {
    $student_number = mysqli_real_escape_string($conn,$_POST['stud_id']);
      $reqItem = $_POST['req_item'];
      // echo $reqItem;

      foreach($reqItem as $item)
        {
          //Check if the Req is already in the database
            $sql1 = "SELECT req FROM datms_studreq WHERE id_number = '$student_number' AND `req` LIKE ('%$item%') ";
            $result = mysqli_query($link,$sql1);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

        }
      
      if($count!=0){
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
                title:"Some of the requirements is already on your account"
                }).then(function(){
                  window.location = "req_submit.php?id='.$key.'";//refresh pages
                });
            </script>';
      }else{
        foreach($reqItem as $item)
        {
            // echo $item . "<br>";
            $query = "INSERT INTO datms_studreq(id_number,req,status) VALUES('$student_number','$item','Onhold')";
            $query_run = mysqli_query($link, $query);
        }
    
        if($query_run)
        {
            // $_SESSION['status'] = "Success";
            
            // echo '<script>alert("Submitted")</script>';
            // header("Location: ../req_submit.php?id='.$key.'");
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
                title:"Requirements successfully submitted"
                }).then(function(){
                  
                  window.location = "req_submit.php?id='.$key.'";//refresh pages
                });
            </script>';
            unset($_SESSION["status"]);
            unset($_SESSION["studnum"]);
        }
        else
        {
            // $_SESSION['status'] = "Data Not Inserted";
            // echo '<script>alert("Failed")</script>';
            // $_SESSION['status'] = "Failed";
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
            title:"Requirements failed to submit"
            }).then(function(){
              window.location = "req_submit.php?id='.$key.'";//refresh pages
            });
        </script>';
            // header("Location: ../req_submit.php?id='.$key.'");
          
        }
      }
      
  }
?>
<!-- Script Functions -->
  <script type="text/javascript">
        function editInfo(){
          var isChecked = document.getElementById("editableswitch").checked;
            
          if(isChecked){
            // console.log("Input is checked");
            document.getElementById("first_name").readOnly=false;
            document.getElementById("middle_name").readOnly=false;
            document.getElementById("last_name").readOnly=false;

            document.getElementById('divcourse').style.display = 'block';
            document.getElementById('divadd').style.display = 'block';
            document.getElementById('divemail').style.display = 'block';
            document.getElementById('divnum').style.display = 'block';
            document.getElementById('divgen').style.display = 'block';
            document.getElementById('divbday').style.display = 'block';
            document.getElementById('divnation').style.display = 'block';
            document.getElementById('divreli').style.display = 'block';
            document.getElementById('divcs').style.display = 'block';
            
          } else {
            // console.log("Input is NOT checked");
            document.getElementById("first_name").readOnly=true;
            document.getElementById("middle_name").readOnly=true;
            document.getElementById("last_name").readOnly=true;

            document.getElementById('divcourse').style.display = 'none';
            document.getElementById('divadd').style.display = 'none';
            document.getElementById('divemail').style.display = 'none';
            document.getElementById('divnum').style.display = 'none';
            document.getElementById('divgen').style.display = 'none';
            document.getElementById('divbday').style.display = 'none';
            document.getElementById('divnation').style.display = 'none';
            document.getElementById('divreli').style.display = 'none';
            document.getElementById('divcs').style.display = 'none';
          }
        }
        
        function fetchStudInfo(id){
        if($("#application_code").val().length==8){
          $.ajax({
            type:'post',
            url:'ajaxfunction.php',
            data :{
              id : id,
              action: "data"
            },
            success: function(data){

              jsonObj = jQuery.parseJSON(data);

              if(jsonObj['success'] == '1'){

                  console.log(jsonObj['data'][0]);

                  // alert(data);
                  $(".first_name").val(jsonObj['data'][0].adm_fname);
                  $(".last_name").val(jsonObj['data'][0].adm_lname);
                  $(".middle_name").val(jsonObj['data'][0].adm_mname);
                  $(".email").val(jsonObj['data'][0].adm_email);
                  $(".contact").val(jsonObj['data'][0].adm_contact);
                  $(".address").text(jsonObj['data'][0].adm_add);
                  $(".course").val(jsonObj['data'][0].adm_course).change();
                  $(".gender").val(jsonObj['data'][0].adm_gen);
                  $(".birthdate").val(jsonObj['data'][0].adm_bday);
                  $(".nationality").val(jsonObj['data'][0].adm_nation).change();
                  $(".religion").val(jsonObj['data'][0].adm_religion).change();
                  $(".civil_status").val(jsonObj['data'][0].adm_cs).change();

              }else{
                Swal.fire ("No application info or student is not yet paid","","error").then(function(){
                document.location.reload(true)//refresh pages
                });
              }
                           
            }
          })
        }else{
          Swal.fire ("Application code must be 8 characters","","error").then(function(){
          document.location.reload(true)//refresh pages
          });
        }
        
      }
    $(document).ready(function () {
      
      // Save function
        $('#enroll').click(function(a){ 
          a.preventDefault();
            if($('#application_code').val()!="" &&$('#first_name').val()!="" && $('#last_name').val()!=""&& $('#course').val()!=""&& $('#year_level').val()!=""&& $('#section').val()!=""&& $('#school_year').val()!=""&& $('#address').val()!=""&& $('#email').val()!=""&& $('#contact').val()!=""&& $('#gender').val()!=""&& $('#birthdate').val()!=""&& $('#nationality').val()!=""&& $('#religion').val()!=""&& $('#civil_status').val()!=""){
              $.post("function/enroll_student.php", {
                Tcode:$('#application_code').val(),
                Tfname:$('#first_name').val(),
                Tlname:$('#last_name').val(),
                Tmname:$('#middle_name').val(),
                Tcourse:$('#course').val(),
                Tyl:$('#year_level').val(),
                Tsec:$('#section').val(),
                Tsy:$('#school_year').val(),
                Taddress:$('#address').val(),
                Temail:$('#email').val(),
                Tcontact:$('#contact').val(),
                Tgen:$('#gender').val(),
                Tbday:$('#birthdate').val(),
                Tnation:$('#nationality').val(),
                Treligion:$('#religion').val(),
                Tcs:$('#civil_status').val(),                     
                Tstat:$('#status').val()
                },function(data){
                if (data.trim() == "failed"){
                  //response message
                  Swal.fire("The data that you input is already in the system","","error");
                  // Empty test field
                  $('#application_code').val("")
                  $('#first_name').val("")
                  $('#last_name').val("")
                  $('#middle_name').val("")
                  $('#course').val("")
                  $('#year_level').val("")
                  $('#section').val("")
                  $('#school_year').val("")
                  $('#address').val("")
                  $('#email').val("")
                  $('#contact').val("")
                  $('#gender').val("")
                  $('#birthdate').val("")
                  $('#nationality').val("")
                  $('#religion').val("")
                  $('#civil_status').val("")
                  $('#status').val("")                 
                                    
                }else if(data.trim() == "success"){               
                        //success message
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProsressBar: true,
                        didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)                  
                        }
                        })
                      Toast.fire({
                      icon: 'success',
                      title:'Student is successfully enrolled'
                      }).then(function(){
                        document.location.reload(true)//refresh pages
                      });
                       // Empty test field
                        $('#application_code').val("")
                        $('#first_name').val("")
                        $('#last_name').val("")
                        $('#middle_name').val("")
                        $('#course').val("")
                        $('#year_level').val("")
                        $('#section').val("")
                        $('#school_year').val("")
                        $('#address').val("")
                        $('#email').val("")
                        $('#contact').val("")
                        $('#gender').val("")
                        $('#birthdate').val("")
                        $('#nationality').val("")
                        $('#religion').val("")
                        $('#civil_status').val("")
                        $('#status').val("") 
                  }else{
                    Swal.fire(data);
                }
              })
            }else{
              Swal.fire("You must fill out every field","","warning");
            }
        })

    var jsonObj;
 
      // input text only
      function isTextKey(evt){
          var charCode = (evt.which) ? evt.which : evt.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))
              return true;
          return false;
        }

        // show student info
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
          $('#stud_id').keyup(function(){
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
         // input numbers only
         function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
      }

  </script>
</html>