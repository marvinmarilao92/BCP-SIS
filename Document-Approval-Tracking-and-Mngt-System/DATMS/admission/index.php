<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Admission | Enroll New Student</title>
<head>
<?php include ('core/css-links.php');//css connection?>
</head>

<body>
<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'enroll'; include ('core/side-nav.php');//Design for sidebar?>
  <?php 
  // if(isset($_SESSION['status'])=="" && isset($_SESSION['studnum'])==""){
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Enroll Student</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a>Module</a></li>
        <li class="breadcrumb-item">Enroll Student</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">New Student 
        <div class="form-check form-switch" style="float: right;">
          <input class="form-check-input" type="checkbox" id="editableswitch" onchange="editInfo()">
          <label class="form-check-label" for="editableswitch">Editable</label>
        </div>
      </h5>

      <!-- No Labels Form -->
      <div class="row g-3">
       <label class="req"></label>

       <?php 
        $sqll = "SELECT id FROM student_information ORDER BY id DESC Limit 1";
        $resultt = mysqli_query($link, $sqll);
        if(mysqli_num_rows($resultt) == 0){
          ?>
       <div class="col-md-2">
         <div class="form-floating">
           <input type="text" class="form-control" name="application_code" id="application_code" onkeypress="return isNumberKey(event)" maxlength="8"  placeholder="middle name" onChange="fetchStudInfo(this.value);"  Required autofocus>
           <label for="floatingName">Application Code</label>
         </div>
       </div>

       <div class="col-md-2" style="display:none ;">
          <div class="form-floating">
            <input type="text" class="form-control"  value="" name="stud_num" id="stud_num" onkeypress="return isNumberKey(event)" maxlength="8"  placeholder="Student No." >
            <label for="floatingName">Student No.</label>
          </div>
        </div>
      
       <div class="col-md-4">
         <div class="form-floating" >
           <input type="text" class="form-control first_name" name="first_name" id="first_name" onkeypress="return isTextKey(event)" placeholder="first name" Required readonly>
           <label for="floatingName">First Name</label>
         </div>
       </div>

       <div class="col-md-4">
         <div class="form-floating" >
           <input type="text" class="form-control last_name" name="last_name" id="last_name" onkeypress="return isTextKey(event)" placeholder="last name" Required readonly>
           <label for="floatingName">Last Name</label>
         </div>
       </div>
       
       <div class="col-md-2">
         <div class="form-floating" >
           <input type="text" class="form-control middle_name" name="middle_name" id="middle_name" maxlength="1" onkeypress="return isTextKey(event)" placeholder="middle name" Required readonly>
           <label for="floatingName">Middle Initial (Optional)</label>
         </div>
       </div>
          <?php
         }
       else if(mysqli_num_rows($resultt) > 0){
          
          while($roww = mysqli_fetch_array($resultt)){
            if($roww['id'] >= 9999){ 
       ?>
        <div class="col-md-2">
          <div class="form-floating">
            <input type="text" class="form-control" name="application_code" id="application_code" onkeypress="return isNumberKey(event)" maxlength="8"  placeholder="middle name" onChange="fetchStudInfo(this.value);"  Required autofocus>
            <label for="floatingName">Application Code</label>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-floating" >
            <input type="text" class="form-control" name="stud_num" id="stud_num" onkeypress="return isNumberKey(event)" maxlength="8"  placeholder="Student No."  Required>
            <label for="floatingName">Student No.</label>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-floating" >
            <input type="text" class="form-control first_name" name="first_name" id="first_name" onkeypress="return isTextKey(event)" placeholder="first name" Required readonly>
            <label for="floatingName">First Name</label>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-floating" >
            <input type="text" class="form-control last_name" name="last_name" id="last_name" onkeypress="return isTextKey(event)" placeholder="last name" Required readonly>
            <label for="floatingName">Last Name</label>
          </div>
        </div>
        
        <div class="col-md-2">
          <div class="form-floating" >
            <input type="text" class="form-control middle_name" name="middle_name" id="middle_name" maxlength="1" onkeypress="return isTextKey(event)" placeholder="middle name" Required readonly>
            <label for="floatingName">Middle Initial (Optional)</label>
          </div>
        </div>
      <?php 
            }else{
              ?>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="application_code" id="application_code" onkeypress="return isNumberKey(event)" maxlength="8"  placeholder="middle name" onChange="fetchStudInfo(this.value);"  Required autofocus>
                    <label for="floatingName">Application Code</label>
                  </div>
                </div>

                <div class="col-md-2" style="display:none ;">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="stud_num" id="stud_num" onkeypress="return isNumberKey(event)" maxlength="8"  placeholder="Student No." value="" >
                    <label for="floatingName">Student No.</label>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-floating" >
                    <input type="text" class="form-control first_name" name="first_name" id="first_name" onkeypress="return isTextKey(event)" placeholder="first name" Required readonly>
                    <label for="floatingName">First Name</label>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-floating" >
                    <input type="text" class="form-control last_name" name="last_name" id="last_name" onkeypress="return isTextKey(event)" placeholder="last name" Required readonly>
                    <label for="floatingName">Last Name</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating" >
                    <input type="text" class="form-control middle_name" name="middle_name" id="middle_name" maxlength="1" onkeypress="return isTextKey(event)" placeholder="middle name" Required readonly>
                    <label for="floatingName">Middle Initial (Optional)</label>
                  </div>
                </div>
              <?php
            }
          }
        }
      ?>
        <div class="col-md-3" id="divcourse" style="display: none;">
          <div class="form-floating">
              <select class="form-select course" name="course" id="course" aria-label="State" Required>
                <option value="#" selected="selected" disabled="disabled">Select Course</option>
                <?php
                    // Include config file
                    require_once "include/config.php";
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

        <div class="col-md-5" id="divadd" style="display: none;">
          <div class="form-floating">
            <textarea type="textarea" class="form-control address" name="address" id="address"  placeholder="Complete Address" required ></textarea>
            <label for="floatingTextarea">Complete Address</label>
          </div>
        </div>

        <div class="col-md-2" id="divemail" style="display: none;">
          <div class="form-floating">
            <input type="email" class="form-control email" name="email" id="email" placeholder="Email"  required>
            <label for="floatingName" required>Email Address</label>
          </div>
        </div>

        <div class="col-md-2" id="divnum" style="display: none;">
          <div class="form-floating">
            <input type="text" class="form-control contact" name="contact" id="contact" placeholder="number" onkeypress="return isNumberKey(event)" maxlength="11" minlength="11" required>
            <label for="floatingName" required>Contact Number</label>
          </div>
        </div>

        <div class="col-md-2" id="divgen" style="display: none;">
          <div class="form-floating">
            <select class="form-select gender" name="gender" id="gender" aria-label="State" Required >
              <option value="#" selected="selected" disabled="disabled">Select Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
            <label for="floatingSelect">Gender</label>
          </div>
        </div>

        <div class="col-md-2" id="divbday" style="display: none;">
          <div class="form-floating">
            <input type="Date" class="form-control birthdate" name="birthdate" id="birthdate" placeholder="birthday" Required >
            <label for="floatingName">Birthdate</label>
          </div>
        </div>

        <div class="col-md-3" id="divnation" style="display: none;">
          <div class="form-floating">
            <select class="form-select nationality" name="nationality" id="nationality" aria-label="State" Required >
              <option value="#" disabled="disabled">Select Country of origin </option>
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
            <label for="floatingSelect">Country of origin </label>
          </div>
        </div>

        <div class="col-md-3" id="divreli" style="display: none;">
          <div class="form-floating">
            <select class="form-select religion" name="religion" id="religion" aria-label="State" Required >
              <option value="#" selected="selected" disabled="disabled">Select Religion</option>
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

        <div class="col-md-2" id="divcs" style="display: none;">
          <div class="form-floating">
            <select class="form-select civil_status" name="civil_status" id="civil_status" aria-label="State" Required >
              <option value="#" selected="selected" disabled="disabled">Select Civil Status</option>
              <option value="Single">Single</option>
              <option value="Married">Married</option>
              <option value="Divorced">Divorced</option>
              <option value="Widowed">Widowed</option>
            </select>
            <label for="floatingSelect">Civil Status</label>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-floating">
            <select class="form-select" name="status" id="status" aria-label="State" required>
              <option selected disabled value="">Select Status</option>
              <option value="Temporarily Enrolled">Temporarily Enrolled</option>
              <option value="Official">Official</option>
              <option value="Transferee">Transferee</option>
              <!-- <option value="Returnee">Returnee</option> -->
            </select>
            <label for="floatingSelect">Student Status</label>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-floating">
            <select class="form-select" name="year_level" id="year_level" aria-label="State" required>
              <option value="" selected disabled>Select Year Level</option>
              <option value="1st Year">1st Year</option>
              <option value="2nd Year">2nd Year</option>
              <option value="3rd Year">3rd Year</option>
              <option value="4th Year">4th Year</option>
            </select>
            <label for="floatingSelect">Year Level</label>
          </div>
        </div>

        <div class="col-md-6" style="display: none;">
          <div class="form-floating">
            <input type="text" class="form-control school_year" id="school_year" name="school_year" value="<?php $currentYear = date("Y"); $previousYear = $currentYear-1; $SY = $previousYear.'-'. $currentYear; echo $SY;?>"  id="school_year" required >
            <label for="floatingName" required>School Year</label>
          </div>
        </div>

        <div class="col-md-4" style="display:none;">
          <div class="form-floating">
            <input type="hidden"  class="form-control" name="section" id="section" placeholder="Section">
            <label for="floatingName">Section</label>
          </div>
        </div>

        <div class="justify-content-center d-flex">
          <button type="reset" class="btn btn-secondary btn-lg">Reset</button>&nbsp;&nbsp;  
          <button type="submit" id="enroll" name="req_subbtn" class="btn btn-primary btn-lg ">Enroll</button>          
        </div>

      </div>
    </div>
  </div><!-- End No Labels Form -->
</main><!-- End #main -->
 

  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center" style="background-color: rgb(13, 110, 253);"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>
</body>

<!-- Script Functions -->
  <script type="text/javascript">
    // Prevent you from turning back or using back button
        (function (global) {

          if(typeof (global) === "undefined") {
              throw new Error("window is undefined");
          }

          var _hash = "!";
          var noBackPlease = function () {
              global.location.href += "#";

              // Making sure we have the fruit available for juice (^__^)
              global.setTimeout(function () {
                  global.location.href += "!";
              }, 50);
          };

          global.onhashchange = function () {
              if (global.location.hash !== _hash) {
                  global.location.hash = _hash;
              }
          };

          global.onload = function () {
              noBackPlease();

              // Disables backspace on page except on input fields and textarea..
              document.body.onkeydown = function (e) {
                  var elm = e.target.nodeName.toLowerCase();
                  if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                      e.preventDefault();
                  }
                  // Stopping the event bubbling up the DOM tree...
                  e.stopPropagation();
              };
          }
        })(window);
        function editInfo(){
          var isChecked = document.getElementById("editableswitch").checked;
            
          if(isChecked){
            // console.log("Input is checked");
            document.getElementById("first_name").readOnly=false;
            document.getElementById("middle_name").readOnly=false;
            document.getElementById("last_name").readOnly=false;

            document.getElementById('divcourse').style.display = 'block';
            document.getElementById('divadd').style.display = 'block';
            document.getElementById('divemail').style.display = 'block';
            document.getElementById('divnum').style.display = 'block';
            document.getElementById('divgen').style.display = 'block';
            document.getElementById('divbday').style.display = 'block';
            document.getElementById('divnation').style.display = 'block';
            document.getElementById('divreli').style.display = 'block';
            document.getElementById('divcs').style.display = 'block';
            
          } else {
            // console.log("Input is NOT checked");
            document.getElementById("first_name").readOnly=true;
            document.getElementById("middle_name").readOnly=true;
            document.getElementById("last_name").readOnly=true;

            document.getElementById('divcourse').style.display = 'none';
            document.getElementById('divadd').style.display = 'none';
            document.getElementById('divemail').style.display = 'none';
            document.getElementById('divnum').style.display = 'none';
            document.getElementById('divgen').style.display = 'none';
            document.getElementById('divbday').style.display = 'none';
            document.getElementById('divnation').style.display = 'none';
            document.getElementById('divreli').style.display = 'none';
            document.getElementById('divcs').style.display = 'none';
          }
        }
        
        function fetchStudInfo(id){
        if($("#application_code").val().length==8){
          $.ajax({
            type:'post',
            url:'ajaxfunction.php',
            data :{
              id : id,
              action: "data"
            },
            success: function(data){

              jsonObj = jQuery.parseJSON(data);

              if(jsonObj['success'] == '1'){

                  console.log(jsonObj['data'][0]);

                  // alert(data);
                  $(".first_name").val(jsonObj['data'][0].adm_fname);
                  $(".last_name").val(jsonObj['data'][0].adm_lname);
                  $(".middle_name").val(jsonObj['data'][0].adm_mname);
                  $(".email").val(jsonObj['data'][0].adm_email);
                  $(".contact").val(jsonObj['data'][0].adm_contact);
                  $(".req").text("Submitted Requirements: "+jsonObj['data'][0].adm_req);
                  $(".address").text(jsonObj['data'][0].adm_add);
                  $(".course").val(jsonObj['data'][0].adm_course).change();
                  $(".gender").val(jsonObj['data'][0].adm_gen);
                  $(".birthdate").val(jsonObj['data'][0].adm_bday);
                  $(".nationality").val(jsonObj['data'][0].adm_nation).change();
                  $(".religion").val(jsonObj['data'][0].adm_religion).change();
                  $(".civil_status").val(jsonObj['data'][0].adm_cs).change();
                  
              }else{
                Swal.fire ("No data has been retrieve","","error").then(function(){
                document.location.reload(true)//refresh pages
                });
              }
                           
            }
          })
        }else{
          Swal.fire ("Application code must be 8 characters","","error").then(function(){
          document.location.reload(true)//refresh pages
          });
        }
        
      }
    $(document).ready(function () {
      
      // Save function
        $('#enroll').click(function(a){ 
          a.preventDefault();
            if($('#application_code').val()!="" &&$('#first_name').val()!="" && $('#last_name').val()!=""&& $('#course').val()!=""&& $('#year_level').val()!=""&& $('#school_year').val()!=""&& $('#address').val()!=""&& $('#email').val()!=""&& $('#contact').val()!=""&& $('#gender').val()!=""&& $('#birthdate').val()!=""&& $('#nationality').val()!=""&& $('#religion').val()!=""&& $('#civil_status').val()!=""){
              $.post("function/enroll_student.php", {
                Tcode:$('#application_code').val(),
                TstudNo:$('#stud_num').val(),
                Tfname:$('#first_name').val(),
                Tlname:$('#last_name').val(),
                Tmname:$('#middle_name').val(),
                Tcourse:$('#course').val(),
                Tyl:$('#year_level').val(),
                Tsec:$('#section').val(),
                Tsy:$('#school_year').val(),
                Taddress:$('#address').val(),
                Temail:$('#email').val(),
                Tcontact:$('#contact').val(),
                Tgen:$('#gender').val(),
                Tbday:$('#birthdate').val(),
                Tnation:$('#nationality').val(),
                Treligion:$('#religion').val(),
                Tcs:$('#civil_status').val(),                     
                Tstat:$('#status').val()
                },function(data){
                if (data.trim() == "failed"){
                  //response message
                  Swal.fire("The data that you input is already in the system","","error");
                  // Empty test field
                  $('#application_code').val("")
                  $('#first_name').val("")
                  $('#last_name').val("")
                  $('#middle_name').val("")
                  $('#course').val("")
                  $('#year_level').val("")
                  $('#section').val("")
                  $('#school_year').val("")
                  $('#address').val("")
                  $('#email').val("")
                  $('#contact').val("")
                  $('#gender').val("")
                  $('#birthdate').val("")
                  $('#nationality').val("")
                  $('#religion').val("")
                  $('#civil_status').val("")
                  $('#status').val("")                 
                                    
                }else if(data.trim() == "success"){               
                        //success message
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProsressBar: true,
                        didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)                  
                        }
                        })
                      Toast.fire({
                      icon: 'success',
                      title:'Student is successfully enrolled'
                      }).then(function(){
                        window.location.replace('index.php?id=".$_SESSION["login_key"]."');
                        // window.location = "req_submit.php?id='.$_SESSION["login_key"].'";
                        // document.location.reload(true)//refresh pages
                      });
                       // Empty test field
                        $('#application_code').val("")
                        $('#first_name').val("")
                        $('#last_name').val("")
                        $('#middle_name').val("")
                        $('#course').val("")
                        $('#year_level').val("")
                        $('#section').val("")
                        $('#school_year').val("")
                        $('#address').val("")
                        $('#email').val("")
                        $('#contact').val("")
                        $('#gender').val("")
                        $('#birthdate').val("")
                        $('#nationality').val("")
                        $('#religion').val("")
                        $('#civil_status').val("")
                        $('#status').val("") 
                  }else{
                    Swal.fire(data);
                }
              })
            }else{
              Swal.fire("You must fill out every field","","warning");
            }
        })

    var jsonObj;
    
    document.getElementById('TextBoxID').readOnly = false; 

      // input text only
      function isTextKey(evt){
          var charCode = (evt.which) ? evt.which : evt.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))
              return true;
          return false;
        }
    });  
      // input numbers only
      function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
      }
  </script>
</html>