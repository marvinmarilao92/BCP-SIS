<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php include ("includes/head.php"); ?>

<body>
  <head>
      <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
      </script>

      <?php
        include ("includes/nav.php");
        include ("includes/sidebar.php");
      ?>
      <?php $page = 'SI'; include ('includes/sidebar.php');//Design for sidebar?>
  </head>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Students</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Students</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="col-lg-12">
                <div class="form-group col-md-2 btn-lg"  style="float: left; padding:20px;">
                    <h4>List of Students</h4>
                </div>
                <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                   <a href="student-create.php" class="btn btn-success pull-right">Add New Student</a>
                </div> 
              </div>
            <div class="card-body">
               <!-- Table for Office records -->
              <table class="table table-hover datatable" >
                <thead>
                  <tr>
                    <th style="display:none"></th>
                    <th style="display:none"></th>
                    <th scope="col" WIDTH="60%">Student Name</th>  
                    <th style="display:none"></th>
                    <th style="display:none"></th>                  
                    <th style="display:none"></th>
                    <th style="display:none"></th>
                    <th style="display:none"></th>
                    <th style="display:none"></th>                  
                    <th style="display:none"></th>
                    <th style="display:none"></th>
                    <th style="display:none"></th>
                    <th style="display:none"></th>                  
                    <th style="display:none"></th>
                    <th style="display:none"></th>
                    <th style="display:none"></th>
                    <th>Last Access</th>
                    <th>Account Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    require_once("includes/conn.php");
                    $query="SELECT * FROM student_information ORDER BY stud_date DESC ";
                    $result=mysqli_query($conn,$query);
                    while($rs=mysqli_fetch_array($result)){
                      $studid =$rs['id'];
                      $studno = $rs['id_number'];
                      $fname = $rs['firstname'];        
                      $lname = $rs['lastname'];
                      $mname = $rs['middlename'];
                      $email =$rs['email'];
                      $contact = $rs['contact'];
                      $address = $rs['address'];        
                      $course = $rs['course'];
                      $yl = $rs['year_level'];
                      $section =$rs['section'];
                      $sy = $rs['school_year'];
                      $gender = $rs['gender'];        
                      $bday = $rs['birthday'];
                      $nationality = $rs['nationality'];
                      $religion =$rs['religion'];
                      $cs = $rs['civil_status'];
                      $as = $rs['account_status'];        
                      $sd = $rs['stud_date'];
                  ?>
                  <tr>
                    <td style="display:none"><?php echo $studid; ?></td>
                    <td style="display:none"><?php echo $studno; ?></td>
                    <td><?php echo $fname.' '.$mname.' '.$lname; ?>
                    <td style="display:none"><?php echo $email?></td>
                    <td style="display:none"><?php echo $contact?></td>
                    <td style="display:none"><?php echo $address?></td>
                    <td style="display:none"><?php echo $course?></td>
                    <td style="display:none"><?php echo $yl?></td>
                    <td style="display:none"><?php echo $section?></td>
                    <td style="display:none"><?php echo $sy?></td>
                    <td style="display:none"><?php echo $gender?></td>
                    <td style="display:none"><?php echo $bday?></td>
                    <td style="display:none"><?php echo $nationality?></td>
                    <td style="display:none"><?php echo $religion?></td>
                    <td style="display:none"><?php echo $cs?></td>
                    <?php
                    // Include config file
                    require_once "config.php";

                     $sql1 = "SELECT * FROM users WHERE id_number = " . $studno = $rs['id_number'] . " ";
                     if($result1 = mysqli_query($link, $sql1)){
                       if(mysqli_num_rows($result1) > 0){
                         while($row1 = mysqli_fetch_array($result1)){
                           echo "<td>" . $row1['last_access'] . "</td>";
                         }
                         // Free result set
                         mysqli_free_result($result1);
                       }
                     }?>
                    <td ><?php echo $as?></td>
                    <td style="display:none"><?php echo $sd?></td>
                    
                  </td>
                    <td>                      
                      <button class="btn btn-primary viewbtn"><i class="bi bi-eye"></i></button>
                      <button class="btn btn-success editbtn"><i class="bi bi-pencil-square"></i></button>
                      <button class="btn btn-danger deletebtn" ><i class="bi bi-trash" ></i></button>
                    </td>
                  </tr>

                  <?php } ?>
                  
                </tbody>
              </table>
             
            </div>
            <div class="container-fluid">
              <div class="row mb-4">
                <div class="col-md-10">
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>


  </main><!-- End #main -->

<?php
include ("includes/footer.php");
?>

</body>

</html>