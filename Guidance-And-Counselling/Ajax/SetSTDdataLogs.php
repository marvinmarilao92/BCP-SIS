<?php session_start();
 if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["empid"]))
        {
            $key = $_GET["empid"];
            require_once  'Config.php';
            require_once 'timezone.php';
            $HasStudentProfile = $db->query("SELECT * FROM student_enrolled WHERE Student_ID = '".$key."' OR Student_Lname = '".$key."'");

            if ($HasStudentProfile -> numRows() == 1)
            {
                $StudentData = $db->query('SELECT * FROM student_enrolled WHERE Student_ID = ? OR Student_Lname = ?', $key, $key)->fetchArray();

                $_SESSION["Student_Course".$_SESSION['success'].""]         = $StudentData["Student_Course"];
                $_SESSION["Student_yrlvl".$_SESSION['success'].""]          = $StudentData["Student_yrlvl"];
                $_SESSION["Student_Section".$_SESSION['success'].""]        = $StudentData["Student_Section"];
                $_SESSION["Student_Gender".$_SESSION['success'].""]         = $StudentData["Student_Gender"];
                $_SESSION["Student_Bdate".$_SESSION['success'].""]          = $StudentData["Student_Bdate"];
                $_SESSION["Student_Address".$_SESSION['success'].""]        = $StudentData["Student_Address"];
                $_SESSION["Student_Nationality".$_SESSION['success'].""]    = $StudentData["Student_Nationality"];
                $_SESSION["Student_Religion".$_SESSION['success'].""]       = $StudentData["Student_Religion"];
                $_SESSION["Student_Status".$_SESSION['success'].""]         = $StudentData["Student_Status"];
                $_SESSION["Student_Name".$_SESSION['success'].""]           = $StudentData["Student_Lname"] .', '. $StudentData["Student_Fname"] .' '. $StudentData["Student_Mname"];
                $_SESSION["Student_ID".$_SESSION['success'].""]             = $StudentData["Student_ID"];
                $_SESSION["Stundet_Img".$_SESSION['success'].""]            = $StudentData["Stundet_Img"];

                $_SESSION["StudentLogs"] = "Good_Moral";


            }
            else
            {
                $_SESSION["Student_Course".$_SESSION['success'].""]         = "No Data Found!";
                $_SESSION["Student_yrlvl".$_SESSION['success'].""]          = "No Data Found!";
                $_SESSION["Student_Section".$_SESSION['success'].""]        = "No Data Found!";
                $_SESSION["Student_Gender".$_SESSION['success'].""]         = "No Data Found!";
                $_SESSION["Student_Bdate".$_SESSION['success'].""]          = "No Data Found!";
                $_SESSION["Student_Address".$_SESSION['success'].""]        = "No Data Found!";
                $_SESSION["Student_Nationality".$_SESSION['success'].""]    = "No Data Found!";
                $_SESSION["Student_Religion".$_SESSION['success'].""]       = "No Data Found!";
                $_SESSION["Student_Status".$_SESSION['success'].""]         = "No Data Found!";
                $_SESSION["Student_Name".$_SESSION['success'].""]           = "No Data Found!";
                $_SESSION["Student_ID".$_SESSION['success'].""]             = "Search ID or Name!";
            }
        }


        echo '<br>
        <div class="form-row" >
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
        </div>';

        echo '<div class="form-row" id="Purpose">
                    <div class="form-group col-md-12" >
                        <select class="form-select  animate__animated animate__pulse "  required name="formName"  id="RStudentName" onchange="Other(this.value, ';
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
                echo '<button type="submit" class="btn btn-info"   name="StudentLogs">Time in</button> </div>';
              }
              else
              {
                echo '<button type="submit" class="btn btn-info"  disabled name="StudentLogs">Time in</button> </div>';
              }


?>
