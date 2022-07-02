<!DOCTYPE html>
<html lang="en">
<?php require 'control/check-session-login.php' ;


  if ($user_online == "true") {
  if ($rolee == "Internship Coordinator" || $rolee == "SuperAdmin") {
  }else{
  header("location:../");   
  }
  }else{
  header("location:../"); 
  }  




?>

<head>

  <title>BCP - Registered </title>
  <?php require 'drawer/header.php';
  ?>
  
</head>

<body>
  <?php require 'drawer/modal.php' ?>
  <!-- ======= Header ======= -->
  <!--editcompany-->
  

          

  <header id="header" class="header fixed-top d-flex align-items-center">

   <?php require 'drawer/navbar.php' ?>

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <?php require 'drawer/sidebar.php' ?>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Company Accounts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?php echo'index.php?'.$url;
          ?>>Home</a></li>
          <li class="breadcrumb-item">Registered</li>
          <li class="breadcrumb-item active">Accounts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="font-size: 0.8em;" >
              <br>
              <br>

              <div class="card" >
                <div class="card-body" style="font-size: 0.8em;">
              <br>
             
              
                 
              
              
                 
                <!-- Table with stripped rows -->
            <?php
                    // Include config file
                    require '../dbCon/config.php';

                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM `ims_company_regis`
                    INNER JOIN ims_department_information
                    ON
                    ims_department_information.id = ims_company_regis.id
                    INNER JOIN ims_files
                    ON 
                    ims_files.uid = ims_company_regis.id
                                        ORDER BY `datee` desc";
                    
                    if($result = mysqli_query($conn, $sql)){
                                               
                      if(mysqli_num_rows($result) > 0){
                     ?>
              
              <div class="table-responsive-lg">

                <!-- Table with stripped rows -->
              <table class="table table-striped datatable ">
                <thead style="background-color: skyblue;">
                  <tr>
                  </tr>
                  <tr>

                    <th scope="col"><input type="checkbox" id="checkAll"><label></label></th>
                    <th scope="col">Company_ID</th>
                    <th scope="col">Company</th>
                    <th colspan="2">Representative Name</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Date Registered</th>
                    <th scope="col">Status</th>
                    <th colspan="3">Action</th>

                  </tr>
                </thead>
                <tbody>

                  <?php
                 while($row = mysqli_fetch_array($result)){

                  ?>

                  <tr>

                    <td hidden><?= $row['id']; ?></td>
                    <td><input type="checkbox" class="checkItem" value="<?=$row['uid']?>" name="id[]" ></td>
                    <td data-label="Company_ID"> <?= $row['id_number']; ?></td>
                    <td data-label="Company_Name"><?= $row['c_name']; ?></td>
                    <td colspan="2"><?= $row['repre_name']; ?></td>
                    <td><?= $row['c_email']; ?></td>
                    <td><?= $row['contact']; ?></td>
                    <td><?= $row['datee']; ?></td>
                    <td><?= $row['c_status']; ?></td>

                    <td WIDTH="7%">      
                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">                
                       
                        <button type="button" class="btn btn-primary editt" data-bs-toggle="modal" data-bs-target="#edit"><i class="bi bi-pencil"></i></button>&nbsp;  
                        <a type='button' class='btn btn-secondary' <?php echo 'href=constant/get_file.php?id='.$row['id']; ?>><i class='bi bi-download'></i></a>&nbsp;
                        <a <?php echo 'data-id='.$row['id_number'];?> type='button' class='btn btn-info userinfo'><i class='bi bi-eye' data-bs-toggle='#empModal' data-bs-target='#empModal'>
                        
                    </i></a>&nbsp;           
                    <button type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure want to Delete !')"class="btn btn-danger"><i class="bi bi-dash-circle"></i></button>       
                      </div>
                    </td>
                    
                    
                  </tr>
                  <?php

                }
                 ?>
                </tbody>

              </table>
              <?php
                 }
                  
                }
              
             
              else{
               echo  "<div class='alert alert-danger' role='alert' >
                                <center>
                                          <i class='bi bi-info-circle'></i> No Record Found !
                                </center>
                          </div>";

                  }
            ?>


              <!-- End Table with stripped rows -->
               
            
              <!-- End Table with stripped rows -->
            </div>
          </form>
            </div>
          </div>

          </div>
      </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <?php require '../drawer/footer.php' ?>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php require 'drawer/js.php' ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript">
    
    $(document).ready(function(){
      $("#checkAll").click(function()
      {
        if($(this).is(":checked"))
        {
          $(".checkItem").prop('checked',true);
        }
        else
        {
          $(".checkItem").prop('checked',false);
        }
      });
    });

  </script>
      <script>

        //ediit
        $(document).ready(function () {

            $('.editt').on('click', function () {

                $('#editcompany').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#com_id').val(data[0]);
                $('#companyid').val(data[2]);
                $('#company').val(data[3]);
                $('#rname').val(data[4]);
                $('#cstatus').val(data[5]);
                

            });
        });


        //viewing company data
         

          
    
      $(document).ready(function(){
                $('.userinfo').click(function(){
                  var userid = $(this).data('id');  
                    $.ajax({
                        url: 'constant/com-info.php',
                        type: 'POST',
                        data: {userid: userid},
                        success: function(response){ 
                            console.log(response);
                            $('.view').html(response); 
                            $('#empModal').modal('show'); 
                        }
                    });
                    
                }); 
            });

    </script>


    <?php require 'drawer/copy.php' ?>
</body>
  
</html>
