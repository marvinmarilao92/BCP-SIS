<?php
      include 'config.php';
      session_start();
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
          $date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
          $year = date("Y",strtotime("+0 HOURS"));
          $random_num= rand(10000000,99999999);
          $student_number =  $random_num;
          $account_status = "Unpaid";

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
              mysqli_stmt_bind_param($stmt, "sssssssssssssss", $student_number, $first_name, $last_name, $middle_name, $email, $contact, $address, $course, $gender, $birthday, $nationality, $religion, $civil_status, $account_status, $date);

              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                $_SESSION['session_code'] = $student_number;
                header("location: application-barcode.php");

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

    <?php include ("includes/nav2.php");?>
    <main>

      <div class="pagetitle" style="padding: 10px;">
        <h1>Blank Page</h1>
        <nav>
          <ol class="breadcrumb">
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section" style="margin-left: 20px; margin-right: 20px;">
        <div class="row">
           <!-- Admission Form -->
           <div class="col-lg-8">
            <form class="card" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="card-body">
                  <h5 class="card-title">FILL OUT THE FOLLOWING
                  <div class="progress mt-3" style="height: 30px;">
                      <div class="progress-bar progress-bar-striped bg-primary progress-bar-animated"  id="progress" role="progressbar" style="width: 0%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><h5 id="percent"></h5></div>
                    </div>
                  </h5>
                  
                    <!-- fill out form Accordion -->
                    <div class="accordion" id="accordionExample" style="padding: 1px;">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                          <!-- first accordion button  -->
                          <a class="accordion-button" id="accordion1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"  aria-expanded="true" aria-controls="collapseOne" style="pointer-events: none;">
                            <div class="icon" >
                              <h6 id="text1" style="color: rgb(1, 41, 112); font-weight: bold;"><i class="" id="icon1"></i>Personal Information</h6>
                            </div>
                          </a>
                          <!-- End of button -->
                        </h2>
                        <!-- first part of fill out form -->
                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"     data-bs-parent="#accordionExample">
                            <div class="accordion-body row g-3">
                              <!-- General Form Elements -->
                              <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="first_name" id="first_name" onkeypress="return isTextKey(event)" placeholder="first name" Required onchange="oncollapse()">
                                    <label for="floatingName">First Name</label>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" name="last_name" id="last_name" onkeypress="return isTextKey(event)" placeholder="last name" Required onchange="oncollapse()">
                                    <label for="floatingName">Last Name</label>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" name="middle_name" id="middle_name"  onkeypress="return isTextKey(event)" placeholder="middle name" onchange="oncollapse()">
                                    <label for="floatingName">Middle Name</label>
                                  </div>
                                </div>                        
                                <div class="col-md-12">
                                  <div class="form-floating">
                                    <input type="Date" class="form-control" name="birthdate" id="birthdate" placeholder="birthday" Required onchange="oncollapse()">
                                    <label for="floatingName">Birthdate</label>
                                  </div>
                                </div>     
                                <div class="col-md-12">
                                  <div class="form-floating">
                                    <select class="form-select" name="gender" id="gender" aria-label="State" Required onchange="oncollapse()">
                                      <option value="" selected="selected" disabled="disabled">Select Gender</option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                    </select>
                                    <label for="floatingSelect">Gender</label>
                                  </div>
                                </div>                     
                                <div class="col-md-12">
                                  <div class="form-floating">
                                    <select class="form-select" name="course" id="course" aria-label="State" Required onchange="oncollapse()">
                                      <option value="#" selected="selected" disabled="disabled">Select Course</option>
                                      <?php
                                        // Include config file
                                        require_once "config.php";
                                        // Attempt select query execution
                                        $sql2 = "SELECT * FROM datms_program ORDER BY date desc ";
                                        if($result2 = mysqli_query($link, $sql2)){
                                          if(mysqli_num_rows($result2) > 0){
                                            while($row2 = mysqli_fetch_array($result2)){
                                              echo '<option value = "' . $row2["p_code"] . '">' . $row2["p_name"] . '</option>';
                                            }
                                            // Free result set
                                            mysqli_free_result($result2);
                                          }
                                        }
                                    ?>                                          
                                    </select>
                                    <label for="floatingSelect">College Program</label>
                                  </div>
                                </div>   
                                <div class="col-md-12">
                                  <div class="form-floating">
                                    <select class="form-select" name="nationality" id="nationality" aria-label="State" Required onchange="oncollapse()">
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
                                    <select class="form-select" name="religion" id="religion" aria-label="State" onchange="oncollapse()">
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
                                    <select class="form-select" name="civil_status" id="civil_status" aria-label="State" Required onchange="oncollapse()">
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
                                  <a class="btn btn-primary collapsed" type="button" id="next" onclick="nextFunction()" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="margin-top: 10px;">NEXT</a>           
                                  <a class="btn btn-light" href="../index.php " style="margin-top: 10px;">CANCEL</a>                       
                                  </div>
                                </button>
                            </div>
                          </div>            
                        <!-- end of first part  -->
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                          <!-- second accordion button  -->
                          <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="pointer-events: none;">
                            <div class="icon">
                              <h6 id="text2" style="color: rgb(1, 41, 112); font-weight: bold;"><i class="" id="icon2"></i>Address</h6>
                            </div>
                          </a>
                          <!-- End of button -->
                        </h2>
                        <!-- second part of fill out form -->                      
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <div class="col-12">
                            <!-- Multi Columns Address Form -->
                              <div class="row g-3">
                                <div class="col-md-12">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" name="add_st1" id="add_st1"  placeholder="Your Name" required onchange="oncollapse1()">
                                    <label for="floatingName">Street Address</label>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" name="add_st2" id="add_st2"  placeholder="Your Name" onchange="oncollapse1()">
                                    <label for="floatingName">Street Address Line 2</label>
                                  </div>
                                </div>
                                <div class="col-md-8">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" name="city" id="city"  placeholder="Your Name" required onchange="oncollapse1()">
                                    <label for="floatingName">City</label>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" name="zip_code" id="zip_code"  placeholder="Your Name" required onchange="oncollapse1()">
                                    <label for="floatingName">Zip code</label>
                                  </div>                            
                                </div>                          
                                <div class="text-right">                            
                                  <a type="reset" class="btn btn-primary collapsed" id="next2" onclick="next2Function()" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">NEXT</a>
                                  <a class="btn btn-light collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" onclick="prev()">PREVIOUS</a>
                                  <a class="btn btn-light rounded-pill" href="https://zip-codes.philsite.net/" style="float: right; color:blue;" target="_blank">List of Zip Code</a>
                                  
                                </div>
                              </div><!-- End Multi Columns Form -->
                            </div>
                            </div>
                          </div>          
                        <!-- end of second part  -->
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                          <!-- third accordion button  -->
                          <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="pointer-events: none;"> 
                            <div class="icon">
                              <h6 id="text3" style="color: rgb(1, 41, 112); font-weight: bold;"><i class="" id="icon3"></i>Contact Infomration</h6>
                            </div>                   
                          </a>
                          <!-- End of button -->
                        </h2>
                        <!-- third part of fill out form -->                        
                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body row g-3">
                              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-circle-fill me-2"></i>
                                Please input your active contact number and email address. BCP will use these means to communicate the status of your application.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                              <div class="col-md-12">
                                <div class="form-floating">
                                  <input type="text" class="form-control" name="contact" id="contact" placeholder="number" onChange="oncollapse2()"  onkeypress="return isNumberKey(event)" maxlength="11" minlength="11" required>
                                  <label for="floatingName">Contact Number</label>
                                </div>
                              </div>
                                <div class="col-md-12">
                                  <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" onChange="oncollapse2()" required>
                                    <label for="floatingName" required >Email Address</label>
                                  </div>
                                </div>
                              <div class="text-right">                            
                                  <button type="submit" class="btn btn-primary" onclick="next3Function()">Submit</button>
                                  <!-- <a type="submit" class="btn btn-primary collapsed">Submit</a> -->
                                  <a class="btn btn-light collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" onclick="prev1()">PREVIOUS</a>
                                
                                </div>
                            </div>
                          </div>                
                        <!-- end of third part  -->
                      </div>
                      </div>
                    </div>
                    <!-- End fill out form Accordion -->
                </div>
            </form>
          </div>
          <!-- List of requirements -->
          <div class="col-lg-4">
            <!-- Card with header and footer -->
              <div class="card">
                <div class="card-header"> 
                    <h3 style="margin-top: 10px; color:rgb(1, 55, 150);"><solid>Requirements</solid>
                    <h5 style="color: rgb(1, 55, 150);">Admission Requirements for College</h5></h3>
                  </div>
                <div class="card-body" style="color: black;">
                <br>
                  <p>Original Copy of the following documents: <br>
                        <ul>
                          <li>Form 138 (Report Card)</li>
                          <li>Form 137</li>
                          <li>Certificate of Good Moral</li>
                          <li>PSA Authenticated Birth Certificate</li>
                          <li>Passport Size ID Picture (White Background, Formal Attire) - 2pcs</li>
                          <li>Barangay Clearance</li>
                        </ul>  
                      </p>
                </div>
                <div class="card-footer">
                </div>
              </div>
            <!-- End Card with header and footer -->
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

      <!-- Template Main JS File -->
      <script src="../assets/js/main.js"></script>
      <script>
        //input text field
          const fname   =  document.querySelector("#first_name");
          const lname   =  document.querySelector("#last_name");
          const course   =  document.querySelector("#course");
          const agender   =  document.querySelector("#gender");
          const abirthdate   =  document.querySelector("#birthdate");
          const anationality   =  document.querySelector("#nationality");
          const areligion   =  document.querySelector("#religion");
          const acivil_status   =  document.querySelector("#civil_status");

          const astrt1   =  document.querySelector("#add_st1");
          const astrt2   =  document.querySelector("#add_st2");
          const acity   =  document.querySelector("#city");
          const azip  =  document.querySelector("#zip_code");

          const acpno   =  document.querySelector("#contact");
          const aemail   =  document.querySelector("#email");

        //first accordion button function 

        
        function prev() {
          document.getElementById("progress").style.width = "0%";
        }

        function prev1() {
          document.getElementById("progress").style.width = "35%";
        }

      

        //first accordion button function 
        function oncollapse() {
          let fname = first_name.value;
          let lname = last_name.value;
          let agender = gender.value;
          let abirthdate = birthdate.value;
          let anationality = nationality.value;
          let areligion = religion.value;
          let acivil_status = civil_status.value;
          let acourse = course.value;
          if(fname =="" || lname =="" || agender =="" || abirthdate =="" || anationality =="" || acivil_status =="" || acourse ==""){
            document.getElementById("next").setAttribute("data-bs-toggle","");
          }else{
          // commands
          document.getElementById("next").setAttribute("data-bs-toggle","collapse");
          }
        }

        function nextFunction() {
          let fname = first_name.value;
          let lname = last_name.value;
          let agender = gender.value;
          let abirthdate = birthdate.value;
          let anationality = nationality.value;
          let areligion = religion.value;
          let acivil_status = civil_status.value;
          let acourse = course.value;
          if(fname =="" || lname =="" || agender =="" || abirthdate =="" || anationality =="" || acivil_status =="" || acourse ==""){
            Swal.fire("You must fill out every field","","warning");
            document.getElementById("icon1").setAttribute("class","bi bi-exclamation-triangle-fill me-2");
            document.getElementById("icon1").style.color = "red";
            document.getElementById("text1").style.color = "red";
          }else{
          // commands
          // document.getElementById("next").innerText = "NEXT";
          document.getElementById("next").setAttribute("data-bs-toggle","collapse");
          document.getElementById("icon1").setAttribute("class","bi bi-check-circle-fill me-2");
          document.getElementById("progress").setAttribute("value","35%");
          document.getElementById("progress").style.width = "35%";
          document.getElementById("icon1").style.color = "green";
          document.getElementById("text1").style.color = "green";
          // document.getElementById("message1").style.visibility = "visible";
          }
        }
        //second accordion button function 
        function oncollapse1() {
          let add1 = add_st1.value;
          let add2 = add_st2.value;
          let act = city.value;
          let azp = zip_code.value;

          if(add1 =="" || act =="" || azp =="" ){
            document.getElementById("next2").setAttribute("data-bs-toggle","");
          }else{
          // commands
          document.getElementById("next2").setAttribute("data-bs-toggle","collapse");
          }
        }

        function next2Function() {
          let add1 = add_st1.value;
          let add2 = add_st2.value;
          let act = city.value;
          let azp = zip_code.value;

          if(add1 =="" || act =="" || azp =="" ){
            Swal.fire("You must fill out every field","","warning");
            document.getElementById("icon2").setAttribute("class","bi bi-exclamation-triangle-fill me-2");
            document.getElementById("icon2").style.color = "red";
            document.getElementById("text2").style.color = "red";
          }else{
          // commands
          document.getElementById("next2").setAttribute("data-bs-toggle","collapse");
          document.getElementById("icon2").setAttribute("class","bi bi-check-circle-fill me-2");
          document.getElementById("progress").style.width = "70%";
          document.getElementById("icon2").style.color = "green";
          document.getElementById("text2").style.color = "green";
          // document.getElementById("message2").style.visibility = "visible";
          }
        }
        //third accordion button function 

        function oncollapse2() {
          let acpno = contact.value;
          let aemail = email.value;
          var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
          
          if(aemail =="" || acpno =="" || (acpno.length() == 11) ||(aemail.value.match(mailformat)) ){
            document.getElementById("next3").setAttribute("data-bs-toggle","");
          }else{
          // commands
          document.getElementById("next3").setAttribute("data-bs-toggle","collapse");
          }
        }
        function next3Function() {
          let acpno = contact.value;
          let aemail = email.value;

          if(acpno =="" || acpno =="" || (acpno.length() == 11) ||(aemail.value.match(mailformat)) ){
            Swal.fire("You must fill out every field","","warning");
            document.getElementById("icon3").setAttribute("class","bi bi-exclamation-triangle-fill me-2");
            document.getElementById("icon3").style.color = "red";
            document.getElementById("text3").style.color = "red";
          }else{
          // commands
          document.getElementById("icon3").setAttribute("class","bi bi-check-circle-fill me-2");
          document.getElementById("progress").style.width = "100%";
          document.getElementById("icon3").style.color = "green";
          document.getElementById("text3").style.color = "green";
          // document.getElementById("message3").style.visibility = "visible";
          }
        }

        // input numbers only
        function isNumberKey(evt){
          var charCode = (evt.which) ? evt.which : evt.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))
              return false;
          return true;
        }
        // input text only
        function isTextKey(evt){
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return true;
            return false;
        }
        //making text uppercase
        // function forceInputUppercase(e)
        //   {
        //     var start = e.target.selectionStart;
        //     var end = e.target.selectionEnd;
        //     e.target.value = e.target.value.toUpperCase();
        //     e.target.setSelectionRange(start, end);
        //   }

        // document.getElementById("middle_name").addEventListener("keyup", forceInputUppercase, false);
        
    </script>


  </body>

  </html>