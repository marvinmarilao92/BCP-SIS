<?php
    include 'config.php';
      // Define variables and initialize with empty values
      $student_number = "";
      // personal information 
      $first_name = "";
      $last_name = "";
      $middle_name = "";
      $course = "";
      $gender = "";
      $birthday = "";
      $nationality = "";
      $religion = "";
      $civil_status = "";
      //address
      $street1 = "";
      $street2 = "";
      $city = "";
      $zipcode = "";
      $address = "";
      //contact number
      $email = "";
      $contact = "";
      
      // Processing form data when form is submitted
      if($_SERVER["REQUEST_METHOD"] == "POST"){

        date_default_timezone_set("asia/manila");
        $date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));
        $year = date("Y",strtotime("+0 HOURS"));
        $random_num= rand(10000000,99999999);
        $student_number =  $random_num;
        $account_status = "Active";

        $first_name = mysqli_real_escape_string($link,trim($_POST["first_name"]));
        $last_name = mysqli_real_escape_string($link,trim($_POST["last_name"]));
        $middle_name = mysqli_real_escape_string($link,trim($_POST["middle_name"]));
        $course = mysqli_real_escape_string($link,trim($_POST["course"]));
        $gender = mysqli_real_escape_string($link,trim($_POST["gender"]));
        $birthday = date('Y-m-d', strtotime(mysqli_real_escape_string($link,trim($_POST["birthdate"]))));
        $nationality = mysqli_real_escape_string($link,trim($_POST["nationality"]));
        $religion = mysqli_real_escape_string($link,trim($_POST["religion"]));
        $civil_status = mysqli_real_escape_string($link,trim($_POST["civil_status"]));
        
        
        $street1 = mysqli_real_escape_string($link,trim($_POST["add_st1"]));
        $street2 = mysqli_real_escape_string($link,trim($_POST["add_st2"]));
        $city = mysqli_real_escape_string($link,trim($_POST["city"]));
        $zipcode = mysqli_real_escape_string($link,trim($_POST["zip_code"]));
        $address = $street1." ".$street2." ".$city." ".$zipcode;

        $email = mysqli_real_escape_string($link,trim($_POST["email"]));
        $contact = mysqli_real_escape_string($link,trim($_POST["contact"]));
        
        //Check if the student number is not existing in the database
        $sql1 = "SELECT id FROM student_application WHERE id_number = '$student_number'";
        $result = mysqli_query($link,$sql1);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        
        // If the student number is not existing in the database, count must be 0
        if($count == 0) {
          // Prepare an insert statement
          $sql = "INSERT INTO student_application (id_number, firstname, lastname, middlename, email, contact, address, course, gender, birthday, nationality, religion, civil_status, account_status,stud_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

          if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "issssisssssssss", $student_number, $first_name, $last_name, $middle_name, $email, $contact, $address, $course, $gender, $birthday, $nationality, $religion, $civil_status, $account_status, $date);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
              // Records created successfully. Redirect to landing page
              header("location: online-enrollment.php");
              echo '<script type = "text/javascript">
              alert("Application Successfully Sublitted");
              window.open("online-enrollment.php","online-enrollment","width=500,height=200","position=center");
              </script>';

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            
          }

          // Close statement
          mysqli_stmt_close($stmt);

          // Close connection
          mysqli_close($link);

        }else {
          $student_number_err = "Student Number is already existing";
        }
      }

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- header -->
  <?php include ("includes/head.php");?>
</head>

<body>

  <main>
    <section class="section" style="padding:10px">
      <div class="row">
        <!-- List of requirements -->
        <div class="col-lg-4">
          <!-- Card with header and footer -->
            <div class="card">
              <div class="card-header"> 
                </div>
              <div class="card-body" style="color: black;">
              <br>
              <h5 style="margin-top: 10px; color:black;"><solid style="font-weight: bolder;">BCP Admission</solid> confirms that the student data below applied through online admission.
              </h5>
                <p style="margin-left: 30px;">Online application information <br>
                      <l>
                        <ol style="margin-left: 20px;">Student Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </ol>
                        <ol style="margin-left: 20px;">Date of Application :</ol>
                        <ol style="margin-left: 20px;">Application Code &nbsp;&nbsp;&nbsp;&nbsp;:</ol>
                      </l>  
                    </p>
                    <div class="col-12" style="text-align: center;">
                      <svg id="barcode"></svg>
                    </div>
                    <p>Take a screenshot of this confiramtion slip. Show this to the cashier to proceed and proceed to the next step</p>
              </div>
              <div class="card-footer">
              </div>
            </div>
          <!-- End Card with header and footer -->
        </div>
    </section>

  </main><!-- End #main -->

    <!-- Vendor JS Files -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/chart.js/chart.min.js"></script>
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/sweetalert2.min.js"></script>

     <!-- For barcode -->
     <!-- <script src="JsBarcode.all.min.js"></script> -->
     <script src="assets/vendor/bootstrap/js/JsBarcode.all.min.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script >
        JsBarcode("#barcode", "0928392732", {
          format: "CODE128",
          lineColor: "#000",
          width: 4,
          height: 120,
          textAlign: "center",
          displayValue: true
        });

    </script>

</body>

</html>