<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Profile</title>
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
  <?php include ('core/header.php');//Design for  Header?>

  <main>

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   <section class="section" style="padding: 20px;">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">

            <!-- Report Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="myTabjustified" role="tablist" style="margin-top: 10px;">
              <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 active" id=" incoming-tab" data-bs-toggle="tab" data-bs-target="#IncomingDocs" type="button" role="tab" aria-controls="incoming" aria-selected="true">Paid Application</button>
              </li>
              <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="received-tab" data-bs-toggle="tab" data-bs-target="#ReceivedDocs" type="button" role="tab" aria-controls="profile" aria-selected="false">Unpaid Application</button>
              </li>
            </ul>
            <div class="tab-content pt-2" id="myTabjustifiedContent">
              <div class="tab-pane fade show active" id="IncomingDocs" role="tabpanel" aria-labelledby=" incoming-tab">

                <!-- IncomingDocs Docs -->
                <section class="section">
                  <div class="row">        
                    <div class="col-lg-12">
                      <div class="card">
                        <div class="col-lg-12">
                          <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                              <h4>Paid Application Records</h4>
                          </div>
                        </div>
                        <div class="card-body" >           
                          <!-- Table for Role records -->
                          <table class="table table-hover datatable" >
                            <thead>
                              <tr>
                                <th scope="col">Application Number</th>
                                <th scope="col" >Student Name</th>          
                                <th scope="col">Program</th>   
                                <th scope="col">Date Registered</th>       
                                <th scope="col">OR Number</th>
                                <th scope="col">Date of Payment</th>  
                                <!-- <th scope="col">Account Status</th>           -->
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                require_once("include/conn.php");
                                $query="SELECT *, LEFT(middlename,1) FROM student_application  WHERE account_status = 'Paid' AND `account_status` NOT IN ('Enrolled') ORDER BY stud_date ASC ";
                                $result=mysqli_query($conn,$query);
                                while($rs=mysqli_fetch_array($result)){
                                  $adm_no =$rs['id_number'];
                                  $adm_fname = $rs['firstname'];
                                  $adm_lname = $rs['lastname'];        
                                  $adm_mname = $rs['LEFT(middlename,1)'];
                                  $adm_program = $rs['course'];
                                  $adm_as = $rs['account_status'];
                                  $adm_date = $rs['stud_date'];

                                  $sql1 = "SELECT * FROM cashier WHERE adm_num = " . $adm_no . " ";
                                    if($result1 = mysqli_query($link, $sql1)){
                                      if(mysqli_num_rows($result1) > 0){
                                        while($row1 = mysqli_fetch_array($result1)){
                                          $adm_ORNum = $row1['or_num'];  
                                          $adm_DP = $row1['date'];                                         
                                        }
                                        // Free result set
                                        mysqli_free_result($result1);
                                      }
                                    }
                                    
                              ?>
                            <tr>
                              <td data-label="Code: "><?php echo $adm_no; ?></td>
                              <td data-label="Name: " WIDTH="25%"><?php echo $adm_fname.' '.$adm_mname.'.'.' '.$adm_lname; ?></td>
                              <td data-label="Program: "><?php echo $adm_program; ?></td>                                  
                              <td data-label="Date: "WIDTH="15%"><?php echo $adm_date?></td>   
                              <td data-label="Status: "><?php echo $adm_ORNum?></td>     
                              <td data-label="Date: "><?php echo $adm_DP?></td>  
                            </tr>
                            <?php } ?>
                            </tbody>
                          </table>
                          <!-- End of Table -->

                        </div>
                      </div>

                    </div>
                  </div>
                  
                </section>
                <!-- End Table with stripped rows -->

              </div>
              <div class="tab-pane fade" id="ReceivedDocs" role="tabpanel" aria-labelledby="received-tab">
                <!-- ReceivedDocs Docs -->
                <!-- IncomingDocs Docs -->
                <section class="section">
                      <div class="row">        
                        <div class="col-lg-12">
                          <div class="card">
                            <div class="col-lg-12">
                              <div class="form-group col-md-3 btn-lg"  style="float: left; padding:20px;">
                                  <h4>Unpaid Application Records</h4>
                              </div>
                            </div>
                            <div class="card-body" >           
                              <!-- Table for Role records -->
                              <table class="table table-hover datatable" >
                                <thead>
                                  <tr>
                                    <th scope="col">Application Number</th>
                                    <th scope="col" >Student Name</th>          
                                    <th scope="col">Program</th>   
                                    <th scope="col">Date Registered</th>         
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                    require_once("include/conn.php");
                                    $query="SELECT *, LEFT(middlename,1) FROM student_application  WHERE account_status = 'Unpaid' AND `account_status` NOT IN ('Enrolled') ORDER BY stud_date ASC ";
                                    $result=mysqli_query($conn,$query);
                                    while($rs=mysqli_fetch_array($result)){
                                      $adm_no =$rs['id_number'];
                                      $adm_fname = $rs['firstname'];
                                      $adm_lname = $rs['lastname'];        
                                      $adm_mname = $rs['LEFT(middlename,1)'];
                                      $adm_program = $rs['course'];
                                      $adm_as = $rs['account_status'];
                                      $adm_date = $rs['stud_date'];                                                                             
                                  ?>
                                <tr>
                                  <td data-label="Application Code"><?php echo $adm_no; ?></td>
                                  <td data-label="Name" WIDTH="25%"><?php echo $adm_fname.' '.$adm_mname.'.'.' '.$adm_lname; ?></td>
                                  <td data-label="Program"><?php echo $adm_program; ?></td>                                  
                                  <td data-label="Admission Date"WIDTH="15%"><?php echo $adm_date?></td>   
                                </tr>
                                <?php } ?>
                                </tbody>
                              </table>
                              <!-- End of Table -->

                            </div>
                          </div>

                        </div>
                      </div>
                      
                    </section>
                <!-- End Table with stripped rows -->
              </div>
            </div><!-- End Default Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer class="footer">
      <div class="copyright" style="margin-bottom: 30px;">
        <center>
          &copy;Copyright <a href="https://bcp.edu.ph/home" target="_blank " data-bs-toggle="tooltip" data-bs-placement="top" 
          title="Access BCP Website">Bestlink College of the Philippines</a> All Rights Reserved
        </center>                 
      </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>
</body>

</html>