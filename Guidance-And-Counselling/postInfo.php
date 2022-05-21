
<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'include/external.php';
      include 'include/header.php';?>
</head>
    <!-- ======= Sidebar ======= -->
<?php include 'include/asideSidebar.php'; ?>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->

        <style>
            #ModalBody::-webkit-scrollbar
            {
               display: none;
            }

        </style>

    </head>

    <body style="background-image:url('Picture/back.jpg'); background-repeat: no-repeat;
    background-size: cover; background-attachment: fixed;

    ";>
       <?php include 'include/header.php'?>

          <?php include 'include/asideSidebar.php'; ?>

        <main id="main" class="main">
            <div class="pagetitle">
                <h1 class="layout">Posting</h1>
                    <nav>
                        <ol class="breadcrumb" style="background-color: transparent;">
                            <li class="breadcrumb-item"><a href="index.php?id=<?php echo $_SESSION['success'];?>">Home</a></li>
                            <li class="breadcrumb-item active">Posting</li>
                            <li class="breadcrumb-item active">Information</li>
                        </ol>
                    </nav>
            </div><!-- End Page Title -->
            <div class="form-row ">
              <div class="form-group col-sm-2" ></div>
              <div class="form-group col-sm-6">
                <div style="background-color: white;  border-radius: 6px; border: 5px solid whitesmoke; box-shadow: 2px 10px 5px 5px #77aac9;">
              <div style="padding: 10px;">
            <br>

            <br>
            <form method="POST" action="">
            <div class="form-row d-flex justify-content-center">
              <div class="form-group col-sm-10" >
                <h4 style="font-family:Lucida Console, Courier New monospace; color:#5e7bce;">
                  Create New Announcement
                </h4>
              </div>
            </div>


            <div class="form-row" >
              <div class="form-group col-sm-2" ></div>
                <div class="form-group col-sm-8" >
                    <label for="JPosting" style= "color:#5e7bce" >Title:</label>
                    <input  type="text" id="JPosting" required  name="titleAnnouncement"   placeholder="Input Title here" class="form-control animate__animated animate__pulse"  >
                </div>
              <div class="form-group col-sm-2" ></div>
            </div>

            <div class="form-row" >
              <div class="form-group col-sm-2" ></div>
                <div class="form-group col-sm-8" >
                    <label for="JPosting" style= "color:#5e7bce" >Start at:</label>
                    <input  type="datetime-local" id="JPosting" required  name="startAnnouncement"   placeholder="Input title here" class="form-control animate__animated animate__pulse"  >
                </div>
              <div class="form-group col-sm-2" ></div>
            </div>

            <div class="form-row" >
              <div class="form-group col-sm-2" ></div>
                <div class="form-group col-sm-8" >
                    <label for="JPosting" style= "color:#5e7bce" >End at:</label>
                    <input  type="datetime-local" id="JPosting" required  name="endAnnouncement"   placeholder="Input Job type here" class="form-control animate__animated animate__pulse"  >
                </div>
              <div class="form-group col-sm-2" ></div>
            </div>

            <div class="form-row" >
              <div class="form-group col-sm-2" ></div>
                <div class="form-group col-sm-8" >
                    <label for="JPosting" style= "color:#5e7bce" >Photo:</label>
                    <input  type="file" id="JPosting" required  name="photoAnnouncement"   placeholder="Input Work location here" class="form-control animate__animated animate__pulse"  >
                </div>
              <div class="form-group col-sm-2" ></div>
            </div>



            <div class="form-row" >
              <div class="form-group col-sm-2" ></div>
                <div class="form-group col-sm-8" >
                    <label for="JPosting" style= "color:#5e7bce" >Description:</label>
                    <textarea class="form-control"  id="JPosting" name="descriptionAnnouncement" id="exampleFormControlTextarea1" placeholder="Input Description here" rows="5"></textarea>
                </div>
              <div class="form-group col-sm-2" ></div>
            </div>



            <div class="form-row" >
              <div class="form-group col-sm-8" ></div>
                <div class="form-group col-sm-2" >
                    <button type="submit" class="btn btn-primary form-group" name="Submit_Information"
                    style="width: 100%; background-color:#2d8ae0;">Submit</button>
                </div>
              <div class="form-group col-sm-2" ></div>
            </div>

          </form>

          <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Submit_Information"]))
            {
              require_once 'localConfig.php';
              require_once 'SForms/timezone.php';
              $postInformation = $db->query('INSERT INTO gac_postinformation (Post_Title, Post_startAt, Post_endAt, post_Files, post_Description, about_post, created_at, updated_at)  VALUES (?,?,?,?, ?,?,?,?)',

              $_POST["titleAnnouncement"],
              $_POST["startAnnouncement"],
              $_POST["endAnnouncement"],
              $_POST["photoAnnouncement"],
              $_POST["descriptionAnnouncement"],

              "Informartion",

              $time, $time);

              if ($postInformation->affectedRows() == 1)
              {

              }
            }
           ?>


        </main>
          <!-- ======= Footer ======= -->
  <?php include 'include/footer.php';?>


  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

    </body>
</html>
