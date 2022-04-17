<?php
include('security/session.php');
include('includes/oopGlobal.php');
?>

<!DOCTYPE html>
<html lang="en">
<title>HCM | Dashboard</title>
<head>
<?php include ('includes/head_ext.php');?>
<style>
  
</style>
</head>

<body>
<?php $page = "Records-Add-Faculty"; $nav = "Records";?> 
<?php include ('includes/header.php');?>
<?php include ('includes/sidebar.php');?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add Medical Record</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?id=<?php echo $_SESSION["login_key"];?>">Home</a></li>
        <li class="breadcrumb-item active">Add Medical Record</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Medical Records Form</h5>     
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      Direction : Search id number to store his/her medical records. if no results found then you not enrolled or unofficially enrolled <br>Note : Use the add unofficial for those who are not enrolled for advance application
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>     
    <form method="POST">
      <div class="row g-4">
        <div class="col-sm-6 p-3">
          <div class="input-group">
            <input type="text" placeholder="Search Teacher Number" class="form-control" name="search2" required>
            <label for="sub2"><i class="btn btn-primary ri-search-eye-line" style="cursor: pointer;">&nbspSearch</i></label> 
            <input type="submit" id ="sub2" name="submit2" style="display: none; visibility: none;">
          </div>
        </div>
        <div class="col-sm-6">
          <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#myModal"><i class="ri-add-circle-line"></i>&nbspAdd Unofficial</button>
        </div>
      </div>
    </form>
    <?php
      if(isset($_POST['submit2'])){
        $search = $_POST['search2'];

        $table_name = "teacher_information";
        $result2 = SelectQuery($table_name, $conn, $search);
        if(mysqli_num_rows($result2) > 0){

          $row2 = mysqli_fetch_assoc($result2);
          echo '
          
            <form action="resources/add_records.php" method="POST" enctype="multipart/form-data">
              <div class="card p-4">
                <div class"card-body">
                  <div class="row"> 
                    <div class="col-sm-6">
                      <fieldset class="border p-4">
                        <legend class="float-none w-auto p-2">Personal Information:</legend>
                        <div class="row g-2">
                          <div class="col-md-6">
                            <input type="text" class="form-control form-control-lg" value="'.$row2['id_number'].'" disabled>
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control form-control-lg" value="'.$row2['lastname'].', '.$row2['firstname'].' '.$row2['middlename'].'" disabled>
                          </div>
                        </div>
                        <div class="row g-2 pt-3">
                          <div class="col-md-6">
                            <input type="text" class="form-control form-control-lg" value="'.$row2['course'].'" disabled>
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control form-control-lg" value="'.$row2['gender'].'" disabled>
                          </div>
                        </div>
                      </fieldset>
                      <div class="row p-4">
                        <div class="alert alert-info fade show text-center" role="alert">
                          <strong>Remarks and Upload file on the Action section</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <fieldset class="border p-2">
                        <legend class="float-none w-auto p-2">Account Information</legend>
                        <div class="row"> 
                          <h5>'.$row2['account_status'].', '.$row2['date'].'</h5>
                        </div>
                      </fieldset>
                      <fieldset class="border p-2">
                      <legend class="float-none w-auto p-2">Action</legend>
                        <div class="row">
                          <div class="w-auto"> Remarks </div>
                        </div>
                        <div class="row p-4">
                          <textarea class="form-control" name ="remarks" rows="3"></textarea>
                        </div>
                      <div class="row">
                        <div class="col d-flex justify-content-center">
                          <label for="uploadPDF"><i class="btn btn-primary ri-upload-cloud-2-fill">&nbspUpload</i><label>
                          <input type="file" name="upload" id="uploadPDF" class="form-control form-control-md" onchange="getImage(this.value)" style="display: none; visibility:none;">
                        </div>
                      </div>
                      <h5 id="display-name"  class="row d-flex justify-content-center"></h5>
                    </div>  
                    <div class="text-center p-4">
                      <input type="hidden" name = "fullname" value = "'.$row2['firstname'].' '.$row2['middlename'].' '.$row2['lastname'].'">
                      <input type="hidden" name="id_number" value="'. $row2['id_number'].'">
                      <input type="hidden" name="tablename" value="hcms_faculty_records">
                      <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
                      <button type="close" class="btn btn-secondary">close</button>
                    </div>
                  </div>
                </div>
              </div>';

        } else {
          
          echo '
          <div class="row p-4">
            <div class="alert alert-danger">No Records Found</div>
          </div>';
        }
        mysqli_free_result($result);
      }
    ?>
          
    </form><!-- End No Labels Form -->  
  </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModallabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">STORE MEDICAL RECORD</h5>
        <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        <div class="row"> 
          <div class="col-sm-6">
            <fieldset class="border p-4">
              <legend class="float-none w-auto p-2">Personal Information:</legend>
              <div class="row g-2">
                <div class="col-md-6">
                  <input type="text" class="form-control" name="id_number" placeholder="ID Number" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="fname" placeholder="First Name" required>
                </div>
              </div>
              <div class="row g-2 pt-3">
                <div class="col-md-6">
                  <input type="text" class="form-control" name="mname" placeholder="Middle Name" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="lname" placeholder="Last name" required>
                </div>
              </div>
              <div class="row g-2 pt-3">
                <div class="col-md-6">
                  <input type="text" class="form-control" name="gender" placeholder="Gender"required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="course" placeholder="Course"required>
                </div>
              </div>
            </fieldset>
            <div class="row p-4">
              <div class="alert alert-info fade show text-center" role="alert">
                <strong>Remarks and Upload file on the Action section</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <fieldset class="border p-2">
              <legend class="float-none w-auto p-2">Account Information</legend>
              <div class="row">
                <div class="col">
                  <input type="text" class="form-control" name="status2" value="Unofficial" disabled>
                </div>
              </div>
            </fieldset>
            <fieldset class="border p-2">
            <legend class="float-none w-auto p-2">Action</legend>
              <div class="row">
                <div class="w-auto"> Remarks </div>
              </div>
              <div class="row p-4">
                <textarea class="form-control" name="remarks" rows="3"></textarea>
              </div>
            <div class="row">
              <div class="col d-flex justify-content-center">
                <label for="uploadPDF"><i class="btn btn-primary ri-upload-cloud-2-fill">&nbspUpload</i><label>
                <input type="file" name="upload" id="uploadPDF" class="form-control form-control-md" onchange="getImage(this.value)" style="display: none; visibility:none;">
              </div>
            </div>
            <h5 id="display-name"  class="row d-flex justify-content-center"></h5>
          </div>  
          <div class="text-center p-4">
            <input type="hidden" name="tablename" value="hcms_faculty_records">
            <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
            <button type="close" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</main><!-- End #main -->
<script>


function getImage(imagename)
  {
    var newimg=imagename.replace(/^.*\\/,"");
      $('#display-name').html(newimg);
  }


</script>
<?php
include ("includes/scripts.php");
include ("includes/footer.php");
?>
</script>
</body>

</html>