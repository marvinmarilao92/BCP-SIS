<?php
  include 'config.php';
    // Define variables and initialize with empty values
    $student_number = "";
    $first_name = "";
    $last_name = "";
    $middle_name = "";
    $course = "";
    $year_level = "";
    $section = "";
    $school_year = "";
 
    $street1 = "";
    $street2 = "";
    $city = "";
    $zipcode = "";
 
    $address = "";
    $email = "";
    $contact = "";
    $gender = "";
    $birthday = "";
    $nationality = "";
    $religion = "";
    $civil_status = "";


    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

      date_default_timezone_set("asia/manila");
      $date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));
      $year = date("Y",strtotime("+0 HOURS"));
      $random_num= rand(10000000,99999999);
      $student_number =  $year.$random_num;

      $first_name = mysqli_real_escape_string($link,trim($_POST["first_name"]));
      $last_name = mysqli_real_escape_string($link,trim($_POST["last_name"]));
      $middle_name = mysqli_real_escape_string($link,trim($_POST["middle_name"]));
      $course = mysqli_real_escape_string($link,trim($_POST["course"]));
      
      $street1 = mysqli_real_escape_string($link,trim($_POST["add_st1"]));
      $street2 = mysqli_real_escape_string($link,trim($_POST["add_st2"]));
      $city = mysqli_real_escape_string($link,trim($_POST["city"]));
      $zipcode = mysqli_real_escape_string($link,trim($_POST["zip_code"]));

      $address = $street1." ".$street2." ".$city." ".$zipcode;
      $email = mysqli_real_escape_string($link,trim($_POST["email"]));
      $contact = mysqli_real_escape_string($link,trim($_POST["contact"]));
      $gender = mysqli_real_escape_string($link,trim($_POST["gender"]));
      $birthday = date('Y-m-d', strtotime(mysqli_real_escape_string($link,trim($_POST["birthdate"]))));
      $nationality = mysqli_real_escape_string($link,trim($_POST["nationality"]));
      $religion = mysqli_real_escape_string($link,trim($_POST["religion"]));
      $civil_status = mysqli_real_escape_string($link,trim($_POST["civil_status"]));
      $account_status = "Active";
      $password = "#ChangeMe01!";

      //Check if the student number is not existing in the database
      $sql1 = "SELECT id FROM student_information WHERE id_number = '$student_number'";
      $result = mysqli_query($link,$sql1);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      
      //Check if the student number is not existing in the database
      $sql2 = "SELECT id FROM users WHERE id_number = '$student_number'";
      $result2 = mysqli_query($link,$sql2);
      $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
      $count2 = mysqli_num_rows($result2);
      
      // If the student number is not existing in the database, count must be 0
      if($count == 0 && $count2 == 0) {
        // Prepare an insert statement
        $sql = "INSERT INTO student_information (id_number, firstname, lastname, middlename, email, contact, address, course, year_level,section,school_year, gender, birthday, nationality, religion, civil_status, account_status,stud_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "issssissssssssssss", $student_number, $first_name, $last_name, $middle_name, $email, $contact, $address, $course,$year_level, $section, $school_year, $gender, $birthday, $nationality, $religion, $civil_status, $account_status, $date);

          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
            //Create user account
            $sql = "INSERT INTO users (id_number, password) VALUES (?, ?)";

            if($stmt1 = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt1, "ss", $student_number, $password);

              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt1)){
                  // Records created successfully. Redirect to landing page
                  header("location: online-enrollment.php");
                  echo '<script type = "text/javascript">
                  alert("Application Successfully Sublitted");
                  window.location = "online-enrollment.php";
                  </script>';
                  exit();
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
            }
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
  <?php include ("includes/head.php");?>
 
</head>
<body>
  <?php include ("includes/nav2.php");?>
  <main>
    <div class="container">

    <section class="section" style="margin-top: 80px;">
      <div class="row">
        <div class="col-lg-16">
          <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <h4 class="alert-heading"><solid>Requirements</solid>
            <h5>Admission Requirements for College</h5></h4>
            <p> <hr>
            Original Copy of the following documents: <br> <br>
            <ul>
              <li>Form 138 (Report Card)</li>
              <li>Form 137</li>
              <li>Certificate of Good Moral</li>
              <li>PSA Authenticated Birth Certificate</li>
              <li>Passport Size ID Picture (White Background, Formal Attire) - 2pcs</li>
              <li>Barangay Clearance</li>
            </ul>  
            </p>
            <hr>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>  
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="card">
              <div class="card-body">
              <h5 class="card-title">FILL OUT THE FOLLOWING</h5>
                  <!-- Default Accordion -->
                  <div class="accordion" id="accordionExample" style="padding: 1px;">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" disabled>
                        <div class="icon">
                          <i class="bi bi-person-lines-fill me-1"></i>
                          Personal Information
                        </div>
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body row g-3">
                          <!-- General Form Elements -->
                            <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" Required>
                                <label for="floatingName">First Name</label>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-floating">
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" Required>
                                <label for="floatingName">Last Name</label>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-floating">
                                <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="middle name" Required>
                                <label for="floatingName">Middle Name (Optional)</label>
                              </div>
                            </div>                        
                            <div class="col-md-12">
                              <div class="form-floating">
                                <input type="Date" class="form-control" name="birthdate" id="birthdate" placeholder="birthday" Required>
                                <label for="floatingName">Birthdate</label>
                              </div>
                            </div>     
                            <div class="col-md-12">
                              <div class="form-floating">
                                <select class="form-select" name="gender" id="gender" aria-label="State" Required>
                                  <option value="" selected="selected" disabled="disabled">Select Gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                                <label for="floatingSelect">Gender</label>
                              </div>
                            </div>                     
                            <div class="col-md-12">
                              <div class="form-floating">
                                <select class="form-select" name="course" id="course" aria-label="State" Required>
                                  <option value="" selected="selected" disabled="disabled">Select Course</option>
                                  <option value="BS Information Technology">BS Information Technology</option>
                                  <option value="BS Hospitality Management">BS Hospitality Management</option>
                                  <option value="BS Office Administration">BS Office Administration</option>
                                  <option value="BS Business Administration Major in Human Resource Management">BS Business Administration Major in Human Resource Management</option>
                                  <option value="BS Business Administration Major in Marketing">BS Business Administration Major in Marketing</option>
                                  <option value="BS Criminology">BS Criminology</option>
                                  <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
                                  <option value="Bachelor of Secondary Education Major in English">Bachelor of Secondary Education Major in English</option>
                                  <option value="Bachelor of Secondary Education Major in Filipino">Bachelor of Secondary Education Major in Filipino</option>
                                  <option value="Bachelor of Secondary Education Major in Mathematics">Bachelor of Secondary Education Major in Mathematics</option>
                                  <option value="Bachelor of Secondary Education Major in Social Studies">Bachelor of Secondary Education Major in Social Studies</option>
                                  <option value="Bachelor of Secondary Education Major in Values Education">Bachelor of Secondary Education Major in Values Education</option>
                                  <option value="Bachelor of Secondary Education Major in Technology and Livelihood Education">Bachelor of Secondary Education Major in Technology and Livelihood Education</option>
                                  <option value="BS Computer Engineering">BS Computer Engineering</option>
                                  <option value="Bachelor of Library in Information Science">Bachelor of Library in Information Science</option>
                                  <option value="BS Tourism Management">BS Tourism Management</option>
                                  <option value="BS Entrepreneurship">BS Entrepreneurship</option>
                                  <option value="BS Accounting Information System">BS Accounting Information System</option>
                                  <option value="BS Psychology">BS Psychology</option>
                                </select>
                                <label for="floatingSelect">College Program</label>
                              </div>
                            </div>   
                            <div class="col-md-12">
                              <div class="form-floating">
                                <select class="form-select" name="nationality" id="nationality" aria-label="State" Required>
                                  <option value="" disabled="disabled">Select Nationality</option>
                                  <option value="afghan">Afghan</option>
                                  <option value="albanian">Albanian</option>
                                  <option value="algerian">Algerian</option>
                                  <option value="american">American</option>
                                  <option value="andorran">Andorran</option>
                                  <option value="angolan">Angolan</option>
                                  <option value="antiguans">Antiguans</option>
                                  <option value="argentinean">Argentinean</option>
                                  <option value="armenian">Armenian</option>
                                  <option value="australian">Australian</option>
                                  <option value="austrian">Austrian</option>
                                  <option value="azerbaijani">Azerbaijani</option>
                                  <option value="bahamian">Bahamian</option>
                                  <option value="bahraini">Bahraini</option>
                                  <option value="bangladeshi">Bangladeshi</option>
                                  <option value="barbadian">Barbadian</option>
                                  <option value="barbudans">Barbudans</option>
                                  <option value="batswana">Batswana</option>
                                  <option value="belarusian">Belarusian</option>
                                  <option value="belgian">Belgian</option>
                                  <option value="belizean">Belizean</option>
                                  <option value="beninese">Beninese</option>
                                  <option value="bhutanese">Bhutanese</option>
                                  <option value="bolivian">Bolivian</option>
                                  <option value="bosnian">Bosnian</option>
                                  <option value="brazilian">Brazilian</option>
                                  <option value="british">British</option>
                                  <option value="bruneian">Bruneian</option>
                                  <option value="bulgarian">Bulgarian</option>
                                  <option value="burkinabe">Burkinabe</option>
                                  <option value="burmese">Burmese</option>
                                  <option value="burundian">Burundian</option>
                                  <option value="cambodian">Cambodian</option>
                                  <option value="cameroonian">Cameroonian</option>
                                  <option value="canadian">Canadian</option>
                                  <option value="cape verdean">Cape Verdean</option>
                                  <option value="central african">Central African</option>
                                  <option value="chadian">Chadian</option>
                                  <option value="chilean">Chilean</option>
                                  <option value="chinese">Chinese</option>
                                  <option value="colombian">Colombian</option>
                                  <option value="comoran">Comoran</option>
                                  <option value="congolese">Congolese</option>
                                  <option value="costa rican">Costa Rican</option>
                                  <option value="croatian">Croatian</option>
                                  <option value="cuban">Cuban</option>
                                  <option value="cypriot">Cypriot</option>
                                  <option value="czech">Czech</option>
                                  <option value="danish">Danish</option>
                                  <option value="djibouti">Djibouti</option>
                                  <option value="dominican">Dominican</option>
                                  <option value="dutch">Dutch</option>
                                  <option value="east timorese">East Timorese</option>
                                  <option value="ecuadorean">Ecuadorean</option>
                                  <option value="egyptian">Egyptian</option>
                                  <option value="emirian">Emirian</option>
                                  <option value="equatorial guinean">Equatorial Guinean</option>
                                  <option value="eritrean">Eritrean</option>
                                  <option value="estonian">Estonian</option>
                                  <option value="ethiopian">Ethiopian</option>
                                  <option value="fijian">Fijian</option>
                                  <option value="filipino">Filipino</option>
                                  <option value="finnish">Finnish</option>
                                  <option value="french">French</option>
                                  <option value="gabonese">Gabonese</option>
                                  <option value="gambian">Gambian</option>
                                  <option value="georgian">Georgian</option>
                                  <option value="german">German</option>
                                  <option value="ghanaian">Ghanaian</option>
                                  <option value="greek">Greek</option>
                                  <option value="grenadian">Grenadian</option>
                                  <option value="guatemalan">Guatemalan</option>
                                  <option value="guinea-bissauan">Guinea-Bissauan</option>
                                  <option value="guinean">Guinean</option>
                                  <option value="guyanese">Guyanese</option>
                                  <option value="haitian">Haitian</option>
                                  <option value="herzegovinian">Herzegovinian</option>
                                  <option value="honduran">Honduran</option>
                                  <option value="hungarian">Hungarian</option>
                                  <option value="icelander">Icelander</option>
                                  <option value="indian">Indian</option>
                                  <option value="indonesian">Indonesian</option>
                                  <option value="iranian">Iranian</option>
                                  <option value="iraqi">Iraqi</option>
                                  <option value="irish">Irish</option>
                                  <option value="israeli">Israeli</option>
                                  <option value="italian">Italian</option>
                                  <option value="ivorian">Ivorian</option>
                                  <option value="jamaican">Jamaican</option>
                                  <option value="japanese">Japanese</option>
                                  <option value="jordanian">Jordanian</option>
                                  <option value="kazakhstani">Kazakhstani</option>
                                  <option value="kenyan">Kenyan</option>
                                  <option value="kittian and nevisian">Kittian and Nevisian</option>
                                  <option value="kuwaiti">Kuwaiti</option>
                                  <option value="kyrgyz">Kyrgyz</option>
                                  <option value="laotian">Laotian</option>
                                  <option value="latvian">Latvian</option>
                                  <option value="lebanese">Lebanese</option>
                                  <option value="liberian">Liberian</option>
                                  <option value="libyan">Libyan</option>
                                  <option value="liechtensteiner">Liechtensteiner</option>
                                  <option value="lithuanian">Lithuanian</option>
                                  <option value="luxembourger">Luxembourger</option>
                                  <option value="macedonian">Macedonian</option>
                                  <option value="malagasy">Malagasy</option>
                                  <option value="malawian">Malawian</option>
                                  <option value="malaysian">Malaysian</option>
                                  <option value="maldivan">Maldivan</option>
                                  <option value="malian">Malian</option>
                                  <option value="maltese">Maltese</option>
                                  <option value="marshallese">Marshallese</option>
                                  <option value="mauritanian">Mauritanian</option>
                                  <option value="mauritian">Mauritian</option>
                                  <option value="mexican">Mexican</option>
                                  <option value="micronesian">Micronesian</option>
                                  <option value="moldovan">Moldovan</option>
                                  <option value="monacan">Monacan</option>
                                  <option value="mongolian">Mongolian</option>
                                  <option value="moroccan">Moroccan</option>
                                  <option value="mosotho">Mosotho</option>
                                  <option value="motswana">Motswana</option>
                                  <option value="mozambican">Mozambican</option>
                                  <option value="namibian">Namibian</option>
                                  <option value="nauruan">Nauruan</option>
                                  <option value="nepalese">Nepalese</option>
                                  <option value="new zealander">New Zealander</option>
                                  <option value="ni-vanuatu">Ni-Vanuatu</option>
                                  <option value="nicaraguan">Nicaraguan</option>
                                  <option value="nigerien">Nigerien</option>
                                  <option value="north korean">North Korean</option>
                                  <option value="northern irish">Northern Irish</option>
                                  <option value="norwegian">Norwegian</option>
                                  <option value="omani">Omani</option>
                                  <option value="pakistani">Pakistani</option>
                                  <option value="palauan">Palauan</option>
                                  <option value="panamanian">Panamanian</option>
                                  <option value="papua new guinean">Papua New Guinean</option>
                                  <option value="paraguayan">Paraguayan</option>
                                  <option value="peruvian">Peruvian</option>
                                  <option value="philippines" selected="selected">Philippines</option>
                                  <option value="polish">Polish</option>
                                  <option value="portuguese">Portuguese</option>
                                  <option value="qatari">Qatari</option>
                                  <option value="romanian">Romanian</option>
                                  <option value="russian">Russian</option>
                                  <option value="rwandan">Rwandan</option>
                                  <option value="saint lucian">Saint Lucian</option>
                                  <option value="salvadoran">Salvadoran</option>
                                  <option value="samoan">Samoan</option>
                                  <option value="san marinese">San Marinese</option>
                                  <option value="sao tomean">Sao Tomean</option>
                                  <option value="saudi">Saudi</option>
                                  <option value="scottish">Scottish</option>
                                  <option value="senegalese">Senegalese</option>
                                  <option value="serbian">Serbian</option>
                                  <option value="seychellois">Seychellois</option>
                                  <option value="sierra leonean">Sierra Leonean</option>
                                  <option value="singaporean">Singaporean</option>
                                  <option value="slovakian">Slovakian</option>
                                  <option value="slovenian">Slovenian</option>
                                  <option value="solomon islander">Solomon Islander</option>
                                  <option value="somali">Somali</option>
                                  <option value="south african">South African</option>
                                  <option value="south korean">South Korean</option>
                                  <option value="spanish">Spanish</option>
                                  <option value="sri lankan">Sri Lankan</option>
                                  <option value="sudanese">Sudanese</option>
                                  <option value="surinamer">Surinamer</option>
                                  <option value="swazi">Swazi</option>
                                  <option value="swedish">Swedish</option>
                                  <option value="swiss">Swiss</option>
                                  <option value="syrian">Syrian</option>
                                  <option value="taiwanese">Taiwanese</option>
                                  <option value="tajik">Tajik</option>
                                  <option value="tanzanian">Tanzanian</option>
                                  <option value="thai">Thai</option>
                                  <option value="togolese">Togolese</option>
                                  <option value="tongan">Tongan</option>
                                  <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                                  <option value="tunisian">Tunisian</option>
                                  <option value="turkish">Turkish</option>
                                  <option value="tuvaluan">Tuvaluan</option>
                                  <option value="ugandan">Ugandan</option>
                                  <option value="ukrainian">Ukrainian</option>
                                  <option value="uruguayan">Uruguayan</option>
                                  <option value="uzbekistani">Uzbekistani</option>
                                  <option value="venezuelan">Venezuelan</option>
                                  <option value="vietnamese">Vietnamese</option>
                                  <option value="welsh">Welsh</option>
                                  <option value="yemenite">Yemenite</option>
                                  <option value="zambian">Zambian</option>
                                  <option value="zimbabwean">Zimbabwean</option>
                                </select>
                                <label for="floatingSelect">Nationality</label>
                              </div>
                            </div>  
                            <div class="col-md-12">
                              <div class="form-floating">
                                <select class="form-select" name="religion" id="religion" aria-label="State" Required>
                                  <option value="" selected="selected" disabled="disabled">Select Religion</option>
                                  <option value="African Traditional &amp; Diasporic">African Traditional &amp; Diasporic</option>
                                  <option value="Agnostic">Agnostic</option>
                                  <option value="Atheist">Atheist</option>
                                  <option value="Baha'i">Baha'i</option>
                                  <option value="Buddhism">Buddhism</option>
                                  <option value="Cao Dai">Cao Dai</option>
                                  <option value="Chinese traditional religion">Chinese traditional religion</option>
                                  <option value="Christianity">Christianity</option>
                                  <option value="Hinduism">Hinduism</option>
                                  <option value="INC">Islam</option>
                                  <option value="Islam">Islam</option>
                                  <option value="Jainism">Jainism</option>
                                  <option value="Juche">Juche</option>
                                  <option value="Judaism">Judaism</option>
                                  <option value="Neo-Paganism">Neo-Paganism</option>
                                  <option value="Nonreligious">Nonreligious</option>
                                  <option value="Rastafarianism">Rastafarianism</option>
                                  <option value="Roman Catholic">Roman Catholic</option>
                                  <option value="Secular">Secular</option>
                                  <option value="Shinto">Shinto</option>
                                  <option value="Sikhism">Sikhism</option>
                                  <option value="Spiritism">Spiritism</option>
                                  <option value="Tenrikyo">Tenrikyo</option>
                                  <option value="Unitarian-Universalism">Unitarian-Universalism</option>
                                  <option value="Zoroastrianism">Zoroastrianism</option>
                                  <option value="primal-indigenous">primal-indigenous</option>
                                  <option value="Other">Other</option>
                                </select>
                                <label for="floatingSelect">Religion</label>
                              </div>
                            </div>  
                            <div class="col-md-12">
                              <div class="form-floating">
                                <select class="form-select" name="civil_status" id="civil_status" aria-label="State">
                                  <option value="" selected="selected" disabled="disabled">Select Civil Status</option>
                                  <option value="Single">Single</option>
                                  <option value="Married">Married</option>
                                  <option value="Divorced">Divorced</option>
                                  <option value="Widowed">Widowed</option>
                                </select>
                                <label for="floatingSelect">Civil Status</label>
                              </div>
                            </div>                         
                            <div class="text-right">                            
                              <button class="btn btn-primary collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" >NEXT</button>
                              <a class="btn btn-light" href="../SIS_LandingPage/index.php">CANCEL</a>
                            </div>
                        </button>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" disabled>
                        <div class="icon">
                          <i class="bi bi-geo-alt-fill me-1"></i>
                          Address
                        </div>
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <div class="col-12">
                        <!-- Multi Columns Address Form -->
                          <div class="row g-3">
                            <div class="col-md-12">
                              <div class="form-floating">
                                <input type="text" class="form-control" name="add_st1" id="add_st1" placeholder="Your Name">
                                <label for="floatingName">Street Address</label>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-floating">
                                <input type="text" class="form-control" name="add_st2" id="add_st2" placeholder="Your Name">
                                <label for="floatingName">Street Address Line 2 (Optional)</label>
                              </div>
                            </div>
                            <div class="col-md-8">
                              <div class="form-floating">
                                <input type="text" class="form-control" name="city" id="city" placeholder="Your Name">
                                <label for="floatingName">City</label>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-floating">
                                <input type="text" class="form-control" name="zip_code" id="zip_code" placeholder="Your Name">
                                <label for="floatingName">Zip code</label>
                              </div>
                              <a class="btn btn-light rounded-pill" href="https://zip-codes.philsite.net/" style="float: right; color:blue; margin-top:5px;" target="_blank">List of Zip Code</a>
                            </div>                          
                            <div class="text-right">                            
                              <a type="reset" class="btn btn-primary collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">NEXT</a>
                              <a class="btn btn-light collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">PREVIOUS</a>
                            </div>
                          </div><!-- End Multi Columns Form -->
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" disabled> 
                        <div class="icon">
                          <i class="bi bi-telephone-fill me-1"></i>
                          Contact Information
                        </div>                   
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body row g-3">
                          <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-circle-fill me-1"></i>
                            Please input your active contact number and email address. BCP will use these means to communicate the status of your application.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                          <div class="col-md-12">
                          <div class="form-floating">
                                <input type="text" class="form-control" name="contact" id="floatingName" placeholder="number">
                                <label for="floatingName">Contact Number</label>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-floating">
                                <input type="email" class="form-control" name="email" id="floatingName" placeholder="Email">
                                <label for="floatingName">Email Address (It should be active)</label>
                              </div>
                            </div>
                          <div class="text-right">                            
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <!-- <a type="submit" class="btn btn-primary collapsed">Submit</a> -->
                              <a class="btn btn-light collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">PREVIOUS</a>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div><!-- End Default Accordion Example -->
              </div>
              </div>
            </div>
          </form>
      </div>
    </section>
    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
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