<?php
  include_once('security/newsource.php');
?>

<!DOCTYPE html>
<html lang="en">
<title>Account</title>
<head>
  <?php include ('includes/head_ext.php');?>
<style>

img {
  display: block;
  max-width: 100%;
}

.preview {
    overflow: hidden;
    width: 160px; 
    height: 160px;
    margin: 10px;
    border: 1px solid red;
}

.modal-lg {
  max-width: 1000px !important;
}

</style>

</head>

<body>

  <?php $page = "Profile"?>
  <?php include ('includes/header.php');?>
  <?php include ('includes/sidebar.php');?>

<?php

  // @desc	display image profile
  // @access Public
  // @returns string


?>

  <main id="main" class="main">
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
    <?php
      if(isset($_SESSION['alert'])) 
      {
        ?>
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong><?php echo $_SESSION['alert'];?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        <?php

        unset($_SESSION['alert']);
      }
      ?>
    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <?php 
                  if($verified_session_img > 0 ){
                    echo '<img src="../../assets/users/' .$verified_session_img. '" alt="Profile" class="rounded-circle m-2 w-100 h-100">';
                  } else {
                    echo '<img src="../../assets/users/person-circle.svg" alt="Profile" class="rounded-circle m-2 w-100 h-100">';
                  }
              ?>
              <h2><?php echo $verified_session_firstname . ", " . $verified_session_lastname ?></h2>
              <small><?php echo $verified_session_role?></small>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic"><?php echo $verified_session_about?>.</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $verified_session_firstname . " " . $verified_session_lastname ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Company</div>
                    <div class="col-lg-9 col-md-8">Bestlink College of The Philippines</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Department</div>
                    <div class="col-lg-9 col-md-8"><?php echo $verified_session_office?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Subsystem</div>
                    <div class="col-lg-9 col-md-8"><?php echo $verified_session_department?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Position</div>
                    <div class="col-lg-9 col-md-8"><?php echo $verified_session_role?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $verified_session_address?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Contact Number</div>
                    <div class="col-lg-9 col-md-8"><?php echo $verified_session_contact?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $verified_session_email?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <?php 
                          if($verified_session_img > 0 ){
                          echo '<img src="../../assets/users/' .$verified_session_img. '" alt="Profile" class="rounded-circle m-2 w-25 h-25">';
                        } else {
                          echo '<img src="../../assets/users/person-circle.svg" alt="Profile" class="rounded-circle m-2 w-25 h-25">';
                        }
                      ?>
                      <div class="col-md-8">
                        <div class="d-flex flex-row align-items-center justify-content-center">
                          <label for="upload_image"><a class = "bi bi-arrow-up btn btn-primary btn-sm m-2" ></a></label>
                          <input type="file" name="crop_image" class="crop_image" accept="image/png" id="upload_image" style = "display:none;">
                          <a href="resources/profileimg_delete.php" class="btn btn-danger btn-sm m-2" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>
                  </form>

                  <form action="profile_update.php" method = "POST" >
                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px"><?php echo $verified_session_about?>.</textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="office" class="col-md-4 col-lg-3 col-form-label">Department</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="office" type="text" class="form-control" id="company" value="<?php echo $verified_session_office?>" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="dept" class="col-md-4 col-lg-3 col-form-label">Subsystem</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="dept" type="text" class="form-control" id="dept" value="<?php echo $verified_session_department?>" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="role" class="col-md-4 col-lg-3 col-form-label">Position</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="role" type="text" class="form-control" id="role" value="<?php echo $verified_session_role?>" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="address" value="<?php echo $verified_session_address?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Contact Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="phone" value="<?php echo $verified_session_contact?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email" value="<?php echo $verified_session_email?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <a class="btn btn-primary" onclick="updateProfile();" id = "updateProfile">Save Changes</a>
                    </div><!-- End Profile Edit Form -->
                  </form>
                  
                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->


              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
      <div class="modal fade" id="modal_crop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-primary ">
              <h5 class="modal-title text-light" id="exampleModalLabel">Crop Image</h5>
              <button type="button" class="btn-close bg-light" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="img-container">
                <div class="row">
                  <div class="col-md-8">
                      <img src="" id="sample_image" />
                  </div>
                  <div class="col-md-4">
                      <div class="preview"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="crop_and_upload" class="btn btn-primary">Crop</button>
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
</section>

  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <?php include('includes/footer.php'); ?>
  <script>
   
   $(document).ready(function(){
    var $modal = $('#modal_crop');
    var crop_image = document.getElementById('sample_image'); 
    
        $('#upload_image').change(function(event){
          

          var files = event.target.files;
          var done = function(url) {
          crop_image.src = url;
          $modal.modal('show');
                      
          };

          if(files && files.length > 0){

            reader=new FileReader();
            reader.onload = function(event)
            {
              done (reader.result);
            };
            reader.readAsDataURL (files[0]);
          }

        });
        $modal.on('shown.bs.modal', function(){
              cropper=new Cropper(crop_image,{
                  aspectRatio: 1,
                  viewMode: 3,
                  preview:'.preview'
              });
          }).on('hidden.bs.modal', function(){
              cropper.destroy();
              cropper = null;
          });

        $('#crop_and_upload').click(function(){
          canvas = cropper.getCroppedCanvas ({
              width:400,
              height:400
          });
          canvas.toBlob(function(blob){
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function(){
                var base64data = reader.result; 
                $.ajax({
                  url:'profileIMG_upload.php',
                  method: 'POST',
                  data:{crop_image:base64data},
                  success:function(data)
                  {
                    Swal.fire({
                      allowOutsideClick: true,
                      icon: 'success',
                      title: 'Profile Picture Updated',
                      showConfirmButton: true,
                    }).then((result) => {
                      if (result.isConfirmed) {
                      $modal.modal('hide');
                      location.reload();
                    }
                  })
                }
              });
            };
          });
        }); 
    });
</script>




  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->

</body>

</html>