<!DOCTYPE html>
<html lang="en">

<?php
 include('session.php');
include ("includes/head.php");
?>

<body>
<?php
include ("includes/nav.php");
include ("includes/sidebar.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Teacher</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?id=<?php echo $_SESSION["login_key"];?>">Home</a></li>
          <li class="breadcrumb-item"><a href="teacher.php?id=<?php echo $_SESSION["login_key"];?>">Teacher</a></li>
          <li class="breadcrumb-item">Add New Teacher</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Teacher Registration Form</h5>

        <!-- No Labels Form -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3">
          <!-- <div class="col-md-2">
            <input type="number" name="id_number" class="form-control <?php echo (!empty($id_number_err)) ? 'is-invalid' : ''; ?>" Required placeholder="ID Number">
            <span class="invalid-feedback"><?php echo $id_number_err;?></span>
          </div> -->
          <div class="col-md-5">
            <div class="form-floating" >
              <input type="text" class="form-control first_name" name="first_name" id="first_name" onkeypress="return isTextKey(event)" placeholder="first name" Required >
              <label for="floatingName">First Name</label>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-floating" >
              <input type="text" class="form-control last_name" name="last_name" id="last_name" onkeypress="return isTextKey(event)" placeholder="last name" Required >
              <label for="floatingName">Last Name</label>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-floating" >
              <input type="text" class="form-control middle_name" name="middle_name" id="middle_name" placeholder="middle name" onkeypress="return isTextKey(event)" >
              <label for="floatingName">Middle Initial (Optional)</label>
            </div>
          </div>
          <div class="col-md-4" id="divcourse">
            <div class="form-floating">
                <select class="form-select course" name="course" id="course" aria-label="State" Required>
                  <option value="#" selected="selected" disabled="disabled">Select Course</option>
                  <option value="BSIT">BS Information Technology</option>
                  <option value="BSHM">BS Hospitality Management</option>
                  <option value="BSOA">BS Office Administration</option>
                  <option value="BSBA Major in HRM">BS Business Administration Major in Human Resource Management</option>
                  <option value="BSBA Major in Marketing">BS Business Administration Major in Marketing</option>
                  <option value="BSCriM">BS Criminology</option>
                  <option value="BEEd">Bachelor of Elementary Education</option>
                  <option value="BSEd Major in English">Bachelor of Secondary Education Major in English</option>
                  <option value="BSEd Major in Filipino">Bachelor of Secondary Education Major in Filipino</option>
                  <option value="BSEd Major in Mathematics">Bachelor of Secondary Education Major in Mathematics</option>
                  <option value="BSEd Major in Social Studies">Bachelor of Secondary Education Major in Social Studies</option>
                  <option value="BSEd Major in Values Education">Bachelor of Secondary Education Major in Values Education</option>
                  <option value="BTLeD">Bachelor of Technology and Livelihood Education </option>
                  <option value="BPEeD">Bachelor of Physical Education</option>
                  <option value="BSCE">BS Computer Engineering</option>
                  <option value="BLIS">Bachelor of Library in Information Science</option>
                  <option value="BSTM">BS Tourism Management</option>
                  <option value="BSEntrep">BS Entrepreneurship</option>
                  <option value="BSAIS">BS Accounting Information System</option>
                  <option value="BSPsy">BS Psychology</option>  
                </select>
              <label for="floatingSelect">College Program</label>
            </div>   
          </div>  
          <div class="col-md-8" id="divadd" >
            <div class="form-floating">
              <textarea type="textarea" class="form-control address" name="address" id="address"  placeholder="Complete Address" required ></textarea>
              <label for="floatingTextarea">Complete Address</label>
            </div>
          </div>
          <div class="col-md-3" id="divemail">
            <div class="form-floating">
              <input type="email" class="form-control email" name="email" id="email" placeholder="Email"  required>
              <label for="floatingName" required>Email Address</label>
            </div>
          </div>
          <div class="col-md-3" id="divnum" >
            <div class="form-floating">
              <input type="text" class="form-control contact" name="contact" id="contact" placeholder="number" onkeypress="return isNumberKey(event)" maxlength="11" minlength="11" required>
              <label for="floatingName" required>Contact Number</label>
            </div>
          </div>
          <div class="col-md-3" id="divgen" >
            <div class="form-floating">
              <select class="form-select gender" name="gender" id="gender" aria-label="State" Required >
                <option value="#" selected="selected" disabled="disabled">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              <label for="floatingSelect">Gender</label>
            </div>
          </div>
          <div class="col-md-3" id="divbday" >
            <div class="form-floating">
              <input type="Date" class="form-control birthdate" name="birthdate" id="birthdate" placeholder="birthday" Required >
              <label for="floatingName">Birthdate</label>
            </div>
          </div>
          <div class="col-md-4" id="divnation">
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
          <div class="col-md-4" id="divreli" >
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
          <div class="col-md-4" id="divcs" >
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
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
        </form><!-- End No Labels Form -->

      </div>
    </div>

  </main><!-- End #main -->

<?php
include ("includes/footer.php");
?>

</body>

<?php
// Define variables and initialize with empty values
$id_number = "";
$first_name = "";
$last_name = "";
$middle_name = "";
$course = "";
$address = "";
$email = "";
$contact = "";
$gender = "";
$birthday = "";
$nationality = "";
$religion = "";
$civil_status = "";
$key = $_SESSION["login_key"];
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  // $id_number = mysqli_real_escape_string($link,trim($_POST["id_number"]));
    
    // $id_number = mysqli_real_escape_string($link,trim($_POST["id_number"]));\
    $current_year = date("y");
    //agun implementation for student number
    $sqll = "SELECT id FROM teacher_information ORDER BY id DESC Limit 1";
    if($resultt = mysqli_query($link, $sqll)){
      if(mysqli_num_rows($resultt) == 0){
        $id_number = "" . $current_year . "000001";
      }
      else if(mysqli_num_rows($resultt) > 0){
        while($roww = mysqli_fetch_array($resultt)){
          if($roww['id'] < 9){
            $new_id = $roww['id'] + 1;
            $id_number = "" . $current_year . "00000" . $new_id;
          }
          else if ($roww['id'] == 9){
            $id_number = "" . $current_year . "000010";
          }
          else if ($roww['id'] < 99){
            $new_id = $roww['id'] + 1;
            $id_number = "" . $current_year . "0000" . $new_id;
          }
          else if ($roww['id'] == 99){
            $id_number = "" . $current_year . "000100";
          }
          else if ($roww['id'] < 999){
            $new_id = $roww['id'] + 1;
            $id_number = "" . $current_year . "000" . $new_id;
          }
          else if ($roww['id'] == 999){
            $id_number = "" . $current_year . "001000";
          }
          else if ($roww['id'] < 9999){
            $new_id = $roww['id'] + 1;
            $id_number = "" . $current_year . "00" . $new_id;
          }
          else if ($roww['id'] == 9999){
            $id_number = "" . $current_year . "010000";
          }
          else if ($roww['id'] < 99999){
            $new_id = $roww['id'] + 1;
            $id_number = "" . $current_year . "0" . $new_id;
          }
          else if ($roww['id'] == 99999){
            $id_number = "" . $current_year . "100000";
          }
          else if ($roww['id'] < 999999){
            $new_id = $roww['id'] + 1;
            $id_number = "" . $current_year . "" . $new_id;
          }
        }
      }
    }
  $userid ="T".$id_number;
  $first_name = mysqli_real_escape_string($link,trim($_POST["first_name"]));
  $last_name = mysqli_real_escape_string($link,trim($_POST["last_name"]));
  $middle_name = mysqli_real_escape_string($link,trim($_POST["middle_name"]));
  $course = mysqli_real_escape_string($link,trim($_POST["course"]));
  $address = mysqli_real_escape_string($link,trim($_POST["address"]));
  $email = mysqli_real_escape_string($link,trim($_POST["email"]));
  $contact = mysqli_real_escape_string($link,trim($_POST["contact"]));
  $gender = mysqli_real_escape_string($link,trim($_POST["gender"]));
  $birthday = date('Y-m-d', strtotime(mysqli_real_escape_string($link,trim($_POST["birthdate"]))));
  $nationality = mysqli_real_escape_string($link,trim($_POST["nationality"]));
  $religion = mysqli_real_escape_string($link,trim($_POST["religion"]));
  $civil_status = mysqli_real_escape_string($link,trim($_POST["civil_status"]));
  $account_status = "Active";
  $password = password_hash("#ChangeMe01!", PASSWORD_BCRYPT, array('cost' => 12));  //PASSWORD_ARGON2I//PASSWORD_ARGON2ID
  //Check if the id number is not existing in the database
  $sql1 = "SELECT id FROM teacher_information WHERE id_number = '$id_number'";
  $result = mysqli_query($link,$sql1);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $count = mysqli_num_rows($result);
  
  //Check if the id number is not existing in the database
  $sql2 = "SELECT id FROM users WHERE id_number = '$id_number'";
  $result2 = mysqli_query($link,$sql2);
  $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
  $count2 = mysqli_num_rows($result2);
  
  // If the id number is not existing in the database, count must be 0
  if($count == 0 && $count2 == 0) {
    // Prepare an insert statement
    $sql = "INSERT INTO teacher_information (id_number, firstname, lastname, middlename, email, contact, address, course, gender, birthday, nationality, religion, civil_status, account_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if($stmt = mysqli_prepare($link, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssssssssssssss", $userid, $first_name, $last_name, $middle_name, $email, $contact, $address, $course, $gender, $birthday, $nationality, $religion, $civil_status, $account_status);

      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
        //Create user account
        $sql = "INSERT INTO users (id_number, password, login_key) VALUES (?, ?, ?)";

        if($stmt1 = mysqli_prepare($link, $sql)){
          // Bind variables to the prepared statement as parameters
          require_once "includes/update_key.php";
          mysqli_stmt_bind_param($stmt1, "sss", $userid, $password, $getQP);

          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt1)){
              // Records created successfully. Redirect to landing page
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
                    title:"Student Successfully en"
                    }).then(function(){
                      window.location = "teacher.php?id='.$key.'";//refresh pages
                    });
                </script>';
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
    $id_number_err = "ID Number is already existing";
  }
}
?>
<script type="text/javascript">

    //  $("#editableswitch").click(function () {
    //       document.getElementById('divcompany').style.display = 'none';
    //       document.getElementById('divposition').style.display = 'none';
    //   });    
       var jsonObj;
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
       function forceInputUppercase(e)
        {
          var start = e.target.selectionStart;
          var end = e.target.selectionEnd;
          e.target.value = e.target.value.toUpperCase();
          e.target.setSelectionRange(start, end);
        }

      // document.getElementById("middle_name").addEventListener("keyup", forceInputUppercase, false);
  </script>
</html>