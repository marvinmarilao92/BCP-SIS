
<!DOCTYPE html>
<html lang="en">

<?php
include('includes/session.php');
include ("includes/head.php");
?>

<body>

<?php
include ("includes/nav.php");
include ("includes/sidebar.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Upload File for <?php if(isset($_POST['req_name'])){echo trim($_POST["req_name"]);}else{echo trim($_GET["req_name"]);} ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="clearance-status.php">Clearance Status</a></li>
          <li class="breadcrumb-item"><a href="clearance-status-read.php?id=<?php if(isset($_POST['id'])){echo trim($_POST["id"]);}else{echo trim($_GET["id"]);} ?>&name=<?php if(isset($_POST['name'])){echo trim($_POST["name"]);}else{echo trim($_GET["name"]);} ?>">Clearance Status of <?php if(isset($_POST['name'])){echo trim($_POST["name"]);}else{echo trim($_GET["name"]);} ?></a></li>
          <li class="breadcrumb-item">Upload File for <?php if(isset($_POST['req_name'])){echo trim($_POST["req_name"]);}else{echo trim($_GET["req_name"]);} ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Select a file to upload</h5>

              <!-- General Form Elements -->
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="alert alert-primary alert-dismissible fade show" role="alert">  
                  <h4 class="alert-heading">Accepted File Format is PDF.</h4>
                  <p>
                  Once you uploaded a file, please wait for the clearance coordinator to verify the file. You will be notified if the file was approved or not.
                  </p>
                  <hr>
                  <p class="mb-0">© Copyright Bestlink College of the Philippines. All Rights Reserved.</p>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-1 col-form-label">File Upload</label>
                  <div class="col-sm-11">
                    <input class="form-control" type="file" name="file" id="formFile" required>
                  </div>
                </div>
                <input class="form-control" type="hidden" name="req_id" value="<?php if(isset($_POST['req_id'])){echo trim($_POST["req_id"]);}else{echo trim($_GET["req_id"]);} ?>">
                <input class="form-control" type="hidden" name="req_name" value="<?php if(isset($_POST['req_name'])){echo trim($_POST["req_name"]);}else{echo trim($_GET["req_name"]);} ?>">
                <input class="form-control" type="hidden" name="id" value="<?php if(isset($_POST['id'])){echo trim($_POST["id"]);}else{echo trim($_GET["id"]);} ?>">
                <input class="form-control" type="hidden" name="name" value="<?php if(isset($_POST['name'])){echo trim($_POST["name"]);}else{echo trim($_GET["name"]);} ?>">
                <?php 
                  if(isset($_GET['status']) && trim($_GET['status']) == "Declined"){
                    echo '<input class="form-control" type="hidden" name="status" value="';
                    if(isset($_POST['status'])){echo trim($_POST["status"]);}else{echo trim($_GET["status"]);}
                    echo '"';
                  }
                ?>

                <div class="float-end mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="clearance-status-read.php?id=<?php if(isset($_POST['id'])){echo trim($_POST["id"]);}else{echo trim($_GET["id"]);}; ?>&name=<?php if(isset($_POST['name'])){echo trim($_POST["name"]);}else{echo trim($_GET["name"]);} ?>"><button type="button" class="btn btn-secondary">Cancel</button></a>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php
include ("includes/footer.php");
?>
<?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $req_id = mysqli_real_escape_string($link,$_POST['req_id']);
      $req_name = mysqli_real_escape_string($link,$_POST['req_name']);
      $id = mysqli_real_escape_string($link,$_POST['id']);
      $name = mysqli_real_escape_string($link,$_POST['name']);
      $temp_status="";
      if(isset($_POST['status']) && trim($_POST['status']) == "Declined"){
        $temp_status = mysqli_real_escape_string($link,$_POST['status']);
      }
      $location = "Database";
      $status = "Under Review";
      $file = $_FILES['file'];

      $fileName = $_FILES['file']['name'];
      $fileTmpName = $_FILES['file']['tmp_name'];
      $fileSize = $_FILES['file']['size'];
      $fileError = $_FILES['file']['error'];
      $fileType = $_FILES['file']['type'];

      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));
      // $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'docx');
      $allowed = array('pdf');
      if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
          if($fileSize < 52428800){
            $fileNameNew = str_replace('.','',uniqid('',true)).".".$fileActualExt;
            $fileDestination = 'uploads/'.$fileNameNew;


            if ($temp_status == "Declined") {
                $sql1 = "SELECT * FROM clearance_student_status where clearance_requirement_id = '$req_id' and student_id = '$verified_session_username' LIMIT 1";
                if($result1 = mysqli_query($link, $sql1)){
                  if(mysqli_num_rows($result1) > 0){
                    while($row1 = mysqli_fetch_array($result1)){
                      $path = 'uploads/' . $row1['file_link'];
                      if(unlink($path)){
                        $sql3 = "DELETE FROM clearance_student_status where clearance_requirement_id = '$req_id' and student_id = '$verified_session_username' LIMIT 1";
                        $result3 = mysqli_query($link,$sql3);
                        if(move_uploaded_file($fileTmpName, $fileDestination)){

                          $sql = "INSERT INTO clearance_student_status (clearance_requirement_id, location, student_id, status, clearance_department_id, file_link) VALUES ('$req_id', '$location', '$verified_session_username', '$status', '$id', '$fileNameNew')";
                          if (mysqli_query($link, $sql)) {
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
                                    title:"File upload success"
                                    }).then(function(){
                                      window.location = "clearance-status-read.php?id='.$id.'&name='.$name.'";//refresh pages
                                    });
                                </script>
                          ';
                          }else{
                          }
                        }
                      }
                    }
                  } else{
                  }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
              }else{
                if(move_uploaded_file($fileTmpName, $fileDestination)){

                  $sql = "INSERT INTO clearance_student_status (clearance_requirement_id, location, student_id, status, clearance_department_id, file_link) VALUES ('$req_id', '$location', '$verified_session_username', '$status', '$id', '$fileNameNew')";
                  if (mysqli_query($link, $sql)) {
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
                                title:"File upload success"
                                }).then(function(){
                                  window.location = "clearance-status-read.php?id='.$id.'&name='.$name.'";//refresh pages
                                });
                            </script>
                      ';
                      // header("Location: clearance-status-read.php?id=".$id."&name=".$name."");
                  }else{
                  }
                }
              }

            
            
          }else{
            echo "Your file is too big!"; 
          }
        }else{
          echo "There was an error uploading your file!";
        }
      }else{
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
                window.location = "clearance-status-upload.php?req_id='. $req_id .'&req_name='. $req_name .'&id='. $id .'&name='. $name .'";//refresh pages
              });
          </script>
      ';
      }
    }
?>
</body>

</html>