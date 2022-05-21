<?php include 'timezone.php'; session_start();
  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["getFC"]) &&
   isset($_SESSION["Student_Name".$_SESSION['success'].""]) && isset($_SESSION["Student_ID".$_SESSION['success'].""]) &&
   isset($_SESSION["Student_Section".$_SESSION['success'].""]) && isset($_SESSION["Student_Course".$_SESSION['success'].""]))
  {
    $_SESSION["StudentLogs"] = $_GET["getFC"];
    if ($_GET["getFC"] == "Good_Moral")
    {
      echo '<br>
      <div class="form-row" >
        <div class="form-group col-md-8" >
            <input  type="text" id="stdName" required disabled name="" value="'.$_SESSION["Student_Name".$_SESSION['success'].""].'"  placeholder="Student Name" class="form-control animate__animated animate__pulse"  >
        </div>
        <div class="form-group col-md-4">
            <input type="text" id="stdID" required disabled name="" value="'.$_SESSION["Student_ID".$_SESSION['success'].""].'" placeholder="Student ID" class="form-control animate__animated animate__pulse"  >
        </div>
      </div>

      <div class="form-row" >

        <div class="form-group col-md-4">
            <input type="text" id="stdSection" required disabled name="" value="'.$_SESSION["Student_Section".$_SESSION['success'].""].'" placeholder="Student Section" class="form-control animate__animated animate__pulse"  >
        </div>
          <div class="form-group col-md-8" >
            <input  type="text" id="stdCourse" required disabled name="" value="'.$_SESSION["Student_Course".$_SESSION['success'].""].'"  placeholder="Student Course" class="form-control animate__animated animate__pulse"  >
        </div>
      </div>

      <div class="form-row" >
          <div class="form-group col-md-12" >
               <label for ="referral" ><span style="font-style: italic;">Time in</span></label>
              <input type="text" id="stdTimein"  value="'.date_format(date_create($time), 'g:ia \o\n l jS F Y').'"  name="dtime" disabled class="form-control animate__animated animate__pulse"  >
          </div>
      </div>';

      echo '<div class="form-row" id="Purpose">
                  <div class="form-group col-md-12" >
                      <select class="form-select  id="stdPurpose" animate__animated animate__pulse "  required name="formName"   onchange="Other(this.value, ';
                      echo "'SLG_ChangeContent'";
                      echo')">
                              <option value="" selected disabled >Select Purpose</option>
                              <option value="Scholarship">Scholarship</option>
                              <option value="Employment">Employment</option>
                              <option value="Transfer">Transfer</option>
                              <option value="BoardExam">BoardExam</option>
                              <option value="Other">Other</option>
                       </select>
                  </div>
      </div>


      <div id="Purpose"></div>

      </div>

      <div class="modal-footer">';

            if (isset($_SESSION["Student_Course".$_SESSION['success'].""]) && isset($_SESSION["Student_ID".$_SESSION['success'].""]) &&
            $_SESSION["Student_Course".$_SESSION['success'].""] != "No Data Found!" && $_SESSION["Student_ID".$_SESSION['success'].""] != "No Data Found!")
            {
              echo '<a href="#" class="btn btn-info"  style="color:white;"  onclick="submitGoodmoralLogs();"  name="StudentLogs">Time in</a> </div>';
            }
            else
            {
              echo '<button type="submit" class="btn btn-info"  disabled name="StudentLogs">Time in</button> </div>';
            }
    }
    if ($_GET["getFC"] == "Alumni")
    {
      echo '<br><div class="form-row" >
        <div class="form-group col-md-8" >
            <input  type="text" id="RStudentName" required disabled name="" value="'.$_SESSION["Student_Name".$_SESSION['success'].""].'"  placeholder="Student Name" class="form-control animate__animated animate__pulse"  >
        </div>
        <div class="form-group col-md-4">
            <input type="text" id="RStudentID" required disabled name="" value="'.$_SESSION["Student_ID".$_SESSION['success'].""].'" placeholder="Student ID" class="form-control animate__animated animate__pulse"  >
        </div>
      </div>

      <div class="form-row" >

        <div class="form-group col-md-4">
            <input type="text" id="RStudentID" required disabled name="" value="'.$_SESSION["Student_Section".$_SESSION['success'].""].'" placeholder="Student Section" class="form-control animate__animated animate__pulse"  >
        </div>
          <div class="form-group col-md-8" >
            <input  type="text" id="RStudentName" required disabled name="" value="'.$_SESSION["Student_Course".$_SESSION['success'].""].'"  placeholder="Student Course" class="form-control animate__animated animate__pulse"  >
        </div>
      </div>

      <div class="form-row" >
          <div class="form-group col-md-12" >
               <label for ="referral" ><span style="font-style: italic;">Time in</span></label>
              <input type="text" required value="'.date_format(date_create($time), 'g:ia \o\n l jS F Y').'" id="RStudentName" name="dtime" disabled class="form-control animate__animated animate__pulse"  >
          </div>
      </div>

      <div class="form-row">
          <div class="form-group col-md-6" >

            <select class="form-select animate__animated animate__pulse" required name="alumniYGR" id="RStudentName">
                <option selected value="" disabled>Year Graduated</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
                <option value="2014">2014</option>
                <option value="2013">2013</option>
                <option value="2012">2012</option>
                <option value="2011">2011</option>
                <option value="2010">2010</option>
                <option value="2009">2009</option>
                <option value="2008">2008</option>
                <option value="2007">2007</option>
                <option value="2006">2006</option>
                <option value="2005">2005</option>
                <option value="2004">2004</option>
                <option value="2003">2003</option>
                <option value="2002">2002</option>
            </select>

          </div>
          <div class="form-group col-md-6" >
              <input  type="text" id="RStudentName" required  name="alumniPRP"   placeholder="Purpose" class="form-control animate__animated animate__pulse"  >
          </div>
      </div>

      </div>


      <div id="Purpose"></div>

      </div>

      <div class="modal-footer">';

            if (isset($_SESSION["Student_Course".$_SESSION['success'].""]) && isset($_SESSION["Student_ID".$_SESSION['success'].""]) &&
            $_SESSION["Student_Course".$_SESSION['success'].""] != "No Data Found!" && $_SESSION["Student_ID".$_SESSION['success'].""] != "No Data Found!")
            {
              echo '<button type="submit" class="btn btn-info"   name="StudentLogs">Time in</button> </div>';
            }
            else
            {
              echo '<button type="submit" class="btn btn-info"  disabled name="StudentLogs">Time in</button> </div>';
            }
    }
    if ($_GET["getFC"] == "IODOCS")
    {
      echo '<br><div class="form-row" >
              <div class="form-group col-md-6" >
                <select class="form-select animate__animated animate__pulse" required  name="formName" required id="changeValue" onchange="StdLGFormContent(this.value, "SLG_ChangeContent")">
                    <option value="" selected disabled >Select Department</option>
                    <option value="Good_Moral">Good moral</option>
                    <option value="Alumni">Alumni </option>
                    <option value="SHS">Senior high School</option>
                    <option value="IODOCS">Incoming/Outgoing Documents</option>
                    <option value="Concern">Concern</option>
                 </select>
                </div>
                <div class="form-group col-md-6" >
                <select class="form-select animate__animated animate__pulse" required name="formName" required id="changeValue" onchange="StdLGFormContent(this.value, "SLG_ChangeContent")">
                    <option value="" selected disabled >Select</option>
                    <option value="Incoming">Incoming</option>
                    <option value="Outgoing">Outgoing</option>
                 </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12" >
                     <input  type="text" id="RStudentName" required  name=""   placeholder="Type of Documents" class="form-control animate__animated animate__pulse"  >
                </div>
              </div>



              <div class="form-row" >
                  <div class="form-group col-md-12" >
                      <label for ="referral" ><span style="font-style: italic;">Time in</span></label>
                      <input type="text" value="'.date_format(date_create($time), 'g:ia \o\n l jS F Y').'" required id="RStudentName" name="dtime" disabled class="form-control animate__animated animate__pulse"  >
                    </div>
              </div>

              <div id="Purpose"></div>

              </div>

              <div class="modal-footer">';

                    if (isset($_SESSION["Student_Course".$_SESSION['success'].""]) && isset($_SESSION["Student_ID".$_SESSION['success'].""]) &&
                    $_SESSION["Student_Course".$_SESSION['success'].""] != "No Data Found!" && $_SESSION["Student_ID".$_SESSION['success'].""] != "No Data Found!")
                    {
                      echo '<button type="submit" class="btn btn-info"   name="StudentLogs">Time in</button> </div>';
                    }
                    else
                    {
                      echo '<button type="submit" class="btn btn-info"  disabled name="StudentLogs">Time in</button> </div>';
                    }

    }
    if ($_GET["getFC"] == "Concern")
    {
      echo '<br><div class="form-row" >
        <div class="form-group col-md-8" >
            <input  type="text" id="RStudentName" required disabled name="" value="'.$_SESSION["Student_Name".$_SESSION['success'].""].'"  placeholder="Student Name" class="form-control animate__animated animate__pulse"  >
        </div>
        <div class="form-group col-md-4">
            <input type="text" id="RStudentID" required disabled name="" value="'.$_SESSION["Student_ID".$_SESSION['success'].""].'" placeholder="Student ID" class="form-control animate__animated animate__pulse"  >
        </div>
      </div>

      <div class="form-row" >

        <div class="form-group col-md-4">
            <input type="text" id="RStudentID" required disabled name="" value="'.$_SESSION["Student_Section".$_SESSION['success'].""].'" placeholder="Student Section" class="form-control animate__animated animate__pulse"  >
        </div>
          <div class="form-group col-md-8" >
            <input  type="text" id="RStudentName" required disabled name="" value="'.$_SESSION["Student_Course".$_SESSION['success'].""].'"  placeholder="Student Course" class="form-control animate__animated animate__pulse"  >
        </div>
      </div>

      <div class="form-row" >
          <div class="form-group col-md-12" >
               <label for ="referral" ><span style="font-style: italic;">Time in</span></label>
              <input type="text" value="'.date_format(date_create($time), 'g:ia \o\n l jS F Y').'" id="RStudentName" name="dtime" disabled class="form-control animate__animated animate__pulse"  >
          </div>
      </div>

      <div class="form-row" >

        <div class="form-group col-md-12">
            <input type="text" id="RStudentID" required  name="concernINFO" value="" placeholder="What kind of concern?" class="form-control animate__animated animate__pulse"  >
        </div>
      </div>
      </div>

      <div id="Purpose"></div>

      </div>

      <div class="modal-footer">';

            if (isset($_SESSION["Student_Course".$_SESSION['success'].""]) && isset($_SESSION["Student_ID".$_SESSION['success'].""]) &&
            $_SESSION["Student_Course".$_SESSION['success'].""] != "No Data Found!" && $_SESSION["Student_ID".$_SESSION['success'].""] != "No Data Found!")
            {
              echo '<button type="submit" class="btn btn-info"   name="StudentLogs">Time in</button> </div>';
            }
            else
            {
              echo '<button type="submit" class="btn btn-info"  disabled name="StudentLogs">Time in</button> </div>';
            }
    }
  }
  else
  {
    echo '<br><label for ="referral" ><span style="font-style: italic;">Please identify student profile :</span></label>
    <a href="StudentProfile.php?id='.$_SESSION['success'].'" >Redirect to student profile</a>';

  }
 ?>
